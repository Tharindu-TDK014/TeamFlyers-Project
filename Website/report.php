<?php 
$con = mysqli_connect("localhost","root","","e_com_db");

?>
<html>
  <head>
	
	<link rel="stylesheet" type="text/css" href="css/report.css">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
      // Load the Visualization API and the controls package.
      google.charts.load('current', {'packages':['corechart', 'controls']});
	 
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawDashboard);
	  	 
   

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {

        // Create our data table.
        var data = google.visualization.arrayToDataTable([
          ['Product Name', 'No of products'],
          <?php
			$sql="SELECT P_Name,SUM(c.No_Of_Products) 'Total' FROM product p, cart c where p.P_ID=c.P_ID group by P_Name ";
			$result= mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result))
			{
				echo "['".$row["P_Name"]."',".$row["Total"]."],";
			}
			
		  ?>
        ]);

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        // Create a range slider, passing some options
        var donutRangeSlider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'filter_div',
          'options': {
            'filterColumnLabel': 'No of products'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': 500,
            'height': 500,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind(donutRangeSlider, pieChart);

        // Draw the dashboard.
        dashboard.draw(data);
      }
		
		
    </script>
  </head>

  <body>
    <div class="container">
		<h2>Monthly Sale</h2>
	  <!--Div that will hold the dashboard-->
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="chart_div"></div>
	  <div id="filter_div"></div>
    </div>
		</div>
	  <div class="container">
	  <table id="table1">
    <thead>
      <tr>
		<th>Product ID</th>
        <th>Product Name</th>
        <th>No of items</th>
        <th>Sub total</th>
      </tr>
    </thead>
    <tbody>
		<?php
			$sql="SELECT p.P_ID,P_Name,SUM(c.No_Of_Products) 'Total', SUM(c.Sub_Total) 'Sub_Total' FROM product p, cart c where p.P_ID=c.P_ID group by P_ID ";
			$result= mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result))
			{
				?>

      <tr>
		<td><?php echo $row['P_ID'] ?></td>
        <td><?php echo $row['P_Name'] ?></td>
        <td><?php echo $row['Total'] ?></td>
        <td>Rs: <?php echo $row['Sub_Total'] ?></td>
      </tr>
		<?php 
		
			}
			
		  ?>
      
    </tbody>
  </table>
		  </div>
	  
  </body>
</html>