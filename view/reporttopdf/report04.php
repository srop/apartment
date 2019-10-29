<?php
header("Content-type:text/html; charset=UTF-8");                

require ('../page/thaidate.php'); 
  $query = $_SERVER['QUERY_STRING'];

function DateThai()
    {
        $strYear = date("Y")+543;
        $strMonth= date("n");
        $strDay= date("j");
       
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
     $strMonthThai = $strMonthCut[date("n")]; 
        return "$strDay $strMonthThai $strYear";
    }
function getmonth($db){
        switch ($db) {
                case "01":
                  $db = "มกราคม";
                    break;
                case "02":
                  $db = "กุมภาพันธ์";
                    break;
                case "03":
                    $db =  "มีนาคม";
                    break;
                case "04":
                    $db = "เมษายน";
                    break;
                 case "05":
                  $db = "พฤษภาคม";
                    break;
                case "06":
                    $db =  "มิถุนายน";
                    break;
                case "07":
                    $db = "กรกฎาคม";
                    break;
                case "08":
                    $db = "สิงหาคม";
                    break;
                case "09":
                    $db = "กันยายน";
                    break;
                case "10":
                    $db = "ตุลาคม";
                    break;
                  case "11":
                    $db = "พฤศจิกายน";
                    break;
                  case "12":
                    $db = "ธันวาคม";
                    break;
                default:
                    $db = "";
            } 
            return $db;
}       
 $year = date("Y",strtotime($_GET['Year']))+543;
 $ey  = $_GET['Year']+543;
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
require_once ('../../config/db_connect.php');

include("tcpdf/class/class_curl.php");

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
     
		$today = DateThai();  
		 $html = '<table cellspacing="0" cellpadding="1" border="0" width="100%">
		 		<tr>
		 			<td colspan="2" >'. APARTMENT_NAME.'</td>
                </tr>
                <tr>
		 			<td >รายงานการยกเลิกใบเสร็จ </td>
		 			
                </tr>
                 <tr>
		 			<td >ประจำเดือน '. getmonth($_GET['Month']).' '.$_GET['Year'].'</td> 
                
		 		
                </tr>
 			 </table>';
              
     $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// กำหนดรายละเอียดของไฟล์ pdf
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ninenik');
$pdf->SetTitle('TCPDF table report');
$pdf->SetSubject('TCPDF ทดสอบ');
$pdf->SetKeywords('TCPDF, PDF, ทดสอบ,ninenik, guide');

// กำหนดข้อความส่วนแสดง header
$pdf->SetHeaderData(
    PDF_HEADER_LOGO, // โลโก้ กำหนดค่าในไฟล์  tcpdf_config.php 
    PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE,
    PDF_HEADER_STRING, // กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
    array(0,0,0),  // กำหนดสีของข้อความใน header rgb 
    array(0,0,0)   // กำหนดสีของเส้นคั่นใน header rgb 
);

$pdf->setFooterData(
    array(0,64,0),  // กำหนดสีของข้อความใน footer rgb 
    array(220,44,44)   // กำหนดสีของเส้นคั่นใน footer rgb 
);

// กำหนดฟอนท์ของ header และ footer  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// ำหนดฟอนท์ของ monospaced  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// กำหนดขอบเขตความห่างจากขอบ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// กำหนดแบ่่งหน้าอัตโนมัติ
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// กำหนดสัดส่วนของรูปภาพ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// อนุญาตให้สามารถกำหนดรุปแบบ ฟอนท์ย่อยเพิมเติมในหน้าใช้งานได้
$pdf->setFontSubsetting(true);

// กำหนด ฟอนท์
$pdf->SetFont('thsarabun', '', 12, '', true);

// เพิ่มหน้า 
//$pdf->AddPage();
$pdf->AddPage('P', 'LETTER');
// เรียกใช้งาน ฟังก์ชั่นดึงข้อมูลไฟล์มาใช้งาน
 $url = $_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
// $urlpaht = $url."rental_html.php?$query";
  $urlpaht = $url."report04_html.php?$query";
$html = curl_get($urlpaht); // path ไฟล์ 
// ภ้าทดสอบที่เครื่องก็ใช้ http://localhost/data_html.php

// สร้าง pdf ด้วยคำสั่ง writeHTMLCell()
$y = $pdf->getY();
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, C, true);

// แสดงไฟล์ pdf
ob_end_clean();
$pdf->Output('report04.pdf', 'I');
?>