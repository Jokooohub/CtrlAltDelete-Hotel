<?php

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    session_start();

    if(isset($_GET['fetch_rooms']))
    {
        // // count no. of rooms
        // $count_rooms = 0;

        // // fetching settings table to check website shutdown or not
        // $settings_q = "SELECT * FROM `settings` WHERE `sr_no`=1";
        // $settings_r = mysqli_fetch_assoc(mysqli_query($con,$settings_q));

        // $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');

        while($room_data = mysqli_fetch_assoc($room_res))
        {
            // get features of room

            $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f
                INNER JOIN `room_features` rfea ON f.id = rfea.features_id
                WHERE rfea.room_id = '$room_data[id]'");
            
            $features_data = "";
            while($fea_row = mysqli_fetch_assoc($fea_q)){
                $features_data .="<span class='badge bg-light text-dark text-wrap lh-base'>
                $fea_row[name]
            </span>";
            }

            // get facilities of room

            $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f
                INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
                WHERE rfac.room_id = '$room_data[id]'");
            
            $facilities_data = "";
            while($fac_row = mysqli_fetch_assoc($fac_q)){
                $facilities_data .="<span class='badge bg-light text-dark text-wrap lh-base'>
                $fac_row[name]
            </span>";
            }

            // get thumbnail of image

            $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
            $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                WHERE `room_id`='$room_data[id]' 
                AND `thumb`='1'");

            if(mysqli_num_rows($thumb_q)>0){
                $thumb_res = mysqli_fetch_assoc($thumb_q);
                $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
            }

            $book_btn = "";

            $login = 0;

            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $login = 1;
            }

            $book_btn = "<button onclick='checkLoginToBook($login, $room_data[id])'class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";

            // print room card

            echo <<<data
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                    <img src="$room_thumb" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">$room_data[name]</h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Features</h6>
                            $features_data
                    </div>
                    <div class="facilities mb-3">
                            <h6 class="mb-1">Facilities</h6>
                            $facilities_data
                    </div>
                    <div class="guests">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge bg-light text-dark text-wrap lh-base">
                                $room_data[adult] Adults
                            </span>
                            <span class="badge bg-light text-dark text-wrap lh-base">
                                $room_data[children] Children
                            </span> 
                    </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                        <h6 class="mb-4">₱$room_data[price] per night</h6>
                        $book_btn 
                        <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
            data;

        }
    }

?>