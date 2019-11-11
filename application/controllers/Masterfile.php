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
                $department=$d->department_id;
                $company=$d->company_id;
                $usertype=$d->usertype;
            }
            $newdata = array(
               'user_id'=> $userid,
               'username'=> $username,
               'fullname'=> $fullname,
               'department'=> $department,
               'company'=> $company,
               'usertype'=> $usertype,
               'logged_in'=> TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url().'masterfile/dashboard/');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Username and password do not exist! Please contact your administrator.');
            $this->load->view('masterfile/login');    
        }
	}

    public function user_logout(){
        $this->session->sess_destroy();
        $this->load->view('masterfile/login');
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."masterfile/index'; </script>";
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
             $this->session->set_flashdata('msg', 'Employee successfully added!');
             redirect(base_url().'masterfile/employee_list');
        }
    }

    public function edit_employee(){
        $data = array(
            'employee_name'=>$this->input->post('employee'),
        );
        $employee_id = $this->input->post('employee_id');
        if($this->super_model->update_where('employees', $data, 'employee_id', $employee_id)){
             $this->session->set_flashdata('msg', 'Employee successfully updated!');
             redirect(base_url().'masterfile/employee_list');
        }
    }

    public function delete_employee(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('employees', 'employee_id', $id)){
             $this->session->set_flashdata('msg', 'Employee successfully deleted!');
             redirect(base_url().'masterfile/employee_list');
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
            $this->session->set_flashdata('msg', 'Company successfully added!');
             redirect(base_url().'masterfile/company_list');
        }
    }

    public function edit_company(){
        $data = array(
            'company_name'=>$this->input->post('company'),
        );
        $company_id = $this->input->post('company_id');
        if($this->super_model->update_where('company', $data, 'company_id', $company_id)){
            $this->session->set_flashdata('msg', 'Company successfully updated!');
             redirect(base_url().'masterfile/company_list');
        }
    }

    public function delete_company(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('company', 'company_id', $id)){
            $this->session->set_flashdata('msg', 'Company successfully deleted!');
             redirect(base_url().'masterfile/company_list');
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

    public function get_company_name($company_id){
        $compname = $this->super_model->select_column_where("company", "company_name", "company_id", $company_id);
        return $compname;
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
            $this->session->set_flashdata('msg', 'Department successfully added!');
             redirect(base_url().'masterfile/department_list');
        }
    }

    public function edit_department(){
        $data = array(
            'department_name'=>$this->input->post('department'),
        );
        $department_id = $this->input->post('department_id');
        if($this->super_model->update_where('department', $data, 'department_id', $department_id)){
            $this->session->set_flashdata('msg', 'Department successfully updated!');
             redirect(base_url().'masterfile/department_list');
        }
    }

    public function delete_department(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('department', 'department_id', $id)){
            $this->session->set_flashdata('msg', 'Department successfully deleted!');
             redirect(base_url().'masterfile/department_list');
        }
    }

    public function dateDifference($date_1 , $date_2){
        $datetime2 = date_create($date_2);
        $datetime1 = date_create($date_1 );
        $interval = date_diff($datetime2, $datetime1);
        return $interval->format('%R%a');  
    }

    public function dashboard()
    {
        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];
        if($usertype==1){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='0' AND priority_no = '1' ORDER BY completion_date ASC");
        } else if($usertype==2){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='0' AND priority_no = '1' AND company_id = '$usercomp' ORDER BY completion_date ASC");
        } else if($usertype==3){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='0' AND priority_no = '1' AND department_id = '$userdept' ORDER BY completion_date ASC");
        }
        $company_id = $this->super_model->select_column_custom_where("project_head","company_id","status='0' AND priority_no = '1' ORDER BY completion_date ASC");
        $data['companys']=$this->super_model->select_column_where("company","company_name","company_id",$company_id);

        if($usertype==1){
            foreach($this->super_model->select_custom_where("reminders","status = '0' ORDER BY due_date ASC") AS $rem){
                $employee = $this->super_model->select_column_where("employees","employee_name","employee_id",$rem->employee_id);
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($rem->due_date, $today). " day/s left";
                $data['reminders'][]=array(
                    'reminder_id'=>$rem->reminder_id,
                    'project_id'=>0,
                    'notes'=>$rem->notes,
                    'followup_date'=>'',
                    'employee'=>$employee,
                    'due_date'=>$rem->due_date,
                    'company_id'=>0,
                    'days_left'=>$days_left,
                );
            }

            foreach($this->super_model->custom_query("SELECT * FROM project_head WHERE status='0' AND DATEDIFF(completion_date, NOW()) <= '30'") AS $due){
                $employee = explode(", ", $due->employee);              
                $count = count($employee);
                $emp='';
                for($x=0;$x<$count;$x++){
                    $emp.= $this->get_updated_name($employee[$x]). ", ";
                } 
                $employees = substr($emp, 0, -2);
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($due->completion_date, $today). " day/s left";
                //$followup_date = $this->super_model->select_column_where("project_details","followup_date","project_id",$due->project_id);
                $data['reminders'][]=array(
                    'reminder_id'=>0,
                    'project_id'=>$due->project_id,
                    'notes'=>$due->project_title,
                    'followup_date'=>'',
                    'employee'=>$employees,
                    'due_date'=>$due->completion_date,
                    'company_id'=>$due->company_id,
                    'days_left'=>$days_left,
                );
            }

            foreach($this->super_model->custom_query("SELECT * FROM project_details WHERE DATEDIFF(followup_date, NOW()) <= '7'") AS $fol){
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($fol->followup_date, $today). " day/s left";
                foreach($this->super_model->select_row_where("project_head","project_id",$fol->project_id) AS $head){
                    $employees = $this->super_model->select_column_where("employees","employee_name","employee_id",$head->monitor_person);
                    $data['followup'][]=array(
                        'notes'=>$head->project_title,
                        'followup_date'=>$fol->followup_date,
                        'employee'=>$employees,
                        'company_id'=>$head->company_id,
                        'days_left'=>$days_left,
                    );
                }
            }
        } else if($usertype==2){

              foreach($this->super_model->select_custom_where("reminders","status = '0' AND employee_id = '$userid' ORDER BY due_date ASC") AS $rem){
                $employee = $this->super_model->select_column_where("employees","employee_name","employee_id",$rem->employee_id);
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($rem->due_date, $today). " day/s left";
                $data['reminders'][]=array(
                    'reminder_id'=>$rem->reminder_id,
                    'project_id'=>0,
                    'notes'=>$rem->notes,
                    'followup_date'=>'',
                    'employee'=>$employee,
                    'due_date'=>$rem->due_date,
                    'company_id'=>0,
                    'days_left'=>$days_left,
                );
            }

            foreach($this->super_model->custom_query("SELECT * FROM project_head WHERE status='0' AND DATEDIFF(completion_date, NOW()) <= '30' AND company_id = '$usercomp'") AS $due){
                $employee = explode(", ", $due->employee);              
                $count = count($employee);
                $emp='';
                for($x=0;$x<$count;$x++){
                    $emp.= $this->get_updated_name($employee[$x]). ", ";
                } 
                $employees = substr($emp, 0, -2);
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($due->completion_date, $today). " day/s left";
                //$followup_date = $this->super_model->select_column_where("project_details","followup_date","project_id",$due->project_id);
                $data['reminders'][]=array(
                    'reminder_id'=>0,
                    'project_id'=>$due->project_id,
                    'notes'=>$due->project_title,
                    'followup_date'=>'',
                    'employee'=>$employees,
                    'due_date'=>$due->completion_date,
                    'company_id'=>$due->company_id,
                    'days_left'=>$days_left,
                );
            }

            foreach($this->super_model->custom_query("SELECT pd.* FROM project_details pd INNER JOIN project_head ph ON pd.project_id = ph.project_id WHERE DATEDIFF(pd.followup_date, NOW()) <= '7' AND company_id ='$usercomp'") AS $fol){
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($fol->followup_date, $today). " day/s left";
                foreach($this->super_model->select_row_where("project_head","project_id",$fol->project_id) AS $head){
                    $employees = $this->super_model->select_column_where("employees","employee_name","employee_id",$head->monitor_person);
                    $data['followup'][]=array(
                        'notes'=>$head->project_title,
                        'followup_date'=>$fol->followup_date,
                        'employee'=>$employees,
                        'company_id'=>$head->company_id,
                        'days_left'=>$days_left,
                    );
                }
            }

        }  else if($usertype==3){

              foreach($this->super_model->select_custom_where("reminders","status = '0' AND employee_id = '$userid' ORDER BY due_date ASC") AS $rem){
                $employee = $this->super_model->select_column_where("employees","employee_name","employee_id",$rem->employee_id);
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($rem->due_date, $today). " day/s left";
                $data['reminders'][]=array(
                    'reminder_id'=>$rem->reminder_id,
                    'project_id'=>0,
                    'notes'=>$rem->notes,
                    'followup_date'=>'',
                    'employee'=>$employee,
                    'due_date'=>$rem->due_date,
                    'company_id'=>0,
                    'days_left'=>$days_left,
                );
            }

            foreach($this->super_model->custom_query("SELECT * FROM project_head WHERE status='0' AND DATEDIFF(completion_date, NOW()) <= '30' AND department_id = '$userdept'") AS $due){
                $employee = explode(", ", $due->employee);              
                $count = count($employee);
                $emp='';
                for($x=0;$x<$count;$x++){
                    $emp.= $this->get_updated_name($employee[$x]). ", ";
                } 
                $employees = substr($emp, 0, -2);
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($due->completion_date, $today). " day/s left";
                //$followup_date = $this->super_model->select_column_where("project_details","followup_date","project_id",$due->project_id);
                $data['reminders'][]=array(
                    'reminder_id'=>0,
                    'project_id'=>$due->project_id,
                    'notes'=>$due->project_title,
                    'followup_date'=>'',
                    'employee'=>$employees,
                    'due_date'=>$due->completion_date,
                    'company_id'=>$due->company_id,
                    'days_left'=>$days_left,
                );
            }

            foreach($this->super_model->custom_query("SELECT pd.* FROM project_details pd INNER JOIN project_head ph ON pd.project_id = ph.project_id WHERE DATEDIFF(pd.followup_date, NOW()) <= '7' AND department_id ='$userdept'") AS $fol){
                $today=date("Y-m-d");
                $days_left= $this->dateDifference($fol->followup_date, $today). " day/s left";
                foreach($this->super_model->select_row_where("project_head","project_id",$fol->project_id) AS $head){
                    $employees = $this->super_model->select_column_where("employees","employee_name","employee_id",$head->monitor_person);
                    $data['followup'][]=array(
                        'notes'=>$head->project_title,
                        'followup_date'=>$fol->followup_date,
                        'employee'=>$employees,
                        'company_id'=>$head->company_id,
                        'days_left'=>$days_left,
                    );
                }
            }

        }

        $data['employees'] = $this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/dashboard', $data);
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
             redirect(base_url().'masterfile/dashboard');
        }
    }

     public function done_reminder(){
        $reminder_id = $this->uri->segment(3);
        $timestamp = date('Y-m-d H:i:s');
        $data = array(
            'status'=>2,
            'done_date'=>$timestamp,
        );
        if($this->super_model->update_where("reminders", $data, "reminder_id",$reminder_id)){
             $this->session->set_flashdata('msg', 'Reminder tagged as done.');
             redirect(base_url().'masterfile/dashboard');
        }
    }

    public function cancel_reminder(){
        $reason = trim($this->input->post('reason')," ");
        $cancel_date = trim($this->input->post('cancel_date')," ");
        $trigger = $this->input->post('trigger');
        if($trigger=='Reminder'){
            $data = array(
                'cancel_reason'=>$reason,
                'cancel_date'=>$cancel_date,
                'status'=>1,
            );
            $id = $this->input->post('reminder_id');
            if($this->super_model->update_where('reminders', $data, 'reminder_id', $id)){
                $this->session->set_flashdata('msg', 'Reminder successfully cancelled!');
                redirect(base_url().'index.php/masterfile/dashboard/');
            }
        }else {
            $data = array(
                'cancel_reason'=>$reason,
                'cancel_date'=>$cancel_date,
                'status'=>2,
            );
            $id = $this->input->post('reminder_id');
            if($this->super_model->update_where('project_head', $data, 'project_id', $id)){
                $this->session->set_flashdata('msg', 'Reminder cuccessfully cancelled!');
                redirect(base_url().'index.php/masterfile/dashboard/');
            }
        }
    }

    public function user_list(){
        $data['usertype']= $this->session->userdata['usertype'];
        $data['company'] =  $this->super_model->select_all_order_by('company', 'company_name', 'ASC');
        $data['department'] =  $this->super_model->select_all_order_by('department', 'department_name', 'ASC');
        foreach($this->super_model->select_all_order_by('users','fullname', 'ASC') AS $users){
            $data['users'][]=array(
                'id'=>$users->user_id,
                'fullname'=>$users->fullname,
                'username'=>$users->username,
                'company'=>$this->super_model->select_column_where("company","company_name","company_id",$users->company_id),
                'department'=>$this->super_model->select_column_where("department","department_name","department_id",$users->department_id),
                'status'=>$users->status,
                'email'=>$users->email,
                'usertype'=>$users->usertype,
                'company_id'=>$users->company_id,
                'department_id'=>$users->department_id,
            );
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/user_list', $data);
        $this->load->view('template/footer');
    }

    public function checkusername(){
        $username = $this->input->post('username');
        $count_exist = $this->super_model->count_rows_where('users', 'username', $username);
        if($count_exist>0){
            echo '1';
        } else {
            echo '0';
        }
    }

    public function add_user(){
        $pw=md5('12345');
        $data=array(
            'fullname'=>$this->input->post('employee_name'),
            'username'=>$this->input->post('username'),
            'password'=>$pw,
            'company_id'=>$this->input->post('company'),
            'department_id'=>$this->input->post('department'),
            'status'=>$this->input->post('status'),
            'email'=>$this->input->post('email'),
            'usertype'=>$this->input->post('usertype'),
        );
        if($this->super_model->insert_into("users", $data)){
             redirect(base_url().'masterfile/user_list');
        }

    }

    public function update_user(){
        $id = $this->input->post('user_id');
        $data=array(
            'fullname'=>$this->input->post('employee_name'),
            'company_id'=>$this->input->post('company'),
            'department_id'=>$this->input->post('department'),
            'status'=>$this->input->post('status'),
            'email'=>$this->input->post('email'),
            'usertype'=>$this->input->post('usertype'),
        );
        if($this->super_model->update_where("users", $data, "user_id", $id)){
             redirect(base_url().'masterfile/user_list');
        }

    }
    public function change_password(){
        $data['company'] =  $this->super_model->select_all_order_by('company', 'company_name', 'ASC');
        $data['department'] =  $this->super_model->select_all_order_by('department', 'department_name', 'ASC');
        $userid = $this->session->userdata['user_id'];
       
        $data['userid'] = $this->session->userdata['user_id'];
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/change_password',$data);
        $this->load->view('template/footer');
    }

    public function update_password(){
        $oldpw = md5($this->input->post('old_password'));
        $newpw = $this->input->post('new_password');
        $userid = $this->input->post('user_id');

        $old = $this->super_model->select_column_where("users","password","user_id",$userid);
        $opw = md5($old);

        if($opw != $oldpw){
            echo "error";
        } else {
            $hashed = md5($newpw);
           
            $data=array(
                'password'=>$hashed
            );
             if($this->super_model->update_where("users", $data, "user_id", $userid)){
                echo "ok";
             }

        }

    }
}
