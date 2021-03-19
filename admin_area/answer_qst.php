
<?php 

if(isset($_GET['answer_qst'])){
    
    $msg_id = $_GET['answer_qst'];
    
    $msg_query = "select * from messages where msg_id='$msg_id'";
    
    $run_msg = mysqli_query($con,$msg_query);
    
    $row_msg = mysqli_fetch_array($run_msg);
   
    $name = $row_msg['name'];
    $email = $row_msg['email'];
    $sjt = $row_msg['sjt'];
    $msg = $row_msg['msg'];
    
}

?>

<div class="row"><!-- row 1 begin -->
<div class="col-lg-12"><!-- col-lg-12 begin -->
    <ol class="breadcrumb"><!-- breadcrumb begin -->
        <li>
            
            <i class="fa fa-dashboard"></i> Dashboard / Replay A Message
            
        </li>
    </ol><!-- breadcrumb finish -->
</div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
<div class="col-lg-12"><!-- col-lg-12 begin -->
    <div class="panel panel-default"><!-- panel panel-default begin -->
        <div class="panel-heading"><!-- panel-heading begin -->
            <h3 class="panel-title"><!-- panel-title begin -->
            
                <i class="fa fa-pencil fa-fw"></i> Replay A Message
            
            </h3><!-- panel-title finish -->
        </div><!-- panel-heading finish -->
        
        <div class="panel-body"><!-- panel-body begin -->
            <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                <div class="form-group"><!-- form-group begin -->
                
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        Message
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input value="<?php echo $msg; ?> " name="msg" type="text" class="form-control">
                    
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
       
    
          $update_answer = "update messages set answer='$answer' where msg_id='$msg_id'";
          
          $run_answer = mysqli_query($con,$update_answer);
          
          if($run_answer){
            $sjt = "Re: $sjt";
            $answer = "Hey $name You have been contacted us and this is ur mail : 《 $msg 》.  we are the B&R Team And Your Answer Is :  $answer .";
           if(mail($email,$sjt,$answer)){
            echo "<script>alert('You Replied The Question')</script>";
              
            echo "<script>window.open('index.php?view_qsts','_self')</script>";
             }
              
            
          }
          
      }

?>


