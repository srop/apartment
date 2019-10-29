<?php
session_start();
header("Content-type:text/html; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);    
include("../../config/db_connect.php");
?>
<style type="text/css">
<!--
div.special { margin: auto; width:95%;  }
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

.class1 {
   vertical-align: bottom;
}
#child {
 
  vertical-align: middle;
 }
table td.message {
		color: #003300;
		font-family: helvetica;
		font-size: 8pt;
		border-left: 3px solid red;
		border-right: 3px solid #FF00FF;
		border-top: 3px solid green;
		border-bottom: 3px solid blue;
		background-color: #ccffcc;
	}
</style>

   
         <?php
for($i = 1; $i<= 10; $i++){

  ?>
   
   
         <table cellspacing="0" cellpadding="1" border="0" style="width:100%; ">  
            <tr>
                <td height="10" colspan="2" style="width: 100%; text-align:left">บริษัทไพรเงินจำกัด  เเลขที่ผู้เสียภาษี 3 10 182672 3.</td>
            </tr>
            <tr>
                <td  height="10"style="width:30%;text-align:left;  vertical-align: middle;">เลขืทีห้อง</td>
                <td  height="10" style="width: 70%; text-align:left; vertical-align: middle;">ชื่อ - สกุล</td>
            </tr>
           
        </table>
    
     
        <table cellspacing="0" cellpadding="1" border="0" style="width:100%; ">  
           
          <tr >
                <td  height="10"style="width:50%;text-align:left;  vertical-align: middle;">ตั้งแต่วันที่</td>
                <td  height="10" style="width: 50%; text-align:left; vertical-align: middle;">ถึงวันที่</td>
            </tr>
           
              <tr >
                <td colspan="2" style=" width: 100%; border-bottom:1px dashed #000000; vertical-align: top;"></td>
            </tr>
             
        </table>
    
    <table style="width: 100%; border: solid 1px #FFFFFF;">
        <tr  height="30">
            <td  height="23"style="width: 30%; vertical-align: middle;">ค่าเช่า</td>
            <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%;text-align: right; vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="23"style="width: 30%; vertical-align: middle;">ค่าน้ำ</td>
            <td style="width: 40%; text-align: center; vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right;">CCC</td>
        </tr>
        <tr>
            <td height="23" style="width: 30%; vertical-align: middle;">ค่าไฟฟ้า</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right; vertical-align: middle;">CCC</td>
        </tr>
          <tr  height="30">
            <td  height="23"style="width: 30%; vertical-align: middle;">ค่าโทรศัพท์</td>
            <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%;text-align: right; vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="23"style="width: 30%; vertical-align: middle;">ค่าแอร์</td>
            <td style="width: 40%; text-align: center; vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="23" style="width: 30%; vertical-align: middle;">ค่าเฟอร์นิเจอร์</td>
             <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="23" style="width: 30%; vertical-align: middle;">เงินประกัน</td>
             <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
          <tr>
            <td height="23" style="width: 30%; vertical-align: middle;">เงินรับล่วงหน้า</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">กรุณาชำระเงินก่อนวันที่ 7</td>

            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="23" style="width: 30%;vertical-align: middle;">อื่่นๆ...............................................</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
         <tr>
                <td colspan="3" style="width: 100%; border-bottom:1px dashed #000000"></td>
            </tr>
          
          <tr>
            <td  height="40" style="width: 30%;vertical-align: middle;  "> รวมทั้งสิ้น</td>
            <td  height="23" style="width: 40%; text-align: left; " class="first">กรุณาชำระเงินก่อนวันที่ 7</td>
            <td   height="23" style="width: 30%; text-align: right; ">CCC</td>
        </tr>
            
            
         <tr>
                <td colspan="3" style="width: 100%; border-bottom:1px double #000000"></td>
            </tr>
        
    </table>
  
    <div class="special-1">
      <table >
           
          <tr >
                <td style="width:50%;text-align:left;  vertical-align: middle;">ออก ณ</td>
                <td  style="width: 50%; text-align:left; vertical-align: middle;">ผู้รับเงิน</td>
            </tr>
            
        </table>
    </div>
   
         <br> <br> <br> <br> <br>
         
<!--   <div class="special-2">
        <table>
            <tr>
                <td height="30" colspan="2" style="width: 100%; text-align:left; vertical-align: bottom;">บริษัทไพรเงินจำกัด  เเลขที่ผู้เสียภาษี 3 10 182672 3.</td>
            </tr>
            
            <tr>
                <td  height="30"style="width:30%;text-align:left;  vertical-align: middle;">เลขืทีห้อง</td>
                <td  height="30" style="width: 70%; text-align:left; vertical-align: middle;">ชื่อ - สกุล</td>
            </tr>
           
        </table>
    </div>
     <div class="special-1">
      <table >
           
          <tr >
                <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;">ตั้งแต่วันที่</td>
                <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;">ถึงวันที่</td>
            </tr>
            
            <tr >
                 <td colspan="2" style="padding-top:10px; width: 100%; text-align:left;border-bottom:1px dashed #000000; vertical-align: bottom;"></td>
            </tr>
             
        </table>
    </div>
    <div style="margin: auto; width:95%;  padding: 2px; padding-top:10px;">
    <table style="width: 100%; border: solid 1px #FFFFFF;">
       <tr  height="30">
            <td  height="22"style="width: 30%; vertical-align: middle;">ค่าเช่า</td>
            <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%;text-align: right; vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="22"style="width: 30%; vertical-align: middle;">ค่าน้ำ</td>
            <td style="width: 40%; text-align: center; vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right;">CCC</td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">ค่าไฟฟ้า</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right; vertical-align: middle;">CCC</td>
        </tr>
          <tr  height="30">
            <td  height="22"style="width: 30%; vertical-align: middle;">ค่าโทรศัพท์</td>
            <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%;text-align: right; vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="22"style="width: 30%; vertical-align: middle;">ค่าแอร์</td>
            <td style="width: 40%; text-align: center; vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">ค่าเฟอร์นิเจอร์</td>
             <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">เงินประกัน</td>
             <td style="width: 40%; text-align: center; vertical-align: middle;">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
          <tr>
            <td height="22" style="width: 30%; vertical-align: middle;">เงินรับล่วงหน้า</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">กรุณาชำระเงินก่อนวันที่ 7</td>

            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
        <tr>
            <td height="22" style="width: 30%;vertical-align: middle;">อื่่นๆ...............................................</td>
             <td style="width: 40%; text-align: center;vertical-align: middle; ">BBB</td>
            <td style="width: 30%; text-align: right;vertical-align: middle;">CCC</td>
        </tr>
         <tr>
                <td colspan="3" style="width: 100%; border-bottom:1px dashed #000000"></td>
            </tr>
          <tr>
            <td height="30" style="width: 30%; vertical-align: middle;"> รวมทั้งสิ้น</td>
             <td style="width: 40%; text-align: left; vertical-align: middle;">กรุณาชำระเงินก่อนวันที่ 7</td>
            <td style="width: 30%; text-align: right; vertical-align: middle;">CCC</td>
        </tr>
         <tr>
                <td colspan="3" style="width: 100%; border-bottom:1px double #000000"></td>
            </tr>
    </table>
    </div>
    <div class="special-1 " >
      <table >
           
          <tr >
                <td  style="width:50%;text-align:left;  vertical-align: top;">ออก ณ</td>
                <td  style="width: 50%; text-align:left; vertical-align: top;">ผู้รับเงิน</td>
            </tr>
            
        </table>
    </div>--> <?php } ?>
   

    