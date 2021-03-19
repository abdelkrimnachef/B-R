<?php 

session_start();

$active='Shopping Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

$ip_add = getRealIpUser();

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $qty = $_POST['quantity'];
    $get_visitor = "select * from visitors where ip_add='$ip_add'";
    $run_visitor = mysqli_query($db,$get_visitor);
    $row_visitor = mysqli_fetch_array($run_visitor);
    $visitor_id = $row_visitor['visitor_id'];
    $update_qty = "update cart set qty='$qty' where book_id='$id' AND visitor_id='$visitor_id'";

    $run_qty = mysqli_query($con,$update_qty);

}

?>