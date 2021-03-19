<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_author'])){
        
        $edit_author = $_GET['edit_author'];
        
        $get_author = "select * from authors where author_id='$edit_author'";
        
        $run_author = mysqli_query($con,$get_author);
        
        $row_author = mysqli_fetch_array($run_author);
        
        $auth_id = $row_author['author_id'];
        
        $auth_name = $row_author['author_name'];

        $auth_top = $row_author['author_top'];

        $auth_desc = $row_author['author_desc'];

        $auth_image = $row_author['author_image'];
        
    }
?>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Author
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Autor
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Author Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="author_name" type="text" class="form-control" value="<?php echo $auth_name; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                         Top Author
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="author_top" type="radio" value="yes" <?php if($auth_top=='yes'){echo "checked='checked'"; } ?> >
                            <label for="">Yes</label>
                            <input name="author_top" type="radio" value="no" <?php if($auth_top=='no'){echo "checked='checked'"; } ?>>
                            <label for="">No</label>
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Author Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="author_image" class="form-control"> <br>
                            <img src="other_images/<?php echo $auth_image ?>" height="70" width="70">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Author Description</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                            <textarea  name="author_desc" cols="19" rows="10" class="form-control"  ><?php echo $auth_desc; ?></textarea>
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script src="js/tinymce/tinymce.min.js"></script>
     <script>tinymce.init({selector:'textarea'});</script>
<?php  

    if(isset($_POST['update'])){
        $author_name = $_POST['author_name'];
        $author_top = $_POST['author_top'];
        $author_desc = $_POST['author_desc'];
        if(is_uploaded_file($_FILES['author_image']['tmp_name'])){
            $author_image = $_FILES['author_image']['name'];
            $temp_name = $_FILES['author_image']['tmp_name'];
            move_uploaded_file($temp_name,"other_images/$author_image");
            $update_author_i = "update authors set author_name='$author_name',author_top='$author_top',author_image='$author_image',author_desc='$author_desc' where author_id='$auth_id'";
            $run_author_i = mysqli_query($con,$update_author_i);
                if($run_author_i){
                     echo "<script>alert('Your Author has Been UPDATED')</script>";
                     echo "<script>window.open('index.php?view_authors','_self')</script>";
                }    

        }else{
        $update_author = "update authors set author_name='$author_name',author_top='$author_top',author_desc='$author_desc' where author_id='$auth_id'";
        $run_author = mysqli_query($con,$update_author);
             if($run_author){
                echo "<script>alert('Your Author has Been UPDATED Image Not Changed')</script>";
                echo "<script>window.open('index.php?view_authors','_self')</script>";
             }
        }

    }
    

?>

<?php } ?>