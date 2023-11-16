<?php
include('../genreater-multipage-function.php');
function generateNasebaForm($cons, $dataId) {
    
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_nabalikSeBalik` WHERE `nasebaId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['nasebaTappa']!=""){
        $nasebaTappa ="टप्पा ".$userdata['nasebaTappa'];
    }else{
        $nasebaTappa = "";
    }

    $html=['
<html>
<head>
    <meta charset="UTF-8">
</head>
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
        .right-side{
           text-align: right;
           margin-right:10%;
        } 
        .right-side-box{
            text-align: center;
            margin-left: 60%;
        }
        .collapsetable{
            width:100%;
            border-collapse: collapse;
            border: 1px solid black;
            vertical-align:top;
            font-size:14px;
        }
        .fontSizing{
            font-size:13.5px;
        }
    </style>
<body>
<div class="top-heading"><b><u>न्यायालय '.$userdata['nasebaCourt'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' जिला '.$userdata['nasebaJhila'].'</u></b></div>

<pre>प्रति,
    श्रीमान '.$userdata['nasebaCourt'].' महोदय
    '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' जिला '.$userdata['nasebaJhila'].'

विषय- नाबालिग से बालिग़ करने के सम्बन्ध में ।

सेवा में,</pre>
<div>
उपरोक्त विषयान्तर्गत निवेदन हे की में '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' का होकर मेरे ग्राम '.$userdata['nasebaBEAddress'].' में भूमि सर्वे न '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].' पर नाम नाबालिक होकर दर्ज है है । मेरी आयु 18 वर्ष पूर्ण हो चुकी है, प्रमाणीकरण के रूप आधार कार्ड / 10 अंकसूची / वोटर कार्ड ,खसरा एवं चालान प्रति प्रस्तुत है।
</div>
<br>
अतः श्रीमान से निवेदन हे की खसरे में मेरा नाम नाबालिक हटाकर दर्ज करने की कृपा करे।
<div>
    <br>
संलग्न
</div>
<div class="right-side-box">
<br>
प्रार्थी<br>
'.$userdata['nasebaAavedakName'].'<br>
'.$userdata['nasebaAavedakAddress'].'
</div>','
<!-- *************************** -->
<pre class="top-heading"><b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['nasebaPatwariHalkNum'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' जिला '.$userdata['nasebaJhila'].'</u></b></pre>

<pre>प्रति,
    श्रीमान तहसीलदार महोदय
    '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' जिला '.$userdata['nasebaJhila'].'

विषय- नाबालिग से बालिग़ करने के सम्बन्ध में ।

सेवा में,
</pre>
<div>
उपरोक्त विषयान्तर्गत आवेदक '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' ने ग्राम.'.$userdata['nasebaBEAddress'].' के सर्व न '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].' पर नाबालिग से बालिग होने का आवेदन प्रस्तुतकिया है मेरे द्वारा आवेदन की मौका जांच की गयी मौका जाँच में आवेदक द्वारा   आधार कार्ड / 10अंकसूची / वोटर कार्ड, खसरा एवं चालान प्रति  प्रस्तुत की गयी आवेदक द्वारा प्रस्तुत दस्तावेज पंचो के मौखिक कथन ,पंचनामा एवं मौका जाँच के आधार पर पाया गया की आवेदक की आयु 18 वर्ष पूर्ण हो चुकी है |
</div>
<br>
अतः आवेदक का नाम खसरे में नाबालिग से हटाकर दर्ज करना उचित होगा |
 <br>
 <br>
आगामी कार्यवाही हेतु श्रीमान को प्रतिवेदन सादर प्रेषित |
<div class="right-side-box">
<br>
पटवारी<br>
पहन<br>
'.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].'
</div>','
<!-- ************************ -->
<pre class="top-heading"><b>पंचनामा</b></pre>
<div class="right-side-box">
दिनांक - <br>
स्थान - 
</div>
हम पंचान ग्राम से होकर यह पंचनामा तस्दीक करवा देते हे कि आवेदक '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' द्वारा पटवारी मौजा पहन स्थित भूमि सर्वे नम्बर '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].' पर दर्ज  नाम में  नाबालिग से बालिग हेतु न्यायालय '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' में आवेदन प्रस्तुत किया गया हे, इसकी मौका जाच हेतु मय पटवारी मौजा हम पंचान   उपस्थित हुए|
<br>
<br>
हम पंचांग एवं मौजा पटवारी की उपस्थिति में मोका जाच पर आवेदक द्वारादस्तावेज  आधारकार्ड/10अंकसूची/वोटर कार्ड , खसरा एवं नेत्रांकन के आधारपर पाया गया कि आवेदक की आयु 18 वर्ष पूर्ण हो चुकी है।
<br>
<br>
अतः हम पंचांग द्वारा यह पंचनामा लिखा जाता है कि आवेदक का नाम खसरे में नाबालिग से हटाकर दर्ज किया जाना उचित होगा ।
<br>
<br>
अत हम पंचांग द्वारा जो पंचनामा बनाया सो सही ।','
<!-- *********************** -->
<div style="font-size:14px;"><pre class="top-heading"><b>फार्म अ</b>
(परिपत्र दो-1 की कण्डिका 6 देखिये)
<b>राजस्‍व आदेश - पत्र ( रेवेन्‍यू ऑर्डर शीट)</b></pre>
न्यायालय '.$userdata['nasebaCourt'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' के न्यायालय में मामला क्रमांक.................. विषय <b>नाबालिग से बालिग होने बाबत </b>प्रकरण की श्रेणी जॉच प्रतिवेदन ग्रामबंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['nasebaPatwariHalkNum'].' '.$userdata['nasebaJhila'].' कलेक्टर का प्रकरण क्रमांक सन  20__- 20___ तहसीलदार का प्रकरण क्रमांक ................सन 200_ -200_ नायब तहसीलदार का प्रकरण क्रमांक ................सन 20___-20___
</div>
<table border="1" class="collapsetable">
<tr class="top-heading">
<td>आदेश क्रमांक कार्यवाही की तारीख और स्था<खन<br/>(1)</td>
<td> पीठासीन अधिकारी के हस्ता्क्षर सहित आवेदन पत्र अथवा कार्यवाही<br/>(2)</td>
<td>जहा आवश्य क हो पर्ची अथवा वकीलों के हस्तांक्षर , आदेशों के पालन करवाकर लिपिक के संक्षिप्त  हस्ताकक्षर और प्रकरण की तारीख <br/>(3)</td>
</tr>
<tbody>
<tr><td><pre>____/_____ /'.$year.'</pre></td>
<td><pre>        आवेदक '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' द्वारा आवेदन पत्र प्रस्तुत कर ग्राम '.$userdata['nasebaBEAddress'].' स्थित भूमि सर्वे नम्बर '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].' के नाम से दर्ज हैं उक्त खाते पर '.$userdata['nasebaAavedakName'].' का नाम नाबालिग से बालिग दर्ज किया जाने का आवेदन प्रस्तुत किया गया हैं |<br>
- प्रकरण दर्ज हो |<br>
- पटवारी मौजा से रिपोर्ट ली जावे |<br>
- आवेदक तलब हो |<br>
- पेशी दिनांक ____/____/'.$year.'<br>
</pre><pre>
                                                    '.$userdata['nasebaCourt'].'
                                                    '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].'
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</pre>
</td>
<td></td>
</tr>
</tbody>
</table>','
<!-- ******************* -->
<pre class="top-heading"><b><u>न्यायालय '.$userdata['nasebaCourt'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].', जिला '.$userdata['nasebaJhila'].'</u></b></pre>
<pre class="top-heading">क्रमांक       /री-1/'.$year.'                          '.$userdata['nasebaTehsil'].', दिनांक    /   /'.$year.'</pre>				 
<pre>प्रति,

पटवारी 
<b>ग्राम-'.$userdata['nasebaBEAddress'].'</b>
विषय :- नाबालिग से बालिग दर्ज करने के प्रकरण में  रिपोर्ट प्रस्तुत करने बाबत |
</pre>
<div class="top-heading">::0000::</div>
उपरोक्त विषयान्तार्गत लेख हैं आवेदक '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' द्वारा आवेदन पत्र प्रस्तुत कर ग्राम '.$userdata['nasebaBEAddress'].' स्थित भूमि सर्वे नम्बर '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].' '.$userdata['nasebaAavedakName'].' के नाम से दर्ज हैं उक्त खाते पर नाबालिग से बालिग दर्ज किया जाने का आवेदन प्रस्तुत किया गया हैं प्रकरण क्र. <b>'.$userdata['nasebaPrakNumber'].'/अ-6/'.$year.'-'.$yearPlue.' इस न्यायालय में प्रचलित हैं |</b> अतः उक्त प्रकरण में <b>नियत पेशी दिनांक...../...../'.$year.' </b>के पूर्व तैयार कर मय रिपोर्ट एवं पंचनामा सहित इस न्यायालय में प्रस्तुत करें |
<br/>
<br/><div class="right-side-box">
नायब तहसीलदार<br>
तहसील दलौदा
</div>','
<!-- ******************* -->
<div class="fontSizing"><pre class="top-heading">राजस्व मामले में नोटिस</pre>
<pre>समक्ष '.$userdata['nasebaCourt'].' स्थान '.$userdata['nasebaTehsil'].'..........मामले                                                                      <b>S.L-</b>   
के विषय <b>नाबालिग से बालिग होने बाबत                                                                              -------------------
प्रकरण क्रमांक '.$userdata['nasebaPrakNumber'].'/अ-6/'.$year.'-'.$yearPlue.'                                                            Date:-       /      /'.$year.'</b>
आवेदक <b>'.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].'</b> आपको सूचित किया जाता है कि उपयुर्क्त मामले की <b>सुनवाई दिनांक .................</b> को दिन में दोपहर 2:00 बजे स्थान तहसील न्यायालय '.$userdata['nasebaTehsil'].' पर होगी |
तारीख    माह     सन  '.$year.'
मुद्रा  </pre><pre class="right-side-box">रीडर टू '.$userdata['nasebaCourt'].'
'.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].'</pre>
<pre class="top-heading">प्रष्टाकनक्रमांक-1</pre>बुलाये गये व्यक्ति के हश्ताक्षर<pre class="top-heading">प्रष्टाकनक्रमांक-2</pre>
<pre>तामिल करने संबधी प्रष्टाकन
तारीख ........................माह.............................सन '.$year.' को .......................बजे मेरे बाद तामिल किया गया</pre>
<div class="right-side-box">तामिल करने वाले के हस्ताक्षर</div>
<hr>
<pre class="top-heading">राजस्व मामले में नोटिस</pre>
<pre>समक्ष '.$userdata['nasebaCourt'].' स्थान '.$userdata['nasebaTehsil'].'..........मामले                                                                     <b>S.L-</b>   
के विषय <b>नाबालिग से बालिग होने बाबत                                                                              -------------------
प्रकरण क्रमांक '.$userdata['nasebaPrakNumber'].'/अ-6/'.$year.'-'.$yearPlue.'                                                            Date:-       /      /'.$year.'</b>
आवेदक <b>'.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].'</b> आपको सूचित किया जाता है कि उपयुर्क्त मामले की <b>सुनवाई दिनांक .................</b> को दिन में दोपहर 2:00 बजे स्थान तहसील न्यायालय '.$userdata['nasebaTehsil'].' पर होगी |
तारीख    माह     सन  '.$year.'
मुद्रा  </pre><pre class="right-side-box">रीडर टू '.$userdata['nasebaCourt'].'
'.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].'</pre>
<pre class="top-heading">प्रष्टाकनक्रमांक-1</pre>बुलाये गये व्यक्ति के हश्ताक्षर<pre class="top-heading">प्रष्टाकनक्रमांक-2</pre>
<pre>तामिल करने संबधी प्रष्टाकन
तारीख ........................माह.............................सन '.$year.' को .......................बजे मेरे बाद तामिल किया गया</pre>
<div class="right-side-box">तामिल करने वाले के हस्ताक्षर</div>
<hr></div>','
<!-- **************************** -->
<pre class="top-heading"><b><u>न्‍यायालय '.$userdata['nasebaCourt'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].', जिला - '.$userdata['nasebaJhila'].' (म.प्र.)</u></b></pre>
प्रकरण क्रमांक - '.$userdata['nasebaPrakNumber'].'/अ-6/'.$year.'-'.$yearPlue.'
<pre class="right-side"><b>'.$userdata['nasebaAavedakName'].'
निवासी '.$userdata['nasebaAavedakAddress'].'</b>
..........आवेदक
<b>विरूद्ध
म.प्र. शासन </b>
..........अनावेदक
</pre>
<pre class="top-heading"><b>//आदेश//
पारित दिनांक        /       /'.$year.'</b></pre>
<pre>         प्रकरण का संक्षिप्‍त विवरण इस प्रकार है कि आवेदक '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' द्वारा ग्राम - '.$userdata['nasebaBEAddress'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' स्थित कृषि खाता भूमि सर्वे नम्बर '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].', पर खातेदार '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' का  नाम नाबालिग के रूप में दर्ज है। आवेदक वर्तमान आवश्‍यक दस्तावेज आधार कार्ड व 10 वीं की मार्कशीटके अनुसार आवेदक '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' बालिग हो चुका  है।  आवेदक ने राजस्व अभिलेख में नाबालिग से बालिग होने का आवेदन प्रस्तुत किया गया । आवेदक ने आवेदन के समर्थन में आवेदन, आधार कार्ड, 10 वीं की मार्कशीट, खसरा, चालान प्रति प्रस्तुत की गई।
आवेदक द्वारा ग्राम '.$userdata['nasebaBEAddress'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' स्थित कृषि खाता भूमि सर्वे नम्बर '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].', होना बताया गया। पटवारी से प्रतिवेदन लिया गया। पटवारी प्रतिवेदन में उल्लेखित किया गया कि आवेदक वर्तमान दस्तावेज आधार कार्ड /10 वी की अंकसूची/वोटर कार्ड  अनुसार आवेदक की आयु 18 वर्ष से ऊपर हो चुकी हैं |अतः आवेदक के दस्तावेज व पटवारी मौजा द्वारा प्रस्तुत प्रतिवेदन के आधार पर आवेदक का आवेदन स्वीकार किया जाता है। अतः '.$userdata['nasebaAavedakName'].' को नाबालिग से बालिग किया जाने का आदेश पारित किया जाता है। पटवारी मौजा को पत्र जारी हो। पटवारी मौजा उक्त आदेश का राजस्व रिकार्ड में अमल कर संशोधित खसरा प्रकरण में मय पालन प्रतिवेदन के सात दिवस में प्रस्तुत करें । बाद पूर्णता प्रकरण समाप्त होकर दाखिल रिकार्ड हो।
</pre>
<pre class="right-side-box">'.$userdata['nasebaCourt'].'
'.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].'</pre>
<pre class="top-heading">क्र.           /रीडर-1/'.$year.'-'.$yearPlue.'                                      '.$userdata['nasebaTehsil'].' दिनांक     /      /'.$year.'</pre>
<pre>प्रतिलिपिः-
पटवारी मौजा '.$userdata['nasebaBEAddress'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' आदेशानुसार राजस्‍व रिकॉर्ड में अमल कर पालन प्रतिवेदन 07 दिवस में प्रस्‍तुत करना सुनिश्चित करे।</pre>
<pre class="right-side-box">'.$userdata['nasebaCourt'].'
'.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].'</pre>
</body>
</html>
'];

$tableNameForm = 'saar_nabalikSeBalik';
    $formNameForm = 'नाबालिग नामांतरण';
    $primaryKeys = 'nasebaId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}


function generateNasebaFormNormal($cons, $dataId) {
    
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_nabalikSeBalik` WHERE `nasebaId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['nasebaTappa']!=""){
        $nasebaTappa ="टप्पा ".$userdata['nasebaTappa'];
    }else{
        $nasebaTappa = "";
    }
   
   
    $html=['
<html>
<head>
    <meta charset="UTF-8">
</head>
<style>
    @font-face { font-family: kokilaregular; src: url("https://saars.in/adminsaar/api/font/Kokila-Regular.ttf"); }
        body {
            font-size: 14pt;
            font-family: "kokilaregular";
        }
        .top-heading {
            text-align: center;
        }
        .top-heading div {
            margin: 0 auto;
            /* Center the div horizontally */
        }
        .right-side{
           text-align: right;
           margin-right:10%;
        } 
        .right-side-box{
            text-align: center;
            margin-left: 60%;
        }
    </style>
<body>
<div class="top-heading"><b><u>न्यायालय '.$userdata['nasebaCourt'].' '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' जिला '.$userdata['nasebaJhila'].'</u></b></div>

<pre>प्रति,
    श्रीमान '.$userdata['nasebaCourt'].' महोदय
    '.$nasebaTappa.' तहसील '.$userdata['nasebaTehsil'].' जिला '.$userdata['nasebaJhila'].'

विषय- नाबालिग से बालिग़ करने के सम्बन्ध में ।

सेवा में,</pre>
<div>
उपरोक्त विषयान्तर्गत निवेदन हे की में '.$userdata['nasebaAavedakName'].' निवासी '.$userdata['nasebaAavedakAddress'].' का होकर मेरे ग्राम '.$userdata['nasebaBEAddress'].' में भूमि सर्वे न '.$userdata['nasebaBServeNumber'].' कुल सर्वे नंबर '.$userdata['nasebaKulServeNumber'].' कुल रकबा '.$userdata['nasebaRakba'].' पर नाम नाबालिक होकर दर्ज है है । मेरी आयु 18 वर्ष पूर्ण हो चुकी है, प्रमाणीकरण के रूप आधार कार्ड / 10 अंकसूची / वोटर कार्ड ,खसरा एवं चालान प्रति प्रस्तुत है।
</div>
<br>
अतः श्रीमान से निवेदन हे की खसरे में मेरा नाम नाबालिक हटाकर दर्ज करने की कृपा करे।
<div>
    <br>
संलग्न
</div>
<div class="right-side-box">
<br>
प्रार्थी<br>
'.$userdata['nasebaAavedakName'].'<br>
'.$userdata['nasebaAavedakAddress'].'
</div>
</body>
</html>
'];

$tableNameForm = 'saar_nabalikSeBalik';
    $formNameForm = 'नाबालिग नामांतरण';
    $primaryKeys = 'nasebaId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}
?>