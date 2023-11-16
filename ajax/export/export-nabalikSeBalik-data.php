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
                            <th>भूमि स्‍थान का पता</th>
                           <th>भूमि सर्वे नम्‍बर</th>
                            <th>रकबा</th>
                            <th>प्रारंभिक दिनांक</th>
                            <th>पेशी दिनांक</th>
                            <th>तहसील</th>
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
                      <td id="nasebaIdEdit" hidden>'.$show['nasebaId'].'</td>
                        <td id="nasebaPrakNumberE">'.$show['nasebaPrakNumber'].'</td>
                        <td id="nasebaAavedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['nasebaAavedakName'].'</div></td>
                        <td id="nasebaAavedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['nasebaAavedakAddress'].'</div></td>
                        <td id="nasebaBEAddressE">'.$show['nasebaBEAddress'].'</td>
                        <td id="nasebaBServeNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['nasebaBServeNumber'].'</div></td>
                        <td id="nasebaKulServeNumberE">'.$show['nasebaKulServeNumber'].'</td>
                        <td id="nasebaRakbaE">'.$show['nasebaRakba'].'</td>
                        <td id="nasebaKulRakbaE">'.$show['nasebaKulRakba'].'</td>
                        <td id="nasebaTehsilE">'.$show['nasebaTehsil'].'</td>
                        <td id="nasebaJhilaE">'.$show['nasebaJhila'].'</td>
                        <td id="nasebaCourtE">'.$show['nasebaCourt'].'</td>
                         <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=pmKisanRevoke-report.xls');
echo $html;