<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php require('Include/headerCRM.php'); ?>

<div class="jumbotron" style="background:#9C9B7B ">
<h1 class="head22" align="center">Product Review</h1>

<table class="table " >
  <tr bgcolor="#119266">
    <td>Num</td>
    <td>Review ID</td>
    <td>Product ID</td>
    <td>Customer Email</td>
    <td>Product Review</td>
    <td>Product Rating</td>
  </tr>
<?php
		
		 $con = mysqli_connect("localhost: 3308","root","","e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `productreview` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
?>

                <tr>
                  <td class="counterCell"></td>
                  <td><?php echo $row['Review_ID'] ?></td>
                  <td><?php echo $row['P_ID'] ?></td>
                  <td><?php echo $row['C_Email'] ?></td>
                  <td><?php echo $row['P_Review'] ?></td>
                  <td><?php echo $row['P_Rating'] ?></td>
                </tr>

        <?php
      }
    }
      ?>
                </table>

 </div>


<?php require('Include/footerCRM.php'); ?>