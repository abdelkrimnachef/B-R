<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View FeedBacks & question
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> pending FeedBacks
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_fbs = "select * from feedbacks where type='fb' AND answer='pending'";
        
                    $run_fbs = mysqli_query($con,$get_fbs);
                    $count=mysqli_num_rows($run_fbs);   
                    if($count==0){
                        echo "No FeedBacks";
                    }else{
        
                    while($row_fbs=mysqli_fetch_array($run_fbs)){
                        
                        $fb_id = $row_fbs['fb_id'];
                        
                        $fb_question = $row_fbs['question'];
                        
                
                ?>
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $fb_question; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                          
                                
                                <a href="index.php?delete_fb=<?php echo $fb_id; ?>" class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i> Delete
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?answer_fb=<?php echo $fb_id; ?>" class="pull-left"><!-- pull-left begin -->
                                
                                <i class="fa fa-reply"></i> Answer 
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div> 
                                
                            </center><!-- center finish -->
                           
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } } ?>
            
            </div><!-- panel-body finish -->
        </div><!-- col-lg-3 col-md-3 finish -->
    </div><!-- panel-body finish -->
</div><!-- row 2 finish -->
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> Answered FeedBacks
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_fbs = "select * from feedbacks where type ='fb' AND answer!='pending'";
        
                    $run_fbs = mysqli_query($con,$get_fbs);
        
                    while($row_fbs=mysqli_fetch_array($run_fbs)){
                        
                        $fb_id = $row_fbs['fb_id'];
                        
                        $fb_question = $row_fbs['question'];
                        
                
                ?>
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $fb_question; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                          
                                
                                <a href="index.php?delete_fb=<?php echo $fb_id; ?>" class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i> Delete
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?answer_fb=<?php echo $fb_id; ?>" class="pull-left"><!-- pull-left begin -->
                                
                                <i class="fa fa-reply"></i> Answer 
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div> 
                                
                            </center><!-- center finish -->
                           
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } ?>
            
            </div><!-- panel-body finish -->
        </div><!-- col-lg-3 col-md-3 finish -->
        </div><!-- panel-body finish -->
</div><!-- panel panel-default finish -->
<br>
<hr>
<br>
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> pending Questions
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_fbs = "select * from feedbacks where type='qst' AND answer='pending'";
        
                    $run_fbs = mysqli_query($con,$get_fbs);
                    $count=mysqli_num_rows($run_fbs);   
                    if($count==0){
                        echo "No FeedBacks";
                    }else{
        
                    while($row_fbs=mysqli_fetch_array($run_fbs)){
                        
                        $fb_id = $row_fbs['fb_id'];
                        
                        $fb_question = $row_fbs['question'];
                        
                
                ?>
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $fb_question; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                          
                                
                                <a href="index.php?delete_fb=<?php echo $fb_id; ?>" class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i> Delete
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?answer_fb=<?php echo $fb_id; ?>" class="pull-left"><!-- pull-left begin -->
                                
                                <i class="fa fa-reply"></i> Answer 
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div> 
                                
                            </center><!-- center finish -->
                           
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } } ?>
            
            </div><!-- panel-body finish -->
        </div><!-- col-lg-3 col-md-3 finish -->
    </div><!-- panel-body finish -->
</div><!-- row 2 finish -->
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> Answered Questions
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_fbs = "select * from feedbacks where type ='qst' AND answer!='pending'";
        
                    $run_fbs = mysqli_query($con,$get_fbs);
        
                    while($row_fbs=mysqli_fetch_array($run_fbs)){
                        
                        $fb_id = $row_fbs['fb_id'];
                        
                        $fb_question = $row_fbs['question'];
                        
                
                ?>
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $fb_question; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                          
                                
                                <a href="index.php?delete_fb=<?php echo $fb_id; ?>" class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i> Delete
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?answer_fb=<?php echo $fb_id; ?>" class="pull-left"><!-- pull-left begin -->
                                
                                <i class="fa fa-reply"></i> Answer 
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div> 
                                
                            </center><!-- center finish -->
                           
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } ?>
            
            </div><!-- panel-body finish -->
        </div><!-- col-lg-3 col-md-3 finish -->
        </div><!-- panel-body finish -->
</div><!-- panel panel-default finish -->
<?php } ?>