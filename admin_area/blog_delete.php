<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<?php 
        if(isset($_GET['blog_delete'])){
            $delete_id = $_GET['blog_delete'];
            $blog_delete = "delete from blogs where blog_id='$delete_id'";
            $run_delete = mysqli_query($con,$blog_delete);
            if($run_delete){
                echo "<script>alert('Blog Deleted Successfully!')</script>";
                echo "<script>window.open('index.php?blog_view','_self')</script>";
            }
        }
?>

<?php } ?>