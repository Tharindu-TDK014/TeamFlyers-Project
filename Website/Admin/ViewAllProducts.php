<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php require('Include/headerCRM.php'); ?>

<div class="jumbotron" style="background:#9C9B7B"> 
<h1 class="head22" align="center">All Products</h1>

<table class="table" >
  <tr bgcolor="#5B8C43">
    <td>Num</td>
    <td>Product ID</td>
    <td>Product Qty</td>
    <td>Product Name</td>
    <td>Product Type</td>
    <td>Product Description</td>
    <td>Product Price</td>
    <td>Product Manufacture Date</td>
    <td>Product Expiary Date</td>
    <td>Product Stock ID</td>
    <td>Product Offer Price</td>
  </tr>
<?php
		
		 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `product` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
?>

                <tr>
                  <td class="counterCell"></td>
                  <td><?php echo $row['P_ID'] ?></td>
                  <td><?php echo $row['P_Qty'] ?></td>
                  <td><?php echo $row['P_Name'] ?></td>
                  <td><?php echo $row['P_Type'] ?></td>
                  <td><?php echo $row['P_Description'] ?></td>
                  <td><?php echo $row['P_Price'] ?></td>
                  <td><?php echo $row['P_ManDate'] ?></td>
                  <td><?php echo $row['P_ExpDate'] ?></td>
                  <td><?php echo $row['Stock_ID'] ?></td>
                  <td><?php echo $row['P_OfferPrice'] ?></td>
                </tr>

        <?php
      }
    }
      ?>
                </table>

              </div>

<?php require('Include/footerCRM.php'); ?>