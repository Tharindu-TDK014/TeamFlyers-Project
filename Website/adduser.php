

<?php

    $fname=$_POST["txt_f_name"];
    $lname=$_POST["txt_l_name"];
    $contact=$_POST["txt_tele"];
    $email=$_POST["txt_email"];
    $pw=$_POST["txtpassword"];
	$address=$_POST["txt_address"];
	$country=$_POST["txt_country"];
	$zip=$_POST["txt_zipcode"];
	
    //connecting to database
    $con=mysqli_connect("localhost","root","","e_com_db");
    if(!$con){
        die("Error occured in db connection, Please try again");
    }

    //inserting values to sql
    $sql="INSERT INTO `customer`(`C_Email`, `C_password`, `C_fname`, `C_lname`, `C_Address`, `C_Country`, `C_ZipCode`, `C_Phone`)VALUES ('".$email."', '".$pw."' , '".$fname."' , '".$lname."', '".$address."','".$country."', '".$zip."', '".$contact."')";
    
    //validation and redirection
    if(mysqli_query($con,$sql)){
        header('Location:index.php');
    }

    //closing database connection
    mysqli_close($con);
    

?>