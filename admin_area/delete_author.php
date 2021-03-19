<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
<?php 
    if(isset($_GET['delete_author'])){
        $delete_id = $_GET['delete_author'];
        $delete_author = "delete from authors where author_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_author);
   
               if($run_delete){
            echo"<script>alert('One OF Your authors Has Been Deleted and all thier books are removed') </script> ";
            echo" <script>window.open('index.php?view_authors','_self') </script> ";
        
    }}
?>

<?php } ?>