<?php
$conn = mysqli_connect("localhost","iamsropc_ap","apartment","iamsropc_ap") or die("Connection failed: " . mysqli_connect_error()); 
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
//mysqli_select_db("apartment");  // ติดต่อฐานข้อมูล      
//mysql_query("set character set utf8",$conn); // กำหนดค่า character set ที่จะใช้แสดงผล     
mysqli_set_charset( $conn, 'utf8');
$sql = "SELECT * FROM masterroom WHERE 1 =1";
   $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
                $floor =  substr($row['Room'],0,1);
                echo "<br>";
                
             echo   $sql = "UPDATE masterroom SET Floor =  '$floor' WHERE ID = '{$row['ID']}'";
			
			  $retval =  mysql_query($sql);
		 $retval  = mysqli_query($conn, $sql);
			  if(! $retval ) {
			              die('Could not update data: ' . mysql_error());
			           }
                                   
            }
?>