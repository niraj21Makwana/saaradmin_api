<?php
include('../../assets/includes/connection.php');
include('delete-function.php');


$deleteType = $_POST['deleteType'];

$tableData = [
    'saar_atikraman' => 'atikramanId',
    'saar_batankan' => 'batankanId',
    'saar_batwara' => 'batwaraId',
    'saar_diversion_maang' => 'diversionId',
    'saar_kabjaVsimankan' => 'kabjaVSId',
    'saar_kalamBara' => 'kalamBaraId',
    'saar_mritak_namantran' => 'mritakId',
    'saar_nabalikSeBalik' => 'nasebaId',
    'saar_panchnamaRBC' => 'panRBCId',
    'saar_PMSamanNidhi' => 'PMSamanId',
    'saar_prman_patra' => 'prpatraId',
    'saar_registry' => 'registryId',
    'saar_reg_vinamay' => 'regVinamayId',
    'saar_simankan' => 'simankanId',
    ];
    
if($deleteType=="Single"){
    $onPdfDataIdDeltID = $_POST['onPdfDataIdDeltID'];
    
    $result = deleteData($con,'saarPdfsData', 'pdfDataId', $onPdfDataIdDeltID, '../../api/users_pdfs', 'pdfName');

    foreach ($tableData as $tableName => $primaryKey) {
        $result1 = deleteData($con, $tableName, $primaryKey, $onPdfDataIdDeltID, '', '');
    }
    
    if ($result === 1) {
        echo 1; // Success message
    } elseif ($result === 0) {
        echo 0; // Error message
    } else {
        echo 2; // Record not found message
    } 
}elseif($deleteType=="Multiple"){
    if(isset($_POST['onPdfDataIdKey'][0])) {
    $ids = $_POST['onPdfDataIdKey'];
    
    $result  = multiDeleteData($con,$ids,'saarPdfsData', 'pdfDataId','../../api/users_pdfs', 'pdfName');
    
    foreach ($tableData as $tableName => $primaryKey) {
        $result1  = multiDeleteData($con,$ids,$tableName,$primaryKey,'', '');
    }
    
    if($result==1){
        echo 1;
    }else{
        echo 0;
    }
    }
}

?>