<?php 

date_default_timezone_set("Asia/Bangkok");
 $conn = mysqli_connect("192.168.64.2","root","","apartment") or die("Connection failed: " . mysqli_connect_error()); 
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
define("NAME", "หจก.ชาญรุ่งเรือง เลขประจำตัวผู้เสียภาษี 3 10 272574 1");
define("ADDRESS", "655/19-20 ตรอกวัดจันทร์ใน ถนนเจริญกรุง บางโคล่ บางคอแหลม กทม. 10120");
//$APARTMENT_NAME = "รุ่งเรื่องอพาร์ทเมนต์";
define("APARTMENT_NAME", "รุ่งเรื่องอพาร์ทเมนต์");


define("HOST", $_SERVER['SERVER_NAME'].'/'."apartment");

?>