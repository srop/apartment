
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

.modal-content  {width: 120%;}
</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
          <form class="form-horizontal" id = "nextyearform" name = "nextyearform"  method="post">
              
               <?php  
                       if( !empty($_POST['Floor']) &&  !empty($_POST['month']) &&  !empty($_POST['year']))  { 
                      
                    $year1 = $_POST['year'];
                   
                      
                         $condtion ="1&Floor={$_POST['Floor']}&month={$_POST['month']}&year=$year1";
                 }
                      
                       
                      ?>
                <div class="row">
                     <div class="col-sm-4">
                             <div class="panel panel-default">
                <div class="panel-heading">สร้างข้อมูลปีถัดไป</div>
                 <div class="panel-body">

                     <div class="col-sm-6">
                         <div class="form-group">

                            <input  type="text"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" id = "nextyear" class="form-control" name = "nextyear"value = "" placeholder="กรอกปี(พ.ศ.)" >
                       </div>
                     </div>
                        <div class="col-sm-6">
                             <div class="btn-group" role="group"  style = "padding-bottom:10px;">
  <button type="button" id = "nextmeter" name = "nextmeter" class="btn btn-danger nextmeter">สร้างข้อมูล</button>
                
                       </div>
                             </div>
                     </div>
             </div>
             </div>
<!--              <div class="col-sm-6">
                             <div class="btn-group" role="group"  style = "padding-bottom:10px;">

                      <a data-toggle="modal" class="btn btn-info btn-lg nextmeter" href=""> สร้างข้อมูล</a>
                       </div>
             </div>-->
             </div>
              
        </form>
           
    <div class="row">
        <div class="col-xs-12">


<!-- Modal -->

          
       <div class="panel panel-default" >
         <div class="panel-heading">บันทึกมิเตอร์น้ำ/ไฟ</div>
          <div class="panel-body">

                <form class="form-horizontal" id = "search" name = "search"  method="post" action="" role="form" style = "font-size:12px;">
                   
                     
                      <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-1 control-label">อาคาร</label>

                                <div class="col-sm-4">
                                    
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
                                <div class="col-sm-2">
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
                  
                    
                
                    
                       <div class="form-group">
                              
                        </div>

                      <div class="box-footer">
                        <div class="col-xs-9">
                       <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         <button type="reset" id = "reset" name = "reset" class="btn btn-default" data-dismiss="modal">ล้างข้อมูล</button>
                        </div>
                        <div class="col-xs-3" align = "right">
                            
                             <a  id ="print" name ="print" class="btn btn-warning"  href = "../reporttopdf/reportmeter.php?type=none&codition=<?php echo $condtion; ?>" target="_blank">พิมพ์รายงาน</a>
                        </div>
                      </div>

                    
                  </form>
          </div> 
        </div>
      </div>


      </div>

     

        
        <!-- Modal HTML -->
       
                   

      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="loader"></div>
            <!-- /.box-header -->
            
               <div class="box-header" >
                 <!--  <div class="col-xs-6"align="left">
                    <button type="button" id = "delall" name = "delall" class="btn btn-danger">ลบข้อมูลทั้งหมด</button>
                    </div> -->
                     <div class="col-xs-12" align="right">
                          <a  id ="print" name ="print" class="btn btn-warning"  href = "../reporttopdf/reportmeter.php?type=all&codition=<?php echo $condtion; ?>" target="_blank">พิมพ์รายงานทั้งหมด</a>
                    <button type="button" id = "submit" name = "submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <div id="employee_table">  
                    <form action="" method ="POST" name = "meter" id = "meter">  
                 
                  <table id="example2" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th rowspan="2">อาคาร</th>
                         <th rowspan="2">ห้อง</th>
                         <th rowspan="2">ผู้อาศัย</th>
                        <th colspan="2" align = "center">มิเตอร์น้ำ</th>
                        <th colspan="2" align = "center">มิเตอร์ไฟ</th>
                          <th rowspan="2" align = "center">อื่นๆ</th>
                          <th rowspan="2" align = "center"></th>
                    </tr>
                    <tr>
                        <th>เลขก่อนหน้า</th>
                        <th>เลขที่จด</th>
                      
                        <th>เลขก่อนหน้า</th>
                        <th>เลขที่จด</th>
                       
                    
                    </tr>
                </thead>
                <tbody>
            <?php 
                               
//UPDATE `iamsropc_devap`.`MayMeter` SET `EndElectric` = '0' , StartElectric = 0 , EndWater = 0 , StartWater = 0                 
            if($_POST['month'] &&  $_POST['Floor']){
              switch ($_POST['month']) {
                case "01":
                  $db = "JanuaryMeter";
                    break;
                case "02":
                  $db = "FebruaryMeter";
                    break;
                case "03":
                    $db =  "MarchMeter";
                    break;
                case "04":
                    $db = "AprilMeter";
                    break;
                 case "05":
                  $db = "MayMeter";
                    break;
                case "06":
                    $db =  "JuneMeter";
                    break;
                case "07":
                    $db = "JulyMeter";
                    break;
                case "08":
                    $db = "AugustMeter";
                    break;
                case "09":
                    $db = "SeptemberMeter";
                    break;
                case "10":
                    $db = "OctoberMeter";
                    break;
                  case "11":
                    $db = "NovemberMeter";
                    break;
                  case "12":
                    $db = "DecemberMeter";
                    break;
                default:
                    $db = "";
            }
            if($_POST['month'] == "01"){
                 $year1 = $_POST['year'];
            }  else {
                  $year1 = $_POST['year'];
            }
            
            //SELECT TU.ID, TU.Floor, TU.Room, TU.UserID, TU.Detail, TU.DateCreate, TU.DateModified, MT . * , MR.FName
//FROM FebruaryMeter AS MT
//INNER JOIN transactionuser AS TU ON MT.FromTranID = TU.ID
//LEFT JOIN masterrental AS MR ON TU.UserID = MR.ID
           
     //        $sql1 = "SELECT TU.ID, TU.Floor, TU.Room, TU.UserID, TU.Detail, TU.DateCreate, TU.DateModified,TU.Flag ,MT . * ,MR.Title, MR.FName, MR.LName "
     //          . "FROM  {$db} as MT INNER JOIN transactionuser AS TU ON MT.Room = TU.Room LEFT JOIN  masterrental as MR ON TU.UserID = MR.ID  WHERE TU.Flag = '1'";
     //         if(!empty($_POST['Floor']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
     //           $sql1.=" AND  TU.Floor = '".$_POST['Floor']."' AND Year = '{$year1}'";  
     //         }
        // $sql1.="ORDER BY TU.Room";  

           $sql2 = "SELECT MT.* ,MR.Title, MR.FName, MR.LName FROM  {$db} as MT LEFT JOIN masterrental as MR ON MT.Rental = MR.ID WHERE MT.Floor = '{$_POST['Floor']}' AND Year = '{$year1}' AND Room IN (SELECT Room FROM masterroom WHERE STATUS = 1) ORDER BY MT.Room";
        echo $sql2;
      
//            $sql = "SELECT TU.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,TU.DateCreate,TU.DateModified,MR.IDCard,MR.Title,MR.FName,MR.LName, MR.Address "
//              . "FROM transactionuser as TU LEFT JOIN masterrental as MR ON TU.UserID = MR.ID WHERE 1 =1";
//           if( !empty($_POST['Floor']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
//               $sql.=" AND  Floor LIKE '%".$_POST['Floor']."%'";  
//             }
         
           
         //echo $sql;
            $rs = mysqli_query($conn, $sql2) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
               
                $link = "edit_rental.php?id=".$row['ID']."";
           //    var_dump($row);
                 
            ?>
                  
            <tr id = "<?php echo  $row['ID']; ?>">
              <input id = "id" name= "id[]" value="<?= $row['ID']; ?>" type="hidden" >
                <input id = "month" name= "month" value="<?= $_POST['month']; ?>" type="hidden" >
         <input id = "year" name= "year" value="<?= $year1; ?>" type="hidden" >
                <td><?=  $row['Floor']; ?></td>
                <td><?=  $row['Room']; ?></td>
                 <td  align = "center"><?= $row['Title'].$row['FName']." ".$row['LName'];  ?></td>
                 <td align = "center"><input id = "startwater<?= $row['ID']; ?>" name= "startwater[]" value="<?= $row['StartWater']; ?>" type="text"   size="10"  ></td>
              
           <td align = "center"><input id="endwater" name="endwater[]" type="text" size="10"   value="<?= $row['EndWater']; ?>"></td>
                 <td align = "center"><input id = "startelectric<?= $row['ID']; ?>" name= "startelectric[]" value="<?= $row['StartElectric']; ?>" type="text"  size="10"   >
    </td>
                <td align = "center"><input id="endelectric" name="endelectric[]"  type="text" size="10"  value="<?= $row['EndElectric']; ?>" ></td>
             
               
            <td align = "center"><input id="etc" name="etc[]" type="text" size="10"   value="<?= $row['Etc']; ?>"></td>
             
    <td align = "center">

       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" data-record-title="<?=  $row['Room']; ?>"  value = "<?php echo "id=".$row['ID']."&month=".$_POST['month']."&year=".$year1;?>"> ลบข้อมูล</button>
 
             </td>
            </tr>
            
            
            <?php } 
            
            }
            ?>
        </tbody>
    </table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header btn-warning" style="font-weight:bold;color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title modal-sm">ยืนยันการลบข้อมูล</h5>
            </div>
            <div class="modal-body">
              
             <p><font size = "4pt">คุณต้องการลบข้อมูลมิเตอร์ ของห้อง  <b class="title"></b></font></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="DeleteBtnID"  data-dismiss="modal">ลบข้อมูล</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

    </form>
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
 

$('#DeleteBtnID').on('click', function (event) {

    var list = $(this).attr('value');
     var arr = list.split('=');
    
      var arr1 = arr[1].split('&');
    
     
      var data = list;
      alert(data);
      $("#"+arr1[0]).remove();


      $.ajax({
                url: "../class/del_meterlist.php",
                type: "post",
                data:data,
              
                            success: function(data) {
                              
                            alert(data);
                             
                               

                            },
                            error: function() {
                                alert('Error occured');
                            }
              });   
});

$('#myModal').on('show.bs.modal', function (e) {
     var data = $(e.relatedTarget).data();
     $('.title', this).text(data.recordTitle);
    var btnValue = $(e.relatedTarget).attr('value');
    $('#DeleteBtnID').attr('value', btnValue);
})

 



    $(window).load(function() {
      $(".loader").fadeOut("fast");
       $("#submit").prop('disabled', false);
    })
    </script>
<script type="text/javascript">
 
   $('#delall').click(function() {
    var list = "01";
      var data = $("#search").serialize()+'&'+$.param({ 'list':list });

       $.ajax({
                url: "../class/deldata.php",
                type: "post",
                data:data,
              
                            success: function(data) {
                            alert(data);
                              window.location.reload();
                               

                            },
                            error: function() {
                                alert('Error occured');
                            }
              });
   });

</script>

    <script type="text/javascript">


    $('#submit').click(function() {
          $("#submit").prop('disabled', true);
      var form = $("#meter");
            var data = form.serialize();
//     var oTable = $('#jsontable').dataTable();
//        var data = oTable.$('input, select').serialize();
    //alert(data);
              
         $.ajax({
                url: "../class/edit_meter.php",
                type: "post",
                data:data,
                success: function (data) { 
                   
              
                alert('บันทึกการแก้ไขเเรียบร้อย');
             location.reload();
                
                }
              });
    });
  
 
   $('.nextmeter').click(function() {
                   // var bla = $('#txt_name').val();
 $(".nextmeter").prop('disabled', true);
     var num = $("#nextyear").val();
               
             var count = (num + "").length;
             if(count < 4){
                 alert("กรุณากรอกปีให้ถูกต้อง");
                 exit();
             }
       var form = $("#nextyearform");
            var data = form.serialize();  
           
        
         $.ajax({
                url: "../class/insertnextyear_meter.php",
                type: "post",
                data:data,
                success: function (data) { 
                   
              
                alert('เพิ่มข้อมูลในปีถัดไปเรียบร้อย');
             location.reload();
                
                }
              });
    });
    </script>
    

<script>




    $("#reset").click(function(e){
     
    /* Single'x line Reset function executes on click of Reset Button */
      $('#Room')
          .val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');// [attribute value] e.g. <input value="preset" ...

       $('#Price').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');

       
       
       //  $("#Status option:selected").prop("selected", false);
         $('#Status').val('');
      
    
        
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
