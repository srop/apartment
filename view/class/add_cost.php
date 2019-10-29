<?php 
 require ('../../config/db_connect.php');
  require('../../method/thaidate.php');

 if(is_array($_POST)){

var_dump($_POST);
$now = date("Y-m-d H:i:s");


  echo $sql = "INSERT INTO costtransaction(Room,Detail, Amount,DateBill , DateCreated)  
      VALUES('{$_POST['RoomAdd']}', '{$_POST['DetailAdd']}', '{$_POST['AmountAdd']}', '{$_POST['datepicker2']}','$now')";  
 $retval  = mysqli_query($conn, $sql);
  if(! $retval ) {
               die('Could not update data: ' . mysqli_error());
            }
}
   ?>