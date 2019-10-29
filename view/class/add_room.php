<?php
require ('../../config/db_connect.php');
  require('../../method/thaidate.php');

 if(is_array($_POST)){

var_dump($_POST);
$now = date("Y-m-d H:i:s");


  echo $sql = "INSERT INTO masterroom(Room, Price,Floor ,Detail, Status, DateModified)  
      VALUES('{$_POST['RoomAdd']}', '{$_POST['PriceAdd']}', '{$_POST['FloorAdd']}', '{$_POST['DetailAdd']}','{$_POST['StatusAdd']}','$now')";  
 $retval  =mysqli_query($conn, $sql);
  if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
}
   ?>