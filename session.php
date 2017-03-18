<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
//$connection = mysql_connect("localhost", "root", "");
Try 
{
$conn = new PDO ( "sqlsrv:server = tcp:quantumcom.database.windows.net,1433; Database = SIMTIFDB", "qdadmin", "Kafalahajai5654@");
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ){
  print( "Error connecting to SQL Server" );
die(print_r($e));
}


// Seleksi Database
//$db = mssql_select_db("tes_db", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mssql_query("select Nama_Pengguna from TblPengguna1 where username='$user_check'", $conn);
$row = mssql_fetch_assoc($ses_sql);
$login_session =$row['Nama_Pengguna'];
if(!isset($login_session)){
mssql_close($conn); // Menutup koneksi
header('Location: index.php'); // Mengarahkan ke Home Page
}
?>
