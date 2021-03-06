<?php
    $ci =& get_instance();
     $now=date('Y-m-d');
?>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    var ii = 1;
    $("body").on("click", ".addEmp", function() {
        ii++;
        var $append = $(this).parents('.append');
        var nextHtml = $append.clone().find("select").val("").end();
        nextHtml.attr('id', 'append' + ii);
        var hasRmBtn = $('.remEmp', nextHtml).length > 0;
        if (hasRmBtn==false) {
            var rm = "<a type='button' class='btn-danger btn-sm btn-fill remEmp'>x</a>"
            $('.addmoreappend', nextHtml).append(rm);
        }
        $append.after(nextHtml); 

    });

    $("body").on("click", ".remEmp", function() {
        $(this).parents('.append').remove();
    });
</script>
<body onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>report/search_pending">
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
                        <div class="append" id="append0">
                            <div class = "row">
                                <div class = "col-md-10">
                                    <select class="form-control" name='employee[]' id ="employee1">
                                        <option value="">-Select Accountable Employee-</option>
                                        <?php foreach($employee AS $emp){ ?>
                                            <option value="<?php echo $emp->employee_id; ?>" <?php echo (!empty($project_id) ? (((($emp->employee_id == $mp))) ? ' selected' : '') : ''); ?>><?php echo $emp->employee_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2 addmoreappend">
                                    <a type="button" class="btn-primary btn-sm btn-fill addEmp">+</a>
                                </div>
                            </div>
                        </div>
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
                        <input type="number" name="priority" class="form-control" max='3' placeholder="Priority Number">
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
                        <li class="breadcrumb-item active">Pending Tasks</li>
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
                        <h4 class="card-title"><span class="text-warning fa fa-circle"></span> PENDING TASKS
                            <div class="pull-right">
                                <a href="<?php echo base_url(); ?>task/add_task" class="btn btn-primary btn-sm bor-radius " data-toggle="tooltip" data-placement="top" title="Add Tasks" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                                <span data-toggle="modal" data-target="#filter">
                                    <a class="btn btn-secondary btn-sm bor-radius " data-toggle="tooltip" data-placement="top" title="Filter" >
                                        <span class="fa fa-filter" ></span>
                                    </a>
                                </span>
                            </div>
                        </h4>        
                        <h6 class="card-subtitle"><br></h6>
                        <?php if(!empty($filt)){ ?>   
                            <div class="alert alert-info" role="alert">
                                <span class='btn btn-xs btn-info disabled'>Filter Applied</span> <?php echo $filt; ?>
                                <a href='<?php echo base_url(); ?>report/pending_list' class='remove_filter alert-link pull-right btn btn-xs'>
                                    <span class="fa fa-times"></span>
                                </a>
                            </div>                             
                        <?php } ?> 
                        <div class="table-responsive">                                                       
                            <table id="myTable" class="table" >
                                <thead >
                                    <tr class="nobor-top">
                                        <th class="nobor-top"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(!empty($pending)){
                                    foreach($pending AS $p){ 
                                        $employees = explode(",", $p->employee);  
                                        $count = count($employees);
                                        $emp='';
                                        for($x=0;$x<$count;$x++){
                                            $emp.= $ci->get_updated_name($employees[$x]). ", ";
                                        } 
                                        $employee = substr($emp, 0, -2);
                                    ?>  
                                    <tr>
                                        <td class="p-0">                                            
                                            <a class="text-dfault"  href="<?php echo base_url(); ?>report/view_task/<?php echo $p->project_id; ?>" >
                                                <table width="100%" >
                                                    <tr>
                                                        <td class="bg-hovr" width="50%" class="nobor-top">
                                                            <h6 class="proj-title m-b-0" >
                                                                <span class="fw500"><?php echo $p->task_no; ?></span> -
                                                                <?php if($p->priority_no==1){ ?>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <?php } else if($p->priority_no==2){ ?>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-dfault2 fa fa-flag"></span>
                                                                <?php } else if($p->priority_no==3) { ?>
                                                                <span class="text-warning fa fa-flag"></span>
                                                                <span class="text-dfault2 fa fa-flag"></span>
                                                                <span class="text-dfault2 fa fa-flag"></span>
                                                                <?php } ?> 
                                                            </h6>     
                                                            <h4 class="proj-title fw500 m-b-10"><?php echo $p->project_title; ?></h4>
                                                            <div class="proj-title fw500 h7 m-0"><?php echo $ci->get_name("company", "company_name", "company_id", $p->company_id); ?></div>
                                                            <div class="proj-title fw500 h7 m-0">Bacolod City</div>
                                                            <small class="proj-title m-0 btn-block fw500"><?php echo $employee; ?></small>  
                                                        </td>
                                                        <td class="bg-hovr" width="20%" class="nobor-top">
                                                            <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right"><?php echo date("m-d-Y", strtotime($p->start_date)); ?></span></small>
                                                            <small class="proj-title btn-block m-0 text-danger">Due DATE: <span class="pull-right"><?php echo date("m-d-Y", strtotime($p->completion_date)); ?></span></small>
                                                              <small class="proj-title btn-block m-0">NO. OF WORKING DAYS: <span class="pull-right">
                                                                  <?php 
                                                                    echo $ci->date_diff($p->start_date, $now);
                                                                    ?>
                                                            </span></small>

                                                            <?php if($p->status != 1) { ?>
                                                            <small class="proj-title btn-block m-0">REMAINING DAYS: <span class="pull-right">
                                                                <?php   if(empty($ci->latest_extension($p->project_id))){
                                                                    echo $ci->date_diff($now, $p->completion_date); 
                                                                } else {
                                                                      echo $ci->date_diff($now, $ci->latest_extension($p->project_id)); 
                                                                } ?>
                                                            </span></small>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="bg-hovr" width="35%" class="nobor-top">
                                                            <div class="progress progress-bar-animated active">
                                                                <div class="progress-bar bg-warning progress-bar-striped"  role="progressbar" aria-valuenow="<?php echo $ci->project_percent($p->project_id); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($p->project_id); ?>%">
                                                                <?php if($ci->project_percent($p->project_id) <= '50') { ?>    
                                                                </div>

                                                                    <span class="m-t-10 m-l-5 m-b-10" style="font-size: 20px;color: #6c757d!important">
                                                                        <?php echo $ci->project_percent($p->project_id); ?>%
                                                                    </span>
                                                                <?php } else { ?>
                                                                    <span class="m-t-10 m-l-5 m-b-10" style="font-size: 20px;">
                                                                        <?php echo $ci->project_percent($p->project_id); ?>%
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
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>