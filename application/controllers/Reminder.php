<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('super_model');
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	  function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }

	}

	public function dateDifference($date_1 , $date_2){
	    $datetime2 = date_create($date_2);
		$datetime1 = date_create($date_1 );
		$interval = date_diff($datetime2, $datetime1);
	   
	    return $interval->format('%R%a');
	   
	}

     public function notification_count($employee_id){
        $count = $this->super_model->count_custom_where("notification_logs","recipient = '$employee_id' AND open = 0");
        return $count;
    }


	public function reminder_list(){
           $useremp = $this->session->userdata['employee'];
        $data_notif['count']=$this->notification_count($useremp);

        foreach($this->super_model->select_custom_where("notification_logs", "recipient = '$useremp' AND open = 0") AS $logs){
            $data_notif['logs'][] = array(
                'employee'=>$this->super_model->select_column_where("employees","employee_name","employee_id",$logs->employee_id),
                'message'=>$logs->notification_message,
                'notif_date'=>$logs->notification_date,
                'project_id'=>$logs->project_id,
                'pd_id'=>$logs->pd_id,
                'notification_id'=>$logs->notification_id,
            );
        }


		$this->load->view('template/header');
		$this->load->view('template/navbar', $data_notif);
		foreach($this->super_model->select_all_order_by("reminders","due_date","ASC") AS $rem){
			$today=date("Y-m-d");
			$employee = $this->super_model->select_column_where("employees","employee_name","employee_id",$rem->employee_id);
			$days_left= $this->dateDifference($rem->due_date, $today). " day/s";
			$data['reminders'][]=array(
				"reminder_id"=>$rem->reminder_id,
				"employee_id"=>$rem->employee_id,
				"notes"=>$rem->notes,
				"due_date"=>$rem->due_date,
				"employee"=>$employee,
				"status"=>$rem->status,
				"days_left"=>$days_left,
                "cancel_date"=>$rem->cancel_date,
                "cancel_reason"=>$rem->cancel_reason,
                "done_date"=>$rem->done_date
			);
		}
		$data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
		$this->load->view('reminder/reminder_list',$data);
		$this->load->view('template/footer');
	}

	public function insert_reminder(){
        $employee = trim($this->input->post('employee')," ");
        $notes = trim($this->input->post('notes')," ");
        $due_date = trim($this->input->post('due_date')," ");
        $data = array(
            'employee_id'=>$employee,
            'notes'=>$notes,
            'due_date'=>$due_date,
        );
        if($this->super_model->insert_into("reminders", $data)){
             $this->session->set_flashdata('msg', 'Reminder successfully added!');
             redirect(base_url().'reminder/reminder_list/');
        }
    }

    public function edit_reminder(){
    	$employee = trim($this->input->post('employee')," ");
        $notes = trim($this->input->post('notes')," ");
        $due_date = trim($this->input->post('due_date')," ");
        $data = array(
            'employee_id'=>$employee,
            'notes'=>$notes,
            'due_date'=>$due_date,
        );
        $reminder_id = $this->input->post('reminder_id');
        if($this->super_model->update_where('reminders', $data, 'reminder_id', $reminder_id)){
            $this->session->set_flashdata('msg', 'Reminder successfully updated!');
            redirect(base_url().'reminder/reminder_list/');
        }
    }
    
    public function cancel_reminder(){
    	$reason = trim($this->input->post('reason')," ");
        $cancel_date = trim($this->input->post('cancel_date')," ");
        $data = array(
            'cancel_reason'=>$reason,
            'cancel_date'=>$cancel_date,
            'status'=>1,
        );
        $reminder_id = $this->input->post('reminder_id');
        if($this->super_model->update_where('reminders', $data, 'reminder_id', $reminder_id)){
            $this->session->set_flashdata('msg', 'Reminder successfully cancelled!');
            redirect(base_url().'reminder/reminder_list/');
        }
    }
}
