<?php
define('setting', 'setting');  
define('renter', 'renter');  
define('room', 'room');  
define('transactionuser', 'transactionuser');  
define('meter', 'meter');  
define('meterstart', 'meterstart');  
define('allreport', 'allreport');  
define('invoice_report', 'invoice_report');  
define('bill_report', 'bill_report'); 
define('bill_midmonth', 'bill_midmonth');  
define('cost', 'cost'); 
define('deldata', 'deldata'); 
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],cost) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="cost.php">
            <i class="fa fa-money"></i>
            <span>บันทึกรายจ่าย</span>
           
          </a>
          
        </li>
          <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],meter) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="meter.php">
            <i class="fa fa-pie-chart"></i>
            <span>บันทึกมิเตอร์น้ำ/ไฟ</span>
           
          </a>
          
        </li>
         <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],invoice_report) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="invoice_report.php">
            <i class="fa fa-print"></i>
            <span>พิมพ์ใบแจ้งหนี้</span>
           
          </a>
          
        </li>
         <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],bill_report) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="bill_report.php">
            <i class="fa fa-credit-card"></i>
            <span>พิมพ์ใบเสร็จรับเงิน</span>
           
          </a>
          
        </li>
         <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],bill_midmonth) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="bill_midmonth.php">
            <i class="fa fa-credit-card"></i>
            <span>พิมพ์ใบเสร็จรับเงินระหว่างเดือน</span>
           
          </a>
          
        </li>
        <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],room) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="room.php">
            <i class="fa fa-th"></i> <span>ทะเบียนห้องพัก</span>
           
          </a>
        </li>
           <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],renter) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="renter.php">
            <i class="fa fa-files-o"></i>
            <span>ทะเบียนชื่อผู้เช่า</span>
            
          </a>
        
        </li>
        <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],transactionuser) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="transactionuser.php">
            <i class="fa fa-user"></i> <span>จัดเข้าห้องพัก</span>
           
          </a>
        </li>  
        <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],allreport) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="allreport.php">
            <i class="fa fa-file-text"></i>
            <span>รายงาน</span>
           
          </a>
      </li> 
      <li  <?php $class = (strpos($_SERVER['REQUEST_URI'],meterstart) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="meterstart.php">
            <i class="fa fa-cogs"></i>
            <span>ตั้งค่ามิเตอร์เริ่มต้นระบบ</span>
           
          </a>
          
        </li>
       
        <li<?php $class = (strpos($_SERVER['REQUEST_URI'],setting) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="setting.php">
            <i class="fa fa-gears"></i> <span>ตั้งค่าตัวแปรระบบ</span>
            
          </a>
          
        </li>
     
          
      
         
        
         
         <li<?php $class = (strpos($_SERVER['REQUEST_URI'],deldata) ? "active" : ""); ?> class="<?php echo $class; ?>">
          <a href="deldata.php">
            <i class="fa fa-trash"></i> <span>เคลียร์ข้อมูลในระบบ</span>
            
          </a>
          
        </li>
      
        
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
