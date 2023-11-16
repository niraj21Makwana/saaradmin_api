<?php
include('../genreater-multipage-function.php');

function generatekabjaVsimankanForm($cons, $dataId) {
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_kabjaVsimankan` WHERE `kabjaVSId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
    $currentYear = date('Y');
    
    if($userdata['kabjaVSTappa']!=""){
        $kabjaVSTappa ="टप्पा ".$userdata['kabjaVSTappa'];
    }else{
        $kabjaVSTappa = "";
    }


    $html = ['
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-size: 12.5px;
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
        pre {
            justify-content: space-between;
        }
    </style>
</head>
<body>
<div class="large-text">
<div class="top-heading"><b>कार्यालय राजस्व निरीक्षक वृत '.$userdata['kabjaVSRajesvi'].' '.$kabjaVSTappa.' तहसील '.$userdata['kabjaVStahsil'].' जिला <b>'.$userdata['kabjaVSJilla'].' </b></div>
<pre>
क्रमांक   / रा.नि./'.$currentYear.'                                                              दिनांक    /   /



प्रति
समस्त निम्नलिखित
   पडोसी कृषक

विषय – कब्जा दिया जाने बाबत ।

सन्दर्भ -- नायब तहसीलदार महोदय  का आदेश/आवेदन क्र '.$userdata['kabjaVSAdeshNumber'].' दिनांक '.$userdata['kabjaVSAdeshDate'].'

उपरोक्त विषय एवं संदर्भित आदेशानुसार आपके ग्राम <b>'.$userdata['kabjaVSBSTAddress'].'</b> की भूमि सर्वे नम्बर <b>'.$userdata['kabjaVSBSNumber'].' रकबा '.$userdata['kabjaVSRakba'].' हेक्टर</b> आवेदक <b>'.$userdata['kabjaVSAvedakName'].' '.$userdata['kabjaVSAvedakAddress'].' </b> का सीमांकन/कब्ज़ा स्थल पर दिनांक        /       /        को किया जाना प्रस्तावित है।

अत आप निम्न कृषक निर्धारित दिनांक         /       /         को स्थल पर उपस्थित रहे,अनुपस्थिती कि दशा में एक पक्षीय सीमांकन/कब्ज़ा का पालन दिया/किया जावेगा। जिसकी समस्त जिम्मेदारी आपकी होगी |

                                                                                                    राजस्व निरीक्षक
पडोसी कृषक
</pre>
</div>
</body>
</html>'];


 $tableNameForm = 'saar_kabjaVsimankan';
    $formNameForm = 'कब्जा सीमांकन';
    $primaryKeys = 'kabjaVSId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>