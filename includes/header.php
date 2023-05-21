<?php
    session_start();
    include("includes/db.php");
    include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Ambulance </title>
    <link rel="icon" type="image/x-icon" href="admin_area/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/fedd93fc11.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="admin_area/images/logo.png" style="height: 60px;" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item <?php if($active=='Home') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item <?php if($active=='Players') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="players.php">Driver</a></li>
                    <li class="nav-item <?php if($active=='Teams') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="team.php">Ambulance</a></li>
                    <li class="nav-item <?php if($active=='Rankings') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="rankings.php">Driver Rankings</a></li>
                    <li class="nav-item <?php if($active=='My Account') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="customer_area/my_account.php?view_account">My Account</a></li>
                    <li class="nav-item <?php if($active=='Contact') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="contact.php">Contact Us</a></li>
                    <li class="nav-item <?php if($active=='Developers') echo"activePage"; ?>"><a class="nav-link active text-light" aria-current="page" href="developers.php">Developers</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 ms-auto mb-lg-0">                            
                        <?php 
                        if(!isset($_SESSION['customer_email'])){
                            echo "<li class='nav-item dropdown'><a class='nav-link active text-light' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'><img src='customer_area/customer_images/user.png' id='dp' alt=''></a>";
                        }
                        else{
                            $customer_session = $_SESSION['customer_email'];
                            $get_customer = "select * from customers where customer_email='$customer_session'";
                            $run_customer = mysqli_query($con,$get_customer);
                            $row_customer = mysqli_fetch_array($run_customer);
                            $customer_image = $row_customer['customer_image'];
                            echo "<li class='nav-item dropdown'><a class='nav-link active text-light' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'><img src='customer_area/customer_images/$customer_image' id='dp' alt=''></a>";
                        }
                        ?>                                                                
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <?php
                                        if(!isset($_SESSION['customer_email'])){
                                            echo "<h6 class='dropdown-item'>Welcome</h6>";
                                        }
                                        else{
                                            $get_customer = "select * from customers where customer_email='$customer_session'";
                                            $run_customer = mysqli_query($con,$get_customer);
                                            $row_customer = mysqli_fetch_array($run_customer);
                                            $customer_name = $row_customer['customer_name'];
                                            echo"<h6 class='dropdown-item'>$customer_name</h6>";
                                        }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php
                                        if(!isset($_SESSION['customer_email'])){
                                            echo "<a href='customer_area/login.php' class='dropdown-item'>Login</a>";
                                        }
                                        else{
                                            echo "<a href='customer_area/my_account.php?view_account' class='dropdown-item'>My Account</a>";
                                        }
                                    ?>
                                </li>
                                <li class="nav-item">
                                    <?php                           
                                    if(!isset($_SESSION['customer_email'])){                      
                                            echo "<a href='customer_area/registration.php' class='dropdown-item'>Register</a>";
                                            }else{
                                            echo " <a href='customer_area/logout.php' class='dropdown-item'>Log Out</a> ";
                                            }                          
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form class="d-flex mt-1 ms-md-5" role="search">
                                <input class="form-control me-2 .col-md-4" type="search" placeholder="Search " aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </li>
                        
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->





    