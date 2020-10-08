<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php require('Include/headerCRM.php'); ?>

<div class="jumbotron" style="background:#9C9B7B ">
<h1 class="head22" align="center">Payment Reports</h1>

<div id="table">
	

<table id="PaymentReport" class="table table-dark" >
  <tr>
    <td>Num</td>
    <td>Customer Email</td>
    <td>Order ID</td>
    <td>Ship ID</td>
    <td>Date</td>
    <td>Payment</td>
  </tr>
<?php
		
		 $con = mysqli_connect("localhost: 3308","root","","e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `payment` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
?>

                <tr>
                  <td class="counterCell"></td>
                  <td><?php echo $row['C_Email'] ?></td>
                  <td><?php echo $row['Order_ID'] ?></td>
                  <td><?php echo $row['Ship_ID'] ?></td>
                  <td><?php echo $row['TimeStamp'] ?></td>
                  <td><?php echo $row['TotalAmount'] ?></td>
                </tr>

        <?php
      }
    }
      ?>
                </table>
        <button id="cmd" type="button" class="btn btn-success">Create a PDF</button>
</div>
 </div>




<?php require('Include/footerCRM.php'); ?>