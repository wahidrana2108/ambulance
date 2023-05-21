<?php 
    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        $admin_SESSION = $_SESSION['admin_email'];

        $get_admin = "select *  from admins where admin_email='$admin_SESSION'";
        $run_admin = mysqli_query($con,$get_admin);
        $row_admin = mysqli_fetch_array($run_admin);
        $admin_id = $row_admin['admin_id'];
        $admin_name = $row_admin['admin_name'];

        $get_ambulance = "select * from ambulance";
        $run_ambulance = mysqli_query($con,$get_ambulance);
        $count_ambulance = mysqli_num_rows($run_ambulance);

        $get_driver = "select * from driver";
        $run_driver = mysqli_query($con,$get_driver);
        $count_driver = mysqli_num_rows($run_driver);

        $get_category = "select * from category";
        $run_category = mysqli_query($con,$get_category);
        $count_category = mysqli_num_rows($run_category);

        $get_customers = "select * from customers";
        $run_customers = mysqli_query($con,$get_customers);
        $count_customers = mysqli_num_rows($run_customers);
        

        $get_premium = "select * from customers where sub_id='2'";
        $run_premium = mysqli_query($con,$get_premium);
        $count_premium = mysqli_num_rows($run_premium);

        $get_blogs = "select * from blogs";
        $run_blogs = mysqli_query($con,$get_blogs);
        $count_blogs = mysqli_num_rows($run_blogs);

        $get_news = "select * from news";
        $run_news = mysqli_query($con,$get_news);
        $count_news = mysqli_num_rows($run_news);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="admin_images/admin.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/fedd93fc11.js" crossorigin="anonymous"></script>
</head>
<body> 
    <!-- navbar start -->
    <?php include('includes/navbar.php'); ?>
    <!-- navbar end -->
    <div class="col-12 row">
        <!-- sidebar start -->
        <div class="col-2">
            <?php include('includes/sidenav.php'); ?>
        </div>
        <!-- sidebar end -->

        <!-- dashboard start -->
        <div class="col-9">
            <?php 
                if(isset($_GET['dashboard'])){
                    include("dashboard.php");
                }
                if(isset($_GET['driver_entry'])){
                    include("driver_entry.php");
                }
                if(isset($_GET['driver_view'])){
                    include("driver_view.php");
                }
                if(isset($_GET['driver_delete'])){
                    include("driver_delete.php");
                }
                if(isset($_GET['driver_edit'])){
                    include("driver_edit.php");
                }
                if(isset($_GET['blog_entry'])){
                    include("blog_entry.php");
                }
                if(isset($_GET['blog_view'])){
                    include("blog_view.php");
                }
                if(isset($_GET['blog_delete'])){
                    include("blog_delete.php");
                }
                if(isset($_GET['blog_edit'])){
                    include("blog_edit.php");
                }
                if(isset($_GET['news_entry'])){
                    include("news_entry.php");
                }
                if(isset($_GET['news_view'])){
                    include("news_view.php");
                }
                if(isset($_GET['news_delete'])){
                    include("news_delete.php");
                }
                if(isset($_GET['news_edit'])){
                    include("news_edit.php");
                }
                if(isset($_GET['ambulance_entry'])){
                    include("ambulance_entry.php");
                }
                if(isset($_GET['ambulance_view'])){
                    include("ambulance_view.php");
                }
                if(isset($_GET['ambulance_delete'])){
                    include("ambulance_delete.php");
                }
                if(isset($_GET['ambulance_edit'])){
                    include("ambulance_edit.php");
                }
                if(isset($_GET['category_entry'])){
                    include("category_entry.php");
                }
                if(isset($_GET['category_view'])){
                    include("category_view.php");
                }
                if(isset($_GET['category_delete'])){
                    include("category_delete.php");
                }
                if(isset($_GET['category_edit'])){
                    include("category_edit.php");
                }
                if(isset($_GET['customer_view'])){
                    include("customer_view.php");
                }
                if(isset($_GET['customer_premium'])){
                    include("customer_premium.php");
                }
                if(isset($_GET['customer_delete'])){
                    include("customer_delete.php");
                }
        ?> 
        </div>
        <!-- dashboard end -->
    </div>
<?php include('includes/footer.php'); ?>
<?php } ?>