<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onPatwariDeltID = $_POST['onPatwariDeltID'];
    
    $result = deleteData($con,'saarPatwari', 'id', $onPatwariDeltID, '', '');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onPatwariIdKey'][0])) {
    $ids = $_POST['onPatwariIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saarPatwari', 'id','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>