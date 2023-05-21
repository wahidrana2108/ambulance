<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Add Blog</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- Blog Entry start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New Blog</legend>
            <div class="form-floating mb-3">
                <input name="b_title" type="text" class="form-control" placeholder="Enter Blog Title" required>
                <label>Enter Blog Name</label>
            </div>
            <div class="form-floating">
                <input name="b_desc" type="text" class="form-control" placeholder="Enter Blog Description" required>
                <label>Enter Blog Description</label>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">driver Photo</label>
                <input name="b_img" type="file" class="form-control" required>
            </div>
            <input name="blog_enter" value="Insert Blog" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- Blog Entry end -->

<?php
    if(isset($_POST['blog_enter'])){
        $b_title = $_POST['b_title'];
        $b_desc = $_POST['b_desc'];

        $b_img = $_FILES['b_img']['name'];

        $temp_name = $_FILES['b_img']['tmp_name'];

        move_uploaded_file($temp_name,"blog_img/$b_img");

        $insert_blog = "insert into blogs (blog_title,blog_desc,blog_img,date) values ('$b_title','$b_desc','$b_img',NOW())";
        $run_blog = mysqli_query($con,$insert_blog);

        if($run_blog){
            echo "<script>alert('Blog details added Successfully!')</script>";  
            echo "<script>window.open('index.php?blog_view','_self')</script>";
        }
    }
?>