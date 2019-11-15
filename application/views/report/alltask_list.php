  <?php
    $ci =& get_instance();
    ?>
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>report/search_all">
                <div class="modal-body">                
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input placeholder="Due Date: From" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="start_date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input placeholder="Due Date: To" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="completion_date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="company" class="form-control" placeholder="Company">
                             <option value = "">--Select Company--</option>
                            <?php foreach($company AS $c){ ?>
                            <option value = "<?php echo $c->company_id; ?>"><?php echo $c->company_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="department" class="form-control" placeholder="Department">
                              <option value = "">--Select Department--</option>
                            <?php foreach($department AS $d){ ?>
                            <option value = "<?php echo $d->department_id; ?>"><?php echo $d->department_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" placeholder="Employee" class="custom-select" multiple name="employee[]">
                            <option value = "">--Select Employee--</option>
                            <?php foreach($employee AS $e){ ?>
                            <option value = "<?php echo $e->employee_id; ?>"><?php echo $e->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="priority" class="form-control" placeholder="Priority Number">
                    </div>
                    <div class="form-group">
                        <textarea  name="title" class="form-control" placeholder="Title" rows="5"></textarea> 
                    </div>
                </div>
                <div class="modal-footer">                                        
                    <button type="submit" class="btn btn-secondary btn-block">Filter</button>
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Tasks</li>
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
                        <h4 class="card-title"><span class="text-primary fa fa-circle"></span> All TASKS
                            <div class="pull-right">
                                <a href="<?php echo base_url(); ?>task/add_task" class="btn btn-primary btn-sm bor-radius " data-toggle="tooltip" data-placement="top" title="Add Tasks" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                                <span data-toggle="modal" data-target="#filter">
                                    <a href="#" class="btn btn-secondary btn-sm bor-radius " data-toggle="tooltip" data-placement="top" title="Filter" >
                                        <span class="fa fa-filter" ></span>
                                    </a>
                                </span>
                            </div>
                        </h4>        
                                        
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">     
                            <?php if(!empty($filt)){ ?>      
                            <div class="alert alert-info" role="alert">
                                <span class='btn btn-xs btn-info disabled'>Filter Applied</span> <?php echo $filt; ?>
                                <a href='<?php echo base_url(); ?>report/alltask_list' class='remove_filter alert-link pull-right btn btn-xs'>
                                    <span class="fa fa-times"></span>
                                </a>
                            </div>                                
                            <?php } ?>           
                            <table id="myTable" class="table" >
                                <thead >
                                    <tr class="nobor-top">
                                        <th class="nobor-top"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($projects AS $proj){ ?>
                                    <tr>
                                        <td class="p-0">                                         
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
                                                        <td class="bg-hovr" width="50%" class="nobor-top">
                                                            <h4 class="proj-title m-0 fw500"><?php echo $proj->project_title; ?></h4>
                                                            <div class="proj-title fw500 h7 m-b-10">#<?php echo $proj->task_no; ?> | <?php echo $ci->get_name("company", "company_name", "company_id", $proj->company_id); ?></div>
                                                            <small class="proj-title"><?php echo $employees; ?></small>  
                                                            <br>
                                                            <h6 class="proj-title">
                                                                <?php if($proj->priority_no==1){ ?>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <?php } else if($proj->priority_no==2){ ?>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-dfault2 fa fa-flag"></span>
                                                                <?php } else if($proj->priority_no==3) { ?>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-dfault2 fa fa-flag"></span>
                                                                <span class="text-dfault2 fa fa-flag"></span>
                                                                <?php } ?> 
                                                            </h6>                                                                        
                                                        </td>
                                                        <td class="bg-hovr" width="%" class="nobor-top">
                                                            <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->start_date)); ?></span></small>
                                                            <small class="proj-title btn-block m-0">DUE DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->completion_date)); ?></span></small>
                                                            <?php if($proj->status == 1) {  ?>
                                                            <small class="proj-title btn-block m-0">COMPLETED DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($ci->project_completed($proj->project_id))); ?></span></small>
                                                            <?php } else if($proj->status == 2) { ?> 
                                                            <small class="proj-title btn-block m-0">CANCELLED DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->cancel_date)); ?></span></small>
                                                            <?php } ?>
                                                        </td>

                                                        <td class="bg-hovr" width="35%" class="nobor-top">
                                                            <!-- <div class="progress progress-striped active">
                                                              <div role="progressbar progress-striped" style="width: 95%;" class="progress-bar"><span>Primary</span></div>
                                                            </div> -->
                                                            
                                                            <div class="progress progress-bar-animated active">
                                                                <?php if($proj->status == 0){
                                                                    $bg= "bg-warning";
                                                                } else if($proj->status == 1){
                                                                     $bg= "bg-success";
                                                                } else if($proj->status == 2){
                                                                     $bg= "bg-danger";
                                                                } ?>
                                                                <div role="progressbar" class="progress-bar <?php echo $bg; ?> progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $ci->project_percent($proj->project_id); ?>%" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($proj->project_id); ?>%">
                                                                    <?php if($ci->project_percent($proj->project_id) <= '50') { ?>    
                                                                </div>

                                                                    <span class="m-t-10 m-l-5 m-b-10" style="font-size: 15px;color: #6c757d!important">
                                                                        <?php echo $ci->project_percent($proj->project_id); ?>%
                                                                    </span>
                                                                <?php } else { ?>
                                                                    <span class="m-t-10 m-l-5 m-b-10" style="font-size: 15px;">
                                                                        <?php echo $ci->project_percent($proj->project_id); ?>%
                                                                    </span>
                                                                </div>
                                                                <?php } ?>
                                                            </div>                                                       
                                                        </td>
                                                    </tr>
                                                </table>
                                            </a> 
                                            
                                        </td>                                       
                                    </tr>
                                     <?php } ?>
                                    <!-- loop here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>