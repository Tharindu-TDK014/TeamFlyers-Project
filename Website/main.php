<?php
	$con = mysqli_connect("localhost","root","","nse_e_com");
	
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	
</head>
<body>

	
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
  <a class="navbar-brand" href="#">Nipun Spice Export</a>
		
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	<nav class="navbar navbar-expand-sm bg-dark justify-content-end">
    <ul class="navbar-nav d-inline-flex">
      <li class="nav-item d-inline-flex">
        <i class="fas fa-truck" style="color:#DDDDDD;"></i>
		<a class="nav-link" href="#">Shipping Method</a>
      </li>
	  <li class="nav-item">
        <i class="fas fa-phone" style="color:#DDDDDD;"></i>
		<a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-sign-in-alt" style="color:#DDDDDD;"></i>
		<a class="nav-link" href="login.php">Sign in/Register</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-sign-out-alt" ></i>
		<a class="nav-link" href="logout.php">Log Out</a>
      </li>
      
    </ul>
	  </nav>
  </div>
	  
	</nav>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
		<form action="" method="get" id="searchForm" class="form-inline">
			<input type="text" name="search" id="searchBox" class="txtsearch" />
			<input type="button" class="btsearch" value="Search">
		</form>
	</nav>
	

	
	
<div class="container">
	<?php
		session_start();
		echo "hello" . $_SESSION['userName'];
		try{
			if($_SESSION['userName']=="")
			{
				throw new Exception('Hello User');
			}
		}
		
		catch (Exception $ex) {
			//Print out the exception message.
			echo $ex->getMessage();
		}
		?>
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="cimg" src="img/a.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="cimg" src="img/b.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="cimg" src="img/c.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container-promotion">
	<h2> Promotions </h2>
	
	<?php
		$sql = "SELECT * FROM `product` WHERE `P_Offers`='1'";
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				?>
	<div class="col-md-3s">
			<div class="product-top">
			<img src="<?php echo $row['P_filepath']?>" class="img-rounded"   />
			<div class="overlay">
			<button type="button" class="btn btn-secondary" title="Add to Wishlist"><i class="fa fa-heart"></i></button>	
			<a  href="details.php?pid=<?php echo $row['P_ID']; ?>" ><button type="button" class="btn btn-secondary" title="More Details"><i class="fa fa-search"></i></button>
				</a>
				</div>
				</div>
		<div class="product-bottom text-center">
		<h3> <?php echo $row["P_Name"]; ?> </h3>
		<h5>Rs: <?php echo $row["P_Price"]; ?></h5>
		</div>
		</div>
	
	
	<?php
			}
	}
	
	?>
	
	</div>
	
	
	
	
	
	</div>
	
	
	
	
	<!-- Displaying all the products-->
	
	<div class="product-container">
	<?php
		
		$sql ="SELECT * FROM `product` ";	
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
				?>
	
	
		
			<div class="col-md-3ss">
			<div class="product-top">
			<img src="<?php echo $row['P_filepath']?>" class="img-rounded"   />
			<div class="overlay">
			<button type="button" class="btn btn-secondary" title="Add to Wishlist"><i class="fa fa-heart"></i></button>	
			<a  href="details.php?pid=<?php echo $row['P_ID']; ?>" ><button type="button" class="btn btn-secondary" title="More Details"><i class="fa fa-search"></i></button>
				</a>
				</div>
				</div>
		<div class="product-bottom text-center">
		<h3> <?php echo $row["P_Name"]; ?></h3>
		<h5>Rs: <?php echo $row["P_Price"]; ?></h5>
		
            <input type="number" name="quantity" value="1" min="1" max="" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="">
            <input type="submit" value="Add To Cart">
       
			
		</div>
	</div>
		

     	
    
	 
	
	
	<?php
			}
	}
	
	?>
	
	
	</div>
		
	
	
		
		
	<div class="footer">
		
			<div class="row">
				<div class="col-md-3 col-sm-6">
				<div class="single-footer">
					<h3>About Us</h3>
					<p>bla bla bla nipun bla bla bla nipun bla</p>
				</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="single-footer">
					<h3>Contact Us</h3>
						<ul class="link-area">
							<li><i class="fa fa-phone">+94757170784</i></li>
							<li><i class="fa fa-envelope">nipun@nipunspice.lk</i></li>
							<li><i class="fa fa-map">390/3 Kurudugaha hathekma, Elpitiya</i></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
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
