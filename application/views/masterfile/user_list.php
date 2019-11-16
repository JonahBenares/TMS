<!-- modals -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>masterfile/add_user">
                <div class="modal-body">
                    <div class="form-group">
                        Employee Name
                          <select name='employee_name' id="employee" class="form-control" required>
                            <option value='' selected>-Choose Employee-</option>
                            <?php foreach($employee AS $emp){ ?>
                                <option value="<?php echo $emp->employee_id; ?>"><?php echo $emp->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Username
                        <input type="text" name="username" id = "username" onblur='checkusername()' class="form-control" required>
                        <div class='msg'> </div>
                    </div>
                    <div class="form-group">
                        Company
                        <select name='company' class="form-control" required>
                            <option value='' selected>-Choose Company-</option>
                            <?php foreach($company AS $com){ ?>
                                <option value="<?php echo $com->company_id; ?>"><?php echo $com->company_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Department
                        <select name='department' class="form-control" required>
                            <option value='' selected>-Choose Department-</option>
                            <?php foreach($department AS $dept){ ?>
                                <option value="<?php echo $dept->department_id; ?>"><?php echo $dept->department_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Email
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        User Type
                        <select name='usertype' id='usertype' class="form-control" required>
                            <option value='' selected>-Choose Usertype-</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Monitoring Person</option>
                            <option value='3'>Employee</option>
                        </select>
                    </div>
                    <div class="form-group" id='location'>
                        Location
                        <select name='location' class="form-control">
                            <option value='' selected>-Choose Location-</option>
                             <?php foreach($location AS $lc){ ?>
                                <option value="<?php echo $lc->location_id; ?>"><?php echo $lc->location_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                   <div class="form-group">
                        Status
                        <select name='status' id='status' class="form-control" required>
                            <option value='' selected>-Choose Status-</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">                                        
                    <input type="submit" class="btn btn-primary btn-block" value="Add User" id='adduser'>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade " id="updateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action = "<?php echo base_url(); ?>masterfile/update_user">
                <div class="modal-body updateUser">
                    <div class="form-group">
                        Employee Name
                       <input type="text" name="employee" id = "employee" class="form-control" readonly>
                    </div>
                   
                    <div class="form-group">
                        Company
                        <select name='company' id='company' class="form-control" required>
                            <option value='' selected>-Choose Company-</option>
                            <?php foreach($company AS $com){ ?>
                                <option value="<?php echo $com->company_id; ?>"><?php echo $com->company_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        Department
                        <select name='department' id='department' class="form-control" required>
                            <option value='' selected>-Choose Department-</option>
                            <?php foreach($department AS $dept){ ?>
                                <option value="<?php echo $dept->department_id; ?>"><?php echo $dept->department_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                     <div class="form-group">
                        Email
                        <input type="email" name="email" id = "email" class="form-control">
                    </div>
                     <div class="form-group">
                        User Type
                        <select name='usertype' id='usertype_update' class="form-control" required>
                            <option value='' selected>-Choose Usertype-</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Monitoring Person</option>
                            <option value='3'>Employee</option>
                        </select>
                    </div>
                    <div class="form-group" id='location_update'>
                        Location<br>
                        Current Location: <span id="location_name"></span>
                        <select name='location' class="form-control">
                            <option  selected>-Choose New Location-</option>
                             <?php foreach($location AS $lc){ ?>
                                <option value="<?php echo $lc->location_id; ?>"><?php echo $lc->location_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                      <div class="form-group">
                        Status
                        <select name='status' id='status' class="form-control" required>
                            <option value='' selected>-Choose Status-</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                 <input type="hidden" name="user_id" id = "user_id" class="form-control">
                </div>
                
                <div class="modal-footer">                                        
                    <input type="submit" class="btn btn-info btn-block" value='Save Changes'>
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
                        <li class="breadcrumb-item active">Users</li>
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
                        <h4 class="card-title">Users
                            <span data-toggle="modal" data-target="#addCompany">
                                <?php 
                             
                                if($usertype==1 || $usertype==0){ ?>
                                <a href="#" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="tooltip" data-placement="top" title="Add Employee" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                                <?php } ?>
                            </span>
                        </h4>               
                        <?php if($usertype!=1){ ?>    
                            <center><h1 style="font-size: 200px; color:#ff7a7a" class="animated pulse infinite m-t-50"><span class="fa fa-warning"></span></h1></center>
                            <center><h2 style='color:#ff7a7a; text-transform: uppercase;'>Sorry, You are not allowed <br> to View user list.</h2></center>
                       
                          
                        <?php } ?> 
                        <div class="table-responsive" <?php if($usertype!=1 && $usertype!=0){ ?>  style="display: none" <?php } ?> >                            
                            <table id="myTable" class="table table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th width="1%"></th>
                                        <th>Employee Name</th>
                                        <th>Username</th>
                                        <th>Location</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th width="1%">Status</th>
                                        <th width="2%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users AS $us){ ?>
                                        <tr>
                                            <td align="right">
                                                <?php
                                                 if($us['usertype']==1){ ?>
                                                     <label class="label label-warning">Admin</label>
                                                <?php } else if($us['usertype']==2){ ?>
                                                     <label class="label label-secondary">Monitoring Person</label>
                                                <?php } else if($us['usertype']==3){ ?>
                                                     <label class="label label-info">Employee</label>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $us['fullname']; ?></td>
                                            <td><?php echo $us['username']; ?></td>
                                            <td><?php echo $us['location']; ?></td>
                                            <td><?php echo $us['company']; ?></td>
                                            <td><?php echo $us['department']; ?></td>
                                            <td><?php echo $us['email']; ?></td>
                                            <td>
                                                <?php if($us['status']==1){ ?>
                                                <label class="label label-success">Active</label>
                                                <?php } else { ?>
                                                <label class="label label-default bg-default">Inactive</label>
                                                <?php }  ?>
                                                
                                             
                                            </td>
                                            <td>      
                                            <center>                                      
                                                <div class="table-data-feature">
                                                    <span data-toggle="modal" data-target="#updateUser">
                                                        <a  class="btn btn-info item update_user  btn-sm" data-toggle="tooltip" data-id = "<?php echo $us['id']; ?>" data-name = "<?php echo $us['fullname']; ?>" data-company ="<?php echo $us['company_id']; ?>" data-department ="<?php echo $us['department_id']; ?>" data-email ="<?php echo $us['email']; ?>" data-status ="<?php echo $us['status']; ?>" data-usertype ="<?php echo $us['usertype']; ?>" data-locationid ="<?php echo $us['location_id']; ?>" data-location ="<?php echo $us['location']; ?>" id = "updateEmp_button" data-placement="top" title="Update" >
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </a>
                                                    </span>
                                                    
                                                   
                                                </div>
                                            </center>
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
<script type="text/javascript">

    $(document).ready(function() {
         $('#location').hide();
       
      

        $('#usertype').on('change',function(){
             var type = $('#usertype').val();
            if(type==2){
                $('#location').show();
             
            } else {
                 $('#location').hide();
            }
        });

         $('#usertype_update').on('change',function(){
           var type_change = $('#usertype_update').val();

            if(type_change==2){
                $('#location_update').show();
            } else {
                 $('#location_update').hide();
            }
        });
    });


    function checkusername(){
        var username = $('#username').val();
        if (username == '') {
            alert('Username must not be empty.');
        } else {
            $.ajax({
                url: 'checkusername',
                type: 'post',
                data: {
                    'username' : username,
                },
                success: function(response){
                  
                  if (response == '1' ) {
                    $('div.msg').text('Error: Username already taken.');
                    $('div.msg').addClass("success bor-radius10 shadow alert-danger alert-shake animated headShake");
                    $('div.msg').attr("style", "padding:10px");
                    $("#adduser").attr("disabled", true);
                  }else {
                   $('div.msg').text('Username available.');
                   $('div.msg').addClass("success bor-radius10 shadow alert-success");
                   $('div.msg').attr("style", "padding:10px");
                   $("#adduser").removeAttr("disabled");
                  }
                }
              });
        }
    }

 jQuery(document).on("click", ".update_user", function () {
      
     

     var user_id = $(this).data('id');
     var name = $(this).data('name');
     var company = $(this).data('company');
     var department = $(this).data('department');
     var email = $(this).data('email');
     var status = $(this).data('status');
     var usertype = $(this).data('usertype');
     var locationid = $(this).data('locationid');
     var location = $(this).data('location');
 
    if(usertype==2){
        $('#location_update').show();
     } else{
         $('#location_update').hide();
     }

     if(locationid!=''){
        $(".updateUser #location_upd").val(locationid);
        document.getElementById("location_name").innerHTML = location
     }

     $(".updateUser #user_id").val(user_id);
     $(".updateUser #employee").val(name);
     $(".updateUser #company").val(company);
     $(".updateUser #department").val(department);
     $(".updateUser #email").val(email);
     $(".updateUser #status").val(status);
     $(".updateUser #usertype_update").val(usertype);

   
});



</script>