<?php session_start();

if(!isset($_SESSION["admin"]))
{
  header('Location:CRM_Login.php');
}
?>

<?php require('Include/headerCRM.php'); ?>

<div class="jumbotron">
<h1 class="head22" align="center">All Posts</h1>

<script src="js/min.js"></script>
<script src="js/pdf.js"></script>
<script>
    $(function(){
         var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

   $('cmd').click(function () {

        var table = tableToJson($('PaymentReport').get(0))
        var doc = new jsPDF('p','pt', 'a4', true);
        doc.cellInitialize();
        $.each(table, function (i, row){
            console.debug(row);
            $.each(row, function (j, cell){
                doc.cell(10, 50,120, 50, cell, i);  // 2nd parameter=top margin,1st=left margin 3rd=row cell width 4th=Row height
            })
        })


        doc.save('sample-file.pdf');
    });
    function tableToJson(table) {
    var data = [];

    // first row needs to be headers
    var headers = [];
    for (var i=0; i<table.rows[0].cells.length; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
    }


    // go through cells
    for (var i=0; i<table.rows.length; i++) {

        var tableRow = table.rows[i];
        var rowData = {};

        for (var j=0; j<tableRow.cells.length; j++) {

            rowData[ headers[j] ] = tableRow.cells[j].innerHTML;

        }

        data.push(rowData);
    }       

    return data;
}
});
</script>

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
		
		 $con = mysqli_connect("localhost: 3308","root","","nse_e_com");
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