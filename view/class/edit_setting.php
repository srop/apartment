<?php
require_once('../../config/db_connect.php');

$id = array();
$price = array();
$status = array();
var_dump($_REQUEST['status']);
$id = $_POST['id'];
$status = $_REQUEST['status'];
$price = $_REQUEST['price'];
echo "<br>";
var_dump($price);
echo $totalUsername = sizeof($id);
$last = $totalUsername-1;
		 	$now = date("Y-m-d H:i:s");
for($i=0;$i<$totalUsername;$i++) {

    $InsertID = $id[$i];
    $InsertStatus = $status[$i];
    $InsertPrice = $price[$i];

 
 
			echo	 $sql = "UPDATE mastersetting SET Price = '{$InsertPrice}' ,Status = '{$InsertStatus}' ,DateModified = '{$now}' WHERE ID = '{$InsertID}'";
			
			 	 $retval  = mysqli_query($conn, $sql);
			  if(!$retval ) {
			              die('Could not update data: ' . mysqli_error());
			           }
                   if($i == $last){
                       
                       $sqlchk = "SELECT count(*)  as Num FROM Tmp";
                       $rs = mysqli_query($conn, $sqlchk) or die("employee-grid-data.php: get employees");
                        $row = mysqli_fetch_array($rs);
                       echo $row['Num'];
                       if($row['Num'] == "0"){
                              echo $sql = "INSERT INTO Tmp (BillUpdate) VALUES('$price[$last]') ";  
				 $retval  = mysqli_query($conn, $sql);
				  if(!$retval ) {
				               die('Could not update data: ' . mysql_error());
	            


				}
                       }
                       else{
                            echo    $sql = "UPDATE Tmp SET BillUpdate = '$price[$last]' WHERE ID = '1'";

                                        $retval  = mysqli_query($conn, $sql);
                                     if(!$retval ) {
                                                 die('Could not update data: ' . mysqli_error());
                                              }

                           }
                   }


}

/*$ids = array();
$statuses = array();
$prices = array();

$ids = $_POST['id'];
$statuses = $_POST['status'];
$prices =  $_POST['price'];

$items = array();

echo $size = count($ids);

for($i = 0 ; $i < $size ; $i++){
   
   $items[$i]= array(
        "ids"     => $ids[$i], 
        "statuses"    => $statuses[$i],
        "prices"       => $prices[$i]
    );
}

var_dump(items);*/



?>