<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_delivery'])){
        $delete_id = $_GET['delete_delivery'];
        
        $delete_order = "update orders set order_status='delivery canceled' where order_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_order);

        $delivery_order = "update delivery set statu='delivery canceled' where order_id='$delete_id'";
        $run_delivery = mysqli_query($con,$delivery_order);

        if($run_delete){
            
            echo "<script>alert('One of your costumer orders has been canceled')</script>";
            
            echo "<script>window.open('index.php?view_deliveries','_self')</script>";
            
        }
        
    }

    
?>

<?php } ?>