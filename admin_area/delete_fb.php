<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_fb'])){
        
        $delete_fb_id = $_GET['delete_fb'];
        
        $delete_fb = "delete from feedbacks where fb_id='$delete_fb_id'";
        
        $run_delete_fb = mysqli_query($con,$delete_fb);
        
        if($run_delete_fb){
            
            echo "<script>alert('One of Your FeedBacks / Questions Has Been Deleted ')</script>";
            
            echo "<script>window.open('index.php?view_fbs','_self')</script>";
            
        }
        
    }

?>




<?php } ?>