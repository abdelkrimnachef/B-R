<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_lang'])){
        
        $edit_lang_id = $_GET['edit_lang'];
        
        $edit_lang_query = "select * from languages where lang_id='$edit_lang_id'";
        
        $run_edit = mysqli_query($con,$edit_lang_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $lang_id = $row_edit['lang_id'];
        
        $lang_title = $row_edit['lang_title'];

        $lang_top = $row_edit['lang_top'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Language
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Language
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Language Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $lang_title; ?> " name="lang_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                     Top Category
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input name="lang_top" type="radio" value="yes" <?php if($lang_top=='yes'){echo "checked='checked'"; } ?> >
                        <label for="">Yes</label>
                        <input name="lang_top" type="radio" value="no" <?php if($lang_top=='no'){echo "checked='checked'"; } ?>>
                        <label for="">No</label>
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group 2 finish -->
        
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

<?php  

          if(isset($_POST['update'])){
              
              $lang_title = $_POST['lang_title'];

              $lang_top = $_POST['lang_top'];
              
              $update_lang = "update languages set lang_title='$lang_title',lang_top='$lang_top' where lang_id='$lang_id'";
              
              $run_lang = mysqli_query($con,$update_lang);
              
              if($run_lang){
                  
                  echo "<script>alert('Your Language Has Been Updated')</script>";
                  
                  echo "<script>window.open('index.php?view_langs','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 