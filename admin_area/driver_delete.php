<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<?php 
        if(isset($_GET['driver_delete'])){
            $delete_id = $_GET['driver_delete'];
            $driver_delete = "delete from driver where driver_id='$delete_id'";
            $run_delete = mysqli_query($con,$driver_delete);
            if($run_delete){
                echo "<script>alert('driver Deleted Successfully!')</script>";
                echo "<script>window.open('index.php?driver_view','_self')</script>";
            }
        }
?>

<?php } ?>