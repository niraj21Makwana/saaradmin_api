
<?php
include('../genreater-multipage-function.php');

function generateAtikramanForm($cons, $dataId) {
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_atikraman` WHERE `atikramanId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['atikramanTapa']!=""){
        $atikramanTapa ="टप्पा ".$userdata['atikramanTapa'];
    }else{
        $atikramanTapa = "";
    }

$html = [' <html>
<head>
    <meta charset="UTF-8">
    <style>
    body {
           font-size: 14pt;
        }
        .top-heading {
            text-align: center;
        }

        .top-heading div {
            margin: 0 auto;
            /* Center the div horizontally */
        }
            .large-text {
                font-size: 14pt;
                justify-content: space-between;
        }

        .table-center {
            margin-left: auto;
            margin-right: auto;
        }
        .righttext{
            text-align: right !important;
        }
        .spanmargin{
             margin-left:80%;
        }
        .tbheader{
            padding-top: 0;
            padding-right: 10px;
            padding-bottom: 20px;
            padding-left: 10px;
        }
        .tbbody{
            padding-top:15;
            padding-right: 15px;
            padding-bottom: 15px;
            padding-left: 15px;
        }
        .table-css{
            width:100%;
            border-collapse: collapse;
            font-size:13px;
            vertical-align:top;
        }
        .table-css-two{
            width:100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div class="top-heading"> <b>फार्म अ</b><br>
(परिपत्र दो-1 की कण्डिका 6 देखिये) <br>
राजस्व आदेश-पत्र (रेवेन्यू आर्डर शीट)<br>
</div>
<pre style="font-size:14px"><b>न्यायालय '.$userdata['atikramanCourt'].'</b> तहसील के न्यायालय में मामला क्रमांक <b>     /अ-68/'.$year.'-'.$yearPlue.'</b>   विषय <b>अतिक्रमण बाबत</b>  प्रकरण की श्रेणी जाँच प्रतिवेदन ग्राम बंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['atikramanPatwariHalkaNumber'].' '.$userdata['atikramanJilla'].' कलेक्टर का प्रकरण क्रमांक सन  200  -200 तहसीलदार का प्रकरण क्रमांक   सन 200 -200 '.$userdata['atikramanCourt'].' का प्रकरण क्रमांक ................सन 200 -200</pre>
<table border="1" class="table-css">
<tr><th class="tbheader"><b>आदेश क्रमांक कार्यवाही की तारीख और स्थान <br> (1)</b></th>
<th class="tbheader"><b>पीठासीन अधिकारी के हस्ताक्षर सहित आवेदन-पत्र अथवा कार्यवाही</b> <br>(2)</th>
<th class="tbheader"><b>जहां आवश्यक हो पर्ची अथवा वकीलों के हस्ताक्षर, आदेशों के पालन करवाकर लिपिक के संक्षिप्त हस्ताक्षर और प्रकरण की तारीख  (3) </th>
</tr>
<tr>
<td><pre>_____/________/'.$year.'</pre></td>
<td><pre>               पटवारी मौजा '.$userdata['atikramanGBAddress'].' की ओर से अनावेदक '.$userdata['atikramanBKKV'].'<b> पिता/पति '.$userdata['atikramanFatherName'].' जाति '.$userdata['atikramanCast'].' निवासी '.$userdata['atikramanAddress'].'</b>के विरुद्ध ग्राम <b>'.$userdata['atikramanGBAddress'].'</b> के शासकीय भूमि सर्वे क्र. <b>'.$userdata['atikramanSarveNumber'].' रकबा '.$userdata['atikramanRakba'].' में से '.$userdata['atikramanRakba'].' हैक्टेयर</b> पर म०प्र० भू0राजस्व संहिता 1959 की धारा 248 के तहत अतिक्रमण की रिपोर्ट मय पंचनामा के पेश की गयी हैं |<br>
-   प्रकरण दर्ज किया जावे |
-   अनावेदक को कारण बताओ सुचना-पत्र जारी हो |<br>
-   पेशी दिनांक    /     /'.$year.'

                                                                <b>'.$userdata['atikramanCourt'].'
                                                                '.$atikramanTapa.' तहसील '.$userdata['atikramanTahsil'].'</b>
</pre>
<pre>
 -   प्रकरण प्रस्तुत |
 -   अनावेदक को कारण बताओ सुचना पत्र जारी, अनावेदक उपस्थित/ सुचना उपरान्त अनुपस्थित | उसके विरुद्ध एक पक्षीय किया जाता हैं | अनावेदक के द्वारा शासकीय भूमि पर अतिक्रमण होना स्वीकार किया| अनावेदक को उपरोक्त शासकीय भूमि सर्वे क्र.<b>      </b> रकबा <b>'.$userdata['atikramanRakba'].'</b> में से  '.$userdata['atikramanRakba'].'</b> पर अतिक्रमण सिद्ध होता हैं | अनावेदक को दोषी पाकर म०प्र० भू0राजस्व संहिता 1959 की धारा 248 के तहत अर्थदण्ड रूपये_____________________शब्दों में______________________     आरोपित किया जाकर शासकीय भूमि से बेदखल किया जाता हैं |
 -   प्रकरण पटवारी मौजा से बेदखली रिपोर्ट प्रस्तुत करने हेतु |
पेशी दिनांक  <b>  /  /'.$year.'</b>

                                                                    <b>'.$userdata['atikramanCourt'].'
                                                                    '.$atikramanTapa.' तहसील  '.$userdata['atikramanTahsil'].'</b>

</pre>
<pre>
पटवारी मौजा से बेदखली रिपोर्ट प्राप्त, प्रकरण डी पंजी में दर्ज हो|वबान/रीडर /पटवारी नोट करे| बपूर्णता के प्रकरण समाप्त होकर दाखिल रिकॉर्ड हो|
                                                                    <b>'.$userdata['atikramanCourt'].'
                                                                    '.$atikramanTapa.' तहसील  '.$userdata['atikramanTahsil'].'</b>
</pre>
<br>
<br>
</td>
 <td>  </td>
</tr>
</table>','
<div class="top-heading"><b><u>पटवारी रिपोर्ट </u><br>
<u>(म.प्र.भु.रा.संहिता 248 के अंतर्गत)</u></b></div>
<pre>
सेवा में,
        श्रीमान '.$userdata['atikramanCourt'].' महोदय,
        '.$atikramanTapa.' तहसील '.$userdata['atikramanTahsil'].'

द्वारा-राजस्‍व निरिक्षक महोदय वृत्‍त |

निवेदन है कि ग्राम <b>'.$userdata['atikramanGBAddress'].'</b> में नाम '.$userdata['atikramanBKKV'].' <b>पिता/पति  '.$userdata['	atikramanFatherName'].'  जाति '.$userdata['atikramanCast'].'</b> निवासी <b>'.$userdata['atikramanAddress'].'</b>  ने वर्ष '.$year.'-'.$yearPlue.' में निम्‍नानुसार अतिक्रमण किया है
</pre>
<table border="1" class="table-css-two">
<tr>
    <th class="tbheader">खसरा क्रमांक</th>
    <th class="tbheader">कुल रकबा</th>
    <th class="tbheader">किस्‍म जमीन</th>
    <th class="tbheader">पैकी रकबा</th>
    <th class="tbheader">दर</th>
    <th class="tbheader">आकार</th>
    <th class="tbheader">कब्‍जे का विवरण</th>
</tr>
<tr>
<td class="tbbody">   </td>
<td  class="tbbody"> '.$userdata['atikramanRakba'].' </td>
<td class="tbbody"> '.$userdata['atikramanNohiyat'].' </td>
<td class="tbbody"> '.$userdata['atikramanBKRakba'].' </td>
<td class="tbbody">   </td>
<td class="tbbody">   </td>
<td class="tbbody">'.$userdata['atikramanDescription'].'</td>
</tr></table>
अंत: उचित कार्यवाही हेतु रिपोर्ट सादर प्रेषित है <br><br><br>


<pre>दिनांक-                                                                                           हस्‍ताक्षर पटवारी</pre>
<hr>
<div class="top-heading"><b><u>पंचनामा</u></b></div>
<pre>हम पंचान पंच ग्राम '.$userdata['atikramanGBAddress'].'  यह तस्‍दीक करते  है कि ग्राम <b>'.$userdata['atikramanGBAddress'].'</b> पहन - तहसील   की सरकारी भूमि पर अनावेदक '.$userdata['atikramanBKKV'].' <b>पिता/पति  '.$userdata['atikramanFatherName'].' जाति  '.$userdata['atikramanCast'].'</b> निवासी <b>'.$userdata['atikramanAddress'].'</b> ने वर्ष '.$year.'-'.$yearPlue.' में निम्‍नानुसार अतिक्रमण किया है। </pre>
<table border="1" class="table-css-two">
    <tr>
        <th class="tbheader">खसरा क्रमांक</th>
        <th class="tbheader">किस्‍म जमीन</th>
        <th class="tbheader">अतिक्रमण का क्षेत्रफल</th>
        <th class="tbheader">अतिक्रमण का विवरण</th>
    </tr>
    <tr>
        <td class="tbheader"></td>
        <td class="tbheader">'.$userdata['atikramanNohiyat'].'</td>
        <td class="tbheader"> </td>
        <td class="tbheader">'.$userdata['atikramanDescription'].'</td>

    </tr>
</table>
उपरोक्‍त भूमि सार्वजनिक उपयोग  की होकर कब्‍जा हटाना आवश्‍यक है
','
<div class="top-heading"><b><u>न्‍यायालय '.$userdata['atikramanCourt'].' '.$atikramanTapa.' तहसील '.$userdata['atikramanTahsil'].'  जिला '.$userdata['atikramanJilla'].' म.प्र.</u></b></div>
<pre><b><u>प्रकरण क्रमांक      /अ-68/'.$year.'-'.$yearPlue.' </u></b></pre><br>


<b>अनावेदक :-</b> '.$userdata['atikramanBKKV'].'  <b>पिता/पति '.$userdata['atikramanFatherName'].' जाति '.$userdata['atikramanCast'].' निवासी '.$userdata['atikramanAddress'].' </b><br>
    पटवारी हल्‍का नम्‍बर '.$userdata['atikramanPatwariHalkaNumber'].' द्वारा म०प्र० भू0राजस्व संहिता 1959 की धारा 248 के तहत इस आशय की रिपोर्ट पेश की गई है कि ग्राम '.$userdata['atikramanGBAddress'].', स्थित म०प्र० शासन की भूमि खसरा नम्बर <b> </b> रकबा <b>'.$userdata['atikramanRakba'].'</b> हे में से '.$userdata['atikramanRakba'].' हैक्टेयर पर आपके द्वारा अवैध  रूप से  अतिक्रमण कर '.$userdata['atikramanDescription'].'  कब्जा किया गया है जो संहिता की धारा 248 के तहत दण्डनीय है ।<br>
         अत: आपको जरिये नोटिस आदेशित किया जाता है कि आप प्रकरण मे नियत पेशी दिनाक                को<b> अतिक्रमण केम्‍प तहसील  /ग्राम पंचायत '.$userdata['atikramanAddress'].' </b>में  प्रात: 11.00 बजे उपस्थिति आकर कारण बताएँ कि उपरोक्त अतिक्रमण के कारण आपके विरुद्ध म.प्र. भू-राजस्व संहिता 1959 की धारा 248 के प्रावधानों के तहत अतिक्रमिक भूमि  के बाजार मूल्य के 20 प्रतिशत (20 प्रतिशत) तक  शास्ति आरोपित करने एवं उक्त भूमि पर से आपको बेदखल करने का आदेश क्यों ना पारित किया जावे ।<br>
         बाबजूद सूचना नियत तिथि को अनुपस्थित रहने की स्थिति में आपके विरुद्द एकपक्षीय कार्यवाही का आदेश पारित करते हुए प्रकरण में आगामी आदेश पारित किए जाएंगे |</pre>  
<br>                                 
<div class="righttext"> <b>'.$userdata['atikramanCourt'].'<br>
'.$atikramanTapa.' तहसील '.$userdata['atikramanTahsil'].'
 </b></div>
','
<div class="top-heading"><b><u>न्‍यायालय '.$userdata['atikramanCourt'].' '.$atikramanTapa.' तहसील '.$userdata['atikramanTahsil'].'  जिला '.$userdata['atikramanJilla'].' <br>म.प्र.</u></b></div>
<pre><b><u>प्रकरण क्रमांक       /अ-68/'.$year.'-'.$yearPlue.' </u></b></pre> <br>
<pre>अनावेदक :-</b> '.$userdata['atikramanBKKV'].' <b>पिता/पति '.$userdata['atikramanFatherName'].' जाति '.$userdata['atikramanCast'].' निवासी '.$userdata['atikramanAddress'].' </b> <br>
पटवारी हल्‍का नम्‍बर '.$userdata['atikramanPatwariHalkaNumber'].' द्वारा म०प्र० भू0राजस्व संहिता 1959 की धारा 248 के  तहत इस आशय की रिपोर्ट पेश की गई है कि ग्राम '.$userdata['atikramanGBAddress'].', स्थित म०प्र० शासन की भूमि खसरा नम्बर  रकबा <b> '.$userdata['atikramanRakba'].' </b> हे में से '.$userdata['atikramanRakba'].' हैक्टेयर पर आपके द्वारा अवैध  रूप से  अतिक्रमण कर '.$userdata['atikramanDescription'].'  कब्जा किया गया है जो संहिता की धारा 248 के तहत दण्डनीय है ।<br>
       अत: आपको जरिये नोटिस आदेशित किया जाता है कि आप प्रकरण मे नियत पेशी दिनाक             को<b> अतिक्रमण केम्‍प तहसील  /ग्राम पंचायत '.$userdata['atikramanAddress'].' </b>में  प्रात: 11.00 बजे उपस्थिति आकर कारण बताएँ कि उपरोक्त अतिक्रमण के कारण आपके विरुद्ध म.प्र. भू-राजस्व संहिता 1959 की धारा 248 के प्रावधानों के तहत अतिक्रमिक भूमि  के बाजार मूल्य के 20 प्रतिशत (20 प्रतिशत) तक  शास्ति आरोपित करने एवं उक्त भूमि पर से आपको बेदखल करने का आदेश क्यों ना पारित किया जावे । </pre>
       बाबजूद सूचना नियत तिथि को अनुपस्थित रहने की स्थिति में आपके विरुद्द एकपक्षीय कार्यवाही का आदेश पारित करते हुए प्रकरण में आगामी आदेश पारित किए जाएंगे |</pre>

<br>                                                                                            
<div class="righttext"><b>'.$userdata['atikramanCourt'].' <br>
'.$atikramanTapa.' तहसील '.$userdata['atikramanTahsil'].'</b></div>                                                                                                                                                        </u></b>
 </pre>
</div>
</body>

</html>'];

$tableNameForm = 'saar_atikraman';
   $formNameForm = 'atikraman';
   $primaryKeys = 'atikramanId';

   generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>