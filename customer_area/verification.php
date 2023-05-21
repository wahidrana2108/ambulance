<?php
    include("includes/db.php");

    if($_GET){
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            if($email == ''){
                unset($email);
            }
        }
        if(isset($_GET['token'])){
            $token = $_GET['token'];
            if($token == ''){
                unset($token);
            }
        }
        
        if(!empty($email) && !empty($token)){
            $get_customers = "select * from customers where customer_email='$email'";
            $run_customers = mysqli_query($con,$get_customers);
            $row = mysqli_fetch_array($run_customers);
            $count_customers = mysqli_num_rows($run_customers);
            if($count_customers == 1){
                $update = "update customers set Confirmation=1, token='' where customer_email='$email'";
                $run_update = mysqli_query($con,$update);
                if($run_update){
                    echo "<script>alert('Email address successfully verified!')</script>";
                    echo "<script>window.location.href='login.php'</script>";
                }
            }
           
        }
    }
?>