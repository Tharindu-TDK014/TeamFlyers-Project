<?php

$type=$_POST["rdotype"];
$message=$_POST["txtMsg"];
$email=$_POST["txtEmail"];
$image = "uploads/".basename($_FILES["file1"]["name"]);
		move_uploaded_file($_FILES["file1"]["tmp_name"],$image);
			
//connecting to database
$con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
if(!$con)
{
	die("Error occured in db connection, Please try again");
}

//inserting values into sql
$sql="INSERT INTO `post`(`Post_ID`, `C_Email`, `Post_Type`, `Post_Date`, `Message`, `FilePath`) VALUES (NULL,'".$email."','".$type."','".date("y-m-d")."','".$message."','".$image."')";

//validation and redirection
    if(mysqli_query($con,$sql)){
		echo "Message sent Successfully";
        header('Location:contact.php');
    }

    //closing database connection
    mysqli_close($con);
    

?>