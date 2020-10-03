<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Products</title>
	<link rel="stylesheet" type="text/css" href="Style1.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div id="header">
		<h2 style="color:#FFFFFF;">Hi Admin- Customer Details</h2>
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
	<table width="100%" class="table" >
              <thead>
                <tr>
				<th>Email</th>
                  <th>First Name</th>
                  <th>Last Name</th>
				  <th>Address</th>
				  <th>Country</th>
				  <th>Zip Code</th>
                  <th>Phone</th>
                </tr>
              </thead>
              <tbody>
			 <?php
		
		 $con = mysqli_connect("localhost: 3308","root","","nse_e_com-1");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `customer` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
		?>
				  
                <tr align="center">
				<td><?php echo $row['C_Email'] ?></td>
				 <td><?php echo $row['C_fname'] ?></td>
                 <td><?php echo $row['C_lname'] ?></td>
				<td><?php echo $row['C_Address'] ?></td>
				<td><?php echo $row['C_Country'] ?></td>
				<td><?php echo $row['C_ZipCode'] ?></td>
				 <td><?php echo $row['C_Phone'] ?></td>
				 <td>
       			</td>
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