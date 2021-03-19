<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$country_id = $row_customer['country_id'];

$state_id = $row_customer['state_id'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];


$country_1 = $country_id;
$get_country = "select * from countries where country_id='$country_id'";
$run_country = mysqli_query($con,$get_country);
$row_country = mysqli_fetch_array($run_country);
$country_name = $row_country['name'];



$get_state = "select * from states where state_id='$state_id'";
$run_state = mysqli_query($con,$get_state);
$row_state = mysqli_fetch_array($run_state);
$state_name = $row_state['name'];

?>
<h1 align="center" > Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group"><!-- form group begin-->
       <label>Customer Name :</label>
       <input type="text" name="c_name" class="form-control"  value="<?php echo $customer_name; ?>" required>
        
    </div><!-- form group frnnish-->
    <div class="form-group"><!-- form group begin-->
       <label>Customer Email :</label>
       <input type="email" name="c_email" class="form-control"  value="<?php echo $customer_email; ?>" required>
        
    </div><!-- form group frnnish-->

<label>Select Your Counrty</label>
                      <div class="form-group"><!-- col-md-6 Begin -->
                            <select class="form-control" name="country_id" id="countrydd" onchange="change_country()"><!-- form-control Begin -->
                                
                                <?php
                                echo "<option value='$country_id'> $country_name </option>"; 
                                $get_countries = "select * from countries";
                                $run_countries = mysqli_query($con,$get_countries);
                                while ($row_countries=mysqli_fetch_array($run_countries)){
                                    $country_id = $row_countries['country_id'];
                                    $country_name = $row_countries['name'];
                                    echo "<option value='$country_id'> $country_name </option>";
                                    }
                                ?>
                                
                            </select><!-- form-control Finish -->
                         
                      </div><!-- col-md-6 Finish -->

                      <label>Select Your State</label>
                     

                      <div  class="form-group" id="state"><!-- col-md-6 Begin -->
              <?php  
            
              $get_states = "select * from states where country_id='$country_1'";
                  $run_states = mysqli_query($con,$get_states);
                  echo"<select class='form-control'  name='state_id' required>
                  <option value='$state_id'> $state_name  </option>";
                  while($row_states=mysqli_fetch_array($run_states)){
                     $state_id =$row_states['state_id'];
                     $state_name = $row_states['name'];
                  echo "<option value='$state_id'> $state_name  </option> ";

                  }
                  echo "</select>"; ?>

                       </div><!-- col-md-6 Finish -->

















    <div class="form-group"><!-- form group begin-->
       <label>Customer Address :</label>
       <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
        
    </div><!-- form group frnnish-->

    <div class="form-group"><!-- form group begin-->
       <label>Customer contact :</label>
       <input type="tel" name="c_contact" class="form-control" pattern="[0][0-9]{9}"  minlength="10" maxlength="11" value="<?php echo $customer_contact; ?>" required>
        
    </div><!-- form group frnnish-->
    
    <div class="form-group form-height-custom"><!-- form group begin-->
       <label>Customer Image :</label>
       <input type="file" name="c_image" class="form-control form-height-custom">
       <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" width='220px' height='200px' alt="customer Image">
        
    </div><!-- form group frnnish-->
    <div class="text-center"><!--text center begin-->
    <button name="update" class="btn btn-primary"><!--tn btn-primary begin-->
        <i class="fa fa-user-md"></i> Update Now
    </button><!--tn btn-primary finnish-->
    
        
    </div><!--text center frnnish-->
    
</form>
<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $country_id = $_POST['country_id'];
    
    $state_id = $_POST['state_id'];
    
    $c_address = $_POST['c_address'];
    
    $c_contact = $_POST['c_contact'];

    



    if(is_uploaded_file($_FILES['c_image']['tmp_name'])){
         
        $c_image = $_FILES['c_image']['name'];       
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
        $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',country_id='$country_id',state_id='$state_id',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id' ";
    
        $run_customer = mysqli_query($con,$update_customer);
         
                }else{
                    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',country_id='$country_id',state_id='$state_id',customer_address='$c_address',customer_contact='$c_contact' where customer_id='$update_id' ";
    
                    $run_customer = mysqli_query($con,$update_customer);
                     
                }
    
    
    
   
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>

<script type="text/javascript">
function change_country()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","ajax.php?country="+document.getElementById("countrydd").value,false);
  xmlhttp.send(null);
  document.getElementById("state").innerHTML=xmlhttp.responseText;
}

</script>