<?php

require_once('../../config/db_connect.php');

$id = array();
$startwater = array();
$endwater = array();
$startelectric = array();
$endelectric = array();

$id = $_POST['id'];

$startelectric = $_POST['startelectric'];
$startwater = $_POST['startwater'];
var_dump($endelectric);
echo "<br>";

echo $totalRoom = sizeof($id);

$now = date("Y-m-d H:i:s");
 switch ($_POST['month']) {
    case "12":
      $db = "DecemberMeter";
      $db_next = "JanuaryMeter";
        break;
    case "01":
      $db = "JanuaryMeter";
      $db_next = "FebruaryMeter";
        break;
    case "02":
        $db =  "FebruaryMeter";
        $db_next = "MarchMeter";
        break;
    case "03":
        $db = "MarchMeter";
        $db_next = "AprilMeter";
        break;
     case "04":
      $db = "AprilMeter";
      $db_next = "MayMeter";
        break;
    case "05":
        $db =  "MayMeter";
        $db_next = "JuneMeter";        
        break;
    case "06":
        $db = "JuneMeter";
        $db_next = "JulyMeter";
        break;
    case "07":
        $db = "JulyMeter";
        $db_next = "AugustMeter";
        break;
    case "08":
        $db = "AugustMeter";
        $db_next = "SeptemberMeter";
        break;
    case "09":
        $db = "SeptemberMeter";
         $db_next = "OctoberMeter"; 
       break;
      case "10":
        $db = "OctoberMeter";
        $db_next = "NovemberMeter";
        break;
      case "11":
        $db = "NovemberMeter";
        $db_next = "DecemberMeter";
        break;
    default:
        $db = "";
}
  
if($_POST['month'] == "12"){
	$year_next = $_POST['year']+1;
}else{
	$year_next = $_POST['year'];
}

for($i=0;$i<$totalRoom;$i++) {

    $InsertID = $id[$i];
    $InsertSWater = $startwater[$i];
//    $InsertEWater = $endwater[$i];
    $InsertSElec = $startelectric[$i];
 //   $InsertEElec = $endelectric[$i];

 
   echo	 $sql = "UPDATE {$db} SET StartWater = '{$InsertSWater}' ,StartElectric = '{$InsertSElec}'  ,DateRecord = '{$now}' WHERE ID = '{$InsertID}' AND Year = '{$_POST['year']}'";

         $retval  = mysqli_query($conn, $sql);
  if(!$retval ) {
              die('Could not update data: ' . mysqli_error());
           }
//           echo "<br>";	
  


}



?>