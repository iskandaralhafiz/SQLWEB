<html>
<head>
<Title>Registration Form</Title>
<style type="text/css">
body { background-color: #fff; border-top: solid 10px #000;
color: #333; font-size: .85em; margin: 20; padding: 20;
font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
}
h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
h1 { font-size: 2em; }
h2 { font-size: 1.75em; }
h3 { font-size: 1.2em; }
table { margin-top: 0.75em; }
th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>
<h1>3UP TEAM BENGKALIS FOR INDONESIA</h1>
<p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
<form method="post" action="index1.php">
ID PENGGUNA <input type="text" name="Kode_Pengguna" id="Kode_Pengguna"/></br>

NAMA PENGGUNA <input type="text" name="Nama_Pengguna" id="Nama_Pengguna"/></br>

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
$Kode_Pengguna = $_POST['Kode_Pengguna'];
$Nama_Pengguna = $_POST['Nama_Pengguna'];

// Insert data
$sql_insert = "INSERT INTO dbo.TblPengguna (Kode_Pengguna, Nama_Pengguna)
VALUES ('$Kode_Pengguna', '$Nama_Pengguna')";
$stmt = $conn->prepare($sql_insert);
//$stmt->bindValue(1, $Kode_Penguna);
//$stmt->bindValue(2, $Nama_Pengguna);
$stmt->execute();
}
catch(PDOException $e) {
   print( "Error connecting to SQL Server" );
die(print_r($e));
}
echo "<h3>Your're registered!</h3>";
}

// Retrieve data
$sql_select = "SELECT * FROM dbo.TblPengguna";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>People who are registered:</h2>";
echo "<table>";
echo "<tr><th>Kode_Pengguna</th>";
echo "<th>Nama_Pengguna</th></tr>";
foreach($registrants as $registrant) {
echo "<tr><td>".$registrant['Kode_Pengguna']."</td>";
echo "<td>".$registrant['Nama_Pengguna']."</td></tr>";

}
echo "</table>";
} else {
echo "<h3>No one is currently registered.</h3>";
}

?>
</body>
</html>
