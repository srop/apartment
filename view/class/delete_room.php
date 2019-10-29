<?php 
require_once('../../config/db_connect.php');

var_dump($_GET);

 $sql = "DELETE FROM masterroom WHERE  ID = '{$_GET['id']}'";

			   $retval  = mysqli_query($conn, $sql);
			   if(!$retval) {
			               die('Could not update data: ' . mysql_error());
			            }
?>
