<?php 
include("includes/db.php");
$country = $_GET["country"];

if($country!=""){


$get_states = "select * from states where country_id='$country'";
$run_states = mysqli_query($con,$get_states);
echo"<select class='form-control'  name='state_id' required>";
while($row_states=mysqli_fetch_array($run_states)){
    $state_id =$row_states['state_id'];
    $state_name = $row_states['name'];
echo "<option value='$state_id'> $state_name  </option> ";

}
echo "</select>";
}
?>