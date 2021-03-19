<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Deliveries
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Waiting Deliveries
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer name: </th>
                                <th> Invoice No: </th>
                                <th> Book Name </th>
                                <th> Book Qty </th>
                                <th> Total Amount </th>
                                <th> Country </th>
                                <th> State </th>
                                <th> Address </th>
                                <th> Status </th>
                                <th> Delivery </th>
                               <!-- <th> Paiment </th> -->
                                <th> Delete </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                                $get_orders = "select * from delivery where statu='waiting validation'";
                                $run_orders = mysqli_query($con,$get_orders);
                                while($row_order=mysqli_fetch_array($run_orders)){
                                   
                                    $order_id = $row_order['order_id'];
                                    $order_status = $row_order['statu'];
                                    $country_id = $row_order['country_id'];
                                    $state_id = $row_order['state_id'];
                                    $address = $row_order['address'];                  


                                    $get_order = "select * from orders where order_id='$order_id'";
                                    $run_order = mysqli_query($con,$get_order);
                                    $row_order = mysqli_fetch_array($run_order);
                                    $book_id = $row_order['book_id'];
                                    $customer_id = $row_order['customer_id'];
                                   
                                    $order_amount = $row_order['due_amount'];
                                    $qty = $row_order['qty'];
                                    $invoice_no = $row_order['invoice_no'];

                                    
                                    $get_books = "select * from books where book_id='$book_id'";
                                    $run_books = mysqli_query($con,$get_books);
                                    $row_books = mysqli_fetch_array($run_books);
                                    $book_title = $row_books['book_title'];
                                    
                                    $get_customer = "select * from customers where customer_id='$customer_id'";
                                    $run_customer = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_name = $row_customer['customer_name'];
                                    
                                   


                                    $get_country = "select * from countries where country_id='$country_id'";
                                    $run_country = mysqli_query($con,$get_country);
                                    $row_country = mysqli_fetch_array($run_country);
                                    $country_name = $row_country['name'];
                                

                                
                                    $get_state = "select * from states where state_id='$state_id'";
                                    $run_state = mysqli_query($con,$get_state);
                                    $row_state = mysqli_fetch_array($run_state);
                                    $state_name = $row_state['name'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $book_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td> <?php echo $country_name; ?> </td>
                                <td> <?php echo $state_name; ?> </td>
                                <td> <?php echo $address; ?> </td>
                                <td>
                                    
                                    <?php 
                                                                
                                        if($order_status=='pending payment'){
                                            
                                        echo  $order_status='Pending Paiment';
                                            
                                        }elseif($order_status=='paid'){
                                            
                                        echo  $order_status='Paid';
                                            
                                        }elseif($order_status=='road'){
                                        echo  $order_status='Road';
                                        }elseif($order_status=='waiting validation'){
                                        echo  $order_status='Waiting Validation';
                                        }elseif($order_status=='delivery canceled'){
                                            echo  $order_status='Delivery Canceled';
                                        }else{
                                            echo  $order_status='Road';
                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?validate_delivery=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-truck"></i> Validate
                                    
                                     </a> 
                                     
                                </td>
                              <!--  <td> 
                                     
                                     <a href="index.php?validate_paiment=<?php // echo $order_id; ?>">
                                     
                                        <i class="fa fa-euro"></i> Validate Paiment
                                    
                                     </a> 
                                     
                                </td>-->
                                <td> 
                                     
                                     <a href="index.php?delete_delivery=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-ban"></i> cancel
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Canceled Deliveries
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer name: </th>
                                <th> Invoice No: </th>
                                <th> Book Name </th>
                                <th> Book Qty </th>
                                <th> Total Amount </th>
                                <th> Country </th>
                                <th> State </th>
                                <th> Address </th>
                                <th> Status </th>
                                <th> Delivery </th>
                            <!--    <th> Paiment </th>
                                <th> Delete </th> -->
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                                $get_orders = "select * from delivery where statu='delivery canceled'";
                                $run_orders = mysqli_query($con,$get_orders);
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    $order_status = $row_order['statu'];
                                    $country_id = $row_order['country_id'];
                                    $state_id = $row_order['state_id'];
                                    $address = $row_order['address'];                  


                                    $get_order = "select * from orders where order_id='$order_id'";
                                    $run_order = mysqli_query($con,$get_order);
                                    $row_order = mysqli_fetch_array($run_order);
                                    $book_id = $row_order['book_id'];
                                    $customer_id = $row_order['customer_id'];
                                    $order_id = $row_order['order_id'];
                                    $order_amount = $row_order['due_amount'];
                                    $qty = $row_order['qty'];
                                    $invoice_no = $row_order['invoice_no'];

                                    
                                    $get_books = "select * from books where book_id='$book_id'";
                                    $run_books = mysqli_query($con,$get_books);
                                    $row_books = mysqli_fetch_array($run_books);
                                    $book_title = $row_books['book_title'];
                                    
                                    $get_customer = "select * from customers where customer_id='$customer_id'";
                                    $run_customer = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_name = $row_customer['customer_name'];
                                    
                                    
                                    $get_country = "select * from countries where country_id='$country_id'";
                                    $run_country = mysqli_query($con,$get_country);
                                    $row_country = mysqli_fetch_array($run_country);
                                    $country_name = $row_country['name'];
                                  
                
                                  
                                    $get_state = "select * from states where state_id='$state_id'";
                                    $run_state = mysqli_query($con,$get_state);
                                    $row_state = mysqli_fetch_array($run_state);
                                    $state_name = $row_state['name'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $book_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td> <?php echo $country_name; ?> </td>
                                <td> <?php echo $state_name; ?> </td>
                                <td> <?php echo $address; ?> </td>
                                <td>
                                    
                                    <?php 
                                                                
                                        if($order_status=='pending payment'){
                                            
                                        echo  $order_status='Pending Paiment';
                                            
                                        }elseif($order_status=='paid'){
                                            
                                        echo  $order_status='Paid';
                                            
                                        }elseif($order_status=='road'){
                                        echo  $order_status='Road';
                                        }elseif($order_status=='waiting validation'){
                                        echo  $order_status='Waiting Validation';
                                        }elseif($order_status=='delivery canceled'){
                                            echo  $order_status='Delivery Canceled';
                                        }else{
                                            echo  $order_status='Road';
                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?validate_delivery=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-truck"></i> Validate
                                    
                                     </a> 
                                     
                                </td>
                                <!-- <td> 
                                     
                                     <a href="index.php?validate_paiment=<?php // echo $order_id; ?>">
                                     
                                        <i class="fa fa-euro"></i> Validate Paiment
                                    
                                     </a> 
                                     
                                </td> -->
                              <!--  <td> 
                                     
                                     <a href="index.php?delete_delivery= <?php // echo $order_id; ?>">
                                     
                                        <i class="fa fa-ban"></i> cancel
                                    
                                     </a> 
                                     
                                </td> -->
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Road Deliveries
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer name: </th>
                                <th> Invoice No: </th>
                                <th> Book Name </th>
                                <th> Book Qty </th>
                                <th> Total Amount </th>
                                <th> Country </th>
                                <th> state </th>
                                <th> Address </th>
                                <th> Status </th>
                            <!--    <th> Delivery </th> -->
                                <th> Paiment </th>
                             <!--    <th> Delete </th> -->
                            </tr><!-- tr finish --> 
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                                $get_orders = "select * from delivery where statu='road'";
                                $run_orders = mysqli_query($con,$get_orders);
                                while($row_order=mysqli_fetch_array($run_orders)){
                                   
                                    $order_id = $row_order['order_id'];
                                    $order_status = $row_order['statu'];
                                    $country_id = $row_order['country_id'];
                                    $state_id = $row_order['state_id'];
                                    $address = $row_order['address'];                  


                                    $get_order = "select * from orders where order_id='$order_id'";
                                    $run_order = mysqli_query($con,$get_order);
                                    $row_order = mysqli_fetch_array($run_order);
                                    $book_id = $row_order['book_id'];
                                    $customer_id = $row_order['customer_id'];
                                    $order_id = $row_order['order_id'];
                                    $order_amount = $row_order['due_amount'];
                                    $qty = $row_order['qty'];
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $get_books = "select * from books where book_id='$book_id'";
                                    $run_books = mysqli_query($con,$get_books);
                                    $row_books = mysqli_fetch_array($run_books);
                                    $book_title = $row_books['book_title'];
                                    
                                    $get_customer = "select * from customers where customer_id='$customer_id'";
                                    $run_customer = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_name = $row_customer['customer_name'];
                                    
                                                                
                                    $get_country = "select * from countries where country_id='$country_id'";
                                    $run_country = mysqli_query($con,$get_country);
                                    $row_country = mysqli_fetch_array($run_country);
                                    $country_name = $row_country['name'];



                                    $get_state = "select * from states where state_id='$state_id'";
                                    $run_state = mysqli_query($con,$get_state);
                                    $row_state = mysqli_fetch_array($run_state);
                                    $state_name = $row_state['name'];
                                                                        
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_name; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $book_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td> <?php echo $country_name; ?> </td>
                                <td> <?php echo $state_name; ?> </td>
                                <td> <?php echo $address; ?> </td>
                                <td>
                                    
                                    <?php 
                                                                
                                        if($order_status=='pending payment'){
                                            
                                        echo  $order_status='Pending Paiment';
                                            
                                        }elseif($order_status=='paid'){
                                            
                                        echo  $order_status='Paid';
                                            
                                        }elseif($order_status=='road'){
                                        echo  $order_status='Road';
                                        }elseif($order_status=='waiting validation'){
                                        echo  $order_status='Waiting Validation';
                                        }elseif($order_status=='delivery canceled'){
                                            echo  $order_status='Delivery Canceled';
                                        }else{
                                            echo  $order_status='Road';
                                        }
                                    
                                    ?>
                                    
                                </td>
                             <!--   <td> 
                                     
                                     <a href="index.php?validate_delivery=<?php // echo $order_id; ?>">
                                     
                                        <i class="fa fa-truck"></i> Validate
                                    
                                     </a> 
                                     
                                </td> -->
                                <td> 
                                     
                                     <a href="index.php?validate_paiment=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-euro"></i> Validate Paiment
                                    
                                     </a> 
                                     
                                </td>
                             <!--   <td> 
                                     
                                     <a href="index.php?delete_delivery=<?php // echo $order_id; ?>">
                                     
                                        <i class="fa fa-ban"></i> cancel
                                    
                                     </a> 
                                     
                                </td> -->
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>