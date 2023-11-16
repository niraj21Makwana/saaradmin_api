<?php
include('../genreater-multipage-function.php');

function generateSimankanForm($cons, $dataId)
{
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_simankan` WHERE `simankanId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);

    $year = date('Y');
    $lastTwoDigits = substr($year, -2);
    $yearPlue = $lastTwoDigits+1;
    
    if($userdata['simankanTappa']!=""){
        $simankanTappa ="टप्पा ".$userdata['simankanTappa'];
    }else{
        $simankanTappa = "";
    }

    $html = ['<html>
    <head>
        <meta charset="utf-8">
        <style>
        body {
            font-size: 13pt;
        }
            .form-heading{
                text-align: center;
            }
            
            .right-side {
                text-align: right;
                margin-right: 5%;
            }
            .table-css{
                width:100%;
                border-collapse: collapse;
            }
            .table-css th{
                padding:20px;
            }
            .table-css td{
                padding:30px;
            }
        </style>
    </head>
    <body>
<div class="form-heading"><b><u>श्रीमान ' . $userdata['simankanCourt'] . ' महोदय '.$simankanTappa.' तहसील ' . $userdata['simankanTahsil'] . ' जिला ' . $userdata['simankanJilla'] . ' म. प्र.</u></b></div>
<pre class="right-side">प्रकरण क्रमांक <b>' . $userdata['simankanPraNumber'] . '/अ-12/'.$year.'-'.$yearPlue.'</b></pre>
<pre><b>' . $userdata['simankanAvedakName'] . '
' . $userdata['simankanAvedakAddress'] . '                                               - आवेदक</b>  
</pre>
<div class="form-heading">आवेदन पत्र अंतर्गत धारा 129 म.प्र. भूराजस्‍व संहिता 1959 </div>
<pre>माननीय महोदय, 
1  आवेदनकर्ता  नाम - ' . $userdata['simankanAvedakName'] . ' निवासी ' . $userdata['simankanAvedakAddress'] . '

2 सर्वे नंबर जिसका सीमाकन करना है - <b>' . $userdata['simankanBServeNumber'] . '</b> 

3  सर्वे नंबर से लगे सर्वे नंबर का विवरण  - <b>' . $userdata['simankanLSNV'] . '</b> 

4  खसरा, खाते की नकल वर्ष     - <b>चालु वर्ष</b>  

5  नक्शा                     - <b>सलग्न</b> 

        अत: श्रीमान से निवेदन है कि उक्‍त भूमि पर प्रार्थी का सीमांकन करने बाबत आदेश राजस्व निरीक्षक वृत्त को देने का कष्ट किया जावे । 


दिनांक  -  
</pre>
<div class="right-side">हस्‍ताक्षर प्रार्थी </div>','
<div class="form-heading"><b><u>कार्यालय पटवारी ग्राम ' . $userdata['simankanAvedakAddress'] . ' पहन '.$userdata['simankanPatwariHalkNum'].' '.$simankanTappa.' तहसील ' . $userdata['simankanTahsil'] . ' जिला ' . $userdata['simankanJilla'] . '</u></b></div>
<pre>कमांक       / रा.नि. /'.$year.'                                            दिनांक     /    /'.$year.' </pre>
<div class="form-heading">सूचना-पत्र</div>
एतद् द्वारा सूचित किया जाता है कि <b>' . $userdata['simankanAvedakName'] . ' निवासी ' . $userdata['simankanAvedakAddress'] . '</b> द्वारा निम्नलिखित भूमि का सीमांकन चाहा है। 
<table border="1" class="table-css">
    <tr>
        <th>क्र</th>
        <th>ग्राम</th>
        <th>पहन </th>
        <th>सर्व नंबर  </th>
        <th>रकबा  </th>
    </tr>
    <tr>
        <td>1 </td>
        <td>' . $userdata['simankanBSAddress'] . '  </td>
        <td>'.$userdata['simankanPatwariHalkNum'].' </td>
        <td>' . $userdata['simankanBServeNumber'] . ' </td>
        <td>' . $userdata['simankanRakba'] . ' </td>
    </tr>
</table>
<pre>अतः आप समस्त पडोसी कृषक सीमाकंन दिनाक     /    /'.$year.'  को स्थल पर उपस्थित रहे सूचना उपरान्त अनुपस्थिति की दशा में सीमांकन कार्य किया जायेगा ।
</pre>
<table border="1" class="table-css">
<tr style="border:0px;"><td style="border:0px; padding: left 30px;">कृषक /पडोसी कृषक</td>
<td style="border:0px; padding: left 30px;">हस्ताक्षर</td></tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
<tr><td></td>
<td></td>
</tr>
</table></body>
</html>'];

    $tableNameForm = 'saar_simankan';
    $formNameForm = 'सीमांकन';
    $primaryKeys = 'simankanId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}
