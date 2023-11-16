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

    $run = mysqli_query($con,"SELECT * FROM `saar_batwara` LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['batwaraId'].'" ></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td id="batwaraIdEdit" hidden>'.$show['batwaraId'].'</td>
                        <td id="batwaraParNumberEdit">'.$show['batwaraParNumber'].'</td>
                        <td id="batwaraAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batwaraAvedakName'].'</div></td>
                        <td id="batwaraAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batwaraAvedakAddress'].'</div></td>
                        <td id="batwaraEnAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batwaraEnAvedakName'].'</div></td>
                        <td id="batwaraEnAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batwaraEnAvedakAddress'].'</div></td>
                        <td id="batwaraDharaE">'.$show['batwaraDhara'].'</td>
                        <td id="batwaraPatwariGaoE">'.$show['batwaraPatwariGao'].'</td>
                        <td id="batwaraBTAddressE">'.$show['batwaraBTAddress'].'</td>
                        <td id="batwaraServeNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['batwaraServeNumber'].'</div></td>
                        <td id="batwaraKulServeNumberE">'.$show['batwaraKulServeNumber'].'</td>
                        <td id="batwaraRakbaE">'.$show['batwaraRakba'].'</td>
                        <td id="batwaraTahsilE">'.$show['batwaraTahsil'].'</td>
                        <td id="batwaraJillaE">'.$show['batwaraJilla'].'</td>
                        <td id="batwaraCourtE">'.$show['batwaraCourt'].'</td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['batwaraId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_batwara`";
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