<?php 
    require('inc/essentials.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-white">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden fs-3">
            <p class="custom-bg p-4 m-4 text-center">Welcome to the CtrlAltDelete Hotel Admin Portal. We're delighted to have you on board. As an administrator, you play a crucial role in ensuring a seamless experience for our guests. Explore the tools and features at your disposal to manage reservations, room availability, and guest information effectively. If you have any questions or require support, our team is here to assist you. Thank you for your dedication to providing exceptional service. Let's make every guest's stay memorable!</p>
            </div>
        </div>
    </div>



    <?php require('inc/scripts.php'); ?>
</body>
</html>