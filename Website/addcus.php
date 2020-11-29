

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
    $sql="INSERT INTO `cus_order` (`Order_ID`, `Cart_ID`, `C_Email`, `C_Name`, `To_Address`, `To_Country`, `To_State`, `To_ZipCode`, `Order_Date`, `TP`) VALUES (NULL, '6', 'ihgijgflkbjgf', 'ufhgfugifhgufh', 'ffuhsuihuihu', 'irhyroyrowhgwr', 'fgruifgf', '548554', CURRENT_TIMESTAMP, '0757847845')";



   
    
    //validation and redirection
    if(mysqli_query($con,$sql)){

        header('Location:index.php');
    }

    //closing database connection
    mysqli_close($con);
    

?>