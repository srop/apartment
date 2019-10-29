

<?php 

error_reporting(E_ALL & ~E_NOTICE);
//https://www.youtube.com/watch?v=5wDc47jcg0o
require ('thaidate.php'); 
require ('../layout/header.blade.php'); 
require ('../../config/db_connect.php'); 
?>
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

@media print
{
    table.gridtable     { page-break-after: auto; }
    table.gridtable   tr    { page-break-inside:avoid;page-break-after: auto; }
    table.gridtable   td    { page-break-inside:avoid; page-break-after:auto }
    table.gridtable   thead { display:table-header-group }
    table.gridtable   tfoot { display:table-footer-group }
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

          
       <div class="panel panel-default" >
        <div class="panel-heading">ค้นหาค้างจ่ายค่าเช่าห้องประจำเดือน</div>
          <div class="panel-body">

                <form class="form-horizontal" id = "search" name = "search"  method="post" action="" role="form" style = "font-size:12px;">
                   <?php  
                      
                        $condtion ="1&Month={$_POST['monthbill']}&Year={$_POST['yearbill']}";

                ?>
                     
                      
                  
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">ประจำเดือน</label>

                                <div class="col-sm-4">
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
                                 <label for="inputValue" class="col-md-2 control-label">ประจำปี</label>
                                <div class="col-sm-4">
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
                      
                             <div class="col-xs-12" align = "right">
                            
                             <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         
                        </div>
                      </div>

                    
                  </form>
          </div> 
        </div>
      </div>


      </div>

   
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="loader"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding"> 
             <div align = "right"style = "padding-top:20px; padding-right:30px;" >
                <a  id ="print" name ="print"   href = "../reporttopdf/report02.php?codition=<?php echo $condtion; ?>" target="_blank"><img src = "images/pdf.png"></img></a>&nbsp;&nbsp;&nbsp;
                <a  id ="print" name ="print"   href = "excelreport02.php?codition=<?php echo $condtion; ?>" target="_blank"><img src = "images/xlsx.png"></img></a>
              </div>
                <div id="employee_table">  

                  <table id="example" class="table table-striped gridtable" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                         <th>อาคาร</th>
                          <th>ห้อง</th>
                          <th >จำนวนเงิน</th>
                          
                         
                        
                           <th>ค่าเช่า</th>
                           <th>ค่าน้ำ</th>
                           <th>ค่าไฟ</th>
                           <th>อื่นๆ</th>
                         
                      </tr>
                  </thead>
                 
                  <tbody>

            <?php 
         if(is_array($_POST) && $_POST){
              
            $sql = "SELECT * FROM MasterInvoice WHERE 1 = 1 AND  BillDate = '000-00-00'";
           
             if( $_POST['monthbill'] != "" &&  $_POST['yearbill'] != "" ) {  
 
               $sql .=" AND Month = '".$_POST['monthbill']."' AND  Year = '".$_POST['yearbill']."' ";
            }

               $sql .=" ORDER BY Room ASC ";
          
             
            $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
                $link = "edit_rental.php?id=".$row['ID']."";
            
          $totalElec = $row['UnitElectric']*$row['PricePerUnitEL'];
           $totalWater = $row['UnitWater']*$row['PricePerUnitW'];
                
            ?>
            <tr id = "<?php echo  $row['ID']; ?>"> 
                <td><?= $row['Floor']; ?></td>
                <td><?=  $row['Room']; ?></td>
              
                <td style="text-align:left"><?= number_format($row['PriceRoom']+ $totalElec + $totalWater + $row['Etc'], 2, '.', ','); ?></td>
               <td><?= number_format($row['PriceRoom'], 2, '.', ','); ?></td>
            
              <td><?= number_format($totalWater, 2, '.', ','); ?></td>
              <td><?= number_format( $totalElec, 2, '.', ','); ?></td>
            
              <td><?= number_format($row['Etc'], 2, '.', ','); ?></td>
              
            </tr>
            
            <?php } }?>
        </tbody>
    </table>
  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!-- right col -->
     
    <!-- /.content -->
    <style type="text/css">
.no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
 #my_modaledit .modal-dialog  {width:900px;}
    </style>


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


  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
  <script src="../../plugins/jquery-ui/jquery-ui.js"></script>
<!-- date-range-picker 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap datepicker -->


<!-- page script -->

<script src="cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js "></script>




<!-- page script -->

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script>


$(document).ready(function() {
   $(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column(2)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2).footer() ).html(
                '฿'+addCommas(pageTotal) +' ( ฿'+ addCommas(total) +' total)'
            );
        }



    } );

// var table = $('#example').DataTable();
 
// table.column( 0 ).visible( false );
  } );
} );

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

    //Date range as a button


      $( function() {
  
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" });
      $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" });
   
    $('#ui-datepicker-div').css('clip', 'auto');
     
  } );


</script>
 <script>
         $(function() {
            $( "#DateBill" ).datepicker({ dateFormat: "yy-mm-dd" });
         });
      </script>
<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })
    </script>


<script>




    $("#reset").click(function(e){
     
    /* Single'x line Reset function executes on click of Reset Button */
      $('#Room')
          .val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');// [attribute value] e.g. <input value="preset" ...

       $('#Amount').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');

       
       
       //  $("#Status option:selected").prop("selected", false);
         $('#Amount1').val('');
       $('#datepicker').val('');
    
        
           $("#search").submit();
    });

     
       


 $.fn.dataTableExt.oApi.fnStandingRedraw = function(oSettings) {
    //redraw to account for filtering and sorting
    // concept here is that (for client side) there is a row got inserted at the end (for an add)
    // or when a record was modified it could be in the middle of the table
    // that is probably not supposed to be there - due to filtering / sorting
    // so we need to re process filtering and sorting
    // BUT - if it is server side - then this should be handled by the server - so skip this step
    if(oSettings.oFeatures.bServerSide === false){
        var before = oSettings._iDisplayStart;
        oSettings.oApi._fnReDraw(oSettings);
        //iDisplayStart has been reset to zero - so lets change it back
        oSettings._iDisplayStart = before;
        oSettings.oApi._fnCalculateEnd(oSettings);
    }
      
    //draw the 'current' page
    oSettings.oApi._fnDraw(oSettings);
};
</script>
