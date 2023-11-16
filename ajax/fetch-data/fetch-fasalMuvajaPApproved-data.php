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

    $run = mysqli_query($con,"SELECT * FROM `saar_fasalMP` WHERE `status`='Approved' LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '  
                      <tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['fasalMpId'].'" ></td>
                         <td id="fasalMpIdEdit" hidden>'.$show['fasalMpId'].'</td>
                        <td>'.$num.'</td>
                        <td>'.$username.'</td>
                        <td>'.$show['mobileNumber'].'</td>
                        <td id="fasalMpANmaeEdit">'.$show['fasalMpANmae'].'</td>
                        <td id="fasalMpAAddressEdit">'.$show['fasalMpAAddress'].'</td>
                        <td id="fasalMpWhatsAppNumberEdit">'.$show['fasalMpWhatsAppNumber'].'</td>
                        <td id="fasalMpEmailIdEdit">'.$show['fasalMpEmailId'].'</td>
                        <td>
                            <select name="status" id="getstatus" data-statusid="'.$show['fasalMpId'].'">
                              <option value="">Select status</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Pending')?'selected="selected"':"").'>Pending</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Approved')?'selected="selected"':"").'>Approved</option>
                            </select>
                        </td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['fasalMpId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_fasalMP`";
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