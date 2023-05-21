<?php
$get_ambulance = "select * from ambulance";
$run_ambulance = mysqli_query($con,$get_ambulance);
while($row_ambulance = mysqli_fetch_array($run_ambulance)){
    $con_id = $row_ambulance['con_id'];
    $con_title = $row_ambulance['con_name'];
    $con_ride = $row_ambulance['con_ride'];
    $con_point = $row_ambulance['con_point'];
    $con_img = $row_ambulance['con_img'];

    $get_cat = "select * from category";
    $run_cat = mysqli_query($con,$get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];
    echo "
        <form action='team.php?add_cart=$con_id' method='post'>
            <tr>
                <th class='text-light'>#$con_id</th>
                <td><img src='admin_area/country_img/$con_img' height='50px'></td>
                <th class='text-light'>$con_title</th>
                <td class='text-light ps-4'>$cat_title</td>
                <td class='text-light'>$con_point</td>
                <td class='text-light'><a class='btn btn-success' href='team_details.php?con_id=$con_id'>View Details</a></td>
                <td class='text-light'><button class='btn btn-success' name='book'>Book Now</button></td>
            </tr>
        </form>

    ";
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.open('customer_area/login.php','_self')</script>";
    } 
    else{
        if(isset($_POST['book'])) {
            $get_ambulance = "select * from ambulance where con_id = $con_id";
            $run_ambulance = mysqli_query($db, $get_ambulance);
            $row_ambulance = mysqli_fetch_array($run_ambulance);
            $booking_status = $row_ambulance['booking'];



            if($booking_status == '1'){
                echo "<script>alert('This ambulance is already booked.')</script>";
                echo "<script>window.open('team.php?view_account','_self')</script>";
            }
            else{
                $up = 1;
                // Update the 'booking' column in the 'ambulance' table
                $update_sub = "UPDATE ambulance SET booking='$up' WHERE con_id='$con_id'";
                $run_up = mysqli_query($db, $update_sub);
        
                // Check if the query was successful
                if($run_up) {
                    echo "<script>alert('Congratulations! Ambulance booking successful...')</script>";
                    echo "<script>window.open('customer_area/my_account.php?view_account','_self')</script>";
                } else {
                    echo "<script>alert('Error occurred while booking ambulance.')</script>";
                    echo "<script>window.open('team.php?view_account','_self')</script>";
                }
            }
        }
    }

}
?>
