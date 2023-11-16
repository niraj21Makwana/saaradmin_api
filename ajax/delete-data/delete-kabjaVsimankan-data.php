<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onkabjaVSIdDeltID = $_POST['onkabjaVSIdDeltID'];
    
    $result = deleteData($con,'saar_kabjaVsimankan', 'kabjaVSId', $onkabjaVSIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onkabjaVSIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onkabjaVSIdKey'][0])) {
    $ids = $_POST['onkabjaVSIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_kabjaVsimankan', 'kabjaVSId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>