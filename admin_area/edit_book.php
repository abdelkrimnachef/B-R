<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_book'])){
        
        $edit_id = $_GET['edit_book'];
        
        $get_b = "select * from books where book_id='$edit_id'";
        
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
        
        $b_isbn = $row_edit['isbn'];
        
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Books </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Book 
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i>  Edit Book <b> <?php echo $b_title ?> </b> 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_title" type="text" class="form-control" required value="<?php echo $b_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book ISBN</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_isbn" type="text" pattern="[0-9]{10,15}" class="form-control" value= "<?php echo $b_isbn ?>" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Author </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="author" class="form-control" required><!-- form-control Begin -->
                              
                              <option value="<?php echo $b_author; ?>"> <?php echo $author_name; ?> </option>
                              
                              <?php 
                              
                              $get_authors = "select * from authors";
                              $run_authors = mysqli_query($con,$get_authors);
                              
                              while ($row_authors=mysqli_fetch_array($run_authors)){
                                  
                                  $author_id = $row_authors['author_id'];
                                  $author_name = $row_authors['author_name'];
                                  
                                  echo "
                                  
                                  <option value='$author_id'> $author_name </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> book Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="book_cat" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $b_cat; ?>"> <?php echo $b_cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_b_cats = "select * from book_categories";
                              $run_b_cats = mysqli_query($con,$get_b_cats);
                              
                              while ($row_b_cats=mysqli_fetch_array($run_b_cats)){
                                  
                                  $b_cat_id = $row_b_cats['b_cat_id'];
                                  $b_cat_title = $row_b_cats['b_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$b_cat_id'> $b_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Language </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="lang" class="form-control"><!-- form-control Begin -->
                              
                              <option value="<?php echo $lang; ?>"> <?php echo $lang_title; ?> </option>
                              
                              <?php 
                              
                              $get_lang = "select * from languages";
                              $run_lang = mysqli_query($con,$get_lang);
                              
                              while ($row_lang=mysqli_fetch_array($run_lang)){
                                  
                                  $lang_id = $row_lang['lang_id'];
                                  $lang_title = $row_lang['lang_title'];
                                  
                                  echo "
                                  
                                  <option value='$lang_id'> $lang_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_img1" type="file" value="b_image_1" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $b_image1; ?>" alt="<?php echo $b_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_img2" type="file" value="b_image_2" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $b_image2; ?>" alt="<?php echo $b_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_img3" type="file" value="b_image_3" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $b_image3; ?>" alt="<?php echo $b_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_price" pattern="[0-9]{1,9}" type="text" class="form-control" required value="<?php echo $b_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_keywords" type="text" class="form-control" required value="<?php echo $b_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="book_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $b_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                     
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                   <div class="col-md-12">
                             <p align ="center">If This Book Is not For Sale  <b> leave the field of Book Sale empty or "0"</b></p>
                             </div>
                       
                       <label class="col-md-3 control-label"> Book Sale </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="book_sale" pattern="[0-9]{0,9}" type="text" class="form-control" value="<?php echo $b_sale; ?>">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Book" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
<!---    <script src="js/tinymce/tinymce.min.js"></script>-->
  <!-- <script>tinymce.init({ selector:'textarea'});</script> -->
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
 
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $book_cat = $_POST['book_cat'];
    $lang = $_POST['lang'];
    $book_price = $_POST['book_price'];
    $book_keywords = $_POST['book_keywords'];
    $book_desc = $_POST['book_desc'];
    $book_sale = $_POST['book_sale'];
    $book_isbn = $_POST['book_isbn'];
    
    if(is_uploaded_file($_FILES['book_img1']['tmp_name'])){
    
    $book_img1 = $_FILES['book_img1']['name'];
    $book_img2 = $_FILES['book_img2']['name'];
    $book_img3 = $_FILES['book_img3']['name'];
    
    $temp_name1 = $_FILES['book_img1']['tmp_name'];
    $temp_name2 = $_FILES['book_img2']['tmp_name'];
    $temp_name3 = $_FILES['book_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$book_img1");
    move_uploaded_file($temp_name2,"product_images/$book_img2");
    move_uploaded_file($temp_name3,"product_images/$book_img3");
     
        if($book_sale>0){
    $update_book_i = "update books set isbn='$book_isbn',author_id='$author',b_cat_id='$book_cat',lang_id='$lang',date=NOW(),book_title='$book_title',book_img1='$book_img1',book_img2='$book_img2',book_img3='$book_img3',book_keywords='$book_keywords',book_desc='$book_desc',book_price='$book_price',book_label='sale',book_sale='$book_sale' where book_id='$edit_id'";
        }else{
    $update_book_i = "update books set isbn='$book_isbn',author_id='$author',b_cat_id='$book_cat',lang_id='$lang',date=NOW(),book_title='$book_title',book_img1='$book_img1',book_img2='$book_img2',book_img3='$book_img3',book_keywords='$book_keywords',book_desc='$book_desc',book_price='$book_price',book_label='new',book_sale='0' where book_id='$edit_id'";
        
        }
    
    
    $run_book_i = mysqli_query($con,$update_book_i);

    if($run_book_i){
  
       echo "<script>alert('Your Book has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_books','_self')</script>";
     }

         

    }else{
        if($book_sale>0){
            $update_book = "update books set isbn='$book_isbn',author_id='$author',b_cat_id='$book_cat',lang_id='$lang',date=NOW(),book_title='$book_title',book_keywords='$book_keywords',book_desc='$book_desc',book_price='$book_price',book_label='sale',book_sale='$book_sale' where book_id='$edit_id'";
                }else{
                    $update_book = "update books set isbn='$book_isbn',author_id='$author',b_cat_id='$book_cat',lang_id='$lang',date=NOW(),book_title='$book_title',book_keywords='$book_keywords',book_desc='$book_desc',book_price='$book_price',book_label='new',book_sale='0' where book_id='$edit_id'";
                
                }
    $run_book = mysqli_query($con,$update_book);

        if($run_book){


            echo "<script>alert('Your Book has been updated Successfully Without Image ')</script>"; 
             
            echo "<script>window.open('index.php?view_books','_self')</script>"; 
             
         }
    }
    
    
}
?>


<?php } ?>