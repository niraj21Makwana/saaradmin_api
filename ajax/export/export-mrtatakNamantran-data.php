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
                            <th>अनावेदक का नाम</th>
                            <th>अनावेदक का पता</th>
                            <th>खातेदार की जानकारीता </th>
                            <th>खातेदार का पता</th>
                            <th>मृतक का नाम </th>
                            <th>निवासी</th>
                            <th>मृत्यु दिनांक</th>
                            <th>वारिसो की जानकारी</th>
                            <th>वारिसो का पता</th>
                            <th>पटवारी  गाव</th>
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
                        <td id="mritakIdEdit" hidden>'.$show['mritakId'].'</td>
                        <td id="maritakPraNumberE">'.$show['maritakPraNumber'].'</td>
                        <td id="maritakAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['maritakAvedakName'].'</div></td>
                        <td id="maritakAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['maritakAvedakAddress'].'</div></td>
                        <td id="maritakEnavedakNameE">'.$show['maritakEnavedakName'].'</td>
                        <td id="maritakEnavedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['maritakEnavedakAddress'].'</div></td>
                        <td id="maritakKhateJankariE">'.$show['maritakKhateJankari'].'</td>
                        <td id="maritakKhateAddressE">'.$show['maritakKhateAddress'].'</td>
                        <td id="maritakKaNameE">'.$show['maritakKaName'].'</td>
                        <td id="maritakAddressE">'.$show['maritakAddress'].'</td>
                        <td id="maritakDeathDateE">'.$show['maritakDeathDate'].'</td>
                        <td id="maritakVarisJankariE">'.$show['maritakVarisJankari'].'</td>
                        <td id="maritakVarisAddressE">'.$show['maritakVarisAddress'].'</td>
                        <td id="maritakPatwariGaoE">'.$show['maritakPatwariGao'].'</td>
                        <td id="maritakBServeAddressE">'.$show['maritakBServeAddress'].'</td>
                        <td id="maritakBServeNumberE">'.$show['maritakBServeNumber'].'</td>
                        <td id="maritakBServeNumberE">'.$show['maritakBServeKulNumber'].'</td>
                        <td id="maritakRakbaE">'.$show['maritakRakba'].'</td>
                        <td id="maritakKulRakbaE">'.$show['maritakKulRakba'].'</td>
                        <td id="maritakTahsilE">'.$show['maritakTahsil'].'</td>
                        <td id="maritakJillaE">'.$show['maritakJilla'].'</td>
                        <td id="maritakCourtE">'.$show['maritakCourt'].'</td>
                        <td>'.$show['date'].'</td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=mratatakNamantran-report.xls');
echo $html;