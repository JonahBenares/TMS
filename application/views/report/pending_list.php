<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard/">Dashboard</a></li>
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
                            <a href="<?php echo base_url(); ?>index.php/task/add_task" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="tooltip" data-placement="top" title="Add Tasks" >
                                <span class="fa fa-plus" ></span>
                            </a>
                        </h4>        
                                        
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">                            
                            <table id="myTable" class="table" >
                                <thead >
                                    <tr class="nobor-top">
                                        <th class="nobor-top"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-0">
                                            <a class="text-dfault"  href="<?php echo base_url(); ?>index.php/masterfile/dashboard/" >
                                                <table width="100%" >
                                                    <tr>
                                                        <td class="bg-hovr" width="50%" class="nobor-top"><h4 class="proj-title m-0">PROJECT TITLE PITO</h4><small class="proj-title">JASON</small></td>
                                                        <td class="bg-hovr" width="%" class="nobor-top">
                                                            <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right">MM-DD-YY</span></small>
                                                            <small class="proj-title btn-block m-0">COMPLETION DATE: <span class="pull-right">MM-DD-YY</span></small></td>
                                                        <td class="bg-hovr" width="30%%" class="nobor-top">
                                                            <div class="progress progress-bar-animated active">
                                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"><h4 class="m-t-10 m-b-10">75%</h4></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </a> 
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