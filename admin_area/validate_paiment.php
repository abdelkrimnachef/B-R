<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['validate_paiment'])){
        
        $validate_id = $_GET['validate_paiment'];

        $validate_delivery = "update delivery set statu='paid' where order_id='$validate_id'";
        $run_validate = mysqli_query($con,$validate_delivery);
        
        $update_order = "update orders set order_status='paid' where order_id='$validate_id'";
        $run_update = mysqli_query($con,$update_order);


        $get_customer_order = "select * from orders where order_id='$validate_id'";
        $run_customer_order = mysqli_query($con,$get_customer_order);
        $row_customer_order = mysqli_fetch_array($run_customer_order);
        $invoice_no = $row_customer_order['invoice_no'];
        $due_amount = $row_customer_order['due_amount'];


        $insert_paiment = "insert into payments (order_id,payment_mode,ref_no,code,payment_date) values ('$validate_id','delivery','0','0',NOW())";

        $run_paiment = mysqli_query($con,$insert_paiment);

      



        
        if($run_validate){
            
            $subject = "Invoice Number";
            $get_customer_id = "select * from orders where order_id='$validate_id'";
            $run_customer_id = mysqli_query($con,$get_customer_id);
            $row_customer_id = mysqli_fetch_array($run_customer_id);
            $customer_id = $row_customer_id['customer_id'];

            $subject = "Invoice Number";
            $get_customer = "select * from customers where customer_id='$customer_id'";
            $run_customer = mysqli_query($con,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_email = $row_customer['customer_email'];
            $customer_name = $row_customer['customer_name'];

                           
            $msg = " Hey $customer_name Thanks for purchasing from our web site you can download your invoice from here -->http://localhost/B&R/customer/invoice.php?order_id=$validate_id<--";
             $email =$customer_email;
           
            mail($email,$subject,$msg);
             
            
            echo "<script>alert('One of your costumer order has been paid')</script>";
            
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
        
    }

    
?>

<?php } ?>