<?php 
$active='Home';
include("includes/header.php");
?>

<button onclick="topFunction()" id="myBtn" title="Go to top"> <center><i class="fa fa-arrow-up"> </i> </center></button>
<!--<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>

<script src="./dark.js"></script> -->
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

   <div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               <?php
              
              $ip_add = getRealIpUser();
               $select_visitors = "select * from visitors where ip_add='$ip_add'";
            $run_select_visitors =mysqli_query($con,$select_visitors);
            $count_visitors = mysqli_num_rows($run_select_visitors);
                if($count_visitors==0){
                $count_visitors = $count_visitors +1;

                $insert_visitor = "insert into visitors (visitor_id,ip_add) values ('$count_visitors','$ip_add')";
                $run_visitor = mysqli_query($con,$insert_visitor);
                }
               ?>
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                   <?php 
                   $get_slides = "select * from slider LIMIT 0,1";
                   $run_slides = mysqli_query($con,$get_slides);
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];
                       echo "
                       <div class='item active'>
                       <a href='$slide_url'>
                       <img src='admin_area/slides_images/$slide_image'>
                       </a>
                       </div> ";
                       
                   }
                   $get_slides = "select * from slider LIMIT 1,3";
                   $run_slides = mysqli_query($con,$get_slides);
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];
                       echo "
                       <div class='item'>
                        <a href='$slide_url'>
                       <img src='admin_area/slides_images/$slide_image'>
                       </a>
                       </div> ";
                       
                   }
                   ?>
                   
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->
   
   <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->

           <?php 
           
           $get_boxes = "select * from boxes_section";
           $run_boxes = mysqli_query($con,$get_boxes);

           while($run_boxes_section=mysqli_fetch_array($run_boxes)){

            $box_id = $run_boxes_section['box_id'];
            $box_title = $run_boxes_section['box_title'];
            $box_desc = $run_boxes_section['box_desc'];
           
           ?>
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#"><?php echo $box_title; ?></a></h3>
                       
                       <p> <?php echo $box_desc; ?> </p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->

            <?php    } ?>
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->

   
    <div id="hot"> <!-- hot begin -->
       <div class="box"><!-- box beggin -->
           <div class="container"><!-- container beggin -->
             <div class="col-md-12"><!-- col-md-12 begggin -->
                <h2>Our Latest Books</h2>
             </div><!-- col-md-12 Finish -->    
           </div><!-- container Finish -->
       </div><!-- box Finish -->
    </div> <!-- hot finish -->
    <div id="content" class="container"><!-- contyainer beggin -->
       <div class="row"><!-- row finish -->
           <?php   getbook();       ?>
       </div><!-- row finish -->
       
        
    </div><!-- contyainer finish -->
    <div id="hot"> <!-- hot begin -->
       <div class="box"><!-- box beggin -->
           <div class="container"><!-- container beggin -->
             <div class="col-md-12"><!-- col-md-12 begggin -->
                <h2 style="color: red">Our Sales</h2>
             </div><!-- col-md-12 Finish -->    
           </div><!-- container Finish -->
       </div><!-- box Finish -->
    </div> <!-- hot finish -->
    <div id="content" class="container"><!-- contyainer beggin -->
       <div class="row"><!-- row finish -->
           <?php   getsalebook();       ?>
       </div><!-- row finish -->
       
        
    </div><!-- contyainer finish -->
     
      <?php 
      include("includes/footer.php");    
        ?>
                  
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>
</html>
<!--test ************************************-->
