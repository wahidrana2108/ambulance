<?php
    if(isset($_Get['booking'])) {
        // Assuming $Get['con_id'] should be $_GET['con_id']
        if(isset($_Get['con_id'])) {
            $up = 1;

            $ambulance_id = $_GET['con_id'];
            $get_ambulance = "select * from ambulance where con_id='$ambulance_id'";
            $run_ambulance = mysqli_query($con,$get_ambulance);

            $con_id = $run_ambulance['con_id'];

            // Update the 'booking' column in the 'ambulance' table
            $update_sub = "UPDATE ambulance SET booking='$up' WHERE con_id='$con_id'";
            $run_up = mysqli_query($con, $update_sub);
    
            // Check if the query was successful
            if($run_up) {
                echo "<script>alert('Congratulations! Ambulance booking successful...')</script>";
                echo "<script>window.open('my_account.php?view_account','_self')</script>";
            } else {
                echo "<script>alert('Error occurred while booking ambulance.')</script>";
                echo "<script>window.open('my_account.php?view_account','_self')</script>";
            }
        }

    }
?>