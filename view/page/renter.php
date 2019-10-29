
<?php 

error_reporting(E_ALL & ~E_NOTICE);
//https://www.youtube.com/watch?v=5wDc47jcg0o
require ('../layout/header.blade.php'); 

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

#EndDate {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    text-align: center;
}

</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">

         <div class="btn-group" role="group"  style = "padding-bottom:10px;">

         <a data-toggle="modal" class="btn btn-success" href="popup_addrental.php" data-target="#myModal"> เพิมข้อมูล</a>
          
          </div>
          

 

<!-- Modal -->

          
       <div class="panel panel-default" >
        <div class="panel-heading">ค้นหารายชื่อผู้เข้าพัก </div>
          <div class="panel-body">

                <form class="form-horizontal" id = "search" name = "search"  method="post" action="" role="form" style = "font-size:12px;">
                      <?php  
                       if( !empty($_POST['month']) &&  !empty($_POST['day']) &&  !empty($_POST['year'])  &&  !empty($_POST['month1']) &&  !empty($_POST['day1']) &&  !empty($_POST['year1']))  { 
                       $year = $_POST['year']-543;
                    $dateupdate = $year."-".$_POST['month']."-".$_POST['day'];
                     $StartDate = date('Y-m-d', strtotime($dateupdate)); 

                    $year1 = $_POST['year1']-543;
                    $dateupdate1 = $year."-".$_POST['month1']."-".$_POST['day1'];
                     $EndDate = date('Y-m-d', strtotime($dateupdate1)); 
                       }
                         $condtion ="1&FName={$_POST['FName']}&LName={$_POST['LName']}&Status={$_POST['Status']}&Address={$_POST['Address']}&ST={$StartDate}&ED={$EndDate}";
                
                      
                       
                      ?>
                    
                      <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ</label>

                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="FName" name = "FName" placeholder="ชื่อ" value = "<?php echo $_POST['FName']; ?>">
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">สกุล</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="LName" name = "LName" placeholder="นามสกุล" value = "<?php echo $_POST['LName']; ?>">
                                </div>
                         
                        </div>
                  
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">สถานะ</label>

                                <div class="col-sm-4">
                                 
                                <select class="selectpicker  form-control" name = "Status" ID = "Status">
                                   <option <?php if ($_POST['Status'] == '') { ?> selected = "true" <?php }; ?>value="" >ทั้งหมด</option>
                                   <option <?php if ($_POST['Status'] == '1') { ?> selected = "true" <?php }; ?> value="1"  >ยังเช่าอาศัยอยู่</option>
                                
                                  <option <?php if ($_POST['Status'] == '0') { ?> selected = "true" <?php }; ?> value="0">แจ้งออกเรียบร้อยแล้ว</option>
                                    
                                   


                                   
                                  </select>
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ที่อยู่ </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  id="Address"  name ="Address"placeholder="ที่อยู่" value = "<?php echo $_POST['Address']; ?>">
                                </div>
                            </div>
                
                    
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">วันที่เข้าพัก</label>
                                  <div class="col-sm-4">
                                  <div class="row">
                                  <div class="col-xs-3">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "day" id = "day">
                                          <option value = "">วัน</option>
                                        <option <?php if ($_POST['day'] == '01') { ?> selected = "true" <?php }; ?> value = "01">1</option>
                                        <option <?php if ($_POST['day'] == '02') { ?> selected = "true" <?php }; ?> value = "02">2</option>
                                        <option  <?php if ($_POST['day'] == '03') { ?> selected = "true" <?php }; ?> value = "03">3</option>
                                         <option <?php if ($_POST['day'] == '04') { ?> selected = "true" <?php }; ?> value = "04">4</option>
                                        <option  <?php if ($_POST['day'] == '05') { ?> selected = "true" <?php }; ?> value = "05">5</option>
                                        <option <?php if ($_POST['day'] == '06') { ?> selected = "true" <?php }; ?> value = "06">6</option>
                                         <option <?php if ($_POST['day'] == '07') { ?> selected = "true" <?php }; ?> value = "07">7</option>
                                        <option <?php if ($_POST['day'] == '08') { ?> selected = "true" <?php }; ?> value = "08">8</option>
                                        <option <?php if ($_POST['day'] == '09') { ?> selected = "true" <?php }; ?> value = "09">9</option>
                                        <option <?php if ($_POST['day'] == '10') { ?> selected = "true" <?php }; ?> value = "10">10</option>
                                        <option <?php if ($_POST['day'] == '11') { ?> selected = "true" <?php }; ?> value = "11">11</option>
                                        <option  <?php if ($_POST['day'] == '12') { ?> selected = "true" <?php }; ?> value = "12">12</option>
                                        <option <?php if ($_POST['day'] == '13') { ?> selected = "true" <?php }; ?> value = "13">13</option>
                                         <option <?php if ($_POST['day'] == '14') { ?> selected = "true" <?php }; ?> value = "14">14</option>
                                        <option <?php if ($_POST['day'] == '15') { ?> selected = "true" <?php }; ?> value = "15">15</option>
                                        <option  <?php if ($_POST['day'] == '16') { ?> selected = "true" <?php }; ?> value = "16">16</option>
                                         <option <?php if ($_POST['day'] == '17') { ?> selected = "true" <?php }; ?> value = "17">17</option>
                                        <option  <?php if ($_POST['day'] == '18') { ?> selected = "true" <?php }; ?> value = "18">18</option>
                                        <option <?php if ($_POST['day'] == '19') { ?> selected = "true" <?php }; ?> value = "19">19</option>
                                         <option <?php if ($_POST['day'] == '20') { ?> selected = "true" <?php }; ?> value = "20">20</option>
                                          <option <?php if ($_POST['day'] == '21') { ?> selected = "true" <?php }; ?> value = "21">21</option>
                                        <option <?php if ($_POST['day'] == '22') { ?> selected = "true" <?php }; ?> value = "22">22</option>
                                        <option <?php if ($_POST['day'] == '23') { ?> selected = "true" <?php }; ?> value = "23">23</option>
                                         <option <?php if ($_POST['day'] == '24') { ?> selected = "true" <?php }; ?> value = "24">24</option>
                                        <option <?php if ($_POST['day'] == '25') { ?> selected = "true" <?php }; ?> value = "25">25</option>
                                        <option <?php if ($_POST['day'] == '26') { ?> selected = "true" <?php }; ?> value = "26">26</option>
                                         <option <?php if ($_POST['day'] == '27') { ?> selected = "true" <?php }; ?> value = "27">27</option>
                                        <option  <?php if ($_POST['day'] == '28') { ?> selected = "true" <?php }; ?> value = "28">28</option>
                                        <option  <?php if ($_POST['day'] == '29') { ?> selected = "true" <?php }; ?> value = "29">29</option>
                                        <option  <?php if ($_POST['day'] == '30') { ?> selected = "true" <?php }; ?>value = "30">30</option>
                                         <option <?php if ($_POST['day'] == '31') { ?> selected = "true" <?php }; ?> value = "31">31</option>
                                      </select>
                                    </div>
                                  </div>
                                   <div class="col-xs-6">
                                    <div class="form-group">
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
                                  </div>
                                   <div class="col-xs-3">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "year" id = "year">
                                         <option value = "">ปี</option>
                                           <option <?php if ($_POST['year'] == '2530') { ?> selected = "true" <?php }; ?> value = "2530">2530</option>
                                        <option <?php if ($_POST['year'] == '2531') { ?> selected = "true" <?php }; ?> value = "2531">2531</option>
                                        <option  <?php if ($_POST['year'] == '2532') { ?> selected = "true" <?php }; ?> value = "2532">2532</option>
                                         <option <?php if ($_POST['year'] == '2533') { ?> selected = "true" <?php }; ?> value = "2533">2533</option>
                                        <option  <?php if ($_POST['year'] == '2534') { ?> selected = "true" <?php }; ?> value = "2534">2534</option>
                                         <option <?php if ($_POST['year'] == '2535') { ?> selected = "true" <?php }; ?> value = "2535">2535</option>
                                        <option <?php if ($_POST['year'] == '2536') { ?> selected = "true" <?php }; ?> value = "2536">2536</option>
                                         <option <?php if ($_POST['year'] == '2537') { ?> selected = "true" <?php }; ?> value = "2537">2537</option>
                                        <option  <?php if ($_POST['year'] == '2538') { ?> selected = "true" <?php }; ?> value = "2538">2538</option>
                                        <option <?php if ($_POST['year'] == '2539') { ?> selected = "true" <?php }; ?> value = "2539">2539</option>
                                         <option <?php if ($_POST['year'] == '2540') { ?> selected = "true" <?php }; ?> value = "2540">2540</option>
                                        <option <?php if ($_POST['year'] == '2541') { ?> selected = "true" <?php }; ?> value = "2541">2541</option>
                                         <option <?php if ($_POST['year'] == '2542') { ?> selected = "true" <?php }; ?> value = "2542">2542</option>
                                        <option <?php if ($_POST['year'] == '2543') { ?> selected = "true" <?php }; ?> value = "2543">2543</option>
                                        <option  <?php if ($_POST['year'] == '2544') { ?> selected = "true" <?php }; ?> value = "2544">2544</option>
                                         <option <?php if ($_POST['year'] == '2545') { ?> selected = "true" <?php }; ?> value = "2545">2545</option>
                                         <option <?php if ($_POST['year'] == '2546') { ?> selected = "true" <?php }; ?> value = "2546">2546</option>
                                        <option  <?php if ($_POST['year'] == '2547') { ?> selected = "true" <?php }; ?> value = "2547">2547</option>
                                        <option <?php if ($_POST['year'] == '2548') { ?> selected = "true" <?php }; ?> value = "2548">2548</option>
                                         <option <?php if ($_POST['year'] == '2549') { ?> selected = "true" <?php }; ?> value = "2549">2549</option>
                                        <option <?php if ($_POST['year'] == '2550') { ?> selected = "true" <?php }; ?> value = "2550">2550</option>
                                         <option <?php if ($_POST['year'] == '2551') { ?> selected = "true" <?php }; ?> value = "2551">2551</option>
                                        <option  <?php if ($_POST['year'] == '2552') { ?> selected = "true" <?php }; ?> value = "2552">2552</option>
                                         <option <?php if ($_POST['year'] == '2553') { ?> selected = "true" <?php }; ?> value = "2553">2553</option>
                                        <option  <?php if ($_POST['year'] == '2554') { ?> selected = "true" <?php }; ?> value = "2554">2554</option>
                                         <option <?php if ($_POST['year'] == '2555') { ?> selected = "true" <?php }; ?> value = "2555">2555</option>
                                        <option <?php if ($_POST['year'] == '2556') { ?> selected = "true" <?php }; ?> value = "2556">2556</option>
                                         <option <?php if ($_POST['year'] == '2557') { ?> selected = "true" <?php }; ?> value = "2557">2557</option>
                                        <option  <?php if ($_POST['year'] == '2558') { ?> selected = "true" <?php }; ?> value = "2558">2558</option>
                                        <option <?php if ($_POST['year'] == '2559') { ?> selected = "true" <?php }; ?> value = "2559">2559</option>
                                        <option <?php if ($_POST['year'] == '2560') { ?> selected = "true" <?php }; ?> value = "2560">2560</option>
                                         <option <?php if ($_POST['year'] == '2561') { ?> selected = "true" <?php }; ?> value = "2561">2561</option>
                                         <option <?php if ($_POST['year'] == '2562') { ?> selected = "true" <?php }; ?> value = "2562">2562</option>
                                        <option  <?php if ($_POST['year'] == '2563') { ?> selected = "true" <?php }; ?> value = "2563">2563</option>
                                         <option <?php if ($_POST['year'] == '2564') { ?> selected = "true" <?php }; ?> value = "2564">2564</option>
                                        <option <?php if ($_POST['year'] == '2565') { ?> selected = "true" <?php }; ?> value = "2565">2565</option>
                                         <option <?php if ($_POST['year'] == '2566') { ?> selected = "true" <?php }; ?> value = "2566">2566</option>
                                        <option  <?php if ($_POST['year'] == '2567') { ?> selected = "true" <?php }; ?> value = "2567">2567</option>
                                        <option <?php if ($_POST['year'] == '2568') { ?> selected = "true" <?php }; ?> value = "2568">2568</option>
                                         <option <?php if ($_POST['year'] == '2569') { ?> selected = "true" <?php }; ?> value = "2569">2569</option>
                                        <option <?php if ($_POST['year'] == '2570') { ?> selected = "true" <?php }; ?> value = "2570">2570</option>
                                      </select>
                                    </div>
                                  </div>
                              </div>

                               </div>         
                                <label for="inputValue" class="col-md-2 control-label">ถึงวันที่ </label>
                               
                                  <div class="col-sm-4">
                                  <div class="row">
                                  <div class="col-xs-3">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "day1" id = "day1">
                                           <option value = "">วัน</option>
                                         <option <?php if ($_POST['day1'] == '01') { ?> selected = "true" <?php }; ?> value = "01">1</option>
                                        <option <?php if ($_POST['day1'] == '02') { ?> selected = "true" <?php }; ?> value = "02">2</option>
                                        <option  <?php if ($_POST['day1'] == '03') { ?> selected = "true" <?php }; ?> value = "03">3</option>
                                         <option <?php if ($_POST['day1'] == '04') { ?> selected = "true" <?php }; ?> value = "04">4</option>
                                        <option  <?php if ($_POST['day1'] == '05') { ?> selected = "true" <?php }; ?> value = "05">5</option>
                                        <option <?php if ($_POST['day1'] == '06') { ?> selected = "true" <?php }; ?> value = "06">6</option>
                                         <option <?php if ($_POST['day1'] == '07') { ?> selected = "true" <?php }; ?> value = "07">7</option>
                                        <option <?php if ($_POST['day1'] == '08') { ?> selected = "true" <?php }; ?> value = "08">8</option>
                                        <option <?php if ($_POST['day1'] == '09') { ?> selected = "true" <?php }; ?> value = "09">9</option>
                                        <option <?php if ($_POST['day1'] == '10') { ?> selected = "true" <?php }; ?> value = "10">10</option>
                                        <option <?php if ($_POST['day1'] == '11') { ?> selected = "true" <?php }; ?> value = "11">11</option>
                                        <option  <?php if ($_POST['day1'] == '12') { ?> selected = "true" <?php }; ?> value = "12">12</option>
                                        <option <?php if ($_POST['day1'] == '13') { ?> selected = "true" <?php }; ?> value = "13">13</option>
                                         <option <?php if ($_POST['day1'] == '14') { ?> selected = "true" <?php }; ?> value = "14">14</option>
                                        <option <?php if ($_POST['day1'] == '15') { ?> selected = "true" <?php }; ?> value = "15">15</option>
                                        <option  <?php if ($_POST['day1'] == '16') { ?> selected = "true" <?php }; ?> value = "16">16</option>
                                         <option <?php if ($_POST['day1'] == '17') { ?> selected = "true" <?php }; ?> value = "17">17</option>
                                        <option  <?php if ($_POST['day1'] == '18') { ?> selected = "true" <?php }; ?> value = "18">18</option>
                                        <option <?php if ($_POST['day1'] == '19') { ?> selected = "true" <?php }; ?> value = "19">19</option>
                                         <option <?php if ($_POST['day1'] == '20') { ?> selected = "true" <?php }; ?> value = "20">20</option>
                                          <option <?php if ($_POST['day1'] == '21') { ?> selected = "true" <?php }; ?> value = "21">21</option>
                                        <option <?php if ($_POST['day1'] == '22') { ?> selected = "true" <?php }; ?> value = "22">22</option>
                                        <option <?php if ($_POST['day1'] == '23') { ?> selected = "true" <?php }; ?> value = "23">23</option>
                                         <option <?php if ($_POST['day1'] == '24') { ?> selected = "true" <?php }; ?> value = "24">24</option>
                                        <option <?php if ($_POST['day1'] == '25') { ?> selected = "true" <?php }; ?> value = "25">25</option>
                                        <option <?php if ($_POST['day1'] == '26') { ?> selected = "true" <?php }; ?> value = "26">26</option>
                                         <option <?php if ($_POST['day1'] == '27') { ?> selected = "true" <?php }; ?> value = "27">27</option>
                                        <option  <?php if ($_POST['day1'] == '28') { ?> selected = "true" <?php }; ?> value = "28">28</option>
                                        <option  <?php if ($_POST['day1'] == '29') { ?> selected = "true" <?php }; ?> value = "29">29</option>
                                        <option  <?php if ($_POST['day1'] == '30') { ?> selected = "true" <?php }; ?>value = "30">30</option>
                                         <option <?php if ($_POST['day1'] == '31') { ?> selected = "true" <?php }; ?> value = "31">31</option>
                                      </select>
                                    </div>
                                  </div>
                                   <div class="col-xs-6">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "month1" id = "month1">
                                           <option value = "" >เดือน</option>
                                          <option <?php if ($_POST['month1'] == '01') { ?> selected = "true" <?php }; ?> value = "01">มกราคม</option>
                                        <option  <?php if ($_POST['month1'] == '02') { ?> selected = "true" <?php }; ?> value = "02">กุมภาพันธ์</option>
                                        <option <?php if ($_POST['month1'] == '03') { ?> selected = "true" <?php }; ?> value = "03">มีนาคม</option>
                                         <option <?php if ($_POST['month1'] == '04') { ?> selected = "true" <?php }; ?> value = "04">เมษายน</option>
                                        <option <?php if ($_POST['month1'] == '05') { ?> selected = "true" <?php }; ?> value = "05">พฤษภาคม</option>
                                        <option <?php if ($_POST['month1'] == '06') { ?> selected = "true" <?php }; ?> value = "06">มิถุนายน</option>
                                         <option <?php if ($_POST['month1'] == '07') { ?> selected = "true" <?php }; ?> value = "07">กรกฏาคม</option>
                                        <option <?php if ($_POST['month1'] == '08') { ?> selected = "true" <?php }; ?> value = "08">สิงหาคม</option>
                                        <option <?php if ($_POST['month1'] == '09') { ?> selected = "true" <?php }; ?> value = "09">กันยายน</option>
                                         <option <?php if ($_POST['month1'] == '10') { ?> selected = "true" <?php }; ?>  value = "10">ตุลาคม</option>
                                        <option  <?php if ($_POST['month1'] == '11') { ?> selected = "true" <?php }; ?> value = "11">พฤศจิกายน</option>
                                        <option <?php if ($_POST['month1'] == '12') { ?> selected = "true" <?php }; ?> value = "12">ธันวาคม</option>
                                      </select>
                                    </div>
                                  </div>
                                   <div class="col-xs-3">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "year1" id = "year1">
                                         <option value = "">ปี</option>
                                          <option <?php if ($_POST['year1'] == '2530') { ?> selected = "true" <?php }; ?> value = "2530">2530</option>
                                        <option <?php if ($_POST['year1'] == '2531') { ?> selected = "true" <?php }; ?> value = "2531">2531</option>
                                        <option  <?php if ($_POST['year1'] == '2532') { ?> selected = "true" <?php }; ?> value = "2532">2532</option>
                                         <option <?php if ($_POST['year1'] == '2533') { ?> selected = "true" <?php }; ?> value = "2533">2533</option>
                                        <option  <?php if ($_POST['year1'] == '2534') { ?> selected = "true" <?php }; ?> value = "2534">2534</option>
                                         <option <?php if ($_POST['year1'] == '2535') { ?> selected = "true" <?php }; ?> value = "2535">2535</option>
                                        <option <?php if ($_POST['year1'] == '2536') { ?> selected = "true" <?php }; ?> value = "2536">2536</option>
                                         <option <?php if ($_POST['year1'] == '2537') { ?> selected = "true" <?php }; ?> value = "2537">2537</option>
                                        <option  <?php if ($_POST['year1'] == '2538') { ?> selected = "true" <?php }; ?> value = "2538">2538</option>
                                        <option <?php if ($_POST['year1'] == '2539') { ?> selected = "true" <?php }; ?> value = "2539">2539</option>
                                         <option <?php if ($_POST['year1'] == '2540') { ?> selected = "true" <?php }; ?> value = "2540">2540</option>
                                        <option <?php if ($_POST['year1'] == '2541') { ?> selected = "true" <?php }; ?> value = "2541">2541</option>
                                         <option <?php if ($_POST['year1'] == '2542') { ?> selected = "true" <?php }; ?> value = "2542">2542</option>
                                        <option <?php if ($_POST['year1'] == '2543') { ?> selected = "true" <?php }; ?> value = "2543">2543</option>
                                        <option  <?php if ($_POST['year1'] == '2544') { ?> selected = "true" <?php }; ?> value = "2544">2544</option>
                                         <option <?php if ($_POST['year1'] == '2545') { ?> selected = "true" <?php }; ?> value = "2545">2545</option>
                                         <option <?php if ($_POST['year1'] == '2546') { ?> selected = "true" <?php }; ?> value = "2546">2546</option>
                                        <option  <?php if ($_POST['year1'] == '2547') { ?> selected = "true" <?php }; ?> value = "2547">2547</option>
                                        <option <?php if ($_POST['year1'] == '2548') { ?> selected = "true" <?php }; ?> value = "2548">2548</option>
                                         <option <?php if ($_POST['year1'] == '2549') { ?> selected = "true" <?php }; ?> value = "2549">2549</option>
                                        <option <?php if ($_POST['year1'] == '2550') { ?> selected = "true" <?php }; ?> value = "2550">2550</option>
                                         <option <?php if ($_POST['year1'] == '2551') { ?> selected = "true" <?php }; ?> value = "2551">2551</option>
                                        <option  <?php if ($_POST['year1'] == '2552') { ?> selected = "true" <?php }; ?> value = "2552">2552</option>
                                         <option <?php if ($_POST['year1'] == '2553') { ?> selected = "true" <?php }; ?> value = "2553">2553</option>
                                        <option  <?php if ($_POST['year1'] == '2554') { ?> selected = "true" <?php }; ?> value = "2554">2554</option>
                                         <option <?php if ($_POST['year1'] == '2555') { ?> selected = "true" <?php }; ?> value = "2555">2555</option>
                                        <option <?php if ($_POST['year1'] == '2556') { ?> selected = "true" <?php }; ?> value = "2556">2556</option>
                                         <option <?php if ($_POST['year1'] == '2557') { ?> selected = "true" <?php }; ?> value = "2557">2557</option>
                                        <option  <?php if ($_POST['year1'] == '2558') { ?> selected = "true" <?php }; ?> value = "2558">2558</option>
                                        <option <?php if ($_POST['year1'] == '2559') { ?> selected = "true" <?php }; ?> value = "2559">2559</option>
                                        <option <?php if ($_POST['year1'] == '2560') { ?> selected = "true" <?php }; ?> value = "2560">2560</option>
                                         <option <?php if ($_POST['year1'] == '2561') { ?> selected = "true" <?php }; ?> value = "2561">2561</option>
                                         <option <?php if ($_POST['year1'] == '2562') { ?> selected = "true" <?php }; ?> value = "2562">2562</option>
                                        <option  <?php if ($_POST['year1'] == '2563') { ?> selected = "true" <?php }; ?> value = "2563">2563</option>
                                         <option <?php if ($_POST['year1'] == '2564') { ?> selected = "true" <?php }; ?> value = "2564">2564</option>
                                        <option <?php if ($_POST['year1'] == '2565') { ?> selected = "true" <?php }; ?> value = "2565">2565</option>
                                         <option <?php if ($_POST['year1'] == '2566') { ?> selected = "true" <?php }; ?> value = "2566">2566</option>
                                        <option  <?php if ($_POST['year1'] == '2567') { ?> selected = "true" <?php }; ?> value = "2567">2567</option>
                                        <option <?php if ($_POST['year1'] == '2568') { ?> selected = "true" <?php }; ?> value = "2568">2568</option>
                                         <option <?php if ($_POST['year1'] == '2569') { ?> selected = "true" <?php }; ?> value = "2569">2569</option>
                                        <option <?php if ($_POST['year1'] == '2570') { ?> selected = "true" <?php }; ?> value = "2570">2570</option>
                                      </select>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>

                    <div class="box-footer">
                        <div class="col-xs-9">
                       <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         <button type="reset" id = "reset" name = "reset" class="btn btn-default" data-dismiss="modal">ล้างข้อมูล</button>
                        </div>
                        <div class="col-xs-3" align = "right">
                            
                             <a  id ="print" name ="print" class="btn btn-warning"  href = "../reporttopdf/reportrental.php?codition=<?php echo $condtion; ?>" target="_blank">พิมพ์รายงาน</a>
                        </div>
                      </div>

                 
                  </form>
          </div> 
        </div>
      </div>


      </div>

       <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style = "background-color:red">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">ยืนยันการลบข้อมูล</h4>
                </div>
                <div class="modal-body">
                    <p><font size = "4pt">คุณต้องการลบข้อมูลของ  <b class="title"></b></font></p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger btn-ok">ลบข้อมูล</button>
                </div>
            </div>
        </div>
    </div>

          <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Content will be loaded here from "remote.php" file -->
                    </div>
                </div>
            </div>

           <div id="myModal2" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Content will be loaded here from "remote.php" file -->
                      <div class="fetched-data"></div> 
                </div>

            </div>
          </div>
        <!-- Modal HTML -->
        <div id="my_modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Content will be loaded here from "remote.php" file -->
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
                <div id="employee_table">  
                  <table id="example2" class="table table-striped" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                         <th>รหัสผู้เข้าพัก</th>
                          <th>ชื่อ</th>
                          <th>สกุล</th>
                          <th>เลขบัตรประชาชน</th>
                          <th>วันที่เข้าพัก</th>
                          <th>สถานะ</th>
                          <th ></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>รหัสผู้เข้าพัก</th>
                          <th>ชื่อ</th>
                          <th>สกุล</th>
                          <th>เลขบัตรประชาชน</th>
                          <th>วันที่เข้าพัก</th>
                          <th>สถานะ</th>
                          <th ></th>
                      </tr>
                  </tfoot>
                  <tbody>

            <?php 
          // var_dump($_POST);
            $sql = "SELECT * FROM masterrental WHERE 1 =1";
           if( !empty($_POST['FName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $sql.=" AND  FName LIKE '%".$_POST['FName']."%'";  
             }
             if( !empty($_POST['LName']) ) {  
               $sql.=" AND LName LIKE '%".$_POST['LName']."%' ";
            }
            if($_POST['Status'] != '')  { 
               $sql.=" AND Status ='".$_POST['Status']."' ";
              }
             /* if($_POST['Status'] == "0"){
                 $sql.=" AND Status = '0' ";
              }*/
               if( !empty($_POST['Address']) ) { 
               $sql.=" AND Address LIKE '%".$_POST['Address']."%' ";
              }
     
            if( !empty($_POST['month']) &&  !empty($_POST['day']) &&  !empty($_POST['year'])  &&  !empty($_POST['month1']) &&  !empty($_POST['day1']) &&  !empty($_POST['year1']))  { 
              $year = $_POST['year']-543;
            $dateupdate = $year."-".$_POST['month']."-".$_POST['day'];
             $StartDate = date('Y-m-d', strtotime($dateupdate)); 

            $year1 = $_POST['year1']-543;
            $dateupdate1 = $year."-".$_POST['month1']."-".$_POST['day1'];
             $EndDate = date('Y-m-d', strtotime($dateupdate1)); 

                $sql.=" AND ( StartDate  BETWEEN '".$StartDate."' AND '".$EndDate."')";
             }
            $printer =  $sql;
            $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
                $link = "edit_rental.php?id=".$row['ID']."";
               $StartDate =  thai_date_fullmonth(strtotime($row['StartDate']));
                 $EndDate =  thai_date_fullmonth(strtotime($row['EndDate']));
               $FullName =  $row['Title']." ".$row['FName'];
                 if($row['Status'] == "1"){
                  $status = "<font color='green'>ยังเช่าอาศัยอยู่ </font>";
                 }else{
                     $status = "<font color='red'>แจ้งออกแล้ว </font>";
                 }

            ?>
            <tr id = "<?php echo  $row['ID']; ?>"> <td><?=  $row['ID']; ?></td>
                <td><?=  $row['Title']." ".$row['FName']; ?></td>
                <td><?= $row['LName']; ?></td>
               <td><?= $row['IDCard']; ?></td>
               <td><?= thai_date_fullmonth(strtotime($row['StartDate'])); ?></td>
               <td><?= $status ?></td>
                <td> 
                 
                <button data-toggle="modal"  data-record-title="<?=  $row['Title']." ".$row['FName']." ".$row['LName']; ?>"  data-target="#confirm-delete" id = "del" class="btn btn-danger" data-record-id ="<?=$row['ID'] ?>"> ลบข้อมูล</button>
               <button type="button" class="btn btn-success edit_button" 
                                                                data-toggle="modal" data-target="#my_modaledit"
                                                                data-fname="<?=$row['FName'];?>"
                                                                data-lname="<?=$row['LName'];?>"
                                                                data-idcard="<?=$row['IDCard'];?>"
                                                                 data-idcardhidden="<?=$row['IDCard'];?>"
                                                                data-address="<?php echo $row['Address'];?>"
                                                               data-startdate="<?php echo $StartDate;?>"
                                                               data-enddate ="<?php echo $EndDate;?>"
                                                                data-modify="<?php echo "วันที่แก้ไขครั้งล่าสุด ".$row['DateModified'];?>"
                                                              data-title="<?php echo $row['Title'];?>"
                                                               data-status="<?php echo $row['Status'];?>"
                                                                data-day = ""
                                                                data-month= ""
                                                                data-year= ""
                                                                data-id="<?php echo $row['ID'];?>">

                                                                แก้ไข
                                                        </button>

              



                
                </td>
            </tr>
            
            <?php } ?>
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
<div class="modal" id="my_modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style = "background-color: #337ab7;">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h1>แก้ไขข้อมูล ผู้เข้าพัก</h1>
      </div>
       
      <div class="modal-body">
         <div class="row">
        <form name = "editrental" id = "editrental" method="post">
         <input type="hidden" name = "Id" id = "Id" class="form-control"  value = "">
          <input type="hidden" name = "startdatetmp" id = "startdatetmp" class="form-control"  value = "">
        <input name = "action" type = "hidden" value = "edit">
         <div class="col-md-6">
          <div class="form-group">
                  <label> คำนำหน้า</label>
                  <select class="form-control select2" name = "Title" id = "Title" style="width: 100%;">
                        
                            <option value = ""></option>
                          <option value = "นาย">นาย</option>
                        <option value = "นาง">นาง</option>
                       <option value = "นางสาว">นางสาว</option>
                        
                      </select>
                          
                       
          </div>
       </div>
       <div class="col-md-6">
          <div class="form-group">
                <label> ชื่อ</label>
               <input type="text" id = "FName" class="form-control" name = "FName" value = "">
        </div>
      </div>

       <div class="col-md-6">
            <div class="form-group">
                <label> นามสกุล</label>
               <input type="text" id = "LName" class="form-control" name = "LName" value = "">
          </div>
        </div>
        
         <div class="col-md-6">
          <div class="form-group">
                <label> เลขบัตรประชาชน</label>
               <input type="text" id = "IDCard" class="form-control" name = "IDCard" value = "">
               
            <input type="hidden" id = "IDCardHidden" class="form-control" name = "IDCardHidden" value = "">
         </div>
          </div> 
           <div class="col-md-12">
         <div class="form-group">
                <label>ที่อยู่</label>
                 <textarea class="form-control" rows="3" name = "AddressEdit" id = "AddressEdit"></textarea>
         </div>
          
        </div>

          <div class="col-md-6">
          <div class="form-group">
                <label> วันที่เจ้าพัก</label>
               <input type="text" id = "StartDate" class="form-control" name = "StartDate" value = ""  disabled>
         </div>
          </div>
         <div class="col-md-6">
          <div class="form-group">
                <label> แก้วันที่เข้าพัก</label>
             <div class="row">
              <div class="col-xs-3">
                <div class="form-group">
                  <select class="selectpicker form-control" name = "dayedit" id = "dayedit">
                      <option value = "">วัน</option>
                    <option value = "01">1</option>
                    <option  value = "02">2</option>
                    <option  value = "03">3</option>
                     <option value = "04">4</option>
                    <option  value = "05">5</option>
                    <option  value = "06">6</option>
                     <option value = "07">7</option>
                    <option  value = "08">8</option>
                    <option  value = "09">9</option>
                    <option value = "10">10</option>
                    <option value = "11">11</option>
                    <option  value = "12">12</option>
                    <option  value = "13">13</option>
                     <option value = "14">14</option>
                    <option  value = "15">15</option>
                    <option  value = "16">16</option>
                     <option value = "17">17</option>
                    <option  value = "18">18</option>
                    <option  value = "19">19</option>
                     <option  value = "20">20</option>
                      <option value = "21">21</option>
                    <option  value = "22">22</option>
                    <option  value = "23">23</option>
                     <option value = "24">24</option>
                    <option  value = "25">25</option>
                    <option  value = "26">26</option>
                     <option value = "27">27</option>
                    <option  value = "28">28</option>
                    <option  value = "29">29</option>
                    <option value = "30">30</option>
                     <option value = "31">31</option>
                  </select>
                </div>
              </div>
               <div class="col-xs-6">
                <div class="form-group">
                  <select class="selectpicker form-control" name = "monthedit" id = "monthedit">
                      <option value = "" >เดือน</option>
                    <option  value = "01">มกราคม</option>
                    <option  value = "02">กุมภาพันธ์</option>
                    <option  value = "03">มีนาคม</option>
                     <option  value = "04">เมษายน</option>
                    <option  value = "05">พฤษภาคม</option>
                    <option  value = "06">มิถุนายน</option>
                     <option  value = "07">กรกฏาคม</option>
                    <option value = "08">สิงหาคม</option>
                    <option value = "09">กันยายน</option>
                     <option  value = "10">ตุลาคม</option>
                    <option  value = "11">พฤศจิกายน</option>
                    <option  value = "12">ธันวาคม</option>
                  </select>
                </div>
              </div>
               <div class="col-xs-3">
                <div class="form-group">
                  <select class="selectpicker form-control" name = "yearedit" id = "yearedit">
                     <option value = "">ปี</option>
                   <option  value = "2529">2529</option>
                                        <option  value = "2530">2530</option>
                                        <option  value = "2531">2531</option>
                                         <option  value = "2532">2532</option>
                                        <option  value = "2533">2533</option>
                                         <option  value = "2534">2534</option>
                                        <option  value = "2535">2535</option>
                                         <option  value = "2536">2536</option>
                                        <option  value = "2537">2537</option>
                                        <option  value = "2538">2538</option>
                                         <option  value = "2539">2539</option>
                                        <option  value = "2540">2540</option>
                                         <option  value = "2541">2541</option>
                                         <option  value = "2542">2542</option>
                                        <option  value = "2543">2543</option>
                                         <option  value = "2544">2544</option>
                                        <option  value = "2545">2545</option>
                                         <option  value = "2546">2546</option>
                                        <option  value = "2547">2547</option>
                                        <option  value = "2548">2548</option>
                                         <option  value = "2549">2549</option>
                                        <option  value = "2550">2550</option>
                                         <option  value = "2551">2551</option>
                                         <option  value = "2552">2552</option>
                                        <option  value = "2553">2553</option>
                                         <option  value = "2554">2554</option>
                                        <option  value = "2555">2555</option>
                                         <option  value = "2556">2556</option>
                                        <option  value = "2557">2557</option>
                                        <option  value = "2558">2558</option>
                                       
                                         <option  value = "2559">2559</option>
                                        <option  value = "2560">2560</option>
                                        <option  value = "2561">2561</option>
                                         <option  value = "2562">2562</option>
                                        <option  value = "2563">2563</option>
                                         <option  value = "2564">2564</option>
                                        <option  value = "2565">2565</option>
                                         <option  value = "2566">2566</option>
                                        <option  value = "2567">2567</option>
                                        <option  value = "2568">2568</option>
                                         <option  value = "2569">2569</option>
                                        <option  value = "2570">2570</option>
                  </select>
                </div>
              </div>
          </div>

         </div>
          </div>
        <div class="col-md-6">
          <div class="radio">
              <label><input type="checkbox" name="StatusChk" id = "StatusChk" value="" >&nbsp;แจ้งย้ายออกแล้ว 
                 <input type = "textbox" id = "EndDate" name = "EndDate" value = "" readonly>
              </label>
            </div>
          </div> 

          <div id = "chkenddate"  style="display: none">
             <div class="col-md-6">
          <div class="form-group">
                <label> วันที่ย้ายออก</label>
             <div class="row">
              <div class="col-xs-3">
                <div class="form-group" >

                  <select class="selectpicker form-control" name = "dayend" id = "dayend">
                      <option value = "" selected>วัน</option>
                    <option value = "01">1</option>
                    <option  value = "02">2</option>
                    <option  value = "03">3</option>
                     <option value = "04">4</option>
                    <option  value = "05">5</option>
                    <option  value = "06">6</option>
                     <option value = "07">7</option>
                    <option  value = "08">8</option>
                    <option  value = "09">9</option>
                    <option value = "10">10</option>
                    <option value = "11">11</option>
                    <option  value = "12">12</option>
                    <option  value = "13">13</option>
                     <option value = "14">14</option>
                    <option  value = "15">15</option>
                    <option  value = "16">16</option>
                     <option value = "17">17</option>
                    <option  value = "18">18</option>
                    <option  value = "19">19</option>
                     <option  value = "20">20</option>
                      <option value = "21">21</option>
                    <option  value = "22">22</option>
                    <option  value = "23">23</option>
                     <option value = "24">24</option>
                    <option  value = "25">25</option>
                    <option  value = "26">26</option>
                     <option value = "27">27</option>
                    <option  value = "28">28</option>
                    <option  value = "29">29</option>
                    <option value = "30">30</option>
                     <option value = "31">31</option>
                  </select>
                </div>
              </div>
               <div class="col-xs-6">
                <div class="form-group">
                  <select class="selectpicker form-control" name = "monthend" id = "monthend">
                      <option value = "" selected>เดือน</option>
                    <option  value = "01">มกราคม</option>
                    <option  value = "02">กุมภาพันธ์</option>
                    <option  value = "03">มีนาคม</option>
                     <option  value = "04">เมษายน</option>
                    <option  value = "05">พฤษภาคม</option>
                    <option  value = "06">มิถุนายน</option>
                     <option  value = "07">กรกฏาคม</option>
                    <option value = "08">สิงหาคม</option>
                    <option value = "09">กันยายน</option>
                     <option  value = "10">ตุลาคม</option>
                    <option  value = "11">พฤศจิกายน</option>
                    <option  value = "12">ธันวาคม</option>
                  </select>
                </div>
              </div>
               <div class="col-xs-3">
                <div class="form-group">
                  <select class="selectpicker form-control" name = "yearend" id = "yearend">
                      <option  value = "2529">2529</option>
                                        <option  value = "2530">2530</option>
                                        <option  value = "2531">2531</option>
                                         <option  value = "2532">2532</option>
                                        <option  value = "2533">2533</option>
                                         <option  value = "2534">2534</option>
                                        <option  value = "2535">2535</option>
                                         <option  value = "2536">2536</option>
                                        <option  value = "2537">2537</option>
                                        <option  value = "2538">2538</option>
                                         <option  value = "2539">2539</option>
                                        <option  value = "2540">2540</option>
                                         <option  value = "2541">2541</option>
                                         <option  value = "2542">2542</option>
                                        <option  value = "2543">2543</option>
                                         <option  value = "2544">2544</option>
                                        <option  value = "2545">2545</option>
                                         <option  value = "2546">2546</option>
                                        <option  value = "2547">2547</option>
                                        <option  value = "2548">2548</option>
                                         <option  value = "2549">2549</option>
                                        <option  value = "2550">2550</option>
                                         <option  value = "2551">2551</option>
                                         <option  value = "2552">2552</option>
                                        <option  value = "2553">2553</option>
                                         <option  value = "2554">2554</option>
                                        <option  value = "2555">2555</option>
                                         <option  value = "2556">2556</option>
                                        <option  value = "2557">2557</option>
                                        <option  value = "2558">2558</option>
                                       
                                         <option  value = "2559">2559</option>
                                        <option  value = "2560">2560</option>
                                        <option  value = "2561">2561</option>
                                         <option  value = "2562">2562</option>
                                        <option  value = "2563">2563</option>
                                         <option  value = "2564">2564</option>
                                        <option  value = "2565">2565</option>
                                         <option  value = "2566">2566</option>
                                        <option  value = "2567">2567</option>
                                        <option  value = "2568">2568</option>
                                         <option  value = "2569">2569</option>
                                        <option  value = "2570">2570</option>
                  </select>
                </div>
              </div>
          </div>

         </div>
          </div>
        </div>
      </div>
      </form>
      </div>
     
                <div class="modal-footer">
                   
              <div class="col-xs-4">
              <input type = "text" name = "Modify"   style="border:0px" size="40">
             
           </div>
            <div class="col-md-6">
              <div class="form-group">
               <button type="button"   class="btn btn-success btn-ok pull-right" data-dismiss="modal" id = "submit">บันทึกข้อมูล</button>
                <button type="button" class="btn btn-default" id ="close" data-dismiss="modal">ปิดหน้าต่าง</button>&nbsp;&nbsp;
             </div>
           </div>
                </div>
    </div>
  </div>
</div>


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


 $('#close').on('click',function(e) {


$('#my_modaledit').hide('slow', function() {
  
});
 });
  $(function () {
  
    $('#example2').DataTable({
      "paging": true,
  "stateSave": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "bRetrieve": true,
         "aaSorting": [[ 0, "desc" ]],
      "autoWidth": false
    });
 
  });

    //Date range as a button
</script>
<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })
    </script>

    <script>
$('#my_modaledit').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id'); 
     var fname = $(e.relatedTarget).data('fname'); 
       var address = $(e.relatedTarget).data('address'); 
    var lname = $(e.relatedTarget).data('lname'); 
     var idcard = $(e.relatedTarget).data('idcard');
      var idcardhidden = $(e.relatedTarget).data('idcardhidden');
     var startdate = $(e.relatedTarget).data('startdate'); 
     var enddate = $(e.relatedTarget).data('enddate'); 
     var modify = $(e.relatedTarget).data('modify'); 
     var title = $(e.relatedTarget).data('title');
     var status = $(e.relatedTarget).data('status');
     var day = $(e.relatedTarget).data('day'); 
     var month = $(e.relatedTarget).data('month');
     var year = $(e.relatedTarget).data('year');

   

     if(status == 0){ // disable
       
        $('input[name=StatusChk]').prop('checked', true);
       
        //$('#StatusChk').attr('disabled', true);
         $("#chkenddate").hide();
           $("#EndDate").show();
     } if(status == 1){ //enable
       
        $('input[name=StatusChk]').prop('checked', false);
        // $('#StatusChk').attr('enable', true);
         $("#EndDate").hide();

     }
     
     $('#dayedit').val('')
     $('#monthedit').val('')
     $('#yearedit').val('')
       $('#dayend').val('')
     $('#monthend').val('')
     $('#yearend').val('')
     $('#Title').val(title).attr("selected", "selected");
   //  $('input[name=day]').attr('selected','selected');
     /*$('select#day option').each(function () {
      if ($(this).text().toLowerCase() == co.toLowerCase()) {
          $(this).prop('selected','selected');
          return;
      } });*/
    $(e.currentTarget).find('input[name="Id"]').val(id);
    $(e.currentTarget).find('input[name="FName"]').val(fname);
     $(e.currentTarget).find('input[name="LName"]').val(lname);
      $(e.currentTarget).find('input[name="IDCard"]').val(idcard);
       $(e.currentTarget).find('input[name="IDCardHidden"]').val(idcardhidden);
      $(e.currentTarget).find('input[name="StartDate"]').val(startdate);
       $(e.currentTarget).find('textarea[name="AddressEdit"]').val(address);
      $(e.currentTarget).find('input[name="EndDate"]').val(enddate);
      $(e.currentTarget).find('input[name="Modify"]').val(modify);
     $(e.currentTarget).find('input[name="Title"]').val(title);
      $(e.currentTarget).find('input[name="StatusChk"]').val(status);
     //   $(e.currentTarget).find('input[name="day"]').val(day);
      //$(e.currentTarget).find('input[name="month"]').val(month);
      //$(e.currentTarget).find('input[name="year"]').val(year);
    // $('#Title option[value=" + title + "]').attr("selected", "selected");
     

  //   $('[name="Title"]').val('นาย'); 
      // $("#Title option:selected").text(title)
      //$("select#Title option") .each(function() { this.selected = (this.text == title); });
//$('#Title').val(title)
       $('#AddressEdit').val(address)

        $("#StatusChk").click(function () {
          
            if ($(this).prop('checked')) {  
                  $("#chkenddate").show();
              } else {
                  $("#chkenddate").hide();
              }
        });

    


      
});


 $('#my_modaledit').on('click', '.btn-ok', function(e) {


            var $modalDiv = $(e.delegateTarget);

            var isMyCheckboxChecked = $('#StatusChk').is(':checked');
            
           /* if(isMyCheckboxChecked){

              var dayend =  $('#dayend').val();
              var monthend =  $('#monthend').val();
              var yearend =  $('#yearend').val();
              if(dayend == "" || monthend == "" || yearend == ""){
                alert('กรุณาเลือกวันที่ แจ้งย้ายออก');
                return false;
              }
            }*/
            
            
           
            var form=$("#editrental");
            var data = form.serialize();
              var bookId = $("#txtEmail").val()
            var name = $(e.relatedTarget).data('id'); 
            // alert(data);  
          var moreinfo = '';

              $('input[type=checkbox]').each(function() {     
                  if (!this.checked) {
                      moreinfo += '&'+this.name+'=1';
                  }
                   if (this.checked) {
                      moreinfo += '&'+this.name+'=0';
                  }
              });
              var bookId = $("#txtEmail").val()
            var name = $(e.relatedTarget).data('id'); 
         //   alert(data);  
         //   alert(moreinfo);
             var data = data+moreinfo;
            var data1 = data+moreinfo;

           
           $.ajax({  
                    url:"../class/checkid.php",  
                   method:"POST",  
                    data:data,
                            
                    success:function(data){  
                     if (data){
                         $.ajax({
                          url: "../class/edit_rental.php",
                          type: "post",
                          data:data1,
                          success: function (data) { 
                             var content = $('.tablebody');
                           $("#my_modaledit").modal('hide');
                        
                          alert('บันทึกการแก้ไขเเรียบร้อย');
                         location.reload();
                        
                          }
                        }); //ajax

                    }
                    else{
                  
                        $('#my_modaledit').show('fast', function() {
                           alert('เลขบัตรประชาชนนี้ได้ลงทะเบียนแล้ว');

                        });
                       
                      }
                  }
             });
          
        });
    </script>
    

<script>
//$( "#search" ).submit(function( event ) {
//  alert( "Handler for .submit() called." );
//  event.preventDefault();
//});
// $("#print").click(function(e){
//     var form=$("#search");
//            var data = form.serialize();
//             $(this).target = "_blank"; 
//            alert(data);
//                $.ajax({
//                url: "../reporttopdf/reportrental.php",
//                type: "post",
//                data:data,
//               success: function (data) {
//              //  window.open($(this).prop('action')); // <---- form action attribute = url
//            }
//              });
//
// });



    $("#reset").click(function(e){
     
    /* Single'x line Reset function executes on click of Reset Button */
      $('#FName')
          .val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');// [attribute value] e.g. <input value="preset" ...

       $('#LName').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');

        $('#StartDate').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');
      
       $('#EndDate').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');

        $('#Address').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');
       
       //  $("#Status option:selected").prop("selected", false);
         $('#Status').val('');
      
        $("#day option:selected").prop("selected", false);
         $("#day1 option:selected").prop("selected", false);
          $("#month option:selected").prop("selected", false);
         $("#month1 option:selected").prop("selected", false);
         $("#year option:selected").prop("selected", false);
         $("#year1 option:selected").prop("selected", false);
           $("#search").submit();
    });

      $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var id = $(this).data('recordId');
        //  alert(id);
            $.ajax({
                url: "../class/delete_user.php?id="+id,
                type: "get",
                data:id,
                success: function (data) {

                   

                  $("#confirm-delete").modal('hide');
                   $("#"+id).remove();
                  alert('ลบข้อมูลเรียบร้อยแล้ว');
                  /*var parent = $(this).parent("td").parent("tr");
                  alert(parent);
                  parent.fadeOut('slow');*/    
                //  location.reload();


                 /*  var tr = $(id).closest("tr");

              
                  
                tr.fadeOut(400, function(){
                    tr.remove();
                });  */

                }
              });


           
         
            // $.ajax({url: '/api/record/' + id, type: 'DELETE'})
            // $.post('/api/record/' + id).then()
          
        });
        $('#confirm-delete').on('show.bs.modal', function(e) {
            var data = $(e.relatedTarget).data();
            $('.title', this).text(data.recordTitle);
          $('.btn-ok', this).data('recordId', data.recordId);
        });



  /*    $(document).on( "click", '.edit',function(e) {
           var FName = $(this).data('FName');
            var LName = $(this).data('LName');
              var id = $(this).data('id');
               var Address = $(this).data('Address');
              var StartDate = $(this).data('StartDate');
              var EndDate = $(this).data('EndDate');
            alert(FName);

      });


$('#myModal2').on('show.bs.modal', function(e) {
 
    var Id = $(e.relatedTarget).data('id'); 
     var fname = $(e.relatedTarget).data('fname'); 
    var lname = $(e.relatedTarget).data('lname'); 
     var startdate = $(e.relatedTarget).data('startdate'); 
    var enddate = $(e.relatedTarget).data('enddate'); 
     var address = $(e.relatedTarget).data('address'); 


    $(e.currentTarget).find('input[name="Id"]').val(Id);
    $(e.currentTarget).find('input[name="FName"]').val(fname);
     $(e.currentTarget).find('input[name="LName"]').val(lname);
        $(e.currentTarget).find('input[name="StartDate"]').val(startdate);
     $(e.currentTarget).find('input[name="EndDate"]').val(EndDate);
          $(e.currentTarget).find('input[name="Address"]').val(address);
});
 $('#myModal2').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var form=$("#editrental");
            var data1 = form.serialize();
             
            var name = $(e.relatedTarget).data('name'); 
            
            $.ajax({
                url: "../class/edit_rental.php",
                type: "post",
                data:data1,
                dataType: "html",
                success: function (data) { 
                alert('บันทึกการแก้ไขเเรียบร้อย')
         
                    
                  $("#myModal2").modal('hide');
              
               
                
                  

                }
              });


           
         
            // $.ajax({url: '/api/record/' + id, type: 'DELETE'})
            // $.post('/api/record/' + id).then()
          
        });*/

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
