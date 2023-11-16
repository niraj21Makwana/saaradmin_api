<?php
include('../pdf-Genreater-Function.php');
// include('../pdf-genreatUsingTCPDF.php');

function generateDiversionForm($cons, $dataId) {
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_diversion_maang` WHERE `diversionId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
     if($userdata['diversionTappa']!=""){
        $diversionTappa ="टप्पा ".$userdata['diversionTappa'];
    }else{
        $diversionTappa = "";
    }
    
    $html = '
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
         font-size: 14px;
        }
        .right-align {
            text-align: right;
        }
        .top-heading {
            text-align: center;
        }
        .top-heading div {
            margin: 0 auto; /* Center the div horizontally */
        }
        
        .large-text {
            font-size: 14pt;
        }
    </style>
</head>
<body>
<div class="top-heading">
<p class="large-text"><b><u>न्यायालय ' . $userdata['diversionCourt'] . ' '.$diversionTappa.' तहसील ' . $userdata['diversionTahsil'] . ' जिला ' . $userdata['diversionDistrict'] . '</u></b></p>
</div>
<br>
<pre class="large-text">
प्रति
'.$userdata['diversionAvedakName'].'
निवासी '.$userdata['diversionAvedakAddress'].'

<b>विषय: डायवर्सन राशि जमा करने बावत ।</b>

उपरोक्त विषयांतर्गत ग्राम '.$userdata['diversionBSAddress'].' भूमि सर्वे नंबर-'.$userdata['diversionServeNumber'].' रकबा '.$userdata['diversionRakba'].' में से व्यपवर्तित आवासीय / व्यावसायिक प्रयोजन हेतु उपयोग में होकर आपके द्वारा विगत कई वर्षों में व्यपवर्तन की राशि का भुगतान नहीं किया गया है। इस वर्ष भी आपको कई बार अवगत कराने के बाद भी आपके द्वारा व्यपवर्तन की राशि का भुगतान नहीं किया गया । 


पत्र प्राप्ति के तीन दिनों में व्यपवर्तन की राशि जमा करवाया जाना सुनिश्चित करें। 

राशि  '.$userdata['diversionMoney'].'
सलग्न मागपत्र
                                                                                      <p class="right-align">'.$userdata['diversionCourt'].'<br>
                                                                                        तहसील '.$userdata['diversionTahsil'].'</p>
</pre>
</body>
</html>';

    $tableNameForm = 'saar_diversion_maang';
    $formNameForm = 'डायवर्सन–मांगपत्र';
    $primaryKeys = 'diversionId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>
