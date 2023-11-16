<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_batwara`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
    <th>Contact us-<small>User Name/Mobile Number</small></th>
                            <th>क्र</th>
                            <th>प्रकरण नम्बर</th>
                            <th>आवेदक का नाम</th>
                            <th>आवेदक का पता</th>
                            <th>अनावेदक का नाम</th>
                            <th>अनावेदक का पता</th>
                            <th>धारा</th>
                            <th>पटवारी गाँव </th>
                            <th>भूमि स्थान का पता </th>
                            <th>सर्वे नम्बर </th>
                            <th>कुल सर्वे नम्बर </th>
                            <th>रकबा </th>
                            <th>तहसील </th>
                            <th>जिला</th>
                            <th>न्यायालय</th>
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
                        <td>'.$show['batwaraId'].'</td>
                        <td>'.$show['batwaraParNumber'].'</td>
                        <td>'.$show['batwaraAvedakName'].'</td>
                        <td>'.$show['batwaraAvedakAddress'].'</td>
                        <td>'.$show['batwaraEnAvedakName'].'</td>
                        <td>'.$show['batwaraEnAvedakAddress'].'</td>
                        <td>'.$show['batwaraDhara'].'</td>
                        <td>'.$show['batwaraPatwariGao'].'</td>
                        <td>'.$show['batwaraBTAddress'].'</td>
                        <td>'.$show['batwaraServeNumber'].'</td>
                        <td>'.$show['batwaraKulServeNumber'].'</td>
                        <td>'.$show['batwaraRakba'].'</td>
                        <td>'.$show['batwaraTahsil'].'</td>
                        <td>'.$show['batwaraJilla'].'</td>
                        <td>'.$show['batwaraCourt'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=batwara-report.xls');
echo $html;