<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onAtikramanIdDeltID = $_POST['onAtikramanIdDeltID'];
    
    $result = deleteData($con,'saar_atikraman', 'atikramanId', $onAtikramanIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onAtikramanIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onAtikramanIdKey'][0])) {
    $ids = $_POST['onAtikramanIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_atikraman', 'atikramanId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>