<?php
		
		 $con = mysqli_connect("localhost: 3308","root","","e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT `Stock_ID`, `P_ID`, `Stock_Qty` FROM `stock` WHERE 1";
				  
					
		$result = mysqli_query($con,$sql); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Products</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style1.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		  
            ['Stock ID', 'Stock Qty'],
          <?php
			while($row = mysqli_fetch_array($result))
			{
				echo "['".$row["S_ID"]."',".$row["Stock_Qty"]."],";
			}
			
		  ?>
        ]);

        var options = {
          chart: {
            title: 'Stock Management',
            subtitle: 'Stock',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    </head>
<body>
	<div id="header">
		<h2 style="color:#FFFFFF;">Hi Admin- Reports</h2>
		<a href="CRM_Interface.php"  class="btn btn-primary"> CRM Management</a>
		<a href=""  class="btn btn-danger"> Log Out</a>
	</div>
	
<div id="navigation"><br>
    	<a href="Admin_CustomerDetails.php" class="btn badge"><h5>Customer Details</h5></a><br><br>
        <a href="Admin_Product.php" class="btn badge"><h5>Product Details</h5></a><br><br>
        <a href="Admin_Stock.php" class="btn badge"><h5>Stock</h5></a><br><br>
        <a href="Admin_Orders" class="btn badge"><h5>Orders</h5></a><br><br>
        <a href="Admin_Promotions.php" class="btn badge"><h5>Promotions</h5></a><br><br>
        <a href="Admin_reports.php" class="btn badge"><h5>Reports</h5></a><br><br>
    </div>
	
	<div id="Section">
	
	<div id="columnchart_material" style="width: 800px; height: 500px;"></div></div>
<div id="foot">
    	<h6 style="color:#FFFFFF;">Copyright &copy; 2020 Team Flyers</h6>
    </div>
</body>
</html>