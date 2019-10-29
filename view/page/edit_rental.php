<?php 
require ('../../config/db_connect.php');
 require('../../method/thaidate.php');
 $id = $_GET['id'];
 $sql = "SELECT * FROM masterrental WHERE ID = '" . $id . "'";
$rs = mysql_query($sql);
    $row = mysql_fetch_array($rs);
    var_dump($row);
//  $std =  thai_date_fullmonth(strtotime($row['StartDate']));
  // $end =  thai_date_fullmonth(strtotime($row['EndDate']));
?>

<style type="text/css">
@media screen and (min-width: 500px) {
  
  #myModal2 .modal-dialog  {width:900px;}
#myModal2 .modal-heade {  background-color: #f4f4f4; }
}
</style>

<div class="modal-header" style = "background-color: #337ab7;">
  <button type="button" class="close" data-dismiss="modal">X</button>
  <h1>แก้ไขข้อมูล ผู้เข้าพัก</h1>
</div>


<div class="modal-body">
    <form name = "editrental" id = "editrental" method="post">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
               <div class="row">
                  <div class="col-md-4">
                      <label> คำนำหน้า</label>
                      <input type="hidden" name = "id" id = "id" class="form-control"  value = "<?= $row['ID']; ?>">
                      <input type="hidden" name = "action" id = "action" class="form-control"  value = "edit">
                      <input type="textbox"  name = "ss" id ="ss"  value = "<?= $row['StartDate'];?>"> 
                      <input type="textbox"   id="dd" name = "dd"  value = "<?= $row['EndDate'];?>"> 
                       <select class="form-control select2" name = "Title" style="width: 100%;">
                        <option selected="selected" name = "Title" id = "Title">
                          <option value = "นาย">นาย</option>
                        <option value = "นาง">นาง</option>
                       <option value = "นางสาว">นางสาว</option>
                        
                      </select>
                  </div>
               
                  <div class="col-md-7">
                      <label>ชือ </label>
  
                      <input type="text" id = "FName" name = "FName" class="form-control" value = "<?= $row['FName']; ?>">
                  </div>
               </div>
            
              <!-- /.form-group -->

            
              <div class="form-group">
                <label> เลขบัตรประชาชน</label>
               <input type="text" id = "IDCard" class="form-control" name = "IDCard" value = "<?= $row['IDCard']; ?>">
              </div>
           

              <div class="form-group">
                <label>ที่อยู่</label>
                 <textarea class="form-control" rows="3" name = "Address" id = "Address"><?= $row['Address']; ?></textarea>
              </div>
              <!-- /.form-group -->

            </div>
            <!-- /.col -->
            

            <div class="col-md-6">
              <div class="form-group">
                <label> สกุล</label>
               <input type="text" id = "LName" class="form-control" name = "LName" value = "<?= $row['LName']; ?>">
              </div>
              </div>
              <!-- /.form-group -->
        <div class="col-md-6">
              <div class="form-group">
                <label>วันที่เข้าพัก</label>
              <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                
                   <input type="text" name="StartDate" value=""/>
              </div>
              <!-- /.form-group -->
           </div>
            
             
              <!-- /.form-group -->
              <div class="form-group">
                <label>วันหมดสัญญา</label>
                <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              
                    <input type="text" name="EndDate" value=""/>
              </div>
              </div>
              <!-- /.form-group -->
            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
            <div class="col-md-6">
              <div class="form-group">
               <p> วันที่แก้ไขครั้งล่าสุด </p>
             </div>
           </div>
            <div class="col-md-6">
              <div class="form-group">
               <button type="button"   class="btn btn-success btn-ok pull-right" data-dismiss="modal" id = "submit">บันทึกข้อมูล</button>
             </div>
           </div>
        
    </form>
</div>


 <script id="example_script"  type="text/javascript">
      function demo() {
        $('.datepicker').datepicker();
          $('.datepicker1').datepicker();
      }
    </script>

    <script type="text/javascript">
      $(function(){
        $('pre[data-source]').each(function(){
          var $this = $(this),
            $source = $($this.data('source'));

          var text = [];
          $source.each(function(){
            var $s = $(this);
            if ($s.attr('type') == 'text/javascript'){
              text.push($s.html().replace(/(\n)*/, ''));
            } else {
              text.push($s.clone().wrap('<div>').parent().html()
                .replace(/(\"(?=[[{]))/g,'\'')
                .replace(/\]\"/g,']\'').replace(/\}\"/g,'\'') // javascript not support lookbehind
                .replace(/\&quot\;/g,'"'));
            }
          });
          
          $this.text(text.join('\n\n').replace(/\t/g, '    '));
        });

        prettyPrint();
        demo();
      });
    </script>