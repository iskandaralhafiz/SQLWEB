<?php
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Variabel username dan password
$username=$_POST['username'];
$password=$_POST['password'];
// Membangun koneksi ke database
//$connection = mysql_connect("localhost", "root", "");
  Try 
{
$connection = new PDO ( "sqlsrv:server = tcp:quantumcom.database.windows.net,1433; Database = SIMTIFDB", "qdadmin", "Kafalahajai5654@");
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ){
  print( "Error connecting to SQL Server" );
die(print_r($e));
}
  
// Mencegah MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mssql_real_escape_string($username);
$password = mssql_real_escape_string($password);
// Seleksi Database
//$db = mssql_select_db("tes_db", $connection);
// SQL query untuk memeriksa apakah karyawan terdapat di database?
$query = mssql_query("select * from TblPengguna1 where password='$password' AND username='$username'", $connection);
$rows = mssql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Membuat Sesi/session
header("location: profile.php"); // Mengarahkan ke halaman profil
} else {
$error = "Username atau Password belum terdaftar";
}
mssql_close($connection); // Menutup koneksi
}
}
?>
