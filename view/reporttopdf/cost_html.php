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
        <td  align = "center" width = "15%">ห้อง</td>
      
         <td  align = "center" width = "40%">รายการ</td>
        <td   align="center" width = "20%">จำนวนเงิน</td>
      
        <td  align = "center" width = "20%">วันที่</td>
      </tr>
        </thead>
<?php
      $i=1;
            $sql = "SELECT * FROM costtransaction WHERE 1 =1";
           if( !empty($_GET['Room']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $sql.=" AND  Room LIKE '%".$_GET['Room']."%'";  
             }
             if( $_GET['DateBill'] != "" &&  $_GET['DateBill1'] != "" ) {  
 
               $sql .=" AND DateBill BETWEEN  '".$_GET['DateBill']."' AND  '".$_GET['DateBill1']."' ";
            }
            if($_GET['Amount'] != '')  { 
               $sql.=" AND Amount = '".$_GET['Amount']."' ";
              }
             
              
        $qr = mysqli_query($conn, $sql);
        while($rs=mysqli_fetch_array($qr)){
            
?>  
   <tr>
         <td align="center"width = "5%"><?=$i;?></td>
        <td align="center" width = "15%"><?=" ".$rs['Room'];?></td>
   
           <td  align="center"  width = "40%"><?=$rs['Detail'];?></td>
       <td width = "20%" align="center"><?=" ".number_format($rs['Amount'], 2, '.', ',');?></td>
       
        <td align="center" width = "20%"><?= thai_date_fullmonth(strtotime($rs['DateBill']));?></td>

  </tr>
<?php $i++; } ?>     
    </table>