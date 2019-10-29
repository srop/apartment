<?php
$serverName = "EGASVVSQL01"; //serverName\instanceName
$connectionInfo = array( "Database"=>"EGA_SALE", "UID"=>"coordinator", "PWD"=>"P@ssw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>