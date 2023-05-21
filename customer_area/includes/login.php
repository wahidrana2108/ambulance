<h1 class='card-header text-center' style='background-color: rgb(48, 48, 48);'>LOGIN</h1>
<div class='card-body text-start bg-dark'>
    <form action="login.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" name="c_email" required>
        </div>
        <div class="form-group">
            <label>Enter Password</label>
            <input type="password" class="form-control" name="c_pass" required>
        </div>
        <div class="text-center mt-2">
            <button type="submit" name="login" value="login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
        </div>
        <small class="fw-bolder"><i>Forgot Password? <a href="forget_password.php">Click here</a></i></small><br>
        <small class="fw-bolder"><i>Don't have an account? <a href="registration.php">Click here</a></i></small>
    </form>
</div>



<?php 
    if(isset($_POST['login'])){   
        $customer_email = $_POST['c_email'];  
        $customer_pass = $_POST['c_pass'];   
        $select_customer = "select * from customers where customer_email='$customer_email'";
        $run_customer = mysqli_query($con,$select_customer);
        $count_customer = mysqli_num_rows($run_customer);


        if($count_customer == 1){

            $row_customer = mysqli_fetch_array($run_customer);
            
            $cus_email = $row_customer['customer_email'];
            $cus_pass = $row_customer['customer_pass'];
            $verified = $row_customer['confirmation'];

            $get_ip = getRealIpUser();

            if(password_verify($customer_pass, $cus_pass)){

                if($verified == 1){
                    $_SESSION['customer_email']=$customer_email;        
                    echo "<script>alert('You are Logged in Successfully!')</script>";          
                    echo "<script>window.open('../index.php','_self')</script>";
                }
                else{
                    echo "<script>alert('Verify your email first!')</script>";          
                    echo "<script>window.open('login.php','_self')</script>";
                }
               
            }
            else{
                echo "<script>alert('Your email or password is wrong!')</script>";      
                exit();   
            }
        } 
    }
?>
