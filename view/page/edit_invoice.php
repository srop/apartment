

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

      <?php

     
          

            if($_GET){
             $sql_select = "SELECT * FROM MasterInvoice WHERE ID = '{$_GET['id']}'";

         // $sql_select = "SELECT Title, FName,LName,MR.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,TU.Flag ,MT.* , MM.Price "
         //         . "FROM masterrental  MR INNER JOIN transactionuser as TU ON MR.ID = TU.UserID"
         //         . " LEFT JOIN {$db}  as MT ON TU.Room = MT.Room "
         //         . "LEFT JOIN masterroom AS MM ON TU.Room = MM.Room "
         //         . "WHERE  TU.Flag = '1' AND TU.Room =  {$_POST['Room']} AND Year = {$_POST['yearbill']} ORDER BY TU.Room ASC";

        
       // echo  $sql_select ;
              $rs_query = mysqli_query($conn, $sql_select) or die("employee-grid-data.php: get employees");
              

         $row_query = mysqli_fetch_array($rs_query);
          $totalwater = $row_query['PricePerUnitW']*($row_query['EndWater']- $row_query['StartWater']);
          $totalelec = $row_query['PricePerUnitEL']*($row_query['EndElectric']- $row_query['StartElectric']);
       }

        ?>
               <div class="row" style = "height:500px;">
        <div class="col-xs-12">
          <div class="box">
             <form class="form-horizontal" id = "editinvoice" name = "editinvoice"   method="post" role="form" style = "font-size:12px;">
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
         
              <input type = "hidden" name = "id" id = "id" value = "<?= $row_query['ID'] ?>">
             
         <div class = "special" style="margin: auto; width:90%;  padding-top:30px; padding-left:20px;">
             <table style="width: 100%; border: solid 1px #FFFFFF; font-size:13px;">
               <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                    <td  height="30"style="width: 30%; vertical-align: middle;"><b>หมายเลขใบแจ้งหนี้ </b><span style = "padding-left:20px;"><?= $row_query['InvoiceNumber']; ?></span></td>
                  
                </tr>
                 <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                    <td  height="30"style="width: 30%; vertical-align: middle;"><b>หมายเลขใบเสร็จ </b><span style = "padding-left:40px;"><?= $row_query['BillNumber']; ?></span></td>
                  
                </tr>
                 <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                    <td  height="30"style="width: 30%; vertical-align: middle;">ค่าเช่า</td>
                    <td style="width: 30%; text-align: center; vertical-align: middle;"></td>
                    <td style="width: 40%;text-align: right; vertical-align: middle; padding-right:10px;"> <input id = "room" name= "room" value="<?=  number_format($row_query['PriceRoom'], 2, '.', ','); ?>" type="text"   size="10"  readonly></td>
                </tr>
                
             <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                    <td height="30"style="width: 30%; vertical-align: middle;">ค่าน้ำ</td>
                    <td style="width: 30%; text-align: center; vertical-align: middle; "><input id = "startwater" name= "startwater" placeholder = "เริ่ม" value="<?=  $row_query['StartWater']; ?>" type="text"   size="3" readonly >-<input id = "endwater"  placeholder = "สิ้นสุด"  name= "endwater" value="<?=  $row_query['EndWater']; ?>" type="text"   size="3" readonly  ></td>
                    <td style="width: 40%; text-align: right;  vertical-align: middle;padding-right:10px;"><input id = "sumwater" name= "sumwater" value="<?=  number_format($totalwater, 2, '.', ','); ?>" type="text"   size="10"  readonly></td>
                </tr>
                <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                  <td height="30" style="width: 30%; vertical-align: middle;">ค่าไฟฟ้า</td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "><input id = "startelectric" name= "startelectric" placeholder = "เริ่ม"   value="<?=  $row_query['StartElectric']; ?>" type="text"   size="3" readonly >-<input id = "endelectric"  placeholder = "สิ้นสุด"  name= "endelectric"  value="<?= $row_query['EndElectric']; ?>" type="text"   size="3"  readonly></td>
                  <td style="width: 40%; text-align: right; vertical-align: middle;padding-right:10px;"><input id = "sumelectric" name= "sumelectric"value="<?=  number_format($totalelec, 2, '.', ','); ?>"  type="text"   size="10"  readonly></td>
              </tr>
                <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                  <td  height="22"style="width: 30%; vertical-align: middle;">ค่าโทรศัพท์</td>
                  <td style="width: 30%; text-align: center; vertical-align: middle;">0 - 0</td>
                  <td style="width: 40%;text-align: right; vertical-align: middle;padding-right:10px;">  <input id = "tel" name= "tel" value="<?=  number_format(0, 2);  ?>" type="text"   size="10" readonly ></td></td>
              </tr>
               
                <tr  height="30" style = "border-bottom:#F5F5F5 1px solid" >
                  <td height="30" style="width: 30%;vertical-align: middle;">อื่นๆ<input id = "etcdetail" name= "etcdetail" value="<?=  $row_query['EtcDetail']; ?>" type="text"   size="30"  readonly></td>
                   <td style="width: 30%; text-align: center;vertical-align: middle; "></td>
                  <td style="width: 40%; text-align: right;vertical-align: middle;padding-right:10px;"><input id = "etc" name= "etc" value="<?=  number_format($row_query['Etc'], 2, '.', ','); ?>" type="text"    size="10" readonly ></td>
              </tr>
              <tr>
                <td colspan="3" style="width: 100%;"></td>
            </tr>
           
            </table>
              <div style="margin: auto; width:100%;   padding-top:50px; padding-bottom:50px;">
            <table >
                 
                <tr >
                    <td style="width:50%;text-align:left;  vertical-align: middle;"> วันที่ออกใบเสร็จ <input id = "datepicker" name= "datepicker" value="<?= $row_query['BillDate']; ?>" type="text"   size="10"  ></td>
                   
                  </tr>
                  <tr >
                    <td style="width:100%;text-align:right;  vertical-align: middle;">  <button  class="btn btn-success" type = "button" id = "submit"> บันทึก </button></td>
                   
                  </tr>
              </table>
          </div>

        </div>

  

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
     </form>


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

<script type="text/javascript"> 
  $("#submit").on('click',function(){
  
   var data = $("#editinvoice").serialize();
  
    $.ajax({  
                           url:"../class/editinvoice.php",  
                           method:"POST",  
                           data:data,  
                        
                             success: function(data) {
                              alert(data);
                            
                            },
                            error: function() {
                                alert('Error occured');
                            }
                           
                      });  
    
  });
</script>

<script>




  $( function() {
  
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd"});
     
  } );




    //Date range as a button
</script>

<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })
    </script>

 
    

