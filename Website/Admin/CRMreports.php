<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php
function fetch_data()
{
  $output = ""; //store table data as HTML format return variable in function
  $connect = mysqli_connect("localhost","id15543581_root","rsmkds@123AA","id15543581_e_com_db");
  $sql ="SELECT * FROM `payment` ORDER BY Invoice_No ASC";
  $result = mysqli_query($connect,$sql);
  while($row = mysqli_fetch_array($result))
  {
    $output .= ' <tr>

                  <td>'. $row['Invoice_No'].' </td>
                  <td>'. $row['C_Email'].'</td> 
                  <td>'. $row['Order_ID'].'</td>
                  <td>'. $row['Ship_ID'].'</td>
                  <td>'. $row['TimeStamp'].'</td>
                  <td>'. $row['TotalAmount'].'</td>

    </tr>


     ';
  }

  return $output;

} 
if(isset($_POST["create PDF"]))

{
  require_once("tcpdf_min/tcpdf.php");
  $obj_pdf = new TCPDF('P', PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj_pdf->SetCreator(PDF_CREATOR);
  $obj_pdf->SetTitle("NSE PAYMENT REPORT");
  $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetDefaultMonospaceedFont('helvetica');
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf->SetMargin(PDF_MARGIN_LEFT,'5',PDF_MARGIN_LEFT);
  $obj_pdf->SetPrintHeader(false);
  $obj_pdf->SetPrintFooter(false);
  $obj_pdf->SetAutoPageBreak(TRUE,10);
  $obj_pdf->SetFont('helvetica','',12);

  $content='';

  $content.= ' <h3 align="center">NSE Payment Report PDF</h3>
  <table border="1" cellspacing="0" cellpadding="5">
  <tr>
                    <th width="5%">Invoice_No</th>
                    <th width="40%">C_Email</th>
                    <th width="10%">Order_ID</th> 
                    <th width="10%">Ship_ID</th> 
                    <th width="20%">TimeStamp</th> 
                    <th width="15%">TotalAmount</th> 

  </tr>
  ' ;
  $content .= fetch_data();

  $content .= '</table>';

  $obj_pdf->WriteHTML($content);
  $obj_pdf->Output("Sample PDF","I");


}

 ?>

<?php require('Include/headerCRM.php'); ?>

<div class="jumbotron" style="background:#9C9B7B ">
<h1 class="head22" align="center">Payment Reports</h1>
<form method="post" >

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
        <?php 
         fetch_data();
         ?>
        
        <input type="submit"  onclick="window.print();" name="create PDF" class="btn btn-success" value="Create PDF"/>
        </form>
</div>
 </div>



<?php require('Include/footerCRM.php'); ?>