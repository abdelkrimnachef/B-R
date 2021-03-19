<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_b_cat'])){
        
        $edit_b_cat_id = $_GET['edit_b_cat'];
        
        $edit_b_cat_query = "select * from book_categories where b_cat_id='$edit_b_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_b_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $b_cat_id = $row_edit['b_cat_id'];
        
        $b_cat_title = $row_edit['b_cat_title'];
        
        $b_cat_top = $row_edit['b_cat_top'];

        $b_cat_desc = $row_edit['b_cat_desc'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Book Category
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Book Category
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Book Category Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $b_cat_title; ?> " name="b_cat_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                     Top Category
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input name="b_cat_top" type="radio" value="yes" <?php if($b_cat_top=='yes'){echo "checked='checked'"; } ?> >
                        <label for="">Yes</label>
                        <input name="b_cat_top" type="radio" value="no" <?php if($b_cat_top=='no'){echo "checked='checked'"; } ?>>
                        <label for="">No</label>
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Book Category Description 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <textarea type='text' name="b_cat_desc" class="form-control"><?php echo $b_cat_desc; ?></textarea>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script src="js/tinymce/tinymce.min.js"></script>
     <script>tinymce.init({selector:'textarea'});</script>
<?php  

          if(isset($_POST['update'])){
              
              $b_cat_title = $_POST['b_cat_title'];

              $b_cat_top = $_POST['b_cat_top'];
              
              $b_cat_desc = $_POST['b_cat_desc'];
              
              $update_b_cat = "update book_categories set b_cat_title='$b_cat_title',b_cat_desc='$b_cat_desc',b_cat_top='$b_cat_top' where b_cat_id='$b_cat_id'";
              
              $run_b_cat = mysqli_query($con,$update_b_cat);
              
              if($run_b_cat){
                  
                  echo "<script>alert('Your Category Has Been Updated')</script>";
                  
                  echo "<script>window.open('index.php?view_b_cats','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 