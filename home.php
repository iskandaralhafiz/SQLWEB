<?php
session_start();
 if (empty($_SESSION['username'])) {
 header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
 Selamat <b><?php echo $_SESSION['username'] ?></b> Berhasil Masuk <br />
 <a href="logout.php">Klik di sini</a> untuk Keluar
<?php } ?>
//----------------------

<html>
<head>
<Title>ENTRI PEROLEHAN SUARA TPS</Title>
<style type="text/css">
body { background-color: #fff; border-top: solid 10px #000;
color: #333; font-size: .85em; margin: 20; padding: 20;
font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
}h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }h1 { font-size: 2em; }
h2 { font-size: 1.75em; }
h3 { font-size: 1.2em; }
table { margin-top: 0.75em; }
th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
 </head><body>
<h3>SIMTIF PILGUB | ENTRI PEROLEHAN SUARA TPS</h3>
<p>Isi data di sini, kemudian click <strong>Submit</strong> untuk Mengirim SUARA TPS.</p>
 
 <?php
 include "koneksi.php";
?>
 
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
 
<form method="post" action="home.php"> <pre>
  <!--KECAMATAN-->
Kecamatan : <select id="tbl_kecamatan" name="tbl_kecamatan">
                <option value="">Please Select</option>
                <?php              $perintah="SELECT KODE_KEC, KECAMATAN FROM tbl_kecamatan ORDER BY KODE_KEC";
                $query = sqlsrv_query($conn,$perintah);
                while ($row = sqlsrv_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['KODE_KEC']; ?>">
                        <?php echo $row['KECAMATAN']; ?>
                    </option>                <?php
                }
                ?>
            </select>
 <!--DESA-->
Desa      : <select id="tbl_desa" name="tbl_desa">
                <option value="">Please Select</option>
                <?php 
             $perintah1="SELECT * FROM tbl_desa INNER JOIN tbl_kecamatan ON tbl_desa.KECAMATAN = tbl_kecamatan.KODE_KEC ORDER BY KODE_DESA";
                $query1 = sqlsrv_query($conn,$perintah1);
                while ($row1 = sqlsrv_fetch_array($query1)) {                ?>
                    <option id="tbl_desa" class="<?php echo $row1['KODE_KEC']; ?>" value="<?php echo $row1['KODE_DESA']; ?>">
                        <?php echo $row1['DESA']; ?>

                    </option>

<?php
                }
                ?>
            </select>
     <!--TPS-->
TPS       : <select id="tbl_tps1" name="tbl_tps1">
                <option value="">Please Select</option>
                <?php 
             $perintah2="SELECT * FROM tbl_tps1 INNER JOIN tbl_desa ON tbl_tps1.DESA = tbl_desa.KODE_DESA ORDER BY KODE_TPS";
                $query2 = sqlsrv_query($conn,$perintah2);
                while ($row2 = sqlsrv_fetch_array($query2)) {
                ?>
                    <option id="tbl_tps1" class="<?php echo $row2['KODE_DESA']; ?>" value="<?php echo $row2['KODE_TPS']; ?>">
                       <?php echo $row2['KODE_TPS']; ?>

                    </option>
                <?php
                }
                ?>
            </select>
_____________________________________________
            CALON 1
            <input name="C1" type="text" size="10" maxlength="10">
            CALON 2
            <input name="C2" type="text" size="10" maxlength="10">
            CALON 3
            <input name="C3" type="text" size="10" maxlength="10">
_____________________________________________
 </form>
 <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#tbl_desa").chained("#tbl_kecamatan");
            $("#tbl_tps1").chained("#tbl_desa");
        </script>


<?php
Try 
{
$conn = new PDO ( "sqlsrv:server = tcp:quantumcom.database.windows.net,1433; Database = SIMTIFDB", "qdadmin", "Kafalahajai5654@");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ){
  print( "Error connecting to SQL Server" );
die(print_r($e));
}

// Insert registration info
if(!empty($_POST)) {
try {
$status = $_POST['status'];
$isi_sms = $_POST['isi_sms'];

// Insert data
$sql_insert = "INSERT INTO dbo.Tbl_SAKINAH (status, isi_sms)
VALUES ('$status', '$isi_sms')";
$stmt = $conn->prepare($sql_insert);
//$stmt->bindValue(1, $Kode_Penguna);
//$stmt->bindValue(2, $Nama_Pengguna);
$stmt->execute();
}
catch(PDOException $e) {
   print( "Error connecting to SQL Server" );
die(print_r($e));
}
echo "<h3>Data berhasil dirkirim!</h3>";
}

// Retrieve data
$sql_select = "SELECT * FROM dbo.Tbl_SAKINAH";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>HASIL SURVEY PROBLEMATIKA RUMAH TANGGA:</h2>";
echo "<table>";
echo "<tr><th>STATUS</th>";
echo "<th>PROBLEMATIKA</th></tr>";
foreach($registrants as $registrant) {
echo "<tr><td>".$registrant['status']."</td>";
echo "<td>".$registrant['isi_sms']."</td></tr>";

}
echo "</table>";
} else {
echo "<h3>Data Gagal dikirim.</h3>";
}

?>
</body>
</html>

