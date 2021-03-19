<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Costumers
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Costumers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <br>
                        <div class="form-group"><!--form-group begin-->
                                <div class="col-md-1"></div>
                                <label class="col-md-4 control-label">Search By Name Or E-mail Or Contact</label>
                                <div class="col-md-3"><!--col-md-6 begin-->
                                    <input name="s-customer" type="text" class="form-control" required >
                                </div><!--col-md-6 finish-->
                                <div class="col-md-2"><!--col-md-6 begin-->
                                  <input name="submit" type="submit" value="Search Customers "  class="btn btn-primary form-control">
                                </div>
                         </div><!--form-group finish-->
            </form>
            <?php 
                if(isset($_POST['s-customer'])){
                    $customer = $_POST['s-customer'];
                    $i=0;
                    $get_customers = "select * from customers where customer_name like '%$customer%' OR customer_email like '%$customer%' OR customer_contact like '%$customer%' order by customer_name ASC ";
                    
                    $run_customers = mysqli_query($con,$get_customers);
                    $count = mysqli_num_rows($run_customers);
                    if($count!=0){

                    
                ?>
                <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Name: </th>
                                <th> Image: </th>
                                <th> E-Mail: </th>
                                <th> Country: </th>
                                <th> State: </th>
                                <th> Address: </th>
                                <th> Contact: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                    while($row_customers=mysqli_fetch_array($run_customers)){

                        $customers_id = $row_customers['customer_id'];
                        
                        $customers_name = $row_customers['customer_name'];
                         
                         $customers_image = $row_customers['customer_image'];
 
                         $country_id = $row_customers['country_id'];
 
                         $state_id = $row_customers['state_id'];
                        
                         $customers_contact = $row_customers['customer_contact'];
                         
                         $customers_email = $row_customers['customer_email'];
 
                         $customers_address = $row_customers['customer_address'];
 
                          $i++;

                                   
                                    $get_country = "select * from countries where country_id='$country_id'";
                                    $run_country = mysqli_query($con,$get_country);
                                    $row_country = mysqli_fetch_array($run_country);
                                    $country_name = $row_country['name'];
                                   
                
                                  
                                    $get_state = "select * from states where state_id='$state_id'";
                                    $run_state = mysqli_query($con,$get_state);
                                    $row_state = mysqli_fetch_array($run_state);
                                    $state_name = $row_state['name'];

                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customers_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $customers_image; ?>" width="60" height="60"></td>
                                <td> <?php echo $customers_email; ?> </td>
                                <td> <?php echo $country_name; ?></td>
                                <td> <?php echo $state_name; ?> </td>
                                <td> <?php echo $customers_address ?> </td>
                                <td> <?php echo $customers_contact ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_customer=<?php echo $customers_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->

                                <?php }}else{ ?>




            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Name: </th>
                                <th> Image: </th>
                                <th> E-Mail: </th>
                                <th> Country: </th>
                                <th> State: </th>
                                <th> Address: </th>
                                <th> Contact: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from customers  order by customer_name ASC";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['customer_id'];
                                    
                                    $c_name = $row_c['customer_name'];
                                    
                                    $c_img = $row_c['customer_image'];
                                    
                                    $c_email = $row_c['customer_email'];
                                    
                                    $country_id = $row_c['country_id'];
                                    
                                    $state_id = $row_c['state_id'];
                                    
                                    $c_address = $row_c['customer_address'];
                                    
                                    $c_contact = $row_c['customer_contact'];
                                    
                                    $i++;

                                   
                                    $get_country = "select * from countries where country_id='$country_id'";
                                    $run_country = mysqli_query($con,$get_country);
                                    $row_country = mysqli_fetch_array($run_country);
                                    $country_name = $row_country['name'];
                                   
                
                                  
                                    $get_state = "select * from states where state_id='$state_id'";
                                    $run_state = mysqli_query($con,$get_state);
                                    $row_state = mysqli_fetch_array($run_state);
                                    $state_name = $row_state['name'];

                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $country_name; ?></td>
                                <td> <?php echo $state_name; ?> </td>
                                <td> <?php echo $c_address ?> </td>
                                <td> <?php echo $c_contact ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_customer=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
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

<?php }} ?>