
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
                     Register
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
         
            <div class="col-md-12"><!--col-md-9 beggin -->
             <div class="box"><!--box beggin -->
                <div class="box-header"><!--box-header beggin -->
                  <center>
                      <h2>Register a new account</h2>
                     
                  </center>
                  <form action="customer_register.php" method="post" enctype="multipart/form-data">
                      <div class="form-group"><!--form-group beggin -->
                          <label> Your Name</label>
                          <input type="text" class="form-control" name="c_name" required>
                      </div><!--form-group finish-->
                       <div class="form-group"><!--form-group beggin -->
                          <label>Your Email</label>
                          <input type="email" class="form-control" name="c_email" required>
                      </div><!--form-group finish-->
                       <div class="form-group"><!--form-group beggin -->
                          <label>Your Password</label>
                          <input type="password" class="form-control"  minlength=8 name="c_pass" required>
                      </div><!--form-group finish-->
                      <span id='message'></span>



                      <label>Select Your Counrty</label>
                      <div class="form-group"><!-- col-md-6 Begin -->
                            <select class="form-control" name="country_id" id="countrydd" onchange="change_country()"><!-- form-control Begin -->
                                <?php 
                                $get_countries = "select * from countries";
                                $run_countries = mysqli_query($con,$get_countries);
                                while ($row_countries=mysqli_fetch_array($run_countries)){
                                    $country_id = $row_countries['country_id'];
                                    $country_name = $row_countries['name'];
                                    echo "<option value='$country_id'> $country_name </option>";
                                    }
                                ?>
                                
                            </select><!-- form-control Finish -->
                         
                      </div><!-- col-md-6 Finish -->

                      
                      <div id="state"><!-- col-md-6 Begin -->
                          
                       </div><!-- col-md-6 Finish -->
                      
                      <div class="form-group"><!--form-group beggin -->
                          <label>Your Address</label>
                          <input type="text" class="form-control pass" name="c_address" required>
                      </div><!--form-group finish-->
                       <div class="form-group"><!--form-group beggin -->
                          <label>Your Contact</label>
                          <input type="tel" class="form-control" pattern="[0][0-9]{9}"  minlength="10" maxlength="11" name="c_contact" value="0" required>
                      </div><!--form-group finish-->
                       
                       <div class="form-group"><!--form-group beggin -->
                          <label>Your Profile Picture</label>
                          <input type="file" class="form-control form-height-custom" name="c_image" required>
                      </div><!--form-group finish-->

                      <div class="text-center"><!--text-center begin-->
                          <button type="submit" name="register" class="btn btn-primary"><!--btn btn-primary begin-->
                             <i class="fa fa-user-md"></i> Register
                              
                          </button><!--btn btn-primary finish-->
                      </div><!--text-center finish-->
                      
             
                      
                      
                  </form>
                   
                    
                </div><!--box-header finish-->
                 
             </div><!--box finish -->
              
               
                
            </div><!--col-md-9 finnish -->
           
           
       </div><!-- container Finish -->
   </div><!-- content Finish -->
    <?php 
      include("includes/footer.php");    
        ?>
       
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>
<?php 
if(isset($_POST['register'])){
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $get_emails = "select * from customers where customer_email='$c_email'";
    $run_get_emails = mysqli_query($con,$get_emails);
    $count_emails = mysqli_num_rows($run_get_emails);
    if($count_emails==0){
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['country_id'];
    $c_city = $_POST['state_id'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealIpUser();
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    $get_visitor = "select * from visitors where ip_add='$c_ip'";
    $run_visitor = mysqli_query($db,$get_visitor);
    $row_visitor = mysqli_fetch_array($run_visitor);
    $visitor_id = $row_visitor['visitor_id'];
    $insert_customer = "insert into customers(customer_name,customer_email,customer_pass,country_id,state_id,customer_contact,customer_address,customer_image,visitor_id) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$visitor_id')";
    $run_customer = mysqli_query($con,$insert_customer);
    $sel_cart = "select * from cart where visitor_id='$visitor_id'";
    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        ///if customer register with items in your cart/// 
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You Have Been Registred Sucessfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    ///if customer register without items in your cart///
    else {
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You Have Been Registred Sucessfully')</script>";
        echo "<script>window.open('shop.php','_self')</script>";
        
        
    }
}else{
    echo "<script>alert('You already hae an account follow this page to change your password and login')</script>";
    echo "<script>window.open('./customer/resset_pass.php','_self')</script>";

}
        
    }
    


?>
<script type="text/javascript">
function change_country()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","ajax.php?country="+document.getElementById("countrydd").value,false);
  xmlhttp.send(null);
  document.getElementById("state").innerHTML=xmlhttp.responseText;
}  


</script>