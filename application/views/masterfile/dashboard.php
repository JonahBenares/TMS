    <?php
    $ci =& get_instance();
    ?>

<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" >
                <div class="modal-body">
                    <div class="form-group">
                        Employee Name
                        <select name="employee" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        Notes
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        Due Date
                        <input type="date" name="due_date" class="form-control">
                    </div>
                    <div class="form-group">
                        Status
                        <select name="status" class="form-control">
                            <option value = "">--Select Status--</option>
                            <option value = "0">Active</option>
                            <option value = "1">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">                                        
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </div>  
            </form>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                   <!--  <a class="btn btn-success d-none d-lg-block m-l-15" href="https://wrappixel.com/templates/elegant-admin/"> Upgrade To Pro</a> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card oh">
                    <div class="card-body">
                        <table id="myTable" class="table" >
                                <thead >
                                    <tr class="nobor-top">
                                        <th class="nobor-top"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- loop here -->
                                    <tr>
                                        <td class="p-0">
                                               <?php foreach($projects AS $proj){ ?>
                                            <a class="text-dfault"  href="<?php echo base_url(); ?>report/view_task/<?php echo $proj->project_id; ?>" >
                                                <table width="100%" >
                                                 
                                                      <?php $employee = explode(", ", $proj->employee);  
                                                     
                                                        $count = count($employee);
                                                        $emp='';
                                                         for($x=0;$x<$count;$x++){
                                                            $emp.= $ci->get_updated_name($employee[$x]). ", ";
                                                         } 
                                                         $employees = substr($emp, 0, -2);
                                                          ?>
                                                    <tr>
                                                        <td width="8%">
                                                            <?php if($proj->priority_no==1){ ?>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <?php } else if($proj->priority_no==2){ ?>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <?php } else if($proj->priority_no==3) { ?>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="bg-hovr" width="50%" class="nobor-top"><h4 class="proj-title m-0"><?php echo $proj->project_title; ?></h4><small class="proj-title"><?php echo $employees; ?></small>    

                                                        </td>
                                                        <td class="bg-hovr" width="29%" class="nobor-top">  

                                                        <div class="progress progress-bar-animated active">
                                                            <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $ci->project_percent($proj->project_id); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($proj->project_id); ?>%"><h6 class="m-t-5 m-b-5"><?php echo $ci->project_percent($proj->project_id); ?>%</h6></div>
                                                        </div>     
                                                        <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->start_date)); ?></span></small>
                                                            <small class="proj-title btn-block m-0">COMPLETION DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->completion_date)); ?></span></small>                                                       
                                                            
                                                        </td>
                                                    </tr>
                                                  
                                                </table>
                                                  <?php } ?>
                                            </a> 
                                        </td>                                       
                                    </tr>
                                    <!-- loop here -->
                                </tbody>
                            </table>

                    </div>
                    <!-- <div class="card-body bg-light">
                        <div class="row text-center m-b-20">
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h2 class="m-b-0 font-light">6000</h2><span class="text-muted">Total sale</span>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h2 class="m-b-0 font-light">4000</h2><span class="text-muted">Iphone</span>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h2 class="m-b-0 font-light">2000</h2><span class="text-muted">Ipad</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reminder
                            <span data-toggle="modal" data-target="#addCompany" class="pull-right">
                                <a href="#" class="btn btn-primary btn-sm bor-radius" data-toggle="tooltip" data-placement="top" title="Add Reminder" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span>
                        </h5>
                        <h6 class="card-subtitle">check out your daily schedule</h6>
                        <div class="steamline m-0">
                            <?php foreach($reminders AS $r){ ?>
                            <div class="sl-item">
                            <button class="btn-xs btn sl-left bg-info" style="background-image: url('../../assets/images/check.png'); position: 100% center; background-repeat: no-repeat;"></button>
                                <div class="sl-right">
                                    <h5 class="font-medium m-0"><?php echo $r['notes']; ?></h5>
                                    <small class="desc m-b-5 btn-block"><?php echo $r['employee']; ?></small> 
                                    <span class="sl-date"><?php echo $r['due_date']; ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>