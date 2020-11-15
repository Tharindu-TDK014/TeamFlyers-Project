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
 $con = mysqli_connect("localhost: 3308","root","","nse_e_com-1");
	if(!$con)
	{	
		die("Cannot connect to DB server");		
	}
	
	$sql="UPDATE `stock` SET `P_ID` = '".$pid."', `P_Type` = '".$ptype."', `Stock_Arrive_Date` = '".$sad."', `Stock_Exp_Date` = '".$sxd."', `Stock_Qty` = '".$sq."', `P_Status` = '".$status."' WHERE `stock`.`Stock_ID` = '".$Sid."' AND `stock`.`P_ID` = '".$pid."' AND `stock`.`P_Type` = '".$ptype."' AND `stock`.`Stock_Qty` = '".$sq."' AND `stock`.`P_Status` = '".$status."';";	
	 
	 if(mysqli_query($con,$sql))
	 {
		 header('Location:Admin_Stock.php');	
	
	 }
	
	 ?>