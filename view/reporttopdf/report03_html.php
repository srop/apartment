<?php 

session_start();
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php");
require ('../page/thaidate.php'); 

?>
<style>
td{
        border:1px dashed #CCC;  
}
</style>
  <div ></div>
  
    <table cellspacing="0" cellpadding="1" border="0" style="width:100%"> 
        <thead>
       <tr bgcolor="#F2F2F2">




        <td align = "center" width = "5%">อาคาร</td>
           <td align="center" width = "10%">ห้อง</td>
             <td align="center" width = "15%">วันที่</td>
               <td align="center" width = "15%">เลขที่ใบเสร็จ</td>
      
      <td  align = "center" width = "15%">รวมเงิน</td>
         <td  align = "center" width = "15%">ค่าเช่า</td>
           
        <td  align = "center" width = "10%">ค่าน้ำ</td>
          <td  align = "center" width = "10%">ค่าไฟ</td>
           
        <td  align = "center" width = "10%">อื่นๆ</td>
      </tr>
        </thead>
  <?php 
      
        
                $sql = "SELECT * FROM MasterInvoice WHERE 1 = 1 AND  BillDate != '000-00-00'";
           
              if( $_GET['Month'] != "" &&  $_GET['Year'] != ""  &&  $_GET['Floor'] != "" ) {  
 
              
                $sql .=" AND Month = '".$_GET['Month']."' AND  Year = '".$_GET['Year']."' AND  Floor = '".$_GET['Floor']."'";
            }
           $sql .= " ORDER BY Room ASC ";
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
                <td  width = "5%" ><?= $row['Floor']; ?></td>
                <td  width = "10%"><?=  $row['Room']; ?></td>
                  <td  width = "15%"><?=thai_date_fullmonth1(strtotime($row['BillDate'])); ?></td>
                <td  width = "15%"><?=  $row['BillNumber']; ?></td>
               
                <td  width = "15%" align = "right"> <?= number_format($totalall, 2, '.', ','); ?></td>
               <td  width = "15%" align = "right"><?= number_format($row['PriceRoom'], 2, '.', ','); ?></td>
            
              <td  width = "10%" align = "right"><?= number_format($totalWater, 2, '.', ','); ?></td>
              <td  width = "10%" align = "right"><?= number_format( $totalElec, 2, '.', ','); ?></td>
            
              <td  width = "10%" align = "right"><?= number_format($row['Etc'], 2, '.', ','); ?></td>
              
            </tr>
            
            <?php  
                $SumElec = $SumElec+$totalElec;
                $SumWater = $SumWater+$totalWater;
                $SumEtc = $SumEtc+$row['Etc'];
                 $SumRoom = $SumRoom+$row['PriceRoom'];
                $Sumall = $Sumall+$totalall;
              }?>
               <tr> 
                <td colspan="4" align = "right" >รวมรายรับชําระเงินประจําเดือน</td>
                   <td  width = "15%" align = "right"><?= number_format($Sumall, 2, '.', ','); ?></td>
                 <td  width = "15%" align = "right"><?= number_format($SumRoom, 2, '.', ','); ?></td>
                 <td  width = "10%" align = "right"><?= number_format($SumWater, 2, '.', ','); ?></td>
                  <td  width = "10%" align = "right"><?= number_format($SumElec, 2, '.', ','); ?></td>
                 <td  width = "10%" align = "right"><?= number_format($SumEtc, 2, '.', ','); ?></td>
               </tr>
    </table>