<?php
    $active='drivers';
    include("includes/header.php");
?>


<!-- drivers start -->
<div id="content" class="">
    <div class="container">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-3">
                    <li class="breadcrumb-item text-light" aria-current="page"><h6><i class="fa-solid fa-home ps-2 pt-2"></i> <a class="text-decoration-none text-light" href="index.php">Home</a></h6></li>
                    <li class="breadcrumb-item text-light active" aria-current="page"><i class="fa-solid fa-user pt-2"></i> Driver</li>
                </ol>
            </nav>
        </div>


        <div class="d-flex">
            <div class="col-md-2 me-1">
                <?php
                    include("includes/sidebar.php");
                ?>

            </div>

            <div class="col-md-10">
                <?php
                    if(!isset($_GET['p_cat'])){
                        if(!isset($_GET['cat'])){
                            echo "<h4 class='text-center text-light fw-bolder pb-3'>driver Information</h4>";
                        }
                    }
                ?>
                
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <?php
                        include("includes/player.php");
                    ?>
                </div>

                <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
                    <?php 
                        driverCategory();
                    ?>
                </div>


                

                <!-- Button Group Start -->
                    <div class='btn-toolbar mt-4 mb-3 d-flex justify-content-center' role='toolbar' aria-label=''>
                        <div class='btn-group me-2' role='group' aria-label=''>
                            
                            <?php button(); ?>
                        </div>
                    </div>
                <!-- Button Group End -->
                

            </div>
        </div>

    </div>
</div>
<!-- drivers end -->

<?php
    include("includes/footer.php");
?>