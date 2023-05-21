<?php
    $active='Developers';
    include("includes/header.php");
?>

<!-- supervisor start -->
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-3">
                    <li class="breadcrumb-item text-light" aria-current="page"><h6><i class="fa-solid fa-home ps-2 pt-2"></i> <a class="text-decoration-none text-light" href="index.php">Home</a></h6></li>
                    <li class="breadcrumb-item text-light active" aria-current="page"><i class="fa-solid fa-laptop-code pt-2"></i> Developers</li>
                </ol>
            </nav>
        </div>


        <!-- <div class="d-flex align-items-center">

            <div class="col-md-10">
                <h4 class='text-center text-light fw-bolder pb-3'>Supervisor Information</h4>
                
                <div class="row row-cols-1 row-cols-md-5 g-4 justify-content-evenly">
                    <?php
                        $get_developers = "select * from developers where dev_cat_id='1'";
                        $run_developers = mysqli_query($con,$get_developers);
                    
                        while($row_developers=mysqli_fetch_array($run_developers)){
                            $d_id = $row_developers['dev_id'];
                            $d_name = $row_developers['dev_name'];
                            $d_cat = $row_developers['dev_cat'];
                            $d_img = $row_developers['dev_img'];
                            $d_bio = $row_developers['dev_bio'];
                        
                            echo "
                            <div class='col'>
                                <div class='card bg-dark text-light h-100' style='width: 18rem'>
                                    <img src='dev_img/$d_img' class='card-img-top p-3' style='border-radius: 50%'>
                                    <div class='card-body'>
                                        <h5 class='card-title text-center fw-bolder'>$d_name</h5>
                                        <h6 class='card-title text-center'>$d_cat</h6>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    ?>
                </div> -->
                

            </div>
        </div>

    </div>
</div>
<!-- supervisor end -->


<!-- developers start -->
<div id="content" class="mt-5">
    <div class="container">

        <div class="d-flex">

            <div class="col-md-10">
                <h4 class='text-center text-light fw-bolder pb-3'>Developer Information</h4>
                
                <div class="row row-cols-1 row-cols-md-5 g-4 justify-content-evenly">
                    <?php
                        $get_developers = "select * from developers where dev_cat_id='0'";
                        $run_developers = mysqli_query($con,$get_developers);
                    
                        while($row_developers=mysqli_fetch_array($run_developers)){
                            $d_id = $row_developers['dev_id'];
                            $d_name = $row_developers['dev_name'];
                            $d_cat = $row_developers['dev_cat'];
                            $d_img = $row_developers['dev_img'];
                            $d_bio = $row_developers['dev_bio'];
                        
                            echo "
                            <div class='col'>
                                <div class='card bg-dark text-light h-100' style='width: 18rem'>
                                    <img src='dev_img/$d_img' class='card-img-top p-3'  style='border-radius: 50%'>
                                    <div class='card-body'>
                                        <h5 class='card-title text-center fw-bolder'>$d_name</h5>
                                        <h6 class='card-title text-center'>$d_cat</h6><br>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    ?>
                </div>
                

            </div>
        </div>

    </div>
</div>
<!-- developers end -->

<?php
    include("includes/footer.php");
?>