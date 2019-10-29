<?php
header("content-type:text/javascript;charset=utf-8"); 
 require ('../../config/db_connect.php');

   

//array_walk_deep($array, 'strtoupper');



$requestData= $_REQUEST;
$columns = array(
// datatable column index  => database column name
    0 =>'rental_fname',
    1 => 'rental_lname',
    2=> 'rental_idcard'
);


$sql = "SELECT * FROM masterrental";
mysql_query("SET NAMES 'utf8'"); 
$rs = mysql_query($sql);

$totalData = mysql_num_rows($rs);
$totalFiltered = $totalData;

$sql = "SELECT * ";
$sql.=" FROM masterrental WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
 $sql.=" AND ( FName LIKE '".$requestData['search']['value']."%' ";    
 $sql.=" OR LName LIKE '".$requestData['search']['value']."%' ";

 $sql.=" OR IDCard LIKE '".$requestData['search']['value']."%' )";
}
$query = mysql_query($sql);
$totalFiltered = mysql_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." 
			 LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$query=mysql_query($sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysql_fetch_array($query) ) {  // preparing an array
 $nestedData=array(); 
 $nestedData[] = $row["FName"];
 $nestedData[] = $row["LName"];
 $nestedData[] = $row["IDCard"];
 $data[] = $nestedData;
}

$json_data = array(
   "draw" => intval( $requestData['draw'] ),
   "recordsTotal"  => intval( $totalData ),  // total number of records
   "recordsFiltered"  => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
   "data"             => $data   // total data array
   );

echo json_encode($json_data);  // send data as json format




?>