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

    public function pending_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];


        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");

        if($usertype==1){
         $data['pending'] = $this->super_model->select_custom_where("project_head", "status='0' ORDER BY start_date DESC");
        } else if($usertype==2) {
          $data['pending'] = $this->super_model->select_custom_where("project_head", "status='0' AND company_id = '$usercomp' ORDER BY start_date DESC");
        } else if($usertype==3) {
          $data['pending'] = $this->super_model->select_custom_where("project_head", "status='0' AND department_id = '$userdept' ORDER BY start_date DESC");
        }

        $this->load->view('report/pending_list',$data);
        $this->load->view('template/footer');
    }

    public function search_pending(){
        if(!empty($this->input->post('start_date'))){
            $data['start_date'] = $this->input->post('start_date');
        } else {
            $data['start_date']= "null";
        }

        if(!empty($this->input->post('completion_date'))){
            $data['completion_date'] = $this->input->post('completion_date');
        } else {
            $data['completion_date']= "null";
        }

        if(!empty($this->input->post('company'))){
            $data['company'] = $this->input->post('company');
        } else {
            $data['company']= "null";
        }

        if(!empty($this->input->post('department'))){
            $data['department'] = $this->input->post('department');
        } else {
            $data['department']= "null";
        }

        if(!empty($this->input->post('employee'))){
            $data['employee'] = $this->input->post('employee');
        } else {
            $data['employee']= "null";
        }

        if(!empty($this->input->post('priority'))){
            $data['priority'] = $this->input->post('priority');
        } else {
            $data['priority']= "null";
        }

        if(!empty($this->input->post('title'))){
            $data['title'] = $this->input->post('title');
        } else {
            $data['title']= "null";
        }

        $sql="";
        $filter = "";

        if(!empty($this->input->post('start_date'))){
            $start_date = $this->input->post('start_date');
            $sql.=" start_date LIKE '%$start_date%' AND";
            $filter .= "Start Date - ".$start_date.", ";
        }

        if(!empty($this->input->post('completion_date'))){
            $completion_date = $this->input->post('completion_date');
            $sql.=" completion_date LIKE '%$completion_date%' AND";
            $filter .= "Completion Date - ".$completion_date.", ";
        }

        if(!empty($this->input->post('company'))){
            $company = $this->input->post('company');
            $sql.=" company_id = '$company' AND";
            $comp = $this->super_model->select_column_where("company", "company_name", "company_id", $company);
            $filter .= "Company - ".$comp.", ";
        }

        if(!empty($this->input->post('department'))){
            $department = $this->input->post('department');
            $sql.=" department_id = '$department' AND";
            $dept = $this->super_model->select_column_where("department", "department_name", "department_id", $department);
            $filter .= "Department - ".$dept.", ";
        }

        
        if(!empty($this->input->post('employee'))){
            $employee = $this->input->post('employee');
            $q='';
            $emp='';
            for($x=0;$x<count($employee); $x++){
                $q.=' instr(employee, '.$employee[$x].') OR';
                $emp.= $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee[$x]) .", ";
            }
            $q = substr($q, 0, -3);
            $emp = substr($emp, 0, -2);
            $sql.=" $q AND";
        
            $filter .= "Employees - ".$emp.", ";
        }

        if(!empty($this->input->post('priority'))){
            $priority = $this->input->post('priority');
            $sql.=" priority_no = '$priority' AND";
            $filter .= "Priority No. - ".$priority.", ";
        }

        if(!empty($this->input->post('title'))){
            $title = $this->input->post('title');
            $sql.=" project_title LIKE '%$title%' AND";
            $filter .= "Project Title - ".$title.", ";
        }

        $query=substr($sql, 0, -3);
        $data['filt']=substr($filter, 0, -2);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");

        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];

        if($usertype==1){
            $data['pending'] = $this->super_model->select_custom_where("project_head", "status='0' AND $query");
        } else if($usertype==2){
            $data['pending'] = $this->super_model->select_custom_where("project_head", "status='0' AND company_id='$usercomp' AND $query");
        } else if($usertype==3){
            $data['pending'] = $this->super_model->select_custom_where("project_head", "status='0' AND department_id='$userdept' AND $query");
        }
        $this->load->view('report/pending_list',$data);
        $this->load->view('template/footer');
    }

    public function completed_list()
    {   
        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];

        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");


        if($usertype==1){
             $data['projects'] = $this->super_model->select_custom_where("project_head", "status='1' ORDER BY start_date DESC");
        } else if($usertype==2){
             $data['projects'] = $this->super_model->select_custom_where("project_head", "status='1' AND company_id='$usercomp' ORDER BY start_date DESC");
        } else if($usertype==3){
             $data['projects'] = $this->super_model->select_custom_where("project_head", "status='1' AND department_id='$userdept' ORDER BY start_date DESC");
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/completed_list',$data);
        $this->load->view('template/footer');
    }

    public function search_completion(){
        if(!empty($this->input->post('start_date'))){
            $data['start_date'] = $this->input->post('start_date');
        } else {
            $data['start_date']= "null";
        }

        if(!empty($this->input->post('completion_date'))){
            $data['completion_date'] = $this->input->post('completion_date');
        } else {
            $data['completion_date']= "null";
        }

        if(!empty($this->input->post('company'))){
            $data['company'] = $this->input->post('company');
        } else {
            $data['company']= "null";
        }

        if(!empty($this->input->post('department'))){
            $data['department'] = $this->input->post('department');
        } else {
            $data['department']= "null";
        }

        if(!empty($this->input->post('employee'))){
            $data['employee'] = $this->input->post('employee');
        } else {
            $data['employee']= "null";
        }

        if(!empty($this->input->post('priority'))){
            $data['priority'] = $this->input->post('priority');
        } else {
            $data['priority']= "null";
        }

        if(!empty($this->input->post('title'))){
            $data['title'] = $this->input->post('title');
        } else {
            $data['title']= "null";
        }

        $sql="";
        $filter = "";

        if(!empty($this->input->post('start_date'))){
            $start_date = $this->input->post('start_date');
            $sql.=" start_date LIKE '%$start_date%' AND";
            $filter .= "Start Date - ".$start_date.", ";
        }

        if(!empty($this->input->post('completion_date'))){
            $completion_date = $this->input->post('completion_date');
            $sql.=" completion_date LIKE '%$completion_date%' AND";
            $filter .= "Completion Date - ".$completion_date.", ";
        }

        if(!empty($this->input->post('company'))){
            $company = $this->input->post('company');
            $sql.=" company_id = '$company' AND";
            $comp = $this->super_model->select_column_where("company", "company_name", "company_id", $company);
            $filter .= "Company - ".$comp.", ";
        }

        if(!empty($this->input->post('department'))){
            $department = $this->input->post('department');
            $sql.=" department_id = '$department' AND";
            $dept = $this->super_model->select_column_where("department", "department_name", "department_id", $department);
            $filter .= "Department - ".$dept.", ";
        }

       
        if(!empty($this->input->post('employee'))){
            $employee = $this->input->post('employee');
            $q='';
            $emp='';
            for($x=0;$x<count($employee); $x++){
                $q.=' instr(employee, '.$employee[$x].') OR';
                $emp.= $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee[$x]) .", ";
            }
            $q = substr($q, 0, -3);
            $emp = substr($emp, 0, -2);
            $sql.=" $q AND";
        
            $filter .= "Employees - ".$emp.", ";
        }

        if(!empty($this->input->post('priority'))){
            $priority = $this->input->post('priority');
            $sql.=" priority_no = '$priority' AND";
            $filter .= "Priority No. - ".$priority.", ";
        }

        if(!empty($this->input->post('title'))){
            $title = $this->input->post('title');
            $sql.=" project_title LIKE '%$title%' AND";
            $filter .= "Project Title - ".$title.", ";
        }

        $query=substr($sql, 0, -3);
        $data['filt']=substr($filter, 0, -2);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");

        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];

        if($usertype==1){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='1' AND $query");
        } else if($usertype==2){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='1' AND company_id='$usercomp' AND $query");
        } else if($usertype==3){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='1' AND department_id='$userdept' AND $query");
        }


        $this->load->view('report/completed_list',$data);
        $this->load->view('template/footer');
    }

    public function cancelled_list()
    {
        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];

        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");
        if($usertype==1){
          $data['projects'] = $this->super_model->select_custom_where("project_head", "status='2' ORDER BY start_date DESC");
        } else if($usertype==2){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='2' AND company_id='$usercomp' ORDER BY start_date DESC");
        } else if($usertype==3){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='2' AND department_id='$userdept' ORDER BY start_date DESC");
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/cancelled_list', $data);
        $this->load->view('template/footer');
    }

    public function search_cancelled(){
        if(!empty($this->input->post('start_date'))){
            $data['start_date'] = $this->input->post('start_date');
        } else {
            $data['start_date']= "null";
        }

        if(!empty($this->input->post('completion_date'))){
            $data['completion_date'] = $this->input->post('completion_date');
        } else {
            $data['completion_date']= "null";
        }

        if(!empty($this->input->post('company'))){
            $data['company'] = $this->input->post('company');
        } else {
            $data['company']= "null";
        }

        if(!empty($this->input->post('department'))){
            $data['department'] = $this->input->post('department');
        } else {
            $data['department']= "null";
        }

        if(!empty($this->input->post('employee'))){
            $data['employee'] = $this->input->post('employee');
        } else {
            $data['employee']= "null";
        }

        if(!empty($this->input->post('priority'))){
            $data['priority'] = $this->input->post('priority');
        } else {
            $data['priority']= "null";
        }

        if(!empty($this->input->post('title'))){
            $data['title'] = $this->input->post('title');
        } else {
            $data['title']= "null";
        }

        $sql="";
        $filter = "";

        if(!empty($this->input->post('start_date'))){
            $start_date = $this->input->post('start_date');
            $sql.=" start_date LIKE '%$start_date%' AND";
            $filter .= "Start Date - ".$start_date.", ";
        }

        if(!empty($this->input->post('completion_date'))){
            $completion_date = $this->input->post('completion_date');
            $sql.=" completion_date LIKE '%$completion_date%' AND";
            $filter .= "Completion Date - ".$completion_date.", ";
        }

        if(!empty($this->input->post('company'))){
            $company = $this->input->post('company');
            $sql.=" company_id = '$company' AND";
            $comp = $this->super_model->select_column_where("company", "company_name", "company_id", $company);
            $filter .= "Company - ".$comp.", ";
        }

        if(!empty($this->input->post('department'))){
            $department = $this->input->post('department');
            $sql.=" department_id = '$department' AND";
            $dept = $this->super_model->select_column_where("department", "department_name", "department_id", $department);
            $filter .= "Department - ".$dept.", ";
        }

        
        if(!empty($this->input->post('employee'))){
            $employee = $this->input->post('employee');
            $q='';
            $emp='';
            for($x=0;$x<count($employee); $x++){
                $q.=' instr(employee, '.$employee[$x].') OR';
                $emp.= $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee[$x]) .", ";
            }
            $q = substr($q, 0, -3);
            $emp = substr($emp, 0, -2);
            $sql.=" $q AND";
        
            $filter .= "Employees - ".$emp.", ";
        }

        if(!empty($this->input->post('priority'))){
            $priority = $this->input->post('priority');
            $sql.=" priority_no = '$priority' AND";
            $filter .= "Priority No. - ".$priority.", ";
        }

        if(!empty($this->input->post('title'))){
            $title = $this->input->post('title');
            $sql.=" project_title LIKE '%$title%' AND";
            $filter .= "Project Title - ".$title.", ";
        }

        $query=substr($sql, 0, -3);
        $data['filt']=substr($filter, 0, -2);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");

        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];

        if($usertype==1){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='2' AND $query");
        } else if($usertype==2){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='2' AND company_id = '$usercomp' AND $query");
        } else if($usertype==3){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "status='2' AND department_id = '$userdept' AND $query");
        }
        $this->load->view('report/cancelled_list',$data);
        $this->load->view('template/footer');
    }

    public function search_all(){
        if(!empty($this->input->post('start_date'))){
            $data['start_date'] = $this->input->post('start_date');
        } else {
            $data['start_date']= "null";
        }

        if(!empty($this->input->post('completion_date'))){
            $data['completion_date'] = $this->input->post('completion_date');
        } else {
            $data['completion_date']= "null";
        }

        if(!empty($this->input->post('company'))){
            $data['company'] = $this->input->post('company');
        } else {
            $data['company']= "null";
        }

        if(!empty($this->input->post('department'))){
            $data['department'] = $this->input->post('department');
        } else {
            $data['department']= "null";
        }

        if(!empty($this->input->post('employee'))){
            $data['employee'] = $this->input->post('employee');
        } else {
            $data['employee']= "null";
        }

        if(!empty($this->input->post('priority'))){
            $data['priority'] = $this->input->post('priority');
        } else {
            $data['priority']= "null";
        }

        if(!empty($this->input->post('title'))){
            $data['title'] = $this->input->post('title');
        } else {
            $data['title']= "null";
        }

        $sql="";
        $filter = "";

        if(!empty($this->input->post('start_date'))){
            $start_date = $this->input->post('start_date');
            $sql.=" start_date LIKE '%$start_date%' AND";
            $filter .= "<b>Start Date</b> - ".$start_date.", ";
        }

        if(!empty($this->input->post('completion_date'))){
            $completion_date = $this->input->post('completion_date');
            $sql.=" completion_date LIKE '%$completion_date%' AND";
            $filter .= "<b>Completion Date</b>- ".$completion_date.", ";
        }

        if(!empty($this->input->post('company'))){
            $company = $this->input->post('company');
            $sql.=" company_id = '$company' AND";
            $comp = $this->super_model->select_column_where("company", "company_name", "company_id", $company);
            $filter .= "<b>Company</b> - ".$comp.", ";
        }

        if(!empty($this->input->post('department'))){
            $department = $this->input->post('department');
            $sql.=" department_id = '$department' AND";
            $dept = $this->super_model->select_column_where("department", "department_name", "department_id", $department);
            $filter .= "<b>Department</b> - ".$dept.", ";
        }

        if(!empty($this->input->post('employee'))){
            $employee = $this->input->post('employee');
            $q='';
            $emp='';
            for($x=0;$x<count($employee); $x++){
                $q.=' instr(employee, '.$employee[$x].') OR';
                $emp.= $this->super_model->select_column_where("employees", "employee_name", "employee_id", $employee[$x]) .", ";
            }
            $q = substr($q, 0, -3);
            $emp = substr($emp, 0, -2);
            $sql.=" $q AND";
        
            $filter .= "<b>Employees</b> - ".$emp.", ";
        }

        if(!empty($this->input->post('priority'))){
            $priority = $this->input->post('priority');
            $sql.=" priority_no = '$priority' AND";
            $filter .= "Priority No. - ".$priority.", ";
        }

        if(!empty($this->input->post('title'))){
            $title = $this->input->post('title');
            $sql.=" project_title LIKE '%$title%' AND";
            $filter .= "Project Title - ".$title.", ";
        }

        $query=substr($sql, 0, -3);
       // echo $query;

        $data['filt']=substr($filter, 0, -2);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");

        $userid = $this->session->userdata['user_id'];
        $usertype = $this->session->userdata['usertype'];
        $userdept = $this->session->userdata['department'];
        $usercomp = $this->session->userdata['company'];

        if($usertype==1){
            $data['projects'] = $this->super_model->select_custom_where("project_head", "$query");
        } else if($usertype==2){
             $data['projects'] = $this->super_model->select_custom_where("project_head", "company_id = '$usercomp' AND  $query");
        } else if($usertype==3){
             $data['projects'] = $this->super_model->select_custom_where("project_head", "department_id = '$userdept' AND  $query");
        }
        $this->load->view('report/alltask_list',$data);
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

    public function project_completed($project_id){
        $completed_date = $this->super_model->custom_query_single("completed_date", "SELECT MAX(update_date) AS completed_date FROM project_details WHERE project_id = '$project_id'");
       
        return $completed_date;
    }

    public function view_task()
    {
        $project_id = $this->uri->segment(3);
        $data['project_id'] = $project_id;
        foreach($this->super_model->select_row_where('project_head', 'project_id', $project_id) AS $proj){
            $data['start_date']=$proj->start_date;
            $data['completion_date']=$proj->completion_date;
            $data['task_no']=$proj->task_no;
            $data['from']=$proj->from;
            $data['monitor_person']=$this->super_model->select_column_where("employees", "employee_name", "employee_id", $proj->monitor_person);
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
            $data['cancel_reason'] = $proj->cancel_reason;
            $data['cancel_date'] = $proj->cancel_date;
        }

        $data['employees'] = $this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $data['details'] = $this->super_model->select_custom_where("project_details", "project_id='$project_id' ORDER BY update_date DESC");
        $data['extension'] = $this->super_model->select_custom_where("project_extension", "project_id='$project_id' ORDER BY extension_date DESC");
        $data['followup_date']=$this->super_model->select_column_custom_where("project_details", "followup_date", "project_id = '$project_id' ORDER BY followup_date DESC");
        foreach($this->super_model->select_custom_where("project_details", "project_id='$project_id' ORDER BY followup_date DESC") AS $fol){
            $data['followup'][]=array(
                "followup_date"=>$fol->followup_date,
            );
        }


        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('report/view_task',$data);
        $this->load->view('template/footer');
    }

    public function project_extension($pd_id){
        $ext=array();
        foreach($this->super_model->select_row_where('project_extension', 'pd_id', $pd_id) AS $proj){
            $ext[] = array(
                'extension_date'=>$proj->extension_date,
                'extension_reason'=>$proj->extension_reason
            );
        
        }

        return $ext;
    }

    public function ordinal($number) {
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
            return $number. 'th';
        else
            return $number. $ends[$number % 10];
    }

    public function latest_extension($project_id){
        $due = $this->super_model->custom_query_single("due","SELECT MAX(extension_date) as due FROM project_extension WHERE project_id = '$project_id'");
        return $due;
    }

    public function update_project(){

        $project_id = $this->input->post('project_id');
        $update_date = date('Y-m-d', strtotime($this->input->post('update_date')));
        $followup_date = date('Y-m-d', strtotime($this->input->post('followup_date')));
        $extend_date = $this->input->post('extend_date');
        $create_date = date('Y-m-d H:i:s');
        $emp = $this->input->post('updated_by');
        $empid='';
        $count= count($this->input->post('updated_by'));
        for($x=0; $x<$count;$x++){
            $empid .= $emp[$x].", ";
        }
        $empid = substr($empid, 0, -2);

        if($this->input->post('percentage')=='100'){
            $data_head = array(
                'status'=>1
            );

            $this->super_model->update_where("project_head", $data_head, "project_id", $project_id);
        }

        $details_count = $this->super_model->count_rows_where("project_details", "project_id", $project_id);
        if($details_count==0){
            $pd_id =1;
        }else{
            $maxno = $this->super_model->get_max("project_details", "pd_id");
            $pd_id = $maxno+1;
        }

        if(!empty($extend_date)){
            $extend_date = date('Y-m-d', strtotime($extend_date));
            $extension_reason = $this->input->post('extension_reason');
            $data_details =  array(
                'project_id'=>$project_id,
                'pd_id'=>$pd_id,
                'extension_date'=>$extend_date,
                'extension_reason'=>$extension_reason
            );
            $this->super_model->insert_into("project_extension", $data_details);
        }


        $data = array(
            'project_id'=>$project_id,
            'pd_id'=>$pd_id,
            'remarks'=>utf8_encode($this->input->post('remarks')),
            'status_percentage'=>$this->input->post('percentage'),
            'update_date'=>$update_date,
            'updated_by'=>$empid,
            'create_date'=>$create_date,
            'followup_date'=>$followup_date
        );
          if($this->super_model->insert_into("project_details", $data)){
              $this->session->set_flashdata('msg_updates', 'Project updates successfully added!');
              redirect(base_url().'report/view_task/'.$project_id);
        }
    }

    public function cancel_project(){
        $project_id = $this->input->post('project_id');
        $cancel_date = date('Y-m-d', strtotime($this->input->post('cancel_date')));
        $timestamp = date('Y-m-d H:i:s');

        $data = array(
            'status'=>2,
            'cancel_date'=>$cancel_date,
            'cancel_reason'=>$this->input->post('cancel_reason'),
            'cancel_timestamp'=>$timestamp
        );

        if($this->super_model->update_where("project_head", $data, "project_id", $project_id)){
              $this->session->set_flashdata('msg_cancel', 'Project successfully cancelled!');
              redirect(base_url().'report/view_task/'.$project_id);
        }
    }

     public function get_name($table, $name, $column, $value){
        $col = $this->super_model->select_column_where($table, $name, $column, $value);
        return $col;
    }   

    public function alltask_list(){
        $data['employee']=$this->super_model->select_all_order_by("employees","employee_name","ASC");
        $data['company']=$this->super_model->select_all_order_by("company","company_name","ASC");
        $data['department']=$this->super_model->select_all_order_by("department","department_name","ASC");
        $data['projects'] = $this->super_model->select_all_order_by("project_head", "start_date", "DESC");
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $this->load->view('report/alltask_list', $data);
        $this->load->view('template/footer');
    }
}
