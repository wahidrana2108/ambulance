<?php
if(isset($_GET['news_id'])){
    include("includes/header.php");

    $b_id = $_GET['news_id'];

    $get_news = "select * from news where news_id='$b_id'";
    $run_news = mysqli_query($con,$get_news);
    while($row_news = mysqli_fetch_array($run_news)){
        $news_title = $row_news['news_title'];
        $news_desc = $row_news['news_desc'];
        $news_img = $row_news['news_img'];
    
        echo "
        <div class='container text-center text-light mt-2'>
            <img src='admin_area/news_img/$news_img' height='300px' width='auto'>
            <h3 class='mt-5'>$news_title</h3>
            <h5 class='mt-3 text-secondary'>$news_desc</h5>
        </div>
        ";
    }
}
?>



<!-- Our latest news with owl carousel start -->
<div class='container mt-5 mb-5'>
    <h3 class='text-center text-light'>Other news</h3>
    <div class='mt-3'>
        <div class='owl-carousel owl-theme'>

            <?php get_news() ?>

        </div>
    </div>
</div>
<!-- Our latest news with owl carousel end -->


<?php
    include("includes/footer.php");
?>