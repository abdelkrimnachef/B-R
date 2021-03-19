
<?php 

if(isset($_GET['mail_subscriber'])){
    
    $sub_id = $_GET['mail_subscriber'];
    
    $get_sub = "select * from subscribers where sub_id='$sub_id'";
    
    $run_sub = mysqli_query($con,$get_sub);
    
    $row_sub = mysqli_fetch_array($run_sub);
    
    $sub_id = $row_sub['sub_id'];
    $sub_email = $row_sub['sub_email'];

    
    
}

?>

<div class="row"><!-- row 1 begin -->
<div class="col-lg-12"><!-- col-lg-12 begin -->
    <ol class="breadcrumb"><!-- breadcrumb begin -->
        <li>
            
            <i class="fa fa-dashboard"></i> Dashboard / Send Mail to Subscriber
            
        </li>
    </ol><!-- breadcrumb finish -->
</div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
<div class="col-lg-12"><!-- col-lg-12 begin -->
    <div class="panel panel-default"><!-- panel panel-default begin -->
        <div class="panel-heading"><!-- panel-heading begin -->
            <h3 class="panel-title"><!-- panel-title begin -->
            
                <i class="fa fa-pencil fa-fw"></i> Send Mail to Subscriber
            
            </h3><!-- panel-title finish -->
        </div><!-- panel-heading finish -->
        
        <div class="panel-body"><!-- panel-body begin -->
            <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                       Email
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input value=" <?php echo $sub_email ?> " name="sub_email" type="text" class="form-control">
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                       Write You mail
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <textarea type='text' name="mail" class="form-control"></textarea>
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                         
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input value="Update Box" name="send" type="submit" class="form-control btn btn-primary">
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
            </form><!-- form-horizontal finish -->
        </div><!-- panel-body finish -->
        
    </div><!-- panel panel-default finish -->
</div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<!--<script src="js/tinymce/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea'});</script> -->

<?php  

      if(isset($_POST['send'])){
          
          $sub_email = $_POST['sub_email'];
          
          $mail = $_POST['mail'];
          $subject = "Welcome to my website";

          if(mail($sub_email,$subject,$mail)){
                            
            
           
             echo "<script>alert('Your mail Has been sent to the subscriber')</script>";
             echo "<script>window.open('index.php?view_subscribers','_self')</script>";
            
            }

          
         
          
             
              
          }
          
      

?>


