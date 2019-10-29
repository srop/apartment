<?php  require ('../../config/db_connect.php');
  require('../../method/thaidate.php');

 if(is_array($_POST)){

var_dump($_POST);
$now = date("Y-m-d H:i:s");

if($_POST['monthAdd'] && ($_POST['dayAdd']) && ($_POST['yearAdd'])){
		 		$year = $_POST['yearAdd']-543;
		 		$dateupdate = $year."-".$_POST['monthAdd']."-".$_POST['dayAdd'];
		 		 $StartDate = date('Y-m-d', strtotime($dateupdate)); 

}

  echo $sql = "INSERT INTO masterrental(Title, FName,LName ,Address, IDCard, StartDate,DateCreated,DateModified,Status)  
      VALUES('{$_POST['TitleAdd']}', '{$_POST['FNameAdd']}', '{$_POST['LNameAdd']}', '{$_POST['AddressAdd']}', '{$_POST['idcardAdd']}','{$StartDate}','$now','$now','1')";  
 $retval  =mysqli_query($conn, $sql);
  if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
}
   ?>