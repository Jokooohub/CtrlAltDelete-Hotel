<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <?php require('inc/links.php'); ?>
    <style>
        .box {
            border-top-color: var(--teal) !important;
        }
    </style>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">About Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Vitae obcaecati at voluptatibus<br>ratione impedit quidem sapiente, 
            quis minima hic natus.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Porro eligendi exercitationem eius magnam dolorem aperiam inventore!
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Porro eligendi exercitationem eius magnam dolorem aperiam inventore!
            </p>
            </div>
            <div class="com-lg-5 col-md-5 mb-4 order-1">
                <img src="images/carousel/carousel1.png" class="w-100 rounded">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/hotel.svg" width="70px">
                <h4 class="mt-3">100+ Rooms</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/customers.svg" width="70px">
                <h4 class="mt-3">500+ Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/rating.svg" width="70px">
                <h4 class="mt-3">100+ Reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/staff.svg" width="70px">
                <h4 class="mt-3">150+ Staffs</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold text-center">Management Team</h3>

    <?php
        $about_r = selectAll('team_details');
        $path = ABOUT_IMG_PATH;

        while($row = mysqli_fetch_assoc($about_r)){
            echo<<<data
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-5 mb-4 order-2">
                        <h3 class="mb-3">$row[name]</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Porro eligendi exercitationem eius magnam dolorem aperiam inventore!
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Porro eligendi exercitationem eius magnam dolorem aperiam inventore!
                    </p>
                    </div>
                    <div class="com-lg-5 col-md-5 mb-4 order-1">
                        <img src="$path$row[picture]" class="w-75 rounded-circle border border-dark">
                    </div>
                </div>
            </div>
            data;
        }
    ?>
    

    <?php require('inc/footer.php'); ?>

</body>
</html>