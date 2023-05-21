<?php
    if(isset($_SESSION['customer_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        $con = mysqli_connect("localhost","root","","worldcup_2022");
        if(isset($_GET['delete_account'])){
            $delete_id = $_GET['delete_account'];
            $delete_account = "delete from customers where customer_id='$delete_id'";
            $run_delete = mysqli_query($con,$delete_account);
            if($run_delete){
                echo "<script>window.open('../logout.php','_self')</script>";
                echo "<script>alert('Account Deleted Successfully!')</script>";
            }
        }
    } 
?>