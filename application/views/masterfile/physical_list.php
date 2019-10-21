<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Physical Condition</li>
                        <li class="breadcrumb-item">
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-warning btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-success btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-info btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-primary btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-secondary btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-dark btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-cyan btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-purple btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-primary-alt btn-lg waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-secondary-alt btn-lg waves-effect waves-dark"><span class="fa fa-bars"></span></button>

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
                        <h4 class="card-title">Physical Condition
                            <a href="#" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="modal" data-target="#mediumModal">
                                <span class="fa fa-plus" ></span>
                            </a>
                        </h4>
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">
                           <!--  <button class="animated infinite flash btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button> Flassh
                            <br><br>
                            <button class="animated infinite pulse btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button> pulse
                            <br><br> 
                            <button class="animated infinite rubberBand btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button> rubberband
                            <br><br>
                            <button class="animated infinite swing btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>swing
                            <br><br>
                            <button class="animated infinite headShake btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>headshake
                            <br><br>
                            <button class="animated infinite tada btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>tada
                            <br><br>
                            <button class="animated infinite wobble btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>wobble
                            <br><br>
                            <button class="animated infinite jello btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>jello 
                            <br><br>
                            <button class="animated infinite flip btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>flip
                            <br><br>
                            <button class="animated infinite flipInX btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>flip
                            <br><br>
                            <button class="animated infinite rotateIn btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>flip
                            <br><br>
                            <button class="animated infinite hinge btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>flip
                            <br><br>
                            <button class="animated infinite rollIn btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>flip
                            <br><br>
                            <button class="animated infinite headShake btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="animated infinite headShake btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="animated infinite headShake btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="animated infinite headShake btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button>
                            <button class="btn btn-danger btn-sm waves-effect waves-dark"><span class="fa fa-bars"></span></button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Physical Condition
                            <a href="#" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="modal" data-target="#mediumModal">
                                <span class="fa fa-plus" ></span>
                            </a>
                        </h4>
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">
                            
                            <!-- <table id="myTable" class="table table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Physical Condition</th>
                                        <th width="7%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach($physical AS $dep){ ?>
                                    <tr>
                                        <td><?php echo $dep->condition_name;?></td>
                                        <td>                                            
                                            <div class="table-data-feature">
                                                <a href="<?php echo base_url(); ?>masterfile/physical_update/<?php echo $dep->physical_id?>" class="btn btn-info item btn-sm" data-toggle="tooltip" data-placement="top" title="Update">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>masterfile/delete_physical/<?php echo $dep->physical_id;?>" onclick="confirmationDelete(this);return false;" class="btn btn-danger item btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" title="Delete" alt='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>