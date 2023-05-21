<?php
if(isset($_GET['news_edit'])){
    $edit_id = $_GET['news_edit'];
    $get_n = "select * from news where news_id='$edit_id'";
    $run_edit = mysqli_query($con,$get_n);
    $row_edit = mysqli_fetch_array($run_edit);

    $news_id = $row_edit['news_id'];
    $news_title = $row_edit['news_title'];
    $news_desc = $row_edit['news_desc'];
    $news_img = $row_edit['news_img'];

}
?>

<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Edit News</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- news edit start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New news</legend>
            <div class="form-floating mb-3">
                <input name="n_title" type="text" class="form-control" placeholder="Enter news Title" value="<?php echo $news_title?>" required>
                <label>Enter news Name</label>
            </div>
            <div class="form-floating">
                <textarea name="n_desc" class="form-control" placeholder="Enter news Description" id="" style="height: 100px" value="<?php echo $news_desc?>" required><?php echo $news_desc; ?></textarea>
                <label>Enter news Description</label>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">driver Photo</label>
                <input name="n_img" type="file" class="form-control" required><br>
                <img src="news_img/<?php echo $news_img; ?>" height="50px" width="50px">
            </div>
            <input name="update" value="Update news" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- news edit end -->

<?php
    if(isset($_POST['update'])){
        $n_title = $_POST['n_title'];
        $n_desc = $_POST['n_desc'];

        $n_img = $_FILES['n_img']['name'];

        $temp_name = $_FILES['n_img']['tmp_name'];

        move_uploaded_file($temp_name,"news_img/$n_img");

        $update_news = "update news set news_title='$n_title',news_desc='$n_desc',news_img='$n_img',date=NOW() where news_id='$news_id'";
        $run_update = mysqli_query($con,$update_news);

        if($run_update){
            echo "<script>alert('news details Updated Successfully!')</script>";
            echo "<script>window.open('index.php?news_view','_self')</script>";  
        }
    }
?>