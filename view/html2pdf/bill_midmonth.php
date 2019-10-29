<?php
require_once('../../config/db_connect.php');
require_once('../../method/numbertoword.php');
$now = date("Y-m-d H:i:s");

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
  
if($_POST['month'] == "12"){
	$year_next = $_POST['year']+1;
}else{
	$year_next = $_POST['year'];
}

 $sql_bill = "SELECT BillUpdate FROM Tmp WHERE  ID = 1";
      $rs_bill = mysqli_query($conn, $sql_bill) or die("employee-grid-data.php: get employees");
      $row_bill = mysqli_fetch_array($rs_bill);
     $bill = $row_bill['BillUpdate'];


$UnitWater = $_POST['endwater'] - $_POST['startwater'];
$Unitelectric = $_POST['endelectric'] - $_POST['startelectric'];
 
   	 $sql = "UPDATE {$db} SET StartWater = '{$_POST['startwater']}' ,EndWater = '{$_POST['endwater']}',UnitWater = '{$_POST['pricewater']}'
   				,StartElectric  = '{$_POST['startelectric']}',EndElectric = '{$_POST['endelectric']}' , UnitElectric = '{$_POST['priceelce']}',Etc = '{$_POST['etc']}'
   				,EtcDetail = '{$_POST['etcdetail']}',DateRecord = '{$now}' WHERE Room = '{$_POST['roomadd']}' AND Year = '{$_POST['year']}'";
	

         $retval  = mysqli_query($conn, $sql) ;
  if(!$retval ) {
              die('Could not update data: ' . mysqli_error($sql));
           }
        
  	 $sql = "UPDATE {$db_next} SET StartWater = '{$_POST['startwater']}'  ,	StartElectric  = '{$_POST['startelectric']}',UnitWater = '{$_POST['pricewater']}'
  				, UnitElectric = '{$_POST['priceelce']}',DateRecord = '{$now}' WHERE Room = '{$_POST['roomadd']}' AND Year = '{$year_next}'";
	
         $retval  = mysqli_query($conn, $sql);
  if(!$retval ) {
              die('Could not update data: ' . mysqli_error($retval ));
           }




		
            
 
  (int)$UnitElec =   $_POST['endelectric'] - $_POST['startelectric'];
        
       (int)$UnitWater =   $_POST['endwater'] - $_POST['startwater'];


  $sql_count = "SELECT count(*) as num FROM MasterInvoice WHERE  Room = '{$_POST['roomadd']}' AND Year = '{$_POST['year']}' AND Month = '{$_POST['month']}'";
  $rs = mysqli_query($conn, $sql_count) or die("employee-grid-data.php: get employees");
  $row_count = mysqli_fetch_array($rs);
  if($row_count['num'] == 0){
      
      
  
      $sql = "INSERT INTO MasterInvoice
	 ( ID,Year, Month,FromTranID,Floor,Room,PriceRoom,Title,FName,LName,StartElectric,EndElectric,UnitElectric,PricePerUnitEL,StartWater, EndWater,UnitWater,PricePerUnitW,InvoiceNumber ,Etc,EtcDetail,BillNumber,BillDate)  
        VALUES
	('','{$_POST["year"]}', '{$_POST["month"]}', '{$_POST["fromtranid"]}','{$_POST["floor"]}','{$_POST["roomadd"]}','{$_POST["room"]}','{$_POST["Title"]}', '{$_POST["FName"]}','{$_POST["LName"]}',"
       . " '{$_POST["startelectric"]}','{$_POST["endelectric"]}','{$UnitElec}','{$_POST["priceelce"]}','{$_POST["startwater"]}','{$_POST["endwater"]}','{$UnitWater}','{$_POST["pricewater"]}',"
      . "'999999','{$_POST["etc"]}','{$_POST["etcdetail"]}','{$bill}','{$_POST["datepicker"]}')";  
		$retval  = mysqli_query($conn, $sql);
						 if(!$retval ) {
								   die('Could not update data: ' . mysqli_error($retval));
	
															}
      
      $last_id = mysqli_insert_id($conn);   
      
         $billupdate = $bill+1;
                    $sqlbill = "UPDATE Tmp SET BillUpdate = '{$billupdate}',DateModified = '{$now}' WHERE ID = '1'";
            
                 $retval  = mysqli_query($conn, $sqlbill);
              if(!$retval ) {
                          die('Could not update data: ' . mysqli_error());
                       }
  }else{
      
      $sql = "UPDATE MasterInvoice SET 
                            Floor = '{$_POST["floor"]}'
                            ,FromTranID =  '{$_POST["fromtranid"]}'
                            ,Room =  '{$_POST["roomadd"]}'
                             ,PriceRoom =  '{$_POST["room"]}'
                            ,Title =  '{$_POST["Title"]}'
                            ,FName =  '{$_POST["FName"]}'
                            , LName =  '{$_POST["LName"]}'
                            , StartElectric =  '{$_POST["startelectric"]}'
                            , EndElectric =  '{$_POST["endelectric"]}'
                            , UnitElectric =  '{$UnitElec}'
                            , PricePerUnitEL =  '{$_POST["priceelce"]}'

                            ,StartWater =  '{$_POST["startwater"]}'
 
                            ,EndWater = '{$_POST["endwater"]}'
                            ,UnitWater =  '{$UnitWater}'
                            ,PricePerUnitW =  '{$_POST["pricewater"]}'
                            ,EtcDetail = '{$_POST["etcdetail"]}'
                             ,Etc = '{$_POST["etc"]}'
                            ,DateCreated = '{$now}' 

                            WHERE  Room = '{$_POST['roomadd']}' AND Year = '{$_POST['year']}' AND Month = '{$_POST['month']}'";
                 //   echo "<br>";        
                         $retval  = mysqli_query($conn, $sql);
                  if(!$retval ) {
                              die('Could not update data: ' . mysqli_error());
                           } //echo "por";echo "<br>";
  }
?>

<style type="text/css" media="print">
    @page 
    {
        size: letter;   /* auto is the initial value */
       /* this affects the margin in the printer settings */
         height: 11in !important;
          margin: 0 !important; padding: 0 !important; 

    }  

  
</style>
<style type="text/css">
  
#body {

   
    height: 11in; 
        width: 8.5in;

   


    background-color: #FAFAFA;
   
}

div.special { margin: auto; width:100%;    }
div.special-2 { margin: auto; width:100%;  padding-top:75px; }
div.special-1 {
  margin: auto;
  width: 100%;
        
  
}
div.special table { width:100%; border:0px solid #000000; font-family:freeserif;  border-collapse:collapse; }
div.special-1 table { width:100%; border:0px solid #000000; font-family:freeserif;  border-collapse:collapse; }
div.special-2 table { width:100%; border:1px solid #000000;font-family:freeserif;  border-collapse:collapse; }
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
 <body>
 <?php
         $total = "";
       //   $sql_query = "SELECT * FROM MasterInvoice WHERE  Room =  '2117'  AND Year = '2016' AND Month = '01' ORDER BY ID DESC  LIMIT 1";
         //  $sql_query = "SELECT * FROM MasterInvoice WHERE  Room =  '{$_GET['Room']}'  AND Year = '{$_GET['yearbill']}' AND Month = '{$_GET['monthbill']}' ORDER BY ID DESC  LIMIT 1";
        $sql_query = "SELECT * FROM MasterInvoice WHERE  Room = '{$_POST['roomadd']}' AND Year = '{$_POST['year']}' AND Month = '{$_POST['month']}'";
          $rs_query = mysqli_query($conn, $sql_query) or die("employee-grid-data.php: get employees");
                  

         while ($row_pdf = mysqli_fetch_array($rs_query)){
        $ey  = $row_pdf["Year"]+543;
         $ends = date('t', strtotime($row_pdf['Month'].'/'.$row_pdf['Year'])); 
        $ed = date("t/m",strtotime($row_pdf['BillDate']));
        $year = date("Y",strtotime($row_pdf['BillDate']))+543;
         $totalwater = $row_pdf['PricePerUnitW']*$row_pdf['UnitWater'];
         $totalelec = $row_pdf['PricePerUnitEL']*$row_pdf['UnitElectric'];
          ?>

<div id = "body" >

    
            <div class="special" style="padding-top:-10px;">
                <table >
                    <tr>
                        <td height="20" colspan="2" style="width: 100%; text-align:left;vertical-align: middle;padding-left:100px; font-size: 14px; font-family: freeserif;"><?php echo NAME; ?></td>
                    </tr>
                    <tr>
                       
                        <td  height="20" style="width: 100%; text-align:left; vertical-align: middle;padding-left:90px; font-size: 14px; font-family: freeserif;"><?php echo ADDRESS; ?><span style="margin-left:170px;font-size: 15px; text-align: right;"> <?= $row_pdf['BillNumber'];?></span></td>
                    </tr>
                   
                </table>
            </div>
            
            <div class="special" style="padding-top:20px;">
              <table>
                  
                  <tr>
                      <td  style="width:30%;text-align:left;  vertical-align: middle;"> <span style="padding-left:180px;"><?= "       ".$row_pdf['Room'];?></span></td>
                      <td style=""><span style="padding-left:130px;"> &nbsp;&nbsp;<?= $row_pdf['Title']." ".$row_pdf['FName']." ".$row_pdf['LName'];?></span></td>
                  </tr>
                 
              </table>
          </div>
          <div class="special-1" style="padding-top:-20px;" >
            <table >
    
                <tr  >
                    <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;"> <span style="padding-left:180px;"><?= " 01/".$row_pdf['Month']."/".$ey; ?></span></td>
                    <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;"> <span style="margin-left:100px;"> <?= $ends."/".$row_pdf['Month']."/".$ey;?></span></td>
                  </tr>
                  <br> 
                    <tr >
                      <td colspan="2" ></td>
                  </tr>
                   
              </table>
        </div>


         <div class = "special" style="margin: auto; width:100%;  padding-top:30px;">
             <table style="width: 100%; border: solid 1px #FFFFFF;">
                <tr  height="30">
                    <td  height="30"style="width: 30%; vertical-align: middle;"></td>
                    <td style="width: 30%; text-align: center; vertical-align: middle;"></td>
                    <td style="width: 40%;text-align: right; vertical-align: middle; padding-right:70px;"> <?=  number_format($row_pdf['PriceRoom'], 2);  ?></td>
                </tr>
                 <tr>
                    <td height="30"style="width: 30%; vertical-align: middle;"></td>
                    <td style="width: 30%; text-align: center; vertical-align: middle; "><?=number_format($row_pdf['EndWater'])." - ".number_format($row_pdf['StartWater']);?></td>
                    <td style="width: 40%; text-align: right;  vertical-align: middle;padding-right:70px;"> <?=  number_format($totalwater,2); ?></td>
                </tr>
               <tr>
                  <td height="30" style="width: 30%; vertical-align: middle;"></td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "><?=number_format($row_pdf['StartElectric'])." - ".number_format($row_pdf['EndElectric']);?></td>
                  <td style="width: 40%; text-align: right; vertical-align: middle;padding-right:70px;"><?=   number_format($totalelec,2);?></td>
              </tr>
               <tr  height="30">
                  <td  height="22"style="width: 30%; vertical-align: middle;"></td>
                  <td style="width: 30%; text-align: center; vertical-align: middle;">0 - 0</td>
                  <td style="width: 40%;text-align: right; vertical-align: middle;padding-right:70px;"> <?=  number_format(0, 2);  ?></td>
              </tr>
              <tr>
                  <td height="30"style="width: 30%; vertical-align: middle;"></td>
                  <td style="width: 30%; text-align: center; vertical-align: middle; "></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:70px;"><?=  number_format(0, 2);  ?></td>
              </tr>
              <tr>
                  <td height="30" style="width: 30%; vertical-align: middle;"></td>
                   <td style="width: 30%; text-align: center; vertical-align: middle;"></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:70px;"><?=  number_format(0, 2);  ?></td>
              </tr>
              <tr>
                  <td height="30" style="width: 30%; vertical-align: middle;"></td>
                   <td style="width: 30%; text-align: center; vertical-align: middle;"></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:70px;">-</td>
              </tr>
                <tr>
                  <td height="30" style="width: 30%; vertical-align: middle;"></td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "></td>

                  <td style="width: 30%; text-align: right;vertical-align: middle;padding-right:70px;">-</td>
              </tr>
              <tr>
                  <td height="30" style="width: 30%;vertical-align: middle;"></td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "><?=$row_pdf['EtcDetail'] ?></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:70px;"><?=  number_format($row_pdf['Etc'], 2);  ?></td>
              </tr>
              <tr>
                <td colspan="3" style="width: 100%;"></td>
            </tr>
              <tr>
                  <td height="40" style="width: 30%; vertical-align: bottom;"> <span style="margin-left:150px;">  <?php $total = $row_pdf['PriceRoom']+$totalwater+$totalelec+$row_pdf['Etc'];?></span></td>
                 <td style="width: 30%; text-align: left; vertical-align: bottom;"><?= ThaiBahtConversion($total); ?></td>
                <td style="width: 40%; text-align: right; vertical-align: bottom;padding-right:70px;"> <?= number_format($total,2); ?></td>
            </tr>
            <tr>
                <td colspan="3" style=""></td>
            </tr>

            </table>
        </div>

        <div style="margin: auto; width:100%;   padding-top:50px;">
        <table >
             
            <tr >
                <td style="width:50%;text-align:left;  vertical-align: middle;"><span style="margin-left:170px;"> <?=  date("d/m",strtotime($row_pdf['BillDate']))."/".$year; ?></span></td>
                <td  style="width: 50%; text-align:left; vertical-align: middle;"><span style="margin-left:100px;"></span></td>
              </tr>
              
          </table>
      </div>

       
</div>











<?php } ?>
    

 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
