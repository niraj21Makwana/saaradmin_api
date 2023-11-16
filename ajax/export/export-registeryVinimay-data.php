<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_reg_vinamay`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
    <th>Contact us-<small>User Name/Mobile Number</small></th>
    <th>क्र</th>
    <th>प्र न</th>
    <th>आवेदक का नाम द्वितीय पक्ष </th>
    <th>आवेदक का पता </th>
    <th>अनावेदक का नाम प्रथम पक्ष </th>
    <th>अनावेदक का पता</th>
    <th>रजिर्स्टी विनिमय पत्र क्र.</th>
    <th>रजि दिनांक</th>
    <th>भूमि सर्वे नम्बर द्वितीय पक्ष </th>
    <th>रकबा द्वितीय पक्ष</th>
    <th>भूमि स्थान का पता द्वितीय पक्ष </th>
    <th>भूमि सर्वे नम्बर प्रथम पक्ष </th>
    <th>रकबा प्रथम पक्ष </th>
    <th>भूमि स्थान का पता प्रथम पक्ष</th>
    <th>तहसील</th>
    <th>जिला</th>  
    <th>न्यायालय </th>
    <th>बंदक</th>
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
               <td>"Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].' </td>
                        <td>'.$num.'</td>
                        <td>'.$show['regVinamayId'].'</td>
                        <td>'.$show['regvinamayParNum'].'</td>
                        <td>'.$show['regvinamayAvdeakNameSecP'].' </td>
                        <td>'.$show['regvinamayAvedakAddressSecP'].' </td>
                        <td>'.$show['regvinamayEnAvedakNameFirstP'].' </td>
                        <td>'.$show['regvinamayEnAvedakAddressFirstP'].' </td>
                        <td>'.$show['regvinamayPatraNumber'].' </td>
                       <td>'.$show['regvinamayRegistryDate'].' </td>
                       <td>'.$show['regvinamayBServeNumSecP'].' </td>
                       <td>'.$show['regvinamayRakbaSecP'].' </td>
                       <td>'.$show['regvinamayBTAddressSecP'].' </td>
                       <td>'.$show['regvinamayBServeNumFirstP'].' </td>
                       <td>'.$show['regvinamayRakbaFirstP'].' </td>
                       <td>'.$show['regvinamayBTAddressFirstP'].' </td>
                       <td>'.$show['regvinamayTahsil'].' </td>
                       <td>'.$show['regvinamayJilla'].' </td>
                       <td>'.$show['regvinamayCourt'].' </td>
                       <td>'.$show['regvinamayBandhak'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=regVinimay-report.xls');
echo $html;