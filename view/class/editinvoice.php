<?php
require_once('../../config/db_connect.php');

if($_POST['id']){
  $sql = "UPDATE MasterInvoice SET BillDate = '{$_POST['datepicker']}' WHERE  ID = '{$_POST['id']}'";
			   $retval  = mysqli_query($conn, $sql);
			   if(!$retval) {
			               die('Could not update data: ' . mysqli_error());
			               echo "ไม่สามารถแก้ไขข้อมูลได้";
			            }
			    else{
			    	echo "แก้ไขข้อมูลเรียบร้อยแล้ว";
			    }
}

?>