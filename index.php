<?php
    $active='Home';
    include("includes/header.php");
?>
    <!-- carousel end -->
    <div id="banner" class="carousel slide carousel-fade" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#banner" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php 
                $get_slides = "select * from slider LIMIT 0,3";
                $run_slides = mysqli_query($con,$get_slides);
                while($row_slides=mysqli_fetch_array($run_slides)){
                    $slide_name = $row_slides['slide_name'];
                    $slide_image = $row_slides['slide_image'];                              
                    echo "                               
                    <div class='carousel-item active'> <img src='admin_area/banner_img/$slide_image' class='d-block w-100' style='height: 550px;'></div>
                ";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <!-- carousel end -->


    
    <!-- Our latest blogs with owl carousel start -->
    <div class="container mt-5 mb-5">
        <h3 class="text-center text-light">Our Latest Blogs</h3>

        <div class="mt-3">
            <div class="owl-carousel owl-theme">
                <?php get_blog(); ?>
            </div>
        </div>
    </div>
    <!-- Our latest blogs with owl carousel end -->
    
    
    <!-- Our latest news with owl carousel start -->
    <div class="container mt-5 mb-5">
        <h3 class="text-center text-light">Our Latest News</h3>

        <div class="mt-3">
            <div class="owl-carousel owl-theme">
                <?php get_news(); ?>
            </div>
        </div>
    </div>
    <!-- Our latest news with owl carousel end -->
<?php
    include("includes/footer.php");
?>