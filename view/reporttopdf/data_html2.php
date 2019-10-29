<?php 

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

    <table cellspacing="0" cellpadding="1" border="0" style="width:100%"> 
        <thead>
    	 <tr bgcolor="#F2F2F2">
        <td align = "center" width = "50px">#</td>
        <td  align = "center">ชื่อ</td>
        <td  align = "center">สกุล</td>
         <td  align = "center">บัตรประชาชน</td>
        <td colspan="2">ที่อยู่</td>
       
        <td  align = "center">วันที่เข้าพัก</td>
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
       
        $qr= mysqli_query($conn, $q);
        while($rs=mysqli_fetch_array($qr)){
?>  
   <tr>
         <td align="center"width = "50px"><?=$rs['ID'];?></td>
        <td align="center"><?=$rs['Title']." ".$rs['FName'];?></td>
        <td ><?=$rs['LName'];?></td>
           <td ><?=$rs['IDCard'];?></td>
       <td colspan="2"><?=$rs['Address'];?></td>
     
        <td align="center"><?= $rs['StartDate'];?></td>

  </tr>
<?php $i++; } ?>     
    </table>