<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nipun Spice Exports</title>
	<link rel="shortcut icon" href="img/logo.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Nipun Spice Export</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	<nav class="navbar navbar-expand-sm bg-dark justify-content-end">
    <ul class="navbar-nav">
      <li class="nav-item">
        <i class="fas fa-truck" style="color:#DDDDDD;"></i>
		<a href="#">Shipping Method</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-sign-in-alt" style="color:#DDDDDD;"></i>
		<a href="login.php">Sign in/Register</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-sign-out-alt" ></i>
		<a href="logout.php">Log Out</a>
      </li>
      
    </ul>
  </div>
</nav>

	
	<div class="navigation-bar">
	</div>
	
<div class="container">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/a.jpg"  style="width:100%; height:50vh;">
        <div class="carousel-caption">
          <h3>Grade A</h3>
          <p>500g</p>
        </div>
      </div>

      <div class="item">
        <img src="img/c.jpg"  style="width:100%; height:50vh;">
        <div class="carousel-caption">
          <h3>Grade B</h3>
          <p>500g</p>
        </div>
      </div>
    
      <div class="item">
        <img src="img/b.jpg" style="width:100; height:50vh;">
        <div class="carousel-caption">
          <h3>Grade C</h3>
          <p>500g</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<form method="post" action="">
<div class="container-promotion">
	<h2> Promotions </h2>
	<?php
		$con = mysqli_connect("localhost","root","","nse");
		if(!$con)
			{	
				die("Cannot connect to the DB");		
			}
		 //retrieving values from sql
			$sql ="SELECT * FROM `product` WHERE `P_offer_status`='1'";	
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
				?>
	<form method="post" action="">
	<div class="row">
		<div class="col-md-3">
			<div class="product-top">
			<img src="<?php echo $row['file_path']?>" class="img-rounded"   />
			<div class="overlay">
			<button type="button" class="btn btn-secondary" title="Add to Wishlist"><i class="fa fa-heart"></i></button>	
			<a  href="details.php?pid=<?php echo $row['P_ID']; ?>" ><button type="button" class="btn btn-secondary" title="More Details"><i class="fa fa-search"></i></button>
				</a>
				</div>
				</div>
		<div class="product-bottom text-center">
		<h3> <?php echo $row["P_Name"]; ?> </h3>
		<h5>Rs: <?php echo $row["P_Price"]; ?></h5>
		<form action="addtocart.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['P_Qty']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['P_ID']?>">
            <input type="submit" value="Add To Cart">
        </form>
			
		</div>
		</div>
		</div>
     	
    
	
	
	
	<?php
			}
	}
	
	?>
	</div>
	
	
	<!-- Displaying all the products-->
	<?php
		$con = mysqli_connect("localhost","root","","nse");
		if(!$con)
			{	
				die("Cannot connect to the DB");		
			}
		 //retrieving values from sql
			$sql ="SELECT * FROM `product` ";	
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
				?>
	
	<div class="row">
		<div class="card">
		<div class="col-md-3">
			<div class="product-top">
			<img src="<?php echo $row['file_path']?>" class="img-rounded"   />
			<div class="overlay">
			<button type="button" class="btn btn-secondary" title="Add to Wishlist"><i class="fa fa-heart"></i></button>	
			<a  href="details.php?pid=<?php echo $row['P_ID']; ?>" ><button type="button" class="btn btn-secondary" title="More Details"><i class="fa fa-search"></i></button>
				</a>
				</div>
				</div>
		<div class="product-bottom text-center">
		<h3> <?php echo $row["P_Name"]; ?></h3>
		<h5>Rs: <?php echo $row["P_Price"]; ?></h5>
		<form action="addtocart.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['P_Qty']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['P_ID']?>">
            <input type="submit" value="Add To Cart">
        </form>
			
		</div>
		</div>
		</div>

     	
    
	 
	
	
	<?php
			}
	}
	
	?>
	
	
	
	</div>


</body>
</html>
