<?php 
$con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");

?>
<html>
  <head>
	
	<link rel="stylesheet" type="text/css" href="CSS/report.css">
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
	  
	  <h1>Sales Report</h1>
	  
	  <div class="card">
		  
		  <?php
			$sql="SELECT p.C_fname, SUM(Sub_Total)'TOTAL' from cart c, customer p where c.C_Email=p.C_Email AND 'TOTAL' = (SELECT MAX('TOTAL')
                  from cart c)";
			$result= mysqli_query($con,$sql);
			if(mysqli_num_rows($result)> 0)
			{
				while($row = mysqli_fetch_array($result))
				{
			?>
				<h3>Best Customer</h3>
		  		<p> <?php echo $row["C_fname"]; ?> </p>
		  		
			<?php
				}
			}

		?>
	  </div>
	  
	  <div class="card">
		  
		  <?php
			$sql="SELECT p.P_Name, COUNT(No_Of_Products)'count' from cart c, product p where c.P_ID=p.P_ID AND 'count' = (SELECT MAX('count')
                  from cart c)";
			$result= mysqli_query($con,$sql);
			if(mysqli_num_rows($result)> 0)
			{
				while($row = mysqli_fetch_array($result))
				{
			?>
				<h3>Best selling product</h3>
		  		<p> <?php echo $row["P_Name"]; ?> </p>
		  		
			<?php
				}
			}

		?>
	  </div>
	  <br>
	
  
  </nav>
	  
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
        <th>No of items sold</th>
        <th>Sub total</th>
      </tr>
    </thead>
    <tbody>
		<?php
			$sql="SELECT p.P_ID,P_Name,SUM(c.No_Of_Products) 'Total', SUM(c.Sub_Total) 'Sub_Total' FROM product p, cart c where p.P_ID=c.P_ID group by p.P_ID ";
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
		  </div><br>
	<button onClick="window.print();" style="margin-left: 110px;" class="btn btn-primary" id="print-btn">print report</button>
	  
  </body>
</html>