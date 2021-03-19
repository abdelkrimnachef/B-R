<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_ccp_payment'])){
        $delete_id = $_GET['delete_ccp_payment'];
        
        $delete_order = "update orders set order_status='delivery canceled' where order_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_order);

        $delivery_order = "update ccp_payment set statu='delivery canceled' where order_id='$delete_id'";
        $run_delivery = mysqli_query($con,$delivery_order);

        if($run_delete){
            
            echo "<script>alert('One of your costumer orders has been canceled')</script>";
            
            echo "<script>window.open('index.php?view_ccp_payments','_self')</script>";
            
        }
        
    }

    
?>

<?php } ?>