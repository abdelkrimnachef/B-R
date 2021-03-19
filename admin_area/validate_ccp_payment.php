<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['validate_ccp_payment'])){
        
        $validate_ccp_id = $_GET['validate_ccp_payment'];

        $validate_ccp = "update ccp_payment set statu='paid' where order_id='$validate_ccp_id'";
        $run_validate = mysqli_query($con,$validate_ccp);
        
        $update_order = "update orders set order_status='paid' where order_id='$validate_ccp_id'";
        $run_update = mysqli_query($con,$update_order);

         $sql="insert into payments (order_id,payment_mode,ref_no,code,payment_date) values ('$validate_ccp_id','CCP','0','0',NOW())";
        $run = mysqli_query($con,$sql);
        
        $get_customer_id = "select * from orders where order_id='$validate_ccp_id'";
        $run_customer_id = mysqli_query($con,$get_customer_id);
        $row_customer_id = mysqli_fetch_array($run_customer_id);
        $customer_id = $row_customer_id['customer_id'];

        $subject = "Invoice Number";
        $get_customer = "select * from customers where customer_id='$customer_id'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_email = $row_customer['customer_email'];
        $customer_name = $row_customer['customer_name'];

                       
        $msg = " Hey $customer_name Thanks for purchasing from our web site you can download your invoice from here -->http://localhost/B&R/customer/invoice.php?order_id=$validate_ccp_id<--";
         $email =$customer_email;
       
        mail($email,$subject,$msg);
         
        if ($run === TRUE) {
           
            } else {
             echo "Error: " . $sql . "<br>" . $con->error;
             }
             $con->close();
           
       
        if($run_validate){
             
          
            
            echo "<script>alert('One of your costumer order has been paid')</script>";
            
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
        
    }

        

    
?>

<?php } ?>