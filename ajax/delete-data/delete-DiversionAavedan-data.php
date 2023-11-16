<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $ondiversionAvedanIdDeltID = $_POST['ondiversionAvedanIdDeltID'];
    
    $result = deleteData($con,'saar_diversion_aavedan', 'diversionAvedanId', $ondiversionAvedanIdDeltID, '', '');
    
    $result1 = deleteData($con,'saar_appliedForm', 'appliedFormId', $ondiversionAvedanIdDeltID, '', '');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onDiversionAvedanIdKey'][0])) {
    $ids = $_POST['onDiversionAvedanIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_diversion_aavedan', 'diversionAvedanId','', '');
    $result1  = multiDeleteData($con,$ids,'saar_appliedForm', 'appliedFormId','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $result = mysqli_query($con,"TRUNCATE TABLE `saar_diversion_aavedan`");
    $result1 = mysqli_query($con,"DELETE FROM `saar_appliedForm` WHERE `appliedFormName`='डायवर्सन आवेदन'");
     if($result==1){
            echo 1;
    }else{
            echo 0;
    }
}

?>