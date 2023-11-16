<?php
require_once 'mpdf/vendor/autoload.php';

function generateAndSavePDF($con,$tableName,$htmlContentArray,$primaryKey,$formId,$formName) {
    
    $userQuery = mysqli_query($con, "SELECT * FROM `$tableName` WHERE `$primaryKey`='$formId'");
    $userdata = mysqli_fetch_assoc($userQuery);

    if ($userQuery) {
        $userMobile = $userdata['mobileNumber'];
        // Generate PDF file name
        $pdfFileName =  $formName.'_'.$userMobile.'_'.$formId.'.pdf';

        // Create mPDF instance
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-P','default_font' => 'sans']);
        
        // 'default_font' => 'kokilaregular'
        
        // Set page margins to 1 inch on all sides
        // $mpdf->SetMargins(28.4, 28.4, 28.4, 28.4);
        
     foreach ($htmlContentArray as $htmlContent) {
        $mpdf->AddPage();
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->SetFont('sans','','14');
        $mpdf->WriteHTML($htmlContent);
    }

        // Save the PDF in the user's folder
        $pdfPath = 'users_pdfs/'. $pdfFileName;
        $mpdf->Output($pdfPath, 'F');

        //pdfs name save in pdfs table 
        $pdfId = uniqid();
        $pdfDataId = $formId;
        $userId = $userdata['userId'];
        $mobileNumber = $userdata['mobileNumber'];
        
        // Update the PDF file name in the database
    $updateQuery = mysqli_query($con, "INSERT INTO `saarPdfsData`(`pdfId`, `pdfName`, `pdfDataId`, `userId`, `mobileNumber`) VALUES ('$pdfId','$pdfFileName','$pdfDataId','$userId','$mobileNumber')");

        if ($updateQuery) {
         return 1;
        } else {
            return 0;
        }
    } else {
        return 2;
    }
}


?>