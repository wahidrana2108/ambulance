<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> Ambulance Entry</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->

<!-- ambulance Entry start -->
<div class="container  pt-4 d-flex justify-content-center">
    <div class="col-md-6 ">
        <form method="post" enctype="multipart/form-data">
            <legend class="text-center text-light fw-bolder">Add New ambulance</legend>
            <div class="form-floating mb-3">
                <input name="c_title" type="text" class="form-control" placeholder="Enter ambulance Title" required>
                <label>Enter ambulance Name</label>
            </div>
            <div class="form-floating mb-3">
                <input name="c_cup" type="number" class="form-control" placeholder="World Cup Own" required>
                <label> Owned</label>
            </div>
            <div class="form-floating">
                <input name="c_point" type="number" class="form-control" placeholder="Enter Points" required>
                <label>Enter Points</label>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Enter Ambulance Photo</label>
                <input name="c_img" type="file" class="form-control" required>
            </div>
            <input name="submit" value="Insert ambulance" type="submit" class="btn btn-primary form-control">
        </form>
    </div>
</div>
<!-- ambulance Entry end -->

<?php
    if(isset($_POST['submit'])){
        $c_title = $_POST['c_title'];
        $c_cup = $_POST['c_cup'];
        $c_point = $_POST['c_point'];

        $c_img = $_FILES['c_img']['name'];

        $temp_name = $_FILES['c_img']['tmp_name'];

        move_uploaded_file($temp_name,"country_img/$c_img");

        $insert_ambulance = "insert into ambulance (con_name,con_ride,con_point,con_img,date) values ('$c_title','$c_cup','$c_point','$c_img',NOW())";
        $run_ambulance = mysqli_query($con,$insert_ambulance);

        if($run_ambulance){
            echo "<script>alert('ambulance details added Successfully!')</script>";
            echo "<script>window.open('index.php?ambulance_view','_self')</script>";  
        }
    }
?>