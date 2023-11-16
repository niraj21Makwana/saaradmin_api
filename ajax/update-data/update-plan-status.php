<?php
include('../../assets/includes/connection.php');

if(isset($_POST['planId']) && isset($_POST['status'])){
    $planId = $_POST['planId'];
    $status = $_POST['status'];
    
    $run = mysqli_query($con,"UPDATE `saar_plans` SET `status`='$status' WHERE `planId`='$planId'");
    if($run){
        echo 1;
    }else{
        echo 0;
    }
}
?>

