<?php
$serverName = "quantumcom.database.windows.net"; 
 $connectionInfo = array( "Database"=>"SIMTIFDB", "UID"=>"qdadmin", "PWD"=>"Kafalahajai5654@"); 
 $conn = sqlsrv_connect( $serverName, $connectionInfo); 
 if( $conn === false ) { 
      die( print_r( sqlsrv_errors(), true)); 
 }   
else {
 echo "konek";
}
  $sql = "SELECT * FROM TblPengguna1 WHERE password='ajai' AND username='iskandar'"; 
          
 $stmt = sqlsrv_query( $conn, $sql); 
  $rows = sqlsrv_num_rows($stmt); 
   
if ($rows == 1) {
 echo "ada row";
} else {
  echo "tak ado";
//$error = "Username atau Password belum terdaftar";
}
  
sqlsrv_close( $conn ); // Menutup koneksi
