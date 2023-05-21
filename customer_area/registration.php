<?php
    $active='Live Score';
    include("includes/header.php");
?>

<!-- customer register start -->
<div id='content' class='mt-3'>
    <div class='container'>
        <div class='col-md-12'>
            <!-- breadcrumb  start -->
            <div class='col-md-12 mt-3'>
                <nav aria-label='breadcrumb'>
                    <ol class='breadcrumb'>
                        <li class='breadcrumb-item text-light' aria-current='page'><h6><i class='fa-solid fa-home ps-2 pt-2'></i> Home</h6></li>
                        <li class='breadcrumb-item text-light active' aria-current='page'><i class='fa-solid fa-address-card pt-2'></i> Registration</li>
                    </ol>
                </nav>
            </div>
            <!-- breadcrumb  end -->
        </div>
        
        <div class='col-md-9 m-auto'>
            <div class='card border-dark bg-dark text-light'>
                <h1 class='card-header text-center' style='background-color: rgb(48, 48, 48);'>Register a new account</h1>
                <div class='card-body text-start bg-dark'>
                    <form action='registration.php' method='post' enctype='multipart/form-data'>

                        <div class='form-group'>

                            <label>Full Name</label>

                            <input type='text' class='form-control' name='c_name' required>

                        </div>

                        <div class='form-group'>

                            <label>Email Address</label>

                            <input type='email' class='form-control' name='c_email' required>

                        </div>

                        <div class='form-group'>

                            <label>Enter Password</label>

                            <input type='password' class='form-control' name='n_pass' required>

                        </div>

                        <div class='form-group'>

                            <label>Confirm Password</label>

                            <input type='password' class='form-control' name='c_n_pass' required>

                        </div>


                        <div class='form-group'>

                            <label>Select ambulance</label>

                            <input type='text' class='form-control' name='c_ambulance' required>

                        </div>

                        
                        <div class='form-group'>

                            <label>Your Contract</label>

                            <input type='number' class='form-control' name='c_contact' required>

                        </div>

                        <div class='form-group pt-2'>

                            <label>Your Recent Photo</label>

                            <input type='file' class='form-control' name='c_image' required>

                        </div>


                        <div class='text-center mt-2'>

                            <button type='submit' name='register' class='btn btn-primary'>Register</button>

                        </div>
                        <small class="fw-bolder"><i>Already an account? <a href="login.php">Click here</a></i></small>

                    </form>
                </div>

            </div>
        </div>
    </div>
  </div>
  <!-- customer register end -->

<?php include("includes/footer.php"); ?>


<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);


    if(isset($_POST['register'])){
        $c_pass = $_POST['n_pass'];
        $c_n_pass = $_POST['c_n_pass'];
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_ambulance = $_POST['c_ambulance'];
        $c_contact = $_POST['c_contact'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];

        $get_customers = "select * from customers where customer_email = '$c_email'";
        $run_customers = mysqli_query($con,$get_customers);
        $count_customers = mysqli_num_rows($run_customers);

        if($count_customers > 0){
            echo "<script>alert('This Email is already exists!')</script>";
            echo "<script>window.location.href='registration.php'</script>";

        }
        else{
            if($c_pass == $c_n_pass){
                $c_pass_hash =  password_hash($c_pass, PASSWORD_DEFAULT);
    
                $c_ip = getRealIpUser();
        
                move_uploaded_file($c_image_tmp,"customer_images/$c_image");
        
        
                function getToken($len=32){
                    return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
                }
                $token = getToken(10);
        
        
        
                $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_ambulance,customer_contact,customer_image,token,customer_ip) values ('$c_name','$c_email','$c_pass_hash','$c_ambulance','$c_contact','$c_image','$token','$c_ip')";
                $run_customer = mysqli_query($con,$insert_customer);
        
        
                try {
        
                    $send_to = $_POST['c_email'];
        
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'jacquelinechavezkh@gmail.com';                     
                    $mail->Password   = 'zdkjoetzibaegiaa';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;                                    
                  
        
                    $mail->setFrom('jacquelinechavezkh@gmail.com', 'Email Confirmation');
                    $mail->addAddress($send_to);     
                  
                  
        
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Account Activation';
                    $mail->Body    = 'click the link to activate you account. <a href="http://localhost/Ambulance__2022/customer_area/verification.php?email=' . $send_to . '&token=' . $token . '"> Click here</a>';
                  
                    $mail->send();
                    $output =  'Message has been sent';
                } 
                catch (Exception $e) {
                    $output =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
        
        
                if($insert_customer){
                    echo "<script>alert('Confirmation link sent to your email. Confirm email to login!')</script>";
                    echo "<script>window.location.href='login.php'</script>";
                }
            }
            else{
                echo "<script>alert('Recheck Password!')</script>";
                echo "<script>window.location.href='registration.php'</script>";
            }
        }
    }
?>