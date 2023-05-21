<?php
$active='My Account';
    if(isset($_SESSION['customer_email'])){

        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];
        $customer_pass = $row_customer['customer_pass'];


        echo "    
            <div class='col-md-8 text-light m-auto'>
                <div class='card border-dark m-auto'>
                    <h5 class='card-header text-center' style='background-color: rgb(48, 48, 48);'><i class='fa-solid fa-key pe-3'></i></i>Update Password</h5>
                    <div class='card-body text-start bg-dark'>
                        <form action='my_account.php?update_password' method='post' enctype='multipart/form-data'>

                            <div class='form-group'>

                            <div class='form-group'>
                                <label>Current Password</label>
                                <input type='password' class='form-control' name='old_pass' required>
                            </div>

                            <div class='form-group'>
                                <label>New Password</label>
                                <input type='password' class='form-control' name='new_pass' required>
                            </div>

                            <div class='form-group'>
                                <label>Confirm New Password</label>
                                <input type='password' class='form-control' name='con_new_pass' required>
                            </div>                                  

                            <div class='text-center mt-2'>                                 
                                <button type='submit' name='update_pass' class='btn btn-primary'>Update Password</button>                                  
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            </div>
        ";

        if(isset($_POST['update_pass'])){
            $old_password = $_POST['old_pass'];
            $new_password = $_POST['new_pass'];
            $con_new_password = $_POST['con_new_pass'];
    
    
            if(password_verify($old_password, $customer_pass)){
                if($new_password == $con_new_password){
                    if(password_verify($new_password, $customer_pass)){
                        echo "<script>window.open('my_account.php','self')</script>";
                        echo"<script>alert('Password already in use. Choose a different one!')</script>";
                    }
                    else{
                        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $update_password = "update customers set customer_pass='$new_password_hash' where customer_id='$customer_id'";
                        $update_pass = mysqli_query($con,$update_password);
                        if($update_pass){
                            echo "<script>window.open('my_account.php','self')</script>";
                            echo"<script>alert('Password Updated Successfully!')</script>";
                        }
                    }
                }
                else{
                    echo "<script>window.open('my_account.php','self')</script>";
                    echo"<script>alert('Recheck your password!')</script>";
                }
            }
            else{
                echo "<script>window.open('my_account.php','self')</script>";
                echo"<script>alert('Wrong Password!')</script>";
            }
        }
    }

    
?>

<!-- update password end -->




