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
		<h2 style="color:#FFFFFF;"> Product Details-Edit Stock</h2>
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
		<form id="form9" name="form9" method="post" action="edit_st.php" enctype="multipart/form-data">

    <?php
	
	 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
	if(!$con)
	{	
		die("Cannot connect to DB server");		
	}
	$sql ="SELECT * FROM `stock` WHERE `stock`.`Stock_ID` = ".$_GET["id"];					
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) >0)
		{
			
			$row = mysqli_fetch_assoc($result)
		
	?>
	
       <table style="margin-left:25px; margin-top:15px;">
        	<tr>
            	<th>Stock ID</th>
                <td><input type="text" name="txt0" id="txt0" class="form-control" value="<?php echo $row['Stock_ID']?>" readonly></td>
            </tr>
			
            <tr>
                <th>P ID</th>
                <td><input type="text" name="txt1" id="txt1" class="form-control"  value="<?php echo $row['P_ID']?>" ></td>
            </tr>
            <tr>
                <th>P Type</th>
                <td><input type="text" name="txt2" id="txt2" class="form-control" required / value="<?php echo $row['P_Type']?>"required></td>
            </tr>
            <tr>
                <th>Stock Arrive Date</th>
                <td><input type="text" name="txt3" id="txt3" class="form-control" required value="<?php echo $row['Stock_Arrive_Date']?>" required placeholder="YYYY-MM-DD"/></td>
            </tr>
            <tr>
             <th>Stock Exp Date</th>
                <td><input type="text" name="txt4" id="txt4" class="form-control" required value="<?php echo $row['Stock_Exp_Date']?>"  required placeholder="YYYY-MM-DD" /></td>
            </tr>
            <tr>
                <th>Stock Qty</th>
                <td><input type="text" name="txt5" id="txt5" class="form-control" value="<?php echo $row['Stock_Qty']?>" required/></td>
            </tr>
            </table> 
            <br>
            <p style="margin-left:25px;"><input type="checkbox" <?php if($row['P_Status'] == 1){  echo "checked='checked'"; }?> name="chkPublish"> In Stock</p>    

      <?php   	
	 mysqli_close($con);
		
		
	  } 
		   
	
	  ?>
      <Br>
	  
      <button type="submit" name="btnsubmit"  class="btn btn-success" style="margin-left:25px;" onClick="">Edit  </button>
      </div>
      </form>
      
	
<div id="foot">
    	<h6 style="color:#FFFFFF;">Copyright &copy; 2020 Team Flyers</h6>
    </div>
</body>
</html>