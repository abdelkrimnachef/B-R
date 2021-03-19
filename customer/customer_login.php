
<div class="box"><!--box begin -->
   <div class="box-header"><!--box-header begin-->
     <center>
         <h1>Log-In</h1>
         <p class="lead">Already Have An Account ..?</p>
         <p class="text-muted"> You are welcome to join the B&R Team</p>
      </center>
       
       
   </div> <!--box-header fenishh-->
    <form method="post" action="checkout.php">
        <div class="form-group">
            
            <label>Email</label>
            <input name="c_email" type="email" class="form-control" required>
            </div>
                <div class="form-group">
            <label>PassWord</label>
            <input name="c_pass" type="password" minlength=8 class="form-control" required>
                </div>
                <a href="./customer/resset_pass.php">
            <h5>  <i class="fa fa-key"></i>  Forget my password</h5>
            </a>
                
            <div class="text-center"><!-- text center begin -->
                <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Log-In
                </button>
            </div><!-- text center fenish -->
     </form>
    <center>
            <a href="customer_register.php">
            <h3>Dont Have an Account...? Register Here</h3>
            </a>
            
   
        
    </center>
    
</div><!--box fenish -->
<?php
if(isset($_POST['login'])){
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass' ";
    $run_customer = mysqli_query($con,$select_customer);
    $get_ip = getRealIpUser();
    $check_customer =mysqli_num_rows($run_customer);
    $get_visitor = "select * from visitors where ip_add='$get_ip'";
    $run_visitor = mysqli_query($db,$get_visitor);
    $row_visitor = mysqli_fetch_array($run_visitor);
    $visitor_id = $row_visitor['visitor_id'];
    $select_cart = "select * from cart where visitor_id='$visitor_id'";
    $run_cart = mysqli_query($con,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0){
        echo "<script> alert('Your Email or Password Is Wrong') </script>";
            exit();
        
    }
    if($check_customer==1 AND $check_cart==0 ){
        $_SESSION['customer_email']=$customer_email;
        echo "<script> alert('You Are Logged-In') </script>";
        echo "<script> window.open('customer/my_account.php?my_orders','_self') </script>"; 
    }else{
         $_SESSION['customer_email']=$customer_email;
        echo "<script> alert('You Are Logged-In') </script>";
        echo "<script> window.open('checkout.php','_self') </script>"; 
    }
    
}

?>