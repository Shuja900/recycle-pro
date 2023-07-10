<?php 
include('Db.php'); 
$date3=str_replace('/','-',$_POST['date3']);
$d=date_create($date3);
$date5=date_format($d,"Y-m-d");
$date6=str_replace('/','-',$_POST['date5']);
$t=date_create($date6);
$date8=date_format($t,"Y-m-d");
$sql = "select ordid from comparerecycle where date(Date_Time) BETWEEN '$date5' AND '$date8'";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = "id "  ;  
$setData = '';  
  while ($rec = mysqli_fetch_array($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
         $rowData .= $value;  
    }  
    $setData .= trim($value) . "\n";  
    
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=orders.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?>