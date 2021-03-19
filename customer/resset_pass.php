
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
                     Reset Your Password
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
           
           <div class="col-md-12"> <!--col-md-9 begin -->
           <div class="box"> <!--box begin-->
   
           <form method="post" action="resset_pass.php">
        <div class="form-group">
            
            <label>Email</label>
            <input name="c_email" type="email" class="form-control" required>
            </div>
              
            <div class="text-center"><!-- text center begin -->
                <button name="submit" value="Send Mail" class="btn btn-primary">
                <i class="fa fa-send"></i> Send Mail
                </button>
            </div><!-- text center fenish -->
     </form>
     <?php
if(isset($_POST['submit'])){
        $customer_email = $_POST['c_email'];
    
         $subject = "Reset PassWord";
    
        $msg = "You want To reset your Password check this Link To change it 
        ----> 'http://localhost/b&r/customer/confirm_reset_pass.php'  <----
        If you dont want to change Password just ignore this mail *-* 
        ";
     if(mail($customer_email,$subject,$msg)){

         echo "<script>alert('Check Your Mail')</script>";

     }else {
         echo "<script>alert('Erreur Repeat PLEASE')</script>";

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