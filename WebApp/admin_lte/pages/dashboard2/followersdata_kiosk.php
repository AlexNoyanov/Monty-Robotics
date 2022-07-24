<?php

// session_start();

require('../connect.php');

// if(!$select_db){
//     die("Connection failed: " . $select_db->error);
// }

if (isset($_POST['kiosk_id'])){

    $kiosk_id = $_POST['kiosk_id'];

    $query = "SELECT * FROM kiosk WHERE kiosk_id='$kiosk_id'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $terminal_left = 0;
    $terminal_right = 0;

    foreach ($result as $row) {

        $terminal_left = $row['terminal_left'];
	    $terminal_right = $row['terminal_right'];
        $lift_left  = $row['lift_left'];
        $lift_right = $row['lift_right'];
        $pay_left = $row['returm_pay_left'];
        $pay_right = $row['returm_pay_right'];
        $cal = $row['calibration'];
        $reboot = $row['reboot'];
        $no_dance = $row['no_dance'];
        $save_xlsx = $row['save_xslx'];
        $tablet_left = $row['tablet_left'];
        $tablet_right = $row['tablet_right'];
    }

    $arr = array('terminal_right' => $terminal_right, 'terminal_left' => $terminal_left, 'lift_left'=> $lift_left, 'lift_right' => $lift_right, 'pay_left' => $pay_left, 'pay_right' => $pay_right, 'calibration' => $cal, 'reboot' => $reboot, 'no_dance'=> $no_dance, 'save_xlsx' => $save_xlsx,'tablet_left'=> $tablet_left, 'tablet_right' => $tablet_right);

    $post_data = json_encode($arr);

    //now print the data
    print $post_data;
    // echo json_encode($labels);

    exit;

}

print json_encode('false');     
   
?>
