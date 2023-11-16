<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onbatankanIdDeltID = $_POST['onbatankanIdDeltID'];
    
    $result = deleteData($con,'saar_batankan', 'batankanId', $onbatankanIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onbatankanIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onbatankanIdKey'][0])) {
    $ids = $_POST['onbatankanIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_batankan', 'batankanId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>