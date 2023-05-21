<?php
if(isset($_SESSION['customer_email'])){

$customer_session = $_SESSION['customer_email'];
    $get_customer = "select * from customers where customer_email='$customer_session'";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_image = $row_customer['customer_image'];
    $customer_name = $row_customer['customer_name'];
    $customer_email = $row_customer['customer_email'];
    $customer_contact = $row_customer['customer_contact'];
    $customer_ambulance = $row_customer['customer_country'];
    $customer_id = $row_customer['customer_id'];
    $customer_pass = $row_customer['customer_pass'];
    $customer_sub = $row_customer['sub_id'];

    $get_sub =  "select * from subscription where sub_id='$customer_sub'";
    $run_sub = mysqli_query($con,$get_sub);
    $row_sub = mysqli_fetch_array($run_sub);
    $sub_title = $row_sub['sub_title'];

    echo "
    <div class='col-md-8 text-light m-auto'>
        <div class='card border-dark col-md-12 m-auto'>
            <h5 class='card-header text-center text-light' style='background-color: rgb(48, 48, 48);'><i class='fa-solid fa-user pe-3'></i></i>Account Details</h5>
            <div class='card-body text-start bg-dark'>
                <div class='row'>
                    <div class='col-3'><h6>Name:</h6></div>
                    <div class='col-9'><h6>$customer_name</h6></div>
                </div>
                <div class='row'>
                    <div class='col-3'><h6>Email:</h6></div>
                    <div class='col-9'><h6>$customer_email</h6></div>
                </div>
                <div class='row'>
                    <div class='col-3'><h6>Contact:</h6></div>
                    <div class='col-9'><h6>$customer_contact</h6></div>
                </div>
                <div class='row'>
                    <div class='col-3'><h6>Country:</h6></div>
                    <div class='col-9'><h6>$customer_ambulance</h6></div>
                </div><br>
                <div class='row'>
                    <div class='col-3'><h6>subscription:</h6></div>
                    <div class='col-9'><h5><span class='badge rounded-pill text-bg-danger'>$sub_title</span></h5></div>
                </div>
            </div>
        </div>
    </div>
    ";
} 
?>