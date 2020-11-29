<?php session_start();
		$Sid = $_POST["txt0"];	
	   	$pid = $_POST["txt1"];
		$ptype = $_POST["txt2"];
		$sad = $_POST["txt3"];
		$sxd = $_POST["txt4"];
		$sq = $_POST["txt5"];

	if(isset($_POST["chkPublish"]))
	{	  
	 	$status = 1;
   	}
	else
	{ 
		$status = 0;
	}	
$con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
	if(!$con)
	{	
		die("Cannot connect to DB server");		
	}
	
	$sql="UPDATE `stock` SET `P_ID` = '".$pid."', `P_Type` = '".$ptype."', `P_Status` = '".$status."', `Stock_Qty` = '".$sq."', `Stock_Arrive_Date` = '".$sad."', `Stock_Exp_Date` = '".$sxd."' WHERE `stock`.`Stock_ID` = '".$Sid."';";	
	 
	 if(mysqli_query($con,$sql))
	 {
		 header('Location:Admin_Stock.php');	
	
	 }
	
	 ?>