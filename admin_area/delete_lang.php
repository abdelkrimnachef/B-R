<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_lang'])){
        
        $delete_lang_id = $_GET['delete_lang'];
        
        $delete_lang = "delete from languages where lang_id='$delete_lang_id'";
        
        $run_delete = mysqli_query($con,$delete_lang);
         if($run_delete){
            
            echo "<script>alert('One of Your Languages Has Been Deleted , All Books in This Language Has Been Removed')</script>";
            echo "<script>window.open('index.php?view_langs','_self')</script>";
        
        }
        
    }
?>
<?php } ?>