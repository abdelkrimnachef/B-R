<?php 
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{
     
include("includes/db.php");
include("functions/functions.php");
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1">
<title>Bring and read</title>
<link rel="stylesheet" href="styles/bootstrap-337.min.css">
<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./styles/style.css">
<link rel="shortcut icon" href="../images/b&rpngsmall.png" sizes="16x16" />

</head>


<body>
      <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-warning btn-sm">
                       <?php
                   if(!isset($_SESSION['customer_email'])){
                       echo " Welcome: Guest ";
                   }else{
                       
                       echo "Welcome : ",$_SESSION['customer_email'] . "";
                   }
              
                   ?>
               </a>
               <a href="../checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price();?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                      
                       <a href="../checkout.php">
                           
                               <?php 
                   if(!isset($_SESSION['customer_email'])){
                       echo " <a href='../checkout.php'>Log-In</a> ";
                   }else{
                       
                       echo " <a href='../logout.php'>Log-Out</a>";
                   }
              
                   ?>
                           
                        
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
      <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/b&rpnglarg.png" alt="B&R LOGO" class="hidden-xs">
                   <img src="images/b&rpngsmall.png" alt="B&R LOGO Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li  class="active">
                           <a href="my_account.php?my_orders">My Account</a>
                       </li>
                       <li>
                           <a href="../cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items();?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="../index.php">Home</a></li>
                  <li>
                     My Account
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
           <div class="col-md-3"><!--col-md-3 beggin -->
             <?php 
      include("includes/sidebar.php");    
            ?> 
              
               
           </div><!--col-md-3 Finish -->
           <div class="col-md-9"><!--col-md-9 begin-->
               <div class="box"><!--box begin-->
                   
                   <h4> <center>Send us the payment stub (or copy of the transfer slip) bearing the number of your order. </center></h4>
                   <center style="color: rgb(245, 162, 47);">CCP in the name of Nachef Abdelkrim:<b> 0022724261 keys 90</b> or by the application of Algeria post:<b> <br>    RIP: 007999990022724261 </b> payment by baridimob</center>
                   <?php 
                     $get_order = "select * from orders where order_id='$order_id'";
                     $run_order = mysqli_query($con,$get_order);
                     $row_order = mysqli_fetch_array($run_order);
                     $customer_id = $row_order['customer_id'];
                     $invoice_no = $row_order['invoice_no'];

                    
                    
                   
                   
                   ?>
                   <form action="ccp.php?order_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"> 
                      <div class="form-group"><!--form-group- begin-->
                         <label>Invoice No:</label>
                         <input readonly type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no ?>"  required>
                      </div><!--form-group- finish-->
                     
                      <div class="form-group"><!--form-group- begin-->
                         <label>Transfer Slip ID:</label>
                         <input minlength="8" maxlength="13" type="text" class="form-control" name="trans_slip_id" required>
                      </div><!--form-group- finish-->
                      <div class="form-group"><!--form-group- begin-->
                         <label>Image of The transfer Slip </label>
                         <input type="file" class="form-control" name="img" enctype="multipart/form-data" required>
                      </div><!--form-group- finish-->  
                                  







                     
                      <div class="text-center"><!--text-center bein-->
                          <button class="btn btn-primary btn-lg" name="confirm"><!--btn-primary btn-lg begin-->
                              <i class="fa fa-user"> </i> Confirm
                          </button><!--btn-primary btn-lg finish-->
                      </div><!--text-center finish-->
                    </form>
                    
                    <?php 
                    if(isset($_POST['confirm'])){
                        
                        $trans_slip_id = $_POST['trans_slip_id'];
                        $img = $_FILES['img']['name'];
                        $temp_name = $_FILES['img']['tmp_name'];
                        move_uploaded_file($temp_name,"trans_slip_imgs/$img");

        
                        $payment = "waiting validation";
                         
                        $insert_ccp_payment ="insert into ccp_payment (order_id,trans_slip_id,trans_slip,statu) values ('$order_id','$trans_slip_id','$img','$payment')";
                        
                        $run_insert_ccp_payment = mysqli_query($con,$insert_ccp_payment);
                        if($run_insert_ccp_payment){
                        
                       
                        
                        $update_pending_order = "update orders set order_status='$payment' where order_id='$order_id'";
                        
                       
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        if($run_pending_order){
                            echo "
                            <script>alert('Thank You For Purshasing, You Orders Will Be Completed Within 24Hours Work') </script>
                            ";
                            echo "
                            <script>window.open('my_account.php?my_orders','_self') </script>
                            ";    
                        }
                        
                    }
                       
                    }
                   
                        ?>
               </div><!--box finish-->
           </div><!--col-md-9 Finish -->
        </div><!-- container Finish -->
   </div><!-- content Finish -->
    <?php 
      include("includes/footer.php");    
        ?>
       
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script type="text/javascript">
function change_country()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","ajax.php?country="+document.getElementById("countrydd").value,false);
  xmlhttp.send(null);
  document.getElementById("state").innerHTML=xmlhttp.responseText;
}

</script>
    </body>
</html>
<?php } ?>