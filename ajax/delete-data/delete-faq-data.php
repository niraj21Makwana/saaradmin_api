<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onfaqIdDeltID = $_POST['onfaqIdDeltID'];
    
    $result = deleteData($con,'saar_faq', 'faqId', $onfaqIdDeltID, '', '');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onfaqIdKey'][0])) {
    $ids = $_POST['onfaqIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_faq', 'faqId','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $result = mysqli_query($con,"TRUNCATE TABLE `saar_faq`");
     if($result==1){
            echo 1;
    }else{
            echo 0;
    }
}

?>