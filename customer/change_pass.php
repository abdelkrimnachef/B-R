<h1 align="center">Change PassWord</h1>
<form action="" method="post">
    <div class="form-group"><!-- form group begin-->
       <label>Your Old PassWord :</label>
       <input type="password" name="old_pass" class="form-control" required>
        
    </div><!-- form group frnnish-->
    <div class="form-group"><!-- form group begin-->
       <label>Your New PassWord:</label>
       <input type="password" id="password" minlength="8" onkeyup="check();" name="new_pass" class="form-control" required>
       
        
    </div><!-- form group frnnish-->
    <div class="form-group"><!-- form group begin-->
       <label>Confirm Your New PassWord :</label>
       <input type="password" minlength="8"  id="confirm_password" onkeyup="check();" name="new_pass_again" class="form-control" required>
       <span id="message"></span>
    </div><!-- form group frnnish-->
    <div class="text-center"><!--text center begin-->
        <button type="submit" name="submit" class="btn btn-primary"><!--tn btn-primary begin-->
            <i class="fa fa-user-md"></i> Update Now
        </button><!--tn btn-primary finnish-->
    
        
    </div><!--text center frnnish-->
    
</form>
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
<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>