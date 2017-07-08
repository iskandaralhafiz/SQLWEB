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
 
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
 
<form method="post" action="home.php"> 
   <table style="text-align: left; width: 401px; height: 194px;"
 border="0" cellpadding="2" cellspacing="2">
    <tbody>      <tr>
        <td colspan="2" rowspan="1"
 style="width: 119px; background-color: rgb(153, 0, 0);"><span
 style="color: white;">ENTRI PENJUALAN</span></td>
      </tr>
      <tr>
        <td style="width: 119px;">No Faktur</td>
        <td style="width: 297px;"><input size="30"
 name="NoFaktur"></td>
      </tr>
      <tr>
        <td style="width: 119px;">Tanggal</td>
        <td style="width: 297px;"><input size="30"
 name="Tanggal"></td>
      </tr>
      <tr>
        <td style="width: 119px;">Pelanggan</td>
        <td style="width: 297px;">
        <select name="Pelanggan">
        </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" rowspan="1"
 style="width: 119px;"><input name="submit"
 value="Reset Form Penjualan" type="reset"></td>
      </tr>
    </tbody>
  </table>
  <table style="text-align: left; width: 620px; height: 60px;"
 border="0" cellpadding="2" cellspacing="2">
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
        <select id="TblBarang" name="TblBarang">
                <option value="">Please Select</option>
                <?php              $perintah="SELECT KODE_BARANG, Nama_Barang FROM blBarangn ORDER BY KODE_BARANG";
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
        <td style="width: 79px;"><input size="15"
 name="Harga"></td>
        <td style="width: 63px;"><input size="5"
 name="qty"></td>
        <td style="width: 103px;"><input size="15"
 name="total"></td>
        <td style="width: 149px;"><input name="submit"
 value="Tambah" type="submit"></td>
      </tr>
    </tbody>
  </table>
  <hr style="width: 100%; height: 2px;"></form>
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

 </form>



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
if(!empty($_POST)) {
//try {
$C1 = $_POST['C1'];
$C2 = $_POST['C2'];
$C3 = $_POST['C3'];
$TPS = $_POST['tbl_tps1']; 
 
 // Insert data
$sql_insert = "INSERT INTO dbo.tbl_pemilu (KODE_TPS,C1,C2,C3) VALUES ('$TPS',$C1, $C2,$C3)";
 
$query3 = sqlsrv_query($conn,$sql_insert);
sqlsrv_execute($query3);
 
 $sql_insert1 = "INSERT INTO dbo.tbl_rc (KODE_TPS,ID_KAN,SUARA) VALUES ('$TPS',1, $C1)";
 $sql_insert2 = "INSERT INTO dbo.tbl_rc (KODE_TPS,ID_KAN,SUARA) VALUES ('$TPS',2, $C2)";
 $sql_insert3 = "INSERT INTO dbo.tbl_rc (KODE_TPS,ID_KAN,SUARA) VALUES ('$TPS',3, $C3)";
 
 $query31 = sqlsrv_query($conn,$sql_insert1);
sqlsrv_execute($query31);
 
 $query32 = sqlsrv_query($conn,$sql_insert2);
sqlsrv_execute($query32);
 
 $query33 = sqlsrv_query($conn,$sql_insert3);
sqlsrv_execute($query33);
 
//$stmt = $conn->prepare($sql_insert);
//$stmt->bindValue(1, $Kode_Penguna);
//$stmt->bindValue(2, $Nama_Pengguna);
//$stmt->execute();
//}
//catch(PDOException $e) {
  // print( "Error connecting to SQL Server" );
//die(print_r($e));
 echo "<h3>Data berhasil dirkirim!</h3>";
}
 


sqlsrv_close($conn);

?>
</body>
</html>

