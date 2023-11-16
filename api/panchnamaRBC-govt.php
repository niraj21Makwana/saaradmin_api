<?php
include('../genreater-multipage-function.php');

function generatePanchnamaRBCForm($cons, $dataId) {


    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_panchnamaRBC` WHERE `panRBCId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['panRBCTappa']!=""){
        $panRBCTappa ="टप्पा ".$userdata['panRBCTappa'];
    }else{
        $panRBCTappa = "";
    }

    //@font-face { font-family: notosans; src: url("font/Noto_sans/NotoSans-Regular.ttf"); }  @font-face { font-family: kokilaregular; src: url("https://saars.in/adminsaar/api/font/Kokila-Regular.ttf"); }
    $html = [
        '<html>
<head>
    <meta charset="utf-8">
    <style>
        @font-face {
            font-family: kokilaregular;
            src: url("https://saars.in/adminsaar/api/font/Kokila-Regular.ttf");
        }
        body {
            font-size: 14pt;
            font-family: "kokila";
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
        .right-side {
            text-align: right;
            margin-right: 10px;
        }
        .right-side-box {
            text-align: right;
            margin-right: 10%;
        }
        .justify-side {
            text-align: justify;
        }
        .text-align-left {
            margin-left: 17%;
        }
        .table-position {
            margin-left: 10%;
        }
        table {
            border-collapse: collapse;
        }
        td {
            padding: 10px;
        }
        .fontSizeing{
            font-size:16px;
        }
    </style>
</head>
<body>
    <div class="large-text">
        <div class="top-heading">
           <b><u>पंचनामा</u></b>
        </div>
<pre class="right-side-box">
स्थान -         
दिनांक -          
</pre>
            <div class="justify-side">
                हम पंचान ग्राम '.$userdata['panRBCGao'].' के होकर यह पंचनामा तस्दीक करते है कि दिनांक '.$userdata['panRBCDate'].' को हुई अतिवृष्टि से ग्राम '.$userdata['panRBCAavedakName'].' निवासी '.$userdata['panRBCAavedakAddress'].' के आवासीय / गैर आवासीय मकान की दिवार तेज बारिश से गिर गयी है ,जिसका विवरण एवं नुकसानी निम्नानुसार है |
                <ul class="text-align-left">
                    <li>दिवार का प्रकार - '.$userdata['panRBCWallType'].'</li>
                    <li>गिरी दीवार कि संख्या- '.$userdata['panRBCWallTotal'].'</li>
                    <li>दीवार जिसकि लम्बाई*ऊचाई - '.$userdata['panRBCWallWidth'].' * '.$userdata['panRBCWallHeight'].' वर्ग फीट</li>
                    <li>अनुमानित नुकसान - '.$userdata['panRBCLoss'].' रूपए मात्र /- </li>
                </ul>

                उक्त दीवार गिरने से कोई जनहानी या पशुहानि नही हुई है। अतः यह पंचनामा हम पंचो द्वारा यह पंचनामा लिखा ,पढा, सुना बाद में इस्ताक्षर किये जो सही वक्त जरूरत काम आये।
            </div>
','
<div class="top-heading"><b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['panRBCPatwariHalkNum'].' '.$panRBCTappa.' तहसील '.$userdata['panRBCTehsil'].' जिला '.$userdata['panRBCJilla'].'</u></b></div>
<div class="justify-side">
<pre>
प्रति, 
                            
    श्रीमान '.$userdata['panRBCcourt'].' महोदय, 
    '.$panRBCTappa.' तहसील '.$userdata['panRBCTehsil'].' जिला '.$userdata['panRBCJilla'].'
                     

विषय-अतिवृष्टि से मकान गिरने बाबत |  
                   
महोदय, 
                
    उपरोक्त विषयान्तर्गत निवेदन है कि दिनांक '.$userdata['panRBCDate'].' को भारी बारिश अतिवृष्टि होने से ग्राम '.$userdata['panRBCGao'].' के '.$userdata['panRBCAavedakName'].' निवासी '.$userdata['panRBCAavedakAddress'].' के आवासीय / गैर आवासीय मकान  कि दीवार गिर गई है | मेरे द्वारा मौका जाच पंचो के समक्ष कि गयी | मौका जाच अनुसार क्षति विवरण निम्नानुसार है | 
</pre>
<ul class="text-align-left">
    <li>दिवार का प्रकार - '.$userdata['panRBCWallType'].'</li>
    <li>गिरी दीवार कि संख्या- '.$userdata['panRBCWallTotal'].'</li>
    <li>दीवार जिसकि लम्बाई*ऊचाई - '.$userdata['panRBCWallWidth'].' * '.$userdata['panRBCWallHeight'].' वर्ग फीट</li>
    <li>अनुमानित नुकसान - '.$userdata['panRBCLoss'].' रूपए मात्र /- </li>
</ul>
<pre>
मौका उपस्थित पंचान अनुसार कोई जनहानी तथा पशुहानि नहीं हुई है |
आगामी कार्यवाही हेतु श्रीमान कि सेवा में प्रतिवेदन सादर प्रेषित | 

संलग्न 
पंचनामा
आर.बी.सी 6-4 
</pre>
</div>',
'<div class="top-heading">
<pre><b><u>प्रारूप - दो</u>
(राजस्व पुस्तक परिपत्र 6-4 कण्डिका 6 देखिये)</b>
</pre>
</div>
<div>
    <table border="1" class="fontSizeing">
        <tr>
            <td>1</td>
            <td>विपत्तिग्रस्त व्यक्ति नाम  उसके पिता का नाम तथा पूर्ण पता</td>
            <td>'.$userdata['panRBCAavedakName'].' निवासी '.$userdata['panRBCAavedakAddress'].'</td>
        </tr>
        <tr>
            <td>2</td>
            <td>विपत्तिग्रस्त व्यक्ति कृषक है अथवा गैर-कृषक? यदि कृषक है तो कृषि भूमि का पूर्ण ब्यौरा </td>
            <td></td>
        </tr>
        <tr>
            <td>3</td>
<td><pre>हानि का पूर्ण ब्यौरा 
(एक) फसल हानि 
(दो) पशु पक्षी (मुर्गी / मुर्गा) हानि 
(तीन) मकान की क्षति (क्षतिग्रस्त मकान का पूर्ण विवरण आकार,प्रयोजन एवं क्षति के विवरण) 
(चार) कपडा / बर्तन / खाद्यान्न की हानि 
(पांच) जनहानि (मृतक से आवेदक का संबंध) 
(छ) शारीरिक अंग हानि  
अन्य हानि (जिसके लिए रा.पु.परिपत्र सहायता देय है) </pre></td>
<td><pre>(A) दिवार का प्रकार - '.$userdata['panRBCWallType'].'
(B) गिरी दीवार कि संख्या- '.$userdata['panRBCWallTotal'].'
(C) दीवार जिसकि लम्बाई*ऊचाई - '.$userdata['panRBCWallWidth'].' * '.$userdata['panRBCWallHeight'].' वर्ग फीट
(D) अनुमानित नुकसान - '.$userdata['panRBCLoss'].' रूपए मात्र/- </pre></td>
</tr>
<tr>
    <td>4</td>
    <td>क्या विपत्तिग्रस्त व्यक्ति निराश्रित है और क्या उसका कोई ऐसा संबंधी या मित्र नहीं है जो उसकी सहायता कर सके?</td>
    <td>नही </td>
</tr>
<tr>
   <td>5</td>
    <td>पूर्ण औचित्य बतलाते हुए वित्तीय सहायता जो तत्काल दी जानी चाहिए उसका ब्यौरेवार विवरण </td>
    <td>पीड़ित शासन से नियमानुसार सहायता चाहता है |</td>
</tr>
<tr>
    <td>6</td>
    <td>क्या स्थानीय दान के जरिये सहायता की व्यवस्था संभव नहीं है?</td>
    <td>नहीं</td>
</tr>
<tr>
   <td>7</td>
    <td>क्या विपत्तिग्रस्त व्यक्ति ऋण चाहता है और क्या वह कोई शोधक्षम प्रतिभूमि देने के लिए तैयार है?</td>
    <td>नहीं</td>
</tr>
<tr>
    <td>8</td>
    <td>कितना ऋण मांगा है? ऋण दिये जाने का पूर्ण औचित्य बताया जाना चाहिए</td>
    <td>-</td>
</tr>
<tr>
    <td rowspan="2">9</td>
    <td rowspan="2">अन्य विवरण प्रभावित व्यक्ति का बैंक खाता क्रमांक बैंक एवं शाखा के नाम सहित ।</td>
    <td>IFSC | '.$userdata['panRBCIFSC'].'</td>
</tr>
<tr>
    <td>A/c | '.$userdata['panRBCAccN'].'</td>
</tr>
</table>
</div>
<div>
<pre><b>स्थान
दिनांक</b>
</pre>
<div class="right-side">
हस्ताक्षर आवेदक<br />
नाम- '.$userdata['panRBCAavedakName'].'<br />
पता - <b>'.$userdata['panRBCAavedakAddress'].'</b><br />
</div>
</div>
</div>
</body>
</html>' ]; 


    $tableNameForm = 'saar_panchnamaRBC';
    $formNameForm = 'आरबीसी (A) अतिवृष्टि से मकान क्षति';
    $primaryKeys = 'panRBCId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>