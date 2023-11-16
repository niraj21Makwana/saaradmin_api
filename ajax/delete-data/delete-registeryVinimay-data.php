<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onRegVinamayIdDeltID = $_POST['onRegVinamayIdDeltID'];
    
    $result = deleteData($con,'saar_reg_vinamay', 'regVinamayId', $onRegVinamayIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onRegVinamayIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onRegVinamayIdKey'][0])) {
    $ids = $_POST['onRegVinamayIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_reg_vinamay', 'regVinamayId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>