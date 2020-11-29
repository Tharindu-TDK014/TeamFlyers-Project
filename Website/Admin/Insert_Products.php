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
<sript type="text/javascript">
	

	</sript>
</head>

<body>
	<div id="header">
		<h2 style="color:#FFFFFF;"> Product Details-Add New Item</h2>
		<a href="Admin_Login.php"> <button type="button" class="btn btn-danger"> Log Out </button></a>
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
		<form id="form3" name="form-addproducts" method="post" action=""  enctype="multipart/form-data">
			<table border="0" width="900px" align="center" style="margin-left: 15px; margin-top: 15px;">
        	<tr>
            	<th>Product ID</th>
                <td><input type="text" name="txt0" id="txt0" class="form-control"></td>
            </tr>
			
            <tr>
                <th>Stock ID</th>
                <td><input type="text" name="txt1" id="txt1" class="form-control" ></td>
            </tr>
            <tr>
                <th>Product Qty</th>
                <td><input type="text" name="txt2" id="txt2" class="form-control" required /></td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td><input type="text" name="txt3" id="txt3" class="form-control" required/></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><input type="text" name="txt4" id="txt4" class="form-control" required/></td>
            </tr>
            <tr>
                <th height="60">Product Description</th>
                <td><textarea name="txt5" id="txt5" rows="4" cols="25" class="form-control" required ></textarea></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><input type="text" name="txt6" id="txt6" class="form-control" required/></td>
            </tr>
            <tr>
             <tr>
                <th>Man Date</th>
                <td><input type="text" name="txt7" id="txt7" class="form-control" required placeholder="YYYY-MM-DD"/></td>
            </tr>
            <tr>
           <tr>
                <th>Exp Date</th>
                <td><input type="text" name="txt8" id="txt8" class="form-control" required placeholder="YYYY-MM-DD"/></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="file" name="file" id="file"></td>
            </tr>

    </table>
		
		<?php
		
		if(isset($_POST["btnSubmit"]))
	   {
		$pid = $_POST["txt0"];	
	   	$sid = $_POST["txt1"];
		$pqty = $_POST["txt2"];
		$pname = $_POST["txt3"];
		$ptype = $_POST["txt4"];
		$pdes = $_POST["txt5"];
		$pprice = $_POST["txt6"];
		$md = $_POST["txt7"];
		$ed = $_POST["txt8"];
		$image = "Images/".basename($_FILES["file"]["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"],$image);
			
		/* connecting to database */ 
		$con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}

			 //inserting values to sql
			$sql = "INSERT INTO `product`(`P_ID`, `P_Qty`, `P_Name`, `P_Type`, `Stock_ID`, `P_Description`, `P_Price`, `P_ManDate`, `P_ExpDate`, `P_Offers`, `P_OfferPrice`, `P_OfferStatus`, `P_filepath`) VALUES ('".$pid."', '".$pqty."', '".$pname."', '".$ptype."', '".$sid."', '".$pdes."', '".$pprice."', '".$md."', '".$ed."', '0', '0', '0', '".$image."');";
    
	//validation and redirection   
	 if(mysqli_query($con,$sql))
		{
		echo "File uploaded Successfully";
		 header('Location:Admin_Product.php');	
	}
	else
		echo "Something went wrong, Please select the file again";
  
		}
?>    
		<br><br>
		<input type="submit" name="btnSubmit" id="btnSubmit"  value="Submit" class="btn btn-success" onclick="Validate()" >
		<input type="reset" name="btnReset" id="btnReset"  class="btn btn-danger" value="Reset" />
		</form></div>
	
<div id="foot">
    	<h6 style="color:#FFFFFF;">Copyright &copy; 2020 Team Flyers</h6>
    </div>
</body>
</html>