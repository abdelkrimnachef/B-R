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
        
        $b_id = $row_edit['book_id'];
        
        $b_title = $row_edit['book_title'];
        
        $b_cat = $row_edit['b_cat_id'];
        
        $lang = $row_edit['lang_id'];
        
        $b_image1 = $row_edit['book_img1'];
        
        $b_image2 = $row_edit['book_img2'];
        
        $b_image3 = $row_edit['book_img3'];
        
        $b_price = $row_edit['book_price'];
        
        $b_keywords = $row_edit['book_keywords'];
        
        $b_desc = $row_edit['book_desc'];
        
    }
        
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit books
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Book 
                   
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
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Category </label> 
                      
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
                          
                          <input name="book_img1" type="file" class="form-control" required>
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $b_image1; ?>" alt="<?php echo $b_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $b_image2; ?>" alt="<?php echo $b_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $b_image3; ?>" alt="<?php echo $b_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Book Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="book_price" type="text" class="form-control" required value="<?php echo $b_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> book Keywords </label> 
                      
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
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update book" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>
<!------------------------------------------------------------------------------------------------------------>

<?php 

if(isset($_POST['update'])){
    
    $book_title = $_POST['book_title'];
    $book_cat = $_POST['book_cat'];
    $lang = $_POST['lang'];
    $book_price = $_POST['book_price'];
    $book_keywords = $_POST['book_keywords'];
    $book_desc = $_POST['book_desc'];
    
    $book_img1 = $_FILES['book_img1']['name'];
    $book_img2 = $_FILES['book_img2']['name'];
    $book_img3 = $_FILES['book_img3']['name'];
    
    $temb_name1 = $_FILES['book_img1']['tmb_name'];
    $temb_name2 = $_FILES['book_img2']['tmb_name'];
    $temb_name3 = $_FILES['book_img3']['tmb_name'];
    
    move_uploaded_file($temb_name1,"book_images/$book_img1");
    move_uploaded_file($temb_name2,"book_images/$book_img2");
    move_uploaded_file($temb_name3,"book_images/$book_img3");
    
    $update_book = "update books set b_cat_id='$book_cat',lang_id='$lang',date=NOW(),book_title='$book_title',book_img1='$book_img1',book_img2='$book_img2',book_img3='$book_img3',book_keywords='$book_keywords',book_desc='$book_desc',book_price='$book_price' where book_id='$b_id'";
    
    $run_book = mysqli_query($con,$update_book);
    
    if($run_book){
        
       echo "<script>alert('Your book has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_books','_self')</script>"; 
        
    }
    
}

?>



<?php } ?>