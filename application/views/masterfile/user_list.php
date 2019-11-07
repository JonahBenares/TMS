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
                        <input type="text" name="employee_name" id = "employee" class="form-control">
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
                        <select name='usertype' class="form-control" required>
                            <option value='' selected>-Choose Usertype-</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Employee</option>
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
                        <input type="text" name="employee_name" id = "employee" class="form-control">
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
                        <select name='usertype' id='usertype' class="form-control" required>
                            <option value='' selected>-Choose Usertype-</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Employee</option>
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
                                <a href="#" class="btn btn-primary btn-sm bor-radius pull-right" data-toggle="tooltip" data-placement="top" title="Add Employee" >
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span>
                        </h4>                   
                        <h6 class="card-subtitle"><br></h6>
                        <div class="table-responsive">                            
                            <table id="myTable" class="table table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Username</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th width="7%">Status</th>
                                        <th width="7%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users AS $us){ ?>
                                    <tr>
                                        <td><?php echo $us['fullname']; ?></td>
                                        <td><?php echo $us['username']; ?></td>
                                        <td><?php echo $us['company']; ?></td>
                                        <td><?php echo $us['department']; ?></td>
                                        <td><?php echo $us['email']; ?></td>
                                        <td>
                                            <?php if($us['status']==1){ ?>
                                            <label class="label label-success">Active</label>
                                            <?php } else { ?>
                                            <label class="label label-default bg-default">Inactive</label>
                                            <?php } 
                                            
                                             if($us['usertype']==1){ ?>
                                                 <label class="label label-warning">Admin</label>
                                            <?php } else { ?>
                                                 <label class="label label-secondary">Employee</label>
                                            <?php } ?>
                                        </td>
                                        <td>      
                                        <center>                                      
                                            <div class="table-data-feature">
                                                <span data-toggle="modal" data-target="#updateUser">
                                                    <a  class="btn btn-info item update_user  btn-sm" data-toggle="tooltip" data-id = "<?php echo $us['id']; ?>" data-name = "<?php echo $us['fullname']; ?>" data-company ="<?php echo $us['company_id']; ?>" data-department ="<?php echo $us['department_id']; ?>" data-email ="<?php echo $us['email']; ?>" data-status ="<?php echo $us['status']; ?>" data-usertype ="<?php echo $us['usertype']; ?>" id = "updateEmp_button" data-placement="top" title="Update" >
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
     $(".updateUser #user_id").val(user_id);
     $(".updateUser #employee").val(name);
     $(".updateUser #company").val(company);
     $(".updateUser #department").val(department);
     $(".updateUser #email").val(email);
     $(".updateUser #status").val(status);
     $(".updateUser #usertype").val(usertype);
   
});

</script>