<?php
// session_start();
require('../connect.php');
// if(!$select_db){
//     die("Connection failed: " . $select_db->error);
// }

if (isset($_POST['kiosk_id'])){
    $state_left = $_POST['lift_left'];
	$state_right = $_POST['lift_right'];

    print json_encode($state_left);
    print json_encode($state_right);

    $kiosk_id = $_POST['kiosk_id'];

    print json_encode($kiosk_id);

    $query = "UPDATE kiosk SET lift_left ='$state_left', lift_right='$state_right'  WHERE kiosk_id='$kiosk_id'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    //now print the data
    print $result;
    // echo json_encode($labels);
    exit;
}

print json_encode('false');

?>

