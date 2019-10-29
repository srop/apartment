<?php
require ('config/db_connect.php');



$monthly = array("JanuaryMeter","FebruaryMeter","MarchMeter", "AprilMeter","MayMeter","JuneMeter","JulyMeter","AugustMeter",
    "SeptemberMeter","OctoberMeter","NovemberMeter","DecemberMeter");
 $arrlength=count($monthly);    
for($x=0;$x<$arrlength;$x++)
  {

		 echo $chk = "SELECT * FROM {$monthly[$x]}";
		  $rs = mysqli_query($conn, $chk) or die("employee-grid-data.php: get employees");
		while ($rowchk = mysqli_fetch_array($rs)){
			$floor =str_split($rowchk['Room'],1);
			  echo $sql = "UPDATE {$monthly[$x]}  SET Floor = '{$floor['0']}'  WHERE Room = '{$rowchk['Room']}'"; echo "<br>";
			  $retval  = mysqli_query($conn, $sql);
			     if(!$retval ) {
			               die('Could not update data: ' . mysqli_error($retval));
			            }

			# code...
		}


	
			//    // echo $sql = "ALTER TABLE {$monthly[$x]} ADD Floor VARCHAR(255) NOT NULL AFTER Year";
			     
			//     $retval  = mysqli_query($conn, $sql);
			//      if(!$retval ) {
			//                die('Could not update data: ' . mysqli_error($retval));
			//             }

			//             echo "<br>";
			//   }
		
	}
?>