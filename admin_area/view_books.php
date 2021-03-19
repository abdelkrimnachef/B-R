<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
       
        
 ?>
      
   <div class="row"><!--row begin-->
       <div class="col-lg-12"><!--col-lg-12 begin-->
           <ol class="breadcrumb"><!--breadcrumb begin-->
               <li class="active"><!--active begin-->
                 <i class="fa fa-dashboard">Dashboard / View Books</i>  
               </li><!--active finish-->
           </ol><!--breadcrumb finish-->
       </div><!--col-lg-12 finish-->
   </div>  <!--row finish-->
    
<div class="row"><!-- row 2 begin -->
<form method="post" class="form-horizontal" enctype="multipart/form-data">

    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Books
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
            <div class="form-group">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <br>
                        <div class="form-group"><!--form-group begin-->
                                <div class="col-md-1"></div>
                                <label class="col-md-3 control-label">Search By Name Or ISBN</label>
                                <div class="col-md-3"><!--col-md-6 begin-->
                                    <input name="s-book" type="text" class="form-control" required >
                                </div><!--col-md-6 finish-->
                                <div class="col-md-2"><!--col-md-6 begin-->
                                  <input name="submit" type="submit" value="Search Books "  class="btn btn-primary form-control">
                                </div>
                         </div><!--form-group finish-->
            </form>
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                         
                            <form method="post">
                                <div class="form-group"><!--form-group begin-->
                                    <div class="col-md-1"></div>
                                        <label class="col-md-3 control-label">Search Less Than </label>
                                        <div class="col-md-3"><!--col-md-6 begin-->
                                            <input name="s-qty" type="text" class="form-control" required >
                                        </div><!--col-md-6 finish-->
                                        <div class="col-md-2"><!--col-md-6 begin-->
                                        <input name="s-noqty" type="submit" value="Search By Quantity "  class="btn btn-primary form-control">
                                    </div>
                                </div>       
                               
                        
                          </form>
                        
                        
                        
                </form>
                  
                    
                    <div class="col-md-2"></div>
                    <form method="post">
                        
                             <div class="col-md-2"><!--col-md-6 begin--> <br>
                                  <input name="s-least" type="submit" value="least Selles "  class="btn btn-primary form-control">
                            </div>   
                    </form>
                    <form method="post">
                                <div class="col-md-2"><!--col-md-6 begin--> <br>
                                  <input name="s-best" type="submit" value="best Sells "  class="btn btn-primary form-control">
                                </div>
                    </form>
                    <form method="post">
                                <div class="col-md-2"><!--col-md-6 begin-->  <br>
                                  <input name="s-news" type="submit" value="New "  class="btn btn-primary form-control">
                                </div>
                    </form>            
                    <form method="post">
                                <div class="col-md-2"><!--col-md-6 begin--> <br>
                                  <input name="s-sales" type="submit" value=" Sales "  class="btn btn-primary form-control">
                                </div>
                  
                        </div>
                
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No  </th>
                                <th> <small> Book</small> Title: </th>
                                <th> <small> Book</small> ISBN: </th>
                                <th> QTY: </th>
                                <th> Add/Remove <small>QTY</small> </th>
                             <!--   <th> Author: </th>-->
                            <!--    <th> <small> Book</small> Category: </th> -->
                             <!--   <th> <small> Book</small> Language: </th>-->
                             <!--   <th> <small> Book</small> Image: </th> -->
                                <th> Sale & Price <small>Da</small></th>
                                <th> <small> Book</small> Price:<small> Da </small></th>
                                <th> <small> Book</small> Sold: </th>
                            <!--    <th> <small> Book</small> Keywords: </th>-->
                         <!--   <th> <small> Book</small> Date: </th>  -->
                                 <th> View <small> Book</small>: </th>
                                <th> <small> Book</small> Delete: </th>
                                <th> <small> Book</small> Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                               if(!isset($_POST['submit']) and !isset($_POST['s-best']) and !isset($_POST['s-least'])  and !isset($_POST['s-noqty'])  and !isset($_POST['s-sales']) and !isset($_POST['s-news'])){ 

                                $i=0;
                            
                                $get_book = "select * from books order by book_title ASC";
                                
                                $run_book = mysqli_query($con,$get_book);
          
                                while($row_book=mysqli_fetch_array($run_book)){
                                    
                                    $book_id = $row_book['book_id'];
                                    
                                    $author_id = $row_book['author_id'];

                                    $b_cat_id = $row_book['b_cat_id'];

                                    $lang_id = $row_book['lang_id'];
                                    
                                    $book_title = $row_book['book_title'];
                                    
                                    $book_img1 = $row_book['book_img1'];
                                    
                                    $book_price = $row_book['book_price'];
                                    
                                    $book_keywords = $row_book['book_keywords'];
                                    
                                    $book_date = $row_book['date'];
                                    
                                    $book_label = $row_book['book_label'];

                                    $book_sale = $row_book['book_sale'];

                                    $isbn = $row_book['isbn'];

                                    $qty = $row_book['qty'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $book_title; ?> </td>
                                <td> <?php echo $isbn; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
                                     
                                        <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
                                    
                                     </a> 
                                     
                                </td>
                              <!--  <td>
                                  // <?php 
                                    
                                   // $get_author = "select * from authors where author_id='$author_id'";
                                
                               ////     $run_author = mysqli_query($con,$get_author);
                                  //  while($row_author=mysqli_fetch_array($run_author)){
                                  //      $author_name = $row_author['author_name'];
                                  //      echo $author_name;

                                 //   }
                                    
                                
                                   
                                
                                 ?> 
                                </td>-->
                             <!--   <td> -->
                                  <?php 
                                    
                                 //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
                                
                                   // $run_b_cat = mysqli_query($con,$get_b_cat);
                                    //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
                                       // $b_cat_title = $row_b_cat['b_cat_title'];
                                        //echo $b_cat_title;

                                    //}
                                    
                                
                                   
                                
                                 ?> 
                                </td>
                                <!-- <td>
                                  //  <?php 
                                    
                                 //   $get_lang = "select * from languages where lang_id='$lang_id'";
                                
                                  //  $run_lang = mysqli_query($con,$get_lang);
                                  // while($row_lang=mysqli_fetch_array($run_lang)){
                                   //     $lang_title = $row_lang['lang_title'];
                                   //     echo $lang_title;

                                  //  }
                                    
                                
                                   
                                
                                 ?> 
                                </td>-->
                             <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->

                                <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
                                <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
                                
                                <td> <?php 
                                    
                                        $get_sold = "select * from orders where book_id='$book_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                        $sold= 0;
                                    
                                        while($row_sold=mysqli_fetch_array($run_sold)){
                                            $sold= $sold + $row_sold['qty'];

                                        }
                                    
                                        echo $sold;
                                    
                                     ?> 
                                </td>
                                
                             <!--   <td> <?php echo $book_keywords; ?> </td> -->
                                <!--       <td> <?php echo $book_date ?> </td> -->
                                <td> 
                                            
                                            <a href="index.php?view_book=<?php echo $book_id; ?>">
                                            
                                                <i class="fa fa-eye"></i> View
                                            
                                            </a> 
                                            
                                        </td>
                                        <td> 
                                            
                                            <a href="index.php?delete_book=<?php echo $book_id; ?>" >
                                            
                                                <i class="fa fa-trash-o"></i> Delete
                                            
                                            </a> 
                                            
                                        </td>
                                        <td> 
                                            
                                            <a href="index.php?edit_book=<?php echo $book_id; ?>">
                                            
                                                <i class="fa fa-pencil"></i> Edit
                                            
                                            </a> 
                                            
                                        </td>
                                    </tr><!-- tr finish -->
                                    
                                    <?php } }
                                    //----------------------------------------------------------------------------------------------------
                                    if(isset($_POST['submit']) and !isset($_POST['s-best']) and !isset($_POST['s-least'])  and !isset($_POST['s-noqty'])  and !isset($_POST['s-sales']) and !isset($_POST['s-news'])){ 



                                        $search = $_POST['s-book'];
                                        $i=0;
                                    
                                        $get_book = "select * from books where book_title like '%$search%' OR isbn like '%$search%' OR book_keywords like '%$search%' order by book_title ASC ";
                                        
                                        $run_book = mysqli_query($con,$get_book);
                                        $count = mysqli_num_rows($run_book);
                                        if($count!=0){
                
                                        while($row_book=mysqli_fetch_array($run_book)){
                                            
                                            $book_id = $row_book['book_id'];
                                            
                                            $author_id = $row_book['author_id'];

                                            $b_cat_id = $row_book['b_cat_id'];

                                            $lang_id = $row_book['lang_id'];
                                            
                                            $book_title = $row_book['book_title'];
                                            
                                            $book_img1 = $row_book['book_img1'];
                                            
                                            $book_price = $row_book['book_price'];
                                            
                                            $book_keywords = $row_book['book_keywords'];
                                            
                                            $book_date = $row_book['date'];
                                            
                                            $book_label = $row_book['book_label'];

                                            $book_sale = $row_book['book_sale'];

                                            $isbn = $row_book['isbn'];

                                            $qty = $row_book['qty'];
                                            
                                            $i++;
                                        
                                    ?>
                                    
                                    <tr><!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $book_title; ?> </td>
                                        <td> <?php echo $isbn; ?> </td>
                                        <td> <?php echo $qty; ?> </td>
                                        <td> 
                                            
                                            <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
                                            
                                                <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
                                            
                                            </a> 
                                            
                                        </td>
                                    <!--  <td>
                                        // <?php 
                                            
                                        // $get_author = "select * from authors where author_id='$author_id'";
                                        
                                    ////     $run_author = mysqli_query($con,$get_author);
                                        //  while($row_author=mysqli_fetch_array($run_author)){
                                        //      $author_name = $row_author['author_name'];
                                        //      echo $author_name;

                                        //   }
                                            
                                        
                                        
                                        
                                        ?> 
                                        </td>-->
                                    <!--   <td> -->
                                        <?php 
                                            
                                        //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
                                        
                                        // $run_b_cat = mysqli_query($con,$get_b_cat);
                                            //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
                                            // $b_cat_title = $row_b_cat['b_cat_title'];
                                                //echo $b_cat_title;

                                            //}
                                            
                                        
                                        
                                        
                                        ?> 
                                        </td>
                                        <!-- <td>
                                        //  <?php 
                                            
                                        //   $get_lang = "select * from languages where lang_id='$lang_id'";
                                        
                                        //  $run_lang = mysqli_query($con,$get_lang);
                                        // while($row_lang=mysqli_fetch_array($run_lang)){
                                        //     $lang_title = $row_lang['lang_title'];
                                        //     echo $lang_title;

                                        //  }
                                            
                                        
                                        
                                        
                                        ?> 
                                        </td>-->
                                    <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->

                                        <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
                                        <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
                                        
                                        <td> <?php 
                                    
                                    $get_sold = "select * from orders where book_id='$book_id'";
                                
                                    $run_sold = mysqli_query($con,$get_sold);
                                    $sold= 0;
                                
                                    while($row_sold=mysqli_fetch_array($run_sold)){
                                        $sold= $sold + $row_sold['qty'];

                                    }
                                
                                    echo $sold;
                                
                                 ?> 
                                        </td>
                                        
                                    <!--   <td> <?php echo $book_keywords; ?> </td> -->
                                <!--       <td> <?php echo $book_date ?> </td> -->
                                    <td> 

                                            
                                            <a href="index.php?view_book=<?php echo $book_id; ?>">
                                            
                                        <i class="fa fa-eye"></i> View
                                    
                                     </a> 
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?delete_book=<?php echo $book_id; ?>" >
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_book=<?php echo $book_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } } }


//<!-------------------------------------------------------------------------------------------------------------------------------------
if(!isset($_POST['submit']) and !isset($_POST['s-best']) and !isset($_POST['s-least'])  and isset($_POST['s-noqty'])  and !isset($_POST['s-sales']) and !isset($_POST['s-news'])){ 

    $i=0;
    $num = $_POST['s-qty'];
    $get_book = "select * from books where qty<='$num' order by book_title ASC ";
    
    $run_book = mysqli_query($con,$get_book);

    while($row_book=mysqli_fetch_array($run_book)){
        
        $book_id = $row_book['book_id'];
        
        $author_id = $row_book['author_id'];

        $b_cat_id = $row_book['b_cat_id'];

        $lang_id = $row_book['lang_id'];
        
        $book_title = $row_book['book_title'];
        
        $book_img1 = $row_book['book_img1'];
        
        $book_price = $row_book['book_price'];
        
        $book_keywords = $row_book['book_keywords'];
        
        $book_date = $row_book['date'];
        
        $book_label = $row_book['book_label'];

        $book_sale = $row_book['book_sale'];

        $isbn = $row_book['isbn'];

        $qty = $row_book['qty'];
        
        $i++;

?>

<tr><!-- tr begin -->
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $book_title; ?> </td>
    <td> <?php echo $isbn; ?> </td>
    <td> <?php echo $qty; ?> </td>
    <td> 
         
         <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
         
            <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
        
         </a> 
         
    </td>
  <!--  <td>
      // <?php 
        
       // $get_author = "select * from authors where author_id='$author_id'";
    
   ////     $run_author = mysqli_query($con,$get_author);
      //  while($row_author=mysqli_fetch_array($run_author)){
      //      $author_name = $row_author['author_name'];
      //      echo $author_name;

     //   }
        
    
       
    
     ?> 
    </td>-->
 <!--   <td> -->
      <?php 
        
     //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
    
       // $run_b_cat = mysqli_query($con,$get_b_cat);
        //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
           // $b_cat_title = $row_b_cat['b_cat_title'];
            //echo $b_cat_title;

        //}
        
    
       
    
     ?> 
    </td>
    <!-- <td>
      //  <?php 
        
     //   $get_lang = "select * from languages where lang_id='$lang_id'";
    
      //  $run_lang = mysqli_query($con,$get_lang);
      // while($row_lang=mysqli_fetch_array($run_lang)){
       //     $lang_title = $row_lang['lang_title'];
       //     echo $lang_title;

      //  }
        
    
       
    
     ?> 
    </td>-->
 <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->

    <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
    <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
    
    <td> <?php 
                                    
                                    $get_sold = "select * from orders where book_id='$book_id'";
                                
                                    $run_sold = mysqli_query($con,$get_sold);
                                    $sold= 0;
                                
                                    while($row_sold=mysqli_fetch_array($run_sold)){
                                        $sold= $sold + $row_sold['qty'];

                                    }
                                
                                    echo $sold;
                                
                                 ?> 
    </td>
    
 <!--   <td> <?php echo $book_keywords; ?> </td> -->
<!--       <td> <?php echo $book_date ?> </td> -->
<td> 
         
         <a href="index.php?view_book=<?php echo $book_id; ?>">
         
            <i class="fa fa-eye"></i> View
        
         </a> 
        
    </td>
    <td> 
         
         <a href="index.php?delete_book=<?php echo $book_id; ?>" >
         
            <i class="fa fa-trash-o"></i> Delete
        
         </a> 
         
    </td>
    <td> 
         
         <a href="index.php?edit_book=<?php echo $book_id; ?>">
         
            <i class="fa fa-pencil"></i> Edit
        
         </a> 
        
    </td>
</tr><!-- tr finish -->



      <?php }} 

//-----------------------------------------------------------------------------------------------------                                    

if(!isset($_POST['submit']) and !isset($_POST['s-best']) and !isset($_POST['s-least'])  and !isset($_POST['s-noqty'])  and !isset($_POST['s-sales']) and isset($_POST['s-news'])){ 
    $i = 1;

    $get_book = "select * from books where book_label='new'order by book_title ASC";
    
    $run_book = mysqli_query($con,$get_book);

    while($row_book=mysqli_fetch_array($run_book)){
        
        $book_id = $row_book['book_id'];
        
        $author_id = $row_book['author_id'];

        $b_cat_id = $row_book['b_cat_id'];

        $lang_id = $row_book['lang_id'];
        
        $book_title = $row_book['book_title'];
        
        $book_img1 = $row_book['book_img1'];
        
        $book_price = $row_book['book_price'];
        
        $book_keywords = $row_book['book_keywords'];
        
        $book_date = $row_book['date'];
        
        $book_label = $row_book['book_label'];

        $book_sale = $row_book['book_sale'];

        $isbn = $row_book['isbn'];

        $qty = $row_book['qty'];
        
        $i++;
        
        
          
                                    
            $get_sold = "select * from orders where book_id='$book_id'";
        
            $run_sold = mysqli_query($con,$get_sold);
            $sold= 0;
        
            while($row_sold=mysqli_fetch_array($run_sold)){
                $sold= $sold + $row_sold['qty'];

            }
        
           
        
         
        
         
        
         

?>

<tr><!-- tr begin -->
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $book_title; ?> </td>
    <td> <?php echo $isbn; ?> </td>
    <td> <?php echo $qty; ?> </td>
    <td> 
         
         <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
         
            <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
        
         </a> 
         
    </td>
  <!--  <td>
      // <?php 
        
       // $get_author = "select * from authors where author_id='$author_id'";
    
   ////     $run_author = mysqli_query($con,$get_author);
      //  while($row_author=mysqli_fetch_array($run_author)){
      //      $author_name = $row_author['author_name'];
      //      echo $author_name;

     //   }
        
    
       
    
     ?> 
    </td>-->
 <!--   <td> -->
      <?php 
        
     //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
    
       // $run_b_cat = mysqli_query($con,$get_b_cat);
        //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
           // $b_cat_title = $row_b_cat['b_cat_title'];
            //echo $b_cat_title;

        //}
        
    
       
    
     ?> 
    </td>
    <!-- <td>
      //  <?php 
        
     //   $get_lang = "select * from languages where lang_id='$lang_id'";
    
      //  $run_lang = mysqli_query($con,$get_lang);
      // while($row_lang=mysqli_fetch_array($run_lang)){
       //     $lang_title = $row_lang['lang_title'];
       //     echo $lang_title;

      //  }
        
    
       
    
     ?> 
    </td>-->
 <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->

    <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
    <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
    
    <td> <?php echo $sold ?> </td>
    
 <!--   <td> <?php echo $book_keywords; ?> </td> -->
<!--       <td> <?php echo $book_date ?> </td> -->
<td> 
         
         <a href="index.php?view_book=<?php echo $book_id; ?>">
         
            <i class="fa fa-eye"></i> View
        
         </a> 
        
    </td>
    <td> 
         
         <a href="index.php?delete_book=<?php echo $book_id; ?>" >
         
            <i class="fa fa-trash-o"></i> Delete
        
         </a> 
         
    </td>
    <td> 
         
         <a href="index.php?edit_book=<?php echo $book_id; ?>">
         
            <i class="fa fa-pencil"></i> Edit
        
         </a> 
        
    </td>
</tr><!-- tr finish -->



      <?php }} 
//-----------------------------------------------------------------------------------------------------                                    


if(!isset($_POST['submit']) and !isset($_POST['s-best']) and !isset($_POST['s-least'])  and !isset($_POST['s-noqty'])  and isset($_POST['s-sales']) and !isset($_POST['s-news'])){ 
    $i = 1;

    $get_book = "select * from books where book_label='sale' order by book_title ASC";
    
    $run_book = mysqli_query($con,$get_book);

    while($row_book=mysqli_fetch_array($run_book)){
        
        $book_id = $row_book['book_id'];
        
        $author_id = $row_book['author_id'];

        $b_cat_id = $row_book['b_cat_id'];

        $lang_id = $row_book['lang_id'];
        
        $book_title = $row_book['book_title'];
        
        $book_img1 = $row_book['book_img1'];
        
        $book_price = $row_book['book_price'];
        
        $book_keywords = $row_book['book_keywords'];
        
        $book_date = $row_book['date'];
        
        $book_label = $row_book['book_label'];

        $book_sale = $row_book['book_sale'];

        $isbn = $row_book['isbn'];

        $qty = $row_book['qty'];
        
        $i++;
        
       
                                    
                                        $get_sold = "select * from orders where book_id='$book_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                        $sold= 0;
                                    
                                        while($row_sold=mysqli_fetch_array($run_sold)){
                                            $sold= $sold + $row_sold['qty'];

                                        }
                                    
                                       
                                    
                                     
        
         
        
         

?>

<tr><!-- tr begin -->
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $book_title; ?> </td>
    <td> <?php echo $isbn; ?> </td>
    <td> <?php echo $qty; ?> </td>
    <td> 
         
         <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
         
            <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
        
         </a> 
         
    </td>
  <!--  <td>
      // <?php 
        
       // $get_author = "select * from authors where author_id='$author_id'";
    
   ////     $run_author = mysqli_query($con,$get_author);
      //  while($row_author=mysqli_fetch_array($run_author)){
      //      $author_name = $row_author['author_name'];
      //      echo $author_name;

     //   }
        
    
       
    
     ?> 
    </td>-->
 <!--   <td> -->
      <?php 
        
     //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
    
       // $run_b_cat = mysqli_query($con,$get_b_cat);
        //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
           // $b_cat_title = $row_b_cat['b_cat_title'];
            //echo $b_cat_title;

        //}
        
    
       
    
     ?> 
    </td>
    <!-- <td>
      //  <?php 
        
     //   $get_lang = "select * from languages where lang_id='$lang_id'";
    
      //  $run_lang = mysqli_query($con,$get_lang);
      // while($row_lang=mysqli_fetch_array($run_lang)){
       //     $lang_title = $row_lang['lang_title'];
       //     echo $lang_title;

      //  }
        
    
       
    
     ?> 
    </td>-->
 <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->

    <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
    <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
    
    <td> <?php echo $sold ?> </td>
    
 <!--   <td> <?php echo $book_keywords; ?> </td> -->
<!--       <td> <?php echo $book_date ?> </td> -->
<td> 
         
         <a href="index.php?view_book=<?php echo $book_id; ?>">
         
            <i class="fa fa-eye"></i> View
        
         </a> 
        
    </td>
    <td> 
         
         <a href="index.php?delete_book=<?php echo $book_id; ?>" >
         
            <i class="fa fa-trash-o"></i> Delete
        
         </a> 
         
    </td>
    <td> 
         
         <a href="index.php?edit_book=<?php echo $book_id; ?>">
         
            <i class="fa fa-pencil"></i> Edit
        
         </a> 
        
    </td>
</tr><!-- tr finish -->



      <?php }} 
                                    //----------------------------------------------------------------------------------------------------
                                    if(!isset($_POST['submit']) and !isset($_POST['s-best']) and isset($_POST['s-least'])  and !isset($_POST['s-noqty'])  and !isset($_POST['s-sales']) and !isset($_POST['s-news'])){ 

                                       $get_qty = "select book_id , sum(qty) as qty_book from orders group by book_id ORDER BY qty_book ASC";
                                        $run_qty = mysqli_query($con,$get_qty);
                                        while($row_qty = mysqli_fetch_array($run_qty)){
                                            $b_id = $row_qty['book_id'];
                                            $qty_book = $row_qty['qty_book'];

                                            $get_book = "select * from books where book_id='$b_id'";
                                            $run_book = mysqli_query($con,$get_book);
                                            
                                        while($row_book=mysqli_fetch_array($run_book)){
                                            
                                            $book_id = $row_book['book_id'];
                                            
                                            $author_id = $row_book['author_id'];

                                            $b_cat_id = $row_book['b_cat_id'];

                                            $lang_id = $row_book['lang_id'];
                                            
                                            $book_title = $row_book['book_title'];
                                            
                                            $book_img1 = $row_book['book_img1'];
                                            
                                            $book_price = $row_book['book_price'];
                                            
                                            $book_keywords = $row_book['book_keywords'];
                                            
                                            $book_date = $row_book['date'];
                                            
                                            $book_label = $row_book['book_label'];

                                            $book_sale = $row_book['book_sale'];

                                            $isbn = $row_book['isbn'];

                                            $qty = $row_book['qty'];
                                            
                                            @$i++;
                                    
                                    ?>
                                    
                                    <tr><!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $book_title; ?> </td>
                                        <td> <?php echo $isbn; ?> </td>
                                        <td> <?php echo $qty; ?> </td>
                                        <td> 
                                            
                                            <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
                                            
                                                <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
                                            
                                            </a> 
                                            
                                        </td>
                                    <!--  <td>
                                        // <?php 
                                            
                                        // $get_author = "select * from authors where author_id='$author_id'";
                                        
                                    ////     $run_author = mysqli_query($con,$get_author);
                                        //  while($row_author=mysqli_fetch_array($run_author)){
                                        //      $author_name = $row_author['author_name'];
                                        //      echo $author_name;

                                        //   }
                                            
                                        
                                        
                                        
                                        ?> 
                                        </td>-->
                                    <!--   <td> -->
                                        <?php 
                                            
                                        //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
                                        
                                        // $run_b_cat = mysqli_query($con,$get_b_cat);
                                            //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
                                            // $b_cat_title = $row_b_cat['b_cat_title'];
                                                //echo $b_cat_title;

                                            //}
                                            
                                        
                                        
                                        
                                        ?> 
                                        </td>
                                        <!-- <td>
                                        //  <?php 
                                            
                                        //   $get_lang = "select * from languages where lang_id='$lang_id'";
                                        
                                        //  $run_lang = mysqli_query($con,$get_lang);
                                        // while($row_lang=mysqli_fetch_array($run_lang)){
                                        //     $lang_title = $row_lang['lang_title'];
                                        //     echo $lang_title;

                                        //  }
                                            
                                        
                                        
                                        
                                        ?> 
                                        </td>-->
                                    <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->

                                        <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
                                        <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
                                        
                                        <td> <?php 
                                            
                                               
                                                echo $qty_book;
                                            
                                            ?> 
                                        </td>
                                        
                                    <!--   <td> <?php echo $book_keywords; ?> </td> -->
                                <!--       <td> <?php echo $book_date ?> </td> -->
                                    <td> 

                                            
                                            <a href="index.php?view_book=<?php echo $book_id; ?>">
                                            
                                        <i class="fa fa-eye"></i> View
                                    
                                     </a> 
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?delete_book=<?php echo $book_id; ?>" >
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_book=<?php echo $book_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php }; };} ?>

                  <?php //---------------------------------------------------------------------------------------------------- ?>
                      <?php              if(!isset($_POST['submit']) and isset($_POST['s-best']) and !isset($_POST['s-least'])  and !isset($_POST['s-noqty'])  and !isset($_POST['s-sales']) and !isset($_POST['s-news'])){ 

                                        $get_qty = "select book_id , sum(qty) as qty_book from orders group by book_id ORDER BY qty_book DESC";
                                         $run_qty = mysqli_query($con,$get_qty);
                                         while($row_qty = mysqli_fetch_array($run_qty)){
                                             $b_id = $row_qty['book_id'];
                                             $qty_book = $row_qty['qty_book'];
 
                                             $get_book = "select * from books where book_id='$b_id'";
                                             $run_book = mysqli_query($con,$get_book);
                                             
                                         while($row_book=mysqli_fetch_array($run_book)){
                                             
                                             $book_id = $row_book['book_id'];
                                             
                                             $author_id = $row_book['author_id'];
 
                                             $b_cat_id = $row_book['b_cat_id'];
 
                                             $lang_id = $row_book['lang_id'];
                                             
                                             $book_title = $row_book['book_title'];
                                             
                                             $book_img1 = $row_book['book_img1'];
                                             
                                             $book_price = $row_book['book_price'];
                                             
                                             $book_keywords = $row_book['book_keywords'];
                                             
                                             $book_date = $row_book['date'];
                                             
                                             $book_label = $row_book['book_label'];
 
                                             $book_sale = $row_book['book_sale'];
 
                                             $isbn = $row_book['isbn'];
 
                                             $qty = $row_book['qty'];
                                             
                                             @$i++;
                                     
                                     ?>
                                     
                                     <tr><!-- tr begin -->
                                         <td> <?php echo $i; ?> </td>
                                         <td> <?php echo $book_title; ?> </td>
                                         <td> <?php echo $isbn; ?> </td>
                                         <td> <?php echo $qty; ?> </td>
                                         <td> 
                                             
                                             <a href="index.php?add_rem_qty=<?php echo $book_id; ?>" >
                                             
                                                 <i class="fa fa-plus"></i> Add / Remove <i class="fa fa-minus"></i>
                                             
                                             </a> 
                                             
                                         </td>
                                     <!--  <td>
                                         // <?php 
                                             
                                         // $get_author = "select * from authors where author_id='$author_id'";
                                         
                                     ////     $run_author = mysqli_query($con,$get_author);
                                         //  while($row_author=mysqli_fetch_array($run_author)){
                                         //      $author_name = $row_author['author_name'];
                                         //      echo $author_name;
 
                                         //   }
                                             
                                         
                                         
                                         
                                         ?> 
                                         </td>-->
                                     <!--   <td> -->
                                         <?php 
                                             
                                         //   $get_b_cat = "select * from book_categories where b_cat_id='$b_cat_id'";
                                         
                                         // $run_b_cat = mysqli_query($con,$get_b_cat);
                                             //while($row_b_cat=mysqli_fetch_array($run_b_cat)){
                                             // $b_cat_title = $row_b_cat['b_cat_title'];
                                                 //echo $b_cat_title;
 
                                             //}
                                             
                                         
                                         
                                         
                                         ?> 
                                         </td>
                                         <!-- <td>
                                         //  <?php 
                                             
                                         //   $get_lang = "select * from languages where lang_id='$lang_id'";
                                         
                                         //  $run_lang = mysqli_query($con,$get_lang);
                                         // while($row_lang=mysqli_fetch_array($run_lang)){
                                         //     $lang_title = $row_lang['lang_title'];
                                         //     echo $lang_title;
 
                                         //  }
                                             
                                         
                                         
                                         
                                         ?> 
                                         </td>-->
                                     <!--   <td> <img src="product_images/<?php echo $book_img1; ?>" width="60" height="60"></td> -->
 
                                         <td>  <?php if($book_label=='sale'){echo "$book_label : <b>$book_sale  </b><i class='fa fa-check'></i>"; }else{ echo $book_label;} ?></td>
                                         <td>  <?php if($book_label=='sale'){echo "$book_price  <i class='fa fa-times'></i> ";  }else{ echo "$book_price  <i class='fa fa-check'></i>";} ?></td>
                                         
                                         <td> <?php 
                                             
                                                
                                                 echo $qty_book;
                                             
                                             ?> 
                                         </td>
                                         
                                     <!--   <td> <?php echo $book_keywords; ?> </td> -->
                                 <!--       <td> <?php echo $book_date ?> </td> -->
                                     <td> 
 
                                             
                                             <a href="index.php?view_book=<?php echo $book_id; ?>">
                                             
                                         <i class="fa fa-eye"></i> View
                                     
                                      </a> 
                                     
                                 </td>
                                 <td> 
                                      
                                      <a href="index.php?delete_book=<?php echo $book_id; ?>" >
                                      
                                         <i class="fa fa-trash-o"></i> Delete
                                     
                                      </a> 
                                      
                                 </td>
                                 <td> 
                                      
                                      <a href="index.php?edit_book=<?php echo $book_id; ?>">
                                      
                                         <i class="fa fa-pencil"></i> Edit
                                     
                                      </a> 
                                     
                                 </td>
                             </tr><!-- tr finish -->
                             
                             <?php } }
                                     
 
 
 //<!--------------------------------------------------------------------
   }

?>


    
                            
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

    
        
 <?php } ?>       
       