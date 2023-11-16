<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_kabjaVsimankan`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
    <th>Contact us-<small>User Name/Mobile Number</small></th>
    <th>क्र</th>
    <th>प्रकरण नम्बर</th>
    <th>आवेदक का नाम</th>
    <th>आवेदक का पता</th>
    <th>भूमि स्थान का पता </th>
    <th>सर्वे नम्बर </th>
    <th>कुल सर्वे नम्बर </th>
    <th>रकबा </th>
    <th>तहसील </th>
    <th>जिला</th>
    <th>न्यायालय</th>
    <th>लगे सर्वे नंबर का विवरण</th>
    <th>पटवारी हल्का न </th>
    <th>राजस्व निरीक्षक वृत्त</th>
    <th>आदेश/आवेदन क्र</th>
    <th>आदेश/आवेदन दि</th>
    <th>Date</th>
</tr>';
if($count>0){
    $num = 1;
    while($show = mysqli_fetch_array($data)){
        $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $html .='<tr>
                <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td>'.$show['kabjaVSId'].'</td>
                        <td>'.$show['kabjaVsPraNumber'].'</td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['kabjaVSAvedakName'].'</div></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['kabjaVSAvedakAddress'].'</div></td>
                        <td>'.$show['kabjaVSBSTAddress'].'</td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['kabjaVSBSNumber'].'</div></td>
                        <td>'.$show['kabjaVSBSNumberKul'].'</td>
                        <td>'.$show['kabjaVSRakba'].'</td>
                        <td>'.$show['kabjaVStahsil'].'</td>
                        <td>'.$show['kabjaVSJilla'].'</td>
                        <td>'.$show['kabjaVSCourt'].'</td>
                        <td>'.$show['kabjaVSTotalServeNumberDes'].'</td>
                        <td>'.$show['kabjaVSPatwariHalkaNumber'].'</td>
                        <td>'.$show['kabjaVSRajesvi'].'</td>
                        <td>'.$show['kabjaVSAdeshNumber'].'</td>
                        <td>'.$show['kabjaVSAdeshDate'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=kabjaVsimankan-report.xls');
echo $html;