<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onbatwaraIdDeltID = $_POST['onbatwaraIdDeltID'];
    
    $result = deleteData($con,'saar_batwara', 'batwaraId', $onbatwaraIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onbatwaraIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onbatwaraIdKey'][0])) {
    $ids = $_POST['onbatwaraIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_batwara', 'batwaraId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>