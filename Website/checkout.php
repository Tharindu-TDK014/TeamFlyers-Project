<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>checkout</title>
	<link rel="shortcut icon" href="img/logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script src="js/jquery.ccpicker.js"></script>
	<link rel="stylesheet" href="css/intlTelInput.css">
  	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		function validatefirstName()
		{
			var name = document.getElementById("txt_name").value;
			if((name == "")||(name == null))
			{				
					alert("Please enter a  name");
					return false;
			}
			else if (!name.match(/^[a-zA-Z]+$/)) 
				{
					alert('First name must conatain alphabet letters only');
					return false;
				}
			return true;
		}
		
		
		
		function validateEmail()
		{
			var email = document.getElementById("txt_email").value;
			var at = email.indexOf("@");
			var dt = email.lastIndexOf(".");
			var len = email.length;

			if((at < 2)||(dt-at < 2)||(len-dt < 2))
			{
				alert("Please enter a valid email address");
				return false;
			}
			return true;
		}
		
		
		function validateContact()
		{
			var cno = document.getElementById("txt_tele").value;
			if((isNaN(cno))||(cno.length  <11)&& (cno.length >13))
			{
				alert("Please enter a valid contact number");
				return false;
			}
			return true;
		}
		
		function validateZip()
		{
			var zip = document.getElementById("txt_zipcode").value;
			if(isNaN(zip))
			{
				alert("Please enter a valid ZipCode");
				return false;
			}
			return true;
		}
		function Validate()
		{
			if(validatefirstName()&& validateEmail()&& validateContact()&& validateZip() )
			{
				alert("Order is completed");
			}
			else
			{
				event.preventDefault();
			}
		}
	</script>
	
</head>
<body>
	




<?php
    $con=mysqli_connect("localhost","root","","e_com_db");
    if(!$con){
        die("Error occured in db connection, Please try again");
    }
   $sql="SELECT Cart_ID FROM `cart` ORDER BY Cart_ID DESC LIMIT 1; ";
 
    
  



    mysqli_close($con);
    ?>
<h3> <?php echo "Cart_ID is :".$sql; ?></h3>





	<div class="container">
		<div class="img">
			<img src="img/chq.png">
		</div>
		<div class="login-content">
			<form id="form" name="form_addOrder" method="post" action="addcus.php">
				
        <div class="input-field1">
				<input type="text" name="txt_name" id="txt_name"  placeholder=" Name" >
				</div>

        <div class="input-field1">
        <input type="text" name="txt_cart" id="txt_cart"  placeholder=" cartid" >
        </div>
				
				
				
				<div class="input-field1">
				<input type="tel" name="txt_tele" id="txt_tele"  placeholder="Phone Number" required>
				</div>
				
				<div class="input-field1">
				<input type="email" name="txt_email" id="txt_email"  placeholder="Email" required>
				</div>
						
				<div class="input-field1">
          <select id="txt_country" name="txt_country" id="txt_country" placeholder="Country"></select>
        </div>
				
				<div class="input-field1">
				<input type="text" name="txt_address" id="txt_address"  	placeholder="Address">
				</div>
        <div class="input-field1">
        <input type="text" name="txt_state" id="txt_state"    placeholder="state">
        </div>
				
				
				
				<div class="input-field1">
				<input type="text" name="txt_zipcode" id="txt_zipcode"  placeholder="ZipCode">
				</div>
			
			
			<!--load jQuery library-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			
			<!--Load plugin library-->
			<script src="js/intlTelInput.js"></script>
			<script>
				var input = document.querySelector("#txt_tele");
				intlTelInput(input, {
					initialCountry: "auto",
					geoIpLookup: function(success, failure) {
						$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
							var countryCode = (resp && resp.country) ? resp.country : "";
							success(countryCode);
						});
					},
					utilsScript: "js/utils.js"
				});
			</script>
				<script>
				// get the country data from the plugin
					var countryData = window.intlTelInputGlobals.getCountryData(),
					  input = document.querySelector("#txt_tele"),
					  addressDropdown = document.querySelector("#txt_country");

					// init plugin
					var iti = window.intlTelInput(input, {
					  utilsScript: "../../build/js/utils.js?1590403638580" // just for formatting/placeholders etc
					});

					// populate the country dropdown
					for (var i = 0; i < countryData.length; i++) {
					  var country = countryData[i];
					  var optionNode = document.createElement("option");
					  optionNode.value = country.iso2;
					  var textNode = document.createTextNode(country.name);
					  optionNode.appendChild(textNode);
					  addressDropdown.appendChild(optionNode);
					}
					// set it's initial value
					addressDropdown.value = iti.getSelectedCountryData().iso2;

					// listen to the telephone input for changes
					input.addEventListener('countrychange', function(e) {
					  addressDropdown.value = iti.getSelectedCountryData().iso2;
					});

					// listen to the address dropdown for changes
					addressDropdown.addEventListener('change', function() {
					  iti.setCountry(this.value);
					});
				</script>
			
			
			<input type="submit" class="btn" value="Continue to checkout" onClick="Validate()">
		</form>
		
        </div>
    </div>
   
</body>
</html>