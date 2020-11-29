<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>
<?php require('Include/headerCRM.php'); ?>

<div class="jumbotron" style="background:#9C9B7B ">
<h1 class="head22" align="center">All Posts</h1>


<table class="table table-dark" >
  <tr>
    <td>Num</td>
    <td>Post ID</td>
    <td>Customer's Email</td>
    <td>Post Type</td>
    <td>Post Date</td>
    <td>Message</td>
    <td>Action</td>
  </tr>
<?php
		
		 $con = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
		if(!$con)
		{	
			die("Cannot connect to DB server");	
		}
				  
				  $sql ="SELECT * FROM `post` ";
				  
					
		$result = mysqli_query($con,$sql);
			
		if(mysqli_num_rows($result)> 0)
	{
			while($row = mysqli_fetch_assoc($result))
			{
			
?>

                <tr>
                  <td class="counterCell"></td>
                  <td><?php echo $row['Post_ID'] ?></td>
                  <td><?php echo $row['C_Email'] ?></td>
                  <td><?php echo $row['Post_Type'] ?></td>
                  <td><?php echo $row['Post_Date'] ?></td>
                  <td><?php echo $row['Message'] ?></td>
                  <td><a class="btn btn-primary" href="mailto:nipunspiceexports@gmail.com" role="button">Reply</a></td>
                </tr>

        <?php
      }
    }
      ?>
                </table>

 </div>


<?php require('Include/footerCRM.php'); ?>