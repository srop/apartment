<?php
//http://www.ninenik.com/%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%B8%E0%B8%81%E0%B8%95%E0%B9%8C_%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99_jquery_ui_autocomplete_%E0%B8%A3%E0%B9%88%E0%B8%A7%E0%B8%A1%E0%B8%81%E0%B8%B1%E0%B8%9A%E0%B8%90%E0%B8%B2%E0%B8%99%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5_%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%87%E0%B9%88%E0%B8%B2%E0%B8%A2-432.html
//http://www.bewebdeveloper.com/tutorial-about-autocomplete-using-php-mysql-and-jquery
//http://www.itoffside.com/make-text-autocomplete-like-google-with-jquery-plugin/
require ('../../config/db_connect.php'); 


/*select sub_district 
from sub_district_table 
where province_name = parameter
and sub_district not in (select sub_district from sub_district_check)*/
        
        
if(!empty($_POST["Floor"])) {
	echo $sql =" SELECT Room FROM masterroom WHERE Floor = '" . $_POST["Floor"] . "' AND Room NOT IN (SELECT Room FROM transactionuser WHERE Flag = 1)";
	  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
              
?>
	<option value="">เลือกห้องพัก..</option>
<?php
	  while ($row = mysqli_fetch_array($rs)){
?>
	   <option value="<?php echo $row['Room']; ?>"><?php echo $row['Room']; ?></option>
<?php
	}
}
?>