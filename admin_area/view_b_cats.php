<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
         echo "<script> alert('If You Delete a Category All Book In The Category Will Be Removed') </script>"; 
?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Book Categories
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> View Book Categories
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Book Category ID </th>
                                <th> Book Category Title </th>
                                <th> Book Category Desc </th>
                                <th> Book Category Top</th>
                                <th> Edit Book Category </th>
                                <th> Delete Book Category </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                    
                            <?php 
                            
                                $i=0;
          
                                $get_b_cats = "select * from book_categories order by b_cat_title ASC";
          
                                $run_b_cats = mysqli_query($con,$get_b_cats);
          
                                while($row_b_cats=mysqli_fetch_array($run_b_cats)){
                                    
                                    $b_cat_id = $row_b_cats['b_cat_id'];
                                    
                                    $b_cat_title = $row_b_cats['b_cat_title'];
                                    
                                    $b_cat_desc = $row_b_cats['b_cat_desc'];

                                    $b_cat_top = $row_b_cats['b_cat_top'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $b_cat_title; ?> </td>
                                <td width="300"> <?php echo $b_cat_desc; ?> </td>
                                <td> <?php echo $b_cat_top; ?> </td>
                                <td> 
                                    <a href="index.php?edit_b_cat=<?php echo $b_cat_id; ?> ">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?delete_b_cat=<?php echo $b_cat_id; ?> ">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                        
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>