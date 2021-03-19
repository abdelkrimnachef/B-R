<?php 
$active='faq';
include("includes/header.php");
?>
   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="index.php">Home</a></li>
                  <li>
                      FAQ
                  </li>
              </ul><!-- breadcumb finnish -->
            </div><!--col-md-12 Finish -->
          
            <div class="col-md-12"><!--col-md-9 beggin -->
                <div class="box"><!--box beggin -->
                    <div class="box-header"><!--box-header beggin -->
                        <center>
                            <h2>Frequent Asked Question</h2>
                            <p class="text-muted">  Here You Can ASk Any Question & See All Most Important & Frequent Question   </p>
                        </center>
                        <form action="faq.php" method="post">
                            <div class="form-group"><!--form-group beggin -->
                                <label>You Question :</label>
                                <input type="text" class="form-control" name="qst" required>
                            </div><!--form-group finish-->
                            
                            <div class="text-center"><!--text-center begin-->
                                <button style="margin-bottom: 10px;" type="submit" name="s-qst" class="btn btn-primary"><!--btn btn-primary begin-->
                                    <i class="fa fa-user-md"></i> Send Question
                                </button><!--btn btn-primary finish-->
                             </div><!--text-center finish-->
                        </form>
                        <div class='row'>
                            
                             <form action="faq.php" method="$_GET" >
                                <center>  
                                     <input class="btn btn-secondary" type="submit" name="all_qsts" value="See All Questions">
                                </center>
                                <?php 
                                    if(isset($_GET["all_qsts"])){
                                        
                                        include("all_qsts.php");
                                     }

                                ?>
                            </form>
                        </div>
                     </div>
                </div>
                                

             
           
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>FeedBacks</h2>
                            <p class="text-muted"> Please Give Us Some FeedBacks</p>
                        </center>
                        <form action="faq.php" method="post">
                            <div class="form-group"><!--form-group beggin -->
                                <label>You feedback :</label>
                                <input type="text" class="form-control" name="fb" required>
                            </div><!--form-group finish-->
                       
                            <div class="text-center"><!--text-center begin-->
                                <button style="margin-bottom: 10px;" type="submit" name="s-fb" class="btn btn-primary"><!--btn btn-primary begin-->
                                    <i class="fa fa-user-md"></i> Send FeedBack
                                </button><!--btn btn-primary finish-->
                            </div><!--text-center finish-->
                        </form>
                        <div class='row'>
                            <form action="faq.php" method="$_GET" >
                                <center>   
                                    <input class="btn btn-secondary" type="submit" name="all_fbs" value="See All FeedBacks">  
                                </center>
                                 <?php 
                                    if(isset($_GET["all_fbs"])){
                                        include("all_fbs.php");
                                    }

                                ?>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
       </div><!-- container Finish -->
    </div><!-- content Finish -->
    <?php
        if(isset($_POST['s-qst'])){
            $qst = $_POST['qst'];
            $insert_qst ="INSERT INTO `feedbacks` (`type`, `question`, `answer`) VALUES ('qst', '$qst', 'pending')";
            $run_insert = mysqli_query($con,$insert_qst); 
            if($run_insert){
                echo "<script>alert('Your Question Will Be Answered Later Thnx')</script>";
                }
        }
    ?>
    <?php
        if(isset($_POST['s-fb'])){
            $qst = $_POST['fb'];
            $insert_qst ="INSERT INTO `feedbacks` (`type`, `question`, `answer`) VALUES ('fb', '$qst', 'pending')";
            $run_insert = mysqli_query($con,$insert_qst); 
            if($run_insert){
            echo "<script>alert('Thanx For Your FeedBack')</script>";
            }
        }
    ?>


    <?php include("includes/footer.php");    ?>
       
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>