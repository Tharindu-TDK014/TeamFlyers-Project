

<?php

    $name=$_POST["txt_name"];
   
    $contact=$_POST["txt_tele"];
    $email=$_POST["txt_email"];
   $state=$_POST["txt_state"];
	$address=$_POST["txt_address"];
	$country=$_POST["txt_country"];
	$zip=$_POST["txt_zipcode"];
	
    //connecting to database
    $con=mysqli_connect("localhost","root","","e_com_db");
    if(!$con){
        die("Error in db connection, Please try again");
    }

    //inserting values to sql
    $sql="INSERT INTO `cus_order`( `C_Email`, `C_Name`, `To_Address`, `To_Country`, `To_State`, `To_ZipCode`,  `TP`) VALUES ('".$email."',  '".$name."' ,  '".$address."','".$country."','".$state."', '".$zip."', '".$contact."')";
    
    //validation and redirection
    if(mysqli_query($con,$sql)){
        header('Location:bill.php');
    }

    //closing database connection
    mysqli_close($con);
    

?>