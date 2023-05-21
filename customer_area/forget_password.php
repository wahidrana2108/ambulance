<!-- navbar start -->
<?php
    include("includes/header.php");
?>
<!-- navbar end -->


<!-- customer register start -->
<div id="content" class="mt-3">
    <div class="container">
        <div class="col-md-12">
            <!-- breadcrumb  start -->
            <div class="col-md-12 text-light mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-home ps-2 pt-2"></i> Home</h6></li>
                        <li class="breadcrumb-item text-light active" aria-current="page"><i class="fa-solid fa-person-circle-question pt-2"></i> Password Recovery</li>
                    </ol>
                </nav>
            </div>
            <!-- breadcrumb  end -->
        </div>

        <div class="col-md-9 m-auto">
            <div class="card bg-dark text-light">
                <?php
                    include("includes/forget_password.php");
                ?>
            </div>
        </div>
    </div>
</div>
<!-- customer register end -->


<?php
    include("includes/footer.php");
?>