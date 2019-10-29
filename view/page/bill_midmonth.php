

<?php

error_reporting(E_ALL & ~E_NOTICE);
 require ('../layout/header.blade.php'); ?>

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

<style type="text/css">
<!--
div.special { margin: auto; width:95%;   }
div.special-2 { margin: auto; width:95%;  padding-top:75px; }
div.special-1 {
  margin: auto;
  width: 95%;
        
  
}
div.special table { width:100%; border:0px solid #000000; font-size:13px; border-collapse:collapse; }
div.special table tr { width:100%;  border-top:0px solid #000; border-left:0px solid #000; border-right:0px solid #000; }
div.special-1 table { width:100%; border:0px solid #000000; font-size:13px; border-collapse:collapse; }
div.special-2 table { width:100%; border:0px solid #000000; font-size:15px; border-collapse:collapse; }
.topLeftRight     { border-top:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;}
.topLeftBottom    { border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; }
.topLeft          { border-top:1px solid #000; border-left:1px solid #000; }
.bottomLeft       { border-bottom:1px solid #000; border-left:1px solid #000; }
.topRight         { border-top:1px solid #000; border-right:1px solid #000; }
.bottomRight      { border-bottom:1px solid #000; border-right:1px solid #000; }
.topRightBottom   { border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000; }
.Bottom   {
  border-bottom-bottom: thin;
  border-bottom-style: dotted;
  border-bottom-color: #000;
}

</style>


  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
  

    <!-- Main content -->
      <section class="content">
      
           <div class="loader"></div>
                   

      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-success" >
                <div class="panel-heading">พิมพ์ใบเสร็จระหว่าง/เกิน ดือน</div>
                          <div class="panel-body">

                <form class="form-horizontal" id = "bill" name = "bill"  method="post" action= "" role="form" style = "font-size:12px;">


                 <?php
                       if( !empty($_POST['Room']) &&  !empty($_POST['monthbill']) &&  !empty($_POST['yearbill']))  { 
              
                      
                         $condtion = "1&Room={$_POST['Room']}&monthbill={$_POST['monthbill']}&yearbill={$_POST['yearbill']}";
                         $condtion1 = "monthbill={$_POST['monthbill']}&yearbill={$_POST['yearbill']}";
                      
                 }
                     ?>
                 
                      <div class="form-group">
                       
                               <label for="inputEmail3" class="col-sm-1 control-label">เลขห้อง</label>

                                <div class="col-sm-3">
                                 <input type="text" id = "Room" name = "Room" class="form-control" value = "<?php echo $_POST['Room']; ?>">
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
                  

                     <div class="box-footer" align = "right">
                       <input type="submit" id = "submit" class="btn btn-primary" value = "ค้นหาข้อมูล">
                        </div>
                        


                    
                  </form>
          </div> 
            </div>
          <!-- /.box -->
        </div>
      </div>
      <?php

      if($_POST['monthbill'] &&  $_POST['yearbill']){
        
              switch ($_POST['monthbill']) {
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
          }

          $sql_water = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 1";
        $rs_water = mysqli_query($conn, $sql_water) or die("employee-grid-data.php: get employees");
        $row_water = mysqli_fetch_array($rs_water);


        $sql_elec = "SELECT * FROM mastersetting WHERE Status = 1 AND ID = 2";
        $rs_elec = mysqli_query($conn, $sql_elec) or die("employee-grid-data.php: get employees");
        $row_elec = mysqli_fetch_array($rs_elec); 


            if($_POST){
                 $sql_select = "SELECT MT.* ,MR.Title, MR.FName, MR.LName,MR.ID as UserID , MM.Price , MM.Room FROM  masterrental  as MR 
            INNER JOIN  {$db} as MT ON MR.ID = MT.Rental LEFT JOIN masterroom AS MM on MT.Room = MM.Room
            WHERE MT.Room = ' {$_POST['Room']}' AND Year = '{$_POST['yearbill']}'";
            
//         $sql_select = "SELECT Title, FName,LName,MR.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,TU.Flag ,MT.* , MM.Price "
//                 . "FROM masterrental  MR INNER JOIN transactionuser as TU ON MR.ID = TU.UserID"
//                 . " LEFT JOIN {$db}  as MT ON TU.Room = MT.Room "
//                 . "LEFT JOIN masterroom AS MM ON TU.Room = MM.Room "
//                 . "WHERE  TU.Flag = '1' AND TU.Room =  {$_POST['Room']} AND Year = {$_POST['yearbill']} ORDER BY TU.Room ASC";

          
        
              $rs_query = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
              

         $row_query = mysqli_fetch_array($rs_query);
       }

        ?>
               <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                 
          <div class="special-1" >
            <table >
      <!--           <tr >
                      <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;">ตั้งแต่วันที่<?= " 01/".$row_pdf['Month']."/".$ey; ?></td>
                      <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;">ถึงวันที่ <?= $ends."/".$row_pdf['Month']."/".$ey;?></td>
                  </tr>-->
                <tr >
                    <td  height="20"style="width:50%;text-align:left;  vertical-align: middle;"> <span style="padding-left:150px;"><b>เลขที่ห้อง <?= $row_query['Room']?> </b></span></td>
                    <td  height="20" style="width: 50%; text-align:left; vertical-align: middle;"> <span style="margin-left:80px;"><b> ชื่อ สกุล  <?= $row_query['Title'].$row_query['FName']." ".$row_query['LName']?></b>  </span></td>
                  </tr>
                  <br> 
                    <tr >
                      <td colspan="2" ></td>
                  </tr>
                   
              </table>
        </div>
           <form class="form-horizontal" id = "billmidmonth" name = "billmidmonth"  target = "_blank" method="post" action= "../html2pdf/bill_midmonth.php" role="form" style = "font-size:12px;">
                 <input type = "hidden" name = "id1" id = "id1" value = "<?= $_POST['ID'] ?>">
               <input type = "hidden" name = "priceroom" id = "priceroom" value = "<?= $row_query['ID'] ?>">
             <input type = "hidden" name = "year" id = "year" value = "<?= $_POST['yearbill'] ?>">
              <input type = "hidden" name = "roomadd" id = "roomadd" value = "<?= $_POST['Room'] ?>">
               <input type = "hidden" name = "fromtranid" id = "fromtranid" value = "<?= $row_query['FromTranID'] ?>">
                <input type = "hidden" name = "Title" id = "Title" value = "<?= $row_query['Title'] ?>">
              <input type = "hidden" name = "FName" id = "FName" value = "<?= $row_query['FName'] ?>">
               <input type = "hidden" name = "LName" id = "LName" value = "<?= $row_query['LName'] ?>">
                 <input type = "hidden" name = "floor" id = "floor" value = "<?= $row_query['Floor'] ?>">
               <input type = "hidden" name = "month" id = "month" value = "<?= $_POST['monthbill'] ?>">
            <input type = "hidden" name = "priceelce" id = "priceelec" value = "<?= $row_elec['Price'] ?>">
            <input type = "hidden" name = "pricewater" id = "pricewater" value = "<?= $row_water['Price'] ?>">
         <div class = "special" style="margin: auto; width:90%;  padding-top:30px; padding-left:20px;">
             <table style="width: 100%; border: solid 1px #FFFFFF; font-size:13px;">
                 <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                    <td  height="30"style="width: 30%; vertical-align: middle;">ค่าเช่า</td>
                    <td style="width: 30%; text-align: center; vertical-align: middle;"></td>
                    <td style="width: 40%;text-align: right; vertical-align: middle; padding-right:10px;"> <input id = "room" name= "room" value="" type="text"   size="10"  ></td>
                </tr>
             <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                    <td height="30"style="width: 30%; vertical-align: middle;">ค่าน้ำ</td>
                    <td style="width: 30%; text-align: center; vertical-align: middle; "><input id = "startwater" name= "startwater" placeholder = "เริ่ม" value="" type="text"   size="3"  >-<input id = "endwater"  placeholder = "สิ้นสุด"  name= "endwater" value="" type="text"   size="3"  ></td>
                    <td style="width: 40%; text-align: right;  vertical-align: middle;padding-right:10px;"><input id = "sumwater" name= "sumwater" value="" type="text"   size="10"  readonly></td>
                </tr>
                <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                  <td height="30" style="width: 30%; vertical-align: middle;">ค่าไฟฟ้า</td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "><input id = "startelectric" name= "startelectric" placeholder = "เริ่ม"  value="" type="text"   size="3"  >-<input id = "endelectric"  placeholder = "สิ้นสุด"  name= "endelectric" value="" type="text"   size="3"  ></td>
                  <td style="width: 40%; text-align: right; vertical-align: middle;padding-right:10px;"><input id = "sumelectric" name= "sumelectric" value="" type="text"   size="10"  readonly></td>
              </tr>
                <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                  <td  height="22"style="width: 30%; vertical-align: middle;">ค่าโทรศัพท์</td>
                  <td style="width: 30%; text-align: center; vertical-align: middle;">0 - 0</td>
                  <td style="width: 40%;text-align: right; vertical-align: middle;padding-right:10px;">  <input id = "tel" name= "tel" value="<?=  number_format(0, 2);  ?>" type="text"   size="10"  ></td></td>
              </tr>
               
                <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                  <td height="30" style="width: 30%;vertical-align: middle;">อื่นๆ<input id = "etcdetail" name= "etcdetail" value="" type="text"   size="30"  ></td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:10px;"><input id = "etc" name= "etc" value="" type="text"   size="10"  ></td>
              </tr>
              <tr>
                <td colspan="3" style="width: 100%;"></td>
            </tr>
           
            </table>
              <div style="margin: auto; width:100%;   padding-top:50px; padding-bottom:50px;">
            <table >
                 
                <tr >
                    <td style="width:50%;text-align:left;  vertical-align: middle;"> วันที่ออกใบเสร็จ <input id = "datepicker" name= "datepicker" value="" type="text"   size="10"  ></td>
                   
                  </tr>
                  <tr >
                    <td style="width:100%;text-align:right;  vertical-align: middle;"> <button type="submit" class="btn btn-success">พิมพ์ใบเสร็จ</button></td>
                   
                  </tr>
              </table>
          </div>

        </div>

       <form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>


<?php require ('../layout/script.blade.php'); ?>




   <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
   <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
  <script src="../../plugins/jquery-ui/jquery-ui.js"></script>
<script>
function sample() {
  var monthbill =$("#monthbill").val();
      var id = $("#id1").val();
     var yearbill =$("#yearbill").val();
      var datebill =$("#datepicker").val();
       var param =  "?datebill="+datebill+"&id="+id+"&monthbill="+monthbill+"&yearbill="+yearbill;
  
     alert(param);

        var url = "http://localhost:8080/devapartment/view/html2pdf/testprint2.php"+param;

    var mywindow = window.open(url);
  
    mywindow.print();
}</script>

<script>




  $( function() {
  
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", "today");
     
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

   });
//    

 $('#endwater').change(function(e){

var startwater = $('#startwater').val();
var endwater = $('#endwater').val();
var totalwater = endwater - startwater;

var pricewater = $('#pricewater').val();
var sumwater = totalwater*pricewater;

$('#sumwater').val(sumwater);
   });

  $('#endelectric').change(function(e){

var startelectric = $('#startelectric').val();
var endelectric = $('#endelectric').val();
var totalelectric = endelectric - startelectric;

var priceelectric  = $('#priceelec').val();
var sumelectric = totalelectric*priceelectric;

$('#sumelectric').val(sumelectric);

   });
    </script>
    

