<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<?php 
        if(isset($_GET['customer_delete'])){
            $delete_id = $_GET['customer_delete'];
            $customer_delete = "delete from customers where customer_id='$delete_id'";
            $run_delete = mysqli_query($con,$customer_delete);
            if($run_delete){
                echo "<script>alert('customer Deleted Successfully!')</script>";
                echo "<script>window.open('index.php?customer_view','_self')</script>";
            }
        }
?>

<?php } ?>