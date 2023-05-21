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
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> View Blog</li>
        </ol>
    </nav>
</div>
<!-- breadcrumb  end -->
  <!-- view blog start -->
  <div class="card border-primary mt-5 col-md-10">
    <h5 class="card-header text-center text-light"  style="background-color: rgb(82, 127, 250);"><i class="fa-solid fa-blog pe-3"></i></i>Blogs</h5>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Up Date</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                
                    $get_blog = "select * from blogs";
                    $run_blog  = mysqli_query($con,$get_blog);

                    while($row_blog = mysqli_fetch_array($run_blog)){
                        $blog_id = $row_blog['blog_id'];
                        $blog_title = $row_blog['blog_title'];
                        $blog_desc = $row_blog['blog_desc'];
                        $blog_img = $row_blog['blog_img'];
                        $date = $row_blog['date'];
                        $i++;
                ?>
                <tr>
                    <td><?php echo $blog_id; ?></td>
                    <td><?php echo $blog_title; ?></td>
                    <td><?php echo $blog_desc; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><img src="blog_img/<?php echo $blog_img; ?>" alt="N/A" height="50px" width="50px"></td>
                    <td><a href="index.php?blog_edit=<?php echo $blog_id; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
                    <td><a href="index.php?blog_delete=<?php echo $blog_id; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- view blog end -->
<?php } ?>