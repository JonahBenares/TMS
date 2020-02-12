<?php
date_default_timezone_set("Asia/Hong_Kong");
    if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $password = ($this->session->userdata['logged_in']['password']);
    } else {
        echo "<script>alert('You are not logged in. Please login to continue.'); 
            window.location ='".base_url()."index.php/masterfile/index'; </script>";
    }


/*if((time() - $_SESSION['login_timestamp']) > 300) {
   echo "<script>alert('You have been inactive for 5 minutes.'); 
            window.location ='".base_url()."index.php/masterfile/user_logout'; </script>";
}  */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <title>TASK MONITORING SYSTEM</title>
    <link href="<?php echo base_url(); ?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
<!--     <link href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   -->  
    <link href="<?php echo base_url(); ?>assets/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/jquery.dataTables.min.css" rel="stylesheet">      
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/datepicker.css" rel="stylesheet">      
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/jquery-ui.css" rel="stylesheet">     
    <script>
        var timer = 0;
function set_interval() {
  timer = setInterval("auto_logout()", 10000);
}

function reset_interval() {

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    timer = setInterval("auto_logout()", 300000);
  }
}

function auto_logout() {
  window.location = "<?php echo base_url(); ?>masterfile/user_logout";
}
    </script> 
</head>