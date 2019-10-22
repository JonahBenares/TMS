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
            <form method="POST" action = >
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
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="department" class="form-control" placeholder="Department">
                            <option value = "">--Select Department--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="employee" class="form-control" placeholder="Employee" class="custom-select" multiple name="employee[]">
                            <option value = "">--Select Employee--</option>
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
                                <span class='btn btn-success disabled'>Filter Applied</span>names, <a href='<?php echo base_url(); ?>report/completed_list' class='remove_filter alert-link pull-right btn'><span class="fa fa-times"></span></a>
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
                                         
                                            <a class="text-dfault"  href="<?php echo base_url(); ?>report/view_task/>" >
                                                <table width="100%" >
                                                    <tr>
                                                        <td width="6%">
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                        </td>
                                                        <td class="bg-hovr" width="50%" class="nobor-top"><h4 class="proj-title m-0">Project Title</h4>
                                                            <small class="proj-title">employee</small><br>
                                                            <small class="proj-title"><b>Company</b></small>
                                                        </td>
                                                        <td class="bg-hovr" width="%" class="nobor-top">
                                                            <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right"></span></small>
                                                            <small class="proj-title btn-block m-0">Due DATE: <span class="pull-right"></span></small>
                                                            <small class="proj-title btn-block m-0">COMPLETED DATE: <span class="pull-right"></span></small>
                                                            <small class="proj-title btn-block m-0">CANCELLED DATE: <span class="pull-right"></span></small>
                                                        </td>

                                                        <td class="bg-hovr" width="29%" class="nobor-top">
                                                            <div class="progress progress-bar-animated active">
                                                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="50%" aria-valuemin="0" aria-valuemax="100" style="width: 50%"><h4 class="m-t-10 m-b-10">50%</h4></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </a> 
                                            
                                        </td>                                       
                                    </tr>
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