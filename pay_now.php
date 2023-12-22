<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/common.css">

<?php

    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');

    date_default_timezone_set("Asia/Manila");

    session_start();

    if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
        redirect('index.php');
    }

    if(isset($_POST['pay_now']))
    {
        // insert data into database

        $frm_data = filteration($_POST);

        $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`) VALUES (?,?,?,?)";
    
        insert($query1,[$_SESSION['uId'],$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout']],'isss');

        $booking_id = mysqli_insert_id($con);

        $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?)";
    
        insert($query2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'isssss');
    }

    
?>

<html>
    <head>
        <title>Booking Successful</title>
    </head>
    <body>
    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">Congratulations!</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary">  >  </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary">  >  </span>
                    <span class="text-secondary">  >  </span>
                    <a href="bookings.php" class="text-secondary text-decoration-none">BOOKINGS</a>
                </div>
            </div>

        </div>
    </div>
    </body>
</html>
