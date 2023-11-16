<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onSimankanIdDeltID = $_POST['onSimankanIdDeltID'];
    
    $result = deleteData($con,'saar_simankan', 'simankanId', $onSimankanIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onSimankanIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onSimankanIdKey'][0])) {
    $ids = $_POST['onSimankanIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_simankan', 'simankanId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>