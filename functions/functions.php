<?php 
    $db = mysqli_connect("localhost","root","","book_store9");

///begin getRealIpUser ///
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
        $check_book = "select * from cart where visitor_id='$visitor_id' AND book_id='$b_id' ";
        $run_check = mysqli_query($db,$check_book);
        $get_qty ="select * from books where book_id='$b_id'";
        $run_qty = mysqli_query($db,$get_qty);
        if($row_qty=mysqli_fetch_array($run_qty)){
        $stock_qty = $row_qty['qty'];
    }
            
        if(mysqli_num_rows($run_check)>0){
            echo " <script> alert('This Book Has Already Added In Your Cart')</script>";
             echo " <script> window.open('details.php?book_id=$b_id','_self')</script>";}
        else{ if($stock_qty>=$book_qty){
            $query = "insert into cart (visitor_id,book_id,qty) values ('$visitor_id','$b_id','$book_qty')";
            $run_query = mysqli_query($db,$query);
            
            $stock_qty = $stock_qty - $book_qty;
            $update_qty = "update books set qty='$stock_qty' where book_id='$b_id'";
            $run_update = mysqli_query($db,$update_qty);
            echo " <script> alert('Congrats The Book Added In Your Cart Please checkout')</script>";
            echo " <script> window.open('shop.php','_self')</script>";

                }else{
                    echo " <script> alert('No More Qty For This Book Please Conact Us')</script>";
                    echo " <script> window.open('contact.php','_self')</script>";

                }
             }
            
            
            
        } 
    }

///finish add_cart ///
/// begin getbook ///
 function getbook(){
     ///import books
     global $db;
     $get_books = "select * from  books where book_label='new' order  by 1 DESC LIMIT 0,12";
     $run_books = mysqli_query($db,$get_books);
     
     while($row_books=mysqli_fetch_array($run_books)){
         
         $book_id = $row_books['book_id'];
         $author_id = $row_books['author_id'];
         $book_title = $row_books['book_title'];
         $book_price = $row_books['book_price'];
         $book_img1 = $row_books['book_img1'];
         
         
         $get_author = "select * from authors where author_id='$author_id' order by author_name ASC";
                                
         $run_author = mysqli_query($db,$get_author);
         while($row_author=mysqli_fetch_array($run_author)){
             $author_name = $row_author['author_name'];
            

         }
         echo "
            <div class='col-md-3 col-sm-6 single'>
               <div class='book'><center> 
                    <a href='details.php?book_id=$book_id'>
                    
                    <img class='img-responsive' src='admin_area/product_images/$book_img1'>
                    </a>
                    <div class='text'>
                        <div class='col-md-12'>
                            <a href='details.php?book_id=$book_id'>
                    
                                <h5> <b> $book_title </b></h5>
                    
                            </a>
                        </div>
                    
                    
                        <p class='price'> 
                            <center> <h5> $book_price Da</h5></center>
                        </p>
                        <p class='button'> 
                           
                             <a class='btn btn-primary' href='cart.php?book_id=$book_id'>
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

/// begin getsalebook ///
function getsalebook(){
    ///import books
    global $db;
    $get_books = "select * from  books where book_label='sale' order by 1 DESC LIMIT 0,12";
    $run_books = mysqli_query($db,$get_books);
    
    while($row_books=mysqli_fetch_array($run_books)){
        
        $book_id = $row_books['book_id'];
        $author_id = $row_books['author_id'];
        $book_title = $row_books['book_title'];
        $book_price = $row_books['book_price'];
        $book_img1 = $row_books['book_img1'];
        $book_sale = $row_books['book_sale'];
        
        
        $get_author = "select * from authors where author_id='$author_id'";
                               
        $run_author = mysqli_query($db,$get_author);
        while($row_author=mysqli_fetch_array($run_author)){
            $author_name = $row_author['author_name'];
           

        }
        echo "
           <div class='col-md-3 col-sm-6 single'>
              <div class='book'><center> 
                   <a href='details.php?book_id=$book_id'>
                   
                   <img class='img-responsive' src='admin_area/product_images/$book_img1'>
                   </a>
                   <div class='text-center'>
                       <div class='col-md-12'>
                           <a href='details.php?book_id=$book_id'>
                   
                               <h5> <b> $book_title </b> </h5>
                   
                           </a>
                       </div>
                   
                   
                       <p class='price'> 
                           <center> <h5> $book_sale  Da <s> <small> $book_price Da </small>  </s></h5></center>
                       </p>
                       <p class='button'> 
                          
                            <a class='btn btn-primary' href='cart.php?book_id=$book_id'>
                               <i class='fa fa-shopping-cart'></i>Add To Cart
                            </a>
                       </p>
                   </div>
                   
              </div>
           
           </div>
        
        
        ";
       
    }
}


/// finish getsalebook ///

 //   ///begin getbacts ///
//    function getbcats(){
//        ///import book categories
 //       global $db;
 //       $get_b_cats = "select * from book_categories";
 //       $run_b_cats = mysqli_query($db,$get_b_cats); 
 //       while($row_b_cats=mysqli_fetch_array($run_b_cats)){
 //           $b_cat_id = $row_b_cats['b_cat_id'];
 //           $b_cat_title = $row_b_cats['b_cat_title'];
 //           
 //           echo"
 //           <li>
 //               <a href='shop.php?b_cat=$b_cat_id'> $b_cat_title </a>
 //           
 //           </li>
  //          
 //          
  //          
  //          
  //          ";
   //     }
   //     
   // }
   // ///finish getbacts ///

///begin getcat ///
//function getlangs(){
    ///import categories
    
    // global $db;
     //$get_langs = "select * from languages";
     //$run_langs = mysqli_query($db,$get_langs); 
   // while($row_langs=mysqli_fetch_array($run_langs)){
        //$lang_id = $row_langs['lang_id'];
        //$lang_title = $row_langs['lang_title'];
        //
       // echo"
      //     <a href='shop.php?lang=$lang_id'> $lang_title </a>
        
      // </li>
        
        
        
        
        //";
  //  }
    
//}
///finish getcat ///

///begin getbookcat ///

///finish getbookcat ///


///begin getcat ///

  
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
        $book_c_price = $record['b_price'];
        $get_price ="select * from books where book_id='$book_id'";
        $run_price = mysqli_query($db,$get_price);
        while($row_price=mysqli_fetch_array($run_price)){
            $book_label =  $row_price['book_label'];
            $book_price = $row_price['book_price'];
            $book_sale = $row_price['book_sale'];
            if($book_c_price==''){
            if($book_label=='sale'){

            $sub_total = $book_sale*$book_qty;
            $total += $sub_total;
        }else{
                
            $sub_total = $book_price*$book_qty;
            $total += $sub_total;
            }
        }else{
            $sub_total = $book_c_price*$book_qty;
            $total += $sub_total;
        }
    }
    
    
    
}
    echo " Da " . @$total;
}
///finish total price ///

///begin getbooks ///
function getbooks(){
global $db;
$aWhere = array();

  ///begin for book categories ///
if(isset($_REQUEST['b_cat']) && is_array($_REQUEST['b_cat'])){
   
    foreach($_REQUEST['b_cat'] as $sKey=>$sVal){
        if((int)$sVal!=0){
            $aWhere[] = 'b_cat_id='.(int)$sVal;
          

        }
    }
    }
    ///finish for book categories ///
    ///begin for authors ///
if(isset($_REQUEST['auth'])&&is_array($_REQUEST['auth'])){
   
    foreach($_REQUEST['auth'] as $sKey=>$sVal){
       
        if((int)$sVal!=0){
            $aWhere[] = 'author_id='.(int)$sVal;
         
        }
    }
    }
    ///finish authors ///
  ///begin for languages ///
    if(isset($_REQUEST['lang'])&&is_array($_REQUEST['lang'])){
      
    foreach($_REQUEST['lang'] as $sKey=>$sVal){
        if((int)$sVal!=0){
            $aWhere[] = 'lang_id='.(int)$sVal;
        
        }
    }
    }
    ///finish for languages ///
$per_page=8;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page=1;
}
$start_from = ($page-1) * $per_page;
$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
$get_books ="select * from books ".$sWhere;
$run_books = mysqli_query($db,$get_books);
while($row_books=mysqli_fetch_array($run_books)){
    $book_id = $row_books['book_id'];
    $book_title = $row_books['book_title'];
    $author_id = $row_books['author_id'];
    $book_price = $row_books['book_price'];
    $book_sale = $row_books['book_sale'];
    $book_label = $row_books['book_label'];
    $book_img1 = $row_books['book_img1'];
    $book_desc = $row_books['book_desc'];
$get_author = "select * from authors where author_id='$author_id'";
$run_author = mysqli_query($db,$get_author);
$run_author = mysqli_fetch_array($run_author);
    $author_name = $run_author['author_name'];
    echo "
    <div class='col-md-3 col-sm-6 center-responsive'>
    <div class='book'>
        <a href='details.php?book_id=$book_id'>
                
             <img class='img-responsive' src='admin_area/product_images/$book_img1'>
         </a>
        <div class='text'>
            <div class='col-md-12'>
                <a href='details.php?book_id=$book_id'>
    
                    <h5> <b> $book_title </b></h5>
    
                </a>
            </div>";
    
                if($book_label=='sale'){
                    echo"
               
            <p class='price'> 
                <center> <h5> <b> $book_sale Da </b> <small> <s> $book_price Da </s></small></h5></center>
            </p>";}else{ echo"
                <p class='price'> 
                <center> <h5><b> $book_price Da </b></h5></center>
            </p>";}
            echo"
            <p class='button'> 
               
                <a class='btn btn-primary' href='cart.php?book_id=$book_id'>
                  <i class='fa fa-shopping-cart'></i>Add To Cart
                </a>
             </p>
        </div>
    

     </div>
</div>
    ";
    
}


}
///finish getbooks ///


///begin getpaginator ///

function getpaginator(){
 
    $per_page = 8;
    global $db;
    $aWhere = array();
    $sPath = '';
    
    
      ///begin for book categories ///
      if(isset($_REQUEST['b_cat']) && is_array($_REQUEST['b_cat'])){
       
        foreach($_REQUEST['b_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'b_cat_id='.(int)$sVal;
                $sPath .='b_cat[]='.(int)$sVal. '&';
              
    
            }
        }
        }
        ///finish for book categories ///
        ///begin for authors ///
    if(isset($_REQUEST['auth'])&&is_array($_REQUEST['auth'])){
       
        foreach($_REQUEST['auth'] as $sKey=>$sVal){
           
            if((int)$sVal!=0){
                $aWhere[] = 'author_id='.(int)$sVal;
                $sPath .='auth[]='.(int)$sVal. '&';
            }
        }
        }
        ///finish authors ///
      ///begin for languages ///
        if(isset($_REQUEST['lang'])&&is_array($_REQUEST['lang'])){
          
        foreach($_REQUEST['lang'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'lang_id='.(int)$sVal;
                $sPath .='lang[]='.(int)$sVal. '&';
            }
        }
        }
        ///finish for languages ///
        $sWhere =(count($aWhere)>0?' WHERE ' .implode(' or ',$aWhere): '');
        $query = "select * from books".$sWhere;
        $result =mysqli_query($db,$query);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / $per_page);
    
            echo "<li> <a href='shop.php?page=1";
            if(!empty($sPath)){
                    echo "&".$sPath;
    
            }
            echo"'>".'First Page'."</a></li>";
            for( $i=1;$i<=$total_pages;$i++){
                echo "<li> <a href='shop.php?page=".$i.(!empty($sPath)?'&'.$sPath:'')."'>".$i."</a></li>";
            };
            echo "<li> <a href='shop.php?page=$total_pages";
            if(!empty($sPath)){
                    echo "&".$sPath;
        
    
    }
    echo"'>".'Last Page'."</a></li>";
    }

///finish getpaginator ///



?>
