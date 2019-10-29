<?php
 require ('config/db_connect.php');
 $garbage_timeout = 3600; // 3600 seconds = 60 minutes = 1 hour
 ini_set('session.gc_maxlifetime', $garbage_timeout);
  session_start();
//echo  md5($_POST['password']);
  $sql = "SELECT * FROM User WHERE Username = '{$_POST['username']}' AND Password = md5('{$_POST['password']}')";
 $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
  $row = mysqli_fetch_array($rs);
 $user =  $row['Username'];
  if($row['Password'] == md5($_POST['password'])){
    
      echo "ok"; // log in
    $_SESSION['user_session'] = $row['ID'];
   }
   else{
    
    echo "กรุณาเช็ค username/password "; // wrong details 
   }

?>