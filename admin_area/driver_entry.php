<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Driver Entry</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->


<!-- driver Entry start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New driver</legend>
            <div class="form-floating mb-3">
                <input name="p_name" type="text" class="form-control" placeholder="Enter Product Title" required>
                <label for="">Enter Driver Name</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_age" type="number" class="form-control" placeholder="Enter Age" required>
                <label for="">Enter Age</label>
            </div>
            <div class="form-floating mb-3">
                <select name="p_con" class="form-select" required>
                    <option selected disabled>Select ambulance</option>
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
                    <option selected disabled>Select category</option>
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
                <label for="">Select category</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_height" type="number" class="form-control" placeholder="Enter Height(cm)" required>
                <label for="">Enter Nid No</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_weight" type="number" class="form-control" placeholder="Enter Weight(kg)" required>
                <label for="">Phone No</label>
            </div>
            <div class="form-floating mb-3">
                <input name="p_rating" type="number" min="0" max="2000" step="1" pattern="^[-/d]/d*$" class="form-control" placeholder="Enter Rating" required>
                <label for="">Enter Points</label>
            </div>
            <div class="mb-3">
                <label for="" class="form-label text-light">Driver Photo</label>
                <input name="p_img" type="file" class="form-control" required>
            </div>
            <input name="submit" value="Insert driver" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- driver Entry end -->

<?php
    if(isset($_POST['submit'])){
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

        $insert_driver = "insert into driver (con_id,cat_id,date,driver_name,driver_age,driver_height,driver_weight,driver_rating,driver_img) values ('$p_con','$p_cat',NOW(),'$p_name','$p_age','$p_height','$p_weight','$p_rating','$p_img')";
        $run_driver = mysqli_query($con,$insert_driver);

        if($run_driver){
            echo "<script>alert('driver details added Successfully!')</script>";
            echo "<script>window.open('index.php?driver_view','_self')</script>";  
        }
    }
?>