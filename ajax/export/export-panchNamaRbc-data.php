<?php
include('../../assets/includes/connection.php');

$data = mysqli_query($con, "SELECT * FROM `saar_panchnamaRBC`");
$count = mysqli_num_rows($data);
$html = '<table border=1>
<tr>
     <th>Contact us-<small>User Name/Mobile Number</small></th>
                           <th>क्र</th>
                            <th>प्रकरण न</th>
                            <th>आवेदक का नाम </th>
                            <th>आवेदक का पता</th>
                            <th>ग्राम</th>
                            <th>दिनांक </th>
                            <th>तहसील</th>
                            <th>जिला</th>
                            <th>न्यायालय</th>
                            <th>दिवार का प्रकार  </th>
                            <th>दिवार कि संख्या </th>
                            <th>दिवार कि लम्बाई </th>
                            <th>दिवार कि ऊंचाई </th>
                            <th>अनुमानित नुकसान </th>
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
                <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['panRBCId'].'" ></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td id="panRBCId Edit" hidden>'.$show['panRBCId '].'</td>
                        <td id="panRBCPraNumberE">'.$show['panRBCPraNumber'].'</td>
                        <td id="panRBCAavedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['panRBCAavedakName'].'</div></td>
                        <td id="panRBCAavedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['panRBCAavedakAddress'].'</div></td>
                        <td id="panRBCGaoE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['panRBCGao'].'</div></td>
                        <td id="panRBCDateE">'.$show['panRBCDate'].'</td>
                        <td id="panRBCTehsilE">'.$show['panRBCTehsil'].'</td>
                        <td id="panRBCJillaE">'.$show['panRBCJilla'].'</td>
                        <td id="panRBCcourtE">'.$show['panRBCcourt'].'</td>
                        <td id="kalamBaraJillaE">'.$show['kalamBaraJilla'].'</td>
                        <td id="panRBCWallTypeE">'.$show['panRBCWallType'].'</td>
                        <td id="panRBCWallTotalE">'.$show['	panRBCWallTotal'].'</td>
                        <td id="panRBCWallHeightE">'.$show['panRBCWallHeight'].'</td>
                        <td id="panRBCWallWidthE">'.$show['panRBCWallWidth'].'</td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['mritakId'].'" ><i class="fas fa-trash"></i></button></td>
            </tr>';
            $num++;
    }
}else{

    $html .= "<tr><td> No Records Found! </td></tr>";
}

$html .='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=panchNamaRbc-report.xls');
echo $html;