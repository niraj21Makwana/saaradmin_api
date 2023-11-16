<?php
include('../../assets/includes/connection.php');

if(isset($_POST['fasalMuvajaId']) && isset($_POST['status'])){
    $fasalMuvajaId = $_POST['fasalMuvajaId'];
    $status = $_POST['status'];
    
    $run = mysqli_query($con,"UPDATE `saar_fasalMP` SET `status`='$status' WHERE `fasalMpId`='$fasalMuvajaId'");
    $run1 = mysqli_query($con,"UPDATE `saar_appliedForm` SET `status`='$status' WHERE `appliedFormId`='$fasalMuvajaId'");
    if($run || $run1){
        echo 1;
    }else{
        echo 0;
    }
}
?>

