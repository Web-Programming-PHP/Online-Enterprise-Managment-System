<?php
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
    $user_name = $_SESSION['admin_name'];
    $security_key = $_SESSION['security_key'];
    if ($user_id != null && $security_key != null) {
        header('Location: task-info.php');
    }
}

if(isset($_POST['login_btn'])) {
    $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
require "include/login_header.php";

?>
<style>
    html, body{
        height:100%;
        width:100%;
        margin:unset !important
    }
    .main{
        display:flex;
        align-items:center;
        justify-content:center;
        height:100%;
        width:100%;
        margin:unset !important;
        background: rgba(0, 0, 0, 0.2);
    }
</style>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="well rounded-1" style="background:#fff !important">
    <center><h2 style="margin-top:1px;">Online Enterprise Management System</h2></center>
        <form class="form-horizontal form-custom-login" action="" method="POST">
            <div class="form-heading">
            <h2 class="text-center">Hi there!</h2>
            </div>
            
            <!-- <div class="login-gap"></div> -->
            <?php if(isset($info)) { ?>
            <h5 class="alert alert-danger"><?php echo $info; ?></h5>
            <?php } ?>
            <div class="form-group">
              <div class="icon">
                <span style="font-size:16px; color:#5bcad9;" class="glyphicon glyphicon-user"></span>
              </div>
              <input type="text" class="form-control rounded-0 form-control-config" placeholder="Username" name="username" required/>
            </div>
            <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
              <div class="icon">
                <span style="font-size:16px; color:#5bcad9;" class="glyphicon glyphicon-lock" ></span>
              </div>
              <input type="password" class="form-control rounded-0 form-control-config" placeholder="Password" name="admin_password" required/>
            </div>
            <button type="submit" name="login_btn" class="btn btn-info pull-right">Login</button>
        </form>
    </div>
</div>


<?php

require "include/footer.php";

?>
