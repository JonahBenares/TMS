<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard/">Dashboard</a></li>
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
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">                            
                            <table id="myTable" class="table table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Reminder Name</th>
                                        <th width="15%">Due Date</th>
                                        <th>Employee</th>
                                        <th width="7%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>                                            
                                            <div class="table-data-feature">
                                                <span data-toggle="modal" data-target="#updateCompany">
                                                    <a  class="btn btn-info item btn-sm" data-toggle="tooltip" data-placement="top" title="Update" >
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                </span>
                                                
                                                <a href="" onclick="confirmationDelete(this);return false;" class="btn btn-danger item btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" title="Delete" alt='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>