<h1 class="text-center">LOGIN</h1>
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
    <small class="fw-bolder"><i>Forgot Password? <a href="registration.php">Click here</a></i></small><br>
    <small class="fw-bolder"><i>Don't have an account? <a href="registration.php">Click here</a></i></small>
</form>


<?php 
    if(isset($_POST['login'])){   
        $customer_email = $_POST['c_email'];  
        $customer_pass = $_POST['c_pass'];   
        $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";    
        $run_customer = mysqli_query($con,$select_customer);    
        $get_ip = getRealIpUser();   
        $check_customer = mysqli_num_rows($run_customer);          



        if($check_customer==0){    
            echo "<script>alert('Your email or password is wrong!')</script>";      
            exit();   
        }
        
        else{
            $_SESSION['customer_email']=$customer_email;        
            echo "<script>alert('You are Logged in Successfully!')</script>";          
            echo "<script>window.open('index.php','_self')</script>";
           
        }  
    }
?>