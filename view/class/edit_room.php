<?php 




require_once('../../config/db_connect.php');
  require ('../../method/thaidate.php');
 if($_GET['action'] = 'deleted'){
 	var_dump($_POST);
 }
 if($_POST['action'] = 'edit'){

		 	var_dump($_POST);
		
		 	$now = date("Y-m-d H:i:s");


		 
	/*	if(strpos($_POST['std'],"/") && $_POST['StartDate']  == ""){
		//	$StartDate = preg_replace('~^([0-9]{2})/([0-9]{2})/([0-9]{4})$~','$3-$2-$1', $_POST['std']);

			$StartDate =	ConvDateTHtoEn($_POST['std']);
		}
		

		if(strpos($_POST['end'],"/")  && $_POST['EndDate']  == "0000-00-00"){
				$EndDate =	ConvDateTHtoEn($_POST['end']);
		}
		if(strpos($_POST['EndDate'],"-")){
			$EndDate = $_POST['EndDate'];
		}

		echo $EndDate; echo $StartDate;

	exit('xxxxx');*/
			
				echo $sql = "UPDATE masterroom SET Room = '{$_POST['Room']}' ,Price = '{$_POST['Price']}'  ,Floor =  '{$_POST['Floor']}' , Status =  '{$_POST['Status']}' , Detail =  '{$_POST['Detail']}'
			 ,DateModified = '$now' WHERE ID = '{$_POST['Id']}'";
			
			//  $retval =  mysql_query($sql);
		 $retval  =mysqli_query($conn, $sql);
			  if(! $retval ) {
			              die('Could not update data: ' . mysql_error());
			           }
 }
 

?>