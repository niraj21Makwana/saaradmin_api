<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_diversion_maang`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
    <th>Contact us-<small>User Name/Mobile Number</small></th>
    <th>क्र</th>
    <th>प्र न</th>
    <th>आवेदक का नाम </th>
    <th>आवेदक का पता</th>
    <th>भूमि स्‍थान का पता</th>
    <th>भूमि सर्वे नम्‍बर</th>
    <th>रकबा</th>
    <th>तहसील</th>
    <th>जिला</th>
    <th>न्यायालय </th>
    <th>राशि</th>
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
                <td>Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</td>
                <td>'.$num.'</td>
                <td>'.$show['diversionId'].'</td>
                <td>'.$show['diversionPrakranNumber'].'</td>
                <td>'.$show['diversionAvedakName'].'</td>
                <td>'.$show['diversionAvedakAddress'].'</td>
                <td>'.$show['diversionBSAddress'].'</td>
                <td>'.$show['diversionServeNumber'].'</td>
                <td>'.$show['diversionRakba'].'</td>
                <td>'.$show['diversionTahsil'].'</td>
                <td>'.$show['diversionDistrict'].'</td>
                <td>'.$show['diversionCourt'].'</td>
                <td>'.$show['diversionMoney'].'</td>
                <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=diversion-mangpart-report.xls');
echo $html;