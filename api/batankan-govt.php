<?php
include('../genreater-multipage-function.php');

function generatebatankanForm($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_batankan` WHERE `batankanId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['batankanTappa']!=""){
        $batankanTappa ="टप्पा ".$userdata['batankanTappa'];
    }else{
        $batankanTappa = "";
    }

    $html = ['<html>
    <head>
        <meta charset="utf-8">
        <style>
           body {
                font-size: 14pt;
            }
            .fontSizing{
                font-size:13.5px;
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
               margin-right:5%;
            } 
            .right-side-box{
                text-align: center;
                margin-left: 60%;
          }
          .leftSide{
            text-align:left;
          }
          .frontspace {
            text-indent: 55px;
          }
          .textleft {
            text-align: start;
          }
        .table-css{
            width:100%;
            border-collapse: collapse;
            font-size:14px;
            vertical-align:top;
        }
    </style>
    </head>
    <body>
<div class="top-heading"><b><u>न्यायालय श्रीमान ' . $userdata['batankanCourt'] . ' महोदय '.$batankanTappa.' तहसील '. $userdata['batankanTahsil'] . ' जिला ' . $userdata['batankanJila'] . '</u></b></div>
<p class="right-side">प्र. क्र. '.$userdata['batankanPNumber'].'/अ-3/'.$year.'-'.$yearPlue.' </p>
<pre> 
' . $userdata['batankanAvedakName'] . ' 
 निवासी ' . $userdata['batankanAvedakAddress'] . '  
                विरूध्द 
म. प्र. शासन                      --------------अनावेदक</pre>
<p class="top-heading"><mark><b>आवेदन पत्र बटांकन अंतर्गत धारा 68  म. प्र. भू. रा. सं. 1959</b></mark></p>
<pre>
महोदय,<br><br>

प्रार्थी की ओर से निम्नवत आवेदन पत्र प्रस्तुत है- <br><br>

यह कि प्रार्थी के नाम पर '.$userdata['batankanBTKAddress'].' तहसील '.$userdata['batankanTahsil'].' मे  खाता निम्नानुसार 
है-  </pre> 
<b>सर्व नंबर '.$userdata['batankanServeNumber'].' कुल रकबा '. $userdata['batankanRakba'].'</b> <br><br>

यह कि प्रार्थी ओर विपक्षीगण के मध्य उक्त भूमि के समबन्ध मे पूर्व मे मोखिक रूप से आपसी बटाकन  हो चुका है 
ओर उसी अनुसार मोके पर काबीज है लेकिन रिकार्ड  मे आज तक बटाकन  नही हुआ है। <br><br>

यह कि यह आवेदन पत्र म.प्र.भू.रा.सं. 1959 के तहत प्रस्तुत होकर आदरणीय न्यायालय को आवेदन पत्र पर सुनवाई 
का अधिकार प्राप्त है। <br>

अत: श्रीमान से निवेदन है कि ग्राम '.$userdata['batankanBTKAddress'].' स्थित उपर वर्णित सर्वे नंबर अनुसार मौजा पटवारी से बटाकन  फर्द तलब 
कर बटाकन  स्वीकृत करने का कष्ट करे । <br><br>
<pre>
  प्रार्थी  
</pre>
' . $userdata['batankanAvedakName'] . ' 
', '
<pre class="top-heading" style="font-size:14px;">
फार्म अ
(परिपत्र दो-1 की कण्डिका 6 देखिये)
राजस्‍व आदेश - पत्र ( रेवेन्‍यू ऑर्डर शीट)</pre>
<p style="font-size:14px;">न्यायालय ' . $userdata['batankanCourt'] . ' '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . '  के न्यायालय में मामला क्रमांक <b>'.$userdata['batankanPNumber'].'/अ-3/'.$year.'-'.$yearPlue.' विषय बटाकन  बाबत</b> प्रकरण की श्रेणी जाँच प्रतिवेदन ग्राम बंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['batankanPatwariHalkNum'].' कलेक्टर का प्रकरण क्रमांक सन  200  -200 तहसीलदार का प्रकरण क्रमांक ............ सन 200 -200 नायब तहसीलदार का प्रकरण 
क्रमांक ................सन 200 -200</p>
<table border="1" class="table-css">
<tr style="text-align:center">
<td> आदेश क्रमांक कार्यवाही की तारीख और स्‍थान<br> (1) </td>
<td> पीठासीन अधिकारी के हस्‍ताक्षर सहित आवेदन पत्र अथवा कार्यवाही (2) </td>
<td>जहा आवश्‍यक हो पर्ची अथवा वकीलों के हस्‍ताक्षर ,आदेशों के पालन करवाकर लिपिक के संक्षिप्‍त हस्‍ताक्षर और प्रकरण की तारीख<br>(3)</p> </pre></td>
</tr>
<tr><td><pre>______/_________/'.$year.'</pre></td>
<td>आवेदक <b>'.$userdata['batankanAvedakName'].' निवासी 
'.$userdata['batankanAvedakAddress'].'</b> द्वारा मध्यप्रदेश भू राजस्व संहिता 
1959 की धारा 68 के तहत आवेदन प्रस्तुत कर ग्राम '.$userdata['batankanBTKAddress'] . ' स्थित कृषि भूमि सर्वे 
क्रमांक '.$userdata['batankanServeNumber'].' रकबा  '.$userdata['batankanRakba'].' का बटाकन किये जाने का निवेदन किया गया । 
<pre>     
- प्रकरण दर्ज हो ।
- विज्ञप्ति जारी हो ।
- पटवारी से प्रतिवेदन लिया जावे ।       
- आवेदक तलब हो । 

पेशी दिनांक:-     /      / '.$year.'

                                                            '.$userdata['batankanCourt'].'
                                                            '.$batankanTappa.' तहसील '.$userdata['batankanTahsil'].'
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
</pre></td>
<td></td></tr>
</table>', '
<pre class="top-heading"><b><u>न्यायालय ' . $userdata['batankanCourt'] . ' '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' जिला ' . $userdata['batankanJila'] . ' (म.प्र.)</u></b></pre>
<pre>क्रमांक   /री-1/'.$year.'                                                      '.$batankanTappa.'' . $userdata['batankanTahsil'] . ', दिनांक-     /     /'.$year.'</pre>
<pre>
प्रति, 
पटवारी 
ग्राम :- ' . $userdata['batankanBTKAddress'] . '<br><br>                        
                           
विषय:-  प्रकरण में बटाकन फर्द प्रस्तुत करने बाबत ।

<p class="top-heading">     **********  </p>
</pre> 

उपरोक्त विषयांतर्गत लेख है आवेदक <b>' . $userdata['batankanAvedakName'] . ' निवासी- ' . $userdata['batankanAvedakAddress'] . ' स्थित भूमि सर्वे क्रमांक '.$userdata['batankanServeNumber'].' कुल सर्वे नंबर '.$userdata['batankanKulServeNumber'].' रकबा '.$userdata['batankanRakba'].'  </b> पर बटाकन  किये जाने हेतु आवेदन प्रस्तुत किया गया है । आवेदन की प्रति इस पत्र के संलग्न 
आपकी ओर प्रेषित की जा रही है । 

                <pre><p class="frontspace">अतः उक्त प्रकरण में नियत पेशी दिनांक      /      /'.$year.' के पूर्व मोके पर पक्षकारों की उपस्थिति में बटाकन  फर्द एवं पंचनामा तैयार कर बटाकन  फर्द मय पंचनामा इस न्यायालय में प्रस्तुत करें। </p></pre>  
                            
                                
<pre class="right-side">' . $userdata['batankanCourt'] . ' 
'.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . '</pre>
', '
<pre class="top-heading"><b>न्यायालय ' . $userdata['batankanCourt'] . ' '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' जिला ' . $userdata['batankanJila'] . ' (म.प्र.) </b>
( ब मामले वाद धारा 178 म.प्र.भू राजस्व संहिता बंटवारा ) </pre>
<pre>प्रकरण क्रमांक  <b>'.$userdata['batankanPNumber'].'/अ-27/'.$year.'-'.$yearPlue.'</b></pre>
<p class="top-heading"><b>उदघोषणा</b></p>

सर्व साधारण को सूचित किया जाता है कि ग्राम <b>' . $userdata['batankanBTKAddress'] . '</b> स्थित भूमि सर्वे क्रमांक <b>' . $userdata['batankanServeNumber'] . ' कुल सर्वे नंबर ' . $userdata['batankanKulServeNumber'] . ' कुल रकबा '. $userdata['batankanRakba'].'  का आवेदक 
'.$userdata['batankanAvedakName'] . ' निवासी ' . $userdata['batankanAvedakAddress'] . '</b> द्वारा प्रस्तुत आवेदन पर बटाकन  
हेतु न्यायालय में कार्यवाही जारी है। <br><br> 
                                
अतएव जिस किसी को आपत्ति हो विज्ञप्ति चस्पा होने के दिन से 30 दिनों के अंदर अपनी आपत्ति पटवारी ग्राम ' . $userdata['batankanBTKAddress'] . ' अथवा
न्यायालय ' . $userdata['batankanCourt'] . ' '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' में प्रस्तुत करें । अवधि गुजरने के बाद को किसी की आपत्ति मान्य नहीं होगी। <br><br> 

आज दिनांक  ____/____/'.$year.' को मेरे हस्ताक्षर एवं न्यायालय की मुद्रा से जारी किया गया । 

<p class="right-side">' . $userdata['batankanCourt'] . '<br>
'.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . '</p> 

<pre>                                        
प्रतिलिपि:- 

1.   एक प्रति तहसील कार्यालय के सूचना पटल पर चस्पा की जावे । 
2.   एक प्रति ग्राम पंचायत कार्यालय के सूचना पटल पर चस्पा की जावे। 
3.   एक प्रति ग्राम चौपाल पर चस्पा की जावे । 
4.   एक प्रति बाद निर्वाहन वापस हो । 
</pre>

                        
<p class="right-side">' . $userdata['batankanCourt'] . '<br>
'.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . '</p> ', '
<div class="fontSizing">
<p class="top-heading"><b>राजस्‍व मामले में नोटिस</b></p>
<pre>सक्षम  '.$userdata['batankanCourt'] . ' स्थान '.$batankanTappa.' ' . $userdata['batankanTahsil'] . '..........मामले                                                               <b>SL-</b> 
प्रकरण क्रमांक  '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.'                                                                                               <b>_______________,</b>
                                                                                                                                                <b>Date- __/__/'.$year.'</b>
आवेदक  ' . $userdata['batankanAvedakName'] . ' निवासी- ' . $userdata['batankanAvedakAddress'] . '
</pre>
<p class="right-side">विरूद्ध <b><u>' . $userdata['batankanAnAvedakName'] . '</u></b></p>
<p  class="top-heading">दावा</p> 
<pre>श्री/ श्रीमती ……………………………निवासी ………………………………..आपको सूचित किया जाता है कि उपयुर्क्त मामले की <b>सुनवाई<u> को दिन में दोपहर 2:00 बजे स्थान तहसील न्यायालय '.$batankanTappa.' ' . $userdata['batankanTahsil'] . ' </u></b> पर होगी |
तारीख      माह     सन '.$year.' 
मुद्रा</pre><pre class="right-side"><b>रीडर टू ' . $userdata['batankanCourt'] . ' 
'.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' </b></pre>
<pre class="top-heading">प्रष्‍टाकन क्रमांक 01
                                                                                            बुलाये गये व्‍यक्ति के हस्‍ताक्षर 
प्रष्‍टाकन क्रमांक 02</pre>  
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन '.$year.' को ................. बजे मेरे बाद तामिल किया गया ।</pre>
<p class="right-side"><b>तामील करने वाले के हस्‍ताक्षर </b></p>
<b>नोट – पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।<br>
--------------------------------------------------------------------------------</b>
<p class="top-heading"><b>राजस्‍व मामले में नोटिस</b></p>
<pre>सक्षम  '.$userdata['batankanCourt'] . ' स्थान '.$batankanTappa.' ' . $userdata['batankanTahsil'] . '..........मामले                                                                <b>SL-</b> 
प्रकरण क्रमांक  '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.'                                                                                                   <b>_______________,</b>
                                                                                                                                                 <b>Date- __/__/'.$year.'</b>
आवेदक  ' . $userdata['batankanAvedakName'] . ' निवासी- ' . $userdata['batankanAvedakAddress'] . '
</pre><p class="right-side">विरूद्ध <b><u>' . $userdata['batankanAnAvedakName'] . '</u></b></p>
<p  class="top-heading">दावा</p> 
<pre>श्री/ श्रीमती ……………………………निवासी ………………………………..आपको सूचित किया जाता है कि उपयुर्क्त मामले की <b>सुनवाई<u> को दिन में दोपहर 2:00 बजे स्थान तहसील न्यायालय '.$batankanTappa.' ' . $userdata['batankanTahsil'] . ' </u></b> पर होगी |
तारीख      माह     सन '.$year.' 
मुद्रा</pre><pre class="right-side"><b>रीडर टू ' . $userdata['batankanCourt'] . ' 
'.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' </b></pre>
<pre class="top-heading">प्रष्‍टाकन क्रमांक 01
                                                                                            बुलाये गये व्‍यक्ति के हस्‍ताक्षर 
प्रष्‍टाकन क्रमांक 02</pre>  
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन '.$year.' को ................. बजे मेरे बाद तामिल किया गया ।</pre>
<p class="right-side"><b>तामील करने वाले के हस्‍ताक्षर </b></p>
<b>नोट – पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।<br>
--------------------------------------------------------------------------------</b>
</div>', '
<pre>प्र.क्र. '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.'                                    दिनांक-</pre>
<div class="top-heading"><u><b>कथन</b></u></div>
<pre>
नाम -

पिता का नाम –

जाति-

उम्र- 

निवासी-

</pre>
मैं शपथ पुर्वक कथन करता हूँ कि में ग्राम ' . $userdata['batankanAvedakAddress'] . ' का होकर मेरे ग्राम 
' . $userdata['batankanBTKAddress'] . ' में भूमि सर्व नंबर '.$userdata['batankanServeNumber'].' रकबा '. $userdata['batankanRakba'].'  है |<br><br><br>

पूर्व में हमारे द्वारा आपसी पारिवारिक सहमति से बटवारा कर लिया है तथा मौके पर बटाकन  अनुसार काबिज होकर 
स्वतंत्र रूप से कृषि कार्य करते रहे है । मौके पर काबिज अनुसार बटाकन राजस्व अभिलेख में इंद्राज करने हेतु हमने 
तहसील कार्यालय में आवेदन प्रस्तुत किया है | यह कि मौजा पटवारी द्वारा अभिलेख पर जो बटाकन  फर्द प्रस्तुत की 
गई है, उसे मैने अच्छी तरह से देखकर समझ ली है व उसी अनुरूप हम काबिज होकर कृषि कार्य कर रहे हैं। मौके पर 
कब्जा संबंधी हमारे बीच कोई विवाद नहीं है। मौजा पटवारी द्वारा जो बटाकन  फर्द प्रस्तुत की गई है उसमें मेरी पूर्ण 
सहमति है। किसी प्रकार की कोई आपत्ति नहीं है उसके अतिरिक्त कुछ नही कहना है। कथन जैसा बोले गये वैसे लिखे 
गये कथन पढ़ानां व सही होने से स्वीकार किये गये | <br>
', '
 <pre class="top-heading"><u>कार्यालय पटवारी हल्का नंबर '.$userdata['batankanPatwariHalkNum'].' तहसील '.$batankanTappa.' ' . $userdata['batankanTahsil'] . ' जिला ' . $userdata['batankanJila'] . '</u></pre>
<pre>
प्रति, 
   श्रीमान ' . $userdata['	batankanCourt'] . ' महोदय                  
   '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' जिला ' . $userdata['batankanJila'] . '

विषय– बटांकन फर्द प्रस्तुत करने बाबत ।
</pre>
संदर्भ – पटवारी मौजा ' . $userdata['batankanBTKAddress'] . ' स्थित भूमि सर्वे नंबर ' . $userdata['batankanServeNumber'] . ' कुल रकबा ' . $userdata['batankanRakba'] . '  पर बटांकन फर्द प्रस्तुत करने बाबत<br>
<pre>                                
महोदय, 
     उपरोक्त विषयांतर्गत  निवेदन है कि आवेदक ' . $userdata['batankanAvedakName'] . ' निवासी ' . $userdata['batankanAvedakAddress'] . ' द्वारा न्यायालय ' . $userdata['batankanCourt'] . ' '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . ' के प्रकरण क्रमांक '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.' दिनांक __/__/'.$year.' के आवेदन के आधार पर न्यायालय ' . $userdata['batankanCourt'] . ' '.$batankanTappa.' तहसील ' . $userdata['batankanTahsil'] . '  द्वारा पटवारी मौजा ' . $userdata['batankanBTKAddress'] . ' से  बटांकन फर्द चाही गयी है। श्रीमान के आदेशानुसार ग्राम ' . $userdata['batankanBTKAddress'] . ' स्थित भूमि सर्व न ' . $userdata['batankanServeNumber'] . '  कुल रकबा ' . $userdata['batankanRakba'] . '  की बटांकन फर्द तैयार करने हेतु सम्बन्धित को सुचना पत्र जारी किये जाने के उपरान्त सभी आवेदकगणों कि उपस्तिथि में बटांकन फर्द  मौका कब्जानुसार तैयार की गई एवं सभी से आपसी पारिवारिक सहमति से हस्ताक्षर लिए गए । 

आगामी कार्यवाही हेतु श्रीमान की सेवा में बटांकन फर्द प्रस्तुत | 
</pre>','
<pre class="top-heading"><b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['batankanPatwariHalkNum'].' तहसील '.$batankanTappa.' ' . $userdata['batankanTahsil'] . '  जिला ' . $userdata['batankanJila'] . '</u></b></pre>

<p class="top-heading"><u>सुचना पत्र</u></p>
 <pre>       
नाम -' . $userdata['batankanAvedakName'] . '
निवासी-' . $userdata['batankanAvedakAddress'] . '

इस सूचना पत्र के माध्यम से आपको सूचित किया जाता है कि  आवेदक ' . $userdata['batankanAvedakName'] . ' निवासी ' . $userdata['batankanAvedakAddress'] . ' के आवेदन पर न्यायालय तहसीलदार तहसील दलौदा के प्रकरण क्र  '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.'  दिनांक __/__/'.$year.' के आधार पर भूमि सर्वे नंबर ' . $userdata['batankanServeNumbe'] . ' कुल रकबा ' . $userdata['batankanRakba'] . ' की बटांकन फर्द तैयार करने की कार्यवाही दिनांक          /      /'.$year.' को पटवारी मौजा द्वारा मौके पर किया जाना प्रस्तावित है ।  
अतः आप निम्न कृषक निर्धारित दिनांक को मौका स्थल पर उपस्थित रहे । 
अनुपस्थिति कि दशा में मौका कब्जानुसार बटांकन फर्द तैयार कर दी जावेगी जिसकी समस्त जिम्मेदारी आपकी होगी ।   
</pre>
<p class="right-side">पटवारी</p>
<pre>
आवेदकगण 
         ' . $userdata['batankanAvedakName'] .'
</pre>         
', '                   
<p class="top-heading"><b><u>न्‍यायालय  ' . $userdata['batankanCourt'] . ' तहसील '.$batankanTappa.' ' . $userdata['batankanTahsil'] . ', जिला –  ' . $userdata['batankanJila'] . '(म.प्र.) </u></b></p>
<pre>आर सी एम एस प्रकरण क्रमांक - '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.'</pre>

<pre class="right-side"><b>' . $userdata['batankanAvedakName'] . '</b>,   
निवासी -  <b>' . $userdata['batankanAvedakAddress'] . '
..........आवेदक</b>
विरूद्ध     
<b>' . $userdata['batankanAnAvedakName'] . ' 
' . $userdata['batankanAnAvedakAddress'] . '
..........अनावेदक</b></pre>
<pre class="top-heading"><b>***//आदेश//***</b>
पारित दिनांक -<u> ___/___/'.$year.' </u>
<u>(मध्यप्रदेश भू –राजस्व संहिता 1959 की धारा 109,110 के तहत नामान्तरण सम्बन्धी)</u></pre>
<pre>      प्रकरण का संक्षिप्त विवरण इस प्रकार है कि आवेदक ' .$userdata['batankanAvedakName'] .' निवासी ' .$userdata['batankanAvedakAddress'] .' द्वारा म.प्र.भू.राजस्व संहिता 1959 की धारा 68 के तहत आवेदन पत्र प्रस्तुत कर ग्राम ' .$userdata['batankanBTKAddress'] .' तहसील ' .$userdata['batankanTahsil'] .' स्थित भूमि सर्वे नम्बर ' .$userdata['batankanServeNumber'] .' रकबा ' .$userdata['batankanRakba'] .' भूमि का बटाकंन किया जाने का निवेदन किया गया |आवेदक ने आवेदन के समर्थन में खसरा, बी-1 सलंगन की गई |</pre> 
                                    
<pre>    प्रकरण मद अ-3 में दर्ज किया गया   |  प्रकरण में पटवारी मौजा से बटाकंन फर्द व नक्षा ट्रेस चाही गई |पटवारी मौजा द्वारा मौका कब्ज़ा अनुसार प्रस्तावित बटाकंन फर्द व नक्षा ट्रेस तैयार कर प्रस्तुत की गई| प्रकरण में पटवारी मौजा द्वारा प्रस्तुत बटाकंन फर्द पर कृषकों के द्वारा समक्ष में बताया गया की पटवारी मौजा द्वारा बटाकंन फर्द व नक्षा ट्रेस अनुसार ग्राम ' .$userdata['batankanBTKAddress'] .' तहसील ' .$userdata['batankanTahsil'] .' की आवेदित भूमि का बटाकंन फर्द व नक्षा ट्रेस किया जाने में कृषकों की सहमति होकर किसी प्रकार की कोई आपत्ति नहीं है |</pre>
                                                
<pre>     मेरे द्वारा सम्पूर्ण प्रकरण का अवलोकन, अध्ययन , सूक्षम परिक्षण किया गया |   प्रकरण में कृषकों द्वारा ग्राम ' .$userdata['batankanBTKAddress'] .' तहसील ' .$userdata['batankanTahsil'] .' स्थित भूमि सर्वे नम्बर ' .$userdata['batankanServeNumber'] .'  रकबा ' .$userdata['batankanRakba'] .' का बटाकंन चाहा गया है तथा पटवारी मौजा से प्राप्त बटाकंन फर्द व नक्षा ट्रेस अनुसार आवेदित भूमि के प्रस्तुत बटाकंन फर्द में आवेदकगणों ने बटाकंन फर्द व नक्षा ट्रेस अनुसार बटाकंन किये जाने में सहमति व्यक्त की गई है |फलत: आवेदक द्वारा प्रस्तुत आवेदन पत्र स्वीकार किया जाकर ग्राम ' .$userdata['batankanBTKAddress'] .' तहसील ' .$userdata['batankanTahsil'] .' स्थित भूमि सर्वे नम्बर ' .$userdata['batankanServeNumber'] .' रकबा ' .$userdata['batankanRakba'] .' भूमि का पटवारी मौजा द्वारा प्रस्तुत बटाकंन फर्द  व नक्षा ट्रेस अनुसार बटाकंन मध्यप्रदेश भू-राजस्व संहिता 1959 की धारा 68 के तहत स्वीकृत किया जाता है |<b> स्वीकृत बटाकन फर्द व नक्षा ट्रेस आदेश का अभिन्न अंग रहेगी</b>|आदेश की एक प्रति पटवारी मौजा को भेजी जाकर राजस्व अभिलेख में अमल उपरांत संशोधित खसरा प्रति मंगाई जाये | बाद पूर्णता प्रकरण समाप्त होकरदाखिल रिकॉर्ड दाखिल हो | </pre>                 
<p class="top-heading"><b><u>आदेश आज दिनांक - ___/___/'.$year.' को मेरे बोलने पर टंकन किया गया
व मेरे हस्‍ताक्षर व न्‍यायालयीन पद मुद्रा से जारी किया गया।</u><b></p>

<p class="right-side"><b>' .$userdata['batankanCourt'] .'<br>
'.$batankanTappa.' तहसील - '.$userdata['batankanTahsil'] .'</b></p>   
<pre>क्रमांक    /री-1/'.$year.'                                        '.$batankanTappa.' ' .$userdata['batankanTahsil'] .' दिनांक- ___/___/'.$year.' </pre>
<pre>                                                                                                                                              
प्रतिलिपि,
       पटवारी मोजा ' .$userdata['batankanBTKAddress'] .' तहसील ' .$userdata['batankanTahsil'] .' आदेशानुसार राजस्‍व रिकार्ड में अमल कर पालन प्रतिवेदन 07 दिवस में प्रस्‍तुत करें।</pre>
                    
<p class="right-side"><b>' .$userdata['batankanCourt'] .' <br>
'.$batankanTappa.' तहसील - ' .$userdata['batankanTahsil'] .'</b></p> 
</pre>  
</body>
</html>'
    ];
    $tableNameForm = 'saar_batankan';
    $formNameForm = 'भूमि बटांकन';
    $primaryKeys = 'batankanId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}




function generatebatankanFormNormal($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_batankan` WHERE `batankanId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['batankanTappa']!=""){
        $batankanTappa ="टप्पा ".$userdata['batankanTappa'];
    }else{
        $batankanTappa = "";
    }

    $html = ['<html>
    <head>
        <meta charset="utf-8">
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
               margin-right:5%;
            } 
            .right-side-box{
                text-align: center;
                margin-left: 60%;
          }
          .frontspace {
            text-indent: 55px;
          }
          .textleft {
            text-align: start;
          }
        .table-css{
            width:100%;
            border-collapse: collapse;
        }
    </style>
    </head>
    <body>
<div class="top-heading"><b><u>न्यायालय श्रीमान ' . $userdata['batankanCourt'] . ' महोदय '.$batankanTappa.' तहसील '. $userdata['batankanTahsil'] . ' जिला ' . $userdata['batankanJila'] . '</u></b></div>
<p class="right-side">प्र. क्र. '.$userdata['batankanPNumber'].'/अ-3/'.$year.'-'.$yearPlue.' </p>
<pre> 
' . $userdata['batankanAvedakName'] . ' 
 निवासी ' . $userdata['batankanAvedakAddress'] . '  
                विरूध्द 
म. प्र. शासन                      --------------अनावेदक</pre>
<p class="top-heading"><mark><b>आवेदन पत्र बटांकन अंतर्गत धारा 68  म. प्र. भू. रा. सं. 1959</b></mark></p>
<pre>
महोदय,<br><br>

प्रार्थी की ओर से निम्नवत आवेदन पत्र प्रस्तुत है- <br><br>

यह कि प्रार्थी के नाम पर '.$userdata['batankanBTKAddress'].' तहसील '.$userdata['batankanTahsil'].' मे  खाता निम्नानुसार 
है-  </pre> 
<b>सर्व नंबर '.$userdata['batankanServeNumber'].' कुल रकबा '. $userdata['batankanRakba'].'</b> <br><br>

यह कि प्रार्थी ओर विपक्षीगण के मध्य उक्त भूमि के समबन्ध मे पूर्व मे मोखिक रूप से आपसी बटाकन  हो चुका है 
ओर उसी अनुसार मोके पर काबीज है लेकिन रिकार्ड  मे आज तक बटाकन  नही हुआ है। <br><br>

यह कि यह आवेदन पत्र म.प्र.भू.रा.सं. 1959 के तहत प्रस्तुत होकर आदरणीय न्यायालय को आवेदन पत्र पर सुनवाई 
का अधिकार प्राप्त है। <br>

अत: श्रीमान से निवेदन है कि ग्राम '.$userdata['batankanBTKAddress'].' स्थित उपर वर्णित सर्वे नंबर अनुसार मौजा पटवारी से बटाकन  फर्द तलब 
कर बटाकन  स्वीकृत करने का कष्ट करे । <br><br>
<pre>
  प्रार्थी  
</pre>
' . $userdata['batankanAvedakName'] . ' 
', '
<pre>प्र.क्र. '. $userdata['batankanPNumber'] . '/अ-27/'.$year.'-'.$yearPlue.'                                    दिनांक-</pre>
<div class="top-heading"><u><b>कथन</b></u></div>
<pre>
नाम -

पिता का नाम –

जाति-

उम्र- 

निवासी-

</pre>
मैं शपथ पुर्वक कथन करता हूँ कि में ग्राम ' . $userdata['batankanAvedakAddress'] . ' का होकर मेरे ग्राम 
' . $userdata['batankanBTKAddress'] . ' में भूमि सर्व नंबर '.$userdata['batankanServeNumber'].' रकबा '. $userdata['batankanRakba'].'  है |<br><br><br>

पूर्व में हमारे द्वारा आपसी पारिवारिक सहमति से बटवारा कर लिया है तथा मौके पर बटाकन  अनुसार काबिज होकर 
स्वतंत्र रूप से कृषि कार्य करते रहे है । मौके पर काबिज अनुसार बटाकन राजस्व अभिलेख में इंद्राज करने हेतु हमने 
तहसील कार्यालय में आवेदन प्रस्तुत किया है | यह कि मौजा पटवारी द्वारा अभिलेख पर जो बटाकन  फर्द प्रस्तुत की 
गई है, उसे मैने अच्छी तरह से देखकर समझ ली है व उसी अनुरूप हम काबिज होकर कृषि कार्य कर रहे हैं। मौके पर 
कब्जा संबंधी हमारे बीच कोई विवाद नहीं है। मौजा पटवारी द्वारा जो बटाकन  फर्द प्रस्तुत की गई है उसमें मेरी पूर्ण 
सहमति है। किसी प्रकार की कोई आपत्ति नहीं है उसके अतिरिक्त कुछ नही कहना है। कथन जैसा बोले गये वैसे लिखे 
गये कथन पढ़ानां व सही होने से स्वीकार किये गये | <br>
</body>
</html>'
    ];
    $tableNameForm = 'saar_batankan';
    $formNameForm = 'भूमि बटांकन';
    $primaryKeys = 'batankanId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}


?>