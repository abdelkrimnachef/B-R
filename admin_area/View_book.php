<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['view_book'])){
        
        $view_id = $_GET['view_book'];
        
        $get_b = "select * from books where book_id='$view_id'";
        
        $run_edit = mysqli_query($con,$get_b);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        
        $b_title = $row_edit['book_title'];

        $b_author = $row_edit['author_id'];
        
        $b_cat = $row_edit['b_cat_id'];
        
        $lang = $row_edit['lang_id'];
        
        $b_image1 = $row_edit['book_img1'];
        
        $b_image2 = $row_edit['book_img2'];
        
        $b_image3 = $row_edit['book_img3'];
        
        $b_price = $row_edit['book_price'];
        
        $b_keywords = $row_edit['book_keywords'];
        
        $b_desc = $row_edit['book_desc'];

        $b_sale = $row_edit['book_sale'];

        $b_label = $row_edit['book_label'];

        $b_date = $row_edit['date'];

        $b_isbn = $row_edit['isbn'];

        $b_qty = $row_edit['qty'];
        
    }
    $get_author = "select * from authors where author_id='$b_author'";
        
        $run_author = mysqli_query($con,$get_author);
        
        $row_author = mysqli_fetch_array($run_author);
        
        $author_name = $row_author['author_name'];
        
        $get_b_cat = "select * from book_categories where b_cat_id='$b_cat'";
        
        $run_b_cat = mysqli_query($con,$get_b_cat);
        
        $row_b_cat = mysqli_fetch_array($run_b_cat);
        
        $b_cat_title = $row_b_cat['b_cat_title'];
        
        $get_lang = "select * from languages where lang_id='$lang'";
        
        $run_lang = mysqli_query($con,$get_lang);
        
        $row_lang = mysqli_fetch_array($run_lang);
        
        $lang_title = $row_lang['lang_title'];


?>
  
   <div class="row"><!--row begin-->
       <div class="col-lg-12"><!--col-lg-12 begin-->
           <ol class="breadcrumb"><!--breadcrumb begin-->
               <li class="active"><!--active begin-->
                 <i class="fa fa-dashboard">Dashboard / View Books</i>  
               </li><!--active finish-->
           </ol><!--breadcrumb finish-->
       </div><!--col-lg-12 finish-->
   </div>  <!--row finish-->
    
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-book"></i>  Book
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
  

            <div id="content" ><!-- content begggin -->
     
           <div class="col-lg-12"><!-- col-md-9 begin -->
           <br>
                 <div class="col-md-6"><!--col-sm-6  begin -->
                            <div class="row" id="thumbs"><!--row  beggin -->
                                <center>
                                    <div class="col-md-7 col-xs-4" ><!--col-xs-4 beggin -->
                                    <br> 
                                        <a href="" class="thumbs"><!--thumbs beggin -->
                                          <b>  <img src="product_images/<?php  echo $b_image1; ?>"  alt="Book 1" class="img-responsive" >   </b>
                                        </a><!--thumbs finnish -->
                                    </div><!--col-xs-4 Finish -->
                                                                      
                                    <div class="col-md-7 col-xs-4"><!--col-xs-4 beggin -->
                                    <br> 
                                        <a href="" class="thumbs"><!--thumbs beggin -->
                                          <b>  <img src="product_images/<?php   echo $b_image2; ?>" alt="No Second Picture for This  book" alt="book image 2" class="img-responsive"></b>
                                        </a><!--thumbs finnish -->
                                    </div><!--col-xs-4 Finish -->
                                    
                                    <div class="col-md-7 col-xs-4"><!--col-xs-4 beggin -->
                                    <br>
                                        <a href="" class="thumbs"><!--thumbs beggin -->
                                          <b>  <img src="product_images/<?php echo $b_image3; ?>" alt="No Third Picture for This  book" alt="book image 2" class="img-responsive"></b>
                                        </a><!--thumbs finnish -->
                                    </div><!--col-xs-4 Finish -->
                                </center>
                            </div>
                     
                </div><!-- col-md-9 Finish -->
                <div class="col-md-4 col-sm-12"> <!-- col-sm-6 beggin -->
                    <div class="box"><!-- box beggin --> <br>
                         
                            <h3 class="text-center"><?php  echo"Book Title:<b> $b_title</b>"; ?> </h3> <hr>
                            <h3 class="text-center"><?php  echo"Book ISBN:<b> $b_isbn</b>"; ?> </h3> <hr>
                            
                            <h3 class="text-center"><?php  echo"Book Author:<b> <a href='http://localhost/B&r/admin_area/index.php?view_authors'> $author_name</b></a>    ";  ?> </h3><hr>
                            <h3 class="text-center"><?php  echo"Book Category:<b> <a href='http://localhost/B&r/admin_area/index.php?view_b_cats'> $b_cat_title </b></a> "; ?> </h3><hr>
                            <h3 class="text-center"><?php  echo"Book Language:<b><a href='http://localhost/B&r/admin_area/index.php?view_langs'> $lang_title</b></a> "; ?> </h3> <hr>
                            <?php if($b_label=='sale'){ echo"
                                    <h3 class='text-center'> Book Label:<b>  $b_label </b> </h3><hr>
                                    <h3 class='text-center'> Book Sale Price:<b>  $b_sale Da </b></b><i class='fa fa-check'></i> </h3><hr>
                                    <h3 class='text-center'> Book Price:<b>  $b_price Da <i class='fa fa-times'></i> </b> </h3><hr>";
                                }else{echo"
                                    <h3 class='text-center'> Book Label:<b>  $b_label </b> </h3><hr>
                                    <h3 class='text-center'> Book Price:<b>  $b_price Da </b></h3><hr>";
                                }
                           ?> 
                           <h3 class="text-center"><?php  echo"Book Descripion:<br> <br> <b> $b_desc </b> "; ?> </h3><hr>
                           <h3 class="text-center"><?php  echo"Book KeyWords:<br> <br> <b> $b_keywords </b> "; ?> </h3><hr>
                           <h3 class="text-center"><?php  echo"Book Add Date:<br> <br> <b> $b_date </b> "; ?> </h3><hr>
                           <h3 class="text-center"><?php  echo"Book Quantity:<b> $b_qty</b>"; ?> </h3> <hr>
                         <?php  
                                    
                                    $get_sold = "select * from orders where book_id='$view_id'";
                                
                                    $run_sold = mysqli_query($con,$get_sold);
                                
                                    $count = mysqli_num_rows($run_sold);
                                
                                    
                         ?>       
                         <h3 class='text-center'><?php  echo"Book Sold:<b> $count </b>"; ?> </h3> <hr>
                               

                            <center>
                                     <div class="btn btn-primary">
                                     <a style="color: white" href="index.php?edit_book=<?php echo $view_id; ?>">
                                     
                                     <i class="fa fa-pencil"></i> Edit
                                 
                                  </a> 
                                  </div>
                                  <div  class="btn btn-primary">
                                     
                                     <a style="color: white" href="index.php?delete_book=<?php echo $view_id; ?>" >
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                  </div>
                            </center>         
                                    
                                
                         
                    </div><!--box  Finish -->
                
                </div>  

                <div class="col-md-6" id="details"><!--box beggin -->
                            
                            
                            
                </div>
                             
                
           
 
           
        
            </div><!-- col-lg-12 Finish -->
        </div><!-- content Finish -->
    </div><!-- row Finish -->
</div>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>
<?php } ?>