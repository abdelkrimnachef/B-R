<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['add_rem_qty'])){
        
        $add_rem_id = $_GET['add_rem_qty'];
        
        $get_add_rem_id = "select * from books where book_id='$add_rem_id'";
        
        $run_add_rem_id = mysqli_query($con,$get_add_rem_id);
        
        $row_add_rem = mysqli_fetch_array($run_add_rem_id);
        
        $book_title = $row_add_rem['book_title'];

        $b_qty = $row_add_rem['qty'];

     
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Books </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Add Qty To <?php echo $book_title ?>
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Add / Remove Quanity Book 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Quanity </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="qty" pattern="[0-9]{1,15}" type="text" class="form-control" required placeholder="Num Of Books You Want To Add or Remove">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group 2 begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                     Add / Remove Qty
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                        <input name="add_rem" type="radio" value="add" required <?php if($b_qty<=0){echo "checked='checked'"; } ?>>
                        <label for="">add</label>
                        <input name="add_rem" type="radio" value="remove" required>
                        <?php if($b_qty<=0){echo "You Cant Remove You Have $b_qty Of This Book ";  }
                        else{
                          echo " <label for=''>remove</label>";
                        } ?>
                       
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group 2 finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="add" value="Add / Remove" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
<!---    <script src="js/tinymce/tinymce.min.js"></script>-->
  <!-- <script>tinymce.init({ selector:'textarea'});</script> -->
</body>
</html>


<?php 

if(isset($_POST['add'])){
    
 $qty = $_POST['qty'];
 $add_rem = $_POST['add_rem'];

 if($add_rem=='add'){
 $qty = $b_qty + $qty;
 }
 if($add_rem=='remove'){
    $qty = $b_qty - $qty;
 }
 if($qty<0){
   
  $add_books = "update books set qty='0' where book_id='$add_rem_id'";
                
    $run_add_book = mysqli_query($con,$add_books);
}else{
    $add_books = "update books set qty='$qty' where book_id='$add_rem_id'";
                
    $run_add_book = mysqli_query($con,$add_books);
}

        if($run_add_book){
            echo "<script>alert('Your Quantity has been updated Successfully  ')</script>"; 
             
            echo "<script>window.open('index.php?view_books','_self')</script>"; 
             
         }
    }
    
    

?>


<?php } ?>