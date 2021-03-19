
<?php 
$active='My Account';
include("includes/header.php");
?>
   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="index.php">Home</a></li>
                  <li>
                     Change Your Password
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
           
           <div class="col-md-12"> <!--col-md-9 begin -->
           <div class="box"> <!--box begin-->
   
           <form method="post" action="confirm_reset_pass.php">
        <div class="form-group">
            
            <label>Email</label>
            <input name="c_email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Password</label>
            <input name="c_pass1" type="password" minlength=8 placeholder="Set Your New Password" class="form-control" required>
            </div>
            <div class="form-group">
            <label>Repeat Password</label>
            <input name="c_pass2" type="password" minlength=8 placeholder="Repeate New Password" class="form-control" required>
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
            $get_email = "select * from customers where customer_email='$customer_email'";
            $run_email = mysqli_query($con,$get_email);
            $count = mysqli_num_rows($run_email);
            if($count==0){
         echo "<script>alert('You dont have an account follow the page to register')</script>";
         echo "<script>window.open('../customer_register.php','_self')</script>";

            }else {
                $update_pass = "update customers set customer_pass='$customer_pass1' where customer_email='$customer_email' ";
                $run_update = mysqli_query($con,$update_pass);
                echo "<script>alert('Your password is updated')</script>";
                echo "<script>window.open('http://localhost/b&r/checkout.php','_self')</script>";

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
    <?php 
      include("includes/footer.php");    
        ?>
       
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>