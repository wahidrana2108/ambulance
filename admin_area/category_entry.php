<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Entry Category</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- category Entry start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New Category</legend>
            <div class="form-floating mb-3">
                <input name="c_title" type="text" class="form-control" placeholder="Enter category Title" required>
                <label>Enter Category Name</label>
            </div>
            <input name="submit" value="Insert category" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- category Entry end -->

<?php
    if(isset($_POST['submit'])){
        $c_title = $_POST['c_title'];

        $insert_category = "insert into category (cat_title,date) values ('$c_title',NOW())";
        $run_category = mysqli_query($con,$insert_category);

        if($run_category){
            echo "<script>alert('category details added Successfully!')</script>";
            echo "<script>window.open('index.php?category_view','_self')</script>";  
        }
    }
?>