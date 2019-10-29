<?php

require_once("setPDF.php");
// เพิ่มหน้าใน PDF 
$pdf->AddPage();

// กำหนด HTML code หรือรับค่าจากตัวแปรที่ส่งมา
//	กรณีกำหนดโดยตรง
//	ตัวอย่าง กรณีรับจากตัวแปร
// $htmlcontent =$_POST['HTMLcode'];
$htmlcontent='   <table cellspacing="0" cellpadding="1" border="1" style="width:100%; ">  
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
                <td colspan="2" style="padding-top:2px; width: 100%; text-align:left;border-bottom:1px dashed #000000; vertical-align: bottom;"></td>
            </tr>
           
             
        </table>
         
   ';
//$htmlcontent=stripslashes($htmlcontent);
//$htmlcontent=AdjustHTML($htmlcontent);

// สร้างเนื้อหาจาก  HTML code
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// เลื่อน pointer ไปหน้าสุดท้าย
$pdf->lastPage();

// ปิดและสร้างเอกสาร PDF
$pdf->Output('test.pdf', 'I');
?>