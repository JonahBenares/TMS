<?php
    $ci =& get_instance();
?>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    $(function() {
        var empDiv = $('#p_emp');
        var i = document.getElementById('counter').value;
        //var i = $('#p_emp p').size() + 1;
        $('#addEmp').live('click', function() {
            i++;
            $('<div class="pmp'+i+'"><div class = "row"><div class = "col-md-10"><select class="form-control" id ="employee'+i+'" name="employee'+i+'"><option value="">-Select Accountable Employee-</option><?php foreach($employee AS $emp){ ?><option value="<?php echo $emp->employee_id; ?>"><?php echo "$emp->employee_name"; ?></option><?php } ?></select></div><div class = "col-md-2"><a href="#" class="btn-primary btn-sm btn-fill" id="addEmp">+</a> <a href="#" class= "btn-danger btn-sm btn-fill" id="remEmp">x</a></div></div></div>').appendTo(empDiv);
            $('<input type="hidden" id="counterX" name="counterX" value="'+i+'" />').appendTo(empDiv); 
            return false;
        });
        $('#remEmp').live('click', function() { 
            if( i >= 2 ) {
                $("div").remove(".pmp" + i);
                i--;
            } 
            return false;
        });
    });
</script>
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>report/search_cancelled">
                <div class="modal-body">                
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input placeholder="Start Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="start_date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input placeholder="Completion Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="completion_date">
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
                    <div class="form-group" id ="p_emp">
                        <div class = "row">
                            <div class = "col-md-10">
                                <select class="form-control" name='employee1' id ="employee1">
                                    <option value="">-Select Accountable Employee-</option>
                                    <?php foreach($employee AS $emp){ ?>
                                        <option value="<?php echo $emp->employee_id; ?>"><?php echo $emp->employee_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class = "col-md-2">
                                <a href="#" class="btn-primary btn-sm btn-fill" id="addEmp">+</a> 
                                <a href="#" class= "btn-danger btn-sm btn-fill" id="remEmp">x</a>
                            </div>  
                        </div>
                        <input type="hidden" id="counterX" name="counterX" value="1">
                        <input type = "hidden" value = "1" id = "counter" name  = "counter">
                    </div>
                    <!-- <div class="form-group">
                        <select class="form-control" placeholder="Employee" class="custom-select" multiple name="employee[]">
                            <option value = "">--Select Employee--</option>
                            <?php foreach($employee AS $e){ ?>
                            <option value = "<?php echo $e->employee_id; ?>"><?php echo $e->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div> -->
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
                        <li class="breadcrumb-item active">Cancelled Tasks</li>
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
                        <h4 class="card-title"><span class="text-danger fa fa-circle"></span> CANCELLED TASKS
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
                                    <a href='<?php echo base_url(); ?>report/cancelled_list' class='remove_filter alert-link pull-right btn btn-xs'>
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
                                                     <?php $employee = explode(",", $proj->employee);  
                                                     
                                                        $count = count($employee);
                                                        $emp='';
                                                         for($x=0;$x<$count;$x++){
                                                            $emp.= $ci->get_updated_name($employee[$x]). ", ";
                                                         } 
                                                         $employees = substr($emp, 0, -2);
                                                          ?>
                                                    <tr>
                                                        <td class="bg-hovr" width="50%" class="nobor-top">
                                                            <h6 class="proj-title m-b-0" >
                                                                <span class="fw500"><?php echo $proj->task_no; ?></span> -
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
                                                            <h4 class="proj-title fw500 m-b-10"><?php echo $proj->project_title; ?></h4>
                                                            <div class="proj-title fw500 h7 m-0"><?php echo $ci->get_name("company", "company_name", "company_id", $proj->company_id); ?></div>
                                                            <div class="proj-title fw500 h7 m-0">Bacolod City</div>
                                                            <small class="proj-title m-0 btn-block fw500"><?php echo $employees; ?></small>  
                                                        </td>

                                                        <td class="bg-hovr" width="20%" class="nobor-top">
                                                            <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->start_date)); ?></span></small>
                                                            <small class="proj-title btn-block m-0 text-danger">Due DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->completion_date)); ?></span></small>
                                                             <small class="proj-title btn-block m-0">NO. OF WORKING DAYS: <span class="pull-right">
                                                                  <?php echo $ci->date_diff($proj->start_date, $proj->cancel_date); ?>
                                                            </span></small>
                                                             <small class="proj-title btn-block m-0">CANCELLED DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->cancel_date)); ?></span></small>
                                                        </td>
                                                        <td class="bg-hovr" width="29%" class="nobor-top">
                                                            <div class="progress progress-bar-animated active">
                                                                <div class="progress-bar bg-danger progress-bar-striped"  role="progressbar" aria-valuenow="<?php echo $ci->project_percent($proj->project_id); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($proj->project_id); ?>%">

                                                                <?php if($ci->project_percent($proj->project_id) <= '50') { ?>    
                                                                </div>
                                                                    <span class="m-t-10 m-l-5 m-b-10" style="font-size: 20px;color: #6c757d!important">
                                                                        <?php echo $ci->project_percent($proj->project_id); ?>%
                                                                    </span>
                                                                <?php } else { ?>
                                                                    <span class="m-t-10 m-l-5 m-b-10" style="font-size: 20px;">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>