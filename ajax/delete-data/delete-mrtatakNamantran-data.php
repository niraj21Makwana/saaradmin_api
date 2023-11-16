<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

if($deleteType=="Single"){
    $onMritakIdDeltID = $_POST['onMritakIdDeltID'];
    
    $result = deleteData($con,'saar_mritak_namantran', 'mritakId', $onMritakIdDeltID, '', '');
    
    $result1 = deleteData($con,'saarPdfsData', 'pdfDataId', $onMritakIdDeltID, '../../api/users_pdfs', 'pdfName');

    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onMritakIdKey'][0])) {
    $ids = $_POST['onMritakIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saar_mritak_namantran', 'mritakId','', '');
    $result1  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
        if($result==1){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>