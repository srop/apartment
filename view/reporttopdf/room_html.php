<?php session_start();
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php");
include("../../method/thaidate.php");

?>
<style>
td{
        border:1px solid #CCC;  
}
</style>

    <table cellspacing="0" cellpadding="1" border="0" style="width:100%"> 
        <thead>
    	 <tr bgcolor="#F2F2F2">
        <td align = "center" width = "5%">#</td>
        <td  align = "center" width = "15%">อาคาร</td>
      
         <td  align = "center" width = "20%">หมายเลขห้อง</td>
        <td   align="center" width = "20%">ราคา</td>
          <td   align="center" width = "20%">สถานะ</td>
        <td  align = "center" width = "20%">วันที่มีการแก้ไข</td>
      </tr>
        </thead>
<?php
        $i=1;
                 $q = "SELECT * FROM  masterroom WHERE 1 = 1";
         if( !empty($_GET['Room']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $q.=" AND  Room LIKE '%".$_GET['Room']."%'";  
             }
        if( !empty($_GET['Price']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $q.=" AND  Price LIKE '%".$_GET['Price']."%'";  
             }
       if($_GET['Status'] != '')  { 
               $q.=" AND Status ='".$_GET['Status']."' ";
              }
             if( !empty($_GET['Floor'])){
                 $q.=" AND Floor LIKE '%".$_GET['Floor']."%'";  
              }
              $q .= " ORDER BY Room ASC";
        $qr = mysqli_query($conn, $q);
        while($rs=mysqli_fetch_array($qr)){
             if($rs['Status'] == "1"){
                  $status = "<font color='green'>พร้อมเข้าอยู่ </font>";
                 }else{
                     $status = "<font color='red'>ซ่อมบำรุง </font>";
                 }
?>  
   <tr>
         <td align="center"width = "5%"><?=$rs['ID'];?></td>
        <td align="center" width = "15%"><?=" ".$rs['Floor'];?></td>
   
           <td  align="center"  width = "20%"><?=$rs['Room'];?></td>
       <td width = "20%" align="center"><?=" ".$rs['Price'];?></td>
        <td align = "center" width = "20%"><?=  $status; ?></td>
        <td align="center" width = "20%"><?= thai_date_fullmonth(strtotime($rs['DateModified']));?></td>

  </tr>
<?php $i++; } ?>     
    </table>