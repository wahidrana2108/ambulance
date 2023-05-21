<?php
    $active='drivers';
    include("includes/header.php");
?>
<div class="container">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-3">
                <li class="breadcrumb-item text-light" aria-current="page"><h6><i class="fa-solid fa-home ps-2 pt-2"></i> <a class="text-decoration-none text-light" href="index.php">Home</a></h6></li>
                <li class="breadcrumb-item text-light active" aria-current="page"><i class="fa-solid fa-user pt-2"></i> driver Profile</li>
            </ol>
        </nav>
    </div>
</div>
    

<?php include("includes/player_profile.php") ?>


<?php
    include("includes/footer.php");
?>