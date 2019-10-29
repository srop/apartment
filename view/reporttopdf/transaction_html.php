<?php session_start();
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php");
include("../../method/thaidate.php");

?>
<style>
td{
        border:1px dashed #CCC;  
}
</style>

    <table cellspacing="0" cellpadding="1" border="0" style="width:100%"> 
        <thead>
    	 <tr bgcolor="#F2F2F2">
        <td align = "center" width = "5%">#</td>
           <td align="center" width = "15%">อาคาร</td>
        <td  align="center" width = "15%">ห้อง</td>
       
        <td  align = "center" width = "30%">ชื่อ-สกุล</td>
      
         <td  align = "center" width = "15%">บัตรประชาชน</td>
           
        <td  align = "center" width = "20%">วันที่เข้าพัก</td>
      </tr>
        </thead>
<?php
        $i=1;
          $q="SELECT TU.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,TU.DateCreate,TU.DateModified,MR.IDCard,MR.Title,MR.FName,MR.LName, MR.Address "
              . "FROM transactionuser as TU LEFT JOIN masterrental as MR ON TU.UserID = MR.ID WHERE Flag = 1 ";
         if( !empty($_GET['FName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $q.=" AND  FName LIKE '%".$_GET['FName']."%'";  
             }
        if( !empty($_GET['LName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $q.=" AND  LName LIKE '%".$_GET['LName']."%'";  
             }
       if($_GET['Room'] != '')  { 
               $q.=" AND Room ='".$_GET['Room']."' ";
         }
        if( !empty($_GET['Floor']) ) { 
            $q.=" AND Floor LIKE '%".$_GET['Floor']."%' ";
           }
          if( !empty($_GET['ST']) && !empty($_GET['ED'])){ 
              $q.=" AND ( DateCreate  BETWEEN '".$_GET['ST']."' AND '".$_GET['ED']."')";
           }
        $q.= "ORDER BY TU.Room ASC";
        $qr= mysqli_query($conn, $q);
        while($rs=mysqli_fetch_array($qr)){
?>  
   <tr>
         <td align="center"width = "5%"><?=$rs['ID'];?></td>
          <td   width = "15%" align="center"><?=" ".$rs['Floor'];?></td>
     <td   width = "15%" align="center"><?=" ".$rs['Room'];?></td>
        <td align="left" width = "30%"><?=" ".$rs['Title']." ".$rs['FName']." ".$rs['LName'];;?></td>
   
           <td width = "15%"><?=$rs['IDCard'];?></td>
     
        <td align="center" width = "20%"><?= thai_date_fullmonth(strtotime($rs['DateCreate']));?></td>

  </tr>
<?php $i++; } ?>     
    </table>