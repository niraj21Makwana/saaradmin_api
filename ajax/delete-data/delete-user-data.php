<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onUserIdDeltID = $_POST['onUserIdDeltID'];
    
    $result = deleteData($con,'saarUsersAuth', 'userId', $onUserIdDeltID, '', '');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onUserIdKey'][0])) {
    $ids = $_POST['onUserIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saarUsersAuth', 'userId','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>