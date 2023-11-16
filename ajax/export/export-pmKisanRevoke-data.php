<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_kabjaVsimankan`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
     <th>Contact us-<small>User Name/Mobile Number</small></th>
                            <th>क्र</th>
                   
                            <th>नाम </th>
                            <th>आवेदक का पता</th>
                            <th>तहसील</th>
                            <th>जिला</th>
                            <th>न्यायालय</th>
                            <th>आधार नंबर</th>
                           <th>PM किसान ID</th>
                            <th>BANK ACCOUNT </th>
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
                        <td id="PMSamanIdEdit" hidden>'.$show['PMSamanId'].'</td>
                        <td id="PMSamanAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['PMSamanAvedakName'].'</div></td>
                        <td id="PMSamanAavedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['PMSamanAavedakAddress'].'</div></td>
                        <td id="PMSamanTehsilE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['PMSamanTehsil'].'</div></td>
                        <td id="PMSamanJhilaE">'.$show['PMSamanJhila'].'</td>
                        <td id="PMSamanCourtE">'.$show['PMSamanCourt'].'</td>
                        <td id="PMSamanAadharNumberE">'.$show['PMSamanAadharNumber'].'</td>
                        <td id="PMSamanPmkissanIdE">'.$show['PMSamanPmkissanId'].'</td>
                        <td id="PMSamanbankAccNumberE">'.$show['PMSamanbankAccNumber'].'</td>
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