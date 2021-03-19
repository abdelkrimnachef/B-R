<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
       
        
 ?>
      
   <div class="row"><!--row begin-->
       <div class="col-lg-12"><!--col-lg-12 begin-->
           <ol class="breadcrumb"><!--breadcrumb begin-->
               <li class="active"><!--active begin-->
                 <i class="fa fa-dashboard">Dashboard / View Authors</i>  
               </li><!--active finish-->
           </ol><!--breadcrumb finish-->
       </div><!--col-lg-12 finish-->
   </div>  <!--row finish-->
    
<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Authors
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Author ID: </th>
                                <th> Author Name: </th>
                                <th> Author Image: </th>
                                <th> Author Top :</th>
                                <th> Author Delete: </th>
                                <th> Author Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_author = "select * from authors order by author_name ASC";
                                
                                $run_author = mysqli_query($con,$get_author);
          
                                while($row_author=mysqli_fetch_array($run_author)){
                                    
                                    $author_id = $row_author['author_id'];

                                    $author_name = $row_author['author_name'];
                                    
                                    $author_image = $row_author['author_image'];

                                    $author_desc = $row_author['author_desc'];

                                    $author_top = $row_author['author_top'];

                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $author_name; ?> </td>
                                
                                </td>
                                
                                
                                <td> <img src="other_images/<?php echo $author_image; ?>" width="60" height="60"></td>
                                    
                                <td> <?php echo $author_top; ?> </td>   

                                <td> 
                                     
                                     <a href="index.php?delete_author=<?php echo $author_id; ?>" >
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_author=<?php echo $author_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

    
        
 <?php } ?>       
        
        
        
        
        
        
        