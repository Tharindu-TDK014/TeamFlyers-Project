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
	
	</script>
</head>

<body>
	<div id="header">
		<h2 style="color:#FFFFFF;"> ADD NEW STOCK</h2>
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
            	<th>Stock ID</th>
                <td><input type="text" name="txt0" id="txt0" class="form-control" readonly></td>
            </tr>
			
            <tr>
                <th>P ID</th>
                <td><input type="text" name="txt1" id="txt1" class="form-control" required/></td>
            </tr>
            <tr>
                <th>P Type</th>
                <td><input type="text" name="txt2" id="txt2" class="form-control" required /></td>
            </tr>
            <tr>
                <th>Stock Arrived Date</th>
                <td><input type="text" name="txt3" id="txt3" class="form-control" required placeholder="YYYY-MM-DD"/></td>
            </tr>  
            <tr>
                <th>Stock Exp Date</th>
                <td><input type="text" name="txt4" id="txt4" class="form-control" required placeholder="YYYY-MM-DD"/></td>
            </tr>
            <tr>
                <th>Stock Qty</th>
                <td><input type="text" name="txt5" id="txt5" class="form-control" required/></td>
            </tr>
            

    </table>
		
		<?php
		
		if(isset($_POST["btnSubmit"]))
	   {
		$Sid = $_POST["txt0"];	
	   	$pid = $_POST["txt1"];
		$ptype = $_POST["txt2"];
		$sad = $_POST["txt3"];
		$sxd = $_POST["txt4"];
		$sq = $_POST["txt5"];
			
		/* connecting to database */ 
		$con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}

			 //inserting values to sql
			$sql = "INSERT INTO `stock` (`Stock_ID`, `P_ID`, `P_Type`, `P_Status`, `Stock_Qty`, `Stock_Arrive_Date`, `Stock_Exp_Date`) VALUES (NULL, '".$pid."', '".$ptype."', '1', '".$sq."', '".$sad."', '".$sxd."');";
    
	//validation and redirection   
	 if(mysqli_query($con,$sql))
		{
		echo "File uploaded Successfully";
		 header('Location:Admin_Stock.php');	
	}
	else
		echo "Something went wrong, Please select the file again";
  
		}
?>    
		<br><br>
		<input type="submit" name="btnSubmit" id="btnSubmit"  value="Submit" class="btn btn-success"/ >
		<input type="reset" name="btnReset" id="btnReset"  class="btn btn-danger" value="Reset" />
		</form></div>

<div id="foot">
    	<h6 style="color:#FFFFFF;">Copyright &copy; 2020 Team Flyers</h6>
    </div>
</body>
</html>