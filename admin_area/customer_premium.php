<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

  <!-- breadcrumb  start -->
    <div class="col-md-12 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><h6><i class="fa-solid fa-gauge ps-2 pt-2"></i> Dashboard</h6></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-pen pt-2"></i> View customer</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb  end -->
  <!-- view customer start -->
  <div class="card border-primary mt-5 col-md-10">
    <h5 class="card-header text-center text-light"  style="background-color: rgb(82, 127, 250);"><i class="fa-solid fa-crown pe-3"></i></i>Premium Customers</h5>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">ambulance</th>
                    <th scope="col">Subscription</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                
                    $get_customer= "select * from customers where sub_id='2'";
                    $run_customer = mysqli_query($con,$get_customer);

                    while($row_customer= mysqli_fetch_array($run_customer)){
                        $customer_id = $row_customer['customer_id'];
                        $customer_name = $row_customer['customer_name'];
                        $customer_email = $row_customer['customer_email'];
                        $customer_country = $row_customer['customer_country'];
                        $customer_contact = $row_customer['customer_contact'];
                        $customer_image = $row_customer['customer_image'];
                        $sub_id = $row_customer['sub_id'];
                        
                        $get_sub =  "select * from subscription where sub_id='$sub_id'";
                        $run_sub = mysqli_query($con,$get_sub);
                        $row_sub = mysqli_fetch_array($run_sub);
                        $sub_title = $row_sub['sub_title'];

                        
                        $i++;
                ?>
                <tr>
                    <td><?php echo $customer_id; ?></td>
                    <td><img src="../customer_area/customer_images/<?php echo $customer_image; ?>" alt="N/A" height="50px" width="50px"></td>
                    <td><?php echo $customer_name; ?></td>
                    <td><?php echo $customer_email; ?></td>
                    <td><?php echo $customer_contact; ?></td>
                    <td><?php echo $customer_country; ?></td>
                    <td><?php echo $sub_title; ?></td>
                    <td><a href="index.php?customer_delete=<?php echo $customer_id; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- view customer end -->
<?php } ?>