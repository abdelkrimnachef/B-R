<?php 
$active='Home';
include("includes/header.php");

?>
<div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="index.php">Home</a></li>
                  <li>Search</li>
              </ul><!-- breadcumb finnish -->
           </div><!--col-md-12 Finish --> 
           
            <div class="col-md-12"><!-- col-md-9 beggin -->
            
            <div class="box"><!-- box begin -->
           
            <div class="table-responsive"><!--table responsive begin -->
                <table class="table"><!--table begin -->
                    <p class="text-muted"> <h2>Your Search </h2>  </p>
                    <br>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>ISBN</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Language</th>
                            <th>Price</th>
                            
                        </tr>
                                
                    </thead>
                    <tbody>
                              
                        
                           
                            <?php
                            
                                $search = $_GET['search'];
                                
                                $search_query = "select * from books where book_title like '%$search%' OR isbn like '%$search%' OR book_keywords like '%$search%' ";
                                $run_search_query = mysqli_query($con,$search_query);
                                while($row_search_query=mysqli_fetch_array($run_search_query)){
                                    $book_id = $row_search_query['book_id'];
                                    $book_title = $row_search_query['book_title'];
                                    $book_img1 = $row_search_query['book_img1'];
                                    $book_Price = $row_search_query['book_title'];
                                    $b_cat_id = $row_search_query['b_cat_id'];
                                    $lang_id = $row_search_query['lang_id'];
                                    $author_id = $row_search_query['author_id'];
                                    $book_isbn = $row_search_query['isbn'];
                                    $book_price = $row_search_query['book_price'];
                                    $book_label = $row_search_query['book_label'];
                                    $book_sale = $row_search_query['book_sale'];
                                    $get_author = "select * from authors where author_id='$author_id'";
                                    $run_get_author = mysqli_query($con,$get_author);
                                    while($row_get_author=mysqli_fetch_array($run_get_author)){
                                    $author_name = $row_get_author['author_name'];
                                    }
                                    $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
                                    $run_get_b_cat = mysqli_query($con,$get_b_cat);
                                    while($row_get_b_cat = mysqli_fetch_array($run_get_b_cat)){
                                    $b_cat_title = $row_get_b_cat['b_cat_title'];
                                    }
                                    $get_lang = "select * from languages where lang_id='$lang_id'";
                                    $run_get_lang = mysqli_query($con,$get_lang);
                                    while($row_get_lang = mysqli_fetch_array($run_get_lang)){
                                    $lang_title = $row_get_lang['lang_title'];
                                    }   
                                    
                                    echo "

                                        <tr>
                                            <td> $book_title</td>
                                            <td> $book_isbn</td>
                                            <td class='img-responsive'><img height='180px' width='120px' class='img-responsive' src='admin_area/product_images/$book_img1' alt='book'></td> 
                                            <td> $author_name </td>
                                            <td> $b_cat_title  </td>
                                            <td> $lang_title </td>
                                            <td>";  if($book_label=='sale'){ 
                                                echo" <s> <small> $book_price Da </small> </s> $book_sale Da";  
                                            }else{  echo "$book_price Da"; }
                                            echo"</td> 
                                            <td> <a href='http://localhost/B&r/details.php?book_id=$book_id'> View Details </td>
                                           <td> <a href=' http://localhost/B&r/cart.php?book_id=$book_id'> Add To Cart </td>
                                        </tr>
                                    ";}
                          ?>
                        
                    </tbody>
                            
                             
                </table><!--table finnish -->
             </div><!-- table responsive Finish -->
            </div></div></div></div>
              </div><!-- box Finish -->
             
                
           
          
           
         </div><!-- container Finish -->
   </div><!-- content Finish -->

<?php 
$active='Home';
include("includes/footer.php");
?>