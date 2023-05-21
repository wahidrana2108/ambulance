    <!-- footer start-->
    <div class="navbar-dark bg-dark">
        <div class="container">
            <div class="row justify-content-center mt-3">
                <div class="col-md-3 p-3 m-3">
                    <li class="nav-item"> <a class="nav-link fw-bolder text-light" aria-current="page" href="#"><h4>Pages</h4></a></li>
                    <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="drivers.php">Driver</a></li>
                    <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="team.php">Ambulance</a></li>
                    <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="rankings.php">Driver Ranking</a></li>
                    <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="sponsors.php">Sponsors</a></li>
                </div>
                
                <div class="col-md-3 p-3 m-3">
                    <ul class="nav flex-column">
                        <li class="nav-item"> <a class="nav-link fw-bolder text-light" aria-current="page" href="#"><h4>About Us</h4></a></li>
                        <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="#">Author</a></li>
                        <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="#">Information</a></li>
                        <li class="nav-item"> <a class="nav-link active text-light" aria-current="page" href="#">Instructor</a></li>
                    </ul>
                </div>

                <div class="col-md-3 p-3 m-3">
                    <div class="">
                        <h4 class="fw-bolder text-light">Contract Us</h4>
                        <h6 class="text-light">ambulance@support.com</h6>
                        <h6 class="text-light">+09696000123456</h6>
                        <h6 class="text-light"><a href="https://goo.gl/maps/cQB2UVXVby6rtAWm7" class="text-decoration-none text-light">Physical Location</a></h6>
                        <hr class="text-light">
                        <h4 class="text-light">User Section</h4>
                        <nav class="navbar">
                            <ul class="navbar-nav me-auto mb-2">
                                <li class="nav-item">
                                    <?php
                                        if(!isset($_SESSION['customer_email'])){
                                            echo "<a href='customer_area/login.php' class='dropdown-item active text-light'>Login</a>";
                                        }
                                        else{
                                            echo "<a href='customer_area/myAccount.php' class='dropdown-item active text-light'>My Account</a>";
                                        }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php                           
                                    if(!isset($_SESSION['customer_email'])){                      
                                        echo "<a href='customer_area/registration.php' class='dropdown-item active text-light'>Register</a>";
                                    }else{
                                        echo " <a href='customer_area/logout.php' class='dropdown-item active text-light'>Log Out</a> ";
                                    }                          
                                    ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="text-light text-center"><i class="fa-regular fa-copyright"></i> <small>Ambulance</small></footer><br>
        <hr class="text-light fw-bolder">
    </div>
    <!-- footer end-->

    <!-- scripts start-->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fedd93fc11.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- scripts end-->

    <!-- own carousel js start -->
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    </script>
<!-- own carousel js end -->

</body>
</html>