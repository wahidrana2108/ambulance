<?php
if(isset($_GET['blog_id'])){
    include("includes/header.php");

    $b_id = $_GET['blog_id'];

    $get_blog = "select * from blogs where blog_id='$b_id'";
    $run_blog = mysqli_query($con,$get_blog);
    while($row_blog = mysqli_fetch_array($run_blog)){
        $blog_title = $row_blog['blog_title'];
        $blog_desc = $row_blog['blog_desc'];
        $blog_img = $row_blog['blog_img'];
    
        echo "
        <div class='container text-center text-light mt-2'>
            <img src='admin_area/blog_img/$blog_img' height='300px' width='auto'>
            <h3 class='mt-5'>$blog_title</h3>
            <h5 class='mt-3 text-secondary'>$blog_desc</h5>
        </div>
        ";
    }
}
?>



<!-- Our latest blogs with owl carousel start -->
<div class='container mt-5 mb-5'>
    <h3 class='text-center text-light'>Other Blogs</h3>
    <div class='mt-3'>
        <div class='owl-carousel owl-theme'>

            <?php get_blog() ?>

        </div>
    </div>
</div>
<!-- Our latest blogs with owl carousel end -->


<?php
    include("includes/footer.php");
?>