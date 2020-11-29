<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Customer Relationship Management - Nipun Spice Exports</title>
 <!-- linking bootstrap css (Bootstrap CDN) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--/linking bootstrap css  -->

<link rel="stylesheet" type="text/css" href="./CSS/crm_style.css">

</head>
<body style="background: #424755; color:#F6F6FA">
<!--Header section-->
<header class="header">
	<div class="container" > <!--Bootstrap Container-->
	<div class="row">        <!--bootstrap grid row-->      
    <div class="col-md-4 col-sm-12 col-12 " >   <!--bootstrap grid column layout-->	
		<img src="Images/logo.jpg  " class="ingLogo"  alt="LOGO" style="width:80px; height:80px " 
		 > 
        
    </div>
	<div class="col-md-4 col-12 tect-center">   <!--bootstrap grid column layout-->
		<h2 class="h2 mt-3" >NIPUN SPICE EXPORTS</h2>
		</div>
	<div class="col-md-4 col-12 text-right ">   <!--bootstrap grid column layout-->
         <a class="btn btn-success mt-4 ml-5" href="LogoutCRM.php" role="button">Logout From CRM</a>
	</div>
		
	</div>	<!--/bootstrap grid row--> 

    </div><!--/Bootstrap Container-->
    

    <!--bootstrap navbar  -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" >
         <!-- bootsrtap toggler button for view navbar in sm devices -->
        <a class="navbar-brand" href="./CRM_Interface.php" style="font-family:'Righteous', cursive; ">NSE CRM</a>
    	<button class="navbar-toggler" data-toggle="collapse" data-target="#dp"><span class="navbar-toggler-icon"></span></button> 

         <!-- bootstrap class to view links horizontally -->
         <div class="collapse navbar-collapse justify-content-md-end" id="dp">     
         <ul class="ul navbar-nav" >
         	<li class="nav-item"><a href="./ViewAllCustomers.php" class="nav-link">All Customers</a>          </li>       
         	<li class="nav-item"><a href="./ViewAllProducts.php" class="nav-link">All Products</a>        </li>
         	<li class="nav-item"><a href="./ViewAllPosts.php" class="nav-link">Posts</a>        </li>
            <li class="nav-item"><a href="./ViewPostReport.php" class="nav-link">Post Report</a>    </li>
            <li class="nav-item"><a href="./CustomerSurvey.php" class="nav-link">Surveys</a>         </li>
            <li class="nav-item"><a href="./CRMreports.php" class="nav-link">Reports</a>         </li>
         </ul>

         </div>  <!-- /navbar collapse -->
    </nav>   <!--/bootstrap navbar -->


    	
</header>

<!--End of Header Section-->