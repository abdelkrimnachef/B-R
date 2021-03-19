<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
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
<link rel="shortcut icon" href="./images/b&rpngsmall.png" sizes="16x16" />
<style>


#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 20px;
  border: none;
  outline: none;
  background-color: grey;
  color: white;
  cursor: pointer;
  padding: 10px;
 
  border-radius: 15px;
}

#myBtn:hover {
  background-color: #5cb85c;
}
</style>
</head>


      <div id="top"><!-- Top Begin -->
      
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-warning btn-sm"> 
               <?php
                   if(!isset($_SESSION['customer_email'])){
                       echo " Welcome: Guest ";
                   }else{
                       
                       echo "Welcome:" , $_SESSION['customer_email'] , "";
                   }
              
                   ?> 
               </a>
               <a href="cart.php"><?php items();?> Items In Your Cart | Total Price:  <?php @total_price();?>  </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="customer_register.php"> <i class="fa fa-list"></i> &nbsp Register</a>
                   </li>
                   
                   <li>
                  
                       <a  href="cart.php">  <i class="fa fa-shopping-cart"></i> 
                        &nbsp Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                            <?php
                   if(!isset($_SESSION['customer_email'])){
                       echo "<span class='glyphicon glyphicon-log-in'></span>  <a href='checkout.php'> Log-In</a> ";
                   }else{
                       
                       echo "<span class='glyphicon glyphicon-log-out'></span>  <a href='logout.php'> Log-Out</a>";
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
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
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
                       
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php"><i class="fa fa-home"></i>  &nbsp Home</a>
                           
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                         <a href="shop.php"> <i class="glyphicon glyphicon-book"></i> &nbsp Shop</a>
                       </li>
                       <!------------------>
                       <li class="<?php if($active=='My Account') echo"active"; ?>">
                      
                           <?php 
                           if (!isset($_SESSION['customer_email'])){
                               
                               echo "<a href='checkout.php'> <i class='fa fa-user'></i> &nbsp My Account </a>";}
                           else{
                               
                            echo "<a href='customer/my_account.php?my_orders'> <i class='fa fa-user'></i> &nbsp My Account </a>";}
                           
                           
                           ?>
                       </li>
                       <li class="<?php if($active=='Shopping Cart') echo"active"; ?>">
                           <a href="cart.php"> <i class="fa fa-shopping-cart"></i>  &nbsp Shopping Cart</a>
                       </li>
                       <li class="<?php if($active=='Contact Us') echo"active"; ?>">
                           <a href="contact.php"> <i class="fa fa-comments"></i> &nbspContact Us</a>
                       </li>
                       <li class="<?php if($active=='faq') echo"active"; ?>">
                           <a href="faq.php"> <i class="fa fa-star-half"></i> &nbsp FAQ</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span> <?php items(); ?>  Item(s) In Your Cart</span>
                   
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
                           
                           <input type="text" class="form-control" placeholder="Search" name="search" required>
                           
                             <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                                 <input type="submit" name="submit" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                              </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   
  <!-- <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>

<script src="./includes/dark.js"></script>
                           -->