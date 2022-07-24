<?php  
$conn = new mysqli('localhost', 'root', 'alexnoyanov1999');  
mysqli_select_db($conn, 'monty2'); 
$date_open = $_POST["open"];
$date_close = $_POST["close"]; 
$sql = "SELECT * FROM orders WHERE kiosk_id='$kiosk_id' and date >= '$date_open' and date <= '$date_close'";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Order Id" . "\t" . "Item" . "\t" . "Price" . "\t". "Date" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Orders.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 