<?php

require_once('../../config/db_connect.php');
require_once('../../method/numbertoword.php');

 $year1 = $_POST['yearbill'] ;
$now = date("Y-m-d H:i:s");


?>
<style type="text/css">
<!--
div.special { margin: auto; width:100%;   }
div.special-2 { margin: auto; width:100%;  padding-top:75px; }
div.special-1 {
	margin: auto;
	width: 100%;
        
	
}
div.special table { width:100%; border:1px solid #000000; font-size:15px; border-collapse:collapse; }
div.special-1 table { width:100%; border:1px solid #000000; font-size:15px; border-collapse:collapse; }
div.special-2 table { width:100%; border:1px solid #000000; font-size:15px; border-collapse:collapse; }
.topLeftRight     { border-top:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;}
.topLeftBottom    { border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; }
.topLeft          { border-top:1px solid #000; border-left:1px solid #000; }
.bottomLeft       { border-bottom:1px solid #000; border-left:1px solid #000; }
.topRight         { border-top:1px solid #000; border-right:1px solid #000; }
.bottomRight      { border-bottom:1px solid #000; border-right:1px solid #000; }
.topRightBottom   { border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000; }
.Bottom   {
	border-bottom-bottom: thin;
	border-bottom-style: dotted;
	border-bottom-color: #000;
}

</style>


<page style="font-size: 15px;font-family:freeserif"  backbottom="0mm"  backtop="15mm"  >
     <table style="width: 100%;">
         <?php
  $sql_query = "SELECT * FROM MasterInvoice WHERE  Room =  '{$_POST['Room']}'  AND Year = '{$_POST['yearbill']}' AND Month = '{$_POST['monthbill']}' ORDER BY ID DESC  LIMIT 1";
          $rs_query = mysqli_query($conn, $sql_query) or die("employee-grid-data.php: get employees");
          

 while ($row_pdf = mysqli_fetch_array($rs_query)){
$ey  = $row_pdf["Year"]+543;
 $ends = date('t', strtotime($row_pdf['Month'].'/'.$row_pdf['Year'])); 
$ed = date("t/m",strtotime($row_pdf['DateCreated']));
$year = date("Y",strtotime($row_pdf['DateCreated']))+543;
  ?>
    
    <div class="special">
        <table>
            <tr>
                <td height="20" colspan="2" style="width: 100%; text-align:left;vertical-align: middle;"></td>
            </tr>
            <tr>
                <td  height="20"style="width:30%;text-align:left;  vertical-align: middle;"> <span style="margin-left:130px;"><?= "       ".$row_pdf['Room'];?></span></td>
                <td  height="20" style="width: 70%; text-align:left; vertical-align: middle;"><span style="margin-left:90px;"> &nbsp;&nbsp;<?= $row_pdf['Title']." ".$row_pdf['FName']." ".$row_pdf['LName'];?></span></td>
            </tr>
           
        </table>
    </div>
     <div class="special-1">
      <table >
<!--           <tr >
                <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;">ตั้งแต่วันที่<?= " 01/".$row_pdf['Month']."/".$ey; ?></td>
                <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;">ถึงวันที่ <?= $ends."/".$row_pdf['Month']."/".$ey;?></td>
            </tr>-->
          <tr >
              <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;"> <span style="margin-left:100px;"><?= " 01/".$row_pdf['Month']."/".$ey; ?></span></td>
              <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;"> <span style="margin-left:100px;"> <?= $ends."/".$row_pdf['Month']."/".$ey;?></span></td>
            </tr>
            <br> <br>
              <tr >
                <td colspan="2" ></td>
            </tr>
             
        </table>
    </div>
    <div style="margin: auto; width:100%;  padding: 2px; padding-top:30px;">
    <table style="width: 100%; border: solid 1px #FFFFFF;">
        <tr  height="30">
            <td  height="22"style="width: 30%; vertical-align: middle;"></td>
            <td style="width: 40%; text-align: center; vertical-align: middle;"></td>
            <td style="width: 30%;text-align: right; vertical-align: middle;"> <?=  number_format($row_pdf['PriceRoom'], 2);  ?></td>
        </tr>
         <tr>
            <td height="22"style="width: 30%; vertical-align: middle;"></td>
            <td style="width: 40%; text-align: center; vertical-align: middle; "><?=number_format($row_pdf['EndWater'])." - ".number_format($row_pdf['StartWater']);?></td>
            <td style="width: 30%; text-align: right;  vertical-align: middle; "> <?= $totalwater = $row_pdf['PricePerUnitW']*$row_pdf['UnitWater']; ?></td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;"></td>
             <td style="width: 40%; text-align: center;vertical-align: middle; "><?=number_format($row_pdf['EndElectric'])." - ".number_format($row_pdf['StartElectric']);?></td>
            <td style="width: 30%; text-align: right; vertical-align: middle;"><?= $totalelec = $row_pdf['PricePerUnitEL']*$row_pdf['UnitElectric'];?></td>
        </tr>
          <tr  height="30">
            <td  height="22"style="width: 30%; vertical-align: middle;"></td>
            <td style="width: 40%; text-align: center; vertical-align: middle;">0 - 0</td>
            <td style="width: 30%;text-align: right; vertical-align: middle;"> <?=  number_format(0, 2);  ?></td>
        </tr>
        <tr>
            <td height="22"style="width: 30%; vertical-align: middle;"></td>
            <td style="width: 40%; text-align: center; vertical-align: middle; "></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;"><?=  number_format(0, 2);  ?></td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;"></td>
             <td style="width: 40%; text-align: center; vertical-align: middle;"></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;"><?=  number_format(0, 2);  ?></td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;"></td>
             <td style="width: 40%; text-align: center; vertical-align: middle;"></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">-</td>
        </tr>
          <tr>
            <td height="22" style="width: 30%; vertical-align: middle;"></td>
             <td style="width: 40%; text-align: center;vertical-align: middle; "></td>

            <td style="width: 30%; text-align: right;vertical-align: middle;">-</td>
        </tr>
        <tr>
            <td height="23" style="width: 30%;vertical-align: middle;"></td>
             <td style="width: 40%; text-align: center;vertical-align: middle; "></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;"><?=  number_format($row_pdf['Etc'], 2);  ?></td>
        </tr>
         <tr>
                <td colspan="3" style="width: 100%;"></td>
            </tr>
          <tr>
              <td height="40" style="width: 30%; vertical-align: bottom;"> <span style="margin-left:150px;">  <? $total = $row_pdf['PriceRoom']+$totalwater+$totalelec+$row_pdf['Etc'];?></span></td>
             <td style="width: 40%; text-align: left; vertical-align: bottom;"><?= ThaiBahtConversion($total); ?></td>
            <td style="width: 30%; text-align: right; vertical-align: bottom;"> <?= number_format($total,2); ?></td>
        </tr>
         <tr>
                <td colspan="3" style=""></td>
            </tr>
         
    </table>
    </div>
      <div style="margin: auto; width:100%;   padding-top:40px;">
      <table >
           
          <tr >
              <td style="width:50%;text-align:left;  vertical-align: middle;"><span style="margin-left:100px;"> <?=  date("d /m ",strtotime($row_pdf['DateCreated']))."/ ".$year; ?></span></td>
              <td  style="width: 50%; text-align:left; vertical-align: middle;"><span style="margin-left:100px;"></span></td>
            </tr>
            
        </table>
    </div>
   
         <br> <br> <br> <br> <br>
         
<?php } ?>
    </table>
</page>
    




























