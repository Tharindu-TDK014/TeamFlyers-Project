<?php
$con = mysqli_connect("localhost","root","","e_com_db");
?>
<!DOCTYPE html>
<html lang="en">
<head>
 	<title>Nipun Spice Exports</title>
	<link rel="shortcut icon" href="img/logo.jpg">
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="css/main.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixedtop">
 <a class="navbar-brand" href="#">Nipun Spice Export</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" ariaexpanded="false" aria-label="Toggle navigation">
 	<span class="navbar-toggler-icon"></span>
 </button>
	
</div>
 <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	<nav class="navbar navbar-expand-sm bg-dark">
 	<ul class="navbar-nav d-inline-flex">
		 <li class="nav-item d-inline-flex">
		 <i class="fas fa-phone" style="color:#DDDDDD;"></i>
		<a class="nav-link" href="contact.php">Contact Us</a>
		 </li>
		 <li class="nav-item d-inline-flex">
		 <i class="fas fa-sign-in-alt" style="color:#DDDDDD;"></i>
		<a class="nav-link" href="login.php">Sign
		in/Register</a>
		 </li>
		 <li class="nav-item d-inline-flex">
		 <i class="fas fa-sign-out-alt" ></i>
		<a class="nav-link" href="logout.php">Log Out</a>
		 </li>

 	</ul>
 	</nav>
 </div>

</nav>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbarfixed-top">
		<form action="" method="get" id="searchForm" class="form-inline">
			<input type="text" name="search" id="searchBox" class="txtsearch" />
			<input type="button" class="btsearch" value="Search">
		</form>
	</nav>


<table class="table table-dark" >
  <tr>
    <td>Num</td>
    <td>Email</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Address</td>
    <td>Country</td>
    <td>Zip_Code</td>
    <td>Phone No</td>
  </tr>
<?php
		
		 $con = mysqli_connect("localhost: 3308","root","","e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `cus_order` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
?>

                <tr>
                  <td class="counterCell"></td>
                  <td><?php echo $row['C_Email'] ?></td>
                  <td><?php echo $row['C_fname'] ?></td>
                  <td><?php echo $row['C_lname'] ?></td>
                  <td><?php echo $row['C_Address'] ?></td>
                  <td><?php echo $row['C_Country'] ?></td>
                  <td><?php echo $row['C_ZipCode'] ?></td>
                  <td><?php echo $row['C_Phone'] ?></td>
                </tr>

        <?php
      }
    }
      ?>
                </table>










































	
	<div class="footer">
	<div class="row">
		<div class="col-md-4 col-sm-6">
			<div class="single-footer">
			<h3>About Us</h3>
			<p>Sellin best product for best price</p>
			</div>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="single-footer">
				<h3>Contact Us</h3>
					<ul class="link-area">
						<li><i class="fa fa-phone">+94757170784</i></li>
						<li><i class="fa fa-envelope">nipun@nipunspice.lk</i></li>
						<li><i class="fa fa-map">390/3 Kurudugaha hathekma, Elpitiya</i></li>
					</ul>
			</div>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="single-footer">
				<h3> Follow us on</h3>
					<ul class="socialmedia-list">
                		
							<li class="d-inline-flex"><a href="https://www.facebook.com/nipun.madushan.7946"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
							<li class="d-inline-flex"><a href="https://instagram.com/nipun_spice_export?igshid=ldicgud9hfuz"><i class="fab fa-instagram"></i></a></li>
							<li class="d-inline-flex"><a href="https://www.youtube.com/channel/UCPeNPHARS-fDSSgHuLT64rA"><i class="fab fa-youtube-square"></i></a></li>
                	</ul>

			</div>
		</div>
	</div>
		</div>
	 <div class="copyright">
		<p> &copy; TeamFlyers, All Right Reserved </p>
	</div>
</body>
</html>