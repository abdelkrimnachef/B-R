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
                   <h1 aligne="center">Confirm OR Change Your Shipping Adress</h1>
                   <?php 
                     $get_order = "select * from orders where order_id='$order_id'";
                     $run_order = mysqli_query($con,$get_order);
                     $row_order = mysqli_fetch_array($run_order);
                     $customer_id = $row_order['customer_id'];
                     $invoice_no = $row_order['invoice_no'];

                     $get_customer = "select * from customers where customer_id='$customer_id'";
                     $run_customer = mysqli_query($con,$get_customer);
                     $row_customer = mysqli_fetch_array($run_customer);
                     $country_id = $row_customer['country_id'];
                     $state_id = $row_customer['state_id'];
                     $address = $row_customer['customer_address'];   
                     
                     
                    $country_1 = $country_id;
                    $get_country = "select * from countries where country_id='$country_id'";
                    $run_country = mysqli_query($con,$get_country);
                    $row_country = mysqli_fetch_array($run_country);
                    $country_name = $row_country['name'];
                   

                  
                    $get_state = "select * from states where state_id='$state_id'";
                    $run_state = mysqli_query($con,$get_state);
                    $row_state = mysqli_fetch_array($run_state);
                    $state_name = $row_state['name'];
                  

                   
                   
                   ?>
                   <form action="pay_offline.php?order_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"> 
                      <div class="form-group"><!--form-group- begin-->
                         <label>Invoice No:</label>
                         <input readonly type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no ?>"  required>
                      </div><!--form-group- finish-->
                     




                      <label>Select Your Counrty</label>
                      <div class="form-group"><!-- col-md-6 Begin -->
                            <select class="form-control" name="country_id" id="countrydd" onchange="change_country()"><!-- form-control Begin -->
                                
                                <?php
                                echo "<option value='$country_id'> $country_name </option>"; 
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

                      <label>Select Your State</label>
                     

                      <div id="state" class="form-group"><!-- col-md-6 Begin -->
                      
              <?php  
            
              $get_states = "select * from states where country_id='$country_1'";
                  $run_states = mysqli_query($con,$get_states);
                  echo"<select class='form-control'  name='state_id' required>
                  <option value='$state_id'> $state_name  </option>";
                  while($row_states=mysqli_fetch_array($run_states)){
                     $state_id =$row_states['state_id'];
                     $state_name = $row_states['name'];
                  echo "<option value='$state_id'> $state_name  </option> ";

                  }
                  echo "</select>"; ?>

                       </div><!-- col-md-6 Finish -->






                      <div class="form-group"><!--form-group- begin-->
                         <label> Address :</label>
                         <input type="text" class="form-control" name="address" value="<?php echo $address ?>"  required>
                      </div>
                      <div class="text-center"><!--text-center bein-->
                          <button class="btn btn-primary btn-lg" name="confirm"><!--btn-primary btn-lg begin-->
                              <i class="fa fa-user"></i>Confirm
                          </button><!--btn-primary btn-lg finish-->
                      </div><!--text-center finish-->
                    </form>
                    
                    <?php 
                    if(isset($_POST['confirm'])){
                        $invoice_no = $_POST['invoice_no'];
    
                        $country_id = $_POST['country_id'];
                        
                        $state_id = $_POST['state_id'];
                        
                        $address = $_POST['address'];
                        $delivery = "waiting validation";
                         
                        $insert_delivery ="insert into delivery (order_id,country_id,state_id,address,statu) values ('$order_id','$country_id','$state_id','$address','$delivery')";
                        
                        $run_delivery = mysqli_query($con,$insert_delivery);
                        if($run_delivery){
                        
                       
                        
                        $update_pending_order = "update orders set order_status='$delivery' where order_id='$order_id'";
                        
                       
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