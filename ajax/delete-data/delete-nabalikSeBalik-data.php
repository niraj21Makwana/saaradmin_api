<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onNasebaIdDeltID = $_POST['onNasebaIdDeltID'];
    
    $result = deleteData($con,'saar_nabalikSeBalik', 'nasebaId', $onNasebaIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onNasebaIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onNasebaIdKey'][0])) {
    $ids = $_POST['onNasebaIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_nabalikSeBalik', 'nasebaId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>