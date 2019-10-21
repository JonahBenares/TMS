    <?php
    $ci =& get_instance();
    ?>
<div class="modal fade" id="project_updates" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Remarks"></textarea>
                </div>  
                <div class="form-group">
                    <input type="number" class="form-control" name="" placeholder="Status Percentage">
                </div>  
                <div class="form-group">
                    <input placeholder="Updated Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                </div> 
                <div class="form-group">
                    <input type="button" name="" class="btn btn-success btn-block"  value="Save Update">
                </div>
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
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Reason"></textarea>
                </div>  
                <div class="form-group">
                    <input placeholder="Date Cancelled" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                </div> 
                <div class="form-group">
                    <input type="button" name="" class="btn btn-danger btn-block"  value="Cancel">
                </div>
            </div>
            
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
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                        </div> 
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="pull-right">
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
                                    <?php } else if($priority_no==3) { ?>
                                    <span class="text-warning fa fa-flag"></span>
                                    <?php } ?>

                                    <!-- 

                                    priority 2 
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-dfault2 fa fa-flag"></span>
                                    
                                    priority 1 
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-warning fa fa-flag"></span>
                                    <span class="text-warning fa fa-flag"></span>

                                    no priority  
                                    <span class="text-dfault2 fa fa-flag"></span>
                                    <span class="text-dfault2 fa fa-flag"></span>
                                    <span class="text-dfault2 fa fa-flag"></span> -->
                                    
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h3 class="proj-title m-b-0"><?php echo $project_title; ?></h3>
                                   <?php $employee = explode(", ", $employee);  
                                                     
                                    $count = count($employee);
                                    $emp='';
                                     for($x=0;$x<$count;$x++){
                                        $emp.= $ci->get_updated_name($employee[$x]). ", ";
                                     } 
                                     $employees = substr($emp, 0, -2);
                                      ?>
                                <small class="proj-title"><?php echo $employees; ?></small>
                                <div>Lorem Ipsum is simply It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</div>
                                                               
                                <div class="steamline m-t-40">
                                    <!-- reason for cancell -->
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div class="font-medium text-danger">January 20, 2019</div>
                                            <div class="desc text-danger">Lorem Ipsum is simply It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            </div>                                            
                                        </div>
                                    </div>
                                    <!-- reason for cancell -->
                                    <!-- loop start-->
                                    <div class="sl-item">
                                        <div class="sl-right">
                                            <div class="font-medium">January 20, 2019</div>
                                             <span ><small class="proj-title">Updated By: Jonah Faye</small></span>
                                            <div class="desc">Lorem Ipsum is is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </div>
                                            <div class="progress m-b-20">
                                                <div class="progress-bar bg-default" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height:5px;width: 75%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- loop end-->
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div style="text-align: right" class="btn-block">
                                    <small class="proj-title">Start Date:</small><br>
                                    <span class="">10-10-19</span>
                                    <br>
                                    <br>
                                    <small class="proj-title">Completion Date: </small><br>
                                    <span class="">January 10, 2019</span>
                                </div>
                                

                                
                            </div>
                            <div style="position: fixed; left: 0;bottom: 0; margin: 50px">
                                <a href="#" class="btn btn-primary btn-sm bor-radius "  data-toggle="modal" data-target="#project_updates" title="Add Project Update" >
                                    Add Project Update
                                </a>
                                <a href="#" class="btn btn-danger btn-sm bor-radius "  data-toggle="modal" data-target="#cancel_proj" title="Cancel" >
                                    Cancel
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>