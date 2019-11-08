<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
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
                        <h4 class="card-title">Update Profile</h4>                         
                        <h6 class="card-subtitle"><br></h6>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <form method="POST" action = "<?php echo base_url(); ?>masterfile/">
                                    <div class="modal-body">
                                        <div class="form-group">                                            
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="Employee Name">
                                        </div>                            
                                        <div class="form-group">
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="Company">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="Department">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="employee" id = "employee" class="form-control"placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="Old Password">
                                            <center><a href="" class="text-danger">Reset Password</a></center>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="employee" id = "employee" class="form-control" placeholder="Retype New Password">
                                        </div>
                                    </div>
                                    <input type="hidden" name="employee_id" id = "employee_id" class="form-control" >
                                    <div class="modal-footer">                                        
                                        <button type="submit" class="btn btn-info btn-block">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>