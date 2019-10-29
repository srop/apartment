<?php 
error_reporting(E_ALL & ~E_NOTICE);
//http://www.itoffside.com/make-text-autocomplete-like-google-with-jquery-plugin/
require ('../../config/db_connect.php'); 


/*select sub_district 
from sub_district_table 
where province_name = parameter
and sub_district not in (select sub_district from sub_district_check)*/
        
        
if(!empty($_POST["Floor"])) {
	echo $sql = " SELECT Room FROM masterroom WHERE Floor = '" . $_POST["Floor"] . "' ORDER BY Room ASC ";
	  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
              
?>
	<option value="">เลือกห้องพัก</option>
<?php
	  while ($row = mysqli_fetch_array($rs)){
?>
	    <option value="<?php echo $row['Room']; ?>"<?php if($row['Room']== $_POST['Room']) echo 'selected="selected"'; ?>><?php echo $row['Room']; ?></option>

<?php
	}
}
?>