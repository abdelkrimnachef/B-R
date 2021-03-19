<center>
    <h1>My Orders</h1>
    <p class="lead">Your orders on one place </p>
    <p class="text-muted">
        If you have aby question ,Feel Free To <a href="../contact.php">Contact Us</a> . Our customer service work <strong>24/7</strong> 

     </p>
</center>
<hr>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <br>
                        <div class="form-group"><!--form-group begin-->
                                <div class="col-md-1"></div>
                                <label class="col-md-3 control-label">Search By invoice No</label>
                                <div class="col-md-3"><!--col-md-6 begin-->
                                    <input name="s-order" type="text" class="form-control" required >
                                </div><!--col-md-6 finish-->
                                <div class="col-md-2"><!--col-md-6 begin-->
                                  <input name="submit" type="submit" value="Search Order"  class="btn btn-primary">
                                </div>
                         </div><!--form-group finish-->
            </form>
            
        <?php  if(isset($_POST['s-order'])){
            $invoice_no1 = $_POST['s-order'];
                ?>
                <div class="table-responsive"><!--table-responsiv begin -->
    <table class="table table-bordered table-hover"><!--table table-bordered table-hove begin -->
        <thead>
<tr>          
 <th>No</th>
               <th>Due Amount </th>
               <th>Invoice no</th>
               <th>Book</th>
               <th>Qty</th>
               <th>Date</th>
               <th>Statu</th>
               <th>CCP</th>
               <th>Payment</th>
               <th>Delvery</th> 
            </tr>
        </thead>
        <tbody>
        <?php 
            
            
            $customer_session = $_SESSION['customer_email'];
            $get_customer = "select * from customers where customer_email='$customer_session'";
            $run_customer = mysqli_query($con,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            $get_orders = "select * from orders where customer_id='$customer_id' and invoice_no='$invoice_no1'";
            $run_orders = mysqli_query($con,$get_orders);
            $i = 0;
            while($row_orders = mysqli_fetch_array($run_orders)){
            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $invoice_no = $row_orders['invoice_no'];
            $qty = $row_orders['qty'];
            $order_date = substr($row_orders['order_date'],0,11);
            $order_status = $row_orders['order_status'];
            $i++;
                                   
            if($order_status=='pending payment'){
                                            
                 $order_status='Pending';
                    
                }elseif($order_status=='paid'){
                    
                $order_status='Paid';
                    
                }elseif($order_status=='road'){
                 $order_status='Road';
                }elseif($order_status=='waiting validation'){
                 $order_status='Waiting';
                }elseif($order_status=='delivery canceled'){
                  $order_status='Canceled';
                }else{
                  $order_status='Road';
                }
                    
            
            ?>
            
            <tr class="tr">
                <th><?php echo $i; #?></th>
                <td><?php echo $due_amount; ?> Da</td>
                <td><?php echo $invoice_no; ?></td>
                 <td><?php 
                    $get_id_book = "select * from orders where order_id='$order_id' ";
                    $run_id_book = mysqli_query($con,$get_id_book);
                    $row_id_book = mysqli_fetch_array($run_id_book);
                    $order_book_id = $row_id_book['book_id'];

                    $get_order_book = "select * from books where book_id='$order_book_id' ";
                    $run_order_book = mysqli_query($con,$get_order_book);
                    $row_order_book = mysqli_fetch_array($run_order_book);
                    $order_book_title = $row_order_book['book_title'];
                    echo $order_book_title;

                ?>
                </td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td>
                    <?php 
                    if($order_status=="Pending"){
                        ?>
                    <a href="ccp.php?order_id=<?php echo $order_id; ?>" target="_parent" class="btn btn-primary btn-sm">
                    <i class="fa fa-bank"></i>   CCP
                    </a>
                    <?php }elseif($order_status=="Paid"){
                    ?>
                     <center>   <i class='fa fa-check'></i> </center> 

                    <?php }elseif($order_status=='Road'){
                        ?>
                    <center>  <i class="fa fa-truck"></i>
                    <?php }elseif($order_status=='Waiting'){ ?>
                        <center>    <i class="fa fa-spinner fa-spin"></i> </center> 
                   <?php
                }elseif($order_status=='Canceled'){
                        ?>
                               <center>   <i class='fa fa-times'></i> </center> 
                        <?php } ?>
                    
                </td>
                <td>
                    <?php 
                    if($order_status=="Pending"){
                        ?>
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_parent" class="btn btn-primary btn-sm">
                    <i class="fa fa-credit-card"></i>   Online 
                    </a>
                    <?php }elseif($order_status=="Paid"){
                    ?>
                     <center>   <i class='fa fa-check'></i> </center> 

                    <?php }elseif($order_status=='Road'){
                        ?>
                    <center>  <i class="fa fa-truck"></i>
                    <?php }elseif($order_status=='Waiting'){ ?>
                        <center>    <i class="fa fa-spinner fa-spin"></i> </center> 
                   <?php
                }elseif($order_status=='Canceled'){
                        ?>
                               <center>   <i class='fa fa-times'></i> </center> 
                        <?php } ?>
                    
                </td>
                <td>
                    <?php 
                    if($order_status=="Pending"){
                        ?>
                    <a href="pay_offline.php?order_id=<?php echo $order_id; ?>" target="_parent" class="btn btn-primary btn-sm">
                    <i class="fa fa-truck"></i>        Delivery
                    </a>
                    <?php }elseif($order_status=="Paid"){
                    ?>
                     <center>   <i class='fa fa-check'></i> </center> 

                    <?php }elseif($order_status=='Road'){
                        ?>
                    <center>  <i class="fa fa-truck"></i>
                    <?php }elseif($order_status=='Waiting'){ ?>
                        <center>    <i class="fa fa-spinner fa-spin"></i> </center> 
                   <?php
                }elseif($order_status=='Canceled'){
                        ?>
                               <center>   <i class='fa fa-times'></i> </center> 
                        <?php } ?>
                    
                </td>
               
          
            </tr><!-- tr finish -->
                                
                    <?php } 
                
 }else{ ?>
<div class="table-responsive"><!--table-responsiv begin -->
    <table class="table table-bordered table-hover"><!--table table-bordered table-hove begin -->
        <thead>
<tr>
            <!--   <th>No</th> -->
               <th>Due Amount </th>
               <th>Invoice no</th>
               <th>Book</th>
               <th>Qty</th>
               <th>Date</th>
               <th>Statu</th>
               <th>CCP</th>
               <th>Payment</th>
               <th>Delvery</th> 
            </tr>
        </thead>
        <tbody>
           <?php 
            
            
            $customer_session = $_SESSION['customer_email'];
            $get_customer = "select * from customers where customer_email='$customer_session'";
            $run_customer = mysqli_query($con,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            $get_orders = "select * from orders where customer_id='$customer_id'";
            $run_orders = mysqli_query($con,$get_orders);
            $i = 0;
            while($row_orders = mysqli_fetch_array($run_orders)){
            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $invoice_no = $row_orders['invoice_no'];
            $qty = $row_orders['qty'];
            $order_date = substr($row_orders['order_date'],0,11);
            $order_status = $row_orders['order_status'];
            $i++;
                                   
            if($order_status=='pending payment'){
                                            
                 $order_status='Pending';
                    
                }elseif($order_status=='paid'){
                    
                $order_status='Paid';
                    
                }elseif($order_status=='road'){
                 $order_status='Road';
                }elseif($order_status=='waiting validation'){
                 $order_status='Waiting';
                }elseif($order_status=='delivery canceled'){
                  $order_status='Canceled';
                }else{
                  $order_status='Road';
                }
                    
            
            ?>
            
            <tr class="tr">
             <!--  <th> <?php // echo $i; #?></th> -->
                <td><?php echo $due_amount; ?> Da</td>
                <td><?php echo $invoice_no; ?></td>
                <td><?php 
                    $get_id_book = "select * from orders where order_id='$order_id' ";
                    $run_id_book = mysqli_query($con,$get_id_book);
                    $row_id_book = mysqli_fetch_array($run_id_book);
                    $order_book_id = $row_id_book['book_id'];

                    $get_order_book = "select * from books where book_id='$order_book_id' ";
                    $run_order_book = mysqli_query($con,$get_order_book);
                    $row_order_book = mysqli_fetch_array($run_order_book);
                    $order_book_title = $row_order_book['book_title'];
                    echo $order_book_title;

                ?>
                </td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td>
                    <?php 
                    if($order_status=="Pending"){
                        ?>
                    <a href="ccp.php?order_id=<?php echo $order_id; ?>" target="_parent" class="btn btn-primary btn-sm">
                    <i class="fa fa-bank"></i>   CCP
                    </a>
                    <?php }elseif($order_status=="Paid"){
                    ?>
                     <center>   <i class='fa fa-check'></i> </center> 

                    <?php }elseif($order_status=='Road'){
                        ?>
                    <center>  <i class="fa fa-truck"></i>
                    <?php }elseif($order_status=='Waiting'){ ?>
                        <center>    <i class="fa fa-spinner fa-spin"></i> </center> 
                   <?php
                }elseif($order_status=='Canceled'){
                        ?>
                               <center>   <i class='fa fa-times'></i> </center> 
                        <?php } ?>
                    
                </td>
                <td>
                    <?php 
                    if($order_status=="Pending"){
                        ?>
                    <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_parent" class="btn btn-primary btn-sm">
                    <i class="fa fa-credit-card"></i>   Online
                    </a>
                    <?php }elseif($order_status=="Paid"){
                    ?>
                     <center>   <i class='fa fa-check'></i> </center> 

                    <?php }elseif($order_status=='Road'){
                        ?>
                    <center>  <i class="fa fa-truck"></i>
                    <?php }elseif($order_status=='Waiting'){ ?>
                        <center>    <i class="fa fa-spinner fa-spin"></i> </center> 
                   <?php
                }elseif($order_status=='Canceled'){
                        ?>
                               <center>   <i class='fa fa-times'></i> </center> 
                        <?php } ?>
                    
                </td>
                <td>
                    <?php 
                    if($order_status=="Pending"){
                        ?>
                    <a href="pay_offline.php?order_id=<?php echo $order_id; ?>" target="_parent" class="btn btn-primary btn-sm">
                    <i class="fa fa-truck"></i>         Delivery
                    </a>
                    <?php }elseif($order_status=="Paid"){
                    ?>
                     <center>   <i class='fa fa-check'></i> </center> 

                    <?php }elseif($order_status=='Road'){
                        ?>
                    <center>  <i class="fa fa-truck"></i>
                    <?php }elseif($order_status=='Waiting'){ ?>
                        <center>    <i class="fa fa-spinner fa-spin"></i> </center> 
                   <?php
                }elseif($order_status=='Canceled'){
                        ?>
                               <center>   <i class='fa fa-times'></i> </center> 
                        <?php } ?>
                    
                </td>
               
            </tr>
            <?php } } ?>
        </tbody>
    </table><!--table table-bordered table-hove finish -->
</div><!--table-responsiv finish -->