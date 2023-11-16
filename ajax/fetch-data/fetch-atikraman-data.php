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

    $run = mysqli_query($con,"SELECT * FROM `saar_atikraman` LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
       $userId = $show['userId'];
       $seleteName = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
       $userNameFetch = mysqli_fetch_assoc($seleteName);
       $username = $userNameFetch['userName'];
       
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['atikramanId'].'" ></td>
                        <td><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">Name:'.$username.' <br> Mobile No.: '.$show['mobileNumber'].'</div></td>
                        <td>'.$num.'</td>
                        <td id="atikramanIdEdit" hidden>'.$show['atikramanId'].'</td>
                        <td id="atikramanBKKVEdit">'.$show['atikramanBKKV'].'</td>
                        <td id="atikramanFatherNameEdit">'.$show['atikramanFatherName'].'</td>
                        <td id="atikramanCastEdit">'.$show['atikramanCast'].'</td>
                        <td id="atikramanAddressEdit">'.$show['atikramanAddress'].'</td>
                        <td id="atikramanGBAddressEdit">'.$show['atikramanGBAddress'].'</td>
                        <td id="atikramanTapaEdit">'.$show['atikramanTapa'].'</td>
                        <td id="atikramanJillaEdit">'.$show['atikramanJilla'].'</td>
                        <td id="atikramanCourtEdit">'.$show['atikramanCourt'].'</td>
                        <td id="atikramanSarveNumberEdit">'.$show['atikramanSarveNumber'].'</td>
                        <td id="atikramanRakbaEdit">'.$show['atikramanRakba'].'</td>
                        <td id="atikramanNohiyatEdit">'.$show['atikramanNohiyat'].'</td>
                        <td id="atikramanBKRakbaEdit">'.$show['atikramanBKRakba'].'</td>
                        <td id="atikramanDescriptionEdit">'.$show['atikramanDescription'].'</td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['atikramanId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_atikraman`";
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