<?php 
   if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <title>Insert Books</title>
</head>
<body>
    <div class="row"><!--row begin-->
       
        <div class="col-lg-12"><!--col-lg-12 begin-->
            <ol class="breadcrumb"><!--breadcrumb begin-->
                <li class="active"><!--active begin-->
                     <i class="fa fa-dashboard">
                    Dashboard / Insert Books
                </i>
                </li><!--active finish-->
               
            
                
            </ol><!--breadcrumb finish-->
        </div><!--col-lg-12 finnish-->
            
        
    </div><!--row finnish-->
    <div class="row"><!--row begin-->
       <div class="col-lg-12"><!--col-lg-12 begin-->
           <div class="panel panel-default"><!--panel panel-default begin-->
             <div class="panel-heading"><!--panel heading begin-->
                 <h3 class="panel-title"><!--panel-title begin-->
                     <i class="fa fa-money fa-fw"><!--fa fa-money fa-fw begin-->
                         
                     </i><!--fa fa-money fa-fw finish--> Insert Book
                 </h3><!--panel-title finish-->
             </div><!--panel heading finish-->
              <div class="panel-body"><!--panel body beggin-->
                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book Title</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_title" type="text" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book ISBN</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_isbn" pattern="[0-9]{10,15}" minlength="10" type="text" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin--> 
                     <div class="col-md-12">
                     <p align ="center">If Author Doesnt Exist In the List  <a href="http://localhost/B&r/admin_area/index.php?insert_author"><b>Click Here</b> </a></p>
                         </div>
                         <label class="col-md-3 control-label">Author</label>
                        
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <select required name="author"  class="form-control"><!--form-control begin-->
                                 <?php 
                                 $get_authors = "select * from Authors";
                                 $run_authors = mysqli_query($con,$get_authors);
                                 while ($row_authors=mysqli_fetch_array($run_authors)){
                                     $author_id = $row_authors['author_id'];
                                     $author_name = $row_authors['author_name'];
                                  
                                     echo "
                                     <option value='$author_id'>
                                     
                                     $author_name 
                                      </option>
                                     ";
                                   
                                 }
                                 ?>
                             </select><!--form-control finish-->
                             
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                     <div class="col-md-12">
                             <p align ="center">If The Category Doesnt Exist In the List Choose <b> OTHER</b> Or <a href="http://localhost/B&r/admin_area/index.php?insert_b_cat"><b>Click Here</b> </a></p>
                             </div>
                         <label class="col-md-3 control-label">Book Category</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <select required name="book_cat"  class="form-control"><!--form-control begin-->
                                 <?php 
                                 $get_b_cats = "select * from book_categories";
                                 $run_b_cats = mysqli_query($con,$get_b_cats);
                                 while ($row_b_cats=mysqli_fetch_array($run_b_cats)){
                                     $b_cat_id = $row_b_cats['b_cat_id'];
                                     $b_cat_title = $row_b_cats['b_cat_title'];
                                     echo "
                                     <option value='$b_cat_id'>
                                     $b_cat_title</option>
                                     ";
                                     
                                 }
                                 ?>
                             </select><!--form-control finish-->
                         </div><!--col-md-6 finish-->
                         
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                     <div class="col-md-12">
                             <p align ="center">If The Language Doesnt Exist In the List Choose <b> OTHER</b> Or <a href="http://localhost/B&r/admin_area/index.php?insert_lang"><b>Click Here</b> </a></p>
                             </div>
                         <label class="col-md-3 control-label">Languages</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <select required name="lang"  class="form-control"><!--form-control begin-->
                                 <?php 
                                 $get_langs = "select * from languages";
                                 $run_langs = mysqli_query($con,$get_langs);
                                 while ($row_langs=mysqli_fetch_array($run_langs)){
                                     $lang_id = $row_langs['lang_id'];
                                     $lang_title = $row_langs['lang_title'];
                                     echo "
                                     <option value='$lang_id'>
                                     $lang_title</option>";
                                     
                                 }
                                 ?>
                             </select><!--form-control finish-->
                             
                         </div><!--col-md-6 finish-->
                         
                         
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book Image 1</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_img1" type="file" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                                          <div class="form-group"><!--form-group begin-->
                                         <p align ="center">If You Have'nt a Second OR  a Third Image OR Both, Choose the <b>SAME</b> Picture as The FIRST</p>
                         <label class="col-md-3 control-label">Book Image 2</label>
                        
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_img2" type="file" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book Image 3</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_img3" type="file" class="form-control" required>
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                  <!--   <div class="form-group"><!--form-group begin-->
                   <!--      <label class="col-md-3 control-label">PDF Version</label>
                   <!--      <div class="col-md-6"><!--col-md-6 begin-->
                   <!--          <input name="pdf" type="file" class="form-control">
                   <!--      </div><!--col-md-6 finish-->
                   <!--  </div><!--form-group finish-->
                  <!--   <div class="form-group"><!--form-group begin-->
                  <!--       <label class="col-md-3 control-label">Audio Version</label>
                  <!--       <div class="col-md-6"><!--col-md-6 begin-->
                   <!--          <input name="audio" type="file" class="form-control">
                   <!--      </div><!--col-md-6 finish-->
                 <!--    </div><!--form-group finish--> 

                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book Price</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_price" type="tel" pattern="[0-9]{1,9}" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book KeyWords</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="book_keywords" type="text" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Book Description</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                            <textarea name="book_desc" cols="19" rows="10" class="form-control"></textarea>
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Quantity</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="qty" type="tel" pattern="[0-9]{0,9}" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                            <input name="submit" type="submit" value="Insert Book" class="btn btn-primary form-control">
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     
                     
                      
                  </form>
              </div><!--panel body finish-->
               
           </div><!--panel panel-default finish-->
           
       </div><!--col-lg-12 finnish-->
        
    </div><!--row finnish-->
   
  <!--   <script src="js/tinymce/tinymce.min.js"></script>
     <script>tinymce.init({selector:'textarea'});</script> -->

</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        
        $book_title = $_POST['book_title'];
        $book_isbn = $_POST['book_isbn'];
        $author_id = $_POST['author'];
        $book_cat = $_POST['book_cat'];
        $lang = $_POST['lang'];
        $book_price = $_POST['book_price'];
        $book_keywords = $_POST['book_keywords'];
        $book_desc = $_POST['book_desc'];
        $qty = $_POST['qty'];
        
        $book_img1 = $_FILES['book_img1']['name'];
        $book_img2 = $_FILES['book_img2']['name'];
        $book_img3 = $_FILES['book_img3']['name'];
        
        $temp_name1 = $_FILES['book_img1']['tmp_name'];
        $temp_name2 = $_FILES['book_img2']['tmp_name'];
        $temp_name3 = $_FILES['book_img3']['tmp_name'];        
        move_uploaded_file($temp_name1,"product_images/$book_img1");
        move_uploaded_file($temp_name2,"product_images/$book_img2");
        move_uploaded_file($temp_name3,"product_images/$book_img3");
        $insert_book = "insert into books (isbn,author_id,b_cat_id,lang_id,date,book_title,book_img1,book_img2,book_img3,book_price,book_keywords,book_desc,qty,book_label)value ('$book_isbn','$author_id','$book_cat','$lang',NOW(),'$book_title','$book_img1','$book_img2','$book_img3','$book_price','$book_keywords','$book_desc','$qty','new')";
            
        $run_book = mysqli_query($con,$insert_book);
        if($run_book){
            echo " <script>alert('Book has been succsefully inserted')</script> ";
            echo " <script> window.open('index.php?view_books','_self') </script> ";
        }
    }
   }
?>