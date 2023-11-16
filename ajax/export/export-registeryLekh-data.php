<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_registry`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
    <th>Contact us-<small>User Name/Mobile Number</small></th>
    <th>क्र</th>
                            <th>प्र न</th>
                            <th>आवेदक का नाम  </th>
                            <th>आवेदक का पता </th>
                            <th>अनावेदक का नाम  </th>
                            <th>अनावेदक का पता</th>
                            <th>रजिर्स्‍टी विक्रय पत्र क्र.</th>
                            <th>रजि दिनांक</th>
                            <th>भूमि स्‍थान का पता</th>
                            <th>भूमि सर्वे नम्‍बर</th>
                            <th>रकबा </th>
                            <th>आवेदक प्रकार </th>
                            <th>अनावेदक प्रकार</th>
                             <th>रजिस्टर्ड लेख प्रकार</th>
                            <th>तहसील</th>
                            <th>जिला</th>  
                            <th>न्यायालय </th>
                            <th>बंधक</th>
                            <th>आदेश प्रकार</th>
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
                        <td>'.$show['registryId'].'</td>
                        <td>'.$show['registryParNumber'].'</td>
                        <td>'.$show['registryAvedakName'].' </td>
                        <td>'.$show['registryAvedakAddress'].' </td>
                        <td>'.$show['registryEnAvedakName'].' </td>
                        <td>'.$show['registryEnAvedakAddress'].' </td>
                        <td>'.$show['registryVikrayNumber'].' </td>
                       <td>'.$show['registryDate'].' </td>
                       <td>'.$show['registryBTAddress'].' </td>
                       <td>'.$show['registryBServeNumber'].' </td>
                       <td>'.$show['registryKulBServeNumber'].' </td>
                       <td>'.$show['registryRakba'].' </td>
                       <td>'.$show['registryAvedakType'].' </td>
                       <td>'.$show['registryEnAvedakType'].' </td>
                       <td>'.$show['registryLakhType'].' </td>
                       <td>'.$show['registryTahsil'].' </td>
                       <td>'.$show['registryJilla'].' </td>
                       <td>'.$show['registryCourt'].'</td>
                       <td>'.$show['registryBandhak'].'</td>
                       <td>'.$show['registryAadeshType'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=registeryLekh-report.xls');
echo $html;