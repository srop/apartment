<?php  

error_reporting(-1);
ini_set('display_errors', 'On');   
/*$objConnect = mssql_connect("172.17.17.175","coordinator","P@ssw0rd");           
if($objConnect)           
{           
echo "Connected. ";           
}           
else           
{           
echo "Connect Failed. ";           
}           
mssql_select_db('EGA_SALE');*/           
           
$hostname = "172.17.17.175";           
$username = "coordinator";           
$password = "P@ssw0rd";           
$dbName = "EGA_SALE";           
           
$objConnect = mssql_connect($hostname,$username,$password) or DIE("DATABASE FAILED TO RESPOND.");           
mssql_select_db($dbName) or DIE("Database unavailable");           
 if($objConnect)           
{           
echo "Connected. ";           
}           
else           
{           
echo "Connect Failed. ";           
}           
           
$ql = mssql_query("select * from view_crmt_coordinator");//view_crmt_coordinator           
if (!mssql_num_rows($ql))           
{           
           echo 'No records found';           
}           
else           
{           
           echo 'have records found';           
}           
/*echo $numrow = mssql_num_rows($ql);           
           
if ($numrow==0) {           
           
  echo "No OK";           
} else {           
  echo "ok";           
}*/           
           
mssql_close($objConnect);           
           
?>