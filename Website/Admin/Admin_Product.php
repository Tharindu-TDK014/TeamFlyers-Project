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
		<h2 style="color:#FFFFFF;">Hi Admin- Product Details</h2>
		<a href="Insert_Products.php"> <button type="button" class="btn btn-success"> Add Products </button></a>
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
	<table width="100%" class="table">
              <thead>
                <tr>
				<th width="5px">P_ID</th>
                <th width="5px">S_ID</th>
                <th>Image</th>
                <th width="20px">Qty</th>
				<th width="80px">Name</th>
				<th width="50px">Type</th>
				<th width="180px">Description</th>
                <th width="100px">Price</th>
                <th width="100px">Offer Price</th>
                <th width="100px">Man Date</th>
				<th width="100px">Exp Date</th>
                 
                </tr>
              </thead>
              <tbody>
		<?php
		
		 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
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
                <td>
				<img src="<?php echo $row['P_filepath']?>" class="img-circle" width="50" height="50"> 
				</td>
                <td><?php echo $row['P_Qty'] ?></td>
				<td><?php echo $row['P_Name'] ?></td>
				<td><?php echo $row['P_Type'] ?></td>
				<td><?php echo $row['P_Description'] ?></td>
				<td>Rs <?php echo $row['P_Price'] ?></td>
				<td>Rs<?php echo $row['P_OfferPrice'] ?></td>
                <td><?php echo $row['P_ManDate'] ?></td>
                <td><?php echo $row['P_ExpDate'] ?></td>
				 
				<td>
				<a  href="Edit_Product.php?id=<?php echo $row['P_ID']; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')" class="btn btn-primary">Edit</a> 
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