<?php

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    date_default_timezone_set("Asia/Manila");
    session_start();

    if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
        redirect('index.php');
    }

    // if(isset($_POST['cancel_booking']))
    // {
    //     $frm_data = filteration($_POST);
        
    //     $res = delete("DELETE bd, bo
    //     FROM `booking_details` bd
    //     INNER JOIN `booking_order` bo ON bd.booking_id")
    //     $res = delete("DELETE FROM `user_cred` WHERE `id`=? AND `is_verified`=?",[$frm_data['user_id'],0],'ii');

    //     if($res){
    //         echo 1;
    //     }
    //     else {
    //         echo 0;
    //     }
    // }

    if (isset($_POST['cancel_booking'])) {
        $frm_data = filteration($_POST);
    
        // Delete from booking_details first
        $query_details = "DELETE FROM booking_details WHERE booking_id = ?";
        $values_details = [$frm_data['id']];
        $datatypes_details = 'i';
    
        $res_details = delete($query_details, $values_details, $datatypes_details);
    
        // Then delete from booking_order
        $query_order = "DELETE FROM booking_order WHERE booking_id = ?";
        $values_order = [$frm_data['id']];
        $datatypes_order = 'i';
    
        $res_order = delete($query_order, $values_order, $datatypes_order);
    
        if ($res_order) {
            echo 0;
        } else {
            echo 1;
        }
    }

?>