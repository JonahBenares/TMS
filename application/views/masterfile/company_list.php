<!-- modals -->
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>masterfile/insert_company">
                <div class="modal-body">
                    <div class="form-group">
                        Company Name
                        <input type="text" name="company" class="form-control">
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
                <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>masterfile/edit_company">
                <div class="modal-body">
                    <div class="form-group">
                        Company Name
                        <input type="text" name="company" id ="company_name" class="form-control">
                    </div>
                </div>
                <input type="hidden" name="company_id" id = "company_id">
                <div class="modal-footer">                                        
                    <button type="submit" class="btn btn-info btn-block">Update</button>
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
                        <li class="breadcrumb-item active">Company</li>
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
                        <h4 class="card-title">Company
                            <span data-toggle="modal" data-target="#addCompany">
                                <a href="#" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="tooltip" data-placement="top" title="Add Company" >
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
                                        <th>Company Name</th>
                                        <th width="7%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($company AS $c){ ?>
                                    <tr>
                                        <td><?php echo $c->company_name; ?></td>
                                        <td>                                            
                                            <div class="table-data-feature">
                                                <span data-toggle="modal" data-target="#updateCompany">
                                                    <a  class="btn btn-info item btn-sm" data-toggle="tooltip" data-id = "<?php echo $c->company_id; ?>" data-name = "<?php echo $c->company_name; ?>" id = "updateComp_button" data-placement="top" title="Update" >
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                </span>
                                                
                                                <a href="<?php echo base_url(); ?>masterfile/delete_company/<?php echo $c->company_id; ?>" onclick="confirmationDelete(this);return false;" class="btn btn-danger item btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" title="Delete" alt='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
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