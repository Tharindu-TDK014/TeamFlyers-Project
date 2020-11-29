<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php require('Include/headerCRM.php'); ?>
<div class="jumbotron" style="background:#94B8EA ">
<h1 class="head22" align="center">Reviewed Customers</h1>

<table class="table table-striped" >
  <tr>
    <td>Num</td>
    <td>Customer Email</td>
    <td>Customer Name</td>
    <td>Reviewed Customer Name</td>
    <td>Product ID</td>
    <td>Given Rating</td>
  </tr>
<?php
		
		 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT C_Email,C_fname,C_lname,C_Name,P_ID,P_Rating FROM `e_com_db`.`customer`, `e_com_db`.`productreview` 
          WHERE `C_fname` = `C_Name`";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
?>

                <tr>
                  <td class="counterCell"></td>
                  <td><?php echo $row['C_Email'] ?></td>
                  <td><?php echo $row['C_fname'],"\n",$row['C_lname'] ?></td>
                  <td><?php echo $row['C_Name'] ?></td>
                  <td><?php echo $row['P_ID'] ?></td>
                  <td><?php echo $row['P_Rating'] ?></td>
                </tr>

        <?php
      }
    }
      ?>
                </table>

 </div>

<?php require('Include/footerCRM.php'); ?>