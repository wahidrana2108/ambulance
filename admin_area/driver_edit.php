<?php
if(isset($_GET['driver_edit'])){
    $edit_id = $_GET['driver_edit'];
    $get_p = "select * from driver where driver_id='$edit_id'";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);

    $driver_id = $row_edit['driver_id'];
    $driver_name = $row_edit['driver_name'];
    $con_id = $row_edit['con_id'];
    $cat_id = $row_edit['cat_id'];
    $driver_height = $row_edit['driver_height'];
    $driver_weight = $row_edit['driver_weight'];
    $driver_age = $row_edit['driver_age'];
    $driver_rating = $row_edit['driver_rating'];
    $driver_img = $row_edit['driver_img'];
}
$get_cat = "select * from category where cat_id='$cat_id'";
$run_cat = mysqli_query($con,$get_cat);
$row_cat = mysqli_fetch_array($run_cat);
$cat_title = $row_cat['cat_title'];
$category_id = $row_cat['cat_id'];


$get_con = "select * from ambulance where con_id='$con_id'";
$run_con = mysqli_query($con,$get_con);
$row_con = mysqli_fetch_array($run_con);
$con_title = $row_con['con_name'];

?>
<!-- driver Entry start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New driver</legend>
            <div class="form-floating mb-3">
                <input name="p_name" type="text" class="form-control" placeholder="Enter Product Title" value="<?php echo $driver_name; ?>" required>
                <label for="">Enter driver Name</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_age" type="number" class="form-control" placeholder="Enter Age" value="<?php echo $driver_age; ?>" required>
                <label for="">Enter Age</label>
            </div>
            <div class="form-floating mb-3">
                <select name="p_con" class="form-select" required>
                    <option selected value="<?php echo $con_id; ?>" disabled><?php echo $con_title; ?></option>
                    <?php
                        $get_con = "select * from ambulance";
                        $run_con = mysqli_query($con,$get_con);

                        while ($row_con = mysqli_fetch_array($run_con)){
                            $con_id = $row_con['con_id'];
                            $con_name = $row_con['con_name'];

                            echo "
                                <option value='$con_id'> $con_name</option>
                            ";
                        }
                    ?>
                </select>
                <label for="">Select ambulance</label>
            </div>
            <div class="form-floating mb-3">
                <select name="p_cat" class="form-select" required>
                    <option selected value="<?php echo $category_id; ?>" disabled><?php echo $cat_title; ?></option>
                    <?php
                        $get_cat = "select * from category";
                        $run_cat = mysqli_query($con,$get_cat);

                        while ($row_cat = mysqli_fetch_array($run_cat)){
                            $cat_id = $row_cat['cat_id'];
                            $cat_title = $row_cat['cat_title'];

                            echo "
                                <option value='$cat_id'> $cat_title</option>
                            ";
                        }
                    ?>
                </select>
                <label for="">Preferred Position</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_height" type="number" min="0" max="210" step="1" pattern="^[-/d]/d*$" class="form-control" placeholder="Enter Height" value="<?php echo $driver_height; ?>" required>
                <label for="">Enter Height</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_weight" type="number" min="0" max="210" step="1" pattern="^[-/d]/d*$" class="form-control" placeholder="Enter Weight" value="<?php echo $driver_weight; ?>" required>
                <label for="">Enter Weight</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_rating" type="number" min="0" max="2000" step="1" pattern="^[-/d]/d*$" class="form-control" placeholder="Enter Rating" value="<?php echo $driver_rating; ?>" required>
                <label for="">Enter Points</label>
            </div>
            <div class="mb-3">
                <label for="" class="form-label text-light">driver Photo</label>
                <input name="p_img" type="file" class="form-control" aria-describedby="" required><br>
                <img src="driver_img/<?php echo $driver_img; ?>" height="50px" width="50px">
            </div>
            <input name="update" value="Insert driver" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- driver Entry end -->

<?php
    if(isset($_POST['update'])){
        $p_id = $$_POST['driver_id'];
        $p_name = $_POST['p_name'];
        $p_age = $_POST['p_age'];
        $p_con = $_POST['p_con'];
        $p_cat = $_POST['p_cat'];
        $p_height = $_POST['p_height'];
        $p_weight = $_POST['p_weight'];
        $p_rating = $_POST['p_rating'];

        $p_img = $_FILES['p_img']['name'];

        $temp_name = $_FILES['p_img']['tmp_name'];

        move_uploaded_file($temp_name,"driver_img/$p_img");

        $update_driver = "update driver set con_id='$p_con',cat_id='$p_cat',date='Now()',driver_name='$p_name',driver_age='$p_age',driver_height='$p_height',driver_weight='$p_weight',driver_rating='$p_rating',driver_img='$p_img' where driver_id='$driver_id'";
        $run_update = mysqli_query($con,$update_driver);

        if($run_update){
            echo "<script>alert('driver details Updated Successfully!')</script>";
            echo "<script>window.open('index.php?driver_view','_self')</script>";  
        }
    }
?>