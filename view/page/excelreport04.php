<?php
require_once('../../config/db_connect.php');
require ('thaidate.php');
error_reporting(E_ALL & ~E_NOTICE);
$strExcelFileName="Billdeleted.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");?>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
    <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">     
        <thead>       <tr bgcolor="#F2F2F2">
                <td align="center" width = "25%">วันที่ยกเลิกใบเสร็จ</td>
                  <td align="center" width = "25%">วันที่ออกใบเสร็จ</td>  
                <td align="center" width = "25%">เลขที่ใบเสร็จ</td>  
                <td align="center" width = "20%">ห้อง</td>
                <td  align = "center" width = "30%">จำนวนเงิน</td> 
            </tr>        
        </thead>  
            <?php  
            $sql = "SELECT * FROM BillDeleted WHERE 1 = 1 ";                       
            if( $_GET['Month'] != "" &&  $_GET['Year'] != ""  ) {  
                $sql .=" AND MONTH(BillDate) = '".$_GET['Month']."' AND  YEAR(BillDate) = '".$_GET['Year']."'";           
                }if($_GET['Billnumber'] != ""  ){  
               $sql .= " AND  BillNumber = '".$_GET['Billnumber']."'";            
               
                } 
                $sql .= " ORDER BY BillDate, BillNumber ASC"; 
                $Sumall = 0; 
                $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                while ($row = mysqli_fetch_array($rs)){ 
        
                    
             ?>             
        <tr id = "<?php echo  $row['ID']; ?>"> 
            <td  width = "25%"><?=thai_date_fullmonth1(strtotime($row['DateCreated'])); ?></td> 
              <td  width = "25%"><?=thai_date_fullmonth1(strtotime($row['BillDate'])); ?></td> 
            <td  width = "25%"><?=  $row['BillNumber']; ?></td> 
            <td  width = "20%"><?=  $row['Room']; ?></td> 
            <td  width = "30%" align = "right"> <?= number_format($row['Summary'], 2, '.', ','); ?></td> 
        </tr>    
 <?php           
 $Sumall = $Sumall+$row['Summary'];             
 }?>     
        <tr>   
            <td colspan="4" align = "right" >รวมรายการยกเลิกใบเสร็จ</td>   
            <td  width = "30%" align = "right"><?= number_format($Sumall, 2, '.', ','); ?></td>  
        </tr>   
    </table>
</div>