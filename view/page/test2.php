
<?php 
 require ('../../config/db_connect.php');
require ('../layout/header.blade.php'); ?>


 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>




  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
    
      <!-- /.row -->
      <div class="row">
	     <div class="box">
       <div class="box-body table-responsive no-padding">
                  <table id="data" name = "data" class="table table-striped " cellspacing="0" width="100%">
                <tr>
                  <th>#</th>
                  <th>รายละเอียด</th>
                <th style="text-align:center">ค่าใช้จ่าย/หน่วย</th>
                  <th style="text-align:center">สถานะ</th>
               
                </tr>
                   <tbody>
          <?php 
          // var_dump($_POST);
            $sql = "SELECT * FROM mastersetting WHERE 1 =1";
             $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){

            ?>
            <tr>
             <td><?=  $row['ID']; ?></td>
                 <td ><?=  $row['Detail']; ?></td>
                <td  align = "center"> 
				<input id = "price<?php echo  $row['ID']; ?>" name= "price<?php echo  $row['ID']; ?>" value="<?= $row['Price']; ?>" type="text"   style="border:0px;text-align:center;"></td>
               <td align = "center">
			   <select class="selectpicker form-control" name = "yearedit" id = "yearedit">
                     <option value = "1">ใช้งาน</option>
                     <option  value = "0">ไม่เปิดใช้งาน</option>
                  
                  </select></td>
              </tr>
                    <?php } ?>
               </tbody>
              </table>
            </div>
      </div>
	  </div>
    </section>
        <!-- right col -->
     
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); 
  ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- ./wrapper -->

<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
   
   <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>



<script>
$(document).ready(function() {
	  alert('xx');
	
  
 
} );
</script>

