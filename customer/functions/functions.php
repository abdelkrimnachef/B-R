<?php 
    $db = mysqli_connect("localhost","root","","book_store9");

///begin getRealIpUser ///
function pdf_creator(){
    global $db;
   $order_id=$_GET['order_id'];    
            $get_order = "select * from orders where order_id='$order_id'";
            $run_odrder = mysqli_query($db,$get_order);
            $row_order = mysqli_fetch_array($run_odrder);
            $invoice_no = $row_order['invoice_no'];
            $due_amount = $row_order['due_amount'];
            $customer_id = $row_order['customer_id'];
            $book_id = $row_order['book_id'];
            $qty = $row_order['qty'];
            $order_date = $row_order['order_date'];
            $order_status = $row_order['order_status'];

            $get_customer = "select * from customers where customer_id='$customer_id'";
            $run_customer = mysqli_query($db,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_name = $row_customer['customer_name'];
            $customer_country = $row_customer['country_id'];
            $customer_state = $row_customer['state_id'];
            $customer_address = $row_customer['customer_address'];

            $get_country = "select * from countries where country_id='$customer_country'";
            $run_country = mysqli_query($db,$get_country);
            $row_country = mysqli_fetch_array($run_country);
             $country = $row_country['name'];

             $get_state = "select * from states where state_id='$customer_state'";
            $run_state = mysqli_query($db,$get_state);
            $row_state = mysqli_fetch_array($run_state);
             $state = $row_state['name'];


            $get_book = "select * from books where book_id='$book_id'";
            $run_book = mysqli_query($db,$get_book);
            $row_book = mysqli_fetch_array($run_book);
            $book_title = $row_book['book_title'];
            $isbn = $row_book['isbn'];
            $book_price = $row_book['book_price'];
            $book_label = $row_book['book_label'];
            $book_sale = $row_book['book_sale'];




            require('fpdf182/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(55, 5, 'Invoice number', 0, 0);
$pdf->Cell(58, 5,  $invoice_no, 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(52, 5, $order_date, 0, 1);
$pdf->Cell(55, 5, 'Name ', 0, 0);
$pdf->Cell(58, 5, $customer_name, 0, 0);
$pdf->Cell(25, 5, 'By', 0, 0);
$pdf->Cell(52, 5, 'Bring & Read ', 0, 1);
$pdf->Cell(55, 5, 'Status ', 0, 0);
$pdf->Cell(58, 5, 'Paid', 0, 1);
$pdf->Line(10, 30, 200, 30);
$pdf->Ln(10);
$pdf->Cell(55, 5, 'Book Title', 0, 0);
$pdf->Cell(58, 5, $book_title, 0, 0);
$pdf->Cell(25, 5, 'Unit Price', 0, 0);

if($book_label=="new"){
$pdf->Cell(52, 5, $book_price."Da", 0, 1);
}else{
$pdf->Cell(52, 5, $book_sale, 0, 1);

}
$pdf->Cell(55, 5, 'Qty', 0, 0);
$pdf->Cell(58, 5, $qty, 0, 1);
$pdf->Cell(55, 5, 'Product Service Charge', 0, 0);
$pdf->Cell(58, 5, ' 0 Da', 0, 1);
$pdf->Cell(55, 5, 'Product Delivery Charge', 0, 0);
$pdf->Cell(58, 5, ' 0 Da', 0, 1);
$pdf->Line(10, 60, 200, 60);
$pdf->Cell(55, 5, 'Delivery', 0, 0);
$pdf->Cell(58, 5, "$country $state $customer_address", 0, 1);

$pdf->Ln(10);//Line break
$pdf->Cell(55, 5, 'Subtotal', 0, 0);
$pdf->Cell(58, 5, "$due_amount Da", 0, 1);


$pdf->Output();


    
    
    
    
}
function getRealIpUser(){
    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];    
        default: return $_SERVER['REMOTE_ADDR'];
            
            
    }
    
    
    
}

///finish getRealIpUser ///
///begin add_cart ///
function add_cart(){
    
    global $db;
        if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        $b_id = $_GET['add_cart']; 
        $book_qty = $_POST['book_qty']; 
        $get_visitor = "select * from visitors where ip_add='$ip_add'";
        $run_visitor = mysqli_query($db,$get_visitor);
        $row_visitor = mysqli_fetch_array($run_visitor);
        $visitor_id = $row_visitor['visitor_id']; 
        $check_book = "select * from cart where visitor_id='$visitor_id'AND book_id='$b_id' ";
        $run_check = mysqli_query($db,$check_book);
            
        if(mysqli_num_rows($run_check)>0){
            echo " <script> alert('This Book Has Already Added In Your Cart')</script>";
             echo " <script> window.open('details.php?book_id=$b_id','_self')</script>";}
        else{
            $get_visitor = "select * from visitors where ip_add='$ip_add'";
            $run_visitor = mysqli_query($db,$get_visitor);
            $row_visitor = mysqli_fetch_array($run_visitor);
            $visitor_id = $row_visitor['visitor_id'];
             $query = "insert into cart (visitor_id,book_id,qty) values ('$visitor_id','$b_id','$book_qty')";
            
            
        }    $run_query = mysqli_query($db,$query);
            echo " <script> window.open('details.php?book_id=$b_id','_self')</script>";}
                
            
            
            
            
        } 

///finish add_cart ///
/// begin getbook ///
 function getbook(){
     ///import books
     global $db;
     $get_books = "select * from  books order by 1 DESC LIMIT 0,12";
     $run_books = mysqli_query($db,$get_books);
     
     while($row_books=mysqli_fetch_array($run_books)){
         
         $book_id = $row_books['book_id'];
         $book_title = $row_books['book_title'];
         $book_price = $row_books['book_price'];
         $book_img1 = $row_books['book_img1'];
         
         echo "
            <div class='col-md-2 col-sm-6'>
               <div class='book'>
                    <a href='details.php?book_id=$book_id'>
                    <img class='img-responsive' src='admin_area/product_images/$book_img1'>
                    </a>
                    <div class='text'>
                    <h4> 
                    <a href='details.php?book_id=$book_id'>
                      $book_title
                    </a>
                    </h4>
                    
                    <p class='price'> 
                    $book_price
                    </p>
                    <p class='button'> 
                    
                    <a class='btn btn-primary' href='details.php?book_id =$book_id'>
                      <i class='fa fa-shopping-cart'></i>Add To Cart
                    </a>
                    </p>
                    </div>
               </div>
            
            </div>
         
         
         ";
        
     }
 }


/// finish getbook ///

///begin getbacts ///
function getbcats(){
    ///import book categories
     global $db;
     $get_b_cats = "select * from book_categories  order by b_cat_title ASC";
     $run_b_cats = mysqli_query($db,$get_b_cats); 
    while($row_b_cats=mysqli_fetch_array($run_b_cats)){
        $b_cat_id = $row_b_cats['b_cat_id'];
        $b_cat_title = $row_b_cats['b_cat_title'];
        
        echo"
        <li>
            <a href='shop.php?b_cat=$b_cat_id'> $b_cat_title </a>
        
        </li>
        
        
        
        
        ";
    }
    
}
///finish getbacts ///

///begin getcat ///
function getlangs(){
    ///import categories
    
     global $db;
     $get_cats = "select * from languages order by lang_title ASC";
     $run_cats = mysqli_query($db,$get_cats); 
    while($row_cats=mysqli_fetch_array($run_cats)){
        $lang_id = $row_cats['lang_id'];
        $lang_title = $row_cats['lang_title'];
        
        echo"
        <li>
            <a href='shop.php?cat=$lang_id'> $lang_title </a>
        
        </li>
        
        
        
        
        ";
    }
    
}
///finish getcat ///

///begin getbookcat ///
function getbcatbook(){
    /// imprtt bookt int the book categories
    
    global $db;
    
    if(isset($_GET['b_cat'])){
        
        $b_cat_id = $_GET['b_cat'];
        
        $get_b_cat ="select * from book_categories where b_cat_id='$b_cat_id'";
        
        $run_b_cat = mysqli_query($db,$get_b_cat);
        
        $row_b_cat = mysqli_fetch_array($run_b_cat);
        
        $b_cat_title = $row_b_cat['b_cat_title'];
        
        $b_cat_desc = $row_b_cat['b_cat_desc'];
        
        $get_books ="select * from books where b_cat_id='$b_cat_id' LIMIT 0,8";
        
        $run_books = mysqli_query($db,$get_books);
        
        $count = mysqli_num_rows($run_books);
        
        if($count==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> No Books Found In This Book Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $b_cat_title </h1>
                    
                    <p> $b_cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_books=mysqli_fetch_array($run_books)){
            
            $book_id = $row_books['book_id'];
        
            $book_title = $row_books['book_title'];

            $book_price = $row_books['book_price'];

            $book_img1 = $row_books['book_img1'];
            
            echo "
            
                <div class='col-md-3 col-sm-6 center-responsive'>
        
            <div class='book'>
            
                <a href='details.php?book_id=$book_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$book_img1'>
                
                </a>
                
                <div class='text'>
                 <center>
                    <h4>
                       
                        <a href='details.php?book_id=$book_id'>

                            $book_title

                        </a>
                    
                    </h4>
                    
                    <p class='price'>
                    
                         $book_price
                    
                    </p>
                    
                    <p class='button'>
                    
                       <a class='btn btn-primary' href='details.php?book_id=$book_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
                    </p>
                </center>
                </div>
            
            </div>
        
        </div>
            
            ";
            
        }
        
    }
    
}

///finish getbookcat ///


///begin getcat ///

    function getcatbook(){
/// imprtt bookt in the categories

        global $db;
        if(isset($_GET['cat'])){
        
        $lang_id = $_GET['cat'];
        
        $get_cat ="select * from categories where lang_id='$lang_id' ";
        
        $run_cat = mysqli_query($db,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $lang_title = $row_cat['lang_title'];
        
        $lang_desc = $row_cat['lang_desc'];
        
        $get_books ="select * from books where lang_id='$lang_id' LIMIT 0,8";
        
        $run_books = mysqli_query($db,$get_books);
        
        $count = mysqli_num_rows($run_books);
        
        if($count==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> No Books Found In This Book Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $lang_title </h1>
                    
                    <p> $lang_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_books=mysqli_fetch_array($run_books)){
            
            $book_id = $row_books['book_id'];
        
            $book_title = $row_books['book_title'];

            $book_price = $row_books['book_price'];

            $book_img1 = $row_books['book_img1'];
            
            echo "
            
                <div class='col-md-3 col-sm-6 center-responsive'>
        
            <div class='book'>
            
                <a href='details.php?book_id=$book_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$book_img1'>
                
                </a>
                
                <div  class='text'>
                <center>
                    <h4>
            
                        <a href='details.php?book_id=$book_id'>

                            $book_title

                        </a>
                    
                    </h4>
                    
                    <p class='price'>
                    
                         $book_price
                    
                    </p>
                   
                    <p class='button'>
                    
                        <a class='btn btn-primary' href='details.php?book_id=$book_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
                    </p>
                 </center>
                </div>
            
            </div>
        
        </div>
            
            ";
            
        }
        
    }
        
        
        
        
    }
///finish getcat ///
///begin item ///
function items(){
    
    global $db;
    $ip_add = getRealIpUser();
    $get_visitor = "select * from visitors where ip_add='$ip_add'";
    $run_visitor = mysqli_query($db,$get_visitor);
    $row_visitor = mysqli_fetch_array($run_visitor);
    $visitor_id = $row_visitor['visitor_id'];
    $get_items = "select * from cart where visitor_id='$visitor_id'";
    $run_items = mysqli_query($db,$get_items);
    $count_items = mysqli_num_rows($run_items);
    echo $count_items;
    
    
}
///finish items ///
///begin total price ///
function total_price(){
    global $db;
    $ip_add = getRealIpUser();
    $total = 0;
    $get_visitor = "select * from visitors where ip_add='$ip_add'";
    $run_visitor = mysqli_query($db,$get_visitor);
    $row_visitor = mysqli_fetch_array($run_visitor);
    $visitor_id = $row_visitor['visitor_id'];
    $select_cart = "select * from cart where visitor_id='$visitor_id'";
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        $book_id = $record['book_id'];
        $book_qty = $record['qty'];
        $get_price ="select * from books where book_id='$book_id'";
        $run_price = mysqli_query($db,$get_price);
        while($row_price=mysqli_fetch_array($run_price)){
            $book_label =  $row_price['book_label'];
            $book_price = $row_price['book_price'];
            $book_sale = $row_price['book_sale'];

            if($book_label=='sale'){

            $sub_total = $book_sale*$book_qty;
            $total += $sub_total;
        }else{
                
            $sub_total = $book_price*$book_qty;
            $total += $sub_total;
            }
    }
    
    
    
}
    echo " Da " . $total;
}
///finish total price ///









?>