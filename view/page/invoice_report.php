

<?php require ('../layout/header.blade.php'); ?>

 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>


 
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

</style>

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
  

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

      <!-- /.error-page -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>



  <?php require ('../layout/script.blade.php'); ?>


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
////     var oTable = $('#jsontable').dataTable();
////        var data = oTable.$('input, select').serialize();
//    alert(data);
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
    


 $('#invoice').submit(function(e) {

    e.preventDefault(); 
           
            var form=$("#invoice");
            var data = form.serialize();
         //   alert(data);
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