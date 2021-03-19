<?php 
include("includes/db.php");
include("functions/functions.php");
?>

<?php
 if(isset($_GET['c_id'])){
   $customer_id = $_GET['c_id'];  
 }
$ip_add = getRealIpUser();
$status = "pending payment";
$invoice_no =mt_rand();
$get_visitor = "select * from visitors where ip_add='$ip_add'";
$run_visitor = mysqli_query($db,$get_visitor);
$row_visitor = mysqli_fetch_array($run_visitor);
$visitor_id = $row_visitor['visitor_id'];
$select_cart = "select * from cart where visitor_id='$visitor_id'";
$run_cart = mysqli_query($con,$select_cart);
while($row_cart = mysqli_fetch_array($run_cart)){
    $book_id = $row_cart['book_id'];
    $book_qty = $row_cart['qty'];
    $book_c_price = $row_cart['b_price'];
    $get_books = "select * from books where book_id='$book_id'";
    $run_books = mysqli_query($con,$get_books);
    $row_books = mysqli_fetch_array($run_books);
      $book_label = $row_books['book_label'];
      $book_sale = $row_books['book_sale'];
        if($book_c_price=='') {
        if($book_label=='new'){
        $sub_total = $row_books['book_price']*$book_qty;
        }else{
          $sub_total = $row_books['book_sale']*$book_qty;
        }}else{
          $sub_total = $book_c_price*$book_qty;
        }
   
     

        $insert_pending_order = "insert into orders (invoice_no,customer_id,book_id,qty,due_amount,order_date,order_status) values ('$invoice_no','$customer_id','$book_id','$book_qty','$sub_total',NOW(),'$status')";
        $run_pending_order =mysqli_query($con,$insert_pending_order);
        if($run_pending_order){
          $ip_add = getRealIpUser();
          $get_visitor = "select * from visitors where ip_add='$ip_add'";
          $run_visitor = mysqli_query($db,$get_visitor);
          $row_visitor = mysqli_fetch_array($run_visitor);
          $visitor_id = $row_visitor['visitor_id'];
        $delete_cart = "delete from cart where visitor_id='$visitor_id'";
        $run_delete = mysqli_query($con,$delete_cart);
        echo "<script>alert('Your Orders Has Been Submitted , Thanks')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    
}
if(items()==0){
     echo "<script>alert('Now Your Cart Is Empty #.#')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    
}else{
  echo "<script>alert('majatch')</script>";
 
}}

?>