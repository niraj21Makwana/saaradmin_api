<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onFasalMpIdDeltID = $_POST['onFasalMpIdDeltID'];
    
    $result = deleteData($con,'saar_fasalMP', 'fasalMpId', $onFasalMpIdDeltID, '', '');
    $result1 = deleteData($con,'saar_appliedForm', 'appliedFormId', $onFasalMpIdDeltID, '', '');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onFasalMpIdKey'][0])) {
    $ids = $_POST['onFasalMpIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_fasalMP', 'fasalMpId','', '');
    $result1  = multiDeleteData($con,$ids,'saar_appliedForm', 'appliedFormId','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $result = mysqli_query($con,"TRUNCATE TABLE `saar_fasalMP`");
    $result1 = mysqli_query($con,"DELETE FROM `saar_appliedForm` WHERE `appliedFormName`='फसल मुआवजा पत्रक'");
    
     if($result==1){
            echo 1;
    }else{
            echo 0;
    }
}

?>