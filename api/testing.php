<?php
include('../pdf-Genreater-Function.php');
$dataId = "88894541654";
$html='<html>
<head>
    <meta charset="UTF-8">
    <style>
         @font-face { font-family: nirmala; src: url("https://saars.in/adminsaar/api/font/Nirmala.ttf"); }
        body {
        font-size: 14px;
        font-family: nirmala, sans-serif;
        }
    </style>
</head>
<body>
    <pre>
        न्यायालय तहसीलदार तहसील दलौदा जिला मंदसौर

प्रति
 
निवासी ग्राम करनाखेडी , तहसील दलौदा, जिला-मंदसौर

विषय: डायवर्सन राशि जमा करने बावत ।

उपरोक्त विषयांतर्गत ग्राम करनाखेड़ी भूमि सर्वे नंबर-1357/1/3/233 रकबा 0.047 हेक्टर में से  व्यपवर्तित आवासीय/व्यावसायिक प्रयोजन हेतु उपयोग में होकर आपके द्वारा विगत कई वर्षो में व्यपवर्तन की राशि का भुगतान नहीं किया गया है। इस वर्ष भी आपको कई बार अवगत कराने के बाद भी आपके द्वारा व्यपवर्तन की राशि का भुगतान नहीं किया गया ।

पत्र प्राप्ति के तीन दिवस में व्यपवर्तन की राशि जमा करवाया जाना सुनिश्चित करे।

राशि  2000

सलग्न मागपत्र 
                                                                                                                   तहसीलदार
                                                                                                                    तहसील दलौदा
    </pre>
</body>
</html>';

 $tableNameForm = 'saar_diversion_maang';
    $formNameForm = 'Diversion';
    $primaryKeys = 'diversionId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
?>