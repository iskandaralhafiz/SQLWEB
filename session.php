<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
//$connection = mysql_connect("localhost", "root", "");

$serverName = "quantumcom.database.windows.net";
$connectionInfo = array( "Database"=>"SIMTIFDB", "UID"=>"qdadmin", "PWD"=>"Kafalahajai5654@");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

// Seleksi Database
//$db = mssql_select_db("tes_db", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc


$ses_sql= sqlsrv_query($conn,"select Nama_Pengguna from TblPengguna1 where username='$user_check'");
$row =sqlsrv_fetch($ses_sql);
$login_session =$row['Nama_Pengguna'];
if(!isset($login_session)){
sqlsrv_close( $conn ); // Menutup koneksi
header('Location: index.php'); // Mengarahkan ke Home Page
}
?>
