<?php 
$limit = $_GET['limit'];
session_start();
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php");
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
        <td rowspan="2" scope="col" align = "center" >ห้อง</td>
        <td colspan="2" scope="col" align = "center">น้ำ</td>
        <td colspan="2" scope="col" align = "center">ไฟ</td>
        <td colspan="2" scope="col" align = "center">โทรศัพท์</td>
        <td rowspan="2" scope="col" align = "center">หมายเหตุ</td>
      </tr>
      <tr>
        <td align = "center">เริ่มต้น</td>
        <td  align = "center">สิ้นสุด</td>
        <td  align = "center">เริ่มต้น</td>
        <td  align = "center">สิ้นสุด</td>
        <td  align = "center">เริ่มต้น</td>
        <td  align = "center">สิ้นสุด</td>
      </tr>
      </thead>
<?php
        $i=1;
       echo $q="SELECT * FROM  invoice  ";
        $qr= mysqli_query($conn, $q);
        while($rs=mysqli_fetch_array($qr)){
?>  
  <tr>
         <td align="center"><?=$rs['RoomNO'];?></td>
        <td align="center"><?=$rs['StartWater'];?></td>
        <td ></td>
       <td align="center"><?=$rs['StartElectric'];?></td>
        <td ></td>
        <td align="center"><?=$rs['StartElectric'];?></td>
        <td ></td>
 <td ></td>
  </tr>
<?php $i++; } ?>     
    </table>