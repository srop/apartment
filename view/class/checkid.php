<?php 
 require ('../../config/db_connect.php');


 if(is_array($_POST)){
 	if (isset($_POST['idcardAdd'])) { 
 		$data = "";
 		$id = $_POST['idcardAdd'];
 		  $sql = "SELECT count(*) as Num FROM masterrental WHERE IDCard = '{$id}'";
 			$rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
           $row = mysqli_fetch_array($rs);
          
		     if($row['Num'] == "0"){
		     	echo true;
		      }else{
		   echo false;
		      }

 	}if (isset($_POST['IDCard'])) { 
 		$data = "";
 		if($_POST['IDCard'] == $_POST['IDCardHidden']){
 		
 			$id = $_POST['IDCard'];
 		   $sql = "SELECT count(*) as Num FROM masterrental WHERE IDCard = '{$_POST['IDCardHidden']}'";
 			$rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
           $row = mysqli_fetch_array($rs);
    //      echo $row['Num'];
		     if($row['Num'] == "1"){
		     	echo true;
		      }else{
		  		 echo false;
		      }
		  }if($_POST['IDCard'] != $_POST['IDCardHidden']){
		  
		  		
 		   $sql = "SELECT count(*) as Num FROM masterrental WHERE IDCard = '{$_POST['IDCard']}'";
 			$rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
           $row = mysqli_fetch_array($rs);
        
		     if($row['Num'] == "0"){
		 
		     	echo true;
		      }else{
		      	
		  		 echo false;
		      }
		  }
 	}

 }	


   ?>