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
		<h2 style="color:#FFFFFF;">Hi Admin- Promotions</h2>
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
				<th>P ID</th>
				<th>Stock ID</th>
				<th>Name</th>
                <th>Price</th>
				<th>Offer</th>
				<th>Offer Price</th>
				<th>Offer Status</th>  
                </tr>
              </thead>
              <tbody>
			 <?php
		
		 $con = mysqli_connect("localhost: 3308","root","","e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `product` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
	?>
				  
                <tr align="center">
				<td><?php echo $row['P_ID'] ?></td>
				<td><?php echo $row['Stock_ID'] ?></td>
				<td><?php echo $row['P_Name'] ?></td>
				 <td>Rs <?php echo $row['P_Price'] ?></td>
				 <td><?php echo $row['P_Offers'] ?>%</td>
				 <td>Rs<?php echo $row['P_OfferPrice'] ?></td>
				<td><?php echo $row['P_OfferStatus'] ?></td>
				 
				 <td>
				
				 
				<a  href="Set_Offer.php?id=<?php echo $row['P_ID']; ?>" title="click for edit" onclick="return confirm('Set an offer on this item?')" class="btn btn-primary">Set Offer</a> 
		
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