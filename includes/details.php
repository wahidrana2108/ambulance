<?php
    include("includes/header.php");
    include("functions/functions.php");
?>


<?php
    if(isset($_GET['$con_id'])){
        $get_driver = "select * from driver where driver_id='con_id'";
        $run_driver = mysqli_query($con,$get_driver);
        while($row_driver = mysqli_fetch_array($run_driver)){
            $driver_id = $row_driver['driver_id'];
            $driver_name = $row_driver['driver_name'];
        }
    }
?>


<?php echo $driver_name; ?>

<?php
    include("includes/footer.php");
?>