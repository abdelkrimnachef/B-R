<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['validate_delivery'])){
        
        $validate_id = $_GET['validate_delivery'];

        $validate_delivery = "update delivery set statu='road' where order_id='$validate_id'";
        $run_validate = mysqli_query($con,$validate_delivery);
        
        $update_order = "update orders set order_status='road' where order_id='$validate_id'";
        $run_update = mysqli_query($con,$update_order);

        
        
        if($run_validate){
            
            echo "<script>alert('One of your costumer order has been validated')</script>";
            
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
        
    }

    
?>

<?php } ?>