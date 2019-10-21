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
                   <!--  <a class="btn btn-success d-none d-lg-block m-l-15" href="https://wrappixel.com/templates/elegant-admin/"> Upgrade To Pro</a> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card oh">
                    <div class="card-body">
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
                                            <a class="text-dfault"  href="<?php echo base_url(); ?>index.php/report/view_task/" >
                                                <table width="100%" >
                                                    <tr>
                                                        <td width="8%">
                                                            <!-- priority 3 -->
                                                            <span class="text-dfault2 fa fa-flag"></span>
                                                            <span class="text-dfault2 fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>

                                                            <!-- 

                                                            priority 2 
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-dfault2 fa fa-flag"></span>
                                                            
                                                            priority 1 
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>
                                                            <span class="text-warning fa fa-flag"></span>

                                                            no priority  
                                                            <span class="text-dfault2 fa fa-flag"></span>
                                                            <span class="text-dfault2 fa fa-flag"></span>
                                                            <span class="text-dfault2 fa fa-flag"></span> -->
                                                        </td>
                                                        <td class="bg-hovr" width="50%" class="nobor-top"><h4 class="proj-title m-0">PROJECT TITLE PITO</h4><small class="proj-title">JASON</small>    
                                                        <div class="progress progress-bar-animated active">
                                                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"><h4 class="m-t-10 m-b-10">75%</h4></div>
                                                            </div>                                                    
                                                        </td>
                                                        <td class="bg-hovr" width="29%" class="nobor-top">                                                            
                                                            <small class="proj-title btn-block m-t-5">START DATE: <span class="pull-right">MM-DD-YY</span></small>
                                                            <small class="proj-title btn-block m-0">COMPLETION DATE: <span class="pull-right">MM-DD-YY</span></small>
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
                    <div class="card-body bg-light">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Today's Schedule</h5>
                        <h6 class="card-subtitle">check out your daily schedule</h6>
                        <div class="steamline m-t-40">
                            <div class="sl-item">
                                <div class="sl-left bg-success"> <i class="fa fa-user"></i></div>
                                <div class="sl-right">
                                    <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                    <div class="desc">you can write anything </div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                                <div class="sl-right">
                                    <div class="font-medium">Send documents to Clark</div>
                                    <div class="desc">Lorem Ipsum is simply </div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url(); ?>assets/images/users/1.jpg"> </div>
                                <div class="sl-right">
                                    <div class="font-medium">John Doe <span class="sl-date"> 5pm</span></div>
                                    <div class="desc">Call today with gohn doe </div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url(); ?>assets/images/users/2.jpg"> </div>
                                <div class="sl-right">
                                    <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">Contrary to popular belief</div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url(); ?>assets/images/users/3.jpg"> </div>
                                <div class="sl-right">
                                    <div><a href="#">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">Approve meeting with tiger
                                        <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Apporve</a> <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Refuse</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>