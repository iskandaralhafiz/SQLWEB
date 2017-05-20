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
<Title>ENTRI PROBLEM RUMAH TANGGA</Title>
<style type="text/css">
body { background-color: #fff; border-top: solid 10px #000;
color: #333; font-size: .85em; margin: 20; padding: 20;
font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
}
h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }h1 { font-size: 2em; }
h2 { font-size: 1.75em; }
h3 { font-size: 1.2em; }
table { margin-top: 0.75em; }
th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>
<h2>QLS INDONESIA | ENTRI PROBLEMATIKA RUMAH TANGGA</h2>
<p>Isi data anda di sini, kemudian click <strong>Submit</strong> untuk Mengirim Masukan Anda.</p>
<form method="post" action="home.php">
 <pre>
STATUS       :<input type="text" name="status" row="40" cols="40" id="status"/></br>
PROBLEMATIKA :<Textarea  name="isi_sms" row="40" cols="40" id="isi_sms"/></textarea> </br> 

<input type="submit" name="submit" value="Submit" />
</form>
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

