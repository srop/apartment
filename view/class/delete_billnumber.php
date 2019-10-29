<?php require_once('../../config/db_connect.php');
var_dump($_GET);$now = date("Y-m-d H:i:s");
echo $sql_del = "SELECT SUM(PricePerUnitW*(EndWater - StartWater)+ PricePerUnitEL*(EndElectric - StartElectric)+Etc+PriceRoom) as Total, ID,Room,BillNumber,BillDate FROM MasterInvoice WHERE ID  = '{$_GET['id']}'";
$rs_del = mysqli_query($conn, $sql_del) or die("employee-grid-data.php: get employees");
$row_del = mysqli_fetch_array($rs_del);

var_dump($row_del);
echo $sql = "INSERT INTO BillDeleted( ID,BillNumber,BillDate,Summary, Room,DateCreated) VALUES "
        . " ('', '{$row_del['BillNumber']}','{$row_del['BillDate']}','{$row_del['Total']}','{$row_del['Room']}','$now')";
        $retval  = mysqli_query($conn, $sql); 
        if(!$retval ) {   die('Could not update data: ' . mysqli_error());        
        } 
//$sql = "DELETE BillNumber FROM MasterInvoice WHERE  ID = '{$_GET['id']}'"; 
echo $sql1 = "UPDATE MasterInvoice SET BillNumber = '' ,BillDate = '0000-00-00'  WHERE  ID = '{$_GET['id']}'";
   $retval  = mysqli_query($conn, $sql1);	
     if(!$retval) {
      die('Could not update data: ' . mysqli_error());	
  }
  ?>