<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_kabjaVsimankan`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
     <th>Contact us-<small>User Name/Mobile Number</small></th>
                            <th>क्र</th>
                   
                            <th>आवेदक का नाम </th>
                            <th>आवेदक का पता</th>
                            <th>भूमि स्‍थान का पता</th>
                            <th>भूमि सर्वे नम्‍बर</th>
                            <th>कुल रकबा</th>
                            <th>तहसील</th>
                           <th>जिला</th>
                            <th>लगान (कर)</th>
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
                        <td id="PMprpatraIdEdit" hidden>'.$show['prpatraId'].'</td>
                         <td id="prpatraAavedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['prpatraAavedakName'].'</div></td>
                        <td id="prpatraAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['prpatraAvedakAddress'].'</div></td>
                        <td id="prpatraBTAddress"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['prpatraBTAddress'].'</div></td>
                        <td id="prapatraBServeNum">'.$show['prapatraBServeNum'].'</td>
                        <td id="prapatraRakbaE">'.$show['prapatraRakba'].'</td>
                        <td id="prapatraTehsilE">'.$show['prapatraTehsil'].'</td>
                        <td id="prapatraJillaE">'.$show['prapatraJilla'].'</td>
                        <td id="prapatraLaganE">'.$show['prapatraLagan'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=pramanPatra-report.xls');
echo $html;