<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onPanRBCIdDeltID = $_POST['onPanRBCIdDeltID'];
    
    $result = deleteData($con,'saar_panchnamaRBC', 'panRBCId', $onPanRBCIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onPanRBCIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onPanRBCIdKey'][0])) {
    $ids = $_POST['onPanRBCIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_panchnamaRBC', 'panRBCId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>