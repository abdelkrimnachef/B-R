<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>
<?php 
    if(isset($_GET['delete_book'])){
        $delete_id = $_GET['delete_book'];
        $delete_book = "delete from books where book_id='$delete_id'";
       // $delete_book_cart = "delete from cart where b_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_book);
      //  $run_delete_book_cart = mysqli_query($con,$delete_book_cart);
        if($run_delete){
            echo" <script>alert('One OF Your Books Has Been Deleted') </script> ";
             echo"<script>window.open('index.php?view_books','_self') </script> ";
        }
    }
?>

<?php } ?>