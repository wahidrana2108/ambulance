<?php
$active='My Account';
    if(isset($_SESSION['customer_email'])){

        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_name = $row_customer['customer_name'];
        $customer_contact = $row_customer['customer_contact'];
        $customer_country = $row_customer['customer_country'];
        $customer_id = $row_customer['customer_id'];


        echo "    
            <div class='col-md-8 text-light m-auto'>
                <div class='card border-dark m-auto'>
                    <h5 class='card-header text-center' style='background-color: rgb(48, 48, 48);'><i class='fa-solid fa-pen-to-square pe-3'></i></i>Update Profile</h5>
                    <div class='card-body text-start bg-dark'>
                        <form action='my_account.php?edit_account' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>        
                                <label>Full Name</label>       
                                <input type='text' class='form-control' name='c_name' value='$customer_name' required>
                            </div>   

                            <div class='form-group'>       
                                <label>Your Contract</label>       
                                <input type='number' class='form-control' name='c_contact' value='$customer_contact' required>       
                            </div>        
        
                            <div class='form-group'>       
                                <label>Select ambulance</label>       
                                <input type='text' class='form-control' name='c_ambulance' value='$customer_ambulance' required>       
                            </div>
        
        
                            <div class='text-center mt-2'>       
                                <button type='submit' name='update_info' class='btn btn-primary'>Update info</button>       
                            </div>
        
                        </form>
                    </div>
                </div>
            </div>
            </div>
        ";
        
        if(isset($_POST['update_info'])){
            $c_name = $_POST['c_name'];
            $c_contact = $_POST['c_contact'];
            $c_ambulance = $_POST['c_ambulance'];

            $update_details = "update customers set customer_name='$c_name',customer_contact='$c_contact',customer_country='$c_ambulance' where customer_id='$customer_id'";
            $run_update = mysqli_query($con,$update_details);
            if($run_update){
                echo"<script>alert('Information Updated Successfully!')</script>";
                echo"<script>window.open('my_account.php?view_account','_self')</script>";
            }
        }
            
    }

    
?>
