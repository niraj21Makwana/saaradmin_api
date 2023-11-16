<?php
include('../genreater-multipage-function.php');

function generatebatwaraForm($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_batwara` WHERE `batwaraId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['batwaraTappa']!=""){
        $batwaraTappa ="टप्पा ".$userdata['batwaraTappa'];
    }else{
        $batwaraTappa = "";
    }

    $html = ['<html>
    <head>
    <meta charset="utf-8" />
    <style>
      body {
            font-size: 12.5pt;
            justify-content: space-evenly;
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
           margin-right:10%;
        } 
        .right-side-box{
            text-align: center;
            margin-left: 60%;
        }
        .collapsetable{
        width:100%;
        font-size:14px;
            border-collapse: collapse;
            border: 1px solid black;
            vertical-align:top;
        }
    </style>
    </head>
<body>
<pre class="top-heading"><b><u>न्यायालय श्रीमान '.$userdata['batwaraCourt'].' महोदय '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '. $userdata['batwaraJilla'].'</u></b></pre>
<div class="top-heading">प्र. क्र.</div>
<pre>'.$userdata['batwaraAvedakName'].'
निवासी - '.$userdata['batwaraAvedakAddress'].'
            विरूध्द</pre> 
<pre>म. प्र. शासन                                      --------------अनावेदक</pre>
<div class="top-heading"><mark>आवेदन पत्र बटवारा अंतर्गत धारा '.$userdata['batwaraDhara'].' म. प्र. भू. रा. सं. 1959</mark></div>
<pre>
महोदय,

प्रार्थी की ओर से निम्नवत आवेदन पत्र प्रस्तुत है-

यह कि प्रार्थी के नाम पर ग्राम '.$userdata['batwaraBTAddress'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' मे  खाता निम्नानुसार है-
<b>सर्व नंबर '.$userdata['batwaraServeNumber'].' कुल सर्वे नंबर '.$userdata['batwaraKulServeNumber'].' कुल रकबा '.$userdata['batwaraRakba'].' हेक्टेयर</b>

यह कि प्रार्थी ओर विपक्षीगण के मध्य उक्त भूमि के समबन्ध मे पूर्व मे मोखिक रूप से आपसी बंटवारा हो चुका है ओर उसी अनुसार मोके पर काबीज है लेकिन रिकार्ड मे आज तक बंटवारा नही हुआ है। 

यह कि यह आवेदन पत्र म.प्र.भू.रा.सं. 1959 के तहत प्रस्तुत होकर आदरणीय न्यायालय को आवेदन पत्र पर सुनवाई का अधिकार प्राप्त है। 

अत: श्रीमान से निवेदन है कि ग्राम '.$userdata['batwaraBTAddress'].' स्थित उपर वर्णित सर्वे नंबर अनुसार मौजा पटवारी से बंटवारा फर्द एवं बटाकन फर्द तलब कर बंटवारा स्वीकृत करने का कष्ट करे । 

प्रार्थी  
'.$userdata['batwaraAvedakName'].' 
निवासी '.$userdata['batwaraAvedakAddress'].'
</pre>','
<pre class="top-heading" style="font-size:14px">
फार्म अ
(परिपत्र दो-1 की कण्डिका 6 देखिये)
राजस्‍व आदेश - पत्र ( रेवेन्‍यू ऑर्डर शीट)
</pre>
<pre style="font-size:14px">न्यायालय '.$userdata['batwaraCourt'].' महोदय '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' के न्यायालय में मामला क्रमांक<b>'.$userdata['batwaraParNumber'].'/अ-27/'.$year.'-'.$yearPlue.' विषय बंटवारा बाबत</b> प्रकरण की श्रेणी जाँच प्रतिवेदन ग्राम बंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['batwaraPatwariHalkNum'].' '.$userdata['batwaraJilla'].' कलेक्टर का प्रकरण क्रमांक सन 200 -200  तहसीलदार का प्रकरण क्रमांक............... सन 200 -200 नायब तहसीलदार का प्रकरण क्रमांक................सन 200 -200</pre>
<table border="1" class="collapsetable">
<tr><td><pre>आदेश क्रमांक 
कार्यवाही की 
तारीख और स्थान 
    (1)</pre></td>
<td>पीठासीन अधिकारी के हस्ताक्षर सहित आवेदन-पत्र अथवा कार्यवाही<br> 
(2)</div></td>
<td><pre>जहां आवश्यक हो पर्ची
अथवा वकीलों के
हस्ताक्षर,आदेशों के 
पालन करवाकर लिपिक 
के संक्षिप्त हस्ताक्षर और 
प्रकरण की तारीख 
(3)</pre></td></tr>
<tr><td><pre>_____/_____/'.$year.'</pre></td>
<td>
आवेदक <b>'.$userdata['batwaraAvedakName'].' निवासी '. $userdata['batwaraAvedakAddress'].'</b> 
द्वारा मध्यप्रदेश भू राजस्व संहिता 1959 की धारा '.$userdata['batwaraDhara'].' के तहत
आवेदन प्रस्तुत कर ग्राम '.$userdata['batwaraBTAddress'].' स्थित भूमि कृषि सर्वे क्रमांक '.$userdata['batwaraServeNumber'].' रकबा '.$userdata['batwaraRakba'].' का बंटवारा किये जाने का निवेदन किया गया।
<br>
<br>
-  प्रकरण दर्ज किया जावे ।<br>
-  विज्ञप्ति जारी की जावे ।<br>
-  पटवारी मौजा से बंटवारा फर्द ली जावे।<br>
-  आवेदक तलब हो ।<br>
<br>
<br>
पेशी दिनांक :-
<br>
<pre>
                                                        '.$userdata['batwaraCourt'].'
                                                        '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].'

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
</table>','
<pre class="top-heading"><b>न्यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '.$userdata['batwaraJilla'].'</b></pre>
<pre class="top-heading">क्रमांक      /री-1/'.$year.'                                    '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].',दिनांक    /    /'.$year.'</pre>
<pre>प्रति,
पटवारी
ग्राम :- <b>'.$userdata['batwaraBTAddress'].'</b>
विषय:- प्रकरण में बंटवारा फर्द प्रस्तुत करने बाबत ।
</pre>
<pre class="top-heading">***********</pre>
<pre>उपरोक्त विषयांतर्गत लेख है आवेदक <b>'.$userdata['batwaraAvedakName'].' ग्राम '.$userdata['batwaraAvedakAddress'].'</b> स्थित भूमि सर्वे क्रमांक <b>'.$userdata['batwaraServeNumber'].' कुल सर्वे क्र. '.$userdata['batwaraKulServeNumber'].' कुल</b> रकबा <b>'.$userdata['batwaraRakba'].'</b> हेक्टेयर पर बंटवारा किये जाने हेतु आवेदन प्रस्तुत किया गया है । आवेदन की प्रति इस पत्र के संलग्न आपकी ओर प्रेषित की जा रही है ।

            अतः उक्त प्रकरण में नियत पेशी दिनांक      /     /'.$year.' के पूर्व मोके पर पक्षकारों की उपस्थिति में बंटवारा फर्द एवं पंचनामा तैयार कर बंटवारा फर्द मय पंचनामा इस न्यायालय में प्रस्तुत करें ।
            

</pre>
<pre class="right-side">
'.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].'</pre>','
<pre class="top-heading"><b>न्यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '.$userdata['batwaraJilla'].'</b>
(ब मामले वाद धारा '.$userdata['batwaraDhara'].' म.प्र.भू राजस्व संहिता बंटवारा)</pre>
प्रकरण क्रमांक <b>'.$userdata['batwaraParNumber'].'/अ-27/'.$year.'-'.$yearPlue.'</b>
<h4 class="top-heading"><b>उदघोषणा</b></h4>
<pre>सर्व साधारण को सूचित किया जाता है कि ग्राम <b>'.$userdata['batwaraBTAddress'].'</b> स्थित भूमि सर्वे क्रमांक <b>'.$userdata['batwaraServeNumber'].'</b> रकबा <b>'.$userdata['batwaraRakba'].'</b> का आवेदक <b>'.$userdata['batwaraAvedakName'].' निवासी '.$userdata['batwaraAvedakAddress'].'</b> द्वारा प्रस्तुत आवेदन पर बंटवारा हेतु न्यायालय में कार्यवाही जारी है।

अतएव जिस किसी को आपत्ति हो विज्ञप्ति चस्पा होने के दिन से 30 दिनों के अंदर अपनी आपत्ति पटवारी ग्राम 113 अथवा न्यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' में प्रस्तुत करें ।अवधि गुजरने के बाद को किसी की आपत्ति मान्य नहीं होगी।

आज दिनांक <b>    /      /'.$year.' </b> को मेरे हस्ताक्षर एवं न्यायालय की मुद्रा से जारी किया गया ।


</pre>
<pre class="right-side">'.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].'</pre>
<pre>                   
प्रतिलिपि:-

1. एक प्रति तहसील कार्यालय के सूचना पटल पर चस्पा की जावे ।
2. एक प्रति ग्राम पंचायत कार्यालय के सूचना पटल पर चस्पा की जावे।
3. एक प्रति ग्राम चौपाल पर चस्पा की जावे ।
4. एक प्रति बाद निर्वाहन वापस हो ।


</pre>
<pre class="right-side">'.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].'</pre>','
<div class="fontSizing"><pre class="top-heading"><b>राजस्‍व मामले में नोटिस </b></pre>
<pre>समक्ष '.$userdata['batwaraCourt'].' स्‍थान '.$batwaraTappa.' '.$userdata['batwaraTahsil'].' मामले                                                             <b>S.L.-</b>
के विषय मृतक नामांतरण मामला                                                                                           <b>Date-    /    /'.$year.'</b>
प्रकरण क्रमांक <b>'.$userdata['batwaraParNumber'].'/अ-27/'.$year.'-'.$yearPlue.'</b>
आवेदक <b>'.$userdata['batwaraAvedakName'].' निवासी '.$userdata['batwaraAvedakAddress'].'</b>
<p class="right-side">विरूद्ध '.$userdata['batwaraEnAvedakName'].'</p></pre>
<pre class="top-heading">दावा</pre>
<pre>श्री/श्रीमती.................निवासी................आपको सूचित किया जाता है कि उपयुर्क्त मामले की <b><u>सुनवाई          को दिन में दोपहर 2:00 बजे स्थान तहसील न्यायालय '.$userdata['batwaraTahsil'].'</u></b> पर होगी |
तारीख      माह     सन '.$year.'
<b>मुद्रा</b></pre>
<pre class="right-side">रीडर टू '.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].'</pre>
<pre class="top-heading">प्रष्‍टाकन क्रमांक 01
                        बुलाये गये व्‍यक्ति के हस्‍ताक्षर 
प्रष्‍टाकन क्रमांक 02 </pre>
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन '.$year.' को ...........बजे मेरे बाद तामिल किया गया ।</pre>
<pre class="right-side"><b>तामील करने वाले के हस्‍ताक्षर</b></pre>
<b>नोट :- पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>
<hr style="color:black;background-color:black;">
<pre class="top-heading"><b>राजस्‍व मामले में नोटिस </b></pre>
<pre>समक्ष '.$userdata['batwaraCourt'].' स्‍थान '.$batwaraTappa.' '.$userdata['batwaraTahsil'].' मामले                                                              <b>S.L.-</b>
के विषय मृतक नामांतरण मामला                                                                                         <b>Date-    /    /'.$year.'</b>
प्रकरण क्रमांक <b>'.$userdata['batwaraParNumber'].'/अ-27/'.$year.'-'.$yearPlue.'</b>
आवेदक <b>'.$userdata['batwaraAvedakName'].' निवासी '.$userdata['batwaraAvedakAddress'].'</b>
<p class="right-side">विरूद्ध '.$userdata['batwaraEnAvedakName'].'</p></pre>
<pre class="top-heading">दावा</pre>
<pre>श्री/श्रीमती.................निवासी................आपको सूचित किया जाता है कि उपयुर्क्त मामले की <b><u>सुनवाई          को दिन में दोपहर 2:00 बजे स्थान तहसील न्यायालय '.$userdata['batwaraTahsil'].'</u></b> पर होगी |
तारीख      माह     सन '.$year.'
<b>मुद्रा</b></pre>
<pre class="right-side">रीडर टू '.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].'</pre>
<pre class="top-heading">प्रष्‍टाकन क्रमांक 01
                        बुलाये गये व्‍यक्ति के हस्‍ताक्षर 
प्रष्‍टाकन क्रमांक 02 </pre>
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन '.$year.' को ...........बजे मेरे बाद तामिल किया गया ।</pre>
<pre class="right-side"><b>तामील करने वाले के हस्‍ताक्षर</b></pre>
<b>नोट :- पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>
</div>','
<pre>प्र.क्र.                                                                                             दिनांक-</pre>
<pre class="top-heading"><b><u>कथन<u></b></pre>
<pre>नाम -

पिता का नाम -

जाति -

उम्र -

निवासी -

मैं शपथ पुर्वक कथन करता हूँ कि में '.$userdata['batwaraAvedakAddress'].' का होकर मेरे ग्राम <b>'.$userdata['batwaraBTAddress'].'</b> में भूमि सर्व नंबर <b>'.$userdata['batwaraServeNumber'].' रकबा '.$userdata['batwaraRakba'].' है |</b>

पूर्व में हमारे द्वारा आपसी पारिवारिक सहमति से बंटवारा कर लिया है तथा मौके पर बंटवारा अनुसार काबिज होकर स्वतंत्र रूप से कृषि कार्य करते रहे है । मौके पर काबिज अनुसार बटवारा राजस्व अभिलेख में इंद्राज करने हेतु हमने तहसील कार्यालय में आवेदन प्रस्तुत किया है | यह कि मौजा पटवारी द्वारा अभिलेख पर जो बंटवारा फर्द प्रस्तुत की गई है, उसे मैने अच्छी तरह से देखकर समझ ली है व उसी अनुरूप हम काबिज होकर कृषि कार्य कर रहे हैं। मौके पर कब्जा संबंधी हमारे बीच कोई विवाद नहीं है। मौजा पटवारी द्वारा जो बटवारा फर्द प्रस्तुत की गई है उसमें मेरी पूर्ण सहमति है। किसी प्रकार की कोई आपत्ति नहीं है उसके अतिरिक्त कुछ नही कहना है। कथन जैसा बोले गये वैसे लिखे गये कथन पढ़ानां व सही होने से स्वीकार किये गये | 
</pre>','
<pre class="top-heading"><b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['batwaraPatwariHalkNum'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '.$userdata['batwaraJilla'].'</u></b></pre>
<pre>प्रति,

    श्रीमान '.$userdata['batwaraCourt'].'
    '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '.$userdata['batwaraJilla'].'

विषय - बटवारा फर्द प्रस्तुत करने बाबत । 

संदर्भ - पटवारी मौजा '.$userdata['batwaraBTAddress'].' स्थित भूमि सर्वे नंबर '.$userdata['batwaraServeNumber'].' कुल किता '.$userdata['batwaraKulServeNumber'].' कुल कुल रकबा '.$userdata['batwaraRakba'].' पर बटवारा फर्द प्रस्तुत करने बाबत ।

महोदय, 
                                    
    उपरोक्त विषयांतर्गत निवेदन है कि आवेदक '.$userdata['batwaraAvedakName'].' निवासी '.$userdata['batwaraAvedakAddress'].' द्वारा न्यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' के प्रकरण क्रमांक '.$userdata['batwaraParNumber'].'/अ-27/'.$year.'-'.$yearPlue.' दिनांक              के आवेदन के आधार पर न्यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' द्वारा पटवारी मौजा '.$userdata['batwaraBTAddress'].' से बटवारा फर्द चाही गयी है । श्रीमान के आदेशानुसार ग्राम '.$userdata['batwaraBTAddress'].' स्थित भूमि सर्व न '.$userdata['batwaraServeNumber'].' कुल किता '.$userdata['batwaraKulServeNumber'].' कुल कुल रकबा '.$userdata['batwaraRakba'].' की बटवारा फर्द तैयार करने हेतु सम्बन्धित को सुचना पत्र जारी किये जाने के उपरान्त सभी आवेदकगणों कि उपस्तिथि में बटवारा फर्द  मौका कब्जानुसार तैयार की गई एवं सभी से आपसी पारिवारिक सहमति से हस्ताक्षर लिए गए । 

आगामी कार्यवाही हेतु श्रीमान की सेवा में बटवारा फर्द प्रस्तुत |

</pre>','
<pre class="top-heading"><u><b>कार्यालय पटवारी हल्का नंबर '.$userdata['batwaraPatwariHalkNum'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '.$userdata['batwaraJilla'].'
सुचना पत्र</u></b></pre>
<pre>

<b>नाम - '.$userdata['batwaraAvedakName'].'

निवासी - '.$userdata['batwaraAvedakAddress'].'</b>

इस सूचना पत्र के माध्यम से आपको सूचित किया जाता है कि आवेदक '.$userdata['batwaraAvedakName'].' निवासी '.$userdata['batwaraAvedakAddress'].' के आवेदन पर न्यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' के प्रकरण क्र<b>'.$userdata['batwaraParNumber'].'/अ-27/'.$year.'-'.$yearPlue.' दिनांक                 के आधार पर भूमि सर्वे नंबर '.$userdata['batwaraServeNumber'].' कुल किता '.$userdata['batwaraKulServeNumber'].' कुल कुल रकबा '.$userdata['batwaraRakba'].'</b> की बटवारा फर्द तैयार करने की कार्यवाही दिनांक   /  /'.$year.' को पटवारी मौजा द्वारा मौके पर किया जाना प्रस्तावित है ।

अतः आप निम्न कृषक निर्धारित दिनांक को मौका स्थल पर उपस्थित रहे । 

अनुपस्थिति कि दशा में मौका कब्जानुसार बटवारा फर्द तैयार कर दी जावेगी जिसकी समस्त जिम्मेदारी आपकी होगी ।   



</pre>
<pre class="right-side">पटवारी</pre>

<pre>आवेदकगण

'.$userdata['batwaraAvedakName'].'</pre>','
<pre class="top-heading"><b><u>न्‍यायालय '.$userdata['batwaraCourt'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].', जिला - '.$userdata['batwaraJilla'].'(म.प्र.)
आर सी एम एस प्रकरण क्रमांक -'.$userdata['batwaraParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</u></b></pre>
<pre class="right-side">'.$userdata['batwaraAvedakName'].'
निवासी - '.$userdata['batwaraAvedakAddress'].'
..........आवेदक
विरूद्ध
'.$userdata['batwaraEnAvedakName'].'
..........अनावेदक</pre>
<pre class="top-heading"><b>//आदेश//
आज दिनांक    /   /'.$year.' को पारित
(मध्यप्रदेश भू –राजस्व संहिता 1959 की धारा 109,110 के तहत नामान्तरण सम्बन्धी)</b></pre>
<pre>प्रकरण का संक्षिप्‍त विवरण इस प्रकार है कि आवेदक '.$userdata['batwaraAvedakName'].' निवासी - ग्राम '.$userdata['batwaraAvedakAddress'].' के द्वारा भू-राजस्‍व संहिता 1959 की धारा '.$userdata['batwaraDhara'].' के तहत आवेदन पत्र प्रस्‍तुत कर उल्‍लेखित किया गया कि आवेदक  के नाम से ग्राम - '.$userdata['batwaraBTAddress'].' '.$batwaraTappa.' तहसील - '.$userdata['batwaraTahsil'].', जिला- '.$userdata['batwaraJilla'].' में स्थित भूमि सर्वे नम्‍बर '.$userdata['batwaraServeNumber'].' भूमि स्थित है। उपरोक्‍त भूमि के संबंध में आवेदकगण के मध्‍य आपसी बॅटवारा हो चूका है, उसी अनुसार काबिज है, उक्‍त बॅटवारा अनुसार मौके पर आवेदकगण काबिज होकर कास्‍त कर रहे है और उक्‍त बॅटवारा फर्द तलब कर बॅटवारा किया जाने का निवेदन किया गया ।<br>
                    प्रकरण अ-27 में पंजीबद्ध किया जाकर विज्ञप्ति का प्रकाशन किया गया व पटवारी मोजा '.$userdata['batwaraBTAddress'].' से बॅटवारा फर्द तलब की गई । प्रकरण में विज्ञप्ति प्रकाशन उपरांत कोई भी आपत्ति प्राप्‍त नही हुई। पटवारी मौजा द्वारा मौका कब्‍जा अनुसार प्रस्‍तावित बटवारा फर्द तैयार कर प्रस्‍तुत की गई ।<br>
                    प्रकरण में पटवारी मौजा द्वारा प्रस्‍तुत बॅटवारा फर्द पर आवेदकगणो के द्वारा अपने कथन में सहमति व्‍यक्‍त करते हुए समक्ष में बताया की पटवारी मौजा द्वारा प्रकरण में प्रस्‍तुत बटवारा फर्द अनुसार आवेदित भूमि का बटवारा किया जाने में उनकी सहमति होकर किसी प्रकार की कोई आपत्ति नहीं है और बटवारा फर्द पर सहमति के हस्‍ताक्षर किये गये ।व समक्ष में व्‍यक्‍त किया तथामौके पर आवेदित भूमि का आपसी विभाजन हो चूका है तथा अपने हिस्‍से में आयी भूमि पर पृथक - पृथक काबीज होकर कास्‍त कर रहे है ।<br>
मेर द्वारा सम्पूर्ण प्रकरण का अवलोकन अध्‍ययन व सूक्ष्म परिक्षण किया गया । प्रकरण में आवेदकगणों द्वारा ग्राम - '.$userdata['batwaraBTAddress'].' '.$batwaraTappa.' तहसील - '.$userdata['batwaraTahsil'].', जिला -'.$userdata['batwaraJilla'].' में स्थित भूमि सर्वे नम्‍बर '.$userdata['batwaraServeNumber'].' का बटवारा चाहा गया है तथा पटवारी मौजा द्वारा प्रस्‍तत बटवारा फर्द में आवेदकगणों ने बटवारा फर्द अनुसार बटवारा किये जाने में सहमति व्‍य‍क्‍त की गई है। फलत: आवेदकगणों द्वारा प्रस्‍तुत आवेदन पत्र स्‍वीकार किया जाकर ग्राम - '.$userdata['batwaraBTAddress'].' '.$batwaraTappa.' तहसील - '.$userdata['batwaraTahsil'].', जिला -'.$userdata['batwaraJilla'].' में स्थित भूमि सर्वे नम्‍बर '.$userdata['batwaraServeNumber'].' का बटवारा पटवारी मौजा द्वारा प्रस्‍तुत बटवारा फर्द अनुसार म.प्र.भू राजस्‍व संहिता 1959 की धारा '.$userdata['batwaraDhara'].' के तहत स्‍वीकृत किया जाकर पटवारी मौजा '.$userdata['batwaraBTAddress'].' द्वारा प्रस्‍तुत बटवारा फर्द स्‍वीकृत की जाती है। <b><u>स्‍वीकृत बटवारा फर्द आदेश का अभिन्‍न अंग रहेगी ।</u></b> आदेश की एक प्रति पटवारी मौजा को भेजी जाकर राजस्‍व अभिलेख में अमल उपरांत संशोधित खसरा प्रति मंगाई जाये। आवेदकगण नियमानुसार बटवारा स्‍टाम्‍प शुल्‍क जमा कराये। बाद पुर्णता प्रकरण समाप्‍त होकर दाखिल रिकार्ड हो। 
</pre><pre class="top-heading"><b><u>आदेश आज दिनांक        /       /'.$year.' को मेरे बोलने पर टंकन किया गया
व मेरे हस्‍ताक्षर व न्‍यायालयीन पद मुद्रा से जारी किया गया।</u></b>


</pre>
<pre class="right-side">'.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील - '.$userdata['batwaraTahsil'].'</pre>
<pre class="top-heading">क्रमांक     /री-1/'.$year.'                                       '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].',दिनांक   /   /'.$year.'</pre>
<pre>प्रतिलिपि, 
        पटवारी मोजा '.$userdata['batwaraBTAddress'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' आदेशानुसार राजस्‍व रिकार्ड में अमल कर पालन प्रतिवेदन 07 दिवस में प्रस्‍तुत करें।
संलग्न :- 	स्‍वीकृत बॅटवारा फर्द।</pre>
<pre class="right-side"><b>'.$userdata['batwaraCourt'].'
'.$batwaraTappa.' तहसील - '.$userdata['batwaraTahsil'].'</b></pre> 
</body>
</html>'];



    $tableNameForm = 'saar_batwara';
    $formNameForm = 'भूमि बटवारा';
    $primaryKeys = 'batwaraId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

function generatebatwaraFormNormal($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM saar_batwara WHERE batwaraId='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['batwaraTappa']!=""){
        $batwaraTappa ="टप्पा ".$userdata['batwaraTappa'];
    }else{
        $batwaraTappa = "";
    }

    $html = ['<html>
    <head>
    <meta charset="utf-8" />
    <style>
      body {
            font-size: 13pt;
            justify-content: space-evenly;
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
            border-collapse: collapse;
            border: 1px solid black;
            border-left: 0px solid white;
            border-right: 0px solid white;
        }
    </style>
    </head>
<body>
<pre class="top-heading><b><u>न्यायालय श्रीमान '.$userdata['batwaraCourt'].' महोदय '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' जिला '. $userdata['batwaraJilla'].'</u></b></pre>
<div class="top-heading>प्र. क्र.</div>
<pre>'.$userdata['batwaraAvedakName'].'
निवासी - '.$userdata['batwaraAvedakAddress'].'
            विरूध्द</pre> 
<pre>म. प्र. शासन                                      --------------अनावेदक</pre>
<div class="top-heading"><mark>आवेदन पत्र बटवारा अंतर्गत धारा '.$userdata['batwaraDhara'].' म. प्र. भू. रा. सं. 1959</mark></div>
<pre>
महोदय,

प्रार्थी की ओर से निम्नवत आवेदन पत्र प्रस्तुत है-

यह कि प्रार्थी के नाम पर ग्राम '.$userdata['batwaraBTAddress'].' '.$batwaraTappa.' तहसील '.$userdata['batwaraTahsil'].' मे  खाता निम्नानुसार है-
<b>सर्व नंबर '.$userdata['batwaraServeNumber'].' कुल सर्वे नंबर '.$userdata['batwaraKulServeNumber'].' कुल रकबा '.$userdata['batwaraRakba'].' हेक्टेयर</b>

यह कि प्रार्थी ओर विपक्षीगण के मध्य उक्त भूमि के समबन्ध मे पूर्व मे मोखिक रूप से आपसी बंटवारा हो चुका है ओर उसी अनुसार मोके पर काबीज है लेकिन रिकार्ड मे आज तक बंटवारा नही हुआ है। 

यह कि यह आवेदन पत्र म.प्र.भू.रा.सं. 1959 के तहत प्रस्तुत होकर आदरणीय न्यायालय को आवेदन पत्र पर सुनवाई का अधिकार प्राप्त है। 

अत: श्रीमान से निवेदन है कि ग्राम '.$userdata['batwaraBTAddress'].' स्थित उपर वर्णित सर्वे नंबर अनुसार मौजा पटवारी से बंटवारा फर्द एवं बटाकन फर्द तलब कर बंटवारा स्वीकृत करने का कष्ट करे । 

प्रार्थी  
'.$userdata['batwaraAvedakName'].' 
निवासी '.$userdata['batwaraAvedakAddress'].'
</pre>','
<pre>प्र.क्र.                                                                                             दिनांक-</pre>
<pre class="top-heading"><b><u>कथन<u></b></pre>
<pre>नाम -

पिता का नाम -

जाति -

उम्र -

निवासी -

मैं शपथ पुर्वक कथन करता हूँ कि में '.$userdata['batwaraAvedakAddress'].' का होकर मेरे ग्राम <b>'.$userdata['batwaraBTAddress'].'</b> में भूमि सर्व नंबर <b>'.$userdata['batwaraServeNumber'].' रकबा '.$userdata['batwaraRakba'].' है |</b>

पूर्व में हमारे द्वारा आपसी पारिवारिक सहमति से बंटवारा कर लिया है तथा मौके पर बंटवारा अनुसार काबिज होकर स्वतंत्र रूप से कृषि कार्य करते रहे है । मौके पर काबिज अनुसार बटवारा राजस्व अभिलेख में इंद्राज करने हेतु हमने तहसील कार्यालय में आवेदन प्रस्तुत किया है | यह कि मौजा पटवारी द्वारा अभिलेख पर जो बंटवारा फर्द प्रस्तुत की गई है, उसे मैने अच्छी तरह से देखकर समझ ली है व उसी अनुरूप हम काबिज होकर कृषि कार्य कर रहे हैं। मौके पर कब्जा संबंधी हमारे बीच कोई विवाद नहीं है। मौजा पटवारी द्वारा जो बटवारा फर्द प्रस्तुत की गई है उसमें मेरी पूर्ण सहमति है। किसी प्रकार की कोई आपत्ति नहीं है उसके अतिरिक्त कुछ नही कहना है। कथन जैसा बोले गये वैसे लिखे गये कथन पढ़ानां व सही होने से स्वीकार किये गये | 
</pre>
</body>
</html>'];

    $tableNameForm = 'saar_batwara';
    $formNameForm = 'भूमि बटवारा';
    $primaryKeys = 'batwaraId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}


?>