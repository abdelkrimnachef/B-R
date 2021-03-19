<div class="box"> <!--box begin-->
   <?php 
    $session_email = $_SESSION['customer_email'];
    $select_customer = "select * from customers where customer_email='$session_email'";
    $run_customer = mysqli_query($con,$select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    ?>
    <h1 class="text-center">
        <p class="lead text-center"><!--lead text-center begin-->
             <a href="order.php?c_id=<?php echo $customer_id ?>">Validate Order</a>
        </p><!--lead text-center finish-->
    </h1>
    <p class="lead text-center"><!--lead text-center begin-->
        When Your Order Be Validated Must checkout (Online/Cash On Delivery Even CCP Payment)     
    </p><!--lead text-center finish-->
        
</div><!--text-center fenish-->