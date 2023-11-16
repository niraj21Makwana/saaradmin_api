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
                        <td>'.$show['batankanId'].'</td>
                        <td>'.$show['	batankanPNumber'].'</td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batankanAvedakName'].'</div></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batankanAvedakAddress'].'</div></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batankanAnAvedakName'].'</div></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batankanAnAvedakAddress'].'</div></td>
                        <td>'.$show['batankanPatwariGao'].'</td>
                        <td>'.$show['batankanBTKAddress'].'</td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batankanServeNumber'].'</div></td>
                        <td>'.$show['batankanKulServeNumber'].'</td>
                        <td>'.$show['batankanRakba'].'</td>
                        <td>'.$show['batankanTahsil'].'</td>
                        <td>'.$show['batankanJila'].'</td>
                        <td>'.$show['batankanCourt'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=batankan-report.xls');
echo $html;