<?php
    if(isset($_GET['con_id'])){
        if(!isset($_GET['cat_id'])){
            $ambulance_id = $_GET['con_id'];
            $get_driver = "select * from driver where con_id='$ambulance_id'";
            $run_driver = mysqli_query($con,$get_driver);
            while($row_driver = mysqli_fetch_array($run_driver)){
                $p_id = $row_driver['driver_id'];
                $p_title = $row_driver['driver_name'];
                $cat_id = $row_driver['cat_id'];
                $p_age = $row_driver['driver_age'];
                $p_rating = $row_driver['driver_rating'];
                $con_id = $row_driver['con_id'];
                $p_img = $row_driver['driver_img'];


                $get_cat = "select * from category where cat_id = '$cat_id'";
                $run_cat = mysqli_query($con,$get_cat);
                $row_cat = mysqli_fetch_array($run_cat);
                $cat_title = $row_cat['cat_title'];


                $get_con = "select * from ambulance where con_id='$con_id'";
                $run_con = mysqli_query($con,$get_con);
                $row_con = mysqli_fetch_array($run_con);
                $con_title = $row_con['con_name'];

                echo "
                    <div class='col'>
                        <div class='card bg-dark text-light h-100'>
                            <a href='player_profile.php?p_id=$p_id'><img src='admin_area/driver_img/$p_img' class='card-img-top p-3'></a>
                            <div class='card-body'>
                                <h5 class='card-title text-center fw-bolder'>$p_title</h5>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
        else{
            $category_id = $_GET["cat_id"];
            $get_con_driver = "select * from driver where cat_id ='$category_id' and con_id = 'ambulance_id'";
            $run_con_driver = mysqli_query($con,$get_con_driver);
            while($row_con_driver = mysqli_fetch_array($run_con_driver)){
                $play_id = $row_con_driver['driver_id'];
                echo "
                    <div class='col'>
                        <div class='card bg-secondary text-light h-100'>
                            <a href='player_profile.php?p_id=$p_id'><img src='admin_area/driver_img/$p_img' class='card-img-top p-3'></a>
                            <div class='card-body'>
                                <h5 class='card-title text-center fw-bolder'>$p_title</h5>
                            </div>
                        </div>
                    </div>
                ";
            }
        }





    }
?>









