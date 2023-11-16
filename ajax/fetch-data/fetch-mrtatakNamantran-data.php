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

    $run = mysqli_query($con,"SELECT * FROM `saar_mritak_namantran` LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['mritakId'].'" ></td>
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
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['mritakId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_mritak_namantran`";
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