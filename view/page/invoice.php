
<?php require ('../layout/header.blade.php'); ?>

 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>
<style type="text/css">
  .btn{min-width:150px;}
</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
  
<section class="content">
        <div class="panel panel-default">
             <div class="panel-heading">Panel with panel-default class</div>
        <div class="panel-body">
          
            <a class="btn btn-app" href="../reporttopdf/test_list_table.php" target="_blank">
                <i class="fa fa-tachometer fa-5x" style="color:green"></i> <font size = "2px;">มิเตอร์น้ำ ไฟ โทรศัพท์ </font>
              </a>
                <a class="btn btn-app" href="../reporttopdf/table_list1.php"  target="_blank">
                <i class="fa fa-print" style="color:blue"></i><font size = "2px;"> พิมพ์ใบแจ้งหนี้ </font>
              </a>
        </div>
        </div>
      <!-- /.error-page -->
    </section>


  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>



  <?php require ('../layout/script.blade.php'); ?>


