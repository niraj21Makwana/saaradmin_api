<?php
include('../../assets/includes/connection.php');

$output = "";

$usertype = $_POST['usertype'];

$limit_per_page = 500;
    $page = "";
    if(isset($_POST["page_no"])){
        $page = $_POST["page_no"];
    }else{
        $page = 1;
    }

    $offset = ($page - 1)*$limit_per_page;
    if($usertype=="AllUser"){
        $run = mysqli_query($con,"SELECT * FROM `saarUsersAuth` LIMIT {$offset},{$limit_per_page} ");    
    }else{
        $run = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userType`='$usertype' LIMIT {$offset},{$limit_per_page} ");
    }
    

$count = mysqli_num_rows($run);
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
        $profile = $show['userImage'];
        $userName = $show['userName']==""?'Saar User':$show['userName'];
        $userAddress = $show['userAddress']==""?'Address Not Available':$show['userAddress'];
        
       if($profile==''){
          $profile = BASE_URL."assets/img/placeholders/logoMale.jpg";
       }else{
           $profile = BASE_URL."assets/users_images/".$show['userImage'];
       }
        $output .= '  
                      <tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['userId'].'" ></td>
                        <td>'.$num.'</td>
                        <td id="userIdEdit" hidden>'.$show['userId'].'</td>
                        <td><img id="userImageEdit" style="margin:4px;" width="80" height="80" src="'.$profile.'"></td>
                        <td id="userNameEdit">'.$userName.'</td>
                        <td id="userMobileNumberEdit">'.$show['userMobileNumber'].'</td>
                        <td id="earnedCoinEdit">'.$show['userType'].'</td>
                        <td id="earnedCoinEdit">'.$show['userEmail'].'</td>
                        <td id="userAddressEdit"><div style="scrollbar-width:thin; overflow-y:scroll; height:100px; width:200px ">'.$userAddress.'</div></td>
                        <td colspan="4"><a href="tel:'.$show['userMobileNumber'].'"><button class="btn btn-icon btn-success"><i class="fas fa-phone"></i></button></a></td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['userId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saarUsersAuth`";
   $records = mysqli_query($con,$sql_table);
   $total_record = mysqli_num_rows($records);
   $total_pages = ceil($total_record/$limit_per_page);
   $output .= '<tr><div >';
   for($i = 1; $i <= $total_pages;$i++){
       $output .= '<td colspan="1"><button style="border:none;background:none;outline:none;" id="pagination"><a id="'.$i.'" class="btn btn-warning text-white">'.$i.'</a></button></td>' ;
       }
       $output .= '</div></tr>';

      
echo $output;

}else{
    echo "No Data....";
}

?>
<!--<td colspan="4"><button type="button" data-toggle="modal" data-target="#exampleModal0" id="openeditmodal"  data-eid="'.$show['usersPostId'].'" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></button></td>-->