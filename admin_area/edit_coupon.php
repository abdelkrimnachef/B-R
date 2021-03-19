<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['edit_coupon'])){

    $edit_id = $_GET['edit_coupon'];
    $edit_coupon = "select * from coupons where coupon_id='$edit_id'";
    $run_edit_coupon = mysqli_query($con,$edit_coupon);
    $row_edit_coupon = mysqli_fetch_array($run_edit_coupon);

    $coup_id = $row_edit_coupon['coupon_id'];
    $coup_title = $row_edit_coupon['coupon_title'];
    $coup_price = $row_edit_coupon['coupon_price'];
    $coup_code = $row_edit_coupon['coupon_code'];
    $coup_limit = $row_edit_coupon['coupon_limit'];
    $coup_used = $row_edit_coupon['coupon_used'];
    $b_id = $row_edit_coupon['book_id'];

    $get_books = "select * from books where book_id='$b_id'";
    $run_books = mysqli_query($con,$get_books);
    $row_books = mysqli_fetch_array($run_books);

    $book_id = $row_books['book_id'];
    $book_title = $row_books['book_title'];

}

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Coupons
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Coupons 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_title; ?>" name="coupon_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_price; ?>" pattern="[0-9]{0,15}" name="coupon_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Limit </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_limit" type="tel" pattern="[0-9]{0,15}" class="form-control" value="<?php echo $coup_limit; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Select Book </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="book_id" class="form-control" required>
                          
                            <option value="<?php echo $book_id; ?>"><?php echo $book_title; ?></option>

                            <?php 
                            
                                $get_b = "select * from books";
                                $run_b = mysqli_query($con,$get_b);

                                while($row_b = mysqli_fetch_array($run_b)){

                                    $b_id = $row_b['book_id'];
                                    $b_title = $row_b['book_title'];

                                    echo "<option value='$b_id'>$b_title</option>";

                                }
                            
                            ?>
                          
                          </select>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Code </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_code; ?>" name="coupon_code" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Edit Coupon" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<?php 

if(isset($_POST['update'])){

    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];
    $coupon_book_id = $_POST['book_id'];

    $update_coupon = "update coupons set book_id='$coupon_book_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$coup_used' where coupon_id='$coup_id'";
    $run_update_coupon = mysqli_query($con,$update_coupon);

    if($run_update_coupon){

        echo "<script>alert('Your Coupon Has Been Updated')</script>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";

    }


}

?>

<?php } ?>