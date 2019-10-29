<?php session_start();header("Content-type:text/html; charset=UTF-8");              
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php"); 
require ('../page/thaidate.php'); ?> 
<style
    >td{        border:1px dashed #CCC;  }
</style>  
<div >
</div>     
<table cellspacing="0" cellpadding="1" border="0" style="width:100%">       
    <thead>      
        <tr bgcolor="#F2F2F2">       
            <td align="center" width = "20%">วันที่ยกเลิกใบเสร็จ</td>              
            <td align="center" width = "20%">วันที่ออกใบเสร็จ</td>     
            <td align="center" width = "20%">เลขที่ใบเสร็จ</td>                 
            <td align="center" width = "20%">ห้อง</td>                 
            <td  align = "center" width = "20%">จำนวนเงิน</td>        
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
        <td  width = "20%"><?=thai_date_fullmonth1(strtotime($row['DateCreated'])); ?></td>              
        <td  width = "20%"><?=thai_date_fullmonth1(strtotime($row['BillDate'])); ?></td>                             
        <td  width = "20%"><?=  $row['BillNumber']; ?></td>                             
        <td  width = "20%"><?=  $row['Room']; ?></td>                             
        <td  width = "20%" align = "right"> <?= number_format($row['Summary'], 2, '.', ','); ?></td>                                                 
    </tr>                                      
 <?php                                 $Sumall = $Sumall+$row['Summary'];                                 
 }?>                         
    <tr>                                
        <td colspan="4" align = "right" >รวมรายการยกเลิกใบเสร็จ</td>                                                    
        <td  width = "20%" align = "right"><?= number_format($Sumall, 2, '.', ','); ?></td>                                  
    </tr>                         
</table>