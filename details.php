
<?php 

$active='Shopping Cart';
include("includes/header.php");

?>

<?php 
if(isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
    $get_book = "select * from books where book_id='$book_id'";
    $run_book = mysqli_query($con,$get_book);
    
    $row_book = mysqli_fetch_array($run_book);
    
    $b_cat_id = $row_book['b_cat_id'];
    $isbn = $row_book['isbn'];
    $book_title = $row_book['book_title'];
    $book_price = $row_book['book_price'];
    $book_desc = $row_book['book_desc'];
    $book_img1 = $row_book['book_img1'];
    $book_img2 = $row_book['book_img2'];
    $book_img3 = $row_book['book_img3'];
    $stock_qty = $row_book['qty'];
    $book_label = $row_book['book_label'];
    $book_sale = $row_book['book_sale'];
    $author_id = $row_book['author_id'];
    $lang_id = $row_book['lang_id'];
    
    $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
    $run_b_cat = mysqli_query($con,$get_b_cat);
    
    $row_b_cat = mysqli_fetch_array($run_b_cat);
    
    $b_cat_title = $row_b_cat['b_cat_title']; 
    ///////
    $get_author = "select * from authors where author_id='$author_id'";
    $run_author = mysqli_query($con,$get_author);
    
    $row_author = mysqli_fetch_array($run_author);
    
    $author_name = $row_author['author_name'];


    ////
    $get_lang = "select * from languages where lang_id='$lang_id'";
    $run_lang = mysqli_query($con,$get_lang);
    
    $row_lang = mysqli_fetch_array($run_lang);
    
    $lang_title = $row_lang['lang_title'];
}
?>

       
   </div><!-- navbar navbar-default Finish -->
   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="index.php">Home</a></li>
                  <li>
                      Shop
                  </li>
                  <li>
                      <a href="shop.php?b_cat=<?php 
                               echo $b_cat_id; ?>">
                                   <?php 
                          echo @$b_cat_title;?> </a>
                  </li>
                  <li>
                      <?php echo @$book_title; ?>
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-9 begin -->
               <div id="bookMain" class="row"><!--book Main  begin -->
                   <div class="col-sm-5"><!--col-sm-6  begin -->
                       <div  id="mainImage"><!-- mainImage begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide begin-->
                               <ol class="carousel-indicators"><!-- carousel indicators Finish -->
                                   <li data-target="#myCarousel"  data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel"data-slide-to="2"></li>
                               </ol><!-- carousel indicators Finish -->
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php 
                                           echo $book_img1;
                                           ?>" alt="book image 1"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php 
                                           echo $book_img2;
                                           ?>" alt="No Second Picture for This  book"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php 
                                           echo $book_img3;
                                           ?>" alt="No Third Picture for This  book  "></center>
<!-------------------------------------------->
                                   </div>
                               </div>
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!--right carousel-control beggin -->
                               <span class="glyphicon glyphicon-chevron-left"></span>
                               <span class="sr-only">Previous</span>
                               </a><!--left carousel-control Finish -->
                                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--right carousel-control begin -->
                               <span class="glyphicon glyphicon-chevron-right"></span>
                               <span class="sr-only">next</span>
                               </a><!--right carousel-control Finish -->
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                  
           </div><!-- col-md-9 Finish -->
           <div class="col-sm-1"></div>
           <div class="col-sm-6"> <!-- col-sm-6 beggin -->
               <div class="box"><!-- box beggin -->
                   <h1 class="text-center"><?php  echo   @$book_title ?> <small>by <?php echo @$author_name; ?></small>   </h1>
                   <h5 class="text-center"><?php  echo "ISBN :"; echo "<b> "; echo @$isbn; echo" </b>" ?>  </h1>
                   <h5 class="text-center"><?php  echo "Category :"; echo "<b> "; echo @$b_cat_title; echo" </b>" ?>  </h1>
                   <h5 class="text-center"><?php  echo "Language :"; echo "<b> "; echo @$lang_title; echo" </b>" ?>  </h1>
                   
                     
                      <?php add_cart(); ?>
                       <form action="details.php?add_cart=<?php echo  $book_id; ?> " class="form-horizontal" method="post"><!-- form-horizontal begin -->
                           <div class="form-group"><!-- form-group begin -->
                           <label for="" class="col-md-5 control-label">Books Quantity</label>
                           <div class="col-md-7"><!--col-md-7 begin -->
                                  <select name="book_qty" id="" class="form-control"><!-- form- control begin -->
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                                   <option>5</option>
                                  </select><!-- form-control finish -->
                            </div><!--col-md-7 finish -->
                           </div><!-- form-group finnish -->

                           <p class="price"> 
                               <?php 
                               if($book_label=='sale'){
                                   echo 
                                    " $book_sale Da  <s>  <small>  $book_price Da  </small> </s>";
                                }else{
                                  echo "$book_price Da";

                               }
                                ?></p>
                           <p class="text-center buttons">
                           <button class="btn btn-primary i fa fa-shopping-cart">
                               Add To Cart
                           </button></p>

                       </form><!-- form-horizontal finnish -->
                    </div><!--box  Finish -->
               <div class="row" id="thumbs"><!--row  beggin -->
                 <div class="col-xs-4"><!--col-xs-4 beggin -->
                     <a href="" class="thumbs"><!--thumbs beggin -->
                         <img src="admin_area/product_images/<?php 
                                           echo $book_img1;
                                           ?>" alt="Book 1" class="img-responsive">
                     </a><!--thumbs finnish -->
                 </div><!--col-xs-4 Finish -->
                  <div class="col-xs-4"><!--col-xs-4 beggin -->
                     <a href="" class="thumbs"><!--thumbs beggin -->
                         <img src="admin_area/product_images/<?php 
                                           echo $book_img2;
                                           ?>" alt="No Second Picture for This  book" alt="book image 2" class="img-responsive">
                     </a><!--thumbs finnish -->
                  </div><!--col-xs-4 Finish --> <div class="col-xs-4"><!--col-xs-4 beggin -->
                     <a href="" class="thumbs"><!--thumbs beggin -->
                         <img src="admin_area/product_images/<?php 
                                           echo $book_img3;
                                           ?>" alt="No Third Picture for This  book" alt="book image 2" class="img-responsive">
                     </a><!--thumbs finnish -->
                  </div><!--col-xs-4 Finish -->
 
                   
               </div><!--row  Finish -->
           </div><!-- col-sm-6 Finish -->
         </div><!--row Main  Finish -->
                <div class="box" id="details"><!--box beggin -->
                  
                   <h4>Book Details</h4>
                   <p>
                      <?php echo $book_desc; ?>
                  
                   <hr>
                   <p class="text-center buttons">
                           <button class="btn btn-primary i fa fa-shopping-cart">
                               No Available PDF Book
                           </button>
                           
                           <button class="btn btn-primary i fa fa-shopping-cart">
                           No Available AudioBook
                           </button></p>
                    
                </div><!--box Finish -->
                <div id="row same-height-row"><!--same hieght row begin -->
                    <div class="col-md-2 col-sm-5"><!--col-md-3 col-sm-6 begin -->
                        <div class="box same-height headline"><!--box same-height headline begin -->
                            <h3 class="text-center">Books You May Like</h3>
                            
                            <h4>Here You Find All Books Like The Book Choosen "Category" OR "Author"</h4>
                        </div><!--box same-height headline finnish -->
                    </div><!--col-md-3 col-sm-6 finnish -->
                   
                    <?php   
                        $get_books = "select * from books where b_cat_id=$b_cat_id order by rand() LIMIT 0,4";
                        $run_books = mysqli_query($con,$get_books);
                       while($row_books=mysqli_fetch_array($run_books)) {
                            $book_id = $row_books['book_id'];
                            $book_title = $row_books['book_title'];
                            $book_img1 = $row_books['book_img1'];
                            $book_price = $row_books['book_price'];
                           
                           echo"
                           <div class='col-md-2 col-sm-6 center-responsive'>
                           <div class='book same-height'>
                           <a href='details.php?book_id=$book_id'>
                          
                           <img class='img-responsive' src='admin_area/product_images/$book_img1'>
                           </a>
                           <div class='text'>
                           <center>
                           <h5> <a href='details.php?book_id=$book_id'> 
                           $book_title
                           </a>
                           </h5>
                           <p class='price'>
                           Da <b> $book_price </b>
                           </p>
                           </center>
                           </div>
                           </div>
                           </div>
                           
                           
                           
                           ";
                           
                           
                       }
                    
                    ?>
                    
                </div><!--row same hieght row finnish -->
           </div><!--col-md-9 finnish -->
           
 
           
       </div><!-- container Finish -->
   </div><!-- content Finish -->
    <?php 
      include("includes/footer.php");    
        ?>
       
        
         
          
           
            
             
              
               
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>
    
    