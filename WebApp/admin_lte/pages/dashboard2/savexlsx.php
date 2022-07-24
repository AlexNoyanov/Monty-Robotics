<?php

    require('../connect.php');

    if (isset($_POST['time_start'])) {

        $date_o = $_POST['time_start'];
        $date_c = $_POST['time_finish'];

        $date_o_date = strtotime($date_o);
        $date_c_date = strtotime($date_c);   

        $kiosk_id = $_POST['kiosk_id'];
        $date_open = date("Y-m-d H:i:s", $date_o_date);
        $date_close = date("Y-m-d H:i:s", $date_c_date);

        $query = "SELECT * FROM orders WHERE kiosk_id='$kiosk_id' and date >= '$date_open' and date <= '$date_close'";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

        $data_table = array();
        $data_table_row = array();

        foreach ($result as $row) {
            $data_table_row['num_rec'] = $row['num_rec'];
            $data_table_row['class_id'] = $row['class_id'];
            $data_table_row['product_name'] = $row['product_name'];
            $data_table_row['price'] = $row['price'];
            $data_table_row['date'] = $row['date'];
            $data_table[] = $data_table_row;
        
        }

        




        $post_data = json_encode(array('table' => $data_table));

        print $post_data;

        exit;

    }

    print json_encode('false');    

?>