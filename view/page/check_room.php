<?php 
require ('../../config/db_connect.php'); 

 $keyword = $_POST['num'] - 543;
$sql = "SELECT DISTINCT(Year) FROM JanuaryMeter WHERE Year = '$keyword' ";
$list = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$row = mysqli_fetch_array($list);
if($row>0) {
    echo "false";
}else{
    echo "true";
}