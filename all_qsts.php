<div class="container">

                        <?php 
                            $get_qst = "select * from feedbacks where type ='qst' AND answer!='pending'";
                            $run_get_qst = mysqli_query($con,$get_qst);
                            while($row_get_qst=mysqli_fetch_array($run_get_qst)){
                                $question=$row_get_qst['question'];
                                $answer=$row_get_qst['answer'];

                                                
                        echo"
                        <div class='row'>
                        <div class='col-md-1'> </div>
                        <div class='col-md-9 box'>
                                <center> <h4><b>$question </b> </h4> 
                                    <h5> <p> $answer </p> </h5>
                                </center>  
                        
                        
                        </div>
                        </div>
                    
                       ";    }  ?>


</div>