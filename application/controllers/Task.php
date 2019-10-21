<?php
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

    public function add_task()
    {
        $project_id = $this->uri->segment(3);
        $data['project_id'] = $project_id;
        $data['company'] = $this->super_model->select_all_order_by("company", "company_name", "ASC");
        $data['department'] = $this->super_model->select_all_order_by("department", "department_name", "ASC");
        $data['employee'] = $this->super_model->select_all_order_by("employees", "employee_name", "ASC");

        foreach($this->super_model->select_row_where("project_head", "project_id", $project_id) AS $proj){
            $data['company_id']=$proj->company_id;
            $data['department_id']=$proj->department_id;
            $data['employee_id']=$proj->employee;
            $data['start_date']=$proj->start_date;
            $data['completion_date']=$proj->completion_date;
            $data['priority_no']=$proj->priority_no;
            $data['project_title']=$proj->project_title;
            $data['project_desc']=$proj->project_description;

        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('task/add_task', $data);
        $this->load->view('template/footer');
    }

    public function insert_task(){

        $rows_head = $this->super_model->count_rows("project_head");
        if($rows_head==0){
            $project_id=1;
        } else {
            $max = $this->super_model->get_max("project_head", "project_id");
            $project_id = $max+1;
        }

        $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
        $completion_date = date('Y-m-d', strtotime($this->input->post('completion_date')));
        $project_title = utf8_encode($this->input->post('project_title'));
        $project_desc = utf8_encode($this->input->post('project_desc'));
        $create_date = date('Y-m-d H:i:s');
        $emp = $this->input->post('employee');
        $empid='';
        $count= count($this->input->post('employee'));
        for($x=0; $x<$count;$x++){
            $empid .= $emp[$x].", ";
        }
        $empid = substr($empid, 0, -2);
       
       $data = array(
            'project_id'=>$project_id,
            'start_date'=>$start_date,
            'completion_date'=>$completion_date,
            'project_title'=>$project_title,
            'project_description'=>$project_desc,
            'priority_no'=>$this->input->post('priority_no'),
            'company_id'=>$this->input->post('company'),
            'department_id'=>$this->input->post('department'),
            'employee'=>$empid,
            'status'=>1,
            'create_date'=>$create_date
        );

        if($this->super_model->insert_into("project_head", $data)){
              $this->session->set_flashdata('msg', 'Project successfully added!');
              redirect(base_url().'task/add_task/'.$project_id);
        }
    }

    public function update_task(){

        $project_id = $this->input->post('project_id');
        $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
        $completion_date = date('Y-m-d', strtotime($this->input->post('completion_date')));
        $project_title = utf8_encode($this->input->post('project_title'));
        $project_desc = utf8_encode($this->input->post('project_desc'));
        $create_date = date('Y-m-d H:i:s');
        $emp = $this->input->post('employee');
        $empid='';
        $count= count($this->input->post('employee'));
        for($x=0; $x<$count;$x++){
            $empid .= $emp[$x].", ";
        }
        $empid = substr($empid, 0, -2);

         $data = array(
            'project_id'=>$project_id,
            'start_date'=>$start_date,
            'completion_date'=>$completion_date,
            'project_title'=>$project_title,
            'project_description'=>$project_desc,
            'priority_no'=>$this->input->post('priority_no'),
            'company_id'=>$this->input->post('company'),
            'department_id'=>$this->input->post('department'),
            'employee'=>$empid,
            'status'=>1,
            'create_date'=>$create_date
        );


        if($this->super_model->update_where("project_head", $data, "project_id", $project_id)){
              $this->session->set_flashdata('msg', 'Project successfully updated!');
              redirect(base_url().'task/add_task/'.$project_id);
        }

    }

    public function task_list()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('task/task_list');
        $this->load->view('template/footer');
    }
}
