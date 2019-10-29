<?php
 require ('config/db_connect.php');
  session_start();

$now = date("Y-m-d H:i:s");
   $sql = "INSERT INTO User(Username, Password,DateCreated)  
      VALUES('{$_POST['register_username']}', md5('{$_POST['register_password']}'), '$now' )";  
 $retval  = mysqli_query($conn, $sql);
  if(!$retval ) {
               die('Could not update data: ' . mysqli_error());
               echo "error";
            }
else{
    echo "ok";
}

?>