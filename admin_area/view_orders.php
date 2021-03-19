<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Orders
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <br>
                        <div class="form-group"><!--form-group begin-->
                                <div class="col-md-1"></div>
                                <label class="col-md-3 control-label">Search By invoice No</label>
                                <div class="col-md-3"><!--col-md-6 begin-->
                                    <input name="s-order" type="text" class="form-control" required >
                                </div><!--col-md-6 finish-->
                                <div class="col-md-2"><!--col-md-6 begin-->
                                  <input name="submit" type="submit" value="Search Orders "  class="btn btn-primary form-control">
                                </div>
                         </div><!--form-group finish-->
            </form>
            <?php
            if(isset($_POST['s-order'])){
            $invoice_no = $_POST['s-order'];
                ?>
                 <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer Email: </th>
                                <th> Invoice No: </th>
                                <th> Book Name: </th>
                                <th> Book Qty: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Status: </th>
                                <th> Delete: </th>
                                <th>Invoice</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            <?php
                 $i=0;
                            
                $get_orders = "select * from orders where invoice_no='$invoice_no'";
                
                $run_orders = mysqli_query($con,$get_orders);

                while($row_order=mysqli_fetch_array($run_orders)){
                    
                    $order_id = $row_order['order_id'];
                    
                    $c_id = $row_order['customer_id'];
                    
                    $invoice_no = $row_order['invoice_no'];
                    
                    $book_id = $row_order['book_id'];
                    
                    $qty = $row_order['qty'];
                    
                    $order_date = $row_order['order_date'];
                    
                    $order_amount = $row_order['due_amount'];
                    
                    $order_status = $row_order['order_status'];

                    
                    $get_books = "select * from books where book_id='$book_id'";
                    
                    $run_books = mysqli_query($con,$get_books);
                    
                    $row_books = mysqli_fetch_array($run_books);
                    
                    $book_title = $row_books['book_title'];
                    

                    $get_customer = "select * from customers where customer_id='$c_id'";
                    
                    $run_customer = mysqli_query($con,$get_customer);
                    
                    $row_customer = mysqli_fetch_array($run_customer);
                    
                    $customer_email = $row_customer['customer_email'];
                    
                    
                    
                    $i++;
            
            ?>
            
            <tr><!-- tr begin -->
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $customer_email; ?> </td>
                <td> <?php echo $invoice_no; ?></td>
                <td> <?php echo $book_title; ?> </td>
                <td> <?php echo $qty; ?></td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_amount; ?> Da </td>
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
                    <?php 
                    $get_type_payment =  "select * from ccp_payment where order_id='$order_id'";
                    $run_type_payment = mysqli_query($con,$get_type_payment);
                    $count = mysqli_num_rows($run_type_payment);
                   
                       if($count==0){ if($order_status=='Waiting Validation' or $order_status=='Delivery Canceled' or $order_status=='Road') {
                            echo "<a href='http://localhost/B&r/admin_area/index.php?view_deliveries'>
                     
                            <i class='fa fa-reply'> </i>  To Deliveries
                        
                         </a> ";
                        }else{ echo"
                            <a href='index.php?delete_order=$order_id'>
                            
                               <i class='fa fa-trash-o'></i> Delete
                           
                            </a> ";
                           }}else{
                            echo "<a href='http://localhost/B&r/admin_area/index.php?view_ccp_payments'>
                     
                            <i class='fa fa-reply'> </i>  To CCP Payments
                        
                         </a> ";
                        
                        
                           }
                        
                        
                        
                     ?>
                </td><td>
                <?php
                if( $order_status=='Paid'){
                    echo "<a href='http://localhost/B&R/customer/invoice.php?order_id=$order_id'>

                   <center> <i class='fa fa-eye'> </i> </center>
                 </a> ";
                }else{
                    echo "<center>  <i class='fa fa-times'> </i></center>  ";
                }
                ?>
                </td>   
                
                
               
            </tr><!-- tr finish -->
                                
                    <?php } 
                
                            


            }else{
            ?>
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Customer Email: </th>
                                <th> Invoice No: </th>
                                <th> Book Name: </th>
                                <th> Book Qty: </th>
                                <th> Order Date: </th>
                                <th> Total Amount: </th>
                                <th> Status: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from orders";
                                
                                $run_orders = mysqli_query($con,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $book_id = $row_order['book_id'];
                                    
                                    $qty = $row_order['qty'];
                                    
                                    $order_status = $row_order['order_status'];

                                    $order_date = $row_order['order_date'];
                                    
                                    $order_amount = $row_order['due_amount'];


                                    
                                    $get_books = "select * from books where book_id='$book_id'";
                                    
                                    $run_books = mysqli_query($con,$get_books);
                                    
                                    $row_books = mysqli_fetch_array($run_books);
                                    
                                    $book_title = $row_books['book_title'];

                                    
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                    $run_customer = mysqli_query($con,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['customer_email'];
                                   
                                    
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $book_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $order_amount; ?> Da </td>
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
                                    <?php 
                                        $get_type_payment =  "select * from ccp_payment where order_id='$order_id' and statu!='paid'";
                                        $run_type_payment = mysqli_query($con,$get_type_payment);
                                        $count = mysqli_num_rows($run_type_payment);
                                       
                                           if($count==0){ if($order_status=='Waiting Validation' or $order_status=='Delivery Canceled' or $order_status=='Road') {
                                                echo "<a href='http://localhost/B&r/admin_area/index.php?view_deliveries'>
                                         
                                                <i class='fa fa-reply'> </i>  To Deliveries
                                            
                                             </a> ";
                                            }else{ echo"
                                                <a href='index.php?delete_order=$order_id'>
                                                
                                                   <i class='fa fa-trash-o'></i> Delete
                                               
                                                </a> ";
                                               }}else{
                                                echo "<a href='http://localhost/B&r/admin_area/index.php?view_ccp_payments'>
                                         
                                                <i class='fa fa-reply'> </i>  To CCP Payments
                                            
                                             </a> ";
                                            
                                            
                                            
                                            
                                            
                                            
                                         ?>
                                    </td>
                                </tr><!-- tr finish -->
                                                    
                                        <?php } 
                                    
                    
                    
                    
                                } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php }} ?>