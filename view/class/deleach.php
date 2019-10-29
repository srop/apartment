<?php 
require_once('../../config/db_connect.php');

switch ($_POST['monthbill']) {
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
switch ($_POST['list']) {
    case 01:
         $sql = "DELETE FROM {$db}  WHERE  Year = '{$_POST['yearbill']}'";

			   $retval  = mysqli_query($conn, $sql);
			   if(!$retval) {
			               die('ไมสามารถลบข้อมูลได้' . mysqli_error());
			  }else{
                    echo "ลบข้อมูลเรียบร้อยแล้ว";
              }
        break;
    case 02:

     $sql = "UPDATE MasterInvoice SET BillNumber = '' ,BillDate = '0000-00-00'   WHERE Year ='{$_POST['yearbill']}' AND Month  ='{$_POST['monthbill']}' AND ID = '{$_POST['id']}'";
            

         
             $retval  = mysqli_query($conn, $sql);
              if(!$retval) {
                      echo "ไมสามารถลบข้อมูลได้";
                 }else{
                 echo "ลบข้อมูลเรียบร้อยแล้ว";
              }
   
        break;
    case 03:
        $sqlchk = "SELECT count(*) as count FROM MasterInvoice WHERE  Year ='{$_POST['yearbill']}' AND Month  ='{$_POST['monthbill']}' AND BillDate != '0000-00-00' AND  BillNumber != '' AND  ID = '{$_POST['id']}'";
         $query  = mysqli_query($conn, $sqlchk);
        $row = mysqli_fetch_array($query); 
       
        if($row['count'] >= '1'){
              echo "ไมสามารถลบข้อมูลได้ กรุณาลบใบเสร็จก่อน";
        }else{
         $sql = "DELETE FROM MasterInvoice  WHERE Year ='{$_POST['yearbill']}' AND Month  ='{$_POST['monthbill']}'  AND  ID = '{$_POST['id']}'";
                $retval  = mysqli_query($conn, $sql);
              if(!$retval) {
                             echo "ไมสามารถลบข้อมูลได้";
                 }else{
                  echo "ลบข้อมูลเรียบร้อยแล้ว";
              }
      }
        break;
   
    default:
    }  


?>
