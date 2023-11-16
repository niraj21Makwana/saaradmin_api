<?php
include('../../assets/includes/connection.php');

$output = "";


$limit_per_page = 100;
    $page = "";
    if(isset($_POST["page_no"])){
        $page = $_POST["page_no"];
    }else{
        $page = 1;
    }

    $offset = ($page - 1)*$limit_per_page;

    $run = mysqli_query($con,"SELECT * FROM `saar_diversion_aavedan` WHERE `status`='Pending' LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['diversionAvedanId'].'" ></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td id="diversionAvedanIdEdit" hidden>'.$show['diversionAvedanId'].'</td>
                        <td id="divAavAvedakNameEdit"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['divAavAvedakName'].'</div></td>
                        <td id="divAavAvedakAddressEdit"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['divAavAvedakAddress'].'</div></td>
                        <td id="divAavBTAddressEdit">'.$show['divAavBTAddress'].'</td>
                        <td id="divAavTahsilEdit">'.$show['divAavTahsil'].'</td>
                        <td id="divAavJillaEdit">'.$show['divAavJilla'].'</td>
                        <td id="divAavServeNumberEdit"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['divAavServeNumber'].'</div></td>
                        <td id="divAavRakbaEdit"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['divAavRakba'].'</div></td>
                        <td id="divAavKitnaDivVargMeeterEdit">'.$show['divAavKitnaDivVargMeeter'].'</td>
                        <td id="divAavPrayoganEdit">'.$show['divAavPrayogan'].'</td>
                        <td id="divAavMobileNumberEdit">'.$show['divAavMobileNumber'].'</td>
                        <td id="divAavEmailIdEdit">'.$show['divAavEmailId'].'</td>
                        <td id="divAavAdharCardEdit">'.$show['divAavAdharCard'].'</td>
                        <td>
                            <select name="status" id="getstatus" data-statusid="'.$show['diversionAvedanId'].'">
                              <option value="">Select status</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Pending')?'selected="selected"':"").'>Pending</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Approved')?'selected="selected"':"").'>Approved</option>
                            </select>
                        </td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['diversionAvedanId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_diversion_aavedan`";
   $records = mysqli_query($con,$sql_table);
   $total_record = mysqli_num_rows($records);
   $total_pages = ceil($total_record/$limit_per_page);
   $output .= '<tr><div >';
   for($i = 1; $i <= $total_pages;$i++){
       $output .= '<td colspan="1"><button style="border:none;background:none;outline:none;" id="pagination"><a id="'.$i.'" class="btn btn-info text-white">'.$i.'</a></button></td>' ;
       }
       $output .= '</div></tr>';

      
echo $output;

}else{
    echo "No Data....";
}

?>