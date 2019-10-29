<?php
require_once('../../config/db_connect.php');
require ('thaidate.php'); 
error_reporting(E_ALL & ~E_NOTICE);
$strExcelFileName="Delay-Payment.xls";

header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");

header("Content-Disposition: inline; filename=\"$strExcelFileName\"");

header("Pragma:no-cache");

?>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">

<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
         <thead>
       <tr bgcolor="#F2F2F2">




        <td align = "center" width = "10%">อาคาร</td>
           <td align="center" width = "10%">ห้อง</td>
       
      
      <td  align = "center" width = "15%">รวมเงิน</td>
         <td  align = "center" width = "15%">ค่าเช่า</td>
           
        <td  align = "center" width = "15%">ค่าน้ำ</td>
          <td  align = "center" width = "15%">ค่าไฟ</td>
           
        <td  align = "center" width = "15%">อื่นๆ</td>
      </tr>
        </thead>
  <?php 
      
        
                $sql = "SELECT * FROM MasterInvoice WHERE 1 = 1 AND  BillDate = '000-00-00'";
           
             if( $_GET['Month'] != "" &&  $_GET['Year'] != "" ) {  
 
              
                $sql .=" AND Month = '".$_GET['Month']."' AND  Year = '".$_GET['Year']."' ";
            }
           $sql .= " ORDER BY BillDate ASC ";
             $SumElec = 0;
             $SumWater = 0;
              $SumEtc = 0;
           $SumRoom = 0;
           $Sumall = 0;
            $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
             
          $totalElec = $row['UnitElectric']*$row['PricePerUnitEL'];
           $totalWater = $row['UnitWater']*$row['PricePerUnitW'];
          $totalall = $row['PriceRoom']+ $totalElec + $totalWater + $row['Etc'];
           
            ?>
            <tr id = "<?php echo  $row['ID']; ?>"> 
                <td  width = "10%" ><?= $row['Floor']; ?></td>
                <td  width = "10%"><?=  $row['Room']; ?></td>
               
               
                <td  width = "15%" align = "right"> <?= number_format($totalall, 2, '.', ','); ?></td>
               <td  width = "15%" align = "right"><?= number_format($row['PriceRoom'], 2, '.', ','); ?></td>
            
              <td  width = "15%" align = "right"><?= number_format($totalWater, 2, '.', ','); ?></td>
              <td  width = "15%" align = "right"><?= number_format( $totalElec, 2, '.', ','); ?></td>
            
              <td  width = "15%" align = "right"><?= number_format($row['Etc'], 2, '.', ','); ?></td>
              
            </tr>
            
            <?php  
                $SumElec = $SumElec+$totalElec;
                $SumWater = $SumWater+$totalWater;
                $SumEtc = $SumEtc+$row['Etc'];
                 $SumRoom = $SumRoom+$row['PriceRoom'];
                $Sumall = $Sumall+$totalall;
              }?>
               <tr> 
                <td colspan="2" align = "right" >รวมค้างจ่าย</td>
                   <td  width = "15%" align = "right"><?= number_format($Sumall, 2, '.', ','); ?></td>
                 <td  width = "15%" align = "right"><?= number_format($SumRoom, 2, '.', ','); ?></td>
                 <td  width = "15%" align = "right"><?= number_format($SumWater, 2, '.', ','); ?></td>
                  <td  width = "15%" align = "right"><?= number_format($SumElec, 2, '.', ','); ?></td>
                 <td  width = "15%" align = "right"><?= number_format($SumEtc, 2, '.', ','); ?></td>
               </tr>
    </table>
</div>