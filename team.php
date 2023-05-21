<?php
    $active='Teams';
    include("includes/header.php");
?>
    <!-- product start -->
    <div class="container">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pt-3">
                    <li class="breadcrumb-item text-light" aria-current="page"><h6><i class="fa-solid fa-home ps-2 pt-2"></i> <a class="text-decoration-none text-light" href="index.php">Home</a></h6></li>
                    <li class="breadcrumb-item text-light active" aria-current="page"><i class="fa-solid fa-car pt-2"></i> Ambulance</li>
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
                <div class="col-md-12">
                    <div class="card border-dark col-md-12 m-auto">
                        <h5 class="card-header text-center text-light" style="background-color: rgb(48, 48, 48);"><i class="fa-solid fa-list pe-3"></i></i>Ambulance List</h5>
                        <div class="card-body  bg-dark">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-light">#Serial</th>
                                        <th class="text-light">Photo</th>
                                        <th class="text-light">Name</th>
                                        <th class="text-light">Category</th>
                                        <th class="text-light">Total Ride</th>
                                        <th class="text-light">View Drivers</th>
                                        <th class="text-light">Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include("includes/team.php");
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
                    <?php 
                        driverCategory();
                    ?>
                </div>

            </div>
        </div>
    </div>
    <!-- product end -->
<?php
    include("includes/footer.php");
?>