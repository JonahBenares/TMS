    <?php
    $ci =& get_instance();
    $now=date('Y-m-d');
    $year=date('Y');
    $month=date('m');
    ?>
<body onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">

<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?php echo base_url(); ?>masterfile/insert_reminder">
                <div class="modal-body">
                    <div class="form-group">
                        Employee Name
                        <select name="employee" class="form-control">
                            <option value = "">--Select Employee--</option>
                            <?php foreach($employees AS $e){ ?>
                            <option value = "<?php echo $e->employee_id; ?>"><?php echo $e->employee_name; ?></option>
                            <?php } ?>
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
                  
                </div>
                <div class="modal-footer">                                        
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </div>  
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="cancel_reminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>masterfile/cancel_reminder">
                <div class="modal-body">
                    <div class="form-group">
                        Reason
                        <textarea name="reason" class="form-control" id = "reason"></textarea>
                    </div>
                    <div class="form-group">
                        Cancel Date
                        <input type="date" name="cancel_date" class="form-control" id = "cancel_date">
                    </div>
                </div>
                <input type="hidden" name="reminder_id" id = "reminder_id1" class="form-control">
                <input type="hidden" name="trigger" id = "trigger" class="form-control">
                <div class="modal-footer">                                        
                    <button type="submit" class="btn btn-danger btn-block">Cancel</button>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card oh">
                    <div class="card-body">
                        <table id="prior" class="table" >
                            <thead >
                                <tr class="nobor-top">
                                    <th class="nobor-top"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                 /*   function countWeekendDays($start, $end){
                                        $count =0;
                                       $begin = new DateTime($start);
                                        $end = new DateTime($end);

                                        $interval = DateInterval::createFromDateString('1 day');
                                        $period = new DatePeriod($begin, $interval, $end);

                                        foreach ($period as $dt) {
                                            if($dt->format("l")=='Sunday'){
                                                $count++;
                                            
                                            }
                                        }

                                        return $count;
                                    }
                                    */
                                    foreach($projects AS $proj){ 
                                        $start = strtotime($proj->start_date);
                                        $end = strtotime($now);

                                     
                                        //$counts = countWeekendDays($proj->start_date, $now);
                                        $working_days = $ci->date_diff($proj->start_date,$now);

                                      
                                        
                                ?>
                                <tr>
                                    <td class="p-0">
                                        <a class="text-dfault"  href="<?php echo base_url(); ?>report/view_task/<?php echo $proj->project_id; ?>" >
                                            <table  width="100%" id = "rrur">                                             
                                                    <?php $employee = explode(",", $proj->employee);                                                   
                                                    $count = count($employee);
                                                    $emp='';
                                                    for($x=0;$x<$count;$x++){
                                                    $emp.= $ci->get_updated_name($employee[$x]). ", ";
                                                    } 
                                                    $employees = substr($emp, 0, -2);
                                                    ?>
                                                <tr>
                                                    <td class="bg-hovr" class="nobor-top">
                                                        <!--  <span class="" style="display: none"><?php 

                                                          if(empty($ci->latest_extension($proj->project_id))){
                                                                    echo date('m-d-Y', strtotime($proj->completion_date)); 
                                                                } else {
                                                                     echo date('m-d-Y', strtotime($ci->latest_extension($proj->project_id))); 
                                                                } 
                                                                ?></span> -->
                                                        <h6 class="proj-title">
                                                            <span class="fw500">#<?php echo $proj->task_no; ?></span> |
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
                                                        <h4 class="proj-title m-0 fw500"> <?php echo $proj->project_title; ?></h4>
                                                        <div class="proj-title fw500 h7 m-t-5"><?php echo $ci->get_company_name($proj->company_id); ?></div>
                                                        <div class="proj-title fw500 h7 m-b-10"><?php echo $ci->get_name("location", "location_name", "location_id", $proj->location_id); ?></div>
                                                        <small class="proj-title fw500"><?php echo $employees; ?></small>  
                                                        <br>
                                                        
                                                        <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right"><?php echo date('m-d-Y', strtotime($proj->start_date)); ?></span></small>
                                                        <small class="proj-title btn-block m-0 text-danger">Due DATE: <span class="pull-right"><?php 

                                                          if(empty($ci->latest_extension($proj->project_id))){
                                                                    echo date('m-d-Y', strtotime($proj->completion_date)); 
                                                                } else {
                                                                     echo date('m-d-Y', strtotime($ci->latest_extension($proj->project_id))); 
                                                                } 
                                                                ?></span></small>

                                                        <small class="proj-title btn-block m-0">NO. OF WORKING DAYS: <span class="pull-right"><?php echo $working_days; ?></span></small>
                                                        <small class="proj-title btn-block m-0">REMAINING DAYS: 
                                                            <span class="pull-right"> 
                                                                <?php  
                                                                    if(empty($ci->latest_extension($proj->project_id))){
                                                                        $remaining_days = $ci->date_diff($now, $proj->completion_date);
                                                                        echo $remaining_days;
                                                                    }else {
                                                                        $remaining_days = $ci->date_diff($now, $ci->latest_extension($proj->project_id));
                                                                        echo $remaining_days;
                                                                    } 
                                                                    /*if(empty($ci->latest_extension($proj->project_id))){
                                                                        echo $remaining_days; 
                                                                    } else {
                                                                        echo $remaining_days; 
                                                                    }*/ 
                                                                ?>
                                                            </span>
                                                        </small>
                                                        <div class="progress progress-bar-animated active">
                                                            <div role="progressbar" class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $ci->project_percent($proj->project_id); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ci->project_percent($proj->project_id); ?>%">
                                                            <?php if($ci->project_percent($proj->project_id) <= '50') { ?>    
                                                            </div>
                                                                <span class="" style="font-size: 12px;color: #6c757d!important">
                                                                    <?php echo $ci->project_percent($proj->project_id); ?>%
                                                                </span>
                                                            <?php } else { ?>
                                                                <span class="" style="font-size: 12px;">
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
                        <h5 class="card-title">Follow Up Projects
                            <!-- <span data-toggle="modal" data-target="#addCompany" class="pull-right">
                                <a href="#" class="btn btn-primary btn-sm bor-radius" data-toggle="tooltip" data-placement="top" title="Add Reminder" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span> -->
                        </h5>
                        <h6 class="card-subtitle">check out your weekly schedule</h6>
                        <?php
                            $msg_email= $this->session->flashdata('msg_email');  
                            if($msg_email){
                        ?>
                            <div class="row">
                                 <div class="col-lg-12">
                                    <div class="success bor-radius10 shadow alert-success alert-shake animated headShake" style='padding:10px'>
                                        <center><?php echo $msg_email; ?></center>                    
                                    </div>
                                </div>
                            </div>
                        <?php } ?> 
                        <?php 
                            if(!empty($followup)){
                                $columns = array_column($followup, 'followup_date');
                                $a = array_multisort($columns, SORT_ASC, $followup);
                                $today = date('Y-m-d');
                                foreach($followup AS $r){ 
                        if($r['followup_date']!='1970-01-01'){ ?>
                        <div class="steamline ">
                            <div class="sl-item">
                                <div class="sl-left bg-success"></div>
                                <div class="sl-right">
                                    <div class="font-medium"><?php echo $r['notes']; ?></div>
                                    <div class="h7"><?php echo $ci->get_company_name($r['company_id']); ?></div>
                                    <div class="h7">Monitoring Person: <?php echo $r['employee']; ?></div>
                                    <br>                                    
                                    <small> 
                                        <?php echo $r['followup_date']; ?>
                                        <?php                                        
                                        if($r['followup_date']<=$today){?>
                                            <span class="m-l-5 text-danger"><?php echo $r['days_left']; ?></span>
                                        <?php }else{ ?>
                                            <span class="m-l-5 text-info"><?php echo $r['days_left']; ?></span>
                                        <?php } ?>
                                    </small>
                                     <div class="pull-right">
                                        <span data-toggle="modal" class="pull-right">
                                            <a href = "<?php echo base_url(); ?>masterfile/send_ffmail/<?php echo $r['project_id']?>/<?php echo $r['pd_id']; ?>" onclick="return confirm('Are you sure you want to send email?')" class="btn btn-info item btn-xs" data-toggle="tooltip" data-placement="top" title="Email" alt='Email'>
                                                <i class="fa fa-paper-plane"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } }?>
                    </div>
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
                        <?php
                            $msg= $this->session->flashdata('msg');  
                            if($msg){
                             ?>
                            <div class="row">
                                 <div class="col-lg-12">
                                    <div class="success bor-radius10 shadow alert-success alert-shake animated headShake" style='padding:10px'>
                                        <center><?php echo $msg; ?></center>                    
                                    </div>
                                </div>
                            </div>
                        <?php }  ?> 
                        <?php 
                            if(!empty($reminders)){
                                $columns = array_column($reminders, 'due_date');
                                $a = array_multisort($columns, SORT_ASC, $reminders);
                                 $today = date('Y-m-d');
                            foreach($reminders AS $r){ ?>
                        <div class="steamline m-0" <?php if($r['due_date']<=$today){?> style="border-left:1px solid red; " <?php } ?>>
                            <div class="sl-item" <?php if($r['due_date']<=$today){?> style="border-bottom:1px solid red; " <?php } ?>>
                                <div class=""></div>
                                <?php                                        
                                if($r['due_date']<=$today){?>
                                <button class="btn-xs btn sl-left btn-danger button-glow" data-toggle="tooltip" data-placement="top" title="OVERDUE" ></button>
                                <?php }else{ ?>
                                <button class="btn-xs btn sl-left "></button>                                  
                                <?php } ?>
                                <div class="sl-right p-t-5 " <?php if($r['due_date']<=$today){?> style="background:#fdeded " <?php } ?>>
                                    <h5 class="font-medium m-0"><?php echo $r['notes']; ?></h5>
                                    <small class="desc m-b-5 btn-block"><?php echo $r['employee']; ?></small> 
                                    <span class="sl-date"> 
                                        <?php echo $r['due_date']; ?>
                                        <?php                                        
                                        if($r['due_date']<=$today){?>
                                        <span class="m-l-5 text-danger"><?php echo $r['days_left']; ?></span>
                                        <?php }else{ ?>
                                        <span class="m-l-5 text-info"><?php echo $r['days_left']; ?></span>                                       
                                        <?php } ?>
                                        <?php if($r['reminder_id']!=0){ ?>
                                        <div class="pull-right">
                                            <span data-toggle="modal" data-target="#cancel_reminder" class="pull-right">
                                                <a data-id = "<?php echo ($r['project_id']!=0) ? $r['project_id'] : $r['reminder_id'] ; ?>" data-name = "<?php echo ($r['project_id']!=0) ? 'Project' : 'Reminder' ; ?>" class="btn btn-danger item btn-xs" data-toggle="tooltip" data-placement="top" id = "updateCancel_button"  title="Cancel" title="Cancel" alt='Cancel'>
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>                                           
                                            <span >
                                                <a  href="<?php echo base_url(); ?>masterfile/done_reminder/<?php echo $r['reminder_id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-success item btn-xs" data-toggle="tooltip" data-placement="top" id = "updateCancel_button"  title="Done" title="Done" alt='Done'>
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </span>  
                                        </div>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <?php }  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>