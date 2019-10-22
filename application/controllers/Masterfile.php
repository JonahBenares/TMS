<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterfile extends CI_Controller {

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

    public function index(){  
        $this->load->view('masterfile/login');
    }

	public function login(){
		$username=$this->input->post('username');
        $password=$this->input->post('password');
        $count=$this->super_model->login_user($username,$password);
        if($count>0){   
            $password1 =md5($this->input->post('password'));
            $fetch=$this->super_model->select_custom_where("users", "username = '$username' AND (password = '$password' OR password = '$password1')");
            foreach($fetch AS $d){
                $userid = $d->user_id;
                $username = $d->username;
                $fullname = $d->fullname;
            }
            $newdata = array(
               'user_id'=> $userid,
               'username'=> $username,
               'fullname'=> $fullname,
               'logged_in'=> TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url().'index.php/masterfile/dashboard/');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Username And Password Do not Exist!');
            $this->load->view('masterfile/login');    
        }
	}

    public function user_logout(){
        $this->session->sess_destroy();
        $this->load->view('masterfile/login');
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."index.php/masterfile/index'; </script>";
    }

	public function employee_list()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
		$this->load->view('masterfile/employee_list',$data);
		$this->load->view('template/footer');
	}

    public function insert_employee(){
        $employee = trim($this->input->post('employee')," ");
        $data = array(
            'employee_name'=>$employee,
        );
        if($this->super_model->insert_into("employees", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."masterfile/employee_list'; </script>";
        }
    }

    public function edit_employee(){
        $data = array(
            'employee_name'=>$this->input->post('employee'),
        );
        $employee_id = $this->input->post('employee_id');
        if($this->super_model->update_where('employees', $data, 'employee_id', $employee_id)){
            echo "<script>alert('Successfully Updated!'); window.location ='".base_url()."masterfile/employee_list';</script>";
        }
    }

    public function delete_employee(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('employees', 'employee_id', $id)){
            echo "<script>alert('Succesfully Deleted'); window.location ='".base_url()."masterfile/employee_list'; </script>";
        }
    }

    public function company_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $this->load->view('masterfile/company_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_company(){
        $company = trim($this->input->post('company')," ");
        $data = array(
            'company_name'=>$company,
        );
        if($this->super_model->insert_into("company", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."masterfile/company_list'; </script>";
        }
    }

    public function edit_company(){
        $data = array(
            'company_name'=>$this->input->post('company'),
        );
        $company_id = $this->input->post('company_id');
        if($this->super_model->update_where('company', $data, 'company_id', $company_id)){
            echo "<script>alert('Successfully Updated!'); window.location ='".base_url()."masterfile/company_list';</script>";
        }
    }

    public function delete_company(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('company', 'company_id', $id)){
            echo "<script>alert('Succesfully Deleted'); window.location ='".base_url()."masterfile/company_list'; </script>";
        }
    }

    public function department_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");
        $this->load->view('masterfile/department_list',$data);
        $this->load->view('template/footer');
    }


    public function get_updated_name($employee_id){
        $name = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee_id);
        return $name;
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
    

    public function insert_department(){
        $department = trim($this->input->post('department')," ");
        $data = array(
            'department_name'=>$department,
        );
        if($this->super_model->insert_into("department", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."masterfile/department_list'; </script>";
        }
    }

    public function edit_department(){
        $data = array(
            'department_name'=>$this->input->post('department'),
        );
        $department_id = $this->input->post('department_id');
        if($this->super_model->update_where('department', $data, 'department_id', $department_id)){
            echo "<script>alert('Successfully Updated!'); window.location ='".base_url()."masterfile/department_list';</script>";
        }
    }

    public function delete_department(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('department', 'department_id', $id)){
            echo "<script>alert('Succesfully Deleted'); window.location ='".base_url()."masterfile/department_list'; </script>";
        }
    }

    public function dashboard()
    {

        $data['projects'] = $this->super_model->select_custom_where("project_head", "status='0' AND priority_no = '1' ORDER BY completion_date ASC");
        foreach($this->super_model->select_custom_where("reminders","status = '0' ORDER BY due_date ASC") AS $rem){
            $employee = $this->super_model->select_column_where("employees","employee_name","employee_id",$rem->employee_id);
            $data['reminders'][]=array(
                'reminder_id'=>$rem->reminder_id,
                'notes'=>$rem->notes,
                'employee'=>$employee,
                'due_date'=>$rem->due_date,
            );
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/dashboard', $data);
        $this->load->view('template/footer');
    }
}
