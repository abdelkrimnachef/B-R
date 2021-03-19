<?php 
$active = "home";
include("includes/header.php");
?>
   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
               
                  <li><a href="index.php">Home</a></li>
                  <li>
                      Terms & Condition | Redund
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
           <div class="col-md-3"><!--col-md-3 begin-->
              <div class="panel panel-default sidebar-menu"><!--nav nav-pills nav-stacked category-menu begin-->
                  <ul class="nav nav-pills nav-stacked"><!--nav nav-pills nav-stacked begin-->
                     <?php 
                  $get_terms = "select * from terms LIMIT 0,1";
                  $run_terms = mysqli_query($con,$get_terms);
                  while($row_terms=mysqli_fetch_array($run_terms)){
                   $term_title = $row_terms['term_title']; 
                   $term_link = $row_terms['term_link'];   
                     
                  ?>
                  <li class="active">
                   <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                        <?php  echo $term_title;  ?>
                   </a>
                  </li>
                      <?php } ?> 
                    <?php 
                      $count_terms = "select * from terms";
                      $run_count_terms = mysqli_query($con,$count_terms);
                      $count = mysqli_num_rows($run_count_terms);
                      $get_terms = "select * from terms LIMIT 1,$count";
                      $run_terms = mysqli_query($con,$get_terms);
                      while($row_terms=mysqli_fetch_array($run_terms)){
                          $term_title = $row_terms['term_title'];
                          $term_link = $row_terms['term_link'];
                       
                      
                      ?>
                         
                         <li>
                   <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                        <?php  echo $term_title;  ?>
                   </a>
                  </li>
                  <?php } ?>
                  </ul><!--nav nav-pills nav-stacked finish-->
              </div><!--box finish-->
           </div><!--col-md-3 finish-->
          

           <div class="col-md-9"><!--col-md-9 begon-->
               <div class="box"><!--box begin-->
                 
                       <div class="tab-content"><!--tab-content begon-->
                     
                       <?php
                      $get_terms = "select * from terms LIMIT 0,1";
                      $run_terms = mysqli_query($con,$get_terms);
                      while($row_terms=mysqli_fetch_array($run_terms)){
                       $term_title = $row_terms['term_title']; 
                       $term_link = $row_terms['term_link'];
                        $term_desc = $row_terms['term_desc'];
                        
                       ?>
                       <div id="<?php echo $term_link; ?>" class="tab-pane fade in active"><!--tab-pane fade in avtive begin-->
                           <h1 class="tabTitle"><?php echo $term_title; ?></h1>
                           <p class="tabDesc"><?php echo $term_desc; ?></p>
                           
                       </div><!--tab-pane fade in avtive finish-->
                       
                       <?php }?>
                       <?php 
                      $count_terms = "select * from terms";
                      $run_count_terms = mysqli_query($con,$count_terms);
                      $count = mysqli_num_rows($run_count_terms);
                      $get_terms = "select * from terms LIMIT 1,$count";
                      $run_terms = mysqli_query($con,$get_terms);
                      
                      while($row_terms=mysqli_fetch_array($run_terms)){
                          $term_title = $row_terms['term_title'];
                          $term_desc = $row_terms['term_desc'];
                          $term_link = $row_terms['term_link'];
                      
                      ?>
                        <div id="<?php echo $term_link; ?>" class="tab-pane fade in "><!--tab-pane fade in avtive begin-->
                           <h1 class="tabTitle"><?php echo $term_title; ?></h1>
                           <p class="tabDesc"><?php echo "$term_desc"; ?></p>
                           
                       </div><!--tab-pane fade in avtive finish-->
                      <?php } ?>
                        
                     
                   </div><!--tab-content finish-->
                  
               </div><!--nav nav-pills nav-stacked category-menu finish-->
           </div><!--col-md-9 finish-->
     </div><!-- container finish -->
</div><!-- content finish -->
    <?php include("includes/footer.php"); ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>