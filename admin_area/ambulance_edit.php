<?php
if(isset($_GET['ambulance_edit'])){
    $edit_id = $_GET['ambulance_edit'];
    $get_c = "select * from ambulance where con_id='$edit_id'";
    $run_edit = mysqli_query($con,$get_c);
    $row_edit = mysqli_fetch_array($run_edit);

    $ambulance_id = $row_edit['con_id'];
    $ambulance_title = $row_edit['con_name'];
    $ambulance_cup = $row_edit['con_ride'];
    $ambulance_point = $row_edit['con_point'];
    $ambulance_img = $row_edit['con_img'];

}
?>

<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Edit ambulance</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- ambulance edit start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New ambulance</legend>
            <div class="form-floating mb-3">
                <input name="c_title" type="text" class="form-control" placeholder="Enter ambulance Title" value="<?php echo $ambulance_title;?>" required>
                <label>Enter ambulance Name</label>
            </div>
            <div class="form-floating mb-3">
                <input name="c_cup" type="number" class="form-control" placeholder="World Cup Own" value="<?php echo $ambulance_cup;?>" required>
                <label> Owned</label>
            </div>
            <div class="form-floating">
                <input name="c_point" type="number" class="form-control" placeholder="Enter Points" value="<?php echo $ambulance_point;?>" required>
                <label>Enter Points</label>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Enter Flag Photo</label>
                <input name="c_img" type="file" class="form-control" required><br>
                <img src="ambulance_img/<?php echo $ambulance_img; ?>" height="50px" width="50px">
            </div>
            <input name="update" value="Update ambulance" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- ambulance edit end -->

<?php
    if(isset($_POST['update'])){
        $c_title = $_POST['c_title'];
        $c_cup = $_POST['c_cup'];
        $c_point = $_POST['c_point'];

        $c_img = $_FILES['c_img']['name'];

        $temp_name = $_FILES['c_img']['tmp_name'];

        move_uploaded_file($temp_name,"ambulance_img/$c_img");

        $update_ambulance = "update ambulance set con_name='$c_title',con_ride='$c_cup',con_point='$c_point',con_img='$c_img',date=NOW() where con_id='$ambulance_id'";
        $run_update = mysqli_query($con,$update_ambulance);

        if($run_update){
            echo "<script>alert('ambulance details Updated Successfully!')</script>";
            echo "<script>window.open('index.php?ambulance_view','_self')</script>";  
        }
    }
?>