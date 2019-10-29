
   <div class="content-wrapper">
 <section class="content-header">
      <h1>
        <?php 
    
        $mylink = $_SERVER['PHP_SELF'];
        $link_array = explode('/',$mylink);
        $lastpart = end($link_array);


          if($lastpart == "room.php"){
            echo "ข้อมูลห้องพัก";
          }
            if($lastpart == "renter.php"){
            echo "ข้อมูลผู้เช่า";
          }  
          if($lastpart == "meterstart.php"){
            echo "เพิ่มข้อมูลมิเตอร์ตั้งต้น";
          }
//           if($lastpart == "allreport.php"){
//            echo "พิมพ์ใบเสร็จ/ใบแจ้งหนี้";
//          }
           if($lastpart == "invoice_report.php"){
            echo "พิมพ์ใบแจ้งหนี้";
          }
          if($lastpart == "bill_report.php"){
           
              echo "พิมพ์ใบเสร็จ";
          }
           if($lastpart == "bill_midmonth.php"){
            echo "พิมพ์ใบเสร็จระหว่าง/เกิน เดือน";
          }
          if($lastpart == "cost.php"){
            echo "ข้อมูลรายจ่าย";
          }
           if($lastpart == "allreport.php"){
            echo "รายงาน";
          }
            if($lastpart == "report01.php"){
            echo " รายงานรายรับ (สรุปแบบละเอียด)";
          }
          
         
        ?>
      
      </h1>
      
    </section>
