<?php
$serverName = "quantumcom.database.windows.net";
$connectionInfo = array( "Database"=>"SIMTIFDB", "UID"=>"qdadmin", "PWD"=>"Kafalahajai5654@");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT username, password
        FROM TblPengguna1";
        
$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

// Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch( $stmt ) === false) {
     die( print_r( sqlsrv_errors(), true));
}

// Get the row fields. Field indeces start at 0 and must be retrieved in order.
// Retrieving row fields by name is not supported by sqlsrv_get_field.
$username = sqlsrv_get_field( $stmt, 0);
echo "$username: ";

$password = sqlsrv_get_field( $stmt, 1);
echo $password;
?> 
