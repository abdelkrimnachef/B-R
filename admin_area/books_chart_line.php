<?php
$con=mysqli_connect("localhost","root","","book_store9");
$query = "select book_id , sum(qty) as qty_book from orders group by book_id ORDER BY qty_book";  
$result = mysqli_query($con, $query);  
?>  
 
 <html>  
      <head>  
           <title>B&R States</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['book_id', 'qty_book'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
							  $book_id = $row['book_id'];
							  $get_book = "select * from books where book_id='$book_id'";
							  $run_book = mysqli_query($con,$get_book);
							  $row_book = mysqli_fetch_array($run_book);
							  $book_title = $row_book['book_title'];
                               echo "['".$row_book["book_title"]."', ".$row["qty_book"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Selled Books',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
      <div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Books Stats
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Books Stats
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
           <br /><br />  
           <div style="width:900px;">  
               
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  