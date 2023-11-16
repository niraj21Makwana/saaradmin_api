<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Multiple"){
    if(isset($_POST['onfeedbackIdKey'][0])) {
    $ids = $_POST['onfeedbackIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_feedback', 'feedbackId','', '');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}else{
    $result = mysqli_query($con,"TRUNCATE TABLE `saar_feedback`");
     if($result==1){
            echo 1;
    }else{
            echo 0;
    }
}

?>