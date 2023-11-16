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

    $run = mysqli_query($con,"SELECT * FROM `saar_reg_vinamay` LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['regVinamayId'].'" ></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td id="regVinamayIdEdit" hidden>'.$show['regVinamayId'].'</td>
                        <td id="regvinamayParNumE">'.$show['regvinamayParNum'].'</td>
                        <td id="regvinamayAvdeakNameSecPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayAvdeakNameSecP'].'</div></td>
                        <td id="regvinamayAvedakAddressSecPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayAvedakAddressSecP'].'</div></td>
                        <td id="regvinamayEnAvedakNameFirstPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayEnAvedakNameFirstP'].'</div></td>
                 
                        <td id="regvinamayEnAvedakAddressFirstPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayEnAvedakAddressFirstP'].'</div></td>
                        <td id="regvinamayPatraNumberE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayPatraNumber'].'</div></td>
                       <td id="regvinamayRegistryDateE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayRegistryDate'].'</div></td>
                       <td id="regvinamayBServeNumSecPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayBServeNumSecP'].'</div></td>
                       <td id="regvinamayRakbaSecPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayRakbaSecP'].'</div></td>
                       <td id="regvinamayBTAddressSecPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayBTAddressSecP'].'</div></td>
                       <td id="regvinamayBServeNumFirstPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayBServeNumFirstP'].'</div></td>
                       <td id="regvinamayRakbaFirstPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayRakbaFirstP'].'</div></td>
                       <td id="regvinamayBTAddressFirstPE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayBTAddressFirstP'].'</div></td>
                       <td id="regvinamayTahsilE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayTahsil'].'</div></td>
                       <td id="regvinamayJillaE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayJilla'].'</div></td>
                       <td id="regvinamayCourtE"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$show['regvinamayCourt'].'</div></td>
                       <td id="regvinamayBandhakE">'.$show['regvinamayBandhak'].'</td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['regVinamayId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_reg_vinamay`";
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