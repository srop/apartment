
      
 <?php

require_once('../../config/db_connect.php');
require_once('../../method/numbertoword.php');
 $datebill = $_GET['datebill'];

//echo $datebill = date('Y-m-d', strtotime('{$datebill}'));
switch ($_GET['monthbill']) {
    case "12":
      $db = "12";
  
        break;
    case "1":
      $db = "01";
     
        break;
    case "2":
        $db =  "02";
      
        break;
    case "3":
        $db = "03";
       
        break;
     case "4":
      $db = "04";
    
        break;
    case "5":
        $db =  "05";
      
        break;
    case "6":
        $db = "06";
      
        break;
    case "7":
        $db = "07";
      
        break;
    case "8":
        $db = "08";
        
        break;
    case "9":
        $db = "09";
     
       break;
      case "10":
        $db = "10";
      
        break;
      case "11":
        $db = "11";
      
        break;
    default:
        $db = "";
};


$sql = "";
//$date = "2012-08-06";
//$date=date("Y-m-d",strtotime($date));

$now = date("Y-m-d H:i:s");



  $sql_bill = "SELECT BillUpdate FROM Tmp WHERE  ID = 1";
      $rs_bill = mysqli_query($conn, $sql_bill) or die("employee-grid-data.php: get employees");
      $row_bill = mysqli_fetch_array($rs_bill);
     $bill = $row_bill['BillUpdate'];


     
  $sql_chk = "SELECT * FROM MasterInvoice WHERE id = '{$_GET['id']}'";
  $rs_chk = mysqli_query($conn, $sql_chk) or die("employee-grid-data.php: get employees");
//       $number = 1;
          while ($row_chk = mysqli_fetch_array($rs_chk)){
             $chk_bill = $row_chk['BillNumber'];
}


if($chk_bill == '0' || $chk_bill == ""){ 

// $sql_select = "SELECT count(*) as num FROM MasterInvoice WHERE  Year = '{$_GET['yearbill']}' AND Month = '{$db}' AND BillNumber != ''";
//  $rs = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
////       $number = 1;
//          while ($row_insert = mysqli_fetch_array($rs)){
//              if($bill == NULL){ 
//
//               $sql_select = "SELECT count(*) as num FROM MasterInvoice WHERE  Year = '{$_GET['yearbill']}' AND Month = '{$db}' AND BillNumber != ''";
//               $rs = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
//      
//                while ($row_insert = mysqli_fetch_array($rs)){
//                    $number = sprintf("%03d",$row_insert['num']); 
//                   $billnumber = (int)$_GET['yearbill'].$db.$number+1;
//                }
//
//              }else{
//                    $number =  $row_insert['num']; 
//                 $billnumber = $bill+$number;
//               }
//          }
//        
//        $sql = "UPDATE masterinvoice SET BillNumber = '{$billnumber}',  BillDate =  '$datebill' WHERE ID = '{$_GET['id']}'";
//
//
//      
//            $retval  = mysqli_query($conn, $sql);
//             if(!$retval) {
//                   die('Could not update data: ' .  mysqli_error($conn)); 
// 
//              }
      
   echo     $sql = "UPDATE MasterInvoice SET BillNumber = '{$bill}',  BillDate =  '$datebill' WHERE ID = '{$_GET['id']}'";


      
            $retval  = mysqli_query($conn, $sql);
             if(!$retval) {
                   die('Could not update data: ' .  mysqli_error($conn)); 
 
              }

              $billupdate = $bill+1;
                    $sqlbill = "UPDATE Tmp SET BillUpdate = '{$billupdate}',DateModified = '{$now}' WHERE ID = '1'";
            
                 $retval  = mysqli_query($conn, $sqlbill);
              if(!$retval ) {
                          die('Could not update data: ' . mysqli_error());
                       }
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

/*.page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 256mm;
    outline: 2cm #FFEAEA solid;
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}*/
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
          $sql_query = "SELECT * FROM MasterInvoice WHERE ID =  '{$_GET['id']}' ";
          $rs_query = mysqli_query($conn, $sql_query) or die("employee-grid-data.php: get employees");
                  

         while ($row_pdf = mysqli_fetch_array($rs_query)){
        $ey  = $row_pdf["Year"]+543;
         $ends = date('t', strtotime($row_pdf['Month'].'/'.$row_pdf['Year'])); 
        $ed = date("t/m",strtotime($row_pdf['DateCreated']));
        $year = date("Y",strtotime($row_pdf['DateCreated']))+543;
          ?>

<div id = "body" >

    
            <div class="special" style="padding-top:50px;">
              <table>
                  
                  <tr>
                      <td  style="width:30%;text-align:left;  vertical-align: middle;"> <span style="padding-left:150px;"><?= "       ".$row_pdf['Room'];?></span></td>
                      <td style=""><span style="padding-left:100px;"> &nbsp;&nbsp;<?= $row_pdf['Title']." ".$row_pdf['FName']." ".$row_pdf['LName'];?></span></td>
                  </tr>
                 
              </table>
          </div>
          <div class="special-1" >
            <table >
      <!--           <tr >
                      <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;">ตั้งแต่วันที่<?= " 01/".$row_pdf['Month']."/".$ey; ?></td>
                      <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;">ถึงวันที่ <?= $ends."/".$row_pdf['Month']."/".$ey;?></td>
                  </tr>-->
                <tr >
                    <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;"> <span style="padding-left:150px;"><?= " 01/".$row_pdf['Month']."/".$ey; ?></span></td>
                    <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;"> <span style="margin-left:80px;"> <?= $ends."/".$row_pdf['Month']."/".$ey;?></span></td>
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
                    <td style="width: 40%; text-align: right;  vertical-align: middle;padding-right:70px;"> <?= $totalwater = $row_pdf['PricePerUnitW']*$row_pdf['UnitWater']; ?></td>
                </tr>
               <tr>
                  <td height="30" style="width: 30%; vertical-align: middle;"></td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "><?=number_format($row_pdf['EndElectric'])." - ".number_format($row_pdf['StartElectric']);?></td>
                  <td style="width: 40%; text-align: right; vertical-align: middle;padding-right:70px;"><?= $totalelec = $row_pdf['PricePerUnitEL']*$row_pdf['UnitElectric'];?></td>
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
                   <td style="width: 30%; text-align: center;vertical-align: middle; "></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:70px;"><?=  number_format($row_pdf['Etc'], 2);  ?></td>
              </tr>
              <tr>
                <td colspan="3" style="width: 100%;"></td>
            </tr>
              <tr>
                  <td height="40" style="width: 30%; vertical-align: bottom;"> <span style="margin-left:150px;">  <?php $total = $row_pdf['PriceRoom']+$totalwater+$totalelec+$row_pdf['Etc'];?></span></td>
                 <td style="width: 30%; text-align: left; vertical-align: bottom;"><?= ThaiBahtConversion($total); ?></td>
                <td style="width: 40%; text-align: right; vertical-align: bottom;middle;padding-right:70px;"> <?= number_format($total,2); ?></td>
            </tr>
            <tr>
                <td colspan="3" style=""></td>
            </tr>

            </table>
        </div>

        <div style="margin: auto; width:100%;   padding-top:50px;">
        <table >
             
            <tr >
                <td style="width:50%;text-align:left;  vertical-align: middle;"><span style="margin-left:120px;"> <?=  date("d/m",strtotime($row_pdf['DateCreated']))."/".$year; ?></span></td>
                <td  style="width: 50%; text-align:left; vertical-align: middle;"><span style="margin-left:100px;"></span></td>
              </tr>
              
          </table>
      </div>

       
</div>












<?php } ?>




  </body>
</html>