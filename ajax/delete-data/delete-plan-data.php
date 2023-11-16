<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onPlanIdDeltID = $_POST['onPlanIdDeltID'];
    
    $result = deleteData($con,'saar_plans', 'planId', $onPlanIdDeltID, '', '');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onPlanIdKey'][0])) {
    $ids = $_POST['onPlanIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_plans', 'planId','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>