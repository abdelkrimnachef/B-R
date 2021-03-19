<?php 
session_start();
include("includes/db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B&R Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="../images/b&rpngsmall.png" sizes="16x16" />

</head>
<body>
    <div class="container"><!--container begin -->
        <form action="" class="form-login" method="post"><!--form-login begin -->
            <h2 class="form-login-heading"> <i class="fa fa-user"></i> Admin Log-In</h2>
            <input type="email" class="form-control" placeholder="Email Adress" name="admin_email" required>
            <input type="password" minlength=8 class="form-control" placeholder="Password" name="admin_pass" required>
            <br>
            <a href="reset_pass.php"> <i class="fa fa-key" aria-hidden="true"></i>
 Forget Password</a>
 
            <br>
            <br>
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!--btn btn-lg btn-primaty btn block begin -->
                Login
            </button><!--btn btn-lg btn-primaty btn block finnish -->
        </form><!--form-login finnish -->
    </div><!--container finnish -->
</body>
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
</html>
<?php
if(isset($_POST['admin_login'])){
    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin = mysqli_query($con,$get_admin);
    $count = mysqli_num_rows($run_admin);
    if($count==1){
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('Logged In, Welcome Back')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }else{
        echo "<script>alert('Email or PassWord Is Wrong')</script>";
    }
        
    }
?>

