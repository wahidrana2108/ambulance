<!-- delete account start -->
<?php
if(isset($_SESSION['customer_email'])){

    $customer_session = $_SESSION['customer_email'];
    $get_customer = "select * from customers where customer_email='$customer_session'";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    $customer_sub = $row_customer['sub_id'];

    echo "
        <div class='col-md-8 text-light m-auto'>
            <div class='card border-dark m-auto'>
                <h5 class='card-header text-success text-center' style='background-color: rgb(48, 48, 48);'><i class='fa-solid fa-check pe-3'></i></i> Be a VIP Member</h5>
                <form action='my_account.php?become_vip' method='post' enctype='multipart/form-data'>
                    <div class='card-body text-start bg-dark'>
                        <h6 class='fw-bolder'>Proceed to Payment?</h6> <br>                                    
                            Pay 100$ to Become a VIP member. <br>
                        <button class='btn btn-success mt-3' type='submit' name='payment'><i class='fa-solid fa-money-bill'></i> Confirm Payment</button> 
                    </div>
                </form>
            </div>
        </div>
    ";
    if(isset($_POST['payment'])){
        $up = 2;
        $update_sub = "update customers set sub_id='$up' where customer_id='$customer_id'";
        $run_up = mysqli_query($con,$update_sub);
        if($customer_sub < 2){
            if($run_up){
                echo"<script>alert('Congratulation! Now You are VIP...')</script>";
                echo"<script>window.open('my_account.php?view_account','_self')</script>";
            }
        }
        else{
            echo"<script>alert('You are already Subscribed!')</script>";
            echo"<script>window.open('my_account.php?view_account','_self')</script>";
        }
    }
} 
    ?>
<!-- delete account end -->


        
