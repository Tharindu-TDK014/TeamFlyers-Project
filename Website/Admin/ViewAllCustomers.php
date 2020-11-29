<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php require('Include/headerCRM.php'); ?>
<div class="jumbotron" style="background:#9C9B7B ">
<h1 class="head22" align="center">All Customers</h1>

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
		
		 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `customer` ";
				  
					
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

 </div>

<?php require('Include/footerCRM.php'); ?>