<?php 

$active='Shopping Cart';

include("includes/header.php");

?>

<body>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Cart
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
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
                       
                       <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                   <th colspan="2">Book</th>
                                   <th >Quantity</th>
                                   <th>Unite Price</th>
                                   <th colspan="1">Delete</th>
                                   <th colspan="2">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <tbody><!-- tbody Begin -->
                                  
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
                                         $_SESSION['qty'] = $book_qty;
                                         $total += $sub_total;
                                 ?>
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <td>
                                           
                                       <img class="img-responsive" src="admin_area/product_images/<?php echo $book_img1; ?>" alt="book">  
                                           
                                       </td>
                                       
                                       <td>
                                           
                                       <a" href="details.php?book_id=<?php echo $book_id ?>"><?php echo $book_title; ?></a>
                                           
                                       </td>
                                       
                                       <td  width="5px">
                                          
                                           <input type="text" name="quantity" data-product_id="<?php echo $book_id; ?>" value="<?php echo $_SESSION['qty']; ?>" class="quantity form-control">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <?php echo $only_price; ?>
                                           
                                       </td>
                                       
                                       
                                       
                                       <td>
                                           
                                           <input type="checkbox" name="remove[]" value="<?php echo $book_id; ?>">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <?php echo $sub_total; ?> Da
                                           
                                       </td>
                                       
                                   </tr><!-- tr Finish -->
                                   
                                   <?php } } ?>
                                   
                               </tbody><!-- tbody Finish -->
                               
                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="5">Total</th>
                                       <th colspan="2">$<?php echo $total; ?></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                               
                           </table><!-- table Finish -->
                           <div class="form-inline pull-right"><!-- form-inline Begin -->
                               <div class="form-group"><!-- form-group Begin -->

                                    <label> Coupon Code: </label>
                                    <input type="text" name="code" class="form-control">
                                    <input type="submit" class="btn btn-primary" value="Use Coupon" name="apply_coupon">
                               
                               </div><!-- form-group Finish -->
                           </div><!-- form-inline Finish -->
                           
                       </div><!-- table-responsive Finish -->
                       
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
                               
                               <a href="index.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->
                               
                               <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-refresh"></i> Update Cart
                                   
                               </button><!-- btn btn-default Finish -->
                               
                               <a href="checkout.php" class="btn btn-primary">
                                   
                                   Proceed Checkout <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
               <?php 
               
                function update_cart(){
                    
                    global $con;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            $ip_add = getRealIpUser();
                            $get_visitor = "select * from visitors where ip_add='$ip_add'";
                            $run_visitor = mysqli_query($con,$get_visitor);
                            $row_visitor = mysqli_fetch_array($run_visitor);
                            $visitor_id = $row_visitor['visitor_id'];
                            
                            $delete_product = "delete from cart where visitor_id='$visitor_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-2 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                       <h3 class="text-center">Books You May Like</h3>
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
                               
                                <a href='details.php?book_id=$book_id'> <b> $book_title </b></a>
                                
                                </h5></center>
                                <p class='price'>$book_price Da</p>
                            </div><!--text finnish -->
                        </div><!--book same-height finnish -->
                    </div><!--col-md-3 col-sm-6 center-responsive finnish -->
                     ";
                  } ?>
                     
                    </div><!--row same hieght row finnish -->
               
           </div><!-- col-md-9 Finish-->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <h3>Order Summary</h3>
                       
                   </div><!-- box-header Finish -->
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order All Sub-Total </td>
                                   <th> $<?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Shipping and Handling </td>
                                   <td> $0 </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax </td>
                                   <th> $0 </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <th> $<?php echo $total; ?> </th>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

    <script>
    
       $(document).ready(function(data){

           $(document).on('keyup','.quantity',function(){

                var id = $ (this).data("product_id");
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