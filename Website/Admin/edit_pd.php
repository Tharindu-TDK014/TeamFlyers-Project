<?php session_start();
	$pid = $_POST["txt0"];
	$sid = $_POST["txt1"];
	$pqty = $_POST["txt2"];
	$pname = $_POST["txt3"];
	$type = $_POST["txt4"];
	$des = $_POST["txt5"];
	$md = $_POST["txt6"];
	$ed = $_POST["txt7"];
	$pp = $_POST["txt8"];
	$po = $_POST["txt9"];
	$pop = $_POST["txt10"];
	$pos = $_POST["txt11"];
	
	if(is_uploaded_file($_FILES['file']['tmp_name']))
	{
   		$image = "Images/".basename($_FILES["file"]["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"],$image);
	}  
	else
	{
		 $image = $_SESSION['path'];		
	}
 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
	if(!$con)
	{	
		die("Cannot connect to DB server");		
	}
	
	$sql=" UPDATE `product` SET `P_Name` = '".$pname."', `P_Description` = '".$des."', `P_Price` = '".$pp."', `P_ManDate` = '".$md."', `P_ExpDate` = '".$ed."', `P_filepath` = '".$image."' WHERE `product`.`P_ID` = '".$pid."' AND `product`.`P_Qty` = '".$pqty."' AND `product`.`P_Type` = '".$type."' AND `product`.`Stock_ID` = '".$sid."'";	
	 
	 if(mysqli_query($con,$sql))
	 {
		 header('Location:Admin_Product.php');	
	
	 }
	
	 ?>