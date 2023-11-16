<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_kalamBara`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
     <th>Contact us-<small>User Name/Mobile Number</small></th>
                            <th>क्र</th>
                            <th>प्रकरण न</th>
                            <th>आवेदक का नाम </th>
                            <th>आवेदक का पता</th>
                            <th>अनावेदक का नाम</th>
                            <th>भूमि स्‍थान का पता</th>
                            <th>भूमि सर्वे नम्‍बर</th>
                            <th>रकबा</th>
                            <th>तहसील</th>
                            <th>जिला</th>
                            <th>न्यायालय</th>
                            <th>खसरे में प्रविष्टि</th>
                            <th>कितने वर्ष पुराना</th>
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
                         <td id="kalamBaraIdEdit" hidden>'.$show['kalamBaraId'].'</td>
                        <td id="kalamBaraParNumberE">'.$show['kalamBaraParNumber'].'</td>
                        <td id="kalamBaraAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['kalamBaraAvedakName'].'</div></td>
                        <td id="kalamBaraAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['kalamBaraAvedakAddress'].'</div></td>
                        <td id="kalamBaraEnAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['kalamBaraEnAvedakName'].'</div></td>
                        <td id="kalamBaraBTAddress">'.$show['kalamBaraBTAddress'].'</td>
                        <td id="kalamBaraBServeNumberE">'.$show['kalamBaraBServeNumber'].'</td>
                        <td id="kalamBaraRakbaE">'.$show['kalamBaraRakba'].'</td>
                        <td id="kalamBaraTahsilE">'.$show['kalamBaraTahsil'].'</td>
                        <td id="kalamBaraJillaE">'.$show['kalamBaraJilla'].'</td>
                        <td id="kalamBaraCourtE">'.$show['kalamBaraCourt'].'</td>
                        <td id="kalamBaraKhasreMParE">'.$show['kalamBaraKhasreMPar'].'</td>
                        <td id="kalamBaraKitneYearOldE">'.$show['kalamBaraKitneYearOld'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=kalamBara-report.xls');
echo $html;