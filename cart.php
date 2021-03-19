<?php 
$active='Shopping Cart';
include("includes/header.php");

if(isset($_GET['book_id'])){
                    
    global $db;
    $book_id = $_GET['book_id'];
        
        $ip_add = getRealIpUser();
        $b_id = $_GET['book_id'];  
        $get_visitor = "select * from visitors where ip_add='$ip_add'";
        $run_visitor = mysqli_query($db,$get_visitor);
        $row_visitor = mysqli_fetch_array($run_visitor);
        $visitor_id = $row_visitor['visitor_id'];
        $check_book = "select * from cart where visitor_id='$visitor_id' AND book_id='$b_id' ";
        $run_check = mysqli_query($db,$check_book);

          $get_qty ="select * from books where book_id='$book_id'";
          $run_qty = mysqli_query($db,$get_qty);
          $select_visitor = "select * from visitors where ip_add='$ip_add'";
          $run_select_visitor =mysqli_query($con,$select_visitor);
           $count_visitor = mysqli_num_rows($run_select_visitor);

        if($row_qty=mysqli_fetch_array($run_qty)){
        $stock_qty = $row_qty['qty'];
    }
        if(mysqli_num_rows($run_check)>0){
            
            echo " <script> alert('This Book Has Already Added In Your Cart')</script>";
            echo " <script> window.open('cart.php','_self')</script>";

            }else{
                if($stock_qty>0){
                    $select_visitor = "select * from visitors where ip_add='$ip_add'";
                    $run_select_visitor =mysqli_query($con,$select_visitor);
                    $count_visitor = mysqli_num_rows($run_select_visitor);
                    if($count_visitor==0){
                        $select_visitors = "select * from visitors";
                        $run_select_visitors =mysqli_query($con,$select_visitors);
                        $count_visitors = mysqli_num_rows($run_select_visitors);
                        $count_visitors = $count_visitors + 1;
                        $insert_visitors = "insert into visitors (visitor_id,ip_add) values ('$count_visitors','$ip_add')";
                        $run_visitors = mysqli_query($con,$insert_visitors);
                    }else{
                   
           
            $query = "insert into cart (visitor_id,book_id,qty) values ('$count_visitor','$b_id','1')";
            $run_query = mysqli_query($db,$query);
            
            $stock_qty = $stock_qty - 1;
           
            $update_qty = "update books set qty='$stock_qty' where book_id='$b_id'";
            $run_update = mysqli_query($db,$update_qty);
            echo " <script> alert('Congrats The Book Added In Your Cart Please checkout')</script>";
            echo " <script> window.open('shop.php','_self')</script>";
               } }else{
                    echo " <script> alert('No More Qty For This Book Please Conact Us')</script>";
                    echo " <script> window.open('contact.php','_self')</script>";

                }
        }
}
?>
   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="index.php">Home</a></li>
                  <li>Cart</li>
              </ul><!-- breadcumb finnish -->
           </div><!--col-md-12 Finish --> 
           <div id="cart" class="col-md-9"><!-- col-md-9 beggin -->
              <div class="box"><!-- box begin -->
                 <form action="cart.php" method="post" enctype="multipart/form-data">
                     <h1>Shopping Cart</h1>
                     <?php
                     $ip_add = getRealIpUser();
                     $get_visitor = "select * from visitors where ip_add='$ip_add'";
                     $run_visitor = mysqli_query($db,$get_visitor);
                     $row_visitor = mysqli_fetch_array($run_visitor);
                     $visitor_id = $row_visitor['visitor_id'];
                     $select_cart = "select * from cart where visitor_id='$visitor_id'";
                     $run_cart = mysqli_query($con,$select_cart);
                     $count = mysqli_num_rows($run_cart);
                     ?>
                     <p class="text-muted">You currently have <?php echo $count;  ?> item(s) in your cart  </p>
                     <div class="table-responsive"><!--table responsive begin -->
                         <table class="table"><!--table begin -->
                            <thead>
                               <tr>
                                   <th colspan="2">Book</th>
                                   <th >Quantity</th>
                                   <th>Unite Price</th>
                                   <th colspan="1">Delete</th>
                                   <th colspan="2">Sub-Total</th>
                               </tr>
                                
                            </thead>
                            <tbody>
                              <?php 
                                $total = 0;
                                while($row_cart = mysqli_fetch_array($run_cart)){
                                    $book_id = $row_cart['book_id'];
                                    $book_qty = $row_cart['qty'];
                                    $book_c_price = $row_cart['b_price'];
                                    $get_books = "select * from books where book_id='$book_id'";
                                    $run_books = mysqli_query($con,$get_books);
                                
                                    while($row_books = mysqli_fetch_array($run_books)){
                                    
                                        $book_title  = $row_books['book_title'];
                                        $book_img1  = $row_books['book_img1'];
                                        $book_label  = $row_books['book_label'];
                                        $book_price = $row_books['book_price'];
                                        $book_sale = $row_books['book_sale'];
                                        $stock_qty = $row_books['qty'];
                                        if($book_c_price ==''){
                                        if($book_label=='sale'){
                                            $only_price = $row_books['book_sale'];
                                        }else{
                                            $only_price = $row_books['book_price'];
                                        }
                                    }else{
                                        $only_price = $book_c_price;
                                       }
                                        $sub_total  = $only_price*$book_qty;
                                        $total += $sub_total;
                                ?>
                               <tr>
                                  <td>
                                  <a href="http://localhost/B&r/details.php?book_id=<?php echo $book_id ?>"> <img class="img-responsive" src="admin_area/product_images/<?php echo $book_img1; ?>" alt="book"> </a> 
                                  </td> 
                                  <td  align ="left">
                                  <a href="http://localhost/B&r/details.php?book_id=<?php echo $book_id ?>"><?php echo $book_title; ?></a>
                                  </td>
                                  
                                  <td width="5px">
                                          
                                          <input  type="text" name="quantity" data-book_id="<?php echo $book_id; ?>" value="<?php echo $book_qty; ?>" class="quantity form-control">
                                          
                                      </td>
                                      
                                  <td>
                                     <?php echo $only_price;  ?> Da
                                  </td>
                                  
                                  <td>
                                      <input type="checkbox" name="remove[]" value ="<?php echo $book_id; ?>">
                                  </td>
                                  <td>
                                      <?php echo $sub_total; ?> Da
                                  </td>
                               </tr>
                                <?php }  }?>
                            </tbody>
                            <tfoot>
                               <tr class="total">
                               
                                   <td colspan="5">Totale</td>
                                   <th colspan="2"><?php echo $total;?> Da</th>
                                  
                               </tr>
                                
                            </tfoot>
                             
                         </table><!--table finnish -->
                         
                         <div class="form-inline pull-right"><!-- form-inline Begin -->
                               <div class="form-group"><!-- form-group Begin -->

                                    <label> Coupon Code: </label>
                                    <input type="text" name="code" class="form-control">
                                    <input type="submit" class="btn btn-primary" value="Use Coupon" name="apply_coupon">
                               
                               </div><!-- form-group Finish -->
                           </div><!-- form-inline Finish -->
                     </div><!-- table responsive Finish -->
                    
                     <div class="box-footer"><!-- box footer image  -->
                        <div class="pull-left"><!-- pull-left begin -->
                            <a href="index.php" class="btn btn-default"><!-- btn btn-default begin -->
                               <i class="fa fa-chevron-left"></i>
                                Continue Shopping
                            </a><!-- btn btn-default finnish -->
                        </div><!-- pull-left finish -->
                         <div class="pull-right"><!-- pull-left begin -->
                            <button type="submit" name="update" value="Update Cart" class="btn btn-default" ><!-- btn btn-default begin -->
                               <i class="fa fa-refresh"></i>
                                Update Cart
                            </button><!-- btn btn-default finnish -->
                            <a href="checkout.php" class="btn btn-primary">
                                proceed Checkout 
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </div><!-- pull-left finish -->
                         
                     </div><!-- box footer Finish -->
                 </form> 
              </div><!-- box Finish -->
              
              <?php 
               
               if(isset($_POST['apply_coupon'])){

                   $code = $_POST['code'];

                   if($code == ""){

                   }else{

                       $get_coupons = "select * from coupons where coupon_code='$code'";
                       $run_coupons = mysqli_query($con,$get_coupons);
                       $check_coupons = mysqli_num_rows($run_coupons);

                       if($check_coupons == "1"){

                           $row_coupons = mysqli_fetch_array($run_coupons);

                           $coupon_book_id = $row_coupons['book_id'];
                           $coupon_price = $row_coupons['coupon_price'];
                           $coupon_limit = $row_coupons['coupon_limit'];
                           $coupon_used = $row_coupons['coupon_used'];

                           if($coupon_limit == $coupon_used){

                               echo "<script>alert('Your Coupon Already Expired')</script>";

                           }else{
                            $get_visitor = "select * from visitors where ip_add='$ip_add'";
                            $run_visitor = mysqli_query($db,$get_visitor);
                            $row_visitor = mysqli_fetch_array($run_visitor);
                            $visitor_id = $row_visitor['visitor_id'];
                               $get_cart = "select * from cart where book_id='$coupon_book_id' AND visitor_id='$visitor_id'";
                               $run_cart = mysqli_query($con,$get_cart);
                               $check_cart = mysqli_num_rows($run_cart);

                               if($check_cart == "1"){

                                   $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                                   $run_used = mysqli_query($con,$add_used);
                                   $get_visitor = "select * from visitors where ip_add='$ip_add'";
                                   $run_visitor = mysqli_query($db,$get_visitor);
                                   $row_visitor = mysqli_fetch_array($run_visitor);
                                   $visitor_id = $row_visitor['visitor_id'];
                                   $update_cart = "update cart set b_price='$coupon_price',qty='1' where book_id='$coupon_book_id' AND visitor_id='$visitor_id'";
                                   $run_update_cart = mysqli_query($con,$update_cart);

                                   echo "<script>alert('Your Coupon Has Been Applied For Only ONE Book')</script>";
                                   echo "<script>window.open('cart.php','_self')</script>";

                               }else{

                                   echo "<script>alert('Your Coupon Didnt Match With Your Product On Your Cart')</script>";

                               }

                           }

                       }else{

                           echo "<script>alert('Your Coupon Is Not Valid')</script>";

                       }

                   }

               }
          
          ?>
          
              <?php 
               function update_cart(){
                   global $con;
                   if(isset($_POST['update'])){
                    foreach($_POST['remove'] as $remove_id){
                        
                        $get_books = "select * from books where book_id='$remove_id'";
                        $run_books = mysqli_query($con,$get_books);
                        $row_books = mysqli_fetch_array($run_books);
                        $stock_qty = $row_books['qty'];
                    
                        
                        $get_cart_books = "select * from cart where book_id='$remove_id'";
                        $run_cart_books = mysqli_query($con,$get_cart_books);
                        $row_cart_books = mysqli_fetch_array($run_cart_books);
                        $book_qty = $row_cart_books['qty'];
                       
                        $stock_qty = $book_qty + $stock_qty;
                        $add_qty = " update books set qty='$stock_qty' where book_id='$remove_id'";
                        $run_add = mysqli_query($con,$add_qty);
                       

                       
                        
                        $delete_book = "delete from cart where book_id='$remove_id'";
                        $run_delete = mysqli_query($con,$delete_book);
                      
                       
                            if($run_delete){
                                echo "
                                <script>
                                window.open('cart.php','_self')
                                </script>
                                
                                ";
                                
                            }
                         
                    }   
                       
                   }
                   
                   
               }
               echo @$up_cart = update_cart();
               ?>
              <div id="row same-height-row"><!--same hieght row begin -->
                    <div class="col-md-2 col-sm-6"><!--col-md-3 col-sm-6 begin -->
                        <div class="box same-height headline"><!--box same-height headline begin -->
                            <h3 class="text-center">Books You Might Like</h3>
                        </div><!--box same-height headline finnish -->
                    </div><!--col-md-3 col-sm-6 finnish -->
                    <?php 
                        $get_books = "select *from books order by rand() LIMIT 0,3";
                        $run_books = mysqli_query($con,$get_books);
                  while($row_books=mysqli_fetch_array($run_books)){
                     $book_id = $row_books['book_id'];
                     $book_title =$row_books['book_title'];
                     $book_img1 = $row_books['book_img1'];
                     $book_price = $row_books['book_price'];
                     
                      echo"
                  
                   
                    <div class='col-md-3 col-sm-5 center-responsive'><!--col-md-3 col-sm-6 center-responsive begin -->
                        <div class='book same-height'>
                            <a href='details.php?book_id=$book_id'><!--book same-height beggin -->
                                <img class='img-responsive'  src='admin_area/product_images/$book_img1' alt='book'>
                            </a>
                            <div class='text'><!--text begin -->
                            <center>
                                <h5> 
                               
                                <a href='details.php?book_id=$book_id'> $book_title</a>
                                
                                </h5></center>
                                <p class='price'>$book_price Da</p>
                            </div><!--text finnish -->
                        </div><!--book same-height finnish -->
                    </div><!--col-md-3 col-sm-6 center-responsive finnish -->
                     ";
                  } ?>
                     
                    </div><!--row same hieght row finnish -->
               
           </div><!-- col-md-9 Finish -->
           <div class="col-md-3"><!-- col-md-3 beggin -->
             <div id="order-summary" class="box"><!-- box beegin-->
                 <div class="box-header"><!-- box-header beggin -->
                     <h3>Order Summary</h3>
                 </div><!-- box-header Finish -->
                 <p class="text-muted"><!-- text-muted begin -->
                    Shipping and Additional Costs are Calculated Based On Value You Have Entred
                     
                 </p><!-- text-muted Finish -->
                 <div class="table-responsive"><!--table-responsive begin -->
                    <table class="table"><!--table begin-->
                       <tbody>
                          <tr>
                             <td>Order All Sub-Total</td>
                             <th><?php echo $total; ?> Da</th>
                              
                          </tr>
                          <tr>
                             <td>shipping And Handling</td>
                             <td>0 Da</td>
                              
                          </tr>
                          <tr>
                             <td>TAX</td>
                             <th>0 Da</th>
                              
                          </tr>
                          <tr class="total"><!--total begin-->
                             <td>TOTAL</td>
                             <th><?php echo $total; ?> Da</th>
                              
                          </tr><!--total  finish-->
                           
                       </tbody>
                        
                    </table> <!--table finish-->
                     
                 </div><!--table-responsive Finish -->
                 
             </div><!-- box Finish -->
              
               
           </div><!-- col-md-3 Finish -->
           
         </div><!-- container Finish -->
   </div><!-- content Finish -->
    <?php 
      include("includes/footer.php");    
        ?>
       
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    <script>
    
       $(document).ready(function(data){

           $(document).on('keyup','.quantity',function(){

                var id = $ (this).data("book_id");
                var quantity = $(this).val();

                if(quantity !=''){

                    $.ajax({

                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},

                        success:function(){
                            $("body").load("cart_body.php");
                        }

                    });

                }

           });

       });
    
    </script>
    
    </body>
</html>   