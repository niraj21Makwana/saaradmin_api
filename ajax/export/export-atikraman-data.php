<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_atikraman`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
    <th>Contact us-<small>User Name/Mobile Number</small></th>
    <th>क्र</th>
    <th>बेजा कब्जाकरने वाले</th>
    <th>पिता का नाम </th>
    <th>जाति </th>
    <th>निवासी</th>
    <th>गाव जहा <br>भूमि स्थित है</th>
    <th>तहसील/टप्पा</th>
    <th>जिला</th>
    <th>न्यायालय</th>
    <th>शासर्वे न</th>
    <th>रकबा</th>
    <th>नौइयत</th>
    <th>बेजा कब्ज़ा रकबा</th>
    <th>विवरण</th>
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
                <td>'.$show['atikramanId'].'</td>
                <td>'.$show['atikramanBKKV'].'</td>
                <td>'.$show['atikramanFatherName'].'</td>
                <td>'.$show['atikramanCast'].'</td>
                <td>'.$show['atikramanAddress'].'</td>
                <td>'.$show['atikramanGBAddress'].'</td>
                <td>'.$show['atikramanTapa'].'</td>
                <td>'.$show['atikramanJilla'].'</td>
                <td>'.$show['atikramanCourt'].'</td>
                <td>'.$show['atikramanSarveNumber'].'</td>
                <td>'.$show['atikramanRakba'].'</td>
                <td>'.$show['atikramanNohiyat'].'</td>
                <td>'.$show['atikramanBKRakba'].'</td>
                <td>'.$show['atikramanDescription'].'</td>
                <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=atikraman-report.xls');
echo $html;