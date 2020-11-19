<?php

$comment = $_POST['txtComment'];

$con = mysqli_connect("localhost","root","","e_com_db");
if(!$con)
{
	die("Cannot connect to DB Server");
}

$sql = "INSERT INTO `productreview`(`Review_ID`, `P_ID`, `P_Name`, `C_Name`, `Review_Date`, `P_Review`, `P_Rating`) VALUES (NULL,1,NULL,NULL,'".date("y-m-d")."','".$comment."',NULL);";




 if(mysqli_query($con,$sql)){
        header('Location:main.php');
    }
//closing database connection
    mysqli_close($con);
    
?>