<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<?php 
        if(isset($_GET['category_delete'])){
            $delete_id = $_GET['category_delete'];
            $category_delete = "delete from category where cat_id='$delete_id'";
            $run_delete = mysqli_query($con,$category_delete);
            if($run_delete){
                echo "<script>window.open('index.php?category_view','_self')</script>";
                echo "<script>alert('Category Deleted Successfully!')</script>";
            }
        }
?>

<?php } ?>