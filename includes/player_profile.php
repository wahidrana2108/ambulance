<?php
        if(isset($_GET['p_id'])){
            $p_id = $_GET['p_id'];
            $get_driver = "select * from driver where driver_id='$p_id'";
            $run_driver = mysqli_query($con,$get_driver);
            While($row_driver = mysqli_fetch_array($run_driver)){
                $driver_id = $row_driver['driver_id'];
                $driver_name = $row_driver['driver_name'];
                $driver_age = $row_driver['driver_age'];
                $driver_height = $row_driver['driver_height'];
                $driver_weight = $row_driver['driver_weight'];
                $driver_rating = $row_driver['driver_rating'];
                $driver_img = $row_driver['driver_img'];
                $con_id = $row_driver['con_id'];
                $cat_id = $row_driver['cat_id'];

                $get_con = "select * from ambulance where con_id='$con_id'";
                $run_con = mysqli_query($con,$get_con);
                $row_con = mysqli_fetch_array($run_con);
                $driver_ambulance = $row_con['con_name'];
                $ambulance_img = $row_con['con_img'];

                $get_cat = "select * from category where cat_id='$cat_id'";
                $run_cat = mysqli_query($con,$get_cat);
                $row_cat = mysqli_fetch_array($run_cat);
                $driver_category = $row_cat['cat_title'];



                echo "
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-12 col-md-6 row text-light'>
                                <div class='col-4'><img src='admin_area/driver_img/$driver_img' width='100%'></div>
                                <div class='col-8'>
                                    <h4>$driver_name</h4>
                                    <h6>Ambulance Association Rating</h6>
                                    <div class='row'>
                                        <img class='col-2' src='admin_area/country_img/$ambulance_img' height='50px'>
                                        <h5 class='col-10'>$driver_ambulance</h5>
                                    </div>
                                </div>
                            </div>
                        
                            <div class='col-sm-12 col-md-6 text-light'>
                                <div class='col-sm-12 col-md-8'>
                                    <div class='card bg-dark text-center'>
                                        <div class='card-header fw-bolder' style='background-color: rgb(48, 48, 48);'>$driver_name</div>
                                        <div class='card-body'>
                                            <nav class='nav flex-column'>
                                                <ul class='navbar-nav'>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Nid</div>
                                                        <div class='col text-end pe-5'>$driver_height</div>
                                                    </div><br>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Phone</div>
                                                        <div class='col text-end pe-5'>$driver_weight</div>
                                                    </div><br>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Age</div>
                                                        <div class='col text-end pe-5'>$driver_age</div>
                                                    </div><br>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Category</div>
                                                        <div class='col text-end pe-5'>$driver_category</div>
                                                    </div><br>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Points</div>
                                                        <div class='col text-end pe-5'>$driver_rating</div>
                                                    </div><br>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Salary</div>
                                                        <div class='col text-end pe-5'>৳1000</div>
                                                    </div><br>
                                                    <div class='row'>
                                                        <div class='col text-start ps-5'>Ambulance</div>
                                                        <div class='col text-end pe-5'>$driver_ambulance</div>
                                                    </div>
                                                </ul>
                                            </nav>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    ?>