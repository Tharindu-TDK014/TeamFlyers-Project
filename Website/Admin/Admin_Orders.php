<?php session_start();

if(!isset($_SESSION["product"]))
{
  header('Location:Admin_Login.php');
}
?>
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
</head>

<body>
	<div id="header">
		<h2 style="color:#FFFFFF;">Hi Admin- Orders</h2>
		<a href="CRM_Interface.php"  class="btn btn-primary"> CRM Management</a>
		<a href="Admin_Login.php"  class="btn btn-danger"> Log Out</a>
	</div>
	
<div id="navigation"><br>
    	<a href="Admin_CustomerDetails.php" class="btn badge"><h5>Customer Details</h5></a><br><br>
        <a href="Admin_Product.php" class="btn badge"><h5>Product Details</h5></a><br><br>
        <a href="Admin_Stock.php" class="btn badge"><h5>Stock</h5></a><br><br>
        <a href="Admin_Orders" class="btn badge"><h5>Orders</h5></a><br><br>
        <a href="Admin_Promotions.php" class="btn badge"><h5>Promotions</h5></a><br><br>
        <a href="Admin_reports.php" class="btn badge"><h5>Reports</h5></a><br><br>
		<a href="report.php" class="btn badge"><h5>Monthly Sales</h5></a><br><br>
    </div>
	
	<div id="Section">
	<table width="100%" class="table" >
              <thead align="center">
                <tr>
				<th>Order ID</th>
                <th>Email</th>
				<th>Cart ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>Country</th>
                <th>State</th>
				<th>Zip Code</th>
				<th>Date</th>
				<th>Amount</th>
                </tr>
              </thead>
              <tbody>
			 <?php
		
		 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `cus_order` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
	?>
				  
                <tr align="center">
				<td><?php echo $row['Order_ID'] ?></td>
                <td><?php echo $row['C_Email'] ?></td>
                <td><?php echo $row['Cart_ID'] ?></td>
                <td><?php echo $row['C_Name'] ?></td>
                <td><?php echo $row['To_Address'] ?></td>
                <td><?php echo $row['To_Country'] ?></td>
                <td><?php echo $row['To_State'] ?></td>
                <td><?php echo $row['To_ZipCode'] ?></td>
                <td><?php echo $row['Order_Date'] ?></td> 
				<td><?php echo $row['Cart_Total_Amt'] ?></td>

                </tr>
               
        <?php
			}}
			?>
    
    
    
      </table>
		</div>
	
	
<div id="foot">
    	<h6 style="color:#FFFFFF;">Copyright &copy; 2020 Team Flyers</h6>
    </div>
</body>
</html>