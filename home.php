<?php
session_start();
 if (empty($_SESSION['username'])) {
 header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
 Selamat <b><?php echo $_SESSION['username'] ?></b> Berhasil Masuk <br />
 <a href="logout.php">Klik di sini</a> untuk Keluar
<a href="barang.php">Klik di sini</a> nampilkan barang
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
  <table style="text-align: left; width: 620px; height: 60px;" border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td style="width: 170px;">Nama Barang</td>
        <td style="width: 79px;">Harga @</td>
        <td style="width: 63px;">Qty</td>
        <td style="width: 103px;">Jumlah</td>
        <td style="width: 149px;"></td>
      </tr>
      <tr>
        <td style="width: 170px;">
        <select id="TblBarang" name="TblBarang" onChange="this.form.submit();">
                <option value="">Please Select</option> 
                <?php              $perintah="SELECT KODE_BARANG, Nama_Barang,Harga_Jual FROM TblBarang ORDER BY KODE_BARANG";
                $query = sqlsrv_query($conn,$perintah);
                while ($row = sqlsrv_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['KODE_BARANG']; ?>">
                        <?php echo $row['Nama_Barang']; ?>
                    </option>                <?php
                }
                ?>
        <br>
        </td>
        </Select>
   </form>
        <td style="width: 79px;"><input size="15" 
 name="Harga" value ="<?PHP echo "mn" ?>">  
       </td>
       
        <td style="width: 63px;"><input size="5"
 name="qty"></td>
        <td style="width: 103px;"><input size="15"
 name="total"></td>

 <td style="width: 149px;"></td>
      </tr>
    </tbody>
  </table>
  <hr style="width: 100%; height: 2px;">
<table
 style="text-align: left; background-color: white; width: 715px;"
 border="1" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>

     <th style="background-color: rgb(153, 0, 0);"><span
 style="color: white;">No.</span></th>
      <th style="width: 171px; background-color: rgb(153, 0, 0);"><span
 style="color: white;">Nama Barang</span></th>
      <th style="width: 125px; background-color: rgb(153, 0, 0);"><span
 style="color: white;">Harga @</span></th>
      <th style="width: 139px; background-color: rgb(153, 0, 0);"><span
 style="color: white;">Qty</span></th>
      <th style="width: 206px; background-color: rgb(153, 0, 0);"><span

                                                                        style="color: white;">Jumlah</span></th>
    </tr>
    <tr>
      <td></td>
      <td style="width: 171px; background-color: white;"></td>
      <td style="width: 125px; background-color: white;"></td>
      <td style="width: 139px; background-color: white;"></td>
      <td style="width: 206px; background-color: white;"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

<br>





<?php
//Try 
//{
// $conn = new PDO ( "sqlsrv:server = tcp:quantumcom.database.windows.net,1433; Database = SIMTIFDB", "qdadmin", "Kafalahajai5654@");
//$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//}
//catch ( PDOException $e ){
//print( "Error connecting to SQL Server" );
//die(print_r($e));
//}

// Insert registration info

//$stmt = $conn->prepare($sql_insert);
//$stmt->bindValue(1, $Kode_Penguna);
//$stmt->bindValue(2, $Nama_Pengguna);
//$stmt->execute();
//}
//catch(PDOException $e) {
  // print( "Error connecting to SQL Server" );
//die(print_r($e));



 echo $_POST['NoFaktur'];

                                        
                                        
?>

<div id="smallRight"><h3 style="background-color:#A6D44D">Jadwal Dokter</h3>

<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">

<tr>

<td colspan="5">

<form method="post" action="barang.php">

<select name="KODE_KATEGORI">

<option value="" disabled="disabled">--Kategori--</option>

 <?php

 include "koneksi.php";

 

 $a="SELECT * FROM TblKategori";

 $sql=sqlsrv_query($conn,$a);

 while($data=sqlsrv_fetch_array($sql)){

 ?>

 <option value="<?php echo $data['KODE_KATEGORI']?>"><?php echo $data['KATEGORI']?></option>

 <?php

 }

 ?>

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

 <?php

 if(isset($_POST['KODE_KATEGORI'])){

 $sql1 = "select * from TblBarang WHERE Kategori = ".$_POST['KODE_KATEGORI'];

 $q = sq lsrv_query($conn,$sql1);

 while($data1 = sqlsrv_fetch_array($q)){

 ?>

 <tr>

 <td style="border: none;padding: 4px;"><?php echo $data1['KODE_BARANG'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $data1['Nama_Barang'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $data1['Harga_Jual'];?></td>

 <td style="border: none;padding: 4px;"><?php echo $data1['Stock'];?></td>

 </tr>

 <?php

 }

 }

 ?>

  </table>

 </div>


</body>
</html>

