<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<?php 
        if(isset($_GET['ambulance_delete'])){
            $delete_id = $_GET['ambulance_delete'];
            $ambulance_delete = "delete from ambulance where con_id='$delete_id'";
            $run_delete = mysqli_query($con,$ambulance_delete);
            if($run_delete){
                echo "<script>alert('ambulance Deleted Successfully!')</script>";
                echo "<script>window.open('index.php?ambulance_view','_self')</script>";
            }
        }
?>

<?php } ?>