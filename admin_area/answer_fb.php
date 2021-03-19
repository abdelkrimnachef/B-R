
<?php 

if(isset($_GET['answer_fb'])){
    
    $fb_id = $_GET['answer_fb'];
    
    $fb_query = "select * from feedbacks where fb_id='$fb_id'";
    
    $run_fb = mysqli_query($con,$fb_query);
    
    $row_fb = mysqli_fetch_array($run_fb);
   
     $question = $row_fb['question'];
     $answer = $row_fb['answer'];

    
}

?>

<div class="row"><!-- row 1 begin -->
<div class="col-lg-12"><!-- col-lg-12 begin -->
    <ol class="breadcrumb"><!-- breadcrumb begin -->
        <li>
            
            <i class="fa fa-dashboard"></i> Dashboard / Replay An feedback
            
        </li>
    </ol><!-- breadcrumb finish -->
</div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
<div class="col-lg-12"><!-- col-lg-12 begin -->
    <div class="panel panel-default"><!-- panel panel-default begin -->
        <div class="panel-heading"><!-- panel-heading begin -->
            <h3 class="panel-title"><!-- panel-title begin -->
            
                <i class="fa fa-pencil fa-fw"></i> Replay An feedback
            
            </h3><!-- panel-title finish -->
        </div><!-- panel-heading finish -->
        
        <div class="panel-body"><!-- panel-body begin -->
            <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        Question
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input value="<?php echo $question; ?> " name="question" type="text" class="form-control">
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
                
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        Answer
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <textarea type='text' name="answer" value="<?php echo $answer; ?> " class="form-control"></textarea>
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                         
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input value="Update Answer" name="s-answer" type="submit" class="form-control btn btn-primary">
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
            </form><!-- form-horizontal finish -->
        </div><!-- panel-body finish -->
     <!--  <script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>-->
    </div><!-- panel panel-default finish -->
</div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

      if(isset($_POST['s-answer'])){
          $answer = $_POST['answer'];
          $update_answer = "update feedbacks set answer='$answer' where fb_id='$fb_id'";
          
          $run_answer = mysqli_query($con,$update_answer);
          
          if($run_answer){
              
              echo "<script>alert('You Answered The Question / Feedback')</script>";
              
              echo "<script>window.open('index.php?view_fbs','_self')</script>";
              
          }
          
      }

?>


