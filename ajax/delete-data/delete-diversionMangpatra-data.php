<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onDiversionIdDeltID = $_POST['onDiversionIdDeltID'];
    
    $result = deleteData($con,'saar_diversion_maang', 'diversionId', $onDiversionIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onDiversionIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onDiversionIdKey'][0])) {
    $ids = $_POST['onDiversionIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_diversion_maang', 'diversionId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>