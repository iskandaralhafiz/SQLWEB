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
  $sql = "SELECT username, Password FROM TblPengguna1"; 
          
 $stmt = sqlsrv_query( $conn, $sql, array()); 
  $row_count = sqlsrv_num_rows( $stmt); 
   
if ( $row_count === false) {
   echo "Error in retrieveing row count.";
}
 else {
   echo $row_count;
 }

//if ($rows == 1) {
 //echo "ada row";
//} else {
 // echo "tak ado";
//$error = "Username atau Password belum terdaftar";

  
sqlsrv_close( $conn); // Menutup koneksi
