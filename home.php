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
  
<form method="POST" action="home.php"> 
  <table style="text-align: left; width: 401px; height: 194px;"
 border="0" cellpadding="2" cellspacing="2">
    <tbody>      <tr>
      <td colspan="2" rowspan="1"
 style="width: 119px; background-color: rgb(153, 0, 0);"><span
 style="color: white;">ENTRI PENJUALAN</span></td>
      </tr>
   <tr>
        <td style="width: 119px;">No Faktur</td>
        <td style="width: 297px;"><input type = "text" size="30"name="NoFaktur" id ="NoFaktur"></td>
      </tr>
      <tr>
       <td style="width: 119px;">Tanggal</td>
        <td style="width: 297px;"><input size="30"
 name="Tanggal"></td>
     </tr>
      <tr>
        <td style="width: 119px;">Pelanggan</td>
        <td style="width: 297px;">
       <select name="Pelanggan">        </select>
        </td>
     </tr>
      <tr>
        <td colspan="2" rowspan="1"
 style="width: 119px;"></td>
     </tr><input name="submit"
 value="Tambah" type="submit">
    </tbody>
 </table>
  
        
   </form>
       




</body>
</html>

