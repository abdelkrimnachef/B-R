<?php 
   if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <title>Insert Terms</title>
</head>
<body>
    <div class="row"><!--row begin-->
       
        <div class="col-lg-12"><!--col-lg-12 begin-->
            <ol class="breadcrumb"><!--breadcrumb begin-->
                <li class="active"><!--active begin-->
                     <i class="fa fa-dashboard">
                    Dashboard / Insert Terms
                </i>
                </li><!--active finish-->
               
            
                
            </ol><!--breadcrumb finish-->
        </div><!--col-lg-12 finnish-->
            
        
    </div><!--row finnish-->
    <div class="row"><!--row begin-->
       <div class="col-lg-12"><!--col-lg-12 begin-->
           <div class="panel panel-default"><!--panel panel-default begin-->
             <div class="panel-heading"><!--panel heading begin-->
                 <h3 class="panel-title"><!--panel-title begin-->
                     <i class="fa fa-money fa-fw"><!--fa fa-money fa-fw begin-->
                         
                     </i><!--fa fa-money fa-fw finish--> Insert Term
                 </h3><!--panel-title finish-->
             </div><!--panel heading finish-->
              <div class="panel-body"><!--panel body beggin-->
                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Term Title</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="term_title" type="text" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Term link</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                             <input name="term_link" type="text" class="form-control" required >
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                    
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label">Term Description</label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                            <textarea name="term_desc" cols="19" rows="10" class="form-control"></textarea>
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     <div class="form-group"><!--form-group begin-->
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-6"><!--col-md-6 begin-->
                            <input name="submit" type="submit" value="Insert term " class="btn btn-primary form-control">
                         </div><!--col-md-6 finish-->
                     </div><!--form-group finish-->
                     
                     
                      
                  </form>
              </div><!--panel body finish-->
               
           </div><!--panel panel-default finish-->
           
       </div><!--col-lg-12 finnish-->
        
    </div><!--row finnish-->
   
     <script src="js/tinymce/tinymce.min.js"></script>
     <script>tinymce.init({selector:'textarea'});</script>

</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        
        $term_title = $_POST['term_title'];
        $term_link = $_POST['term_link'];
        $term_desc = $_POST['term_desc'];
        
       
        $insert_term = "insert into terms (term_title,term_link,term_desc)value ('$term_title','$term_link','$term_desc')";
            
        $run_term = mysqli_query($con,$insert_term);
        if($run_term){
            echo " <script>alert('term has been succsefully inserted')</script> ";
            echo " <script> window.open('index.php?view_terms'','_self') </script> ";
        }
    }
   }
?>