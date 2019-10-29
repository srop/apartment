<?php 


require_once('../../config/db_connect.php');
  require ('../../method/thaidate.php');
 if($_GET['action'] = 'deleted'){
 	var_dump($_POST);
 }
 if($_POST['action'] = 'edit'){

		 	var_dump($_POST);
		
		 	$now = date("Y-m-d H:i:s");


		 	/*if($_POST['StatusChk']){
		 		$status = 0;
		 	}else{
		 		$status = 1;
		 	}*/
		 	if($_POST['monthedit'] && ($_POST['dayedit']) && ($_POST['yearedit'])){
		 		$year = $_POST['yearedit']-543;
		 		$dateupdate = $year."-".$_POST['monthedit']."-".$_POST['dayedit'];
		 		 $dateupdate = date('Y-m-d', strtotime($dateupdate)); 
		 		//($_POST['year'])-543
		 		//echo $dateupdate = ($_POST['year'])-543."-".$_POST['month']."-".$_POST['day'];
		 		
		 	
		 	}else {
		 		 $dateupdate  = $_POST['startdate2'];
		 		# code...
		 	}

		 	if($_POST['monthend'] && ($_POST['dayend']) && ($_POST['yearend'])){
		 		 $yearend = $_POST['yearend']-543;
		 		 $enddate = $yearend."-".$_POST['monthend']."-".$_POST['dayend'];
		 		 $EndDate = date('Y-m-d', strtotime($enddate)); 
		 		//($_POST['year'])-543
		 		//echo $dateupdate = ($_POST['year'])-543."-".$_POST['month']."-".$_POST['day'];
		 		
		 	
		 	}


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
			if($_POST['monthedit'] && ($_POST['dayedit']) && ($_POST['yearedit'])){
			 	echo $sql = "UPDATE masterrental SET Title = '{$_POST['Title']}' ,IDCard = '{$_POST['IDCard']}'  ,FName =  '{$_POST['FName']}' , LName =  '{$_POST['LName']}' , Address =  '{$_POST['AddressEdit']}', 
			 DateModified = '$now' , Status = '{$_POST['StatusChk']}', EndDate = '$EndDate' ,StartDate = '$dateupdate' WHERE id = '{$_POST['Id']}'";
			}else {
				echo $sql = "UPDATE masterrental SET Title = '{$_POST['Title']}' ,IDCard = '{$_POST['IDCard']}'  ,FName =  '{$_POST['FName']}' , LName =  '{$_POST['LName']}' , Address =  '{$_POST['AddressEdit']}', 
			 DateModified = '$now' , Status = '{$_POST['StatusChk']}', EndDate = '$EndDate'  WHERE id = '{$_POST['Id']}'";
			}

			//  $retval =  mysql_query($sql);
			 $retval  =mysqli_query($conn, $sql);
			  if(! $retval ) {
			              die('Could not update data: ' . mysql_error());
			           }
                     if($_POST['StatusChk'] == '0'){
                        echo "<br>";
                      echo $sql = "DELETE FROM transactionuser WHERE  UserID = '{$_POST['Id']}'";
                    $retval  = mysqli_query($conn, $sql);
                    if(! $retval ) {
                        die('Could not del data: ' . mysql_error());
                      }
                }
 }
 

?>