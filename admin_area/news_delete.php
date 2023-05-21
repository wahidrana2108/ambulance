<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<?php 
        if(isset($_GET['news_delete'])){
            $delete_id = $_GET['news_delete'];
            $news_delete = "delete from news where news_id='$delete_id'";
            $run_delete = mysqli_query($con,$news_delete);
            if($run_delete){
                echo "<script>window.open('index.php?news_view','_self')</script>";
                echo "<script>alert('News Deleted Successfully!')</script>";
            }
        }
?>

<?php } ?>