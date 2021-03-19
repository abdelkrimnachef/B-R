<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_qst'])){
        
        $delete_msg_id = $_GET['delete_qst'];
        
        $delete_msg = "delete from messages where msg_id='$delete_msg_id'";
        
        $run_delete_msg = mysqli_query($con,$delete_msg);
        
        if($run_delete_msg){
            
            echo "<script>alert('One of Your Questions Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_qsts','_self')</script>";
            
        }
        
    }

?>




<?php } ?>