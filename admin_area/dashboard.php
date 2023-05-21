<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<div class="col-lg-12">
    <!-- breadcrumb start -->
    <h2 class="text-center p-2">Dashboard</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-gauge"></i> Dashboard</li>
        </ol>
    </nav>
    <!-- breadcrumb start -->


    <!-- view details start -->
    <div class="row row-cols-1 row-cols-md-4 g-4 fw-bolder text-light">
        <div class="col ">
          <div class="card border-primary h-100" style="background-color: rgb(80, 115, 212);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-globe ps-5"></i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_ambulance; ?></p>
                    <p class="pe-5">ambulance</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-primary">
                <a class="text-decoration-none" href="index.php?ambulance_view"><h5>View Details</i></h5></a>
                <a href="index.php?ambulance_view"><h5><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        <div class="col ">
          <div class="card h-100" style="background-color: rgb(203, 131, 231);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-list ps-5"> </i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_category; ?></p>
                    <p class="pe-5">category</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-success">
                <a class="text-decoration-none" href="index.php?category_view"><h5 style="color: rgb(203, 131, 231);">View Details</i></h5></a>
                <a href="index.php?category_view"><h5 style="color: rgb(203, 131, 231);"><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        <div class="col ">
          <div class="card border-primary h-100" style="background-color: rgb(80, 115, 212);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-user ps-5"></i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_driver; ?></p>
                    <p class="pe-5">drivers</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-primary">
                <a class="text-decoration-none" href="index.php?driver_view"><h5>View Details</i></h5></a>
                <a href="index.php?driver_view"><h5><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        <div class="col ">
          <div class="card border-danger h-100" style="background-color: rgb(235, 103, 63);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-blog ps-5"></i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_blogs; ?></p>
                    <p class="pe-5">Blogs</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-danger">
                <a class="text-decoration-none" href="index.php?blog_view"><h5 style="color: rgb(235, 103, 63);">View Details</i></h5></a>
                <a href="index.php?blog_view"><h5 style="color: rgb(235, 103, 63);"><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        <div class="col ">
          <div class="card border-danger h-100" style="background-color: rgb(248, 71, 65);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-newspaper ps-5"></i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_news; ?></p>
                    <p class="pe-5">News</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-danger">
                <a class="text-decoration-none" href="index.php?news_view"><h5 style="color: rgb(248, 71, 65);">View Details</i></h5></a>
                <a href="index.php?news_view"><h5 style="color: rgb(248, 71, 65);"><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        <div class="col ">
          <div class="card border-warning h-100" style="background-color: rgb(247, 183, 47);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-users ps-5"></i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_customers; ?></p>
                    <p class="pe-5"> Total User</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-warning">
                <a class="text-decoration-none" href="index.php?customer_view"><h5 style="color: rgb(247, 183, 47);">View Details</i></h5></a>
                <a href="index.php?customer_view"><h5 style="color: rgb(247, 183, 47);"><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        <div class="col ">
          <div class="card border-success h-100" style="background-color: rgb(51, 177, 82);">
            <div class="row" >
                <div class="col-2 p-3" style="font-size: 5rem;"><i class="fa-solid fa-crown ps-5"></i></div>
                <div class="col-10 text-end p-3">
                    <p class="pe-5" style="font-size: 3rem;"><?php echo $count_premium; ?></p>
                    <p class="pe-5"> Premium User</p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light text-success">
                <a class="text-decoration-none" href="index.php?customer_premium"><h5 style="color: rgb(51, 177, 82);">View Details</i></h5></a>
                <a href="index.php?customer_premium"><h5 style="color: rgb(51, 177, 82);"><i class="fa-sharp fa-solid fa-circle-right"></i></h5></a>
            </div>
          </div>
        </div>
        
      </div>
      <!-- view details end -->


</div>
<?php } ?>