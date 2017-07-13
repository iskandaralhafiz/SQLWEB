<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>Entri Penjualan</title>

</head><body><img alt="" src="dapur2.PNG" style="height: 75px; width: 340px" /><br />
&nbsp;
	 <?php
 include "koneksi.php";
?>
<form action="masterpenjualan.php" method="post">
<table border="0" cellpadding="2" cellspacing="2" style="height: 194px; width: 430px; text-align: left">
	<tbody>
		<tr>
			<td colspan="2" style="width: 119px; background-color: rgb(153,0,0)"><span style="font-family: verdana,geneva,sans-serif"><strong><span style="color: white">ENTRI&nbsp;PENJUALAN</span></strong></span></td>
		</tr>
		<tr>
			<td style="width: 119px">No Faktur</td>
			<td style="width: 297px"><input name="NoFaktur" size="30" type="text" /></td>
		</tr>
		<tr>
			<td style="width: 119px">Tanggal</td>
			<td style="width: 297px"><input name="Tanggal" size="30" type="text" /></td>
		</tr>
		<tr>
			<td style="width: 119px">Pelanggan</td>
			<td style="width: 297px"><select name="Pelanggan"></select></td>
		</tr>
		<tr>
			
			<?php
	if(isset($_POST['NoFaktur'])) {

$NoFaktur = $_POST['NoFaktur'];
$Tanggal = $_POST['Tanggal'];
$Pelanggan = $_POST['Pelanggan'];
		echo $NoFaktur;
	echo $Tanggal;
	$sql_insert = "INSERT INTO dbo.TblPenjualan (NO_FAKTURJ, Tanggal) VALUES ('$NoFaktur','$Tanggal')";
$query3 = sqlsrv_query($conn,$sql_insert);
sqlsrv_execute($query3);
echo "<h3>Data berhasil dirkirim!</h3>";	
	
	}
		sqlsrv_close($conn);	
	?>	
			<td colspan="2" style="width: 119px"><input name="submit" type="submit" value="Detil Penjualan" /></td>
		</tr>
	</tbody>
</table>

<hr style="height: 2px; width: 100%" />
	</form>



<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
