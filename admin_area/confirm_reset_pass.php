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

           <form method="post" action="confirm_reset_pass.php">
           <h2 class="form-login-heading"><i class="fa fa-user"></i> Admin Reset Password</h2>
        <div class="form-group">
            
            <label>Email</label>
            <input name="c_email" type="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Password</label>
            <input name="c_pass1" minlength="8" type="password" id="password" placeholder="Set Your New Password" onkeyup='check();' class="form-control" required>
            </div>
            <div class="form-group">
            <label>Repeat Password</label>
            <input name="c_pass2" type="password" minlength="8" placeholder="Repeate The New Password" id="confirm_password" onkeyup='check();' class="form-control" required>
            <span id='message'></span>        
        </div>
              
            <div class="text-center"><!-- text center begin -->
                <button name="submit" value="Change Password" class="btn btn-primary">
                <i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Change Password
                </button>
            </div><!-- text center fenish -->
     </form>
     <?php
if(isset($_POST['submit'])){
        $customer_email = $_POST['c_email'];
        $customer_pass1 = $_POST['c_pass1'];
        $customer_pass2 = $_POST['c_pass2'];

        if($customer_pass1==$customer_pass2){
            $get_email = "select * from admins where admin_email='$customer_email'";
            $run_email = mysqli_query($con,$get_email);
            $count = mysqli_num_rows($run_email);
            if($count==0){
         echo "<script>alert('You dont have an admin account')</script>";
       

            }else {
                $update_pass = "update admins set admin_pass='$customer_pass1' where admin_email='$customer_email' ";
                $run_update = mysqli_query($con,$update_pass);
                echo "<script>alert('Your password is updated')</script>";
                echo "<script>window.open('http://localhost/B&r/admin_area/login.php','_self')</script>";


        }
    }else{
    echo "<script>alert('Your password is wrong set the same pasword in both of passwods feilds')</script>";
    }
  
    
}

?>
        
</div><!--text-center fenish-->
           </div> <!--col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- content Finish -->
  
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
    <script>var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching <i ';
  }
}</script>
</html>