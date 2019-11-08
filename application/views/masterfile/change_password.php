<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                        <h4 class="card-title">Change Password</h4>                         
                        <h6 class="card-subtitle"><br></h6>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                              
                                    <div class="modal-body">
                                       
                                      <div class='successmsg'></div>
                                        <div class="form-group">
                                            <input type="password" name="old_password" id = "old_password" class="form-control" placeholder="Old Password">
                                             <div class='msgold'></div>
                                            <center><a href="" class="text-danger">Reset Password</a></center>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_password" id = "new_password" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="re_password" id = "re_password" onblur="checkpassword()" class="form-control" placeholder="Retype New Password">
                                            <div class='msg'></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="baseurl" id = "baseurl" class="form-control" value="<?php echo base_url(); ?>">
                                    <input type="hidden" name="user_id" id = "user_id" class="form-control" value="<?php echo $userid; ?>">
                                    <div class="modal-footer">                                        
                                        <button type="submit" id='updatepw' class="btn btn-info btn-block" onclick="changepassword()">Update</button>
                                    </div>
                                   
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkpassword(){
        var re_password = $('#re_password').val();
        var new_password = $('#new_password').val();

        if(new_password!=re_password){
             $('div.msg').text('Error: Password did not match.');
             $('div.msg').addClass("success bor-radius10 shadow alert-danger alert-shake animated headShake");
             $('div.msg').attr("style", "padding:5px");
             $("#updatepw").attr("disabled", true);
        } else {
            $('div.msg').hide();
            $("#updatepw").removeAttr("disabled");
        }

    }

    function changepassword(){
        var new_password = $('#new_password').val();
        var old_password = $('#old_password').val();
        var user_id = $('#user_id').val();
        var baseurl = $('#baseurl').val();
        var redirect = baseurl+'index.php/masterfile/update_password';
        if(old_password==''){
            $('div.msgold').text('Error: Old password must not be empty.');
            $('div.msgold').addClass("success bor-radius10 shadow alert-danger alert-shake animated headShake");
            $('div.msgold').attr("style", "padding:5px");
            $("#updatepw").attr("disabled", true);
        }else{
            $.ajax({
                url: redirect,
                type: 'post',
                data: {
                    'old_password' : old_password,
                    'new_password' : new_password,
                    'user_id' : user_id
                },
                success: function(response){
                    //alert(response);
                    if (response == 'error') {
                        $('div.msgold').text('Error: Old Password Incorrect.');
                        $('div.msgold').addClass("success bor-radius10 shadow alert-danger alert-shake animated headShake");
                        $('div.msgold').attr("style", "padding:10px");
                    }else {
                       $('div.successmsg').text('Password Successfully Changed.');
                       $('div.successmsg').addClass("success bor-radius10 shadow alert-success");
                       $('div.successmsg').attr("style", "padding:10px");
                       $('div.msgold').hide();
                    }
                }
            });
        }
    }
</script>