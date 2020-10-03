<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Login Form</title>
	<link rel="shortcut icon" href="img/logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<div class="container">
		<div class="img">
			<img src="img/login (2).svg">
		</div>
		<div class="login-content">
			<form id="form1" name="form1" method="post" action="">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-container">
    				<i class="fa fa-user icon"></i>
    				<input class="input-field" type="text" placeholder="Username" name="txtuname">
  				</div>
           	
           		<div class="input-container">
   					<span class="fa fa-key icon"></span>
    				<input class="input-field" type="password" placeholder="Password" name="txtpswd">
  				</div>
				
				<p>
				
		
					<?php 
					  if(isset($_POST["btnsubmit"])){


					  $uname=$_POST["txtuname"];
					  $password=$_POST["txtpswd"];
						$con = mysqli_connect("localhost: 3308","root","","nse_e_com");   
						  if(!$con)
						  {
							  die("error , please go home");
						  }
						  $sql = "select C_Email,C_Password from customer where C_Email='".$uname."' and C_Password='".$password."'";
						  $result=mysqli_query($con,$sql);
						  $val=false;
						 if( mysqli_num_rows($result)>0){
							 $val=true ;

						 }
						  mysqli_close($con);


					  if($val)
					  {
						  $_SESSION["userName"]=$uname;
						  header('Location:main.php');

					  }
					  else
					  {
						  echo'<span style="color:#fff;text-align:center;">invalid user or password</span>';
					  }}
					  ?>
					  </p>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" name="btnsubmit" value="Login">
            </form>
        </div>
    </div>
    
</body>
</html>