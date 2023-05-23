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


    $get_ambulance = "select * from booking where customer_id = $customer_id";
    $run_ambulance  = mysqli_query($con, $get_ambulance);
    $row_ambulance = mysqli_fetch_array($run_ambulance);
    


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
    </div><br>
    ";

    if($row_ambulance == NULL){
        echo "
        <div class='col-md-8 text-light m-auto'>
        <div class='card border-dark col-md-12 m-auto'>
            <h5 class='card-header text-center text-light' style='background-color: rgb(48, 48, 48);'><i class='fa-solid fa-book pe-3'></i></i>Booking Details</h5>
            <div class='card-body text-start bg-dark'>               
                <div class='row'>
                    <div'><h6>No Ambulance booked</h6></div>
                </div>
            </div>
        </div>
    </div>";
    }
    else{
        $booked_ambulance = $row_ambulance['ambulance_id'];
        $date = $row_ambulance['date'];


        $get_details = "select * from ambulance where con_id = $booked_ambulance";
        $run_details = mysqli_query($con, $get_details);
        $row_details = mysqli_fetch_array($run_details);
        $ambulance_name = $row_details['con_name'];

        echo "
        <div class='col-md-8 text-light m-auto'>
        <div class='card border-dark col-md-12 m-auto'>
            <h5 class='card-header text-center text-light' style='background-color: rgb(48, 48, 48);'><i class='fa-solid fa-book pe-3'></i></i>Booking Details</h5>
            <div class='card-body text-start bg-dark'>               
                <div class='row'>
                    <div class='col-6'><h6>Ambulance ID:</h6></div>
                    <div class='col-6'><h6>$booked_ambulance</h6></div>
                </div>
                <div class='row'>
                    <div class='col-6'><h6>Ambulance Name:</h6></div>
                    <div class='col-6'><h6>$ambulance_name</h6></div>
                </div>
                <div class='row'>
                    <div class='col-6'><h6>Booking Time:</h6></div>
                    <div class='col-6'><h6>$date</h6></div>
                </div>
            </div>
        </div>
    </div>";
    }
} 
?>