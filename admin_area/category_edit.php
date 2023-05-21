<?php
if(isset($_GET['category_edit'])){
    $edit_id = $_GET['category_edit'];
    $get_cat = "select * from category where cat_id='$edit_id'";
    $cat_edit = mysqli_query($con,$get_cat);
    $row_edit = mysqli_fetch_array($cat_edit);

    $category_id = $row_edit['cat_id'];
    $category_title = $row_edit['cat_title'];

}
?>

<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Edit category</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- category edit start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New category</legend>
            <div class="form-floating mb-3">
                <input name="cat_title" type="text" class="form-control" placeholder="Enter category Title" value="<?php echo $category_title?>" required>
                <label>Enter category Name</label>
            </div>
            <input name="update" value="Update category" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- category edit end -->

<?php
    if(isset($_POST['update'])){
        $cat_title = $_POST['cat_title'];

        $update_category = "update category set cat_title='$cat_title',date=NOW() where cat_id='$category_id'";
        $run_cat_update = mysqli_query($con,$update_category);

        if($run_cat_update){
            echo "<script>alert('Category details Updated Successfully!')</script>";
            echo "<script>window.open('index.php?category_view','_self')</script>";  
        }
    }
?>