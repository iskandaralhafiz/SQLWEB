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
<h1>ENTRI DATA USER di sini PAK HAJI AKMAL Oii!</h1>
<p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
<form method="post" action="index.php">
ID PENGGUNA <input type="text" name="Kode_Pengguna" id="Kode_Pengguna"/></br>

NAMA PENGGUNA <input type="text" name="Nama_Pengguna" id="Nama_Pengguna"/></br>

<input type="submit" name="submit" value="Submit" />
</form>
<?php
Try 
{
$conn = new PDO ( "sqlsrv:server = tcp:quantumcom.database.windows.net,1433; Database = DAPURPR", "qdadmin", "Kafalahajai5654@");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$tsql = "SELECT [Nama_Pengguna] FROM dbo.TblPengguna";  
 $getProducts = sqlsrv_query($conn, $tsql);
 while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))  
              
                echo($row['Nama_Pengguna']);  
                echo("<br/>");  
sqlsrv_free_stmt($getProducts);  
            sqlsrv_close($conn);  

}
catch ( PDOException $e ){
  print( "Error connecting to SQL Server" );
die(print_r($e));
}

echo "koneksi sukses"
      
?>
</body>
</html>
