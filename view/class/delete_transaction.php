<?php 
require_once('../../config/db_connect.php');
$now = date("Y-m-d H:i:s");
$year = date("Y");

echo $sql = "DELETE FROM transactionuser WHERE  ID = '{$_GET['id']}'";

 $retval  = mysqli_query($conn, $sql);
			   if(! $retval ) {
			               die('Could not update data: ' . mysqli_error());
			            }
                                    
  echo $sqlchkbill = "SELECT MAX(Month) as month FROM MasterInvoice WHERE Year = '{$year}' AND Room = '{$_GET['room']}' AND BillNumber != ''";
 $retval  = mysqli_query($conn, $sqlchkbill);
         if(! $retval ) {
                     die('Could not update data: ' . mysqli_error());
                  }
$rowchk = mysqli_fetch_array($retval);

 $var = ltrim($rowchk['month'], '0');
                                  
$monthly = array("JanuaryMeter","FebruaryMeter","MarchMeter", "AprilMeter","MayMeter","JuneMeter","JulyMeter","AugustMeter",
    "SeptemberMeter","OctoberMeter","NovemberMeter","DecemberMeter");
 $arrlength=count($monthly);    

for($x=$var;$x<$arrlength;$x++)
  {
 
  //echo $sqldel = "DELETE FROM {$monthly[$x]} WHERE FromTranID = '{$_GET['id']}'";
  echo $sql = "UPDATE {$monthly[$x]}  SET Rental = '',  DateCreated =  '{$now}' WHERE Room = '{$_GET['room']}'";
  echo "<br>";


    $retval  = mysqli_query($conn, $sql);
     if(!$retval ) {
               die('Could not update data: ' . mysqli_error());
            }
  }



?>