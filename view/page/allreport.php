
<?php require ('../layout/header.blade.php'); ?>

 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>




  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
  

    <!-- Main content -->
      <section class="content">
    
      
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
          
           <div class="box-body">
            
             
                  
                   
                 
                     <a class="btn btn-app " href = "report01.php" target = "_blank">
                     <img src = "images/report02.png"> </img> รายงานรายรับ (สรุปแบบละเอียด)
                    </a>
                    <a class="btn btn-app " href = "report02.php" target = "_blank">
                     <img src = "images/report03.png"> </img> รายงานค้างจ่ายค่าเช่าห้องประจำเดือน
                    </a>
                <a class="btn btn-app " href = "report03.php" target = "_blank">
                     <img src = "images/report04.png"> </img> รายงานรายรับชำระเงินประจำเดือน
                    </a>
                    <a class="btn btn-app " href = "report05.php" target = "_blank">
                     <img src = "images/report06.png"> </img> รายงานการยกเลิกใบเสร็จ
                    </a>
            </div>
            <!-- /.box -->
          </div>
        </div>
        <!-- /.col -->
      </div>
        
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>



  <?php require ('../layout/script.blade.php'); ?>


