<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>
<?php require('Include/headerCRM.php'); ?>

<h1>Promotions</h1>



<?php require('Include/footerCRM.php'); ?>