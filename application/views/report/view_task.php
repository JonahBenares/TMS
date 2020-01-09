<?php
    $ci =& get_instance();
    $now=date('Y-m-d');
?>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script>
    $(function() {
        var updDiv = $('#p_upd');
        var o = document.getElementById('counter1').value;
        //var i = $('#p_emp p').size() + 1;
        $('#addUpd').on('click', function() {
            o++;
            $('<div class="pmu'+o+'"><div class = "row"><div class = "col-md-9"><select class="form-control" id ="updated_by'+o+'" name="updated_by'+o+'"><option value="">-Updated By-</option><?php foreach($employees AS $emp){ ?><option value="<?php echo $emp->employee_id; ?>"><?php echo $emp->employee_name; ?></option><?php } ?></select></div></div></div>').appendTo(updDiv);
            $('<input type="hidden" id="counterX1" name="counterX1" value="'+o+'" />').appendTo(updDiv); 
            return false;
        });

        $('#remUpd').on('click', function() { 
            if( o >= 2 ) {
                $("div").remove(".pmu" + o);
                o--;
            } 
            return false;
        });
    });
</script>
<div class="modal fade" id="project_updates" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Project Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>report/update_project">
                <div class="form-group">
                    <input placeholder="Updated Date" class="form-control" name='update_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                </div> 
                 <div class="form-group">
                      <select class="custom-select"  name="update_hour" style='width:49%' required>
                        <option value="">-Update Time (Hour)-</option>
                        <?php for($x=0;$x<=23;$x++){ ?>
                            <option value="<?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?>" ><?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?></option>
                        <?php } ?>
                    </select>       
                      <select class="custom-select"  name="update_minute" style='width:49%' required>
                        <option value="">-Update Time (Minute)-</option>
                        <?php for($x=0;$x<=59;$x++){ ?>
                            <option value="<?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?>" ><?php echo str_pad($x, 2, "0", STR_PAD_LEFT); ?></option>
                        <?php } ?>
                    </select>       
                </div> 
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Remarks" name="remarks"></textarea>
                </div>  
                <div class="form-group">
                    <input type="number" class="form-control" name="percentage" placeholder="Status Percentage" min="<?php echo $ci->project_percent($project_id); ?>" max="100" value="<?php echo $ci->project_percent($project_id); ?>">
                </div>  
                <div class="form-group">
                    <?php if($usertype==3){ ?>
                    <input class="form-control" type="text" value="<?php echo $emp;?>" style="pointer-events: none;">
                    <input class="form-control" type="hidden" name="updated_by1" value="<?php echo $useremp;?>" style="pointer-events: none;">
                    <?php } else { ?>
                    <div class="form-group" id ="p_upd">
                        <?php 
                            $updated_by = '';
                            $ems = explode(",", $updated_by);
                            foreach($ems AS $e){
                        ?>
                        <div class = "row">
                            <div class = "col-md-9">
                                <select class="form-control" name='updated_by1' id ="updated_by1">
                                    <option value="">-Updated By-</option>
                                    <?php foreach($employees AS $emp){ ?>
                                        <option value="<?php echo $emp->employee_id; ?>"><?php echo $emp->employee_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class = "col-md-3">
                                <a href="#" class="btn-primary btn-sm btn-fill" id="addUpd">+</a> 
                                <a href="#" class= "btn-danger btn-sm btn-fill" id="remUpd">x</a>
                            </div>  
                        </div>
                        <input type="hidden" id="counterX1" name="counterX1" value="1">
                        <input type = "hidden" value = "1" id = "counter1" name  = "counter1">
                        <?php } ?>
                    </div> 
                    <?php } ?>                   
                </div>
                <div class="form-group">
                    <input placeholder="Follow Up Date" class="form-control" name='followup_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="followup_date">
                </div> 

                <div class="form-group">
                    <input placeholder="Extend Date" class="form-control" name='extend_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                </div> 
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Reason For Extension" name='extension_reason'></textarea>
                </div>                  

                <div class="form-group">
                    <input type="submit" name="" class="btn btn-success btn-block"  value="Save Update">
                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="cancel_proj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/cancel_project">
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Reason" name='cancel_reason'></textarea>
                </div>  
                <div class="form-group">
                    <input placeholder="Date Cancelled" class="form-control" name='cancel_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                </div> 
                <div class="form-group">
                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                    <input type="submit" name="" class="btn btn-danger btn-block"  value="Cancel">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="extend_proj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Extend Project Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/">
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Reason" name=''></textarea>
                </div>  
                <div class="form-group">
                    <input placeholder="Extend Date" class="form-control" name='cancel_date' type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                </div> 
                <div class="form-group">
                    <input type="submit" name="" class="btn btn-success btn-block"  value="Extend">
                </div>
            </div>
            </form>
        </div>
    </div>
</div> -->

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="window.history.go(-1);">List</a></li>
                        <li class="breadcrumb-item active">View task</li>
                        <li class="breadcrumb-item">
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 align-self-center">
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="progress progress-bar-animated active" style="border-radius: 20px 20px 0px 0px">
                        <div role="progressbar" class="progress-bar <?php if($status == 'Pending') { ?> bg-warning <?php } else if ($status == 'Cancelled') { ?>
                                    bg-danger <?php } else if ($status == 'Done') { ?> bg-success <?php } ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $ci->project_percent($project_id); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($project_id); ?>%">
                                    
                        <?php if($ci->project_percent($project_id) <= '50') { ?>    
                        </div>
                            <span class=" m-l-5 m-t-5 m-b-5" style="font-size:20px;color: #6c757d!important">
                                <?php echo $ci->project_percent($project_id); ?>%
                            </span>
                        <?php } else { ?>
                            <span class=" m-l-5 m-t-5 m-b-5" style="font-size:20px;">
                                <?php echo $ci->project_percent($project_id); ?>%
                            </span>
                        </div>
                        <?php } ?>            
                    </div> 
                    
                    <div class="card-body p-b-100">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="proj-title m-b-5" style="font-weight: 500">#<?php echo $task_no; ?></h4>
                                <h3 class="proj-title m-b-0" style="font-weight: 600"><?php echo $project_title; ?></h3>
                                   <?php $employee = explode(",", $employee);  
                                                     
                                    $count = count($employee);
                                    $emp='';
                                     for($x=0;$x<$count;$x++){
                                        $emp.= $ci->get_updated_name($employee[$x]). ", ";
                                     } 
                                     $employees = substr($emp, 0, -2);
                                      ?>
                                <small class="proj-title fw500"><?php echo $employees; ?></small><br>
                                <div class="m-t-10"><?php echo nl2br($project_description); ?></div>

                                                                    
                                <div class="steamline m-t-20">
                                    <?php
                                        $msg_updates= $this->session->flashdata('msg_updates');  
                                        if($msg_updates){
                                         ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="success bor-radius10 shadow alert-success alert-shake animated headShake" style='padding:10px'>
                                                    <center><?php echo $msg_updates; ?></center>                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php } 

                                         $msg_cancel= $this->session->flashdata('msg_cancel');  
                                        if($msg_cancel){
                                         ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="success bor-radius10 shadow alert-danger alert-shake animated headShake" style='padding:10px'>
                                                    <center><?php echo $msg_cancel; ?></center>                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php } 
                                    if($status == 'Cancelled'){ ?>  
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div class="font-medium text-danger"><?php echo "Date Cancelled: ". date('F j, Y', strtotime($cancel_date)); ?></div>
                                            <div class="desc text-danger"><?php echo "Cancel Reason: " .$cancel_reason; ?>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <?php }       
                                    foreach($details AS $det){ 
                                    $updated = explode(",", $det->updated_by);                                                       
                                    $count_upd = count($updated);
                                    $upd='';
                                    for($x=0;$x<$count_upd;$x++){
                                        $upd.= $ci->get_updated_name($updated[$x]). ", ";
                                    } 
                                    $updated_by = substr($upd, 0, -2);

                                    ?>
                                    <div class="sl-item <?php echo (($det->pd_id == $notif_update) ? 'highnotif p-r-20 p-t-20' : ''); ?>">
                                        <div class="sl-right">
                                            <div class="font-medium"><?php echo date('F j, Y H:i', strtotime($det->update_date)); ?></div>
                                            <span></span> <small class="proj-title">Updated By: <?php echo $updated_by; ?></small></span>
                                            <div class="desc m-t-20"><?php echo nl2br($det->remarks); ?>
                                            </div>
                                            <br>
                                            <?php  if($det->followup_date != '1970-01-01'){ ?>
                                            <small class="proj-title h7"><b>Follow Up Date:</b> <?php echo date('F j, Y', strtotime($det->followup_date)); ?></small><br>
                                            <?php 
                                            }
                                            if(!empty($ci->project_extension($det->pd_id))){ 
                                              foreach($ci->project_extension($det->pd_id) AS $e){
                                             ?>
                                            <small class="proj-title h7 text-secondary"><b>Extension Date:</b> <?php echo date('F j, Y', strtotime($e['extension_date'])); ?></small><br>
                                            <div class="m-l-20">
                                                <small class="proj-title text-secondary">Reason for Extension:</small><br>
                                                <small class="proj-title text-secondary"><?php echo $e['extension_reason']; ?></small>
                                            </div>
                                            <?php 
                                                }
                                            } ?>
                                            <br>                                            
                                            <div class="progress m-b-20">
                                                <div class="progress-bar bg-default" role="progressbar" aria-valuenow="<?php echo $det->status_percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="height:15px;width: <?php echo $det->status_percentage; ?>%">
                                                <?php if(($det->status_percentage) <= '50') { ?>    
                                                </div>
                                                    <span class="m-l-5" style="color: #6c757d!important">
                                                        <?php echo $det->status_percentage; ?>%
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="m-l-5" >
                                                        <?php echo $det->status_percentage; ?>%
                                                    </span>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                 <?php if(!empty($followup_date) && $status !='Cancelled') { ?>
                                <center>
                                    <label class="label label-primary p-r-50 p-l-50 p-t-5 p-b-5 animated pulse infinite" style="font-size: 12px">Next Follow Up Date: <?php echo date('M j, Y', strtotime($followup_date)); ?></label>
                                </center>    
                                <?php } ?>   
                                <div style="text-align: left" class="btn-block">
                                    <small class="proj-title">Company:</small><br>
                                    <span class="proj-title"><b style="font-weight: 500"><?php echo $company; ?></b></span>
                                    <br>
                                    <br>
                                    <small class="proj-title">Location:</small><br>
                                    <span class=""><?php echo $location; ?></span>
                                    <br>  
                                    <br>
                                    <small class="proj-title">Department:</small><br>
                                    <span class=""><?php echo $department; ?></span>
                                    <br>  
                                    <br>
                                    
                                    <?php if($status == 'Pending') { ?>
                                    <label class="label label-warning">Pending</label>
                                    <?php } else if ($status == 'Cancelled') { ?>
                                    <label class="label label-danger">Cancelled</label>
                                    <?php } else if ($status == 'Done') { ?>
                                    <label class="label label-success">Completed</label> 
                                    <?php } ?>
                                    <br>
                                    <?php if($priority_no==1){ ?>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-warning fa fa-flag"></span>
                                    <?php } else if($priority_no==2){ ?>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-dfault2 fa fa-flag"></span>
                                    <?php } else if($priority_no==3) { ?>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-dfault2 fa fa-flag"></span>
                                    <span class="text-dfault2 fa fa-flag"></span>
                                    <?php } ?>
                                    <br>
                                    <br>                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <small class="proj-title">Start Date:</small><br>
                                            <span class=""><?php echo date('M j, Y', strtotime($start_date)); ?></span>
                                        </div>
                                        <div class="col-lg-6">
                                            <small class="proj-title text-danger">Due Date: </small><br>
                                            <span class="text-danger"><b><?php 
                                            if(empty($ci->latest_extension($project_id))){
                                                echo date('M j, Y', strtotime($completion_date)); 
                                            } else {
                                                 echo date('M j, Y', strtotime($ci->latest_extension($project_id))); 
                                            } ?></b></span>
                                        </div>
                                    </div>
                                    <br>
                                    <?php  if(!empty($ci->latest_extension($project_id))){ ?>
                                        <small class="proj-title"><b>EXTENSION DETAILS:</b></small><br>
                                        
                                        <?php 
                                        $ct = count($extension);
                                        foreach($extension AS $ex){ ?>
                                             <small class="proj-title"><?php echo $ci->ordinal($ct); ?> Extension: <?php echo date('M j, Y', strtotime($ex->extension_date)); ?></small><br>
                                        <?php $ct--; } ?>
                                        <small class="proj-title">Original Due Date: <?php echo date('M j, Y', strtotime($completion_date)); ?></small><br>
                                    <?php } ?>
                                   
                                    <?php if($status == 'Done'){ ?>
                                    <br>
                                    <small class="proj-title">Date Completed: </small><br>
                                    <span class=""><?php echo date('M j, Y', strtotime($ci->project_completed($project_id))); ?></span>
                                    <?php } ?>
                                    <br>
                                    <br>
                                    <small class="proj-title">NO. OF WORKING DAYS: <b><?php
                                        if($status == 'Done'){
                                              echo $ci->date_diff($start_date, $ci->project_completed($project_id));
                                        } else {
                                              echo $ci->date_diff($start_date, $now);
                                        }
                                     ?></b></small>
                                     <?php  if($status != 'Done' && $status != 'Cancelled'){ ?>
                                        <br>
                                    <small class="proj-title">REMAINING DAYS:  <b>
                                       <?php 
                                       
                                            if(empty($ci->latest_extension($project_id))){
                                                echo $ci->date_diff($now, $completion_date); 
                                            } else {
                                                  echo $ci->date_diff($now, $ci->latest_extension($project_id)); 
                                            } 
                                        ?>

                                    </b></small>
                                    <?php } ?>
                                    <br>
                                    <br>
                                    <small class="proj-title">From: <?php echo $from; ?></small><br>
                                    <small class="proj-title">Monitoring Person: <?php echo $monitor_person; ?></small>
                                    <hr class="m-t-10">
                                   <!--  <div>
                                        Follow Up Dates:<br>
                                        <?php 
                                            if(!empty($followup)){
                                            foreach($followup AS $f){ ?>
                                                <small class="p-l-10"><?php echo (!empty($f['followup_date'])) ? date('M j, Y', strtotime($f['followup_date'])) : ''; ?></small><br>
                                        <?php } } ?>
                                    </div>
                                    <hr class="m-t-50">
                                    <div>
                                        Extension Dates:<br>
                                        <button class="accordion-ex"><small>January 10, 2019</small></button>
                                        <div class="panel">
                                            <div class="panel-body">
                                                <b>Reason:</b><br>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>                                          
                                        </div>
                                        <button class="accordion-ex"><small>January 10, 2019</small></button>
                                        <div class="panel">
                                            <div class="panel-body">
                                                <b>Reason:</b><br>
                                                <p>Lorem ipsum dolor sit amet, coasdasdsnsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>                                          
                                        </div>
                                    </div> -->

                                </div>                                
                            </div>
                            <div style="position: fixed; left: 0;bottom: 0; margin: 50px; background: white">
                                <?php if($status == 'Pending' || $status == 'Done') { ?>
                                    <a href="#" class="btn btn-primary btn-sm bor-radius "  data-toggle="modal" data-target="#project_updates" title="Add Project Update" >
                                        Add Project Update
                                    </a>
                                    <!--  <a href="<?php echo base_url(); ?>task/add_task/<?php echo $project_id; ?>/update" class="btn btn-warning btn-sm bor-radius " title="Edit Project Update" >
                                        Edit Project Update
                                    </a> -->
                                    <a href="#" class="btn btn-danger btn-sm bor-radius "  data-toggle="modal" data-target="#cancel_proj" title="Cancel" >
                                        Cancel
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>