<?php 

session_start();
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php");

              switch ($_GET['month']) {
                case "01":
                  $db = "JanuaryMeter";
                    break;
                case "02":
                  $db = "FebruaryMeter";
                    break;
                case "03":
                    $db =  "MarchMeter";
                    break;
                case "04":
                    $db = "AprilMeter";
                    break;
                 case "05":
                  $db = "MayMeter";
                    break;
                case "06":
                    $db =  "JuneMeter";
                    break;
                case "07":
                    $db = "JulyMeter";
                    break;
                case "08":
                    $db = "AugustMeter";
                    break;
                case "09":
                    $db = "SeptemberMeter";
                    break;
                case "10":
                    $db = "OctoberMeter";
                    break;
                  case "11":
                    $db = "NovemberMeter";
                    break;
                  case "12":
                    $db = "DecemberMeter";
                    break;
                default:
                    $db = "";
            }
        $i=1;
         $sql2 = "SELECT MT.* ,MR.Title, MR.FName, MR.LName FROM  {$db} as MT LEFT JOIN masterrental as MR ON MT.Rental = MR.ID WHERE MT.Floor = '{$_GET['Floor']}' AND Year = '{$_GET['year']}' AND Room IN (SELECT Room FROM masterroom WHERE STATUS = 1) ORDER BY MT.Room";
        
      // $sql1 = "SELECT TU.ID, TU.Floor, TU.Room, TU.UserID, TU.Detail, TU.DateCreate, TU.DateModified,TU.Flag ,MT . * ,MR.Title, MR.FName, MR.LName "
      //         . "FROM  {$db} as MT INNER JOIN transactionuser AS TU ON MT.Room = TU.Room LEFT JOIN  masterrental as MR ON TU.UserID = MR.ID  WHERE TU.Flag = '1'";
      //        if(!empty($_GET['Floor']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
      //          $sql1.=" AND  TU.Floor = '".$_GET['Floor']."' AND Year = '".$_GET['year']."'";  
      //        }
			   // $sql1.=" ORDER BY TU.Room";  
         //  echo $sql1;
?>
<style>
td{
        border:1px dashed #CCC;  
}
</style>
  <div ></div>
    <table cellspacing="0" cellpadding="1" border="0" style="width:100%; ">  
        <thead>
       <tr>
        <td rowspan="2" scope="col" align = "center" width="50">ห้อง</td>
         <td rowspan="2" scope="col" align = "center" width="150" >ผู้เข้าพัก</td>
        <td colspan="2" scope="col" align = "center">น้ำ</td>
        <td colspan="2" scope="col" align = "center">ไฟ</td>
      
        <td rowspan="2" scope="col" align = "center">หมายเหตุ</td>
      </tr>
      <tr>
        <td align = "center">เริ่มต้น</td>
        <td  align = "center">สิ้นสุด</td>
        <td  align = "center">เริ่มต้น</td>
        <td  align = "center">สิ้นสุด</td>
       
      </tr>
      </thead>
<?php
    
   
        $qr= mysqli_query($conn, $sql2);
        while($rs=mysqli_fetch_array($qr)){
?>  
  <tr>
         <td  width="50" align="center"><?=$rs['Room'];?></td>
         <td align="center" width="150" ><?= $rs['Title'].$rs['FName']." ".$rs['LName'];  ?></td>
         
        <td align="center"><?=$rs['StartWater'];?></td>
        <td ><?php if($_GET['type'] == 'all'){ echo $rs['EndWater']; } else { echo ""; } ?></td>
       <td align="center"><?=$rs['StartElectric'];?></td>
          <td ><?php if($_GET['type'] == 'all'){ echo $rs['EndElectric']; } else { echo ""; } ?></td>
     
     
        <td ><?php if($_GET['type'] == 'all'){ echo $rs['EtcDetail']." ".$rs['Etc']; } else { echo ""; } ?></td>
  </tr>
<?php $i++; } ?>     
    </table>