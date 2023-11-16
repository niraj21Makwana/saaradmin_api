<?php
include('../pdf-Genreater-Function.php');

function generateLaganPrapatraForm($cons, $dataId) {


    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_prman_patra` WHERE `prpatraId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    if($userdata['prapatraTappa']!=""){
        $prapatraTappa ="टप्पा ".$userdata['prapatraTappa'];
    }else{
        $prapatraTappa = "";
    }
    
    $html = '
<html>
<head>
    <meta charset="UTF-8">
    <style>
    @font-face { font-family: kokilaregular; src: url("https://saars.in/adminsaar/api/font/Kokila-Regular.ttf"); }
        body {
            font-size: 14px;
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
            font-size: 17pt;
            justify-content: space-between;

        }

        .table-center {
            margin-left: auto;
            margin-right: auto;
        }

        pre {
            justify-content: space-between;
        }
        .right-side{
           text-align: right;
           margin-right:10%;
        }
        .table-css{
            width:100%;
            border-collapse: collapse;
            font-size:14px;
        }
    </style>
</head>

<body>
<div class="large-text">
<div class="top-heading"><b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['prapatraPatwariHalkNum'].' '.$prapatraTappa.' तहसील '.$userdata['prapatraTehsil'].' जिला '.$userdata['prapatraJilla'].'</u></b></div>
<pre class="right-side">
<b>स्थान -            </b>
दिनांक -              </b>
</pre>

<pre>
प्रयह प्रमाणित किया जाता है कि पटवारी मौजा <b>'.$userdata['prpatraBTAddress'].'</b> में स्थित भूमि सर्वे नंबर <b>'.$userdata['prapatraBServeNum'].'</b> कुल किता कुल रकबा <b>'.$userdata['prapatraRakba'].' हेक्टर </b>भूमि स्वामी <b>'.$userdata['prpatraAavedakName'].' '.$userdata['prpatraAvedakAddress'].'</b> के नाम से स्थित है। एवं इनकी भूमि पर भूमि कर (लगान) ,उपकर,शाला कर ,पंचायत कर मिलाकर  कुल '.$userdata['prapatraLagan'].' रुपए मात्र/- हैं जो कि इन्होंने जमा कर दिया है |

अतः अभी तक वर्तमान में इनकी भूमि पर कोई भी लगान (कर) बाकी नहीं है, अतः यह प्रमाणित किया जाता है सो सही | 

उक्त प्रमाणीकरण आवेदक की मांग के आधार पर जारी किया जा रहा है |
 
</pre>
</div>
</body>
</html>
';


    $tableNameForm = 'saar_prman_patra';
    $formNameForm = 'प्रमाण पत्र लगान सम्बन्धी';
    $primaryKeys = 'prpatraId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

function generateBuwaiPrpatraForm($cons, $dataId) {

    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_prman_patra` WHERE `prpatraId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $year = date('Y');
    if($userdata['prapatraTappa']!=""){
        $prapatraTappa ="टप्पा ".$userdata['prapatraTappa'];
    }else{
        $prapatraTappa = "";
    }

    $html = '<html>
        <head>
            <meta charset="utf-8">
            <style>
                @font-face {
                    font-family: kokilaregular;
                    src: url("https://saars.in/adminsaar/api/font/Kokila-Regular.ttf");
                }
        
                body {
                    font-size: 17pt;
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
                    font-size: 17pt;
                    justify-content: space-between;
                }
        
                .right-side {
                    text-align: right;
                    margin-right: 25%;
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
                td {
                    padding: 10px;
                }
                .row1-col1{
                    width:10%;
                    height:50px;
                }
                .row2-col2{
                    width:40%
                }
                .row3-col3{
                    width:20%
                }
                .row4-col4{
                    width:20%
                }
                .table-css{
                    width:100%;
                    border-collapse: collapse;
                }
            </style>
        </head>
        <body>
           <div class="top-heading">
           <b><u>कार्यालय पटवारी हल्का नंबर '.$userdata['prapatraPatwariHalkNum'].' '.$prapatraTappa.' तहसील '.$userdata['prapatraTehsil'].' जिला '.$userdata['prapatraJilla'].'</u></b></div>
           <div class="right-side">
            स्थान - <br>
            दिनांक - 
           </div>
           <div class="top-heading"><p>बुआई प्रमाण पत्र</p></div>
           <div class="justify-side">
            यह प्रमाणित किया जाता कि कृषक <b>'.$userdata['prpatraAavedakName'].'</b> निवासी <b>'.$userdata['prpatraAvedakAddress'].'</b> के द्वारा ग्राम <b>'.$userdata['prpatraBTAddress'].'</b> भूमि पर खरीफ/रबी फसल वर्ष '.$year.' में निम्नानुसार फसल बोई गई है 
           </div>
           <div>
            <table border="1" class="table-css">
                <tr>
                    <th>कमांक </th>
                    <th>भूमि सर्वे नंबर</th>
                    <th>रकबा </th>
                    <th>बोई गयी फसल</th>
                </tr>
                <tr>
                    <td class="row1-col1"></td>
                    <td  class="row2-col2"></td>
                    <td  class="row3-col3"></td>
                    <td  class="row4-col4"></td>
                </tr>
                <tr>
                    <td class="row1-col1"></td>
                    <td  class="row2-col2"></td>
                    <td  class="row3-col3"></td>
                    <td  class="row4-col4"></td>
                </tr>
                <tr>
                    <td class="row1-col1"></td>
                    <td  class="row2-col2"></td>
                    <td  class="row3-col3"></td>
                    <td  class="row4-col4"></td>
                </tr>
                <tr>
                    <td class="row1-col1"></td>
                    <td  class="row2-col2"></td>
                    <td  class="row3-col3"></td>
                    <td  class="row4-col4"></td>
                </tr>
                <tr>
                    <td class="row1-col1"></td>
                    <td  class="row2-col2"></td>
                    <td  class="row3-col3"></td>
                    <td  class="row4-col4"></td>
                </tr>
            </table>
           </div>
            
        </body>
    </html>';


    $tableNameForm = 'saar_prman_patra';
    $formNameForm = 'प्रमाण पत्र बुवाई';
    $primaryKeys = 'prpatraId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>
