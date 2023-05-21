<?php 
    $con = mysqli_connect("localhost","root","","ambulance");

if(!$con){
    die('Connection Failed' .mysqli_connect_error());
}
?>