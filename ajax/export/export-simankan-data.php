<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_simankan`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
     <th>Contact us-<small>User Name/Mobile Number</small></th>
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
                            <th>लगे सर्वे नंबर का विवरण  </th>
                            <th>पटवारी हल्का न </th>
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
                          <td id="simankanIdEdit" hidden>'.$show['simankanId'].'</td>
                        <td id="simankanPraNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['simankanPraNumber'].'</div></td>
                        <td id="simankanAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['simankanAvedakName'].'</div></td>
                        <td id="simankanAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['simankanAvedakAddress'].'</div></td>
                        <td id="simankanBSAddressE">'.$show['simankanBSAddress'].'</td>
                        <td id="simankanBServeNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['simankanBServeNumber'].'</div></td>
                        <td id="simankanRakbaE">'.$show['simankanRakba'].'</td>
                       
                        <td id="simankanCourtE">'.$show['simankanCourt'].'</td>
                        <td id="simankanLSNVE">'.$show['simankanLSNV'].'</td>
                        <td id="simankanPatwariLNumE">'.$show['simankanPatwariLNum'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=simankan-report.xls');
echo $html;