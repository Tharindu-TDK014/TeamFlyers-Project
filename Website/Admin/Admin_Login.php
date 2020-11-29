<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login - Stock</title>
 <!-- linking bootstrap css (Bootstrap CDN) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--/linking bootstrap css  -->

<link rel="stylesheet" type="text/css" href="./CSS/crm_login_style.css">

</head>
<body>	
	<div class="container" > <!--Bootstrap Container-->
	<div class="row">        <!--bootstrap grid row-->      
    <div class="col-md-4 col-sm-12 col-12 " >   <!--bootstrap grid column layout-->	
		<img src="Images/logo.jpg  " class="ingLogo"  alt="LOGO" style="width:80px; height:80px "> 
        
    </div>
	<div class="col-md-4 col-12 tect-center">   <!--bootstrap grid column layout-->
		<h2 class="h2 mt-3" >NIPUN SPICE EXPORTS</h2>
		<h3 align="center">Admin Login - STOCK</h3>
		</div>
	<div class="col-md-4 col-12 text-right ">   <!--bootstrap grid column layout-->

	</div>
		
	</div>	<!--/bootstrap grid row--> 

    </div><!--/Bootstrap Container-->


		<div class="loginbox">
			<h1 align="center"> Sign In  </h1>
			<form id="form1" name="form1" method="post" action="">
				<p>Email</p>
				<input type="text" name="txtemail" placeholder="Enter your email address" required="">
				<p>Password</p>
				<input type="password" name="txtpassword" placeholder="Enter your password" required="">
				<br>
				<button type="submit" name="btnsubmit" id="btnsubmit">Login</button>
				</p>
				<br>
				<p>
		            <?php
		              if(isset($_POST["btnsubmit"]))
		              {
		              $email=$_POST["txtemail"];
		              $password=$_POST["txtpassword"];
		              $valid = false;
                        //Database connection
		                $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
                        if(!$con){
                            die("Error occured in db connection, Please try again");
                        }
                        //SQL select Query
                        $sql="SELECT * FROM admin WHERE A_Email='".$email."' AND A_password='".$password."'";
						$result=mysqli_query($con,$sql);
                        $valid=false;
                        
                        if(mysqli_num_rows($result)>0){
                            $valid=true;
                        }
                        
                        mysqli_close($con);
                      
                      //Validation

		              if($valid)
		              {
			            $_SESSION["product"] = $email;
			            header('Location: Admin_Product.php');
		              }
		              else
		              {
			             echo"Please Enter Correct Email and Password ! ";
		              }
		  
		              }
		              ?>					
				</p>
			</form>

		</div>
	
</body>
</html>