<?php
include('../../assets/includes/connection.php');

$output = "";


$limit_per_page = 500;
    $page = "";
    if(isset($_POST["page_no"])){
        $page = $_POST["page_no"];
    }else{
        $page = 1;
    }

    $offset = ($page - 1)*$limit_per_page;

    $run = mysqli_query($con,"SELECT * FROM `saarPatwari` ORDER BY `id` DESC LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);
if($count>0){
    
  $num = 1;
  while($show = mysqli_fetch_array($run)){
        $output .= '<tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['id'].'" ></td>
                        <td>'.$num.'</td>
                        <td id="idEdit" hidden>'.$show['id'].'</td>
                        <td id="NameOfPatwariE">'.$show['NameOfPatwari'].'</td>
                        <td id="DateOfBirthE">'.$show['DateOfBirth'].'</td>
                        <td id="DateOfJoiningE">'.$show['DateOfJoining'].'</td>
                        <td id="EmployeeCodeE">'.$show['EmployeeCode'].'</td>
                        <td id="PostingDistrictE">'.$show['PostingDistrict'].'</td>
                        <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['id'].'"><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
  }

  $output .= "<tr><td></td></tr>";

  $sql_table = "SELECT * FROM `saarPatwari`";
  $records = mysqli_query($con,$sql_table);
  $total_record = mysqli_num_rows($records);
  $total_pages = ceil($total_record/$limit_per_page);
  $output .= '<tr><td colspan="4">';
  for($i = 1; $i <= $total_pages;$i++){
      $output .= '<button style="border:none;background:none;outline:none;" id="pagination"><a id="'.$i.'" class="btn btn-info text-white">'.$i.'</a></button>' ;
    }
      $output .= '</td><td></td><td></td><td></td></tr>';

      
echo $output;

}else{
    echo "No Data....";
}

?>