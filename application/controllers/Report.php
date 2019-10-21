<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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

    public function report_list()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/report_list');
        $this->load->view('template/footer');
    }

    public function pending_list()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/pending_list');
        $this->load->view('template/footer');
    }

    public function completed_list()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/completed_list');
        $this->load->view('template/footer');
    }

    public function cancelled_list()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/cancelled_list');
        $this->load->view('template/footer');
    }

    public function get_updated_name($employee_id){
        $name = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee_id);
        return $name;
    }   
    
    public function view_task()
    {
        $project_id = $this->uri->segment(3);
        foreach($this->super_model->select_row_where('project_head', 'project_id', $project_id) AS $proj){
            $data['start_date']=$proj->start_date;
            $data['completion_date']=$proj->completion_date;
            $data['project_title']=$proj->project_title;
            $data['project_description']=$proj->project_description;
            $data['priority_no']=$proj->priority_no;
            $data['company']=$this->super_model->select_column_where("company", "company_name", "company_id", $proj->company_id);
            $data['department']=$this->super_model->select_column_where("department", "department_name", "department_id", $proj->department_id);
            $data['employee']=$proj->employee;
            if($proj->status==0){
                $data['status']='Pending';
            } else if($proj->status==1){
                $data['status']='Done';
            } else if($proj->status==2){
                $data['status']='Cancelled';
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/view_task',$data);
        $this->load->view('template/footer');
    }
}
