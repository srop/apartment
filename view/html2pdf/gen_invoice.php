 
    <?php
 set_time_limit(1800);
require_once('../../config/db_connect.php');

 $year1 = $_POST['year'];
$now = date("Y-m-d H:i:s");
$year1 = $_POST['year'];
switch ($_POST['month']) {
    case "12":
      $db = "DecemberMeter";
      $db_next = "JanuaryMeter";
        break;
    case "01":
      $db = "JanuaryMeter";
      $db_next = "FebruaryMeter";
        break;
    case "02":
        $db =  "FebruaryMeter";
        $db_next = "MarchMeter";
        break;
    case "03":
        $db = "MarchMeter";
        $db_next = "AprilMeter";
        break;
     case "04":
      $db = "AprilMeter";
      $db_next = "MayMeter";
        break;
    case "05":
        $db =  "MayMeter";
        $db_next = "JuneMeter";        
        break;
    case "06":
        $db = "JuneMeter";
        $db_next = "JulyMeter";
        break;
    case "07":
        $db = "JulyMeter";
        $db_next = "AugustMeter";
        break;
    case "08":
        $db = "AugustMeter";
        $db_next = "SeptemberMeter";
        break;
    case "09":
        $db = "SeptemberMeter";
         $db_next = "OctoberMeter"; 
       break;
      case "10":
        $db = "OctoberMeter";
        $db_next = "NovemberMeter";
        break;
      case "11":
        $db = "NovemberMeter";
        $db_next = "DecemberMeter";
        break;
    default:
        $db = "";
}

function ThaiBahtConversion($amount_number)
{

    $amount_number = number_format($amount_number, 2, ".","");
    //echo "<br/>amount = " . $amount_number . "<br/>";
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false)
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
   
    //list($number, $fraction) = explode(".", $number);
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
   
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else
        $ret .= "ถ้วน";
    //return iconv("UTF-8", "TIS-620", $ret);
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
   
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
} 

$sql_water = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 1";
$rs_water = mysqli_query($conn, $sql_water) or die("employee-grid-data.php: get employees");
$row_water = mysqli_fetch_array($rs_water);


$sql_elec = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 2";
$rs_elec = mysqli_query($conn, $sql_elec) or die("employee-grid-data.php: get employees");
$row_elec = mysqli_fetch_array($rs_elec); 


   $sql_chknum = "SELECT count(*) + 1 as numinvoice FROM MasterInvoice WHERE Year = {$year1}  AND Month =  '{$_POST["month"]}'";
$rs_chknum = mysqli_query($conn, $sql_chknum) or die("employee-grid-data.php: get employees");
$row_chknum = mysqli_fetch_array($rs_chknum); 


 $sql_select = "SELECT MT.* ,MR.Title, MR.FName, MR.LName,MR.ID as UserID , MM.Price , MM.Room FROM  masterrental  as MR 
            INNER JOIN  {$db} as MT ON MR.ID = MT.Rental LEFT JOIN masterroom AS MM on MT.Room = MM.Room
            WHERE MT.Floor = '{$_POST['Floor']}' AND Year = '{$year1}'  AND MT.Room IN (SELECT Room FROM masterroom WHERE STATUS = 1)";
   $rs = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
//  $sql_select = "SELECT Title, FName,LName,MR.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,TU.Flag ,MT.* , MM.Price "
//                 . "FROM masterrental  MR INNER JOIN transactionuser as TU ON MR.ID = TU.UserID"
//                 . " LEFT JOIN {$db}  as MT ON TU.Room = MT.Room "
//                 . "LEFT JOIN masterroom AS MM ON TU.Room = MM.Room "
//                 . "WHERE  TU.Flag = '1' AND TU.Floor =  {$_POST['Floor']} AND Year = {$year1} ORDER BY TU.Room ASC";
//         $rs = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
     $number = $row_chknum['numinvoice'];
      
         $number = sprintf("%03d",$row_chknum['numinvoice']);   
         while ($row_insert = mysqli_fetch_array($rs)){
               
            $number = sprintf("%03d",$number); 
            $invoicenumber = (int)$year1.$_POST["month"].$number;
 
        (int)$UnitElec =   $row_insert["EndElectric"] - $row_insert["StartElectric"];
        
       (int)$UnitWater =   $row_insert["EndWater"] - $row_insert["StartWater"];

            $sql_chk = "SELECT *,count(*) as num FROM MasterInvoice WHERE Year = {$year1}  AND Month =  '{$_POST["month"]}' AND Room = {$row_insert["Room"]} ";
            $rs_chk = mysqli_query($conn, $sql_chk) or die("employee-grid-data.php: get employees");
            $row_chk = mysqli_fetch_array($rs_chk); 
            //  echo "<br>";
           
            // echo "<br>";
           
            if(  $row_chk['num']  == '0'){
 


                      $sql = "INSERT INTO MasterInvoice
			  ( ID,Year, Month,FromTranID,Floor,Room,PriceRoom,Title,FName,LName,StartElectric,EndElectric,UnitElectric,PricePerUnitEL,StartWater, EndWater,UnitWater,PricePerUnitW,InvoiceNumber ,Etc,DateCreated)  
                               VALUES
			 ('','{$row_insert["Year"]}', '{$_POST["month"]}', '{$row_insert["FromTranID"]}','{$row_insert["Floor"]}','{$row_insert["Room"]}','{$row_insert["Price"]}','{$row_insert["Title"]}', '{$row_insert["FName"]}','{$row_insert["LName"]}',"
                       . " '{$row_insert["StartElectric"]}','{$row_insert["EndElectric"]}','{$UnitElec}','{$row_elec["Price"]}','{$row_insert["StartWater"]}','{$row_insert["EndWater"]}','{$UnitWater}','{$row_water["Price"]}',"
                       . "'{$invoicenumber}','{$row_insert["Etc"]}','{$now}')";  

// echo "<br>";
						
						$retval  = mysqli_query($conn, $sql);
						 if(!$retval ) {
								   die('Could not update data: ' . mysql_error());
	
															}
      $number++;
            } if(  $row_chk['num']  > '0'){

                   $sql = "UPDATE MasterInvoice SET 
                            Floor = '{$row_insert["Floor"]}'
                            ,FromTranID =  '{$row_insert["FromTranID"]}'
                            ,Room =  '{$row_insert["Room"]}'
                            ,PriceRoom =  '{$row_insert["Price"]}'
                            ,Title =  '{$row_insert["Title"]}'
                            ,FName =  '{$row_insert["FName"]}'
                            , LName =  '{$row_insert["LName"]}'
                            , StartElectric =  '{$row_insert["StartElectric"]}'
                            , EndElectric =  '{$row_insert["EndElectric"]}'
                            , UnitElectric =  '{$UnitElec}'
                            , PricePerUnitEL =  '{$row_elec["Price"]}'

                            ,StartWater =  '{$row_insert["StartWater"]}'
 
                            ,EndWater = '{$row_insert["EndWater"]}'
                            ,UnitWater =  '{$UnitWater}'
                            ,PricePerUnitW =  '{$row_water["Price"]}'
                             ,Etc = '{$row_insert["Etc"]}'
                            ,DateCreated = '{$now}' 
                             WHERE  Year = {$year1}  AND Month =  '{$_POST["month"]}' AND Room = {$row_insert["Room"]} ";
                 //   echo "<br>";        
                         $retval  = mysqli_query($conn, $sql);
                  if(!$retval ) {
                              die('Could not update data: ' . mysqli_error());
                           } //echo "por";echo "<br>";
            }
         } 

?>


<style type="text/css">
<!--
div.special { margin: auto; width:95%;   }
div.special-2 { margin: auto; width:95%;  padding-top:75px; }
div.special-1 {
	margin: auto;
	width: 95%;
        
	
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


<page style="font-size: 15px;font-family:freeserif"  backbottom="0mm"  backtop="20mm"  >
     <table style="width: 100%;">
         <?php
 $sql_query = "SELECT * FROM MasterInvoice WHERE  Floor =  {$_POST['Floor']} AND Year = {$year1} AND Month = {$_POST["month"]} AND Room IN (SELECT Room FROM masterroom WHERE STATUS = 1)  ORDER BY Room ASC";
          $rs_query = mysqli_query($conn, $sql_query) or die("employee-grid-data.php: get employees");
          

 while ($row_pdf = mysqli_fetch_array($rs_query)){
$ey  = $row_pdf["Year"]+543;
 $ends = date('t', strtotime($row_pdf['Month'].'/'.$row_pdf['Year'])); 
$ed = date("t/m",strtotime($row_pdf['DateCreated']));
$year = date("Y",strtotime($row_pdf['DateCreated']))+543;
$total = "";
  ?>
    
    <div class="special">
        <table>
            <tr>
                <td height="20" colspan="2" style="width: 100%; text-align:left;vertical-align: middle;"><?php echo NAME; ?><span style="margin-left:180px;font-size: 13px; text-align: right;">เลขที่ใบแจ้งหนี้ <?= "  ".$row_pdf['InvoiceNumber'];?></span></td>
            </tr>
            <tr>
                <td  height="20"style="width:30%;text-align:left;  vertical-align: middle;">เลขืทีห้อง <?= "  ".$row_pdf['Room'];?></td>
                <td  height="20" style="width: 70%; text-align:left; vertical-align: middle;">ชื่อ - สกุล &nbsp;&nbsp;<?= $row_pdf['Title']." ".$row_pdf['FName']." ".$row_pdf['LName'];?></td>
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
                <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;">ตั้งแต่วันที่<?= " 01/".$row_pdf['Month']."/".$ey; ?></td>
                <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;">ถึงวันที่ <?= $ends."/".$row_pdf['Month']."/".$ey;?></td>
            </tr>
            <br> <br>
              <tr >
                <td colspan="2" style="padding-top:10px; width: 100%; text-align:left;border-bottom:1px dashed #000000; vertical-align: bottom;"></td>
            </tr>
             
        </table>
    </div>
    <div style="margin: auto; width:95%;  padding: 2px; padding-top:10px;">
    <table style="width: 100%; border: solid 1px #FFFFFF;">
        <tr  height="30">
            <td  height="22"style="width: 30%; vertical-align: middle;">ค่าเช่า</td>
            <td style="width: 40%; text-align: center; vertical-align: middle;"></td>
            <td style="width: 30%;text-align: right; vertical-align: middle; padding-right: 20px;"> <?=  number_format($row_pdf['PriceRoom'], 2);  ?></td>
        </tr>
         <tr>
            <td height="22"style="width: 30%; vertical-align: middle;">ค่าน้ำ</td>
            <td style="width: 40%; text-align: center; vertical-align: middle; "><?=number_format($row_pdf['StartWater'])." - ".number_format($row_pdf['EndWater']);?></td>
            <td style="width: 30%; text-align: right;  vertical-align: middle; padding-right: 20px;"> <?php $totalwater = $row_pdf['PricePerUnitW']*$row_pdf['UnitWater']; echo number_format($totalwater,2);?></td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">ค่าไฟฟ้า</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; "><?=number_format($row_pdf['StartElectric'])." - ".number_format($row_pdf['EndElectric']);?></td>
            <td style="width: 30%; text-align: right; vertical-align: middle; padding-right: 20px;"><?php $totalelec = $row_pdf['PricePerUnitEL']*$row_pdf['UnitElectric']; echo number_format($totalelec,2);?></td>
        </tr>
          <tr  height="30">
            <td  height="22"style="width: 30%; vertical-align: middle;">ค่าโทรศัพท์</td>
            <td style="width: 40%; text-align: center; vertical-align: middle;">0 - 0</td>
            <td style="width: 30%;text-align: right; vertical-align: middle; padding-right: 20px;"> <?=  number_format(0, 2);  ?></td>
        </tr>
        <tr>
            <td height="22"style="width: 30%; vertical-align: middle;">ค่าแอร์</td>
            <td style="width: 40%; text-align: center; vertical-align: middle; "></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;padding-right: 20px;"><?=  number_format(0, 2);  ?></td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">ค่าเฟอร์นิเจอร์</td>
             <td style="width: 40%; text-align: center; vertical-align: middle;"></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;padding-right: 20px;"><?=  number_format(0, 2);  ?></td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">เงินประกัน</td>
             <td style="width: 40%; text-align: center; vertical-align: middle;"></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;padding-right: 20px;">-</td>
        </tr>
          <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">เงินรับล่วงหน้า</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">กรุณาชำระเงินก่อนวันที่ 7</td>

            <td style="width: 30%; text-align: right;vertical-align: middle;padding-right: 20px;">-</td>
        </tr>
        <tr>
            <td height="23" style="width: 30%;vertical-align: middle;">อื่่นๆ...............................................</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; "></td>
            <td style="width: 30%; text-align: right;vertical-align: middle;padding-right: 20px;"><?=  number_format($row_pdf['Etc'], 2);  ?></td>
        </tr>
         <tr>
                <td colspan="3" style="width: 100%; border-bottom:1px dashed #000000"></td>
            </tr>
          <tr>
            <td height="50" style="width: 30%; vertical-align: middle;"> รวมทั้งสิ้น <?php $total = $row_pdf['PriceRoom'] + $row_pdf['Etc'] + $totalwater + $totalelec;?></td>
             <td style="width: 40%; text-align: left; vertical-align: middle;"><?php echo ThaiBahtConversion($total);  ?></td>
            <td style="width: 30%; text-align: right; vertical-align: middle;padding-right: 20px;"> <?= number_format($total,2); ?></td>
        </tr>
         <tr>
                <td colspan="3" style="width: 100%; border-bottom:1px double #000000"></td>
            </tr>
         
    </table>
    </div>
    <div class="special-1">
      <table >
           
          <tr >
                <td style="width:50%;text-align:left;  vertical-align: middle;">ออก ณ <?=  date("d /m ",strtotime($row_pdf['DateCreated']))."/ ".$year; ?></td>
                <td  style="width: 50%; text-align:left; vertical-align: middle;">ผู้แจ้ง</td>
            </tr>
            
        </table>
    </div>
   
         <br> <br> <br> <br> <br>
         
<?php } ?>
    </table>
</page>
    




























