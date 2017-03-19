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
  
 $serverName = "quantumcom.database.windows.net"; 
 $connectionInfo = array( "Database"=>"SIMTIFDB", "UID"=>"qdadmin", "PWD"=>"Kafalahajai5654@"); 
 $conn = sqlsrv_connect( $serverName, $connectionInfo); 
 if( $conn === false ) { 
      die( print_r( sqlsrv_errors(), true)); 
 } 

  
// Mencegah MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = sqlsrv_real_escape_string($username);
$password = sqlsrv_real_escape_string($password);
  
// Seleksi Database
//$db = mssql_select_db("tes_db", $connection);
// SQL query untuk memeriksa apakah karyawan terdapat di database?
//$query = mssql_query("select * from TblPengguna1 where password='$password' AND username='$username'", $conn);
//$rows = mssql_num_rows($query);
  
  $sql = "SELECT * FROM TblPengguna1 WHERE password='$password' AND username='$username'"; 
          
 $stmt = sqlsrv_query( $conn, $sql); 
  $rows = sqlsrv_num_rows($stmt); 
   
if ($rows == 1) {
 
$_SESSION['login_user']=$username; // Membuat Sesi/session
header("location: profile.php"); // Mengarahkan ke halaman profil
} else {
  
$error = "Username atau Password belum terdaftar";
}
  
sqlsrv_close( $conn ); // Menutup koneksi
}
}
?>
