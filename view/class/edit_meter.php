<?php 
require_once('../../config/db_connect.php');

$id = array();
$startwater = array();
$endwater = array();
$startelectric = array();
$endelectric = array();
$etc = array();
$id = $_POST['id'];
$startwater = $_POST['startwater'];
$endwater = $_POST['endwater'];
$etc = $_POST['etc'];
var_dump($endwater);
echo "<br>";
$startelectric = $_POST['startelectric'];
$endelectric = $_POST['endelectric'];
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

  $sql_water = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 1";
        $rs_water = mysqli_query($conn, $sql_water) or die("employee-grid-data.php: get employees");
        $row_water = mysqli_fetch_array($rs_water);


        $sql_elec = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 2";
        $rs_elec = mysqli_query($conn, $sql_elec) or die("employee-grid-data.php: get employees");
        $row_elec = mysqli_fetch_array($rs_elec); 


for($i=0;$i<$totalRoom;$i++) {

    $InsertID = $id[$i];
    $InsertSWater = $startwater[$i];
    $InsertEWater = $endwater[$i];
    $InsertSElec = $startelectric[$i];
    $InsertEElec = $endelectric[$i];
     $Etc = $etc[$i];
 
   echo	 $sql = "UPDATE {$db} SET StartWater = '{$InsertSWater}' ,EndWater = '{$InsertEWater}' ,UnitWater = '{$row_water['Price']}',StartElectric = '{$InsertSElec}' 
                  ,EndElectric = '{$InsertEElec}' ,UnitElectric = '{$row_elec['Price']}',Etc = '{$Etc}',DateRecord = '{$now}' WHERE ID = '{$InsertID}' AND Year = '{$_POST['year']}'";
	echo "<br>";		
         $retval  = mysqli_query($conn, $sql);
  if(!$retval ) {
              die('Could not update data: ' . mysqli_error());
           }
           echo "<br>";	
  echo	 $sql = "UPDATE {$db_next} SET StartWater = '{$InsertEWater}'  ,StartElectric = '{$InsertEElec}' ,DateRecord = '{$now}' WHERE ID = '{$InsertID}' AND Year = '{$year_next}'";
	echo "<br>";		
         $retval  = mysqli_query($conn, $sql);
  if(!$retval ) {
              die('Could not update data: ' . mysqli_error());
           }


}



?>