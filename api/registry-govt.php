<?php
include('../genreater-multipage-function.php');

function generateRegistryForm($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM saar_registry WHERE registryId='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['registryTappa']!=""){
        $registryTappa ="टप्पा ".$userdata['registryTappa'];
    }else{
        $registryTappa = "";
    }

    if ($userdata['registryBandhak'] == 'हाँ') {
        $bandhakhe9 = 'उक्‍त भूमि बेंक में बंधक दर्ज है ।';
        $khatekijankari = 'उक्त खाते पर बैंक बंधक कि प्रविष्टि यथावत रहेगी | ';
    } else {
        $bandhakhe9 = 'उक्‍त भूमि बेंक में बंधक दर्ज नहीं है ।';
        $khatekijankari = '';
    }

    if ($userdata['registryAadeshType'] == 'सामान्य') {
        $pointsix = 'मोके पर भूमि सिंचित हैं |';
    } else {
        $pointsix = 'मोके पर भूखंड हैं |';
    }


    $html = ['
    <html>
    <head>
        <meta charset="utf-8">
        <style>
        body {
            font-size: 12.5pt;
        }
        .top-heading {
            text-align: center;
        }
        .right-side{
           text-align: right;
           margin-right:2%;
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
            vertical-align:top;
        }
        .table-css{
            width:100%;
            border-collapse: collapse;
        }
        .table-css td{
            padding-bottom:30px
        }
        .fontSizing{
            font-size:13.5px;
        }
        </style>
    </head>
<body>
<pre class="top-heading"><b><u>श्रीमान '.$userdata['registryCourt'].' महोदय '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' जिला '.$userdata['registryJilla'].' म.प्र.</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b></pre>
<pre><b>'.$userdata['registryAvedakName'].'
'.$userdata['registryAvedakAddress'].'</b>
</pre>
<p class="right-side">प्रार्थी '.$userdata['registryAvedakType'].'</p>
<pre>
बनाम 
<b>'.$userdata['registryEnAvedakName'].'
निवासी -'.$userdata['registryEnAvedakAddress'].'</b>
</pre>
<pre class="right-side">विपक्षी '.$userdata['registryEnAvedakType'].'</pre>
<pre class="top-heading"><b><u>आवेदन पत्र अंतर्गत धारा 109-110  म.प्र. भूराजस्‍व संहिता 1959</u></b></pre>
<pre>
माननीय महोदय,
               
        सेवा में निवेदन है कि प्रार्थी ने विपक्षी से निम्‍न वर्णित भूमि को बजर्ये '.$userdata['registryLakhType'].' क्रमांक <b>'.$userdata['registryVikrayNumber'].'</b> दिनांक <b>'.$userdata['registryDate'].'</b> के क्रय की है जिसकी प्रतिलिपी संलग्‍न है।
सर्वे नम्‍बर <b>'.$userdata['registryBServeNumber'].'</b> कुल सर्वे नम्‍बर <b>'.$userdata['registryKulBServeNumber'].'</b> कुल रकबा <b>'.$userdata['registryRakba'].'</b> गांव का नाम <b>'.$userdata['registryBTAddress'].'</b> जहां भूमि स्थित है |
        अत: श्रीमान से निवेदन है कि उक्‍त भूमि पर प्रार्थी का नामांतरण किया जावे ।


दिनांक -

</pre>
<p class="right-side">हस्‍ताक्षर प्रार्थी </p>','
<pre class="top-heading"><b>फार्म अ</b>
(परिपत्र दो-1 की कण्डिका 6 देखिये)
<b>राजस्‍व आदेश - पत्र ( रेवेन्‍यू ऑर्डर शीट)</b></pre>
<pre>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील <b>'.$userdata['registryTahsil'].'</b> के न्यायालय में मामला क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.' विषय <b>'.$userdata['registryLakhType'].' के आधार पर नामांतरण बाबत</b> प्रकरण की श्रेणी जॉच प्रतिवेदन ग्राम '.$userdata['registryBTAddress'].' बंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['registryPatwariHalkNum'].' '.$userdata['registryJilla'].' कलेक्टर का प्रकरण क्रमांक सन  20  - 20 तहसीलदार का प्रकरण क्रमांक................सन 200 -200 '.$userdata['registryCourt'].' का प्रकरण क्रमांक '.$userdata['registryParNumber'].' सन 20  -20  </pre>
<table border="1" class="collapsetable">
<tr><td class="top-heading" style="border-bottom: 1px solid black;"><pre>आदेश क्रमांक 
कार्यवाही की 
तारीख और 
स्‍थान 
(1)</pre></td>
<td class="top-heading">पीठासीन अधिकारी के हस्‍ताक्षर सहित आवेदन पत्र अथवा कार्यवाही<br>(2)</td>
<td class="top-heading">जहा आवश्‍यक हो 
पर्ची अथवा वकीलों
के हस्‍ताक्षर,आदेशों
के पालन करवाकर
लिपिक के संक्षिप्‍त 
हस्‍ताक्षर और 
प्रकरण की तारीख 
<br>(3)</td></tr>
<tr><td><pre>____/____/'.$year.' </pre></td>
<td style="border: 1px solid black;">
<pre>       आवेदक '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'].' द्वारा म.प्र.भू.रा.स.1959 की धारा 109,110 के तहत ग्राम '.$userdata['registryBTAddress'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' पर विक्रेता '.$userdata['registryEnAvedakName'].' निवासी '.$userdata['registryEnAvedakAddress'].' के स्थान पर हक़त्याग विलेख क्रमांक '.$userdata['registryVikrayNumber'].' दिनांक            के आधार पर नामांतरण किया जाने का आवेदन प्रस्तुत कर निवेदन किया गया ।

    - प्रकरण दर्ज हो ।  
    - विज्ञप्ति जारी हो ।  
    - पटवारी से प्रतिवेदन लिया जावे ।  
    - हितबद्ध पक्षकार तलब हो । 
      पेशी दिनांक    <b>  /       /'.$year.'</b>


                                                         <b>'.$userdata['registryCourt'].'
                                                            '.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</b> 







</pre></td>
<td><pre><b>SL- 
_ _ _ _ _ _ _ _
Date- /   /'.$year.'
विज्ञप्ति,पटवारी लेटर
एवं नोटिस</pre></b></td></tr>
</table>','  
<pre class="top-heading"><mark><b><u>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' जिला '.$userdata['registryJilla'].' (म.प्र.)</u></b></mark></pre>
<pre>क्रमांक     /री-1/'.$year.'                                       '.$registryTappa.' तहसील '.$userdata['registryTahsil'].', दिनांक        /        /'.$year.'</pre>
<pre>प्रति,                                                                                        <b>SL  -</b>
        <b>पटवारी                                                                          ---------------           
        ग्राम- '.$userdata['registryBTAddress'].'                                              Date-  /  /'.$year.'</b>

विषय:- 	   नामांतरण प्रकरण में पत्र में उल्लेखित बिन्दुओं पर रिपोर्ट प्रस्तुत करने बाबत।
</pre>
<p class="top-heading">*********** </p>
<pre>                  उपरोक्त विषयांतर्गत लेख है कि आवेदक '.$userdata['registryAvedakType'].' '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'] .' द्वारा म.प्र. भू-राजस्‍व संहिता 1959 की धारा 109,110 के तहत ग्राम '.$userdata['registryBTAddress'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' पर '.$userdata['registryEnAvedakType'].' ' . $userdata['registryEnAvedakName'] .' निवासी-' . $userdata['registryEnAvedakAddress	'] .' के स्थान पर  ' . $userdata['registryLakhType'] .'  क्रमांक ' . $userdata['registryVikrayNumber'] .' के आधार पर नामांतरण किया जाने का आवेदन प्रस्तुत कर निवेदन किया गया ।
                       प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b> न्यायालय में प्रचलित है। अतः उक्त भूमि के संबंध में निम्न बिन्दुओं पर आप अपनी रिपोर्ट प्रकरण में नियत पेशी दिनांक <b>      /     /'.$year.'</b> के पूर्व अनिवार्यतः प्रस्तुत करें ।
        1. राजस्व रिकार्ड अनुसार भू-दान की भूमि है अथवा नहीं? 
        2. राजस्व रिकार्ड में उक्त भूमि वर्तमान में किसके नाम से दर्ज है?      
        3. राजस्व रिकार्ड अनुसार पट्टे की भूमि है अथवा नहीं?       
        4. म.प्र.भू राजस्व संहिता 1959 की धारा 165 (6) व (7) के उपबंधों के अधीन प्रतिबंधित तो नहीं है?     
        5. वर्तमान में भूमि पर कब्जा किसका है?       
        6. मौके पर भूमि सिंचित है या असिंचित । राजस्व रिकार्ड में भूमि सिंचित है अथवा असिंचित है?    
        7. कृषि के अतिरिक्त अन्य प्रयोजन में तो उपयोग नहीं हो रहा है? आवासीय अथवा व्यावसायिक ?     
        8. कोई न्यायालयीन रोक, बाधा, अथवा किसी की आपत्ति है या नहीं ?    
        9. नामांतरण किये जाने की अनुसंशा है अथवा नहीं? 
        उक्त रिपोर्ट प्रकरण में नियत पेशी दिनांक         /       /'.$year.' के पूर्व अनिवार्यतः प्रस्तुतकी जावें । नियत पेशी दिनांक तक प्रकरण में आपकी रिपोर्ट प्राप्त नहीं होने पर उक्त नामांतरण प्रकरण में आपकी अनुसंशा मानी जाकर एक तरफा कार्यवाही कर दी जावेगी । एक तरफा कार्यवाही किये जाने के बाद प्रकरण में आपत्ति/विवाद होने पर समस्त उत्तरदायित्व आपका माना जावेगा । अतः समय सीमा का विशेष ध्यान रखा जावे ।


</pre>
<pre class="right-side"><b>'.$userdata['registryCourt'].' 
'.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</b></pre>','
<pre class="top-heading"><b><u>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील - '.$userdata['registryTahsil'].',जिला '.$userdata['registryJilla'].'(म.प्र.)</u></b>
<mark>(मामले वाद धारा 109, 110 म.प्र.भू राजस्व संहिता नामांतरण )</mark></pre>
<p class="right-side"><b>SL-</b></p>
<pre>प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'                                                               -----------------</b></pre>
<pre class="right-side"><b>Date-      /      /'.$year.'</b></pre> 
<p class="top-heading"><b><u>विज्ञप्ति</u></b></p>
<pre>      सर्व साधारण को सूचित किया जाता है कि ग्राम '.$userdata['registryBTAddress'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' पर '.$userdata['registryAvedakType'].' '.$userdata['registryAvedakName'].', निवासी ' . $userdata['registryAvedakAddress'] .' द्वारा प्रस्तुत कर ' . $userdata['registryLakhType'] .' के आधार पर ' . $userdata['registryEnAvedakType'] .' ' . $userdata['registryEnAvedakName'] .', निवासी  ' . $userdata['registryEnAvedakAddress	'] .'  के स्थान पर नामांतरण हेतु इस न्यायालय में कार्यवाही प्रचलित है। 
            अतएव जिस किसी को आपत्ति हो विज्ञप्ति चस्पा होने के दिन से 15 दिनों के अंदर अपनी आपत्ति पटवारी ग्राम '.$userdata['registryBTAddress'].' अथवा न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' में प्रस्तुत करें । अवधि गुजरने के बाद को किसी की आपत्ति मान्य नहीं होगी। 
            आज दिनांक <b>     /       /'.$year.'</b> को मेरे हस्ताक्षर एवं न्यायालय की मुद्रा से जारी किया गया ।

</pre>
<pre class="right-side"><b>'.$userdata['registryCourt'].'
'.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</b>

</pre>
<pre>प्रतिलिपि:-
            1.	एक प्रति तहसील कार्यालय के सूचना पटल पर चस्पा की जावे । 
            2.	एक प्रति ग्राम पंचायत  के सूचना पटल पर चस्पा की जावे । 
            3.	एक प्रति बाद निर्वाहन वापस हो । 


</pre>
<pre class="right-side"><b>'.$userdata['registryCourt'].'
'.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</b></pre>','
<div class="fontSizing">
<pre class="top-heading"><b>राजस्‍व मामले में नोटिस</b></pre>
<pre>समक्ष '.$userdata['registryCourt'].' स्‍थान '.$userdata['registryTahsil'].' मामले                                                                <b>SL-</b>
के विषय <b>नामांतरण मामला                                                                                                    -------------------</b>
प्रकरण क्रमांक '.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'                                                                   <b>Date-    /  /'.$year.'</b>
श्री/श्रीमती आवेदक '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'].'</pre>
<p class="right-side"><b>विरूद्ध</b></p>
<p class="top-heading"><b>दावा</b></p>
<pre>श्री/श्रीमती '.$userdata['registryEnAvedakName'].' निवासी - '.$userdata['registryEnAvedakAddress'].' आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनावाई दिनांक <b>     /     /'.$year.'</b> को दिन में दोपहर <b>02:00</b> बजे न्‍यायालय '.$userdata['registryCourt'].' '.$userdata['registryTahsil'].' पर होगी।
तारीख<b>     /       /'.$year.'</b> 
मुद्रा </pre><pre class="right-side"> रीडर टू '.$userdata['registryCourt'].'
'.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</pre> <pre>                                                   प्रष्‍टाकन क्रमांक 01
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
                                                        प्रष्‍टाकन क्रमांक 02</pre>   
<pre>तामिल करने संबंधी प्रष्‍टाकन                                                                  
तारीख ............. माह......... सन '.$year.' को ................. बजे मेरे बाद तामिल किया गया ।</pre>
<p class="right-side">तामील करने वाले के हस्‍ताक्षर</p> 
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>   
<hr>
<pre class="top-heading"><b>राजस्‍व मामले में नोटिस</b></pre>
<pre>समक्ष '.$userdata['registryCourt'].' स्‍थान '.$userdata['registryTahsil'].' मामले                                                                 <b>SL-</b>
के विषय <b>नामांतरण मामला                                                                                                    ------------------</b>
प्रकरण क्रमांक '.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'                                                                   <b>Date-    /  /'.$year.'</b>
श्री/श्रीमती आवेदक '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'].'</pre>
<p class="right-side"><b>विरूद्ध</b></p>
<p class="top-heading"><b>दावा</b></p>
<pre>श्री/श्रीमती '.$userdata['registryEnAvedakName'].' निवासी - '.$userdata['registryEnAvedakAddress'].' आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनावाई दिनांक <b>     /     /'.$year.'</b> को दिन में दोपहर <b>02:00</b> बजे न्‍यायालय '.$userdata['registryCourt'].' '.$userdata['registryTahsil'].' पर होगी।
तारीख<b>     /       /'.$year.'</b> 
मुद्रा </pre><pre class="right-side"> रीडर टू '.$userdata['registryCourt'].'
'.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</pre> <pre>                                                   प्रष्‍टाकन क्रमांक 01
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
                                                        प्रष्‍टाकन क्रमांक 02</pre>   
<pre>तामिल करने संबंधी प्रष्‍टाकन                                                                  
तारीख ............. माह......... सन '.$year.' को ................. बजे मेरे बाद तामिल किया गया ।</pre>
<p class="right-side">तामील करने वाले के हस्‍ताक्षर</p> 
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>
</div>','<div style="font-size:17px">
<pre class="top-heading"><b><u>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील - '.$userdata['registryTahsil'].',जिला '.$userdata['registryJilla'].' (म.प्र.)</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b>
दिनांक -     /      /'.$year.'</pre>
<p class="top-heading"><u>'.$userdata['registryAvedakType'].' के कथन </u></p>
<pre>   नाम पिता/पति का नाम व जाति       -     '.$userdata['registryAvedakName'].'
    उम्र                             -	 
    व्‍यवसाय			              -      
    निवासी 			                 -    '.$userdata['registryAvedakAddress'].' </pre>
<p class="top-heading">******************** </p>
<pre>         मैं शपथ पुर्वक कथन करता/करती हॅू कि मेरे द्वारा '.$userdata['registryEnAvedakType'].' '.$userdata['registryEnAvedakName'].','.$registryTappa.' तहसील-'.$userdata['registryTahsil'].', जिला -'.$userdata['registryJilla'].' से ग्राम '.$userdata['registryBTAddress'].' तहसील '.$userdata['registryJilla'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' विक्रय मूल्‍य रूपये.......................... मे क्रय की है। उक्‍त भूमि विक्रय मुल्‍य मेरे द्वारा '.$userdata['registryEnAvedakType'].' को अदा कर दिया है। आवेदित भूमि पर '.$userdata['registryEnAvedakType'].' के स्‍थान पर मेरा नामांतरण किया जावे।  
                बयान पढ़ा सुना व सही होने से स्‍वीकार किया गया

</pre></div>','<div style="font-size:17px">
<pre class="top-heading"><b><u>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील - '.$userdata['registryTahsil'].',जिला '.$userdata['registryJilla'].' (म.प्र.)</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b>
दिनांक -     /      /'.$year.'</pre>
<p class="top-heading"><u>'.$userdata['registryEnAvedakType'].' के कथन </u></p>
<pre>   नाम पिता/पति का नाम व जाति       -     '.$userdata['registryEnAvedakName'].'
    उम्र			                -	                                          
    व्‍यवसाय			             -                                                 
    निवासी 			                -     '.$userdata['registryEnAvedakAddress'].'</pre>
<p class="top-heading">******************** </p>
<pre>           मैं शपथ पुर्वक कथन करता/करती हॅू कि मेरे द्वारा '.$userdata['registryAvedakType'].' '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'].' से ग्राम '.$userdata['registryAvedakType'].' '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryBTAddress'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' विक्रय मूल्‍य रूपये .......................... मे विक्रय की है। उक्‍त भूमि विक्रय मुल्‍य मेरे द्वारा '.$userdata['registryAvedakType'].' से प्राप्‍त कर लिया है। आवेदित भूमि पर मेरे स्‍थान पर '.$userdata['registryAvedakType'].' का नामांतरण किया जावे तो मुझे कोई आपत्ति नहीं है।
                बयान पढ़ा सुना व सही होने से स्‍वीकार किया गया 
                
</pre>
<pre class="right-side"><b>'.$userdata['registryCourt'].'
'.$registryTappa.' तहसील '.$userdata['registryTahsil'].'</b></pre></div>','
<h4 class="top-heading"><b>कार्यालय पटवारी हल्‍का नम्‍बर '.$userdata['registryPatwariHalkNum'].' ग्राम '.$userdata['registryBTAddress'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' जिला '.$userdata['registryJilla'].' (म.प्र.)</b></h4>
<pre>प्रति,
            श्रीमान '.$userdata['registryCourt'].' महोदय,
            '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' जिला - '.$userdata['registryJilla'].' (म.प्र.) 
विषय :-	नामांतरण प्रकरण में रिपोर्ट प्रस्‍तुत करने बाबत् ।
संदर्भ :- न्यायालय के प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].' /अ-6/'.$year.'-'.$yearPlue.'</b> दिनांक     /      /'.$year.' के पालन में।
</pre>
<p class="top-heading">__________________________</p>
<pre>उपरोक्‍त विषयांतर्गत निवेदन है कि आवेदक <b>'.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'].'</b> द्वारा ग्राम <b>'.$userdata['registryBTAddress'].'</b> स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' हेक्टर पर नामांतरण किये जाने हेतु जॉच प्रतिवेदन निम्‍नानुसार है :- 
</pre>
<table border="1" class="table-css"><tr class="top-heading"><th><b>क्र.</b></th>
<th></b>जॉच के बिन्‍दु</b></th>
<th style="width:40%"></th></tr>
<tr><td class="top-heading"><b>1</b></td>
<td><pre>राजस्‍व रिकार्ड अनुसार भू-दान की भूमि है अथवा नही ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>2</b></td>
<td><pre>राजस्‍व रिकार्ड में उक्‍त भूमि वर्तमान में किसके नाम से दर्ज है ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>3</b></td>
<td><pre>राजस्‍व रिकार्ड अनुसार पट्टे की भूमि है अथवा नही ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>4</b></td>
<td><pre>म.प्र.भू. राजस्‍व संहिता 1959 की धारा  165(6) व (7) के 
उपबंधों के अधीन प्रतिबंधित तो नही है ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>5</b></td>
<td><pre>वर्तमान में भूमि पर कब्‍जा किसका है ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>6</b></td>
<td><pre>मौके पर भूमि सिंचित है या अंसिचित । राजस्‍व रिकार्ड में 
भूमि सिंचित है अथवा अंसिचित है ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>7</b></td>
<td><pre>कृषि के अतिरिक्‍त अन्‍य प्रयोजन मे तो उपयोग नही हो रहा है 
? आवासीय अथवा व्‍यावसायिक ?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>8</b></td>
<td><pre>कोई न्‍यायालयीन रोक, बाधा अथवा किसी की आपत्ति का 
उल्‍लेख तो नहीं है?</pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>9</b></td>
<td><pre>उक्‍त भूमि पर बैंक बंधक है या नहीं </pre></td>
<td style="width:40%"></td></tr>
<tr><td class="top-heading"><b>10</b></td>
<td>नामान्तरण किये जाने कि अनुसंशा है अथवा नहीं ?</td>
<td style="width:40%"></td></tr>
</table>
<pre class="right-side">

पटवारी</pre>','
<pre class="top-heading"><b><u>न्‍यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].', जिला - '.$userdata['registryJilla'].' (म.प्र.)</b></pre>
<pre><b>प्रकरण क्रमांक - '.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b></pre>
<pre class="right-side"><b>'.$userdata['registryAvedakName'].', 
निवासी - '.$userdata['registryAvedakAddress'].'(म.प्र.)</b>   
('.$userdata['registryAvedakType'].')..........आवेदक
<b>विरूद्ध 
'.$userdata['registryEnAvedakName'].'
निवासी -  '.$userdata['registryEnAvedakAddress'].' (म.प्र.)</b>    
('.$userdata['registryEnAvedakType'].')..........अनावेदक </pre>
<pre class="top-heading"><b>***//आदेश//***
पारित दिनांक - _____/_____/'.$year.'
(मध्यप्रदेश भू-राजस्व संहिता 1959 की धारा 109-110 के तहत नामान्तरण संबंधी) </b> 
</pre>
<pre>
        प्रकरण का संक्षिप्‍त विवरण इस प्रकार है कि आवेदक ('.$userdata['registryAvedakType'].') '.$userdata['registryAvedakName'].', निवासी– '.$userdata['registryAvedakAddress'].' (म.प्र.) के द्वारा भू -राजस्‍व संहिता 1959 की धारा 109,110 के तहत '.$userdata['registryEnAvedakType'].' '.$userdata['registryEnAvedakName'].' निवासी - '.$userdata['registryEnAvedakAddress'].' (म.प्र.) के स्‍थान पर रजिस्‍टर्ड विक्रय पत्र क्रमांक '.$userdata['registryVikrayNumber'].' दिनांक '.$userdata['registryDate'].' के आधार पर ग्राम - '.$userdata['registryBTAddress'].' '.$registryTappa.' तहसील - '.$userdata['registryTahsil'].' में स्थित भूमि सर्वे नम्‍बर  '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' पर नामांतरण किये जाने का निवेदन आवेदन पत्र प्रस्‍तुत कर किया गया । आवेदक ने आवेदन के समर्थन में खसरा बी- 1 रजिस्‍टर्ड दानपत्र, '.$userdata['registryEnAvedakType'].' का शपथ– पत्र प्रस्‍तुत किया गया ।
        प्रकरण में विज्ञप्ति का प्रकाशन किया गया । समयावधि उपरांत आज दिनांक तक कोई आपत्ति प्राप्‍त नही हुई । प्रकरण में मौजा पटवारी ' . $userdata['registryBTAddress'] .' से प्रतिवेदन लिया गया जिसमें पटवारी द्वारा बिन्‍दुवार जानकारी प्रस्‍तुत की गई जो निम्‍नानुसार है – 1. राजस्‍व रिकार्ड अनुसार भू-दान की भूमि नही है 2. राजस्‍व रिकार्ड में उक्‍त भूमि वर्तमान में विक्रेता के नाम से दर्ज है  3. राजस्‍व रिकार्ड अनुसार पट्टे की भूमि नही है 4. म.प्र.भू. राजस्‍व संहिता 1959 की धारा  165(6) व (7) के उपबंधों के अधीन प्रतिबंधित नही है 5. कब्जे संबंधी विवरण रजिस्टर्ड विक्रय पत्र में उल्लेखित है 6. ' . $pointsix .' 7. कृषि के अतिरिक्त अन्य किसी प्रयोजन में उपयोग वर्तमान में नहीं हो रहा हैं | 8. कोई न्‍यायालयीन रोक, बाधा अथवा किसी की आपत्ति का उल्‍लेख नहीं है 9. ' . $bandhakhe9 .' राजस्‍व रिकार्ड में ' . $userdata['registryEnAvedakType'] .' का नाम आवेदित भूमि पर दर्ज होना बताया व रिकॉर्ड अनुसार नामांतरण किये जाने में सहमति व्यक्त की गयी |  
        मेर द्वारा सम्‍पुर्ण प्रकरण का अवलोकन अध्‍ययन व परीक्षण किया गया जिसमें आवेदक द्वारा प्रस्‍तुत दस्‍तावेज, ' . $userdata['registryEnAvedakType'] .' का शपथ पत्र, पटवारी मौजा प्रस्तुत प्रतिवेदन से सहमत होते हुए आवेदक ' . $userdata['registryAvedakName'] .' निवासी – ग्राम ' . $userdata['registryAvedakAddress'] .' (म.प्र.) द्वारा भू-राजस्‍व संहिता 1959 की धारा 109,110 के तहत प्रस्‍तुत <b>आवेदन स्‍वीकार करते हुए, ग्राम ' . $userdata['registryBTAddress'] .' '.$registryTappa.' तहसील ' . $userdata['registryTahsil'] .' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' पर ' . $userdata['registryEnAvedakType'] .' ' . $userdata['registryEnAvedakName'] .', निवासी – ग्राम ' . $userdata['registryEnAvedakAddress'] .' (म.प्र.) के स्‍थान पर आवेदक (' . $userdata['registryAvedakType'] .') ' . $userdata['registryAvedakName'] .', निवासी – ग्राम ' . $userdata['registryAvedakAddress'] .' (म.प्र.) का नामांतरण स्‍वीकृत किया जाता है । '.$khatekijankari.'</b> मोजा पटवारी को पृथक से आदेश जारी कर 07 दिवस में संशोधित खसरा प्रति मंगाई जाये । बाद पूर्णता प्रकरण समाप्‍त होकर दायर रिकार्ड दाखिल हो। 



        </pre>
<pre class="top-heading"><b><u>आदेश आज दिनांक        /       /'.$year.' को मेरे बोलने पर टंकन <br> किया गया व मेरे हस्‍ताक्षर व न्‍यायालयीन पद मुद्रा से जारी किया गया।</u></b></pre>
<pre class="right-side"><b>'.$userdata['registryCourt'].'
'.$registryTappa.' तहसील - '.$userdata['registryTahsil'].'</b>
</pre>      
<pre>क्रमांक     /री-1/'.$year.'                                       '.$registryTappa.' तहसील '.$userdata['registryTahsil'].', दिनांक        /        /'.$year.'</pre>
<pre>
प्रतिलिपि, 
       पटवारी मोजा '.$userdata['registryBTAddress'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' आदेशानुसार राजस्‍व रिकार्ड में अमल कर पालन प्रतिवेदन 07 दिवस में  प्रस्‍तुत करें।

</pre>
<pre class="right-side"><b>'.$userdata['registryCourt'].'
'.$registryTappa.' तहसील - '.$userdata['registryTahsil'].'</b>
</pre>
</body>
</html>'];

    $tableNameForm = 'saar_registry';
    $formNameForm = 'registry';
    $primaryKeys = 'registryId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

function generateRegistryFormNormal($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM saar_registry WHERE registryId='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
    
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['registryTappa']!=""){
        $registryTappa ="टप्पा ".$userdata['registryTappa'];
    }else{
        $registryTappa = "";
    }

    $html = ['
    <html>
    <head>
        <meta charset="utf-8">
        <style>
        body {
            font-size: 12.5pt;
        }
        .top-heading {
            text-align: center;
        }
        .right-side{
           text-align: right;
           margin-right:2%;
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
        table th td tr {
            border-collapse: collapse;
        }
        </style>
    </head>
<body>
<pre class="top-heading"><b><u>श्रीमान '.$userdata['registryCourt'].' महोदय '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' जिला '.$userdata['registryJilla'].' म.प्र.</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b></pre>
<pre><b>'.$userdata['registryAvedakName'].'
'.$userdata['registryAvedakAddress'].'</b>
</pre>
<p class="right-side">प्रार्थी '.$userdata['registryAvedakType'].'</p>
<pre>
बनाम 
<b>'.$userdata['registryEnAvedakName'].'
निवासी -'.$userdata['registryEnAvedakAddress'].'</b>
</pre>
<pre class="right-side">विपक्षी '.$userdata['registryEnAvedakType'].'</pre>
<pre class="top-heading"><b><u>आवेदन पत्र अंतर्गत धारा 109-110  म.प्र. भूराजस्‍व संहिता 1959</u></b></pre>
<pre>
माननीय महोदय,
               
        सेवा में निवेदन है कि प्रार्थी ने विपक्षी से निम्‍न वर्णित भूमि को बजर्ये '.$userdata['registryLakhType'].' क्रमांक <b>'.$userdata['registryVikrayNumber'].'</b> दिनांक <b>'.$userdata['registryDate'].'</b> के क्रय की है जिसकी प्रतिलिपी संलग्‍न है।
सर्वे नम्‍बर <b>'.$userdata['registryBServeNumber'].'</b> कुल सर्वे नम्‍बर <b>'.$userdata['registryKulBServeNumber'].'</b> कुल रकबा <b>'.$userdata['registryRakba'].'</b> गांव का नाम <b>'.$userdata['registryBTAddress'].'</b> जहां भूमि स्थित है |
        अत: श्रीमान से निवेदन है कि उक्‍त भूमि पर प्रार्थी का नामांतरण किया जावे ।


दिनांक -

</pre>
<p class="right-side">हस्‍ताक्षर प्रार्थी </p>','
<pre class="top-heading"><b><u>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील - '.$userdata['registryTahsil'].',जिला '.$userdata['registryJilla'].' (म.प्र.)</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b>
दिनांक -      </pre>
<p class="top-heading"><u>'.$userdata['registryAvedakType'].' के कथन </u></p>
<pre>नाम पिता/पति का नाम व जाति       -     '.$userdata['registryAvedakName'].'
उम्र                             -	 
व्‍यवसाय			              -      
निवासी 			                 -    '.$userdata['registryAvedakAddress'].' </pre>
<p class="top-heading">******************** </p>
<pre>         मैं शपथ पुर्वक कथन करता/करती हॅू कि मेरे द्वारा '.$userdata['registryEnAvedakType'].' '.$userdata['registryEnAvedakName'].', '.$registryTappa.' तहसील-'.$userdata['registryTahsil'].', जिला -'.$userdata['registryJilla'].' से ग्राम '.$userdata['registryBTAddress'].' तहसील '.$userdata['registryJilla'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' विक्रय मूल्‍य रूपये.......................... मे क्रय की है। उक्‍त भूमि विक्रय मुल्‍य मेरे द्वारा '.$userdata['registryEnAvedakType'].' को अदा कर दिया है। आवेदित भूमि पर '.$userdata['registryEnAvedakType'].' के स्‍थान पर मेरा नामांतरण किया जावे।  
                बयान पढ़ा सुना व सही होने से स्‍वीकार किया गया


</pre>
','
<pre class="top-heading"><b><u>न्यायालय '.$userdata['registryCourt'].' '.$registryTappa.' तहसील - '.$userdata['registryTahsil'].',जिला '.$userdata['registryJilla'].' (म.प्र.)</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक <b>'.$userdata['registryParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b>
दिनांक -         </pre>
<p class="top-heading"><u>'.$userdata['registryEnAvedakType'].' के कथन </u></p>
<pre>नाम पिता/पति का नाम व जाति       -     '.$userdata['registryEnAvedakName'].'
उम्र			                -	                                          
व्‍यवसाय			             -                                                 
निवासी 			                -     '.$userdata['registryEnAvedakAddress'].'</pre>
<p class="top-heading">******************** </p>
<pre>           मैं शपथ पुर्वक कथन करता/करती हॅू कि मेरे द्वारा '.$userdata['registryAvedakType'].' '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryAvedakAddress'].' से ग्राम '.$userdata['registryAvedakType'].' '.$userdata['registryAvedakName'].' निवासी '.$userdata['registryBTAddress'].' '.$registryTappa.' तहसील '.$userdata['registryTahsil'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['registryBServeNumber'].' कुल सर्वे नम्‍बर '.$userdata['registryKulBServeNumber'].' कुल रकबा '.$userdata['registryRakba'].' विक्रय मूल्‍य रूपये .......................... मे विक्रय की है। उक्‍त भूमि विक्रय मुल्‍य मेरे द्वारा '.$userdata['registryAvedakType'].' से प्राप्‍त कर लिया है। आवेदित भूमि पर मेरे स्‍थान पर '.$userdata['registryAvedakType'].' का नामांतरण किया जावे तो मुझे कोई आपत्ति नहीं है।
                बयान पढ़ा सुना व सही होने से स्‍वीकार किया गया 
                
</pre>
</body>
</html>' ];

    $tableNameForm = 'saar_registry';
    $formNameForm = 'registry';
    $primaryKeys = 'registryId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}


?>