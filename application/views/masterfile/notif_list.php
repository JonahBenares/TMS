<?php
    $ci =& get_instance();
?>
<body onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Notifications</li>
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
                        <h4 class="card-title">All Notifications</h4>                             
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responssive">                            
                            <table id="myTable" class="table table-hover table-borsdered" >
                                <thead>
                                    <tr>
                                        <th style="padding: 0px"></th>
                                        <th style="padding: 0px" width="20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($notif AS $n){ ?>
                                    <tr <?php echo (($n->open == 0) ? "class='highnotif'" : ""); ?> >
                                        <td >
                                            <a href="<?php echo base_url(); ?>report/view_task/<?php echo $n->project_id; ?>/<?php echo $n->notification_id; ?>/<?php echo $n->pd_id; ?>">
                                                <div class="mail-contnet text-default" style="width: 100%;">
                                                    <h5 class="m-b-5 text-info"><?php echo $ci->get_name("employees", "employee_name", "employee_id", $n->employee_id); ?></h5> 
                                                    <h6 class="text-dfault"><?php echo $n->notification_message; ?></h6> 
                                                    <span class="text-dfault"><?php echo date('F j, Y: H:i:s', strtotime($n->notification_date)); ?></span>
                                                    
                                                </div>
                                            </a>
                                        </td>
                                         <?php if($n->open == 1) {?> 
                                        <td>
                                            <span>Seen</span><br>
                                            <span><?php echo date('F j, Y: H:i:s', strtotime($n->open_date)); ?></span>
                                        </td>    
                                        <?php } else { ?>
                                            <td>
                                            <span>Unread</span><br>
                                            <span></span>
                                        </td>  
                                        <?php } ?>                                    
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
</body>