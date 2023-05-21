<h1 class='card-header text-center' style='background-color: rgb(48, 48, 48);'>Recover Password</h1>
<div class='card-body text-start bg-dark'>
    <form action="forget_password.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" name="c_email" required>
        </div>
        <div class="form-group">
            <label>Contact No</label>
            <input type="text" class="form-control" name="c_contact" required>
        </div>
        <div class="form-group">
            <label>Enter New Password</label>
            <input type="password" class="form-control" name="n_password" required>
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" class="form-control" name="c_n_password" required>
        </div>
        <div class="text-center mt-2">
            <button type="submit" name="update_pass" value="login" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Submit</button>
        </div>
        <small class="fw-bolder"><i>Back to Login <a href="login.php">Click here</a></i></small><br>
        <small class="fw-bolder"><i>Don't have an account? <a href="registration.php">Click here</a></i></small>
    </form>
</div>


<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);



    if(isset($_POST['update_pass'])){   
        $c_email = $_POST['c_email'];  
        $c_contact = $_POST['c_contact'];
        $new_pass = $_POST['n_password'];
        $new_pass2 = $_POST['c_n_password'];
 
        


        function getToken($len=32){
            return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
        }
        $token = getToken(10);

          
        $select_customer = "select * from customers where customer_email='$c_email' AND customer_contact='$c_contact'";    
        $run_customer = mysqli_query($con,$select_customer);
        $check_customer = mysqli_num_rows($run_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id']; 

        $get_ip = getRealIpUser();

        if($new_pass == $new_pass2){

            $password = password_hash($new_pass, PASSWORD_DEFAULT);

            if($check_customer==0){
                echo "<script>alert('No User Found!')</script>"; 
                echo "<script>window.open('forget_password.php','_self')</script>"; 
            }
            else{

                $update_token = "update customers set token='$token' where customer_id='$customer_id'";
                $run_token = mysqli_query($con,$update_token);

                try {

                    $send_to = $_POST['c_email'];
        
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'jacquelinechavezkh@gmail.com';                     
                    $mail->Password   = 'ukpayhhdiothrlhs';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;                                    
                  
        
                    $mail->setFrom('jacquelinechavezkh@gmail.com', 'Password Reset');
                    $mail->addAddress($send_to);     
                  
                  
        
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Request for password reset';
                    $mail->Body = 'click the link to recover your password. <a href="http://localhost/Ambulance__2022/customer_area/update.php?email=' . $send_to . '&token=' . $token . '&hash=' . $password . '"> Click here</a>';
                  
                    $mail->send();
                    $output =  'Message has been sent';
                } 
                catch (Exception $e) {
                    $output =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                if($run_token){
                    echo "<script>alert('Link for update Password sent to your email!')</script>";
                    echo "<script>window.location.href='registration.php'</script>";
                }

            }
        }
        else{
            echo "<script>alert('Recheck Password!')</script>";
        }
    }
?>
