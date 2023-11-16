<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onPMSamanIdDeltID = $_POST['onPMSamanIdDeltID'];
    
    $result = deleteData($con,'saar_PMSamanNidhi', 'PMSamanId', $onPMSamanIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onPMSamanIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onPMSamanIdKey'][0])) {
    $ids = $_POST['onPMSamanIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_PMSamanNidhi', 'PMSamanId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>