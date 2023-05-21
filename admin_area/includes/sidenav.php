<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<ul class="navbar-nav navbar-dark bg-dark ps-3 pe-3 vh-100">
    <li class="nav-item "><a class="nav-link active text-light" aria-current="page" href="index.php?dashboard"><i class="fa-solid fa-gauge pe-3"></i> Dashboard</a></li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-globe pe-3"></i> ambulance</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?ambulance_entry">Insert ambulance</a></li>
            <li><a class="dropdown-item" href="index.php?ambulance_view">View Countries</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-list pe-3"></i> Category</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?category_entry">Insert Category</a></li>
            <li><a class="dropdown-item" href="index.php?category_view">View Categories</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user pe-3"></i> Driver</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?driver_entry">Insert Driver</a></li>
            <li><a class="dropdown-item" href="index.php?driver_view">View Driver</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-blog pe-3"></i> Blogs</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?blog_entry">Insert Blog</a></li>
            <li><a class="dropdown-item" href="index.php?blog_view">View Blogs</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-newspaper pe-3"></i> News</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?news_entry">Insert News</a></li>
            <li><a class="dropdown-item" href="index.php?news_view">View News</a></li>
        </ul>
    </li>
    <li class="nav-item "><a class="nav-link active text-light" aria-current="page" href="index.php?customer_view"><i class="fa-solid fa-users pe-3"></i> View Customers</a></li>
    <li class="nav-item "><a class="nav-link active text-light" aria-current="page" href="index.php?customer_premium"><i class="fa-solid fa-crown pe-3"></i> Premium Customers</a></li>
    <li class="nav-item mb-5"><a class="nav-link active text-light" aria-current="page" href="logout.php"><i class="fa-solid fa-power-off pe-3"></i> Log Out</a></li>
</ul>

<?php } ?>