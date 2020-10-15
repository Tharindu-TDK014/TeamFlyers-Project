<!doctype html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="css/details.css">
</head>

<body>
	
	<form id="addtocart" name="addtocart" action="addtocart.php" method="post">
	<div class="content-wrapper">
		 <?php
		
		 $con = mysqli_connect("localhost","root","","nse_e_com");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				 $sql ="SELECT * FROM `product` WHERE `product`.`P_ID` = ".$_GET["pid"];	
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
	?>
    <img src="<?php echo $row['P_filepath']?>" width="400" height="450" />
		
		
		
		
    <div class="content">
        <h1 class="name"><?php echo $row["P_Name"]; ?></h1>
		<span class="price">
            &dollar;<?php echo $row["P_Price"]; ?>
        </span>
        <br>
            <input type="number" name="txt_quantity" value="1" min="1" max="" placeholder="Quantity" required><br>
            <input type="hidden" name="txt_productid" value="<?php echo $row['P_ID']?> ">
			<input type="hidden" name="txt_productname" value="<?php echo $row['P_Name']?> ">
			<input type="hidden" name="txt_productprice" value="<?php echo $row['P_Price']?> ">
            <input type="submit" value="Add To Cart">
      
		<h3>Description</h3>
        <div class="description">
           	<?php echo $row["P_Description"]; ?>
        </div>
		
		
		<div class="review">
			<h3> Review</h3>
			<?php
		$con = mysqli_connect("localhost","root","","nse_e_com");
		if(!$con)
			{	
				die("Cannot connect to the DB");		
			}
		 //retrieving reviews from productreview page.
		$sql ="SELECT * FROM `productreview` WHERE `productreview`.`P_ID`=".$_GET['pid'];
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
   				echo "
						<p>".$row['P_Review']."</p>
						<p><i>by  ".$row['C_Email']."</i> <br> on ".$row['Review_Date']."</p>
						<hr />
				";
    
			}
		}
				else{
					echo "No reviews(0)";
				}
			?>
		</div>
		 </div>
		
		
	<?php
			}
	}
	
	?>
    
</div>
		 </form>

</body>
</html>