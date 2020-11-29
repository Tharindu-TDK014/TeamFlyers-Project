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
	

<body>
	<div id="header">
		<h2 style="color:#FFFFFF;"> Product Details-Set Offers</h2>
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
		<form id="form9" name="form9" method="post" action="edit_pm.php" enctype="multipart/form-data">

    <?php
	
	 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
	if(!$con)
	{	
		die("Cannot connect to DB server");		
	}
	$sql ="SELECT * FROM `product` WHERE `product`.`P_ID` = ".$_GET["id"];					
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) >0)
		{
			
			$row = mysqli_fetch_assoc($result)
		
	?>
	
      <img src="<?php echo $row['P_filepath']?>"   class="imgcontainer" style="float:right; margin-left:100px; margin-top:50px;"/> 
       <table style="margin-left:25px; margin-top:15px;">
        	<tr>
            	<th>Product ID</th>
                <td><input type="text" name="txt0" id="txt0" class="form-control" value="<?php echo $row['P_ID']?>" readonly></td>
            </tr>
			
            <tr>
                <th>Stock ID</th>
                <td><input type="text" name="txt1" id="txt1" class="form-control" required value="<?php echo $row['Stock_ID']?>" readonly /></td>
            </tr>
            <tr>
                <th>Product Qty</th>
                <td><input type="text" name="txt2" id="txt2" class="form-control" required / value="<?php echo $row['P_Qty']?>"  readonly ></td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td><input type="text" name="txt3" id="txt3" class="form-control" required value="<?php echo $row['P_Name']?>"  readonly /></td>
            </tr>
            <th>Product Type</th>
                <td><input type="text" name="txt4" id="txt4" class="form-control" required value="<?php echo $row['P_Type']?>"  readonly /></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input type="text" name="txt5" id="txt5" class="form-control" value="<?php echo $row['P_Description']?>" readonly/></td>
            </tr>
            <tr>
                <th>Man Date</th>
                <td><input type="text" name="txt6" id="txt6" class="form-control" value="<?php echo $row['P_ManDate']?>" readonly/></td>
            </tr>
            <tr>
                <th>Exp Date</th>
                <td><input type="text" name="txt7" id="txt7" class="form-control"  value="<?php echo $row['P_ExpDate']?>" readonly/></td>
            </tr>
           <th>Price</th>
                <td><input type="text" name="txt8" id="txt8" class="form-control"  value="<?php echo $row['P_Price']?>" readonly/></td>
            </tr>
              <tr>
                <th>Offer</th>
                <td><input type="text" name="txt9" id="txt9" class="form-control"  value="<?php echo $row['P_Offers']?>" required/></td>
            </tr>
     		<th>Offer Price</th>
                <td><input type="text" name="txt10" id="txt10" class="form-control"  value="<?php echo $row['P_OfferPrice']?>" readonly/></td>
            </tr>
            <th>Offer Status</th>
                <td><input type="text" name="txt11" id="txt11" class="form-control"  value="<?php echo $row['P_OfferStatus']?>" readonly/></td>
            </tr>
            <tr>
            <th>Image</th>
                <td><input type="file" name="file" id="file" value="<?php echo $row['P_filepath']?>"></td>
            </tr> 
            </table> 
            <br>
            <p style="margin-left:25px;"><input type="checkbox" <?php if($row['P_OfferStatus'] == 1){  echo "checked='checked'"; }?> name="chkPublish"> Publish this Promotion </p>    

      <?php   
	  $_SESSION['path'] = $row['P_filepath'];
		
		
	 mysqli_close($con);
		
		
	  } 
		   
	
	  ?>
	  
      <button type="submit" name="btnsubmit"  class="btn btn-success" style="margin-left:25px;">Edit </button>
		  
	  <button type="button" name="btn1"  class="btn btn-primary" style="margin-left:10px;" onClick="Cal()">Calculate </button>
      </div>
      </form>
<script type="text/javascript">
	function Cal()
	{
		var n1, n2, res;
		n1=Number(document.form9.txt9.value);
		n2=Number(document.form9.txt8.value);

		res=n2-((n1/100)*n2);
		
		document.form9.txt10.value=res;
	}
</script>
      
	
<div id="foot">
    	<h6 style="color:#FFFFFF;">Copyright &copy; 2020 Team Flyers</h6>
    </div>
</body>

</html>