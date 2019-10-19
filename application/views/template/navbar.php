
<body class="skin-default-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">TASK MONITORING SYSTEM</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                       <!--  <b>
                            <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo base_url(); ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                         	<img src="<?php echo base_url(); ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         	<img src="<?php echo base_url(); ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                     	</span>  -->
                 	</a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-tachometer"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></a>
                            <div class="dropleft dropdown-menu shadow drop-left">
                              <span class="dropdown-item bg-dark text-white" disable><center><small>MASTERFILE</small></center></span>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/masterfile/company_list/">Company</a>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/masterfile/department_list/">Department</a>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/masterfile/employee_list/">Employee</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil-square-o"></i></a>
                            <div class="dropleft dropdown-menu shadow drop-left">
                              <span class="dropdown-item bg-dark text-white" disable><center><small>TASK</small></center></span>
                              <a class="dropdown-item" href="#">Add New</a>
                              <a class="dropdown-item" href="#">List</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
                            <div class="dropleft dropdown-menu shadow ">
                              <span class="dropdown-item bg-warning text-white" disable><center>MASTERFILE</center></span>
                              <a class="dropdown-item" href="#">My Settings</a>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/masterfile/user_logout">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="border-left:1px solid rgba(0, 0, 0, 0.1)"></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="img-circle" width="30"></a>
                            <div class="dropdown-menu shadow ">
                              <a class="dropdown-item" href="#">My Settings</a>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/masterfile/user_logout">Logout</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <!-- <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="elegant admin template"></span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="fa fa-tachometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark accordion">
                                <i class="fa fa- fa-chevron-down"></i>
                                <span class="hide-menu"></span>Masterfile
                            </a>
                            <div class="panel">
                              <a href="<?php echo base_url(); ?>index.php/masterfile/employee_list" class="acc waves-effect waves-dark" >Employees</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>index.php/masterfile/physical_list">Physical Condition</a>
                              <a class="acc waves-effect waves-dark" href="">Category</a>
                              <a class="acc waves-effect waves-dark" href="">Office</a>
                              <a class="acc waves-effect waves-dark" href="">Employee</a>
                              <a class="acc waves-effect waves-dark" href="">Location</a>
                              <a class="acc waves-effect waves-dark" href="">Placement</a>
                              <a class="acc waves-effect waves-dark" href="">Rack</a>
                              <a class="acc waves-effect waves-dark" href="">Currency</a>
                              <a class="acc waves-effect waves-dark" href="">UOM</a>
                            </div>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="fa fa-user-circle-o"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="fa fa-table"></i>
                                <span class="hide-menu"></span>Tables
                            </a>
                        </li>                        
                        <li> 
                            <a class="waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="fa fa-globe"></i>
                                <span class="hide-menu"></span>Map
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="fa fa-bookmark-o"></i>
                                <span class="hide-menu"></span>Blank
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="fa fa-question-circle"></i>
                                <span class="hide-menu"></span>404
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/navbar.js"></script>