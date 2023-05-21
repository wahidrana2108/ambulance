<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>
<!-- breadcrumb  start -->
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> View category</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->
  <!-- view category start -->
  <div class="card border-primary mt-5 col-md-10">
    <h5 class="card-header text-center text-light"  style="background-color: rgb(82, 127, 250);"><i class="fa-solid fa-categorypaper pe-3"></i></i>Category</h5>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                
                    $get_category = "select * from category";
                    $run_category  = mysqli_query($con,$get_category);

                    while($row_category = mysqli_fetch_array($run_category)){
                        $category_id = $row_category['cat_id'];
                        $category_title = $row_category['cat_title'];
                        $date = $row_category['date'];
                        $i++;
                ?>
                <tr>
                    <td><?php echo $category_id; ?></td>
                    <td><?php echo $category_title; ?></td>
                    <td><a href="index.php?category_edit=<?php echo $category_id; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
                    <td><a href="index.php?category_delete=<?php echo $category_id; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- view category end -->
<?php } ?>