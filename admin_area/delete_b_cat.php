<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 
    
    if(isset($_GET['delete_b_cat'])){
        
        $delete_b_cat_id = $_GET['delete_b_cat'];
        
        $delete_b_cat = "delete from book_categories where b_cat_id='$delete_b_cat_id'";
        $run_delete = mysqli_query($con,$delete_b_cat);
        
   
        if($run_delete){
            
            echo "<script>alert('One of Your Categories Has Been Deleted and All Books in This Category Has Been Removed')</script>";
            echo "<script>window.open('index.php?view_b_cats','_self')</script>";
            
        }
        
    }

?>




<?php } ?>