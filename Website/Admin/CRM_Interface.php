
<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?> 

<?php require('Include/headerCRM.php'); ?>
<?php require('Include/functions.php'); ?>

<hr class="my-2">
<div class="container">
<div class="jumbotron">
	
	<div class="row">	
		<div class="col-2" >
      <div class="card" style="width: 12rem; height:37.5rem; background:#09A841">
        <div class="card-body">
          <H2 style="color:#000000; font-style:italic; font-family: fantasy;"><?php display_greeting() ?></H2>
        </div>
      </div>
        </div>
		<div class="col-6" >
            <img src="Images/crm-trends-header.png" alt="" style="width: 800px; height: 600px;">
     </div>
    </div>
  </div>
</div>

<hr class="my-5">

<?php require('Include/footerCRM.php'); ?>
