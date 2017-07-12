
<?php
session_start();
 if (empty($_SESSION['username'])) {
 header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
 Selamat <b><?php echo $_SESSION['username'] ?></b> Berhasil Masuk <br />
 <a href="logout.php">Klik di sini</a> untuk Keluar

<?php } ?>//----------------------

<html>

 <head>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<Title>ENTRI PEROLEHAN SUARA TPS</Title>
<style type="text/css">
body { background-color: #fff; border-top: solid 10px #000;
color: #333; font-size: .85em; margin: 20; padding: 20;
font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
}h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }h1 { font-size: 2em; }h2 { font-size: 1.75em; }
h3 { font-size: 1.2em; }
table { margin-top: 0.75em; }
th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
 </head><body>
 
<img style="width: 300px; height: 80px;" alt="" src="dapur2.PNG"

 
 <?php
 include "koneksi.php";
?>
  

     
     
     
     
  <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
	
<tr>

<td colspan="5">
	
	
<div id="wb_Form1" style="position:absolute;width:662px;height:202px;">
<form name="masterpenjualan" method="post" action="" enctype="text/plain" target="_self" id="Form1">
<div id="wb_Text2" style="position:absolute;left:20px;top:33px;width:57px;height:16px;z-index:43;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Tanggal</span></div>
<input type="text" id="Editbox2" style="position:absolute;left:96px;top:59px;width:153px;height:19px;line-height:19px;z-index:44;" name="Editbox1" value="">
<div id="wb_Text3" style="position:absolute;left:21px;top:63px;width:74px;height:16px;z-index:45;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No. Faktur</span></div>
<input type="text" id="Editbox3" style="position:absolute;left:95px;top:88px;width:153px;height:19px;line-height:19px;z-index:46;" name="Editbox1" value="">
<div id="wb_Text4" style="position:absolute;left:20px;top:92px;width:74px;height:16px;z-index:47;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pelanggan</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:96px;top:30px;width:155px;height:19px;line-height:19px;z-index:48;" name="Editbox1" value="">
<div id="wb_Text1" style="position:absolute;left:0px;top:0px;width:661px;height:19px;z-index:49;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong>&nbsp;&nbsp; Master Penjualan</strong></span></div>
<div id="wb_Form2" style="position:absolute;left:2px;top:150px;width:660px;height:52px;z-index:50;">
<form name="Form2" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="Form2">
<input type="text" id="Editbox4" style="position:absolute;left:126px;top:21px;width:144px;height:19px;line-height:19px;z-index:32;" name="Editbox1" value="">
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:16px;top:21px;width:102px;height:23px;z-index:33;">
</select>
<input type="text" id="Editbox5" style="position:absolute;left:276px;top:21px;width:106px;height:19px;line-height:19px;z-index:34;" name="Editbox1" value="">
<div id="wb_Text5" style="position:absolute;left:17px;top:3px;width:103px;height:16px;z-index:35;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cari Barang</span></div>
<div id="wb_Text6" style="position:absolute;left:125px;top:3px;width:103px;height:16px;z-index:36;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Nama Barang</span></div>
<div id="wb_Text7" style="position:absolute;left:277px;top:3px;width:103px;height:16px;z-index:37;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Harga @</span></div>
<input type="text" id="Editbox6" style="position:absolute;left:389px;top:21px;width:49px;height:19px;line-height:19px;z-index:38;" name="Editbox1" value="">
<div id="wb_Text8" style="position:absolute;left:389px;top:3px;width:45px;height:16px;z-index:39;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Qty</span></div>
<div id="wb_Text9" style="position:absolute;left:446px;top:4px;width:103px;height:16px;z-index:40;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Jumlah</span></div>
<input type="text" id="Editbox7" style="position:absolute;left:443px;top:21px;width:142px;height:19px;line-height:19px;z-index:41;" name="Editbox1" value="">
<input type="submit" id="Button1" name="" value="Tambah" style="position:absolute;left:593px;top:20px;width:61px;height:25px;z-index:42;" title="Tambahkan Barang !">
</form>
</div>
</form>
</div>
	
	
<form method="post" action ="home.php">

<select name="KODE_KATEGORI" id ="KODE_KATEGORI" onchange="this.form.submit()">

 <option value="">--Kategori--</option>
<?php              
$perintah="SELECT KODE_KATEGORI, KATEGORI FROM TblKategori ORDER BY KODE_KATEGORI";
                $query = sqlsrv_query($conn,$perintah);
                while ($row = sqlsrv_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['KODE_KATEGORI']; ?>">

			    
			    <?php echo $row['KATEGORI']; ?>
                   </option>                
					<?php
             }
                ?>
 

 </select>

<?php
	if(isset($_POST['KODE_KATEGORI'])){

$Kategori1 = $_POST['KODE_KATEGORI'];	
	echo $Kategori1;
	
	}
	?>
	<input type="submit" value="cari" name="cari">
	<input type="text" id="Kategori1" name="Kategori1" value="<?php echo $Kategori1; ?>">

	<input type="text" id="from" name="from" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.from);return false;"/><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.from);return false;"><img name="popcal" align="absmiddle" style="border:none" src="calender/calender.jpeg" width="34" height="29" border="0" alt=""></a>


 </form>

	
 </td>

 </tr>

 </table>

 <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">

 <tr>

 <td style="border: none;padding: 4px;"><b>KODE BARANG</b></td>

 <td style="border: none;padding: 4px;"><b>Nama Barang</b></td>

 <td style="border: none;padding: 4px;"><b>Harga </b></td>

 <td style="border: none;padding: 4px;"><b>Stock</b></td>

 </tr>

<?php    
$perintah1="SELECT KODE_BARANG, Nama_Barang,Harga_Jual,Stock FROM TblBarang WHERE Kategori = $Kategori1 ORDER BY KODE_BARANG";

                $query1 = sqlsrv_query($conn,$perintah1);
                while ($row1 = sqlsrv_fetch_array($query1)) {
    ?>            
             
<tr>

 <td style="border: none;padding: 4px;"><?php echo $row1['KODE_BARANG'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $row1['Nama_Barang'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $row1['Harga_Jual'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $row1['Stock'];?></td>

 </tr>
<?php 
}
	 
?> 
  </table>     
</body>
</html>
