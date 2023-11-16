<?php
include('../genreater-multipage-function.php');

function generatemaritakNamankanForm($cons, $dataId) {

    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_mritak_namantran` WHERE `mritakId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['maritakTappa']!=""){
        $maritakTappa ="टप्पा ".$userdata['maritakTappa'];
    }else{
        $maritakTappa = "";
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
            vertical-align:top;
            font-size:14px;
        }
        .fontSizing{
            font-size:13.5px;
        }
    </style>
    </head>
    <body>
<div class="top-heading"><b><u>न्यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].'</u></b></div>
<pre>
प्रति,
    श्रीमान '.$userdata['maritakCourt'].' महोदय 
    '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].'
   <br><br> 
विषय- मृतक नामांतरण करने के संबंध में। 

महोदय, 
</pre>
<pre>       उपरोक्त विषयांर्तगत निवेदन है कि ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].' में भूमि सर्वे नंबर '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].' कुल रकबा '.$userdata['maritakRakba'].' स्थित है। जिसमें खातेदार श्री/श्रीमती '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' की मृत्यु हो चुकी है । 


उक्त मृतक के वारिसान '.$userdata['maritakVarisJankari'].' निवासी '.$userdata['maritakVarisAddress'].' है। इनके अतिरिक्त अन्य कोई वारिस नहीं है। अतः मृतक के स्थान पर वारिसान नामांतरण करने का कष्ट करें । 


दिनांक
</pre>
<div class="right-side-box">
<b>आवेदक के हस्ताक्षर<br>
'.$userdata['maritakAvedakName'].'<br> 
निवासी '.$userdata['maritakAvedakAddress'].'</b>
</div>','
<!-- *********************************** -->
<pre class="top-heading"><b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['maritakPatwariHalkNum'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].'</u></b></pre>
<pre>
प्रति, 
    श्रीमान '.$userdata['maritakCourt'].' महोदय, 
    '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].'

विषय- मृतक नामांतरण प्रकरण में प्रतिवेदन प्रस्तुत करने के संबंध में ।  

महोदय, 
</pre>
<pre>       उपरोक्त विषयांर्तगत निवेदन है कि ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].' में भूमि सर्वे नंबर '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].' कुल रकबा '.$userdata['maritakRakba'].' हेक्टर स्थित है। जिसमें खातेदार श्री/श्रीमती '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' की मृत्यु हो चुकी है । 
<br><br>
उक्त मृतक के वारिसान के संबंध में ग्राम पंचान से जांच की गई | मृतक '.$userdata['maritakKaName'].' के वारिस '.$userdata['maritakVarisJankari'].' निवासी '.$userdata['maritakVarisAddress'].' है। इनके अतिरिक्त अन्य कोई वारिस नहीं है ।<br> 
अतः मृतक के स्थान पर वारिसान का नामांतरण किया जाना प्रस्तावित है ।</br>
आगामी कार्यवाही हेतु प्रतिवेदन श्रीमान कि सेवा में सादर प्रेषित | 
<br>
<br>
<br>
दिनांक<br>
संलग्न <br>मौका पंचनामा</pre>
<pre class="right-side-box"><b>पटवारी</b></pre>','
<!-- ********************************* -->
<div class="top-heading"><b>पंचनामा</b></div>
<pre class="right-side-box">दिनांक
स्थान</pre>
<br>
<hr>
<br>
<pre>हम पंचान '.$userdata['maritakAvedakAddress'].' के होकर यह पंचनामा लिखा देते है कि ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' भूमि सर्वे नंबर '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].' कुल रकबा '.$userdata['maritakRakba'].' स्थित है जिसमें खातेदार श्री / श्रीमती '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' की मृत्यु हो चुकी है।  

उक्त मृतक के वारिसान '.$userdata['maritakVarisJankari'].' निवासी '.$userdata['maritakVarisAddress'].' है। इनके अतिरिक्त अन्य कोई वारिस नहीं है। अतः मृतक के स्थान पर वारिसान नामांतरण किया जाने में कोई आपत्ति नहीं है। जो पंचनामा लिखा है। जो सही एवं सत्य है। जो पढकर / सुनकर हमने हस्ताक्षर किये है, सो सही | 
</pre>','
<!--************************************* -->
<pre class="top-heading" style="font-size:14px"><b>फार्म अ</b>
(परिपत्र दो-1 की कण्डिका 6 देखिये)
<b>राजस्‍व आदेश - पत्र ( रेवेन्‍यू ऑर्डर शीट)</b></pre>
<div style="font-size:14px">न्यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' के न्यायालय में मामला क्रमांक '.$userdata['maritakPraNumber'].'/अ-6/'.$year.'-'.$yearPlue.'
विषय <b>मृतक नामांतरण बाबत </b>प्रकरण की श्रेणी जॉच प्रतिवेदन ग्राम <b>'.$userdata['maritakBServeAddress'].'</b> बंदोबस्त क्रमांक पटवारी हल्का क्रमांक '.$userdata['maritakPatwariHalkNum'].' '.$userdata['maritakJilla'].' कलेक्टर का प्रकरण क्रमांक सन  20___ - 20___ तहसीलदार का प्रकरण क्रमांक................सन 200__ -200__ '.$userdata['maritakCourt'].' का प्रकरण क्रमांक ................सन 20___- 20___</div>
<table border="1" class="collapsetable">
<tr>
<td class="top-heading"><pre>आदेश क्रमांक 
कार्यवाही की 
तारीख और स्‍थान 
(1)</pre></td>
<td class="top-heading"><pre>पीठासीन अधिकारी के हस्‍ताक्षर सहित आवेदन पत्र अथवा कार्यवाही 
(2)</pre></td>
<td class="top-heading"><pre>जहा आवश्‍यक हो पर्ची अथवा वकीलों के 
हस्‍ताक्षर ,आदेशों के पालन करवाकर लिपिक 
के संक्षिप्‍त हस्‍ताक्षर और प्रकरण की तारीख 
(3)</pre></td></tr>
<tr><td><pre>____/____/'.$year.'</pre></td>
<td>आवेदक '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].' द्वारा आवेदन पत्र प्रस्‍तुत कर ग्राम '.$userdata['maritakBServeAddress'].' तहसील 
'.$maritakTappa.' '.$userdata['maritakTahsil'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].'कुल रकबा '.$userdata['maritakRakba'].' भूमि खातेदार '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' के नाम पर दर्ज है । खातेदार '.$userdata['maritakKaName'].' की मृत्यु हो चुकी है। मृतक खातेदार के स्‍थान पर वारिसान का नामांतरण 
किया जाने का निवेदन किया गया । 
<pre>       -प्रकरण दर्ज हो ।
        -विज्ञप्ति जारी हो । 
        -पटवारी से प्रतिवेदन लिया जावे । 
        -आवेदक तलब हो ।
        -पेशी दिनांक        /      / '.$year.'
                                                                    '.$userdata['maritakCourt'].'
                                                                    '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].'
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
<td></td>
</tr>
</table>
','
<!-- ==================================================================== -->
<div class="top-heading"><b><u>न्यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].' (म.प्र.)</u></b></div>
<pre class="top-heading">क्रमांक      /री-1/'.$year.'                                    '.$userdata['maritakTahsil'].',दिनांक     /    /'.$year.'</pre>
<pre>प्रति, 
    <b>पटवारी        
    ग्राम :- '.$userdata['maritakBServeAddress'].' 
    </b>
    
विषय:- 	नामांतरण प्रकरण में जानकारी प्रस्‍तुत करने बाबत्। 
</pre>
<div class="top-heading">*********** </div>
उपरोक्त विषयान्तार्गत लेख है कि आवेदक '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].'  द्वारा ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' स्थित भूमि सर्वे न. '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].' कुल रकबा '.$userdata['maritakRakba'].' पर मृतक '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' के स्थान  पर नामांतरण किया जाने का आवेदन पत्र म.प्र.भू.रा.स.1959 की धारा
109, 110  के तहत प्रस्तुत कर निवेदन किया गया । उक्त आवेदन पर न्यायालय में प्रकरण क्रमांक................... प्रचलित है | 
<br>
अत: आप मृतक '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' के वारिसों की जानकारी तथा खाते की जानकारी दिनांक <b>................</b>  तक मय पंचनामा के अनिवार्यत: प्रस्तुत करना सुनिश्चित करें | 
<br><br><div class="right-side-box"><b>
'.$userdata['maritakCourt'].'<br>   
'.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].'</b></div>','
<!-- =========================================================================== -->
<div class="top-heading"><b><u>न्यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील -'.$userdata['maritakTahsil'].',जिला '.$userdata['maritakJilla'].' (म.प्र.)</u></b></div>
<div class="top-heading">(मामले वाद धारा 109, 110 म.प्र.भू राजस्व संहिता नामांतरण )</div>
प्रकरण क्रमांक  
<h3 class="top-heading"><u>:: विज्ञप्ति :: </u></h3><br>

<pre>       सर्व साधारण को सूचित किया जाता है कि आवेदक '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].' के द्वारा आवेदन प्रस्‍तुत कर ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' स्थित भूमि सर्वे नम्‍बर '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].' कुल रकबा '.$userdata['maritakRakba'].' भूमि खातेदार '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' की मृत्‍यु होने से उनके स्‍थान पर वारिसान नामांतरण किया जाने का आवेदन प्रस्‍तुत किया गया है।  
            <b><u>अतएव जिस किसी को आपत्ति हो विज्ञप्ति चस्पा होने के दिन से 15 दिनों के अंदर अपनी आपत्ति पटवारी ग्राम '.$userdata['maritakBServeAddress'].' अथवा न्यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' में प्रस्तुत करें । अवधि गुजरने के बाद किसी की आपत्ति मान्य नहीं होगी।</u></b> 
           
   आज दिनांक .............. को मेरे हस्ताक्षर एवं न्यायालय की मुद्रा से जारी किया गया । <br>
   पेशी दिनांक............... 


</pre>
<div class="right-side-box"><b>
'.$userdata['maritakCourt'].'<br>   
'.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].'</b></div>
<pre><b>प्रतिलिपि:- </b>
            1. एक प्रति तहसील कार्यालय के सूचना पटल पर चस्पा की जावे । 
            2. एक प्रति ग्राम पंचायत कार्यालय '.$userdata['maritakBServeAddress'].' के सूचना पटल पर चस्पा की जावे 
            3. एक प्रति बाद निर्वाहन वापस हो ।
</pre>
<div class="right-side-box"><b>
'.$userdata['maritakCourt'].'<br>   
'.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].'</b></div>','
<!-- ========================================================================= -->
<div class="fontSizing"><div class="top-heading">राजस्‍व मामले में नोटिस </div>
<pre>समक्ष '.$userdata['maritakCourt'].' स्‍थान '.$userdata['maritakTahsil'].' मामले                                                           <b> SL-</b>
के विषय मृतक नामांतरण मामला                                                                    <b> -------------------</b>
प्रकरण क्रमांक                                                                                  <b> Date-  /  /'.$year.'</b>
श्री/श्रीमती आवेदक '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].'
विरूद्ध मध्यप्रदेश शासन</pre>
<div class="top-heading">दावा</div>
<pre>श्री/श्रीमती '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].' आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनवाई दिनांक............को दिन में दोपहर 02:00 बजे न्‍यायालय तहसीदार '.$userdata['maritakTahsil'].' पर होगी।
तारीख ..../..../'.$year.'
मुद्रा </pre>
<div class="right-side-box">                                  
रीडर टू तहसीलदार <br>
'.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].'</div>
<div class="top-heading">प्रष्‍टाकन क्रमांक 01</div>
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
<div class="top-heading">प्रष्‍टाकन क्रमांक 02 </div>                                                                            
तामिल करने संबंधी प्रष्‍टाकन<br>
तारीख .... माह..... सन '.$year.' को ............ बजे मेरे बाद तामिल किया गया ।
<div class="right-side-box"> तामील करने वाले के हस्‍ताक्षर </div>
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो । </b>                                                            
<hr>
<div class="top-heading">राजस्‍व मामले में नोटिस </div>
<pre>समक्ष '.$userdata['maritakCourt'].' स्‍थान '.$userdata['maritakTahsil'].' मामले                                                    <b> SL-</b>
के विषय मृतक नामांतरण मामला                                                                            <b> -------------------</b>
प्रकरण क्रमांक                                                                                             <b> Date-  /  /'.$year.'</b>
श्री/श्रीमती आवेदक '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].'
विरूद्ध मध्यप्रदेश शासन</pre>
<div class="top-heading">दावा</div>
<pre>श्री/श्रीमती '.$userdata['maritakAvedakName'].' निवासी '.$userdata['maritakAvedakAddress'].' आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनवाई दिनांक............को दिन में दोपहर 02:00 बजे न्‍यायालय तहसीदार '.$userdata['maritakTahsil'].' पर होगी।
तारीख ..../..../'.$year.'
मुद्रा </pre>
<div class="right-side-box">                                  
रीडर टू तहसीलदार <br>
'.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].'</div>
<div class="top-heading">प्रष्‍टाकन क्रमांक 01</div>
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
<div class="top-heading">प्रष्‍टाकन क्रमांक 02 </div>                                                                            
तामिल करने संबंधी प्रष्‍टाकन<br>
तारीख .... माह..... सन '.$year.' को ............ बजे मेरे बाद तामिल किया गया ।
<div class="right-side-box"> तामील करने वाले के हस्‍ताक्षर </div>
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो । </b>                                                            
</div>','
<!-- Aadesh -->
<div class="top-heading"><b><u>न्‍यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].', जिला - '.$userdata['maritakJilla'].' (म.प्र.) </u></b></div>
<b>आर सी एम एस प्रकरण क्रमांक - </b>
<pre class="right-side"><b>
'.$userdata['maritakAvedakName'].',
निवासी - '.$userdata['maritakAvedakAddress'].' (म.प्र.)</b>
..........आवेदक
<b>विरूद्ध
'.$userdata['maritakEnavedakName'].',
'.$userdata['maritakEnavedakAddress'].'</b>
..........अनावेदक
</pre>
<pre class="top-heading"><b>//आदेश//
<u>आज दिनांक      /    /'.$year.' को पारित 
(मध्यप्रदेश भू –राजस्व संहिता 1959 की धारा 109,110 के तहत नामान्तरण सम्बन्धी)</u></b>
</pre>
<pre>       प्रकरण का संक्षिप्‍त विवरण इस प्रकार है कि आवेदक '.$userdata['maritakAvedakName'].', निवासी - '.$userdata['maritakAvedakAddress'].' के द्वारा भू-राजस्‍व संहिता 1959 की धारा 109-110 के तहत आवेदन पत्र प्रस्‍तुत कर ग्राम -'.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील - '.$userdata['maritakTahsil'].' में स्थित भूमि सर्वे नम्‍बर '.$userdata['maritakBServeNumber'].' रकबा '.$userdata['maritakRakba'].' भूमि पर खातेदार '.$userdata['maritakKaName'].' के नाम पर दर्ज है। खातेदार '.$userdata['maritakKaName'].' की मृत्‍यू हो चुकी है । मृतक खातेदार के स्‍थान पर वारिसान नामांतरण किया जाने का निवेदन किया गया । आवेदक ने आवेदन के समर्थन में मृत्‍यु प्रमाण पत्र, खसरा बी-1, आधार कार्ड व ग्राम पंचायत वारीस प्रमाण पत्रप्रस्‍तुत किया गया ।
            प्रकरणमद अ-6 में दर्ज कर प्रकरण में विज्ञप्ति का प्रकाशन किया गया । समयावधि उपरांत आज दिनांक तक कोई आपत्ति प्राप्‍त नही हुई । प्रकरण में मौजा पटवारी से वारिसान तथा खाते के संबंध में जानकारी ली गई। जिसमें पटवारी मोजा द्वारा मय पंचनामा के प्रतिवेदन प्रस्‍तुत कर आवेदक द्वारा नामांतरण हेतु आवेदित भूमि मृतक के नाम दर्ज होना बताया तथा '.$userdata['maritakVarisJankari'].' हैं, इसके अलावा कोई अन्‍य वैद्य वारिस नहीं है।
            मेरे द्वारा सम्‍पूर्ण प्रकरण का अवलोकन अध्‍ययन व परिक्षण किया गया, समयावधि उपरांत आज दिनांक तक कोई आपत्ति नही आई ।आवेदक द्वारा प्रस्‍तुत दस्‍तावेज व पटवारी के प्रतिवेदन से सहमत होते हुए, ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील - '.$userdata['maritakTahsil'].' स्थि‍त भूमि सर्वे नम्‍बर '.$userdata['maritakBServeNumber'].' रकबा '.$userdata['maritakRakba'].' <b>भूमि पर '.$userdata['maritakVarisJankari'].' निवासी -'.$userdata['maritakVarisAddress'].' का नामान्तरण स्वीकृत किया जाता हैं |</b>साथ ही उक्‍त आदेश में मृतक के वारिसान के अलावा भविष्‍य में मृतक का कोई वेध वारिस पाया जाता है, तो उसकाहक सुरक्षित रहेगा।आदेश की प्रति पटवारी मौजा को राजस्‍व रिकॉर्ड में अमल हेतु भेजी जावे। प्रकरण RCMS दायरे से कम हो| बाद पूर्णता प्रकरण समाप्‍त होकर दायर रिकॉर्ड दाखिल हो।



            </pre>
<pre class="top-heading"><b><u>यह आदेश आज दिनांक   /   /'.$year.' को मेरे बोलने पर टंकन किया गया व मेरे हस्‍ताक्षर व न्‍यायालयीन पद मुद्रा से जारी किया गया। 

</u></b></pre>
<div class="right-side-box">
<b>'.$userdata['maritakCourt'].'<br> 
'.$maritakTappa.' तहसील - '.$userdata['maritakTahsil'].'</b>
</div>                                                                                        
<pre class="top-heading">क्रमांक            /री-1/'.$year.'                             '.$userdata['maritakTahsil'].',दिनांक /    /'.$year.'</pre> 
प्रतिलिपि, <br>
पटवारी मोजा मंगरोला तहसील दलौदा आदेशानुसार राजस्‍व रिकार्ड में अमल कर पालन प्रतिवेदन 03 दिवस में प्रस्‍तुत करें। 
<div class="right-side-box"><b>
'.$userdata['maritakCourt'].'<br>
'.$maritakTappa.' तहसील - '.$userdata['maritakTahsil'].' </b>
</div>
</body>
</html>
'];

$tableNameForm = 'saar_mritak_namantran';
    $formNameForm = 'मृतक नामांतरण';
    $primaryKeys = 'mritakId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}


function generatemaritakNamankanFormNormal($cons, $dataId) {

    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_mritak_namantran` WHERE `mritakId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['maritakTappa']!=""){
        $maritakTappa ="टप्पा ".$userdata['maritakTappa'];
    }else{
        $maritakTappa = "";
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
<div class="top-heading"><b><u>न्यायालय '.$userdata['maritakCourt'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].'</u></b></div>
<pre>
प्रति,
    श्रीमान '.$userdata['maritakCourt'].' महोदय 
    '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].'
   <br> 
विषय- मृतक नामांतरण करने के संबंध में। 

महोदय, 
</pre>
<pre>       उपरोक्त विषयांर्तगत निवेदन है कि ग्राम '.$userdata['maritakBServeAddress'].' '.$maritakTappa.' तहसील '.$userdata['maritakTahsil'].' जिला '.$userdata['maritakJilla'].' में भूमि सर्वे नंबर '.$userdata['maritakBServeNumber'].' कुल सर्वे नंबर '.$userdata['maritakBServeKulNumber'].' कुल रकबा '.$userdata['maritakRakba'].' हेक्टर स्थित है। जिसमें खातेदार श्री/श्रीमती '.$userdata['maritakKaName'].' निवासी '.$userdata['maritakAddress'].' की मृत्यु हो चुकी है । 


उक्त मृतक के वारिसान '.$userdata['maritakVarisJankari'].' निवासी '.$userdata['maritakVarisAddress'].' है। इनके अतिरिक्त अन्य कोई वारिस नहीं है। अतः मृतक के स्थान पर वारिसान नामांतरण करने का कष्ट करें । 


दिनांक
</pre>
<div class="right-side-box">
<b>आवेदक के हस्ताक्षर<br>
'.$userdata['maritakAvedakName'].'<br> 
निवासी '.$userdata['maritakAvedakAddress'].'</b>
</div>
</body>
</html>
'];

$tableNameForm = 'saar_mritak_namantran';
    $formNameForm = 'मृतक नामांतरण';
    $primaryKeys = 'mritakId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>