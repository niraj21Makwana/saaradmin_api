<?php
include('../genreater-multipage-function.php');

function generatePmKissanForm($cons, $dataId) {
    $userQuery = mysqli_query($cons, "SELECT * FROM `saar_PMSamanNidhi` WHERE `PMSamanId`='$dataId'");
    $userdata = mysqli_fetch_assoc($userQuery);
  
     $year = date('Y');
    $html = ['
<html>

<head>
    <meta charset="UTF-8">
    <style>
       @font-face { font-family: kokilaregular; src: url("https://saars.in/adminsaar/api/font/Kokila-Regular.ttf"); }

        body {
            font-size: 14px;
            font-family: "kokilaregular";
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

        .table-center {
            margin-left: auto;
            margin-right: auto;
        }
        .righttext{
            text-align: right;
          
        }

        pre {
            justify-content: space-between;
        }
    </style>
</head>

<body>
<div class="large-text">
<div class="top-heading"><b><u>न्यायालय ' . $userdata['PMSamanCourt'] .' तहसील ' . $userdata['PMSamanTehsil'] .' जिला ' . $userdata['PMSamanJhila'] .'(म.प्र.)</u></b></div>
<pre>
क्रमांक        /रीडर-1/'.$year.'	                                          ' . $userdata['PMSamanTehsil'] .',दिनांक:     /   /'.$year.'


प्रति,
        कलेक्टर महोदय,
        (भू-अभिलेख)
        जिला ' . $userdata['PMSamanJhila'] .' (म.प्र.)

विषय – पीएम किसान योजना में त्रुटिवश स्टॉप हुआ पेमेंट  शुरू करवाने के संबंध में |

<div class="top-heading"><b>::::::::::::::::::::</b></div>
            
महोदय,
       उपरोक्त विषय में निवेदन है कि पीएम किसान योजना में अपात्र/मृत किसानों के पेमेंट रोके जाने का कार्य करते हुए तहसील '. $userdata['PMSamanTehsil'] .' के '.$userdata['PMSamanAavedakAddress'] .' की एक कृषक   का पेमेंट त्रुटिवश स्टॉप हो गया है | जिसका विवरण निम्नानुसार है |

आधार क्रमांक: <b>'. $userdata['PMSamanAadharNumber'] .'</b> 
पीएम किसान आईडी: <b>'. $userdata['PMSamanPmkissanId'] .'</b>
बैंक खाता: <b>'. $userdata['PMSamanbankAccNumber'] .'</b>

            अतः महोदय से सादर अनुरोध है कि उक्त हितग्राही की पीएम किसान सम्मान निधि पुनः शुरू करवाने का कष्ट करें |                                                                   
</pre>
<pre class="righttext">
<b>
'. $userdata['PMSamanCourt'] .'
तहसील '. $userdata['PMSamanTehsil'] .'
</b>
</pre>
</div>

</body>

</html>'];

 $tableNameForm = 'saar_PMSamanNidhi';
    $formNameForm = 'पीएम किसान_REVOKE';
    $primaryKeys = 'PMSamanId';

    generateAndSavePDF($cons, $tableNameForm, $html, $primaryKeys, $dataId, $formNameForm);
}

?>