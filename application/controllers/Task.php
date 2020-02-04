<?php
date_default_timezone_set("Asia/Hong_Kong");
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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

    public function notification_count($employee_id){
        $count = $this->super_model->count_custom_where("notification_logs","recipient = '$employee_id' AND open = 0");
        return $count;
    }

    public function add_task()
    {
      

        $project_id = $this->uri->segment(3);
        $update = $this->uri->segment(4);
        $pd_id = $this->uri->segment(5);

        $data['project_id'] = $project_id;
        $data['pd_id'] = $pd_id;
        $data['update'] = $update;
        $data['location'] = $this->super_model->select_all_order_by("location", "location_name", "ASC");
        $data['company'] = $this->super_model->select_all_order_by("company", "company_name", "ASC");
        $data['department'] = $this->super_model->select_all_order_by("department", "department_name", "ASC");
        $data['employee'] = $this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $data['proj_emp'] = $this->super_model->select_column_where("project_head", "employee","project_id", $project_id);

        foreach($this->super_model->select_row_where("project_head", "project_id", $project_id) AS $proj){
            $data['company_id']=$proj->company_id;
            $data['companys']=$this->super_model->select_column_where("company","company_name","company_id",$proj->company_id);
            $data['locations']=$this->super_model->select_column_where("location","location_name","location_id",$proj->location_id);
            $data['location_id']=$proj->location_id;
            $data['from']=$proj->from;
            $data['task_no']=$proj->task_no;
            $data['department_id']=$proj->department_id;
            $data['employee_id']=$proj->employee;
            $data['monitor_person']=$proj->monitor_person;
            $data['start_date']=$proj->start_date;
            $data['completion_date']=$proj->completion_date;
            $data['priority_no']=$proj->priority_no;
            $data['project_title']=$proj->project_title;
            $data['project_desc']=$proj->project_description;
            $data['status']=$proj->status;
        }

        $data['current_percent']=$this->project_percent($project_id);
     

        $data['updates'] = $this->super_model->select_custom_where("project_details","project_id='$project_id' ORDER BY update_date DESC");

       foreach($this->super_model->select_row_where("project_details","pd_id","$pd_id") AS $pd){
           $update = explode(" ", $pd->update_date);
           $data['upd_date'] = $update[0];
           $uptime = explode(":",$update[1]);
           $data['hour']=$uptime[0];
           $data['minute']=$uptime[1];
           $data['followup_date'] = $pd->followup_date;
           $data['remarks'] = $pd->remarks;
           $data['percent'] = $pd->status_percentage;
           $data['updated_by'] = $pd->updated_by;
       }

       $data['usertype']=$this->session->userdata['usertype'];
       $useremp = $this->session->userdata['employee'];
       $data['emp'] = $this->super_model->select_column_where("employees","employee_name","employee_id",$useremp);


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
        $this->load->view('template/navbar',$data_notif);
        $this->load->view('task/add_task', $data);
        $this->load->view('template/footer_addtask');
    }

    public function project_percent($project_id){
           $rows_detail = $this->super_model->count_rows_where("project_details", "project_id", $project_id);
        if($rows_detail==0){
            $current_percent=0;
        } else {
            $pd_id = $this->super_model->custom_query_single("pd_id", "SELECT pd_id FROM project_details WHERE update_date= (SELECT MAX(update_date) FROM project_details WHERE project_id = '$project_id') AND project_id = '$project_id'");
       
            $current_percent = $this->super_model->select_column_where("project_details", "status_percentage", "pd_id", $pd_id);
        }
        return $current_percent;
    }

    public function insert_task(){
        $rows_head = $this->super_model->count_rows("project_head");
        if($rows_head==0){
            $project_id=1;
        } else {
            $max = $this->super_model->get_max("project_head", "project_id");
            $project_id = $max+1;
        }
        
        $userid = $this->session->userdata['user_id'];
        $useremp = $this->session->userdata['employee'];
        $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
        $completion_date = date('Y-m-d', strtotime($this->input->post('completion_date')));
        $project_title = utf8_encode($this->input->post('project_title'));
        $project_desc = utf8_encode($this->input->post('project_desc'));
        $create_date = date('Y-m-d H:i:s');
        $monitor = $this->input->post('monitor');
        $from = $this->input->post('from');
        $empid='';
        //$count= count($this->input->post('employee'));
        $count= $this->input->post('counterX');
        $mssg = "A new project titled ".$project_title." has been assigned to you.";
        for($x=1; $x<=$count;$x++){
            
            if($this->input->post('employee'.$x)!=''){
                $emp = $this->input->post('employee'.$x);
                $empid .= $emp.",";
            }
            $logs = array(
                'employee_id'=>$useremp,
                'recipient'=>$empid,
                'role'=>'Accountable Person',
                'notification_message'=>$mssg,
                'project_id'=>$project_id,
                'notification_date'=>$create_date
            );
            $this->super_model->insert_into("notification_logs", $logs);
        }

        $mssg_mon = "A new project titled ".$project_title." has been added for monitoring.";
        $logs_monitor = array(
            'employee_id'=>$useremp,
            'recipient'=>$monitor,
            'role'=>'Monitor Person/Task',
            'notification_message'=>$mssg_mon,
            'project_id'=>$project_id,
            'notification_date'=>$create_date
        );
        $this->super_model->insert_into("notification_logs", $logs_monitor);

        $location =$this->input->post('location');
        $monitor_location =$this->super_model->select_column_custom_where("users","employee_id","location_id='$location' AND usertype='2'");
        if($monitor!=$monitor_location)  {
            $logs_monitorloc = array(
                'employee_id'=>$useremp,
                'recipient'=>$monitor_location,
                'role'=>'Monitor Person/Location',
                'notification_message'=>$mssg_mon,
                'project_id'=>$project_id,
                'notification_date'=>$create_date
            );
            $this->super_model->insert_into("notification_logs", $logs_monitorloc);
        }

        $mssg = "A new project titled ".$project_title." has been added.";     
        foreach($this->super_model->select_custom_where('users', "usertype='1' OR usertype='0'") AS $logadmin){
            if($useremp!=$logadmin->employee_id){
                $logs_admin = array(
                    'employee_id'=>$useremp,
                    'recipient'=>$logadmin->employee_id,
                    'role'=>'Admin',
                    'notification_message'=>$mssg,
                    'project_id'=>$project_id,
                    'notification_date'=>$create_date
                );
                $this->super_model->insert_into("notification_logs", $logs_admin);
            }
        }
          
        $empid = substr($empid, 0, -1);

        $taskno_count = $this->super_model->count_rows("project_head");
        if($taskno_count==0){
            $task_no1 =1;
        }else{
            $maxno = $this->super_model->get_max("project_head", "task_no");
            $task_no1 = $maxno+1;
        }
        $task_no = "00".$task_no1;
        $data = array(
            'project_id'=>$project_id,
            'start_date'=>$start_date,
            'completion_date'=>$completion_date,
            'project_title'=>$project_title,
            'project_description'=>$project_desc,
            'task_no'=>$task_no,
            'monitor_person'=>$monitor,
            'from'=>$from,
            'priority_no'=>$this->input->post('priority_no'),
            'location_id'=>$this->input->post('location'),
            'company_id'=>$this->input->post('company'),
            'department_id'=>$this->input->post('department'),
            'employee'=>$empid,
            'status'=>0,
            'create_date'=>$create_date,
            'user_id'=>$userid
        );
        if($this->super_model->insert_into("project_head", $data)){
            $this->session->set_flashdata('msg', 'Project successfully added!');
            redirect(base_url().'task/add_task/'.$project_id.'/update');
        }
    }

    public function update_task(){
        $userid = $this->session->userdata['user_id'];
        $project_id = $this->input->post('project_id');
        $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
        $completion_date = date('Y-m-d', strtotime($this->input->post('completion_date')));
        $project_title = utf8_encode($this->input->post('project_title'));
        $project_desc = utf8_encode($this->input->post('project_desc'));
        $create_date = date('Y-m-d H:i:s');
        //$emp = $this->input->post('employee');
        $from = $this->input->post('from');
        $monitor = $this->input->post('monitor');
        $empid='';
        //$count= count($this->input->post('employee'));
        $count= $this->input->post('counterX');
        $location =$this->super_model->select_column_where("project_head","location_id","project_id",$project_id);
        $monitor_location =$this->super_model->select_column_custom_where("users","employee_id","location_id='$location' AND usertype='2'");
        $useremp = $this->session->userdata['employee'];
        $update_mssg = 'Added an update in project '.$project_title;
        for($x=1; $x<=$count;$x++){
            if($this->input->post('employee'.$x)!=''){
                $emp = $this->input->post('employee'.$x);
                $empid .= $emp.",";
            }

            if($emp!=$useremp){

              $logs = array(
                'employee_id'=>$useremp,
                'recipient'=>$emp,
                'role'=>'Accountable Person',
                'notification_message'=>$update_mssg,
                'project_id'=>$project_id,
                'notification_date'=>$create_date
              );
              $this->super_model->insert_into("notification_logs", $logs);
             }

        }
            $empid = substr($empid, 0, -1);

           $logs_monitor = array(
                'employee_id'=>$useremp,
                'recipient'=>$monitor,
                'role'=>'Monitor Person/Task',
                'notification_message'=>$update_mssg,
                'project_id'=>$project_id,
                'notification_date'=>$create_date
              );
             $this->super_model->insert_into("notification_logs", $logs_monitor);
            
            $logs_monitorloc = array(
                'employee_id'=>$useremp,
                'recipient'=>$monitor_location,
                'role'=>'Monitor Person/Location',
                'notification_message'=>$update_mssg,
                'project_id'=>$project_id,
                'notification_date'=>$create_date
              );
             $this->super_model->insert_into("notification_logs", $logs_monitorloc);

         $data = array(
            'project_id'=>$project_id,
            'start_date'=>$start_date,
            'completion_date'=>$completion_date,
            'project_title'=>$project_title,
            'project_description'=>$project_desc,
            'monitor_person'=>$monitor,
            'from'=>$from,
            'priority_no'=>$this->input->post('priority_no'),
            'location_id'=>$this->input->post('location'),
            'company_id'=>$this->input->post('company'),
            'department_id'=>$this->input->post('department'),
            'employee'=>$empid,
            'create_date'=>$create_date,
            'user_id'=>$userid
        );


        if($this->super_model->update_where("project_head", $data, "project_id", $project_id)){
              $this->session->set_flashdata('msg', 'Project successfully updated!');
              redirect(base_url().'task/add_task/'.$project_id);
        }

    }

    public function update_project(){
        $userid = $this->session->userdata['user_id'];
       
        $project_id = $this->input->post('project_id');
        $update_hour = $this->input->post('update_hour');
        $update_minute = $this->input->post('update_minute');
        $update = date('Y-m-d', strtotime($this->input->post('update_date')));
         $update_date = $update . " " . $update_hour.":".$update_minute;
        $followup_date = date('Y-m-d', strtotime($this->input->post('followup_date')));
        $create_date = date('Y-m-d H:i:s');
        //$emp = $this->input->post('updated_by');
        $empid='';
        $count= $this->input->post('counterX1');
        //$count= count($this->input->post('updated_by'));
      
        for($x=1; $x<=$count;$x++){
            if($this->input->post('updated_by'.$x)!=''){
                $emp = $this->input->post('updated_by'.$x);
                $empid .= $emp.",";
            }
        }

     
        $empid = substr($empid, 0, -1);

        if($this->input->post('percentage')=='100'){
            $data_head = array(
                'status'=>1
            );

            $this->super_model->update_where("project_head", $data_head, "project_id", $project_id);
        }
        $data = array(
            'project_id'=>$project_id,
            'remarks'=>utf8_encode($this->input->post('remarks')),
            'status_percentage'=>$this->input->post('percentage'),
            'update_date'=>$update_date,
            'followup_date'=>$followup_date,
            'updated_by'=>$empid,
            'create_date'=>$create_date,
            'user_id'=>$userid
        );
          if($this->super_model->insert_into("project_details", $data)){
              $this->session->set_flashdata('msg_updates', 'Project updates successfully added!');
              redirect(base_url().'task/add_task/'.$project_id.'/update');
        }
    }

    public function update_changes_project(){
        $userid = $this->session->userdata['user_id'];
        $project_id = $this->input->post('project_id');
        $pd_id = $this->input->post('pd_id');
        $update_date = date('Y-m-d', strtotime($this->input->post('update_date')));
        $followup_date = date('Y-m-d', strtotime($this->input->post('followup_date')));
        $create_date = date('Y-m-d H:i:s');
        //$emp = $this->input->post('updated_by');
        $empid='';
        //$count= count($this->input->post('updated_by'));
        $count= $this->input->post('counterX1');

        for($x=1; $x<=$count;$x++){
            if($this->input->post('updated_by'.$x)!=''){
                $emp = $this->input->post('updated_by'.$x);
                $empid .= $emp.",";
            }
        }

        $empid = substr($empid, 0, -1);

        $data = array(
            'remarks'=>utf8_encode($this->input->post('remarks')),
            'status_percentage'=>$this->input->post('percentage'),
            'update_date'=>$update_date,
            'followup_date'=>$followup_date,
            'updated_by'=>$empid,
            'create_date'=>$create_date,
            'user_id'=>$userid
        );
        if($this->super_model->update_where("project_details", $data, "pd_id", $pd_id)){
              $this->session->set_flashdata('msg_updates', 'Project updates successfully changed!');
              redirect(base_url().'task/add_task/'.$project_id.'/update');
        }
    }

    public function get_updated_name($employee_id){
        $name = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee_id);
        return $name;
    }   

    public function task_list()
    {
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
        $this->load->view('template/navbar',$data_notif);
        $this->load->view('task/task_list');
        $this->load->view('template/footer');
    }


    public function project_completed($project_id){
        $completed_date = $this->super_model->custom_query_single("completed_date", "SELECT MAX(update_date) AS completed_date FROM project_details WHERE project_id = '$project_id'");
       
        return $completed_date;
    }

      public function date_diff($date1, $date2){
        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $diff = $ts2 - $ts1;
        return abs(round($diff / 86400)); 
    }

       public function latest_extension($project_id){
        $due = $this->super_model->custom_query_single("due","SELECT MAX(extension_date) as due FROM project_extension WHERE project_id = '$project_id'");
        return $due;
    }
}
