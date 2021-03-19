<div id="footer"><!--footer beggin-->
    <div class="container"><!--container beggin-->
        <div class="row "><!--row beggin-->
           <div class="col-sm-6 col-md-3"><!--col-sm-3 col-md-3-->
            <h4>pages</h4>
               <ul>
                   <li><a href="cart.php">Shopping Cart</a>    </li>
                   <li><a href="shop.php">Shop</a>    </li>
                   <li><a href="contact.php">Contact Us</a></li>
                   <li><?php 
                           if (!isset($_SESSION['customer_email'])){
                               
                               echo "<a href='checkout.php'>Log-In </a>";}
                           else{
                               
                            echo "<a href='customer/my_account.php?my_orders'>My Account </a>";}
                           
                           
                           ?></li>
            </ul>
            <hr>
            <h4>User Section</h4>
            <ul><li>
                           <?php 
                           if (!isset($_SESSION['customer_email'])){
                               
                               echo "<a href='checkout.php'>Log-In </a>";}
                           else{
                               
                            echo "<a href='customer/my_account.php?my_orders'>My Account </a>";}
                           
                           
                           ?>
                </li>           
                <li>
                     <?php 
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo "<a href='customer_register.php'>Register </a>";}
                           else{
                               
                            echo "<a href='customer/my_account.php?edit_account'>Edit Account </a>";}
                           
                           
                           ?>
                </li>
                <li>  <a href='terms.php'>Terms & Conditions </a>        
                </li>
            </ul>   
            <hr class="hidden-md hidden-lg hidden-sm">
        </div><!--row col-sm-6 col-md-3 finnish-->
        <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 beggin-->
            <h4>Top Books Categories</h4>
            <ul>
            <?php 
             $get_b_cats = "select * from book_categories order by b_cat_title ASC";
                $run_b_cats = mysqli_query($con,$get_b_cats);
                while($row_b_cats=mysqli_fetch_array($run_b_cats)){
                    $b_cat_id = $row_b_cats['b_cat_id'];
                     $b_cat_title = $row_b_cats['b_cat_title'];
                    echo"
                    <li>
                    <a href='shop.php'> 
                    $b_cat_title
                    </a>
                    
                    </li>
                    
                    
                ";
                    
                    
                }
                
            ?>
            </ul>
            <hr class="hidden-md hidden-lg">

            
        </div><!--col-sm-6 col-md-3 finnish-->
        <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 beggin-->
            <h4>Find Us :</h4>
            <p>
              <strong>B&R inc. </strong><br>  Nachef Abdelkrim<br>Mekid Hamza <br> 0542280619 <br> nachef97@gmail.com <br>  
               <strong>Books Store</strong>
                <!------------------------->
            </p>
            <a href="contact.php">Check Our Contacts Page </a>
            <hr class="hidden-md hidden-lg">

        </div><!--col-sm-6 col-md-3 finnish-->
        <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 beggin-->
            <h4>Get The News</h4>
            <p class="text-muted">
                Dont Miss Our Updates
            </p>
            <!------------------------------------------------------------------------------------------------------>
            <form  action="<?php echo  $_SERVER['QUERY_STRING']; ?>"  method="post"  ><!-- form begin --><!--from beggin-->
                <div class="input-group"><!--input group beggin-->
                    <input type="email" class="form-control" name="email">
                    <input type="hidden" value="B&R" name="b&r"/><input type="hidden" name="b&r" value="en_US"/>
                    <span class="input-group-btn">"><!--input group btn beggin-->
                        <input name="submit-sub"  type="submit" value="Subscribe" class="btn btn-default">
                    </span><!--input group btn finnish-->
                </div><!--input group finnish-->
            </form><!--form finnish-->
            <?php 
                if(isset($_POST['submit-sub'])){
                    
                    $sub_email = $_POST['email'];
                    $get_subscribers = "select * from subscribers where sub_email='$sub_email'";
                    $run_get = mysqli_query($con,$get_subscribers);
                    $count = mysqli_num_rows($run_get);
                    if($count==0){
                    $insert_sub =  "insert into subscribers (sub_email) value ('$sub_email')";
                    $run_sub = mysqli_query($con,$insert_sub);
                    if($run_sub){
                       
                        echo "<script> alert('thx for subsibing in the B&R website, you will be notified on our updates') </script>";
                    }}else{
                        echo "<script> alert('You are subscribed In the B&R Website') </script>";

                    }
                
                }
            ?>

            <!------------------------------------------------------------------------------------------------------>
            <hr>
            <h4>Keep In Touch</h4>
            <p class="social">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-google-plus"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
            </p>
        </div><!--col-sm-6 col-md-3 finnish-->
        
    </div><!--row finnish-->
</div><!--container finnish-->
</div><!--footer finnish--> 
<div id="copyright"><!--copyright begin--> 
    <div class="container"><!--container beggin--> 
        <div class="col-md-6"><!--col-ms-6 begin--> 
            <p class="pull-left">&copy; Bring and Read 2020 All Rights Reserved</p>
        </div><!--copyright finnish--> 
                <div class="col-md-6"><!--col-ms-6 begin--> 
            <p class="pull-right"> By <a href="#"> Karim & Hamza</a> </p>
        </div><!--copyright finnish--> 
    </div><!--container finnish--> 
</div><!--col-md-6 finnish--> 