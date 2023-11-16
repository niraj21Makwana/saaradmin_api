<?php
include('../genreater-multipage-function.php');

function generateRegvinamayForm($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM saar_reg_vinamay WHERE regVinamayId='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);

    $year = date('Y');
  $lastTwoDigits = substr($year, -2);
  $yearPlue = $lastTwoDigits+1;
    $bandhak =  $userdata['regvinamayBandhak'];

    if($bandhak=="हाँ"){
        $pointNine = "उक्त भूमि पर बंधक दर्ज है ।";
        $downPoint = "उक्त खाते पर बंधक की पृविष्‍ठी यथावत रहेगी ।";
    }else{
        $pointNine = "उक्त भूमि पर बंधक दर्ज नहीं है ।";
        $downPoint = " ";
    }

    if($userdata['regvinamayTappa']!=""){
        $regvinamayTappa ="टप्पा ".$userdata['regvinamayTappa'];
    }else{
        $regvinamayTappa = "";
    }

    $html = ['
    <html>
    <head>
        <meta charset="utf-8">
        <style>
           body {
                font-size: 13pt;
            }
            .top-heading {
                text-align: center;
            }

            .top-heading div {
                margin: 0 auto;
                /* Center the div horizontally */
            }
            .right-side {
                text-align: right;
                margin-right: 5%;
            }
            .text-align-left {
                margin-left: 17%;
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
        .fontSizing{
            font-size:13.5px;
        }
        </style>
    </head>
    <body>
<div class="top-heading"><b><u>श्रीमान '.$userdata['regvinamayCourt'].' महोदय '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला '.$userdata['regvinamayJilla'].' म. प्र.</u></b></div>
<div class="right-side"><pre>प्रकरण क्रमांक  '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'</pre></div>
<b>'.$userdata['regvinamayAvdeakNameSecP'].'<br>
'.$userdata['regvinamayAvedakAddressSecP'].'</b>
<div class="right-side">प्रार्थी विनिमयग्रहिता</div>
बनाम<br> 
<b>'.$userdata['regvinamayEnAvedakNameFirstP'].'<br> 
'.$userdata['regvinamayEnAvedakAddressFirstP'].'</b>
<div  class="right-side">
विपक्षी
</div><br><br>
<div  class="top-heading"><b><u>आवेदन पत्र अंतर्गत धारा 109-110 म.प्र. भूराजस्‍व संहिता 1959</u></b></div><br>
माननीय महोदय,
<pre>
       
    सेवा में निवेदन है कि प्रार्थी ने विपक्षी से निम्‍न वर्णित भूमि को बजर्ये रजिस्‍ट्री विनिमय पत्र क्रमांक <b>'.$userdata['regvinamayPatraNumber'].'</b> दिनांक <b>'.$userdata['regvinamayRegistryDate'].'</b> के क्रय की है जिसकी प्रतिलिपी संलग्‍न है। 
सर्वे नम्‍बर '.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर गांव का नाम <b>'.$userdata['regvinamayBTAddressSecP'].'</b> जहां भूमि स्थित है।
   

    अत: श्रीमान से निवेदन है कि उक्‍त भूमि पर प्रार्थी का नामांतरण किया जावे । 
</pre>
<br>
दिनांक -
<div class="right-side">हस्‍ताक्षर विनिमयग्रहिता </div>','
<!-- ------------------------------------------------------------------ -->
<div style="font-size:14px;"><pre class="top-heading"><b>फार्म अ</b>
(परिपत्र दो-1 की कण्डिका 6 देखिये)
<b>राजस्‍व आदेश - पत्र ( रेवेन्‍यू ऑर्डर शीट)</b></pre>
न्यायालय '.$userdata['regvinamayCourt'].' '.$regvinamayTappa.' तहसील <b>'.$userdata['regvinamayTahsil'].'</b> के न्यायालय में मामला क्रमांक <b>'.$userdata['regvinamayParNum'].'/अ-6 /'.$year.'-'.$yearPlue.'</b>
विषय <b>नामांतरण विनिमयपत्र के आधार पर</b> प्रकरण की श्रेणी जॉच प्रतिवेदन ग्राम एवं  बंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['regvinamayPatwariHalkNum'].' '.$userdata['regvinamayJilla'].' कलेक्टर का प्रकरण क्रमांक सन 20__ - 20__ तहसीलदार का प्रकरण क्रमांक ..............सन 200_-200_ नायब तहसीलदार का प्रकरण क्रमांक ................सन '.$year.'
</div>
<table class="collapsetable">
<tr class="top-heading"><td><pre>आदेश क्रमांक कार्यवाही 
की तारीख और स्‍थान
(1)</pre></td>
<td><pre>पीठासीन अधिकारी के हस्‍ताक्षर सहित आवेदन पत्र अथवा कार्यवाही
(2)</pre></td>
<td><pre>जहा आवश्‍यक हो पर्ची 
अथवा वकीलों के 
हस्‍ताक्षर,आदेशों के 
पालन करवाकर लिपिक 
के संक्षिप्‍त हस्‍ताक्षर और 
प्रकरण की तारीख 
    (3)</pre></td></tr>
<tr>
<td><pre>_____/_______/'.$year.'</pre></td>
<td>आवेदक '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' द्वारा म.प्र .भू .रा.स.1959 की धारा 109,110 के तहत ग्राम पिपलखेड़ी स्थित भूमि 
सर्वे न. '.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर पर विनिमय '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' के स्थित 
भूमि सर्वे न. '.$userdata['regvinamayBServeNumFirstP'].' रकबा '.$userdata['regvinamayRakbaFirstP'].' हेक्टेयर विनिमय पत्र क्रमांक 
'.$userdata['regvinamayPatraNumber'].' दिनांक '.$userdata['regvinamayRegistryDate'].' के आधार पर नामांतरण किया जाने का आवेदन प्रस्तुत कर निवेदन किया गया ।
<pre>
    -प्रकरण दर्ज हो ।<br>
    -विज्ञप्ति जारी हो ।<br>
    -पटवारी से प्रतिवेदन लिया जावे ।<br>  
    -हितबद्ध पक्षकार तलब हो ।<br> 
    पेशी दिनांक - <b>    /     /'.$year.'</b>
    <br>
    <br>
                                                                            <b>'.$userdata['regvinamayCourt'].'
                                                                            '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].'</b>
</pre>
<pre>             
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
<br>
<br>
<br>
<br>
</pre></td>
<td><pre><b>SL--<br>
_ _ _ _ _ _ _ _<br>
Date- /   /'.$year.'<br>
<b>विज्ञप्ति,पटवारी<br>
लेटर एवं नोटिस</b></pre></td>
</tr></table> ','
<div class="top-heading"><b><u>न्यायालय '.$userdata['regvinamayCourt'].' '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला '.$userdata['regvinamayJilla'].'(म.प्र.)</u></b></div>
<div class="top-heading"><pre>क्रमांक     /री-1/'.$year.'                                          '.$userdata['regvinamayTahsil'].', दिनांक     /    /'.$year.'</pre></div>
<pre>प्रति,                                                                                 SL--
        <b>पटवारी </b>                                                                     ______________
        <b>ग्राम- '.$userdata['regvinamayBTAddressSecP'].'</b>                                                    Date-     /     /'.$year.'                                                  
</pre>
विषय:- 	नामांतरण प्रकरण में पत्र में उल्लेखित बिन्दुओं पर रिपोर्ट प्रस्तुत करने बाबत।
<div class="top-heading">***********</div>
    उपरोक्त विषयांतर्गत लेख है आवेदक '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' द्वारा म.प्र .भू .रा.स.1959 की धारा 109,110  के तहत ग्राम 
    '.$userdata['regvinamayBTAddressSecP'].' स्थित भूमि सर्वे न. '.$userdata['regvinamayBServeNumSecP'].' हेक्टेयर पर विनिमय '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' के स्थित भूमि सर्वे न.'.$userdata['regvinamayBServeNumFirstP'].' रकबा '.$userdata['regvinamayRakbaFirstP'].' हेक्टेयर विनिमय पत्र क्रमांक '.$userdata['regvinamayPatraNumber'].' दिनांक '.$userdata['regvinamayRegistryDate'].' के आधार पर नामांतरण किया जाने का आवेदन प्रस्तुत कर निवेदन किया गया । 
    <br>     
    <pre>प्रकरण क्रमांक <b>'.$userdata['regvinamayParNum'].'/अ-6 /'.$year.'-'.$yearPlue.'</b> न्यायालय में प्रचलित है। अतः उक्त भूमि के संबंध में निम्न बिन्दुओं पर आप अपनी रिपोर्ट प्रकरण में नियत पेशी दिनांक<b>         /       /2023</b> के पूर्व अनिवार्यतः प्रस्तुत करें ।
1. राजस्व रिकार्ड अनुसार भू-दान की भूमि है अथवा नहीं?
2. राजस्व रिकार्ड में उक्त भूमि वर्तमान में किसके नाम से दर्ज है? 
3. राजस्व रिकार्ड अनुसार पट्टे की भूमि है अथवा नहीं? 
4. म.प्र.भू राजस्व संहिता 1959 की धारा 165 (6) व (7) के उपबंधों के अधीन प्रतिबंधित तो नहीं है? 
5. वर्तमान में भूमि पर कब्जा किसका है? 
6. मौके पर भूमि सिंचित है या असिंचित । राजस्व रिकार्ड में भूमि सिंचित है अथवा असिंचित है? 
7. कृषि के अतिरिक्त अन्य प्रयोजन में तो उपयोग नहीं हो रहा है? आवासीय अथवा व्यावसायिक? 
8. कोई न्यायालयीन रोक, बाधा, अथवा किसी की आपत्ति है या नहीं ? 
9. नामांतरण किये जाने की अनुसंशा है अथवा नहीं? 
</pre>
<pre>        उक्त रिपोर्ट प्रकरण में नियत पेशी दिनांक<b>    /      /'.$year.'</b> के पूर्व अनिवार्यतः प्रस्तुतकी जावें । नियत पेशी दिनांक तक प्रकरण में आपकी रिपोर्ट प्राप्त नहीं होने पर उक्त नामांतरण प्रकरण में आपकी अनुसंशा मानी जाकर एक तरफा कार्यवाही कर दी जावेगी । एक तरफा कार्यवाही किये जाने के बाद प्रकरण में आपत्ति/विवाद होने पर समस्त उत्तरदायित्व आपका माना जावेगा । अतः समय सीमा का विशेष ध्यान रखा जावे । </pre>
<div class="right-side">
<b>'.$userdata['regvinamayCourt'].'<br> 
'.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].'</b>
</div>','
<!-- =============================================================== -->
<div class="top-heading"><b><u>न्यायालय '.$userdata['regvinamayCourt'].' '.$regvinamayTappa.' तहसील - '.$userdata['regvinamayTahsil'].',जिला '.$userdata['regvinamayJilla'].' (म.प्र.)</u></b>
<br>(मामले वाद धारा 109, 110 म.प्र.भू राजस्व संहिता नामांतरण )</div>
<pre>                                                                                       SL-  
प्रकरण क्रमांक <b>'.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'                                                     -----------------
                                                                                    Date-  /  /'.$year.'</b>
</pre>
<div class="top-heading"><b><u>विज्ञप्ति</u></b></div>
<pre>   सर्व साधारण को सूचित किया जाता है कि आवेदक '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' द्वारा म.प्र .भू .रा.स.1959 की धारा 109,110  के तहत ग्राम '.$userdata['regvinamayBTAddressSecP'].'  स्थित भूमि सर्वे न. '.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर पर विनिमय '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' के स्थित भूमि सर्वे न. '.$userdata['regvinamayBServeNumFirstP'].' रकबा '.$userdata['regvinamayRakbaFirstP'].' हेक्टेयर विनिमय पत्र क्रमांक '.$userdata['regvinamayPatraNumber'].' दिनांक '.$userdata['regvinamayRegistryDate'].' के आधार पर नामांतरण किया जाने का आवेदन प्रस्तुत कर निवेदन किया गया । 
        अतएव जिस किसी को आपत्ति हो विज्ञप्ति चस्पा होने के दिन से 15 दिनों के अंदर अपनी आपत्ति पटवारी ग्राम अथवा न्यायालय '.$userdata['regvinamayCourt'].' तहसील '.$userdata['regvinamayTahsil'].' में प्रस्तुत करें । अवधि गुजरने के बाद को किसी की आपत्ति मान्य नहीं होगी। 
                आज दिनांक <b>   /   /'.$year.'</b> को मेरे हस्ताक्षर एवं न्यायालय की मुद्रा से जारी किया गया ।


</pre>
<div class="right-side">
<b>'.$userdata['regvinamayCourt'].'<br>
'.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].'</b>
</div>
<pre>
प्रतिलिपि:-
            1.	एक प्रति तहसील कार्यालय के सूचना पटल पर चस्पा की जावे । 
            2.	एक प्रति ग्राम पंचायत  के सूचना पटल पर चस्पा की जावे । 
            3.	एक प्रति बाद निर्वाहन वापस हो । 


</pre>
<div class="right-side">
<b>'.$userdata['regvinamayCourt'].'<br>
'.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].'</b>
</div>','
<!-- ============================================================== -->
<div class="fontSizing"><div class="top-heading"><b>राजस्‍व मामले में नोटिस</b></div>
<pre>समक्ष '.$userdata['regvinamayCourt'].' स्‍थान '.$userdata['regvinamayTahsil'].' मामले                                                                                <b>SL-</b>
के विषय <b>नामांतरण मामला                                                                                                                      --------------
प्रकरण क्रमांक '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'                                                                                Date-   /   /'.$year.'</b>

श्री/श्रीमती आवेदक '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' <b>विरूद्ध</b>
            अनावेदक '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].'
</pre>
<div class="top-heading"><b>दावा</b></div>
<pre>श्री/श्रीमती '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनावाई <b> दिनांक ...../....../'.$year.'</b> को दिन में दोपहर <b>02:00</b> बजे न्‍यायालय '.$userdata['regvinamayCourt'].' '.$userdata['regvinamayTahsil'].' पर होगी।
तारीख<b>   /   /'.$year.'</b> 
मुद्रा 
</pre><pre class="right-side">रीडर टू '.$userdata['regvinamayCourt'].'
    '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].'
</pre><div class="top-heading">प्रष्‍टाकन क्रमांक 01</div>
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
<div class="top-heading">प्रष्‍टाकन क्रमांक 02 </div>                                                                            
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन '.$year.' को ................. बजे मेरे बाद तामिल किया गया ।</pre>
<div class="right-side">तामील करने वाले के हस्‍ताक्षर</div> 
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>   
<hr>
<div class="top-heading"><b>राजस्‍व मामले में नोटिस</b></div>
<pre>समक्ष '.$userdata['regvinamayCourt'].' स्‍थान '.$userdata['regvinamayTahsil'].' मामले                                                                                <b>SL-</b>
के विषय <b>नामांतरण मामला                                                                                                                      --------------
प्रकरण क्रमांक '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'                                                                                Date-   /   /'.$year.'</b>

श्री/श्रीमती आवेदक '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' <b>विरूद्ध</b>
            अनावेदक '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].'
</pre>
<div class="top-heading"><b>दावा</b></div>
<pre>श्री/श्रीमती '.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनावाई <b> दिनांक ...../....../'.$year.'</b> को दिन में दोपहर <b>02:00</b> बजे न्‍यायालय '.$userdata['regvinamayCourt'].' '.$userdata['regvinamayTahsil'].' पर होगी।
तारीख<b>   /   /'.$year.'</b> 
मुद्रा 
</pre><pre class="right-side">रीडर टू '.$userdata['regvinamayCourt'].'
    '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].'
</pre><div class="top-heading">प्रष्‍टाकन क्रमांक 01</div>
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
<div class="top-heading">प्रष्‍टाकन क्रमांक 02 </div>                                                                            
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन '.$year.' को ................. बजे मेरे बाद तामिल किया गया ।</pre>
<div class="right-side">तामील करने वाले के हस्‍ताक्षर</div> 
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>   
<hr></div>','
<!-- ==================================================================== -->
<pre class="top-heading"><b>कार्यालय पटवारी हल्‍का नम्‍बर '.$userdata['regvinamayPatwariHalkNum'].' ग्राम '.$userdata['regvinamayBTAddressFirstP'].' '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला '.$userdata['regvinamayJilla'].' (म.प्र.)</b></pre>
<pre>
प्रति,
        श्रीमान '.$userdata['regvinamayCourt'].' महोदय,
        '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला - '.$userdata['regvinamayJilla'].' (म.प्र.)
विषय :-	नामांतरण प्रकरण में रिपोर्ट प्रस्‍तुत करने बाबत् ।
संदर्भ :- न्यायालय के प्रकरण क्रमांक <b> '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'</b> दिनांक         के पालन में।
</pre>
<div class="top-heading">_________________</div>
उपरोक्‍त विषयांतर्गत निवेदन है कि आवेदक <b>'.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].'</b> द्वारा ग्राम <b>'.$userdata['regvinamayBTAddressSecP'].'</b> स्थित भूमि सर्वे नम्‍बर <b>261/2 रकबा 0.13 हेक्टेयर</b> पर नामांतरण किये जाने हेतु जॉच प्रतिवेदन निम्‍नानुसार है :- 
<div>
<table border="1" style="border-collapse: collapse; width:100%">
<tr class="top-heading">
<th>क्र.</th>
<th>जॉच के बिन्‍दु</th>
<th style="width:50%"></th>
</tr>
<tr>
<td>1</td>
<td><pre>राजस्‍व रिकार्ड अनुसार भू-दान की 
भूमि है अथवा नही ? 

</pre></td>
<td></td>
</tr>
<tr>
<td>2</td>
<td><pre>राजस्‍व रिकार्ड में उक्‍त भूमि वर्तमान में किसके नाम 
से दर्ज है ?


</pre></td>
<td></td>
</tr>
<tr>
<td>3</td>
<td><pre>राजस्‍व रिकार्ड अनुसार पट्टे की भूमि है
अथवा नही ?

</pre></td>
<td></td>
</tr>
<tr>
<td>4</td>
<td><pre>म.प्र.भू. राजस्‍व संहिता 1959 की  
धारा  165(6) व(7) के उपबंधों के
अधीन प्रतिबंधित तो नही है ?
</pre></td>
<td></td>
</tr>
<tr>
<td>5</td>
<td><pre>वर्तमान में भूमि पर कब्‍जा किसका है ? 

</pre></td>
<td></td>
</tr>
<tr>
<td>6</td>
<td><pre>मौके पर भूमि सिंचित है या अंसिचित । 
राजस्‍व रिकार्ड में भूमि सिंचित है अथवा
अंसिचित है ?
</pre></td>
<td></td>
</tr>
<tr>
<td>7</td>
<td><pre>कृषि के अतिरिक्‍त अन्‍य प्रयोजन मे तो 
उपयोग नही हो रहा है ? आवासीय अथवा 
व्‍यावसायिक ?
</pre></td>
<td></td>
</tr>
<tr>
<td>8</td>
<td><pre>कोई न्‍यायालयीन रोक, बाधा अथवा 
किसी की आपत्ति का उल्‍लेख तो नहीं है?
</pre></td>
<td></td>
</tr>
<tr>
<td>9</td>
<td><pre>उक्‍त भूमि पर बैंक बंधक है या नहीं </pre></td>
<td></td>
</tr>
<tr>
<td>10</td>
<td><pre>नामान्तरण किये जाने कि अनुसंशा है 
अथवा नहीं ?
</pre></td>
<td></td>
</tr>
</table><br><br>
<div class="right-side">पटवारी</div>','
<!-- ==================================================================== -->
<pre class="top-heading"><b>कार्यालय पटवारी हल्‍का नम्‍बर '.$userdata['regvinamayPatwariHalkNum'].' ग्राम '.$userdata['regvinamayBTAddressSecP'].' '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला '.$userdata['regvinamayJilla'].' (म.प्र.)</b></pre>
<pre>
प्रति,
        श्रीमान '.$userdata['regvinamayCourt'].' महोदय,
        '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला - '.$userdata['regvinamayJilla'].' (म.प्र.)
विषय :-	नामांतरण प्रकरण में रिपोर्ट प्रस्‍तुत करने बाबत् ।
संदर्भ :- न्यायालय के प्रकरण क्रमांक <b> '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'</b> दिनांक         के पालन में।
</pre>                            
<div class="top-heading">_________________</div>
उपरोक्‍त विषयांतर्गत निवेदन है कि आवेदक <b>'.$userdata['regvinamayAvdeakNameSecP'].' निवासी '.$userdata['regvinamayAvedakAddressSecP'].' </b> द्वारा ग्राम <b>'.$userdata['regvinamayBTAddressSecP'].'</b> स्थित भूमि सर्वे नम्‍बर <b>'.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर</b> पर नामांतरण किये जाने हेतु जॉच प्रतिवेदन निम्‍नानुसार है :- 
<table border="1" style="border-collapse: collapse; width:100%">
<tr class="top-heading">
<th>क्र.</th>
<th>जॉच के बिन्‍दु</th>
<th style="width:50%"></th>
</tr>
<tr>
<td>1</td>
<td><pre>राजस्‍व रिकार्ड अनुसार भू-दान की भूमि है 
अथवा नही ?

</pre></td>
<td></td>
</tr>
<tr>
<td>2</td>
<td><pre>राजस्‍व रिकार्ड में उक्‍त भूमि वर्तमान में 
किसके नाम से दर्ज है ?


</pre></td>
<td></td>
</tr>
<tr>
<td>3</td>
<td><pre>राजस्‍व रिकार्ड अनुसार पट्टे की भूमि है
अथवा नही ?

</pre></td>
<td></td>
</tr>
<tr>
<td>4</td>
<td><pre>म.प्र.भू. राजस्‍व संहिता 1959 की धारा 
165(6) व(7) के उपबंधों के अधीन प्
रतिबंधित तो नही है ?
</pre></td>
<td></td>
</tr>
<tr>
<td>5</td>
<td><pre>वर्तमान में भूमि पर कब्‍जा किसका है ? 

</pre></td>
<td></td>
</tr>
<tr>
<td>6</td>
<td><pre>मौके पर भूमि सिंचित है या अंसिचित ।
राजस्‍व रिकार्ड में भूमि सिंचित है अथवा
अंसिचित है ?</pre></td>
<td></td>
</tr>
<tr>
<td>7</td>
<td><pre>कृषि के अतिरिक्‍त अन्‍य प्रयोजन मे तो
उपयोग नही हो रहा है ? आवासीय अथवा 
व्‍यावसायिक ?</pre></td>
<td></td>
</tr>
<tr>
<td>8</td>
<td><pre>कोई न्‍यायालयीन रोक, बाधा अथवा 
किसी की आपत्ति का उल्‍लेख तो नहीं है?
</pre></td>
<td></td>
</tr>
<tr>
<td>9</td>
<td><pre>उक्‍त भूमि पर बैंक बंधक है या नहीं </pre></td>
<td></td>
</tr>
<tr>
<td>10</td>
<td><pre>नामान्तरण किये जाने कि अनुसंशा है
अथवा नहीं ?

</pre></td>
<td></td>
</tr>
</table><br><br>
<div class="right-side">पटवारी</div>','
<!-- =================================================================== -->
<div class="top-heading"><b>न्‍यायालय '.$userdata['regvinamayCourt'].' '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला - '.$userdata['regvinamayJilla'].' (म.प्र.)</b></div>    
<pre><b>प्रकरण क्रमांक - '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'</b></pre>
<div class="right-side"><b>
'.$userdata['regvinamayAvdeakNameSecP'].',<br> 
निवासी - '.$userdata['regvinamayAvedakAddressSecP'].' (म.प्र.)<br>   
'.$userdata['regvinamayEnAvedakNameFirstP'].' <br> 
निवासी - '.$userdata['regvinamayEnAvedakAddressFirstP'].' (म.प्र.)</b><br> 
..........आवेदक<br><b>
विरूद्ध <br> 
मध्यप्रदेश शासन<br></b>    
..........अनावेदक<br>    
</div>
<pre class="top-heading"><b>*//आदेश//*
पारित दिनांक - _____/_____/'.$year.'
(मध्यप्रदेश भू –राजस्व संहिता 1959 की धारा 109,110 के तहत नामान्तरण सम्बन्धी)</b> 
</pre>
<pre>
        प्रकरण का संक्षिप्‍त विवरण इस प्रकार है कि आवेदक '.$userdata['regvinamayAvdeakNameSecP'].', निवासी - '.$userdata['regvinamayAvedakAddressSecP'].' (म.प्र.) के द्वारा भू -राजस्‍व संहिता 1959 की धारा 109,110 के तहत आवेदन प्रस्तुत कर उल्लेखित किया गया कि ग्राम '.$userdata['regvinamayBTAddressSecP'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर भूमि पर दर्ज भूमि स्वामी के स्‍थान पर आवेदक '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' तथा आवेदक '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' के ग्राम '.$userdata['regvinamayBTAddressFirstP'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['regvinamayBServeNumFirstP'].' रकबा '.$userdata['regvinamayRakbaFirstP'].' हेक्टेयर के स्थान पर आवेदक '.$userdata['regvinamayAvdeakNameSecP'].', निवासी - '.$userdata['regvinamayAvedakAddressSecP'].' पर रजिस्‍टर्ड विनिमय विलेख पत्र क्रमांक– '.$userdata['regvinamayPatraNumber'].' दिनांक '.$userdata['regvinamayRegistryDate'].' के आधार पर नामांतरण किये जाने का निवेदन आवेदन पत्र प्रस्‍तुत कर किया गया । आवेदक ने आवेदन के समर्थन में खसरा बी- 1 रजिस्‍टर्ड विनिमय विलेख पत्र, एवं शपथ– पत्र प्रस्‍तुत किया गया ।
        प्रकरण में विज्ञप्ति का प्रकाशन किया गया । समयावधि उपरांत आज दिनांक तक कोई आपत्ति प्राप्‍त नही हुई । प्रकरण में मौजा पटवारी '.$userdata['regvinamayBTAddressSecP'].' से प्रतिवेदन लिया गया जिसमें पटवारी 
द्वारा बिन्‍दुवार जानकारी प्रस्‍तुत की गई जो निम्‍नानुसार है – 1. राजस्‍व रिकार्ड अनुसार भू-दान की भूमि नही है 2. राजस्‍व रिकार्ड में उक्‍त भूमि वर्तमान में अर्पित पिता श्यामसुंदर अग्रवाल, किशनचंद पिता जेठानन्द चंदवानी के नाम से दर्ज है 3. राजस्‍व रिकार्ड अनुसार पट्टे की भूमि नही है 4. म.प्र.भू. राजस्‍व संहिता 1959 की धारा  165(6) व (7) के उपबंधों के अधीन प्रतिबंधित नही है 5. वर्तमान में भूमि पर कब्‍जा क्रेता का है 6. मोके पर भूखंड हैं 7. भूखंड के प्रयोजन मे उपयोग हो रहा है  8. कोई न्‍यायालयीन रोक, बाधा अथवा किसी की आपत्ति का उल्‍लेख  नहीं है  9. '.$pointNine.' राजस्‍व रिकार्ड में विनिमयकर्ता का नाम आवेदित भूमि पर दर्ज होना बताया गया एवं पटवारी मोजा द्वारा विनिमयकर्ताओं का नामांतरण किया जाने की अनुशंसा की गई है। प्रकरण में विनिमयकर्ता के द्वारा शपथ पत्र पेश किया गया। आवेदक द्वारा समक्ष में उपस्थित होकर कथन कर राजस्व रिकार्ड अनुसार नामांतरण किये जाने में सहमति दी गयी|
मेरे द्वारा सम्‍पुर्ण प्रकरण का अवलोकन अध्‍ययन व परीक्षण किया गया जिसमें आवेदक द्वारा प्रस्‍तुत दस्‍तावेज, विनिमयकर्ता का शपथ पत्र, पटवारी मौजा द्वारा प्रस्‍तुत प्रतिवेदन से सहमत होते हुए <b>आवेदक '.$userdata['regvinamayAvdeakNameSecP'].', निवासी - '.$userdata['regvinamayAvedakAddressSecP'].' (म.प्र.) के द्वारा भू - राजस्‍व संहिता 1959 की धारा 109,110 के तहत ग्राम '.$userdata['regvinamayBTAddressSecP'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर भूमि पर दर्ज भूमि स्वामी के स्‍थान पर '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' तथा '.$userdata['regvinamayEnAvedakNameFirstP'].' निवासी '.$userdata['regvinamayEnAvedakAddressFirstP'].' के ग्राम '.$userdata['regvinamayBTAddressFirstP'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['regvinamayBServeNumFirstP'].' रकबा '.$userdata['regvinamayRakbaFirstP'].' हेक्टेयर भूमि पर दर्ज भूमि स्वामी के स्थान पर '.$userdata['regvinamayAvdeakNameSecP'].', निवासी - '.$userdata['regvinamayAvedakAddressSecP'].' का रजिस्‍टर्ड विनिमय विलेख पत्र क्रमांक– '.$userdata['regvinamayPatraNumber'].' दिनांक '.$userdata['regvinamayRegistryDate'].' के आधार पर नामांतरण स्‍वीकृत किया जाता है । '.$downPoint.'</b>मोजा पटवारी को पृथक से आदेश जारी कर सात दिवस में संशोधित खसरा प्रति मंगाई जाये । बाद पूर्णता प्रकरण समाप्‍त होकर दायर रिकार्ड दाखिल हो।
</pre>
<pre class="top-heading"><b><u>आदेश आज दिनांक     /    /'.$year.' को मेरे बोलने पर टंकन किया गया
व मेरे हस्‍ताक्षर व न्‍यायालयीन पद मुद्रा से जारी किया गया।</u></b>
</pre>
<div class="right-side">
<b>'.$userdata['regvinamayCourt'].'<br>
'.$regvinamayTappa.' तहसील - '.$userdata['regvinamayTahsil'].'</b>
</div>      
<pre class="top-heading">क्रमांक       /री-1/'.$year.'                                               '.$userdata['regvinamayTahsil'].', दिनांक      /      /'.$year.'</pre>
<pre>
प्रतिलिपि 
      पटवारी मोजा '.$userdata['regvinamayBTAddressFirstP'].' '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' आदेशानुसार राजस्‍व रिकार्ड में अमल कर पालन प्रतिवेदन 07 दिवस में प्रस्‍तुत करें । 

</pre>
<div class="right-side">
<b>'.$userdata['regvinamayCourt'].'<br>
'.$regvinamayTappa.' तहसील - '.$userdata['regvinamayTahsil'].'</b>
</div>     
</body>
</html>'
];


$tableNameForm = 'saar_reg_vinamay';
$formNameForm = 'reg_vinamay';
$primaryKeys = 'regVinamayId';

generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);

}

function generateRegvinamayFormNormal($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM saar_reg_vinamay WHERE regVinamayId='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['regvinamayTappa']!=""){
        $regvinamayTappa ="टप्पा ".$userdata['regvinamayTappa'];
    }else{
        $regvinamayTappa = "";
    }

    $html = ['
    <html>
    <head>
        <meta charset="utf-8">
        <style>
           body {
                font-size: 13pt;
            }
            .top-heading {
                text-align: center;
            }

            .top-heading div {
                margin: 0 auto;
                /* Center the div horizontally */
            }
            .right-side {
                text-align: right;
                margin-right: 5%;
            }
            .text-align-left {
                margin-left: 17%;
            }
        .right-side-box{
            text-align: center;
            margin-left: 60%;
        }
        </style>
    </head>
    <body>
<div class="top-heading"><b><u>श्रीमान '.$userdata['regvinamayCourt'].' महोदय '.$regvinamayTappa.' तहसील '.$userdata['regvinamayTahsil'].' जिला '.$userdata['regvinamayJilla'].' म. प्र.</u></b></div>
<div class="right-side"><pre>प्रकरण क्रमांक  '.$userdata['regvinamayParNum'].'/अ-6/'.$year.'-'.$yearPlue.'</pre></div>
<b>'.$userdata['regvinamayAvdeakNameSecP'].'<br>
'.$userdata['regvinamayAvedakAddressSecP'].'</b>
<div class="right-side">प्रार्थी विनिमयग्रहिता</div>
बनाम<br> 
<b>'.$userdata['regvinamayEnAvedakNameFirstP'].'<br> 
'.$userdata['regvinamayEnAvedakAddressFirstP'].'</b>
<div  class="right-side">
विपक्षी
</div><br><br>
<div  class="top-heading"><b><u>आवेदन पत्र अंतर्गत धारा 109-110 म.प्र. भूराजस्‍व संहिता 1959</u></b></div><br>
माननीय महोदय,
<pre>
       
    सेवा में निवेदन है कि प्रार्थी ने विपक्षी से निम्‍न वर्णित भूमि को बजर्ये रजिस्‍ट्री विनिमय पत्र क्रमांक <b>'.$userdata['regvinamayPatraNumber'].'</b> दिनांक <b>'.$userdata['regvinamayRegistryDate'].'</b> के क्रय की है जिसकी प्रतिलिपी संलग्‍न है। 
सर्वे नम्‍बर '.$userdata['regvinamayBServeNumSecP'].' रकबा '.$userdata['regvinamayRakbaSecP'].' हेक्टेयर गांव का नाम <b>'.$userdata['regvinamayBTAddressSecP'].'</b> जहां भूमि स्थित है।
   

    अत: श्रीमान से निवेदन है कि उक्‍त भूमि पर प्रार्थी का नामांतरण किया जावे । 
</pre>
<br>
दिनांक -
<div class="right-side">हस्‍ताक्षर विनिमयग्रहिता </div>   
</body>
</html>'
];


$tableNameForm = 'saar_reg_vinamay';
$formNameForm = 'reg_vinamay';
$primaryKeys = 'regVinamayId';

generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);

}



?>
