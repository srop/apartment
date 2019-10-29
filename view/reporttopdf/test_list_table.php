<?php // Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');


include("tcpdf/class/class_curl.php");

// การตั้งค่าข้อความ ที่เกี่ยวข้องให้ดูในไฟล์ 
// tcpdf / config /  tcpdf_config.php 

// เริ่มสร้างไฟล์ pdf
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$today = date("F j, Y, g:i a");    
		 $html = '<table cellspacing="0" cellpadding="1" border="0" width="100%">
		 		<tr>
		 			<td colspan="2" >รุ่งเรืองอพาร์ทเมนต์เมนท์</td>
                </tr>
                <tr>
		 			<td >แบบจดจำนวนการใช้ของ น้ำ-ไฟฟ้า-โทรศัพท์</td>
		 			<td align="right">รายงาน xxx-1xxxx</td>
                </tr>
                 <tr>
		 			<td >ประจำเดือน (เดือน/ปี)'.$today.'</td>
		 		
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
$pdf->AddPage();

// เรียกใช้งาน ฟังก์ชั่นดึงข้อมูลไฟล์มาใช้งาน
 $url = $_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
 $urlpaht = $url."data_html.php?limit=20";
$html = curl_get($urlpaht); // path ไฟล์ 
// ภ้าทดสอบที่เครื่องก็ใช้ http://localhost/data_html.php

// สร้าง pdf ด้วยคำสั่ง writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// แสดงไฟล์ pdf
$pdf->Output('table_report.pdf', 'I');
?>