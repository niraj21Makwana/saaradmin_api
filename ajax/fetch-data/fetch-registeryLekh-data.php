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

    $run = mysqli_query($con,"SELECT * FROM `saar_registry` LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['registryId'].'" ></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td id="registryIdEdit" hidden>'.$show['registryId'].'</td>
                        <td id="registryParNumberE">'.$show['registryParNumber'].'</td>
                        <td id="registryAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryAvedakName'].'</div></td>
                        <td id="registryAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryAvedakAddress'].'</div></td>
                        <td id="registryEnAvedakNameE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['	registryEnAvedakName'].'</div></td>
                 
                        <td id="registryEnAvedakAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['	registryEnAvedakAddress'].'</div></td>
                        <td id="registryVikrayNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryVikrayNumber'].'</div></td>
                       <td id="registryDateE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryDate'].'</div></td>
                       <td id="registryBTAddressE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['	registryBTAddress'].'</div></td>
                       <td id="registryBServeNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['	registryBServeNumber'].'</div></td>
                       <td id="registryRakbaE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryRakba'].'</div></td>
                       <td id="registryAvedakTypeE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['	registryAvedakType'].'</div></td>
                       <td id="registryEnAvedakTypeE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryEnAvedakType'].'</div></td>
                       <td id="registryLakhTypeE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryLakhType'].'</div></td>
                       <td id="registryTahsilE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['	registryTahsil'].'</div></td>
                       <td id="registryJillaE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryJilla'].'</div></td>
                       <td id="registryCourtE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['registryCourt'].'</div></td>
                       <td id="registryBandhakE">'.$show['registryBandhak'].'</td>
                       <td id="registryAadeshTypeE">'.$show['registryAadeshType'].'</td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['regVinamayId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_registry`";
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