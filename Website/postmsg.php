<?php 

$email=$_POST["txtEmail"];
$message=$_POST["txtMsg"];
$type=$_POST["rdotype"];
$image = "uploads/".basename($_FILES["file"]["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"],$image);

$con = mysqli_connect("localhost","root","","e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
$sql ="INSERT INTO `post` (`Post_ID`, `C_Email`, `Post_Type`, `Post_Date`, `Message`, `FilePath`) VALUES (NULL, '".$email."', '".$type."', '".date("y-m-d")."', '".$message."', '".$image."')";

 if(mysqli_query($con,$sql)){
        header('Location:contact.php');
    }

//closing database connection
    mysqli_close($con);
    
?>
