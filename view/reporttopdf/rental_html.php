<?php 

session_start();
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
        <td  align = "center" width = "25%">ชื่อ-สกุล</td>
      
         <td  align = "center" width = "15%">บัตรประชาชน</td>
        <td colspan="2"  align="center" width = "45%">ที่อยู่</td>
       
        <td  align = "center" width = "15%">วันที่เข้าพัก</td>
      </tr>
        </thead>
<?php
        $i=1;
          $q="SELECT * FROM  masterrental WHERE 1 = 1 ";
         if( !empty($_GET['FName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $q.=" AND  FName LIKE '%".$_GET['FName']."%'";  
             }
        if( !empty($_GET['LName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $q.=" AND  LName LIKE '%".$_GET['LName']."%'";  
             }
       if($_GET['Status'] != '')  { 
               $q.=" AND Status ='".$_GET['Status']."' ";
         }
        if( !empty($_GET['Address']) ) { 
            $q.=" AND Address LIKE '%".$_GET['Address']."%' ";
           }
          if( !empty($_GET['ST']) && !empty($_GET['ED'])){ 
              $q.=" AND ( StartDate  BETWEEN '".$_GET['ST']."' AND '".$_GET['ED']."')";
           }
        $q .= "ORDER BY FName ASC";
        $qr= mysqli_query($conn, $q);
        while($rs=mysqli_fetch_array($qr)){
?>  
   <tr>
         <td align="center"width = "5%"><?=$rs['ID'];?></td>
        <td align="left" width = "25%"><?=" ".$rs['Title']." ".$rs['FName']." ".$rs['LName'];;?></td>
   
           <td width = "15%"><?=$rs['IDCard'];?></td>
       <td colspan="2"  width = "45%" align="left"><?=" ".$rs['Address'];?></td>
     
        <td align="center" width = "15%"><?= thai_date_fullmonth(strtotime($rs['StartDate']));?></td>

  </tr>
<?php $i++; } ?>     
    </table>