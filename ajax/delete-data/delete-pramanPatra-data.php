<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onPrpatraIdDeltID = $_POST['onPrpatraIdDeltID'];
    
    $result = deleteData($con,'saar_prman_patra', 'prpatraId', $onPrpatraIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onPrpatraIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onPrpatraIdKey'][0])) {
    $ids = $_POST['onPrpatraIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_prman_patra', 'prpatraId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>