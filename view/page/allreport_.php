<?php 

error_reporting(E_ALL & ~E_NOTICE);
//https://www.youtube.com/watch?v=5wDc47jcg0o
require ('../layout/header.blade.php'); 

?>
 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>
<style type="text/css">
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px dotted #000;
    text-align: center;
  
}
</style>
<style type="text/css">
  .loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('../images/ajax-loader.gif') 50% 50% no-repeat rgb(249,249,249);
}

#EndDate {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    text-align: center;
}
.table th {
  text-align: center;
  
}
.table th { font-size: 13px; }
.table td { font-size: 13px; }
.dataTables_filter {
display: none;
} 
</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
         
           
    <div class="row">
        <div class="col-xs-12">


<!-- Modal -->

          
       <div class="panel panel-danger" >
         <div class="panel-heading">พิมพ์ใบแจ้งหนี้</div>
          <div class="panel-body">

                <form class="form-horizontal" id = "invoice" name = "invoice"  method="post" action= "../html2pdf/invoice.php" role="form" target="_blank"  style = "font-size:12px;">
                   <?php
                       if( !empty($_POST['Floor']) &&  !empty($_POST['month']) &&  !empty($_POST['year']))  { 
              
                      
                         $condtion = "1&Floor={$_POST['Floor']}&month={$_POST['month']}&year={$_POST['year']}";
                 }
                   
                   ?>
                     
                      <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-1 control-label">อาคาร</label>

                                <div class="col-sm-3">
                                    
                              <select name="Floor" id ="Floor" class="form-control" >
                                    <option value="">เลือกอาคารที่ต้องการ</option>
                               <?php
                               
                                $sql ="SELECT DISTINCT(Floor) FROM masterroom ORDER BY Floor ASC";
                                  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                                 while ($row = mysqli_fetch_array($rs)){
                                  
                               ?>
              
                        <option value="<?php echo $row['Floor']; ?>"<?php if($row['Floor']== $_POST['Floor']) echo 'selected="selected"'; ?>><?php echo $row['Floor']; ?></option>

                                 <?php } ?> 
                               </select>
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ประจำเดือน</label>
                                <div class="col-sm-3">
                                  <select class="selectpicker form-control" name = "month" id = "month">
                                          <option value = "" >เดือน</option>
                                        <option <?php if ($_POST['month'] == '01') { ?> selected = "true" <?php }; ?> value = "01">มกราคม</option>
                                        <option  <?php if ($_POST['month'] == '02') { ?> selected = "true" <?php }; ?> value = "02">กุมภาพันธ์</option>
                                        <option <?php if ($_POST['month'] == '03') { ?> selected = "true" <?php }; ?> value = "03">มีนาคม</option>
                                         <option <?php if ($_POST['month'] == '04') { ?> selected = "true" <?php }; ?> value = "04">เมษายน</option>
                                        <option <?php if ($_POST['month'] == '05') { ?> selected = "true" <?php }; ?> value = "05">พฤษภาคม</option>
                                        <option <?php if ($_POST['month'] == '06') { ?> selected = "true" <?php }; ?> value = "06">มิถุนายน</option>
                                         <option <?php if ($_POST['month'] == '07') { ?> selected = "true" <?php }; ?> value = "07">กรกฏาคม</option>
                                        <option <?php if ($_POST['month'] == '08') { ?> selected = "true" <?php }; ?> value = "08">สิงหาคม</option>
                                        <option <?php if ($_POST['month'] == '09') { ?> selected = "true" <?php }; ?> value = "09">กันยายน</option>
                                         <option <?php if ($_POST['month'] == '10') { ?> selected = "true" <?php }; ?>  value = "10">ตุลาคม</option>
                                        <option  <?php if ($_POST['month'] == '11') { ?> selected = "true" <?php }; ?> value = "11">พฤศจิกายน</option>
                                        <option <?php if ($_POST['month'] == '12') { ?> selected = "true" <?php }; ?> value = "12">ธันวาคม</option>
                                      </select>
                                    
                                </div>
                                <div class="col-sm-3">
                                  <select name="year" id ="year" class="form-control" >
                                    <option value="">เลือกปี</option>
									   <?php
										$sql ="SELECT DISTINCT(Year) FROM JanuaryMeter ORDER BY Year DESC";
										  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
										 while ($row = mysqli_fetch_array($rs)){
										  
									   ?>
					  
								<option value="<?php echo $row['Year']; ?>"<?php if($row['Year']+543 == $_POST['year']+543) echo 'selected="selected"'; ?>><?php echo $row['Year']+543; ?></option>

										 <?php } ?> 
                               </select>
                                </div>
                         
                        </div>
                  
                    
                
                    
                       

                     <div class="box-footer">
                        <div class="col-xs-9">
                      
                        </div>
                        <div class="col-xs-3" align = "right">
                             <button type="submit" name = "submitinvoice" id = "submitinvoice" class="btn btn-danger">พิมพ์ใบแจ้งหนี้</button>
                          
                      
                        </div>
                      </div>

                    
                  </form>
          </div> 
        </div>
      </div>


      </div>

      

         
           <div class="loader"></div>
                   

      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-success" >
                <div class="panel-heading">พิมพ์ใบเสร็จ</div>
                          <div class="panel-body">

                <form class="form-horizontal" id = "bill" name = "bill"  method="post" action= "../html2pdf/bill.php" role="form" target="_blank" style = "font-size:12px;">
                   
                     
                      <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-1 control-label">เลขห้อง</label>

                                <div class="col-sm-3">
                                 <input type="text" id = "Room" name = "Room" class="form-control" value = "">
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ประจำเดือน</label>
                                <div class="col-sm-3">
                                  <select class="selectpicker form-control" name = "monthbill" id = "monthbill">
                                          <option value = "" >เดือน</option>
                                        <option <?php if ($_POST['monthbill'] == '01') { ?> selected = "true" <?php }; ?> value = "01">มกราคม</option>
                                        <option  <?php if ($_POST['monthbill'] == '02') { ?> selected = "true" <?php }; ?> value = "02">กุมภาพันธ์</option>
                                        <option <?php if ($_POST['monthbill'] == '03') { ?> selected = "true" <?php }; ?> value = "03">มีนาคม</option>
                                         <option <?php if ($_POST['monthbill'] == '04') { ?> selected = "true" <?php }; ?> value = "04">เมษายน</option>
                                        <option <?php if ($_POST['monthbill'] == '05') { ?> selected = "true" <?php }; ?> value = "05">พฤษภาคม</option>
                                        <option <?php if ($_POST['monthbill'] == '06') { ?> selected = "true" <?php }; ?> value = "06">มิถุนายน</option>
                                         <option <?php if ($_POST['monthbill'] == '07') { ?> selected = "true" <?php }; ?> value = "07">กรกฏาคม</option>
                                        <option <?php if ($_POST['monthbill'] == '08') { ?> selected = "true" <?php }; ?> value = "08">สิงหาคม</option>
                                        <option <?php if ($_POST['monthbill'] == '09') { ?> selected = "true" <?php }; ?> value = "09">กันยายน</option>
                                         <option <?php if ($_POST['month'] == '10') { ?> selected = "true" <?php }; ?>  value = "10">ตุลาคม</option>
                                        <option  <?php if ($_POST['monthbill'] == '11') { ?> selected = "true" <?php }; ?> value = "11">พฤศจิกายน</option>
                                        <option <?php if ($_POST['monthbill'] == '12') { ?> selected = "true" <?php }; ?> value = "12">ธันวาคม</option>
                                      </select>
                                    
                                </div>
                                <div class="col-sm-3">
                                  <select name="yearbill" id ="yearbill" class="form-control" >
                                    <option value="">เลือกปี</option>
									   <?php
										$sql ="SELECT DISTINCT(Year) FROM JanuaryMeter ORDER BY Year DESC";
										  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
										 while ($row = mysqli_fetch_array($rs)){
										  
									   ?>
					  
								<option value="<?php echo $row['Year']; ?>"<?php if($row['Year']+543 == $_POST['yearbill']+543) echo 'selected="selected"'; ?>><?php echo $row['Year']+543; ?></option>

										 <?php } ?> 
                               </select>
                                </div>
                         
                        </div>
                  
                    
                
                    
                       

                     <div class="box-footer">
                        <div class="col-xs-9">
                       
                        </div>
                        <div class="col-xs-3" align = "right">
                                <button type="submit" name = "submitinvoice" id = "submitinvoice" class="btn btn-success">พิมพ์ใบเสร็จ</button>
                        </div>
                      </div>

                    
                  </form>
          </div> 
            </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!-- right col -->
     
    <!-- /.content -->



  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- ./wrapper -->
<!-- bootstrap datepicker -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
   
   <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- date-range-picker 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap datepicker -->


<!-- page script -->





<!-- page script -->


<script>


$(document).ready(function() {
    $('#example2').DataTable( {
        "columnDefs": [ 
             { "width": "70px", "targets": 0 },
      { "width": "70px", "targets": 1 },
      { "width": "150px", "targets": 2 },
     
        { "width": "70px", "targets": 3},
        { "width": "70px", "targets": 4 },
      { "width": "70px", "targets": 5},
        { "width": "70px", "targets": 6 },
        { "width": "70px", "targets": 7 }
        
           
         ],
         fixedColumns: true
    } );
} );
    //Date range as a button
</script>
<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })
    </script>

    <script>

    $('#submitinvoice').click(function(e){
          $(".loader").fadeOut("fast");
//    e.preventDefault();
//    
//    
//            var data = $(this).serialize();
////	   var oTable = $('#jsontable').dataTable();
////	      var data = oTable.$('input, select').serialize();
//		alert(data);
//              
//         $.ajax({
//                url: "../html2pdf/invoice.php",
//                type: "POST",
//                 dataType: "json",
//                 data: $(this).serialize(),
//                success: function (data) { 
//                      var win = window.open();
//                    win.document.write(data);
//                }
//              });
//               return false;
   });
//    
    
//     $('#printinvoice').click(function(e){
//    e.preventDefault();
//    
//    
//            var form = $("#invoice");
//            var data = form.serialize();
////	   var oTable = $('#jsontable').dataTable();
////	      var data = oTable.$('input, select').serialize();
//		alert(data);
////	
//              
//         $.ajax({
//                url: "../html2pdf/gen_invoice.php",
//                type: "POST",
//                 data: $(this).serialize(),
//                success: function (data) { 
//                    console.log( data );
//                     
//                
//                }
//              });
//               return false;
   // });
 
   $('#bill').submit(function(e) {

    e.preventDefault(); 
           
            var form=$("#bill");
            var data = form.serialize();
            // alert(data);
               var room = $('#Room').val()
       var yearbill = $('#yearbill').val()
         // var month = $("#month option:selected").val()
            var monthbill = $("#monthbill option:selected").val();
          
              if(room == "" || monthbill == "" || yearbill == "" ){
                    alert('กรุณากรอกข้อมูลพิมพ์ใบเสร็จให้ถูกต้องด้วยค่ะ');   
                     
                 return false;
                       // Stop submission of the form
               

                 }
                $(this).unbind('submit').submit();
          //   e.preventDefault();
});
$('#invoice').submit(function(e) {

    e.preventDefault(); 
           
            var form=$("#invoice");
            var data = form.serialize();
       //     alert(data);
               var Floor = $('#Floor').val()
       var year = $('#year').val()
         // var month = $("#month option:selected").val()
            var month = $("#month option:selected").val();
          
              if(Floor == "" || month == "" || year == "" ){
                    alert('กรุณากรอกข้อมูลพิมพ์ใบแจ้งหนี้ให้ถูกต้องด้วยค่ะ');   
                     
                 return false;
                       // Stop submission of the form
               

                 }
                $(this).unbind('submit').submit();
          //   e.preventDefault();
});
    </script>
    


