<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
</head>

<body>
	
	<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="main.php">Contact Us</a>
      
      </div>
  
  </nav>
	
	<!-- Page Content -->
	<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1>Contact Details
       </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="main.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d943.7089931474553!2d80.1408155024893!3d6.276674363968933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae17f46b6d71af5%3A0xfaf3305f351e000f!2sSathosa%20Kurundugaha!5e1!3m2!1sen!2slk!4v1605355117255!5m2!1sen!2slk" width="750" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
	    </iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
          390/3 Kurudugaha hathekma, 
          <br>Elpitiya,
			<br>Sri Lanka
          <br>
        </p>
        <p>
			<i class="fas fa-mobile"> (+94) 757170784 </i>
         
        </p>
        <p>
          <i class="fas fa-envelope-square -envelope"><a href="#">nipun@nipunspice.lk</a> </i>
          
          
        </p>
		  <p>
		  <i class="fas fa-male">: Monday - Saturday: 9:00 AM to 5:00 PM</i>
       	 </p>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->

    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
     	<form id="formmsg" name="formmsg" method="post" action="postmsg.php" >
			<input type="radio" name="rdotype" value="Help" id="rdotype_0" class="rdo1"/>
          Help
			<input type="radio" name="rdotype" value="Complain" id="rdotype_1" class="rdo2" />
          Complain
          
         <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" id="txtEmail" name="txtEmail" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="5" cols="100" class="form-control" id="txtMsg" name="txtMsg"  maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
			
			<div class="control-group form-group">
            <div class="controls">
              <label>Insert a Image</label>
              <input type="file" name="file" id="file">
            </div>
          </div>
			
			
          
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="btnSubmit">Send Message</button>
       </form>
      </div>

    </div>
    <!-- /.row -->
		
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; TeamFlyers</p>
    </div>
    <!-- /.container -->
  </footer>

  

</body>

</html>
	
	

