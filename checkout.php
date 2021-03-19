
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
           
           <div class="col-md-12"> <!--col-md-9 begin -->
           <?php
            if(!isset($_SESSION['customer_email'])){
                include("customer/customer_login.php");}
                 else{
                     include("payment_options.php");
                 }
                
            
           
           ?>
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