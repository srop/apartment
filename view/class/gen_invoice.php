<?php 

header('Content-Type: text/html; charset=utf-8');
require_once('../../config/db_connect.php');
$now = date("Y-m-d H:i:s");
 $year1 = $_POST['year'];
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

$sql_water = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 1";
 $rs_water = mysqli_query($conn, $sql_water) or die("employee-grid-data.php: get employees");
 $row_water = mysqli_fetch_array($rs_water);

 
 $sql_elec = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 2";
 $rs_elec = mysqli_query($conn, $sql_elec) or die("employee-grid-data.php: get employees");
 $row_elec = mysqli_fetch_array($rs_elec); 
 
 
 echo   $sql_select = "SELECT Title, FName,LName,MR.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,MT.* , MM.Price "
                  . "FROM masterrental  MR INNER JOIN transactionuser as TU ON MR.ID = TU.UserID"
                  . " LEFT JOIN {$db}  as MT ON TU.ID = MT.FromTranID "
                  . "LEFT JOIN masterroom AS MM ON TU.Room = MM.Room "
                  . "WHERE  TU.Floor =  {$_POST['Floor']} AND Year = {$year1} ORDER BY TU.Room ASC";
          $rs = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
       $number = 1;
          while ($row_insert = mysqli_fetch_array($rs)){
                
     $number = sprintf("%03d",$number); 
    $invoicenumber = (int)$year1.$_POST["month"].$number;
    echo "<br>"; echo "<br>"; echo "<br>";
         (int)$UnitElec =   $row_insert["EndElectric"] - $row_insert["StartElectric"];
         
        (int)$UnitWater =   $row_insert["EndWater"] - $row_insert["StartWater"];
      echo         $sql = "INSERT INTO MasterInvoice
			  ( ID,Year, Month,FromTranID,Floor,Room,PriceRoom,Title,FName,LName,StartElectric,EndElectric,UnitElectric,PricePerUnitEL,StartWater, EndWater,UnitWater,PricePerUnitW,InvoiceNumber ,Etc,DateCreated)  
                                VALUES
			 ('','{$row_insert["Year"]}', '{$_POST["month"]}', '{$row_insert["FromTranID"]}','{$row_insert["Floor"]}','{$row_insert["Room"]}','{$row_insert["Price"]}','{$row_insert["Title"]}', '{$row_insert["FName"]}','{$row_insert["LName"]}',"
                        . " '{$row_insert["StartElectric"]}','{$row_insert["EndElectric"]}','{$UnitElec}','{$row_elec["Price"]}','{$row_insert["StartWater"]}','{$row_insert["EndWater"]}','{$UnitWater}','{$row_water["Price"]}',"
                        . "'{$invoicenumber}','{$row_insert["Etc"]}','{$now}')";  
						   echo "<br>";
//						$retval  = mysqli_query($conn, $sql);
//						 if(!$retval ) {
//								   die('Could not update data: ' . mysql_error());
//	
											//				}
                                                   $number++;
         }


?>