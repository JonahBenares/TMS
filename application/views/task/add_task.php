<?php
    $ci =& get_instance();
    $now=date('Y-m-d');
?>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    $(function() {
        var empDiv = $('#p_emp');
        var i = document.getElementById('counter').value;
        //var i = $('#p_emp p').size() + 1;
        $('#addEmp').live('click', function() {
            i++;
            $('<div class="pmp'+i+'"><div class = "row"><div class = "col-md-10"><select class="form-control" id ="employee'+i+'" name="employee'+i+'"><option value="">-Select Accountable Employee-</option><?php foreach($employee AS $emp){ ?><option value="<?php echo $emp->employee_id; ?>" <?php echo (!empty($project_id) ? ((strstr( $employee_id, $emp->employee_id)) ? ' selected' : '') : ''); ?>><?php echo $emp->employee_name; ?></option><?php } ?></select></div><div class = "col-md-2"><a href="#" class="btn-primary btn-sm btn-fill" id="addEmp">+</a> <a href="#" class= "btn-danger btn-sm btn-fill" id="remEmp">x</a></div></div></div>').appendTo(empDiv);
            $('<input type="hidden" id="counterX" name="counterX" value="'+i+'" />').appendTo(empDiv); 
            return false;
        });

        $('#remEmp').on('click', function() { 
            if( i >= 2 ) {
                $("div").remove(".pmp" + i);
                i--;
            } 
            return false;
        });
    });
</script>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add New Task</li>
                        <li class="breadcrumb-item">
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 align-self-center">
            </div>  
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab">
                          <button class="tablinks" onclick="openCity(event, 'add_project')" <?php echo (empty($update) ? " id='defaultOpen'" : ""); ?>>Add Project</button>
                          <?php if(!empty($project_id)){ ?>
                          <button class="tablinks" onclick="openCity(event, 'project_updates')" <?php echo (!empty($update) ? " id='defaultOpen'" : ""); ?>>Project Updates</button>
                          <?php } ?>
                        </div>
                        <?php if($usertype==1 || $usertype==0){ ?>
                        <div id="add_project" class="tabcontent">
                            <?php 
                            if(empty($project_id)){
                                $url = base_url().'task/insert_task';
                            } else {
                                $url = base_url().'task/update_task';
                            } ?>
                            <form method='POST' action='<?php echo $url; ?>'  onsubmit="return confirm('Do you really want to submit the form? Please Check all information before saving.');">
                            <div class="p-25">
                                <div class="row">
                                     <?php
                                        $msg= $this->session->flashdata('msg');  
                                        if($msg){
                                     ?>
                                     <div class="col-lg-6 offset-lg-3">
                                        <div class="success bor-radius10 shadow alert-success alert-shake animated headShake" style='padding:10px'>
                                            <center><?php echo $msg; ?></center>                    
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <div class="col-lg-6 offset-lg-3">
                                         <div class="form-group">
                                            <select class="form-control" required name='location'>
                                                <option value="">-Select Location-</option>
                                                <?php foreach($location AS $lc){ ?>
                                                    <option value="<?php echo $lc->location_id; ?>" <?php echo (!empty($project_id) ? (($location == $lc->location_id) ? ' selected' : '') : ''); ?>><?php echo $lc->location_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                     
                                        <div class="form-group">
                                            <select class="form-control" required name='company'>
                                                <option value="">-Select Company-</option>
                                                <?php foreach($company AS $com){ ?>
                                                    <option value="<?php echo $com->company_id; ?>" <?php echo (!empty($project_id) ? (($company_id == $com->company_id) ? ' selected' : '') : ''); ?>><?php echo $com->company_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name='department'>
                                                <option value="">-Select Department-</option>
                                                <?php foreach($department AS $dept){ ?>
                                                    <option value="<?php echo $dept->department_id; ?>" <?php echo (!empty($project_id) ? (($department_id == $dept->department_id) ? ' selected' : '') : ''); ?>><?php echo $dept->department_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <select class="form-control" name='monitor'>
                                                        <option value="">-Select Monitor Person-</option>
                                                        <?php foreach($employee AS $em){ ?>
                                                            <option value="<?php echo $em->employee_id; ?>" <?php echo (!empty($project_id) ? (($monitor_person == $em->employee_id) ? ' selected' : '') : ''); ?>><?php echo $em->employee_name; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select class="form-control" name='from'>
                                                        <option value="">-From-</option>
                                                        <option value="Verbally" <?php echo (!empty($project_id) ? (($from == 'Verbally') ? ' selected' : '') : ''); ?>>Verbally</option>
                                                        <option value="Emailed" <?php echo (!empty($project_id) ? (($from == "Emailed") ? ' selected' : '') : ''); ?>>Emailed</option>
                                                        <option value="Memo" <?php echo (!empty($project_id) ? (($from == "Memo") ? ' selected' : '') : ''); ?>>Memo </option>
                                                        <option value="Meeting" <?php echo (!empty($project_id) ? (($from == "Meeting") ? ' selected' : '') : ''); ?>>Meeting</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- <input placeholder="Accountable Employee" class="form-control" id="employee1" name="employee1" type="text"> -->
                                        <div class="form-group" id ="p_emp">
                                            <div class = "row">s
                                                <div class = "col-md-10">
                                                    <select class="form-control" name='employee1' id ="employee1">
                                                        <option value="">-Select Accountable Employee-</option>
                                                        <?php foreach($employee AS $emp){ ?>
                                                            <option value="<?php echo $emp->employee_id; ?>" <?php echo (!empty($project_id) ? ((strstr( $employee_id, $emp->employee_id)) ? ' selected' : '') : ''); ?>><?php echo $emp->employee_name; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class = "col-md-2">
                                                    <a href="#" class="btn-primary btn-sm btn-fill" id="addEmp">+</a> <a href="#" class= "btn-danger btn-sm btn-fill" id="remEmp">x</a>
                                                </div>  
                                            </div>
                                            <input type="hidden" id="counterX" name="counterX" value="1">
                                            <input type = "hidden" value = "1" id = "counter" name  = "counter">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input placeholder="Start Date" class="form-control" name="start_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo (!empty($project_id) ? $start_date : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input placeholder="Due Date" class="form-control"  name="completion_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo (!empty($project_id) ? $completion_date : ''); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" placeholder="Priority Number" min='1' max='3'   class="form-control" required="required" name="priority_no" value="<?php echo (!empty($project_id) ? $priority_no : ''); ?>">
                                        </div>                                        
                                        <div class="form-group">                                            
                                            <textarea placeholder="Project Title" name="project_title" class="form-control" required="required" ><?php echo (!empty($project_id) ? $project_title : ''); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Project Description" name="project_desc" class="form-control" rows="8"><?php echo (!empty($project_id) ? $project_desc : ''); ?></textarea>
                                        </div>
                                        <?php if(empty($project_id)){ ?>
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-success btn-block" name="">
                                        </div>
                                       <?php } else { ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                    <a href='<?php echo base_url(); ?>task/add_task' class="btn btn-primary btn-block">Add New Project</a>
                                            </div>
                                            <div class="col-lg-6">
                                                    <input type="submit" value="Update" class="btn btn-info btn-block" name="">
                                            </div>
                                        </div>
                                    <?php } ?>
                                          <?php if(!empty($project_id)){ ?>
                                        <input type='hidden' name='project_id' value="<?php echo $project_id; ?>">
                                   <?php } ?>
                                    </div>
                                  
                                </form>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div id="add_project" class="tabcontent">
                                <center><h1 style="font-size: 200px; color:#ff7a7a" class="animated pulse infinite m-t-50"><span class="fa fa-warning"></span></h1></center>
                                <center><h2 style='color:#ff7a7a; text-transform: uppercase;'>Sorry, You are not allowed <br> to add new project.</h2></center>
                            </div>
                        <?php } ?>
                        <div id="project_updates" class="tabcontent">
                            <div class="p-25">
                                <div class="row">
                                    <div class="col-lg-4"> 

                                        <h4 class="proj-title fw500"><?php echo $project_title; ?></h4>
                                        <h6 class="proj-title m-b-0">- <?php echo $companys; ?></h6>
                                        <h6 class="proj-title">- <?php echo $locations; ?></h6>

                                        <h6 class="proj-title m-b-0"> 
                                            <b>#<?php echo $task_no; ?></b> -
                                            <?php if($priority_no==1){ ?>
                                            <span class="text-warning fa fa-flag"></span>
                                            <span class="text-warning fa fa-flag"></span>
                                            <span class="text-warning fa fa-flag"></span>
                                            <?php } else if($priority_no==2) { ?>
                                             <span class="text-warning fa fa-flag"></span>
                                            <span class="text-warning fa fa-flag"></span>
                                            <span class="text-dfault2 fa fa-flag"></span>
                                            <?php } else if($priority_no==3) { ?>
                                             <span class="text-warning fa fa-flag"></span>
                                             <span class="text-dfault2 fa fa-flag"></span>
                                             <span class="text-dfault2 fa fa-flag"></span>
                                            <?php } ?>
                                        </h6>
                                       
                                        <br>
                                        <small class="proj-title m-0 btn-block">Start Date: <span class="pull-right"><?php echo date('F j, Y', strtotime($start_date)); ?></span></small>
                                        <small class="proj-title m-0 btn-block">Due Date: <span class="pull-right"><?php echo date('F j, Y', strtotime($completion_date)); ?></span></small>
                                        <small class="proj-title m-0 btn-block">NO. OF WORKING DAYS: <span class="pull-right">
                                          <?php if($status == 1) { 
                                             
                                                 echo $ci->date_diff($start_date, $ci->project_completed($project_id));
                                               } else { 
                                                echo $ci->date_diff($start_date, $now);
                                               } ?>
                                                   
                                         </span></small>
                                        <small class="proj-title m-0 btn-block">REMAINING DAYS: <span class="pull-right">

                                         <?php   if(empty($ci->latest_extension($project_id))){
                                                echo $ci->date_diff($now, $completion_date); 
                                            } else {
                                                  echo $ci->date_diff($now, $ci->latest_extension($project_id)); 
                                            } ?>
                                                                    
                                          </span></small>
                                        <hr>
                                         <?php
                                        $msg_updates= $this->session->flashdata('msg_updates');  
                                        if($msg_updates){
                                         ?>
                                         <div class="col-lg-12">
                                            <div class="success bor-radius10 shadow alert-success alert-shake animated headShake" style='padding:10px'>
                                                <center><?php echo $msg_updates; ?></center>                    
                                            </div>
                                        </div>
                                        <?php } 

                                        if(empty($pd_id)) {
                                            $url_2 = base_url().'task/update_project';
                                        } else {
                                            $url_2 = base_url().'task/update_changes_project';
                                        } ?>


                                        <form method='POST' action="<?php echo $url_2; ?>">
                                        <div class="form-group">
                                            <input placeholder="Update Date" class="form-control" name='update_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date"  value="<?php echo (!empty($pd_id) ? $upd_date : ''); ?>">
                                        </div> 
                                         <div class="form-group">
                                          <select class="custom-select"  name="update_hour" style='width:49%' required>
                                            <option value="">-Update Time (Hour)-</option>
                                            <?php for($x=0;$x<=23;$x++){ ?>
                                                <option value="<?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?>" <?php echo (!empty($pd_id) ? (($hour==str_pad($x, 2, "0", STR_PAD_LEFT)) ? ' selected' : ' ') : ''); ?>><?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?></option>
                                            <?php } ?>
                                        </select>       
                                          <select class="custom-select"  name="update_minute" style='width:49%' required>
                                            <option value="">-Update Time (Minute)-</option>
                                            <?php for($x=0;$x<=59;$x++){ ?>
                                                <option value="<?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?>"  <?php echo (!empty($pd_id) ? (($minute==str_pad($x, 2, "0", STR_PAD_LEFT)) ? ' selected' : ' ') : ''); ?>><?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?></option>
                                            <?php } ?>
                                        </select>       
                                    </div> 
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="Remarks" name='remarks'><?php echo (!empty($pd_id) ? $remarks : ''); ?></textarea>
                                        </div>  
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="percentage" placeholder="Status Percentage"  min="<?php echo (!empty($pd_id) ? 0 : $current_percent); ?>" max ='100' value="<?php echo (!empty($pd_id) ? $percent : $current_percent); ?>">
                                        </div>  
                                          <div class="form-group">
                                            <?php if($usertype==3){ ?>
                                            <input placeholder="Updated By" class="form-control" name='updated_by[]' type="text" value="<?php echo $emp;?>" style="pointer-events: none;">
                                            <?php }else { ?>
                                            <select class="custom-select" multiple name="updated_by[]">
                                                <option value="">-Updated By-</option>
                                                <?php foreach($employee AS $emp){ ?>

                                                    <option value="<?php echo $emp->employee_id; ?>"  <?php echo (!empty($pd_id) ? ((strstr($updated_by, $emp->employee_id)) ? ' selected' : '') : ''); ?>><?php echo $emp->employee_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Follow Up Date" class="form-control" name='followup_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date"  value="<?php echo (!empty($pd_id) ? $followup_date : ''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="" class="btn btn-success btn-block"  value="Save Update">
                                            <input type='hidden' name='project_id' value="<?php echo $project_id; ?>">
                                            <?php if(!empty($pd_id)){ ?>
                                                <input type='hidden' name='pd_id' value="<?php echo $pd_id; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="col-lg-8">
                                        <div class="progress progress-bar-animated active">
                                            <div role="progressbar" class="progress-bar progress-bar-striped bg-primary " role="progressbar" aria-valuenow="<?php echo $current_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $current_percent; ?>%">
                                            <?php if(($current_percent) <= '50') { ?>    
                                            </div>
                                                <span class="m-l-5" style="color: #6c757d!important">
                                                    <?php echo $current_percent; ?>%
                                                </span>
                                            <?php } else { ?>
                                                <span class="m-l-5" style="">
                                                    <?php echo $current_percent; ?>%
                                                </span>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <div class="table-responsive m-t-10">                            
                                            <table id="myTable" class="table table-hover table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Date </span></th>
                                                        <th class="text-center">% </span></th>
                                                        <th>Update Description</th>
                                                        <th>Updated By</th>
                                                        <th>Follow Up Date</th>
                                                       <!--  <th><span class="fa fa-bars"></span></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($updates AS $upd){ 
                                                        $updated_by = explode(",", $upd->updated_by);  
                                                     
                                                        $count = count($updated_by);
                                                        $upda='';
                                                         for($x=0;$x<$count;$x++){
                                                            $upda.= $ci->get_updated_name($updated_by[$x]). ", ";
                                                         } 
                                                         $updated = substr($upda, 0, -2);
                                                        ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo date('m-d-Y H:i', strtotime($upd->update_date)); ?></td>
                                                        <td class="text-center"><?php echo $upd->status_percentage."%"; ?></td>
                                                        <td><?php echo $upd->remarks; ?></td>
                                                        <td><?php echo $updated; ?></td>
                                                        <td class="text-center"><?php echo date('m-d-Y', strtotime($upd->followup_date)); ?></td>
                                                     <!--    <td>
                                                            <a href="<?php echo base_url(); ?>task/add_task/<?php echo $project_id; ?>/update/<?php echo $upd->pd_id; ?>" class="btn btn-primary btn-xs bor-radius "  title="Add Project Update" ><span class="fa fa-pencil"></span>
                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
