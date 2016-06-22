<html>
<head>
<Title>Registration Form</Title>
</head>
<body>
<h1>ENTRI DATA USER di sini!</h1>
<p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
<form method="post" action="index.php">
ID PENGGUNA <input type="text" name="Kode_Pengguna" id="Kode_Pengguna"/></br>
NAMA <input type="text" name="Nama_Pengguna" id="Nama_Pengguna"/></br>
<input type="submit" name="submit" value="Submit" />
</form>
<?php
// DB connection info
//TODO: Update the values for $host, $user, $pwd, and $db
//using the values you retrieved earlier from the portal.
$host = "tcp:quantumcom.database.windows.net,1433 ;
$user = "qdadmin";
$pwd = "Kafalahajai5654@";
$db = "DAPURPR";
// Connect to database.
try {
$conn = new PDO( "sqlsrv:server=$host;database=$db", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
die(print_r($e));
}
// Insert registration info
if(!empty($_POST)) {
try {
$Kode_Pengguna = $_POST['Kode_Pengguna'];
$Nama_Pengguna = $_POST['Nama_Pengguna'];

// Insert data
$sql_insert = "INSERT INTO dbo.TblPengguna (Kode_Pengguna, Nama_Pengguna)
VALUES (?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $Kode_Pengguna);
$stmt->bindValue(2, $Nama_Pengguna);

$stmt->execute();
}
catch(PDOException $e) {
die(print_r($e));
}
echo "<h3>Your're registered!</h3>";
}
// Retrieve data
$sql_select = "SELECT Kode_Pengguna, Nama_Pengguna FROM dbo.TblPengguna";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>People who are registered:</h2>";
echo "<table>";
echo "<tr><th>ID PENGGUNA</th>";
echo "<th>NAMA</th>";
foreach($registrants as $registrant) {
echo "<tr><td>".$registrant['Kode_Pengguna']."</td>";
echo "<td>".$registrant['Nama_Pengguna']."</td>";


}
echo "</table>";
} else {
echo "<h3>No one is currently registered.</h3>";
}
?>
</body>
</html>
