<?php 

require ('../../config/db_connect.php');
function countdb($table ,$where_clause){
   $sql = "SELECT count(*) as num FROM JanuaryMeter WHERE Room = '{$_POST['Room1']}' AND Floor = '{$_POST['Floor1']}'";

     $rs = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_array($rs);
      return   $row['num'];      
}
$table = "JanuaryMeter";
$where_clause = "Room = '{$_POST['Room1']}' AND Floor = '{$_POST['Floor1']}'";
 $count = countdb($table ,$where_clause);
 
 
$now = date("Y-m-d H:i:s");
$today = date("Y-m-d");
$year1 = date("Y");
if($_POST['monthAdd'] && ($_POST['dayAdd']) && ($_POST['yearAdd'])){
		 		$year = $_POST['yearAdd']-543;
		 		$dateupdate = $year."-".$_POST['monthAdd']."-".$_POST['dayAdd'];
		 		 $DateCreate = date('Y-m-d', strtotime($dateupdate)); 

}


  echo $sql = "INSERT INTO transactionuser(Floor, Room, UserID,Detail,DateCreate,DateModified,Flag)  
      VALUES('{$_POST['Floor1']}', '{$_POST['Room1']}', '{$_POST['Rental']}', '{$_POST['DetailAdd']}', '{$DateCreate}','$now','1')";  
 $retval  = mysqli_query($conn, $sql);
  if(!$retval ) {
               die('Could not update data: ' . mysql_error());
            }
$last_id = mysqli_insert_id($conn);
$monthly = array("","JanuaryMeter","FebruaryMeter","MarchMeter", "AprilMeter","MayMeter","JuneMeter","JulyMeter","AugustMeter",
    "SeptemberMeter","OctoberMeter","NovemberMeter","DecemberMeter");
 $arrlength=count($monthly);
  if($count == 0){
        for($x=0;$x<$arrlength;$x++)
          {

           echo $sql = "INSERT INTO {$monthly[$x]}
               ( ID,FromTranID, Year, Room,Rental,StartWater, EndWater,UnitWater, StartElectric,EndElectric,UnitElectric,Etc,DateCreated)  
              VALUES
              ('','$last_id', '$year1','{$_POST['Room1']}','{$_POST['Rental']}','0', '0', '0','0', '0','0','0','$today')";  
            $retval  = mysqli_query($conn, $sql);
             if(!$retval ) {
                       die('Could not update data: ' . mysql_error());
                    }
          }
  }else{
    echo $sqlchkbill = "SELECT MAX(Month) as month FROM MasterInvoice WHERE Year = '{$year1}' AND Room = '{$_POST['Room1']}' AND BillNumber != ''"; //ยังไม่ออกใบเสร็จ
     $retval  = mysqli_query($conn, $sqlchkbill);
             if(! $retval ) {
                         die('Could not update data: ' . mysql_error());
                      }
    $rowchk = mysqli_fetch_array($retval);

     if($rowchk['month'] == NULL){
          $var = 1;
     }else{
          $var = ltrim($rowchk['month'], '0');
                                 
                                   $monthedit = ltrim($_POST['monthAdd'], '0');
                                    if($monthedit <= $var){
                                     $var = $monthedit;
                                      $var = $var -1;
                                    }
     }


  
     for($x=$var;$x<$arrlength;$x++)
      {
     
      //echo $sqldel = "DELETE FROM {$monthly[$x]} WHERE FromTranID = '{$_GET['id']}'";
      echo $sql = "UPDATE {$monthly[$x]}  SET Rental = '{$_POST['Rental']}',  DateCreated =  '{$now}' WHERE Room = '{$_POST['Room1']}'";
      echo "<br>";


        $retval  = mysqli_query($conn, $sql);
         if(!$retval ) {
                   die('Could not update data: ' . mysql_error());
                }
      }

  }
?>