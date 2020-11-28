
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nipun Spice Exports</title>
	<link rel="shortcut icon" href="../../../../Users/Nipun/Desktop/img/logo.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style1n.css">
  <link rel="stylesheet" type="text/css" href="../../../../Users/Nipun/Desktop/css/main.css">
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
		<a class="nav-link" href="../../../../Users/Nipun/Desktop/contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-sign-in-alt" style="color:#DDDDDD;"></i>
		<a class="nav-link" href="../../../../Users/Nipun/Desktop/login.php">Sign in/Register</a>
      </li>
      <li class="nav-item">
        <i class="fas fa-sign-out-alt" ></i>
		<a class="nav-link" href="../../../../Users/Nipun/Desktop/logout.php">Log Out</a>
      </li>
      <li class="nav-item"> 
  <!-- catr icon start -->
      <i class="fas fa-sign-out-alt" ></i>
      <a href="cart.php"><img src="img/cart.PNG" width="30" height="30"  align="right"/></a>
</li>
      <!-- catr icon  ^ -->
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
	

	

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM Product WHERE P_ID='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["P_ID"]=>array('P_Name'=>$productByCode[0]["P_Name"], 'P_ID'=>$productByCode[0]["P_ID"], 'quantity'=>$_POST["quantity"], 'P_Price'=>$productByCode[0]["P_Price"], 'P_filepath'=>$productByCode[0]["P_filepath"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["P_ID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["P_ID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>NSE CART</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>

</tr>
	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["P_Price"];
		?>
				<tr>
				<td><img src="<?php echo $item["P_filepath"]; ?>" class="cart-item-image" /><?php echo $item["P_Name"]; ?></td>
				<td><?php echo $item["P_ID"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["P_Price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["P_ID"]; ?>" class="btnRemoveAction"><img src="img/delete.png" alt="Remove Item" width="32" height="33" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["P_Price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
<a href="checkout.php"><img src="img/ch.PNG" width="283" height="82" alt="checkout now"  />
</td></tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM Product ORDER BY P_ID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["P_ID"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["P_filepath"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["P_Name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["P_Price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	
<div class="container">
	
		
	<div class="footer">
		
			<div class="row">
				<div class="col-md-3 col-sm-6">
				<div class="single-footer">
					<h3>About Us</h3>
					<p>we are the best</p>
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
