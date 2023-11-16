<?php
include('../genreater-multipage-function.php');

function generateKalamBaraForm($cons, $dataId)
{
  $userQuery = mysqli_query($cons, "SELECT * FROM `saar_kalamBara` WHERE `kalamBaraId`='$dataId'");
  $userdata = mysqli_fetch_assoc($userQuery);

  $year = date('Y');
  $lastTwoDigits = substr($year, -2);
  $yearPlue = $lastTwoDigits+1;
 
  if($userdata['kalamBaraTappa']!=""){
      $kalamBaraTappa ="टप्पा ".$userdata['kalamBaraTappa'];
    }else{
      $kalamBaraTappa = "";
    }


  $html = ['
  <html>
  <head>
    <meta charset="utf-8" />
    <style>
      body {
        font-size: 12.5pt;
        justify-content: space-between;
       }
       .top-heading{
        text-align: center;
       }
       .right-side{
          text-align:right;
          margin-right:10%;
       }
       .collapsetable{
       width:100%;
        border-collapse: collapse;
        vertical-align:top;
       }
       .rightSideON{
        text-align:right;
       }
       .fontSizing{
           font-size:14px;
       }
    </style>
  </head>
  <body>
<pre class="top-heading"><b><u>श्रीमान '.$userdata['kalamBaraCourt'].' महोदय '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' म. प्र.</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक<b> '.$userdata['kalamBaraParNumber'].'/बी-121/'.$year.'-'.$yearPlue.'</pre>
<pre><b>'.$userdata['kalamBaraAvedakName'].'
'.$userdata['kalamBaraAvedakAddress'].'</b></pre>
<div style="text-align:right">प्रार्थी</div>
<pre>बनाम
'.$userdata['kalamBaraEnAvedakName'].'</pre>
<div style="text-align:right">विपक्षी </div> 
<b>विषय - सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].' में स्थित '.$userdata['kalamBaraKhasreMPar'].' खसरे में दर्ज करवाने बाबत |</b>
<pre>महोदय,
            प्रार्थी गण की ओर से आवेदन सदर पेश है:- 
1 यह कि प्रार्थीगण के नाम से ग्राम '.$userdata['kalamBaraBTAddress'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' में एक कृषि खाता स्थित होकर जिसका सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].'  रकवा '.$userdata['kalamBaraRakba'].' हेक्टर भूमि स्थित है | 
2 उक्त  वर्णित भूमि सर्वे नंबर में '.$userdata['kalamBaraKhasreMPar'].' स्थित है उक्त '.$userdata['kalamBaraKhasreMPar'].' लगभग '.$userdata['kalamBaraKitneYearOld'].' वर्ष पुराने है। 
3 यह कि उक्त '.$userdata['kalamBaraKhasreMPar'].' को भूमि सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].' में राजस्व रिकॉर्ड खसरे में दर्ज करवाना है 

अतः श्रीमान जी से निवेदन है कि उक्त खसरे में दर्ज करने का आदेश प्रदान करने की कृपा करें | 

दिनांक  - 

</pre>
<p style="text-align:right"> हस्‍ताक्षर प्रार्थी</p>','
<pre class="top-heading"><mark><b><u>न्यायालय '.$userdata['kalamBaraCourt'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' (म.प्र.)</u></b></mark></pre>
<pre>क्रमांक          /री-1/'.$year.'                                                               '.$userdata['kalamBaraTahsil'].',दिनांक       /    /'.$year.'</pre>
<pre>प्रति,                                                                                                                   <b>SL -</b>
        <b>पटवारी                                                                                                            -------------
           ग्राम :- '.$userdata['kalamBaraAvedakAddress'].'</b>                                                            Date -    /    /'.$year.'

विषय:- 	प्रकरण में रिपोर्ट प्रस्तुत करने बाबत। </pre>
<div class="top-heading">*********</div>
<pre>                 उपरोक्त विषयांतर्गत लेख है कि आवेदक '.$userdata['kalamBaraAvedakName'].' निवासी ग्राम '.$userdata['kalamBaraAvedakAddress'].' द्वारा ग्राम '.$userdata['kalamBaraBTAddress'].' स्थित भूमि सर्वे '.$userdata['kalamBaraBServeNumber'].' रकबा '.$userdata['kalamBaraRakba'].' हेक्टर में '.$userdata['kalamBaraKhasreMPar'].' खसरे में दर्ज किये जाने का आवेदन प्रस्तुत किया गया । 
                      प्रकरण क्रमांक <b>'.$userdata['kalamBaraParNumber'].'/बी-121/'.$year.'-'.$yearPlue.'</b>न्यायालय में प्रचलित है। अतः उक्त भूमि के संबंध में आप अपनी रिपोर्ट प्रकरण में नियत पेशी दिनांक       /     /<b>'.$year.'</b> के पूर्व अनिवार्यतः प्रस्तुत करें ।
                      
                      <b>उक्त रिपोर्ट प्रकरण में नियत पेशी दिनांक      /       /'.$year.' के पूर्व अनिवार्यतः प्रस्तुतकी जावें । नियत पेशी दिनांक तक प्रकरण में आपकी रिपोर्ट प्राप्त नहीं होने पर उक्त नामांतरण प्रकरण में आपकी अनुसंशा मानी जाकर एक तरफा कार्यवाही कर दी जावेगी । एक तरफा कार्यवाही किये जाने के बाद प्रकरण में आपत्ति/विवाद होने पर समस्त उत्तरदायित्व आपका माना जावेगा । अतः समय सीमा का विशेष ध्यान रखा जावे । </b> 
</pre>
<pre style="text-align:right"><b>'.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'</b></pre>','
<pre class="top-heading"><b>न्यायालय '.$userdata['kalamBaraCourt'].' '.$kalamBaraTappa.' तहसील - '.$userdata['kalamBaraTahsil'].',जिला '.$userdata['kalamBaraJilla'].' (म.प्र.)</b></pre>
<pre>प्रकरण क्रमांक <b>'.$userdata['kalamBaraParNumber'].'/बी-121/'.$year.'-'.$yearPlue.'</b>                                                               <b>SL</b></pre>
<pre class="right-side">----------------------
Date -   /   /'.$year.'</pre>
<div class="top-heading"><b><u>विज्ञप्ति</u></b></div>
<pre>                      सर्व साधारण को सूचित किया जाता है कि ग्राम '.$userdata['kalamBaraBTAddress'].' स्थित भूमि सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].' रकबा '.$userdata['kalamBaraRakba'].' हेक्टर पर '.$userdata['kalamBaraAvedakName'].',निवासी ग्राम '.$userdata['kalamBaraAvedakAddress'].',द्वारा ग्राम '.$userdata['kalamBaraBTAddress'].' स्थित भूमि सर्वे '.$userdata['kalamBaraBTAddress'].' रकबा '.$userdata['kalamBaraRakba'].' हेक्टर में '.$userdata['kalamBaraKhasreMPar'].' खसरे में दर्ज किये जाने का आवेदन किया है |    
                           अतएव जिस किसी को आपत्ति हो विज्ञप्ति चस्पा होने के दिन से <b>15</b> दिनों के अंदर अपनी आपत्ति पटवारी ग्राम        अथवा न्यायालय '.$userdata['kalamBaraCourt'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' में प्रस्तुत करें । अवधि गुजरने के बाद को किसी की आपत्ति मान्य नहीं होगी।
                           आज दिनांक       /       /<b>'.$year.'</b> को मेरे हस्ताक्षर एवं न्यायालय की मुद्रा से जारी किया गया।
</pre>
<pre style="text-align:right">

<b>'.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'</b></pre>
<pre>प्रतिलिपि:- 
              1. एक प्रति तहसील कार्यालय के सूचना पटल पर चस्पा की जावे ।
              2. एक प्रति ग्राम पंचायत कार्यालय '.$userdata['kalamBaraEnAvedakName'].' के सूचना पटल पर चस्पा की जावे | 
              3. एक प्रति बाद निर्वाहन वापस हो ।    


</pre>                            
<pre style="text-align:right"><b>'.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'
</b></pre>','
<div class="fontSizing">
<pre class="top-heading"><b>राजस्‍व मामले में नोटिस </b></pre>
<pre>समक्ष '.$userdata['kalamBaraCourt'].' स्‍थान '.$userdata['kalamBaraTahsil'].' मामले                                                       <b>SL -</b>
के विषय मृतक नामांतरण मामला                                                                                        <b>--------------</b>
<b>प्रकरण क्रमांक  '.$userdata['kalamBaraParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b>                                                         <b>Date-  /  /'.$year.'</b>
श्री/श्रीमती आवेदक '.$userdata['kalamBaraAvedakName'].' निवासी ग्राम '.$userdata['kalamBaraAvedakAddress'].'
</pre><p style="text-align:right"><b>विरूद्ध</b></p>
<div class="top-heading">दावा</div>
<pre>श्री/श्रीमती <b>'.$userdata['kalamBaraEnAvedakName'].'</b>,निवासी -487 आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनावाई दिनांक      /     /<b>'.$year.'</b> को दिन में दोपहर <b>02:00</b> बजे न्‍यायालय '.$userdata['kalamBaraCourt'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' पर होगी। 
तारीख       /     /'.$year.'
मुद्रा</pre><pre style="text-align:right">रीडर टू '.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'</pre>
<pre>                                                       प्रष्‍टाकन क्रमांक 01
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
                                                            प्रष्‍टाकन क्रमांक 02 </pre>
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन 2023 को ................. बजे मेरे बाद तामिल किया गया । </pre>
<p style="text-align:right">तामील करने वाले के हस्‍ताक्षर</p> 
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>                                                          
<pre class="top-heading"><b>राजस्‍व मामले में नोटिस </b></pre>
<pre>समक्ष '.$userdata['kalamBaraCourt'].' स्‍थान '.$userdata['kalamBaraTahsil'].' मामले                                                           <b>SL -</b>
के विषय मृतक नामांतरण मामला                                                                                           <b>--------------</b>
<b>प्रकरण क्रमांक  '.$userdata['kalamBaraParNumber'].'/अ-6/'.$year.'-'.$yearPlue.'</b>                                                              <b>Date-  /  /'.$year.'</b>
श्री/श्रीमती आवेदक '.$userdata['kalamBaraAvedakName'].' निवासी ग्राम '.$userdata['kalamBaraAvedakAddress'].'
</pre><p style="text-align:right"><b>विरूद्ध</b></p>
<div class="top-heading">दावा</div>
<pre>श्री/श्रीमती <b>'.$userdata['kalamBaraEnAvedakName'].'</b>,निवासी -487 आपको सूचित किया जाता है कि उपयुक्‍त मामले की सूनावाई दिनांक      /     /<b>'.$year.'</b> को दिन में दोपहर <b>02:00</b> बजे न्‍यायालय '.$userdata['kalamBaraCourt'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' पर होगी। 
तारीख       /     /'.$year.'
मुद्रा</pre><pre style="text-align:right">रीडर टू '.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'</pre>
<pre>                                                       प्रष्‍टाकन क्रमांक 01
बुलाये गये व्‍यक्ति के हस्‍ताक्षर
                                                            प्रष्‍टाकन क्रमांक 02 </pre>
<pre>तामिल करने संबंधी प्रष्‍टाकन
तारीख ............. माह......... सन 2023 को ................. बजे मेरे बाद तामिल किया गया । 
</pre><p style="text-align:right">तामील करने वाले के हस्‍ताक्षर</p> 
<b>नोट - पक्षकार मास्‍क लगा कर एवं पुकार लगाने पर ही न्‍यायालय में उपस्थित हो ।</b>                                                          
</div>','
<pre class="top-heading"><b>कार्यालय पटवारी हल्का नंबर '.$userdata['kalamBaraPatwariHalkNum'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].'</b></pre>
<pre>प्रति, 
        श्रीमान '.$userdata['kalamBaraCourt'].' महोदय, 
        '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' 
                                
विषय- '.$userdata['kalamBaraKhasreMPa'].' खसरे में दर्ज हेतु प्रतिवेदन प्रस्तुत करने के संबंध में ।

सन्दर्भ - ग्राम '.$userdata['kalamBaraAvedakAddress'].' स्थित भूमि सर्व नंबर '.$userdata['kalamBaraBServeNumber'].' में '.$userdata['kalamBaraKhasreMPa'].' कि प्रविष्टी बाबत |                                    

महोदय, </pre>
<pre>         उपरोक्त विषयांर्तगत निवेदन है कि ग्राम '.$userdata['kalamBaraBTAddress'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' में स्थित भूमि सर्वे नंबर '.$userdata['kalamBaraBServeNumbe'].' रकबा '.$userdata['kalamBaraRakba'].' हेक्टर स्थित है जिसमें खातेदार श्री / श्रीमती '.$userdata['kalamBaraAvedakName'].' निवासी ग्राम '.$userdata['kalamBaraAvedakAddress'].' द्वारा खसरे में '.$userdata['kalamBaraKhasreMPar'].' प्रविष्टि करने का निवेदन किया है |
उक्त  संबंध में मेरे द्वारा मौका जाच ग्राम  पंचान के साथ  की गई | मौका जाच में पाया गया कि ग्राम '.$userdata['kalamBaraBTAddress'].' में भूमि सर्व नंबर '.$userdata['kalamBaraBServeNumber'].' पर '.$userdata['kalamBaraKhasreMPar'].' स्थित है | परन्तु खसरे में दर्ज नहीं है
अतः आवेदक के खसरे के 12 नंबर कॉलम में '.$userdata['kalamBaraKhasreMPar'].' कि प्रविष्टी करना उचित होगा | 
आगामी कार्यवाही हेतु प्रतिवेदन श्रीमान कि सेवा में सादर प्रेषित | 


दिनांक 


संलग्न मौका पंचनामा 
                                                                  
</pre>
<pre style="text-align:right">
पटवारी
</pre>','
<p class="top-heading"><b><u>पंचनामा</u></b></p>
<pre class="right-side">दिनांक -
स्थान -</pre>
<hr>                                                       
<pre>हम पंचान ग्राम '.$userdata['kalamBaraBTAddress'].' से होकर यह पंचनामा तस्दीक करवा देते हे कि आवेदक '.$userdata['kalamBaraAvedakName'].' निवासी ग्राम '.$userdata['kalamBaraAvedakAddress'].' द्वारा पटवारी मौजा पहन '.$userdata['kalamBaraPatwariHalkNum'].' स्थित भूमि सर्वे नम्बर '.$userdata['kalamBaraBServeNumber'].' में स्थित '.$userdata['kalamBaraKhasreMPar'].' कि प्रविष्टी खसरे मे दर्ज करने हेतु न्यायालय तहसील '.$userdata['kalamBaraTahsil'].' में आवेदन प्रस्तुत किया गया हे, इसकी मौका जाच हेतु मय पटवारी मौजा हम पंचान    उपस्थित हुए | 

हम पंचांग एवं मौजा पटवारी की उपस्थिति में मोका जाच पर पाया गया कि सर्व नंबर '.$userdata['kalamBaraBServeNumber'].' में '.$userdata['kalamBaraKhasreMPar'].' स्थित होकर बना हुआ है,जो कि मौका पंचान अनुसार लगभग '.$userdata['kalamBaraKitneYearOld'].' वर्ष पुराना है | 

अतः हम पंचांग द्वारा यह पंचनामा लिखा जाता है कि आवेदक के खसरे में '.$userdata['kalamBaraKhasreMPar'].' कि प्रविष्टी किया जाना उचित होगा |  

अत: हम पंचांग द्वारा जो पंचनामा बना कर पड़ा सुना गया सो सही । 
</pre>','
<pre class="top-heading"><b><u>न्‍यायालय‍ '.$userdata['kalamBaraCourt'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].', जिला‍– '.$userdata['kalamBaraJilla'].' (म.प्र.)</u><b></pre>
प्रकरण क्रमांक  '.$userdata['kalamBaraParNumber'].'/बी-121/'.$year.'-'.$yearPlue.'
<pre class="rightSideON"><b>'.$userdata['kalamBaraAvedakName'].'
निवासी-'.$userdata['kalamBaraAvedakAddress'].'</b>
..........आवेदक
<b>विरूद्ध
'.$userdata['kalamBaraEnAvedakName'].'</b>
.........अनावेदक</pre>
<pre class="top-heading"><b>//आदेश//
<u>पारित दिनांक        /       /'.$year.'</u></b></pre>
<pre>          प्रकरण का संक्षिप्तक विवरण इस प्रकार है कि आवेदक '.$userdata['kalamBaraAvedakName'].' निवासी '.$userdata['kalamBaraAvedakAddress'].' द्वारा आवेदनपत्र प्रस्तुत कर उल्लेखित किया गया की उसके नाम से ग्राम '.$userdata['kalamBaraBTAddress'].' में कृषि भूमि सर्वे नम्बर '.$userdata['kalamBaraBServeNumber'].' कुल भूमि सर्वे नम्बर '.$userdata['kalamBaraKulBserveNumber'].' कुल रकबा '.$userdata['kalamBaraRakba'].' भूमि स्थित है । उक्त भूमि पर '.$userdata['kalamBaraKhasreMPar'].' स्थित है | जो कि लगभग '.$userdata['kalamBaraKitneYearOld'].' वर्ष पुराना है | उक्त '.$userdata['kalamBaraKhasreMPar'].' को उसकी कृषि भूमि के राजस्व रिकॉर्ड में दर्ज किया जाने का निवेदन किया गया ।
आवेदक के आवेदन की जाँच पटवारी मौजा से करवाई गई । पटवारी मौजा द्वारा प्रतिवेदन मय पंचनामा के प्रस्तुत कर बताया गया की ग्राम '.$userdata['kalamBaraBTAddress'].' में भूमि सर्वे नम्बर '.$userdata['kalamBaraBServeNumber'].' कुल भूमि सर्वे नम्बर '.$userdata['kalamBaraKulBserveNumber'].' में '.$userdata['kalamBaraKhasreMPar'].' स्थित है,जो कि लगभग '.$userdata['kalamBaraKitneYearOld'].' वर्ष पुराना है |मेरे द्वारा पटवारी प्रतिवेदन का अवलोकन किया गया । अतः ग्राम '.$userdata['kalamBaraBTAddress'].' स्थित भूमि सर्वे नम्बर '.$userdata['kalamBaraBServeNumber'].' कुल भूमि सर्वे नम्बर '.$userdata['kalamBaraKulBserveNumber'].' भूमि पर '.$userdata['kalamBaraKhasreMPar'].' की प्रविष्ठी किया जाने का आदेश दिया जाता है । आदेश का पालन राजस्व रिकॉर्ड में किया जाने हेतु आदेश की प्रति पटवारी मौजा को भेजी जावे | बाद पूर्णता प्रकरण समाप्त होकर दायर रिकॉर्ड दाखिल हो।
</pre>
<pre class="rightSideON">'.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'
</pre>
<pre>क्रमांक           री-1/'.$year.'

प्रतिलिपि:-

पटवारी मौजा '.$userdata['kalamBaraBTAddress'].' आदेशानुसार राजस्व रिकॉर्ड में अमल कर पालन प्रतिवेदन प्रस्तुत करें ।</pre>
<pre class="rightSideON">'.$userdata['kalamBaraCourt'].'
'.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].'
</pre>
</body>
</html>'
  ];
  $tableNameForm = 'saar_kalamBara';
  $formNameForm = 'अन्य प्रविष्टि आदेश';
  $primaryKeys = 'kalamBaraId';

  generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

function generateKalamBaraFormNormal($cons, $dataId)
{
  $userQuery = mysqli_query($cons, "SELECT * FROM `saar_kalamBara` WHERE `kalamBaraId`='$dataId'");
  $userdata = mysqli_fetch_assoc($userQuery);

  $year = date('Y');
  $lastTwoDigits = substr($year, -2);
  $yearPlue = $lastTwoDigits+1;
 
  if($userdata['kalamBaraTappa']!=""){
      $kalamBaraTappa ="टप्पा ".$userdata['kalamBaraTappa'];
    }else{
      $kalamBaraTappa = "";
    } 

  $html = ['
  <html>
  <head>
    <meta charset="utf-8" />
    <style>
      body {
        font-size: 12.5pt;
        justify-content: space-between;
       }
       .top-heading{
        text-align: center;
       }
       .right-side{
          text-align:right;
          margin-right:10%;
       }
    </style>
  </head>
  <body>
<pre class="top-heading"><b><u>श्रीमान '.$userdata['kalamBaraCourt'].' महोदय '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' म. प्र.</u></b></pre>
<pre class="right-side">प्रकरण क्रमांक<b> '.$userdata['kalamBaraParNumber'].'/बी-121/'.$year.'-'.$yearPlue.'</pre>
<pre><b>'.$userdata['kalamBaraAvedakName'].'
'.$userdata['kalamBaraAvedakAddress'].'</b></pre>
<div style="text-align:right">प्रार्थी</div>
<pre>बनाम
'.$userdata['kalamBaraEnAvedakName'].'</pre>
<div style="text-align:right">विपक्षी </div> 
<b>विषय - सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].' में स्थित '.$userdata['kalamBaraKhasreMPar'].' खसरे में दर्ज करवाने बाबत |</b>
<pre>महोदय,
            प्रार्थी गण की ओर से आवेदन सदर पेश है:- 
1 यह कि प्रार्थीगण के नाम से ग्राम '.$userdata['kalamBaraBTAddress'].' '.$kalamBaraTappa.' तहसील '.$userdata['kalamBaraTahsil'].' जिला '.$userdata['kalamBaraJilla'].' में एक कृषि खाता स्थित होकर जिसका सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].'  रकवा '.$userdata['kalamBaraRakba'].' हेक्टर भूमि स्थित है | 
2 उक्त  वर्णित भूमि सर्वे नंबर में '.$userdata['kalamBaraKhasreMPar'].' स्थित है उक्त '.$userdata['kalamBaraKhasreMPar'].' लगभग '.$userdata['kalamBaraKitneYearOld'].' वर्ष पुराने है। 
3 यह कि उक्त '.$userdata['kalamBaraKhasreMPar'].' को भूमि सर्वे नंबर '.$userdata['kalamBaraBServeNumber'].' में राजस्व रिकॉर्ड खसरे में दर्ज करवाना है 

अतः श्रीमान जी से निवेदन है कि उक्त खसरे में दर्ज करने का आदेश प्रदान करने की कृपा करें | 

दिनांक  - 

</pre>
<p style="text-align:right"> हस्‍ताक्षर प्रार्थी</p>
</body>
</html>'];

  $tableNameForm = 'saar_kalamBara';
  $formNameForm = 'अन्य प्रविष्टि आदेश';
  $primaryKeys = 'kalamBaraId';

  generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}



?>