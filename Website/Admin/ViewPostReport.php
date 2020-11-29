<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>
<?php require('Include/headerCRM.php'); ?>
<?php 
$con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");

?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Count'],
          <?php
			$sql="SELECT Post_Type, COUNT(*) FROM post GROUP BY Post_Type";
			$result= mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result))
			{
				echo "['".$row["Post_Type"]."',".$row["COUNT(*)"]."],";
			}
			
		  ?>
			
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>




<?php require('Include/footerCRM.php'); ?>