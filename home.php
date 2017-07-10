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

<form method="post" action="home.php">

<select name="KODE_KATEGORI" id ="KODE_KATEGORI">

<option value="">--Kategori--</option>

 

 </select>

 <input type="submit" value="cari">

 </form>

 </td>

 </tr>

 </table>

 <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">

 <tr>

 <td style="border: none;padding: 4px;"><b>Hari</b></td>

 <td style="border: none;padding: 4px;"><b>Jam</b></td>

 <td style="border: none;padding: 4px;"><b>Dokter</b></td>

 <td style="border: none;padding: 4px;"><b>Keterangan</b></td>

 </tr>

 

 <tr>

 <td style="border: none;padding: 4px;"><?php echo $data1['KODE_BARANG'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $data1['Nama_Barang'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $data1['Harga_Jual'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $data1['Stock'];?></td>

 </tr>

 

  </table>     




</body>
</html>

