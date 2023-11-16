<?php
include('../../assets/includes/connection.php');

if(isset($_POST['diversionId']) && isset($_POST['status'])){
    $diversionId = $_POST['diversionId'];
    $status = $_POST['status'];
    
    $run = mysqli_query($con,"UPDATE `saar_diversion_aavedan` SET `status`='$status' WHERE `diversionAvedanId`='$diversionId'");
    $run1 = mysqli_query($con,"UPDATE `saar_appliedForm` SET `status`='$status' WHERE `appliedFormId`='$diversionId'");
    if($run || $run1){
        echo 1;
    }else{
        echo 0;
    }
}
?>

