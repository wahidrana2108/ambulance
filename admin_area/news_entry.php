<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Entry News</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- news Entry start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New News</legend>
            <div class="form-floating mb-3">
                <input name="n_title" type="text" class="form-control" placeholder="Enter news Title" required>
                <label>Enter News Name</label>
            </div>
            <div class="form-floating">
                <input name="n_desc" type="text" class="form-control" placeholder="Enter news Description" required>
                <label>Enter News Description</label>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">News Photo</label>
                <input name="n_img" type="file" class="form-control" required>
            </div>
            <input name="submit" value="Insert News" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- news Entry end -->

<?php
    if(isset($_POST['submit'])){
        $n_title = $_POST['n_title'];
        $n_desc = $_POST['n_desc'];

        $n_img = $_FILES['n_img']['name'];

        $temp_name = $_FILES['n_img']['tmp_name'];

        move_uploaded_file($temp_name,"news_img/$n_img");

        $insert_news = "insert into news (news_title,news_desc,news_img,date) values ('$n_title','$n_desc','$n_img',NOW())";
        $run_news = mysqli_query($con,$insert_news);

        if($run_news){
            echo "<script>alert('News details added Successfully!')</script>";
            echo "<script>window.open('index.php?news_view','_self')</script>";  
        }
    }
?>