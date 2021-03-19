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
            <h2 class="form-login-heading"><i class="fa fa-user"></i> Admin Reset passwrod</h2>
            <input type="email" class="form-control" placeholder="Email Adress" name="admin_email" required>
            <br>
        
           
            <br>
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!--btn btn-lg btn-primaty btn block begin -->
            <i class="fa fa-send"></i> Send Mail
            </button><!--btn btn-lg btn-primaty btn block finnish -->
        </form><!--form-login finnish -->
    </div><!--container finnish -->
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
        $admin_email = $_POST['admin_email'];
    
         $subject = "Reset PassWord";
    
        $msg = "You want To reset your Password check this Link To change it 
        ----> 'http://localhost/b&r/admin_area/confirm_reset_pass.php'  <----
        If you dont want to change Password just ignore this mail *-* 
        ";
     if(mail($admin_email,$subject,$msg)){

         echo "<script>alert('Check Your Mail')</script>";

     }else {
         echo "<script>alert('Erreur Repeat PLEASE')</script>";

        }
}
?>
