    <?php
    $ci =& get_instance();
    ?>
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
                    <textarea class="form-control" rows="5" placeholder="Remarks" name="remarks"></textarea>
                </div>  
                <div class="form-group">
                    <input type="number" class="form-control" name="percentage" placeholder="Status Percentage" min="<?php echo $ci->project_percent($project_id); ?>" max="100" value="<?php echo $ci->project_percent($project_id); ?>">
                </div>  
                <div class="form-group">
                    <select class="custom-select" multiple name="updated_by[]">
                        <option value="">-Select Accountable Employee-</option>
                        <?php foreach($employees AS $emp){ ?>

                            <option value="<?php echo $emp->employee_id; ?>" ><?php echo $emp->employee_name; ?></option>
                        <?php } ?>
                    </select>
                    
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


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/report/pending_list/">Pending List</a></li>
                        <!-- <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/report/completed_list/">Completed List</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/report/cancelled_list/">Cancelled List</a></li> -->
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
                    <div class="progress m-b-20">
                            <div class="progress-bar <?php if($status == 'Pending') { ?> bg-warning <?php } else if ($status == 'Cancelled') { ?>
                                        bg-danger <?php } else if ($status == 'Done') { ?> bg-success <?php } ?> progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $ci->project_percent($project_id); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($project_id); ?>%">
                            <?php if($ci->project_percent($project_id) <= '50') { ?>    
                            </div>
                                <span class=" m-l-5 " style="font-size:12px;color: #6c757d!important">
                                    <?php echo $ci->project_percent($project_id); ?>%
                                </span>
                            <?php } else { ?>
                                <span class=" m-l-5 " style="font-size:12px;">
                                    <?php echo $ci->project_percent($project_id); ?>%
                                </span>
                            </div>
                            <?php } ?>            
                        </div> 
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-2">
                                <div style="text-align: right">
                                    <small class="proj-title">Company:</small><br>
                                    <span class="proj-title"><b style="font-weight: 500"><?php echo $company; ?></b></span>
                                    <br>
                                    <br>
                                    <small class="proj-title">Department:</small><br>
                                    <span class=""><?php echo $department; ?></span>

                                    <br>
                                    <br>       
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h3 class="proj-title m-b-0" style="font-weight: 600"><?php echo $project_title; ?></h3>
                                   <?php $employee = explode(", ", $employee);  
                                                     
                                    $count = count($employee);
                                    $emp='';
                                     for($x=0;$x<$count;$x++){
                                        $emp.= $ci->get_updated_name($employee[$x]). ", ";
                                     } 
                                     $employees = substr($emp, 0, -2);
                                      ?>
                                <small class="proj-title "><?php echo $employees; ?></small><br>
                            <div class="m-t-10"><?php echo nl2br($project_description); ?></div>                                            
                                <div class="steamline m-t-40">
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
                                            <div class="font-medium text-danger"><?php echo date('F j, Y', strtotime($cancel_date)); ?></div>
                                            <div class="desc text-danger"><?php echo $cancel_reason; ?>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <?php }       
                                    foreach($details AS $det){ 
                                    $updated = explode(", ", $det->updated_by);                                                       
                                    $count_upd = count($updated);
                                    $upd='';
                                    for($x=0;$x<$count_upd;$x++){
                                        $upd.= $ci->get_updated_name($updated[$x]). ", ";
                                    } 
                                    $updated_by = substr($upd, 0, -2);
                                    ?>
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div class="font-medium"><?php echo date('F j, Y', strtotime($det->update_date)); ?></div>
                                            <span></span> <small class="proj-title">Updated By: <?php echo $updated_by; ?></small></span>
                                            <div class="desc m-t-20"><?php echo nl2br($det->remarks); ?>
                                            </div>
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
                            <div class="col-lg-2">
                                <div style="text-align: left" class="btn-block">
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
                                    <small class="proj-title">Start Date:</small><br>
                                    <span class=""><?php echo date('M j, Y', strtotime($start_date)); ?></span>
                                    <br>
                                    <br>
                                    <small class="proj-title">Due Date: </small><br>
                                    <span class=""><b><?php echo date('M j, Y', strtotime($completion_date)); ?></b></span>
                                    <br>
                                    <?php if($status == 'Done'){ ?>
                                    <br>
                                    <small class="proj-title">Date Completed: </small><br>
                                    <span class=""><?php echo date('M j, Y', strtotime($ci->project_completed($project_id))); ?></span>
                                    <?php } ?>
                                </div>                                
                            </div>
                            <?php if($status == 'Pending') { ?>
                            <div style="position: fixed; left: 0;bottom: 0; margin: 50px">
                                <a href="#" class="btn btn-primary btn-sm bor-radius "  data-toggle="modal" data-target="#project_updates" title="Add Project Update" >
                                    Add Project Update
                                </a>
                                <a href="#" class="btn btn-danger btn-sm bor-radius "  data-toggle="modal" data-target="#cancel_proj" title="Cancel" >
                                    Cancel
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>