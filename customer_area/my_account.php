<?php
$active='My Account';
    
include('includes/header.php');
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } 

    else{
      
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


      echo "      
            <div class='container pt-5'>
                <div class='row'>
                    <div class='col-sm-12 col-md-2 pb-5'>
                        <ul class='navbar-nav navbar-dark bg-dark ps-3 pe-3'>
                            <li class='nav-item text-center text-light pb-3'>
                                <img src='customer_images/$customer_image' class='mb-3' height='100px' width='100px' style='border-radius:50%'>
                                <h4>$customer_name</h4>
                            </li>
                            <li class='nav-item '><a class='nav-link active text-light' aria-current='page' href='my_account.php?view_account'><i class='fa-sharp fa-solid fa-eye'></i> View Details</a></li>
                            <li class='nav-item '><a class='nav-link active text-light' aria-current='page' href='my_account.php?edit_account'><i class='fa-solid fa-pen-to-square pe-3'></i> Edit Account</a></li>
                            <li class='nav-item '><a class='nav-link active text-light' aria-current='page' href='my_account.php?update_password'><i class='fa-solid fa-key pe-3'></i> Edit Password</a></li>
                            <li class='nav-item '><a class='nav-link active text-light' aria-current='page' href='my_account.php?vip_facility'><i class='fa-solid fa-snowflake pe-3'></i> VIP Facility</a></li>
                            <li class='nav-item '><a class='nav-link active text-light' aria-current='page' href='my_account.php?become_vip'><i class='fa-solid fa-check pe-3'></i> Become A VIP</a></li>
                            <li class='nav-item '><a class='nav-link active text-light' aria-current='page' href='my_account.php?delete_account'><i class='fa-solid fa-trash pe-3'></i> Delete Account</a></li>
                        </ul>
                    </div>
                    <div class='col-sm-12 col-md-10'>
        ";  
                        if(isset($_GET['view_account'])){
                            include("view_account.php");
                        }
                        if(isset($_GET['edit_account'])){
                            include("edit_account.php");
                        }
                        if(isset($_GET['update_password'])){
                            include("update_password.php");
                        }
                        if(isset($_GET['delete_account'])){
                            include("delete_account.php");
                        }
                        if(isset($_GET['vip_facility'])){
                            include("vip_facility.php");
                        }
                        if(isset($_GET['become_vip'])){
                            include("become_vip.php");
                        }

        echo "
                    </div>
                </div>
            </div>
      ";
    }

?>

        






<?php include('includes/footer.php'); ?>