<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onKalamBaraIdDeltID = $_POST['onKalamBaraIdDeltID'];
    
    $result = deleteData($con,'saar_kalamBara', 'kalamBaraId', $onKalamBaraIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onKalamBaraIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onKalamBaraIdKey'][0])) {
    $ids = $_POST['onKalamBaraIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_kalamBara', 'kalamBaraId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>