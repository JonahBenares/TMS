<!-- modals -->
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?php echo base_url(); ?>reminder/insert_reminder">
                <div class="modal-body">
                    <div class="form-group">
                        Employee Name
                        <select name="employee" class="form-control">
                            <option value = "">--Select Employee--</option>
                            <?php foreach($employee AS $e){ ?>
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


<div class="modal fade" id="updateCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>reminder/edit_reminder">
                <div class="modal-body">
                    <div class="form-group">
                        Employee Name
                        <select name="employee" class="form-control" id = "employee">
                            <option value = "">--Select Employee--</option>
                            <?php foreach($employee AS $e){ ?>
                            <option value = "<?php echo $e->employee_id; ?>"><?php echo $e->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Notes
                        <textarea name="notes" class="form-control" id = "notes"></textarea>
                    </div>
                    <div class="form-group">
                        Due Date
                        <input type="date" name="due_date" class="form-control" id = "due_date">
                    </div>
                    <!-- <div class="form-group">
                        Status
                        <select name="status" class="form-control" id = "status">
                            <option value = "">--Select Status--</option>
                            <option value = "0">Active</option>
                            <option value = "1">Cancelled</option>
                        </select>
                    </div> -->
                </div>
                <input type="hidden" name="reminder_id" id = "reminder_id" class="form-control">
                <div class="modal-footer">                                        
                    <button type="submit" class="btn btn-info btn-block">Update</button>
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
            <form method="POST" action="<?php echo base_url(); ?>reminder/cancel_reminder">
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
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reminder</li>
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
                        <h4 class="card-title">Reminder
                            <span data-toggle="modal" data-target="#addCompany">
                                <a href="#" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="tooltip" data-placement="top" title="Add Reminder" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span>
                        </h4>    
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
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">                            
                            <table id="myTable" class="table table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th width="15%">Due Date</th>
                                        <th>Notes</th>
                                        <th>Employee</th>
                                        <th>Status</th>
                                        <th>Days Left</th>
                                        <th width="7%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(!empty($reminders)){ 
                                            foreach($reminders AS $r){ 
                                    ?>
                                    <tr>
                                        <td><?php echo date('F d, Y', strtotime($r['due_date'])); ?></td>
                                        <td><?php echo $r['notes']; ?></td>
                                        <td><?php echo $r['employee']; ?></td>
                                        <td><?php echo ($r['status']==0) ? 'Active' : '<span style = "color:red">Cancelled</span>'; ?></td>
                                        <td><?php echo $r['days_left']; ?></td>
                                        <td>                                            
                                            <div class="table-data-feature">
                                                <span data-toggle="modal" data-target="#updateCompany">
                                                    <a  class="btn btn-info item btn-sm" data-toggle="tooltip" data-id = "<?php echo $r['reminder_id']; ?>" data-name = "<?php echo $r['notes']; ?>" data-aa = "<?php echo $r['employee_id']; ?>" data-bb = "<?php echo $r['due_date']; ?>" data-cc = "<?php echo $r['status']; ?>"  id = "updateRem_button" data-placement="top" title="Update" >
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                </span>
                                                <span data-toggle="modal" data-target="#cancel_reminder">
                                                    <a class="btn btn-danger item btn-sm" data-toggle="tooltip" data-id = "<?php echo $r['reminder_id']; ?>" id = "updateCancel_button" data-placement="top" title="Cancel" title="Cancel" alt='Cancel'>
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </span>
                                            </div>
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