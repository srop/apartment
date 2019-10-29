<?php
//http://www.w3resource.com/sql/joins/using-a-where-cluase-to-join-three-or-more-tables-based-on-a-parent-child-relationship.php
error_reporting(E_ALL & ~E_NOTICE);
//https://www.youtube.com/watch?v=5wDc47jcg0o
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

         <a data-toggle="modal" class="btn btn-success" href="popup_transactionuser.php" data-target="#myModal"> เพิมข้อมูลผู้เข้าพัก</a>
          </div>
          

 

<!-- Modal -->

          
       <div class="panel panel-default" >
        <div class="panel-heading">ค้นหารายชื่อผู้เข้าพัก</div>
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
                         $condtion ="1&FName={$_POST['FName']}&LName={$_POST['LName']}&Floor={$_POST['Floor']}&Room={$_POST['Room']}&ST={$StartDate}&ED={$EndDate}";
                
                      
                       
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
                               <label for="inputEmail3" class="col-sm-2 control-label">อาคาร</label>

                                <div class="col-sm-4">
                                 
                               <select name="Floor" id ="Floor" class="form-control"  onChange="getState(this.value);">
                                    <option value="">เลือกอาคาร</option>
                               <?php
                                $sql ="SELECT DISTINCT(Floor) FROM masterroom";
                                  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                                 while ($row = mysqli_fetch_array($rs)){
                                  
                               ?>
              
                                    <option value="<?php echo $row['Floor']; ?>"<?php if($row['Floor']== $_POST['Floor']) echo 'selected="selected"'; ?>><?php echo $row['Floor']; ?></option>

                                 <?php } ?> 
                               </select>
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ห้อง </label>
                                <div class="col-sm-4">
                                     <select name="Room" id = "Room" class="form-control" >
                                        <option value="">กรุณาเลือกอาคาร</option>
                                    </select>
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
                                        <option  <?php if ($_POST['month'] == '01') { ?> selected = "true" <?php }; ?> value = "02">กุมภาพันธ์</option>
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
                                        <option  <?php if ($_POST['month1'] == '01') { ?> selected = "true" <?php }; ?> value = "02">กุมภาพันธ์</option>
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
                        </div>

                   <div class="box-footer">
                          <div class="col-xs-9">
                       <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         <button type="reset" id = "reset" name = "reset" class="btn btn-default" data-dismiss="modal">ล้างข้อมูล</button>
                          </div>
                         <div class="col-xs-3" align = "right">
                            
                             <a  id ="print" name ="print" class="btn btn-warning"  href = "../reporttopdf/reporttransaction.php?codition=<?php echo $condtion; ?>" target="_blank">พิมพ์รายงาน</a>
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
                    <p><font size = "4pt">คุณต้องการลบข้อมูลของ  <b class="title"></b>ห้อง  <b class="room"></b></font></p>
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
                         <th>ลำดับ</th>
                          <th>ชื่อ</th>
                          <th>สกุล</th>
                           <th>เลขบัตรประชาชน</th>
                          <th>อาคาร</th>
                          <th>ห้อง</th>
                          <th>วันที่เข้าพัก</th>
                          <th ></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อ</th>
                          <th>สกุล</th>
                           <th>เลขบัตรประชาชน</th>
                          <th>อาคาร</th>
                          <th>ห้อง</th>
                          <th>วันที่เข้าพัก</th>
                          <th ></th>
                      </tr>
                  </tfoot>
                  <tbody>

            <?php 
          // var_dump($_POST);
            $sql = "SELECT TU.ID,TU.Floor,TU.Room,TU.UserID,TU.Detail,TU.DateCreate,TU.DateModified,MR.IDCard,MR.Title,MR.FName,MR.LName, MR.Address "
              . "FROM transactionuser as TU LEFT JOIN masterrental as MR ON TU.UserID = MR.ID WHERE Flag = 1 ";
          if( !empty($_POST['FName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $sql.=" AND  FName LIKE '%".$_POST['FName']."%'";  
             }
             if( !empty($_POST['LName']) ) {  
               $sql.=" AND LName LIKE '%".$_POST['LName']."%' ";
            }
             if( !empty($_POST['Floor']) ) {  
               $sql.=" AND Floor = ".$_POST['Floor']." ";
            }
            if( !empty($_POST['Room']) ) {  
               $sql.=" AND Room = ".$_POST['Room']." ";
            }
              /*  if( !empty($_POST['FName']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
          if( !empty($_POST['Address']) ) { 
               $sql.=" AND Address LIKE '%".$_POST['Address']."%' ";
              }*/
      //       if(($_POST['StartDate'] != "") || ($_POST['EndDate'] != "")) { 
              //$StartDate = ConvDateTHtoEn($_POST['StartDate']);
                //$EndDate = ConvDateTHtoEn($_POST['EndDate']);
                //$sql = "AND (StartDate BETWEEN ".$StartDate." AND " . $EndDate.")";
              // $sql.=" AND StartDate >=".$StartDate."";
         //     $EndDate = ConvDateTHtoEn($_POST['EndDate']);
          //     $sql.=" AND BETWEEN  <=".$EndDate."";
          //    }
            if( !empty($_POST['month']) &&  !empty($_POST['day']) &&  !empty($_POST['year'])  &&  !empty($_POST['month1']) &&  !empty($_POST['day1']) &&  !empty($_POST['year1']))  { 
              $year = $_POST['year']-543;
            $dateupdate = $year."-".$_POST['month']."-".$_POST['day'];
             $StartDate = date('Y-m-d', strtotime($dateupdate)); 

            $year1 = $_POST['year1']-543;
            $dateupdate1 = $year."-".$_POST['month1']."-".$_POST['day1'];
             $EndDate = date('Y-m-d', strtotime($dateupdate1)); 

              $sql.=" AND ( DateCreate  BETWEEN '".$StartDate."' AND '".$EndDate."')";
             }
           //echo $sql;
            $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
             /*   $link = "edit_rental.php?id=".$row['ID']."";
               $StartDate =  thai_date_fullmonth(strtotime($row['StartDate']));
			   
			 
                 $EndDate =  thai_date_fullmonth(strtotime($row['EndDate']));
		 //$EndDate  = "<font color='red'>".$EndDate." </font>";
               $FullName =  $row['Title']." ".$row['FName'];
                 if($row['Status'] == "1"){
                  $status = "<font color='green'>ยังเช่าอาศัยอยู่ </font>";
                 }else{
                     $status = "<font color='red'>แจ้งออกแล้ว </font>";
                 }*/

            ?>
            <tr id = "<?php echo  $row['ID']; ?>"> <td><?=  $row['ID']; ?></td>
                <td><?=  $row['Title']." ".$row['FName']; ?></td>
                <td><?= $row['LName']; ?></td>
                 <td><?= $row['IDCard']; ?></td>
               <td><?= $row['Floor']; ?></td>
                <td><?= $row['Room']; ?></td>
               <td><?= thai_date_fullmonth(strtotime($row['DateCreate'])); ?></td>
            
                <td> 
                 
                <button data-toggle="modal"  data-record-title="<?=  $row['Title']." ".$row['FName']." ".$row['LName']; ?>"  data-target="#confirm-delete" id = "del" class="btn btn-danger" data-record-id ="id=<?=$row['ID']."&room=".$row['Room'];?>" data-record-room ="<?=$row['Room'] ?>"> ลบผู้เข้าพัก</button>
               <button type="button" class="btn btn-success edit_button" 
                                                                data-toggle="modal" data-target="#my_modaledit"
                                                                data-fullname="<?=$row['Title']." ".$row['FName']." ".$row['LName'];?>"
                                                                data-user="<?=$row['UserID'];?>"
                                                                data-room="<?=$row['Room'];?>"
                                                                 data-flooredit="<?=$row['Floor'];?>"
                                                                data-detail="<?php echo $row['Detail'];?>"
                                                             
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


    <script src="js/jquery.min.js"></script>
    <script src="../dist/js/standalone/selectize.js"></script>
    <script src="js/index.js"></script>
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
         <input name = "FloorEdit"  id = "FloorEdit" type = "hidden" value = "">
         <div class="col-md-6">
          <div class="form-group">
                  <label> ผู้เข้าพักเดิม</label>
                  <input type="text" id = "FullName" class="form-control" name = "FullName" value = "" readonly="">
                          
                       
          </div>
       </div>
       <div class="col-md-6">
         <!--  <div class="form-group has-error">
                 <label> เลือกผู้เข้าพักใหม่</label>
           <select id="User" name = "User" class="form-control" placeholder="กรุณาเลือกผู้เข้าพัก..." required>
                     <option value="">เลือกผู้เข้าพัก</option>
                <?php
                 $sql ="SELECT * FROM masterrental WHERE ID NOT IN (SELECT ID FROM transactionuser) ORDER BY FName ASC";
                   $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                  while ($row = mysqli_fetch_array($rs)){
                     
                ?>
               
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['Title']." ".$row['FName']." ".$row['LName']; ?></option>
                   
               
                  <?php } ?> 
                </select>
        </div>
 -->

        <div class="form-group has-error">
            <label> เลือกผู้เข้าพักใหม่</label>
          <select id="User" name = "User" class="demo-default" placeholder="กรุณาเลือกผู้เข้าพัก...">
                     <option value="">เลือกผู้เข้าพัก</option>
                <?php
             echo    $sql ="SELECT * FROM masterrental ORDER BY FName ASC";
                   $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                  while ($row = mysqli_fetch_array($rs)){
                     
                ?>
               
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['Title']." ".$row['FName']." ".$row['LName']; ?></option>
                   
               
                  <?php } ?> 
                </select>
        </div>
        <script>
        $('#User').selectize();
        </script>
      </div>

     
           <div class="col-md-12">
         <div class="form-group">
                <label>รายละเอียด</label>
                 <textarea class="form-control" rows="3" name = "DetailAdd" id = "DetailAdd"></textarea>
         </div>
          
        </div>

          <div class="col-md-6">
          <div class="form-group">
                <label> ห้อง</label>
                <input type="text" id = "Room" class="form-control" name = "Room" value = "" readonly="">
         </div>
          </div>
         <div class="col-md-6">
        <div class="form-group has-error">
                <label for="dayedit"> แก้วันที่เข้าพัก</label>
             <div class="row">
              <div class="col-xs-3">
                <div class="form-group">
                  <select class="form-control required" name = "dayedit" id = "dayedit" required>
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
                  <select class="form-control required" name = "monthedit" id = "monthedit" required>
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
                  <select class="form-control required" name = "yearedit" id = "yearedit" required>
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
     var fullname = $(e.relatedTarget).data('fullname'); 
       var address = $(e.relatedTarget).data('address'); 
    var room = $(e.relatedTarget).data('room'); 
      var flooredit = $(e.relatedTarget).data('flooredit'); 
     var user = $(e.relatedTarget).data('user');
     var startdate = $(e.relatedTarget).data('startdate'); 
     var enddate = $(e.relatedTarget).data('enddate'); 
     var modify = $(e.relatedTarget).data('modify'); 
     var title = $(e.relatedTarget).data('title');
     var detail = $(e.relatedTarget).data('detail');
     var day = $(e.relatedTarget).data('day'); 
     var month = $(e.relatedTarget).data('month');
     var year = $(e.relatedTarget).data('year');

  
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
    $(e.currentTarget).find('input[name="FullName"]').val(fullname);
     $(e.currentTarget).find('input[name="Room"]').val(room);
     $(e.currentTarget).find('input[name="FloorEdit"]').val(flooredit);
      $(e.currentTarget).find('input[name="StartDate"]').val(startdate);
       $(e.currentTarget).find('textarea[name="AddressEdit"]').val(address);
      $(e.currentTarget).find('input[name="EndDate"]').val(enddate);
      $(e.currentTarget).find('input[name="Modify"]').val(modify);
     $(e.currentTarget).find('input[name="Title"]').val(title);
      $(e.currentTarget).find('input[name="DetailAdd"]').val(detail);
      $("#User option:contains(" + fullname + ")").attr('selected', 'selected');
   // $("#User option:text=" + fullname +"").prop("selected", "selected");
     //   $(e.currentTarget).find('input[name="day"]').val(day);
      //$(e.currentTarget).find('input[name="month"]').val(month);
      //$(e.currentTarget).find('input[name="year"]').val(year);
    // $('#Title option[value=" + title + "]').attr("selected", "selected");
     

  //   $('[name="Title"]').val('นาย'); 
      // $("#Title option:selected").text(title)
      //$("select#Title option") .each(function() { this.selected = (this.text == title); });
//$('#Title').val(title)
       $('#DetailAdd').val(detail)

      

      
});


 $('#my_modaledit').on('click', '.btn-ok', function(e) {

            e.preventDefault(); 
           
            var form=$("#editrental");
            var data = form.serialize();

          var yearedit = $('#yearedit').val()
         var monthedit = $('#monthedit').val()
          var dayedit = $('#dayedit').val()
          var User = $("#User option:selected").val();
        
         if(dayedit == "" || monthedit == "" || yearedit == "" ){
           alert('กรุณาเลือกวันเข้าพักให้ถูกต้องด้วยค่ะ');   
             $(element).closest('.form-group').addClass('has-error');
return false;
      // Stop submission of the form
         e.preventDefault();
          $('#my_modaledit').modal('show');   
            
      
         }
        
            $.ajax({
                url: "../class/edit_transaction.php",
                type: "post",
                data:data,

                 success: function(data) {
                      var content = $('.tablebody');
                      $("#my_modaledit").modal('hide');
              
                      alert(data);
                        location.reload();

                   },
                            error: function() {
                                alert('Error occured');
                            }


              });

          
        });
    </script>
    

<script>




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

    
       
       //  $("#Status option:selected").prop("selected", false);
         $('#Status').val('');
      $("#Floor option:selected").prop("selected", false);
         $("#Room option:selected").prop("selected", false);
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
          var res = id.split('=');
        var res1 = res[1].split('&');
           
            $.ajax({
                url: "../class/delete_transaction.php",
                type: "get",
                data:id,
                success: function (data) {

                   

                  $("#confirm-delete").modal('hide');
                   $("#"+res1[0]).remove();
                  alert('ลบข้อมูลเรียบร้อยแล้ว');
                

                }
              });


           
         
            // $.ajax({url: '/api/record/' + id, type: 'DELETE'})
            // $.post('/api/record/' + id).then()
          
        });
        $('#confirm-delete').on('show.bs.modal', function(e) {
            var data = $(e.relatedTarget).data();
            $('.title', this).text(data.recordTitle);
             $('.room', this).text(data.recordRoom);
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
<script>
$(function () {
 
    var val1 = $("select#Floor").val();
   
    getState(val1);
});
</script>
<script>
function getState(val) {
  
  $.ajax({
  type: "POST",
  url: "getroom_addtran.php",
  data:'Floor='+val,
  success: function(data){
            
                   $("select#Room").html(data); 
  }
  });
}


</script>