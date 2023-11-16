<?php
include('../../assets/includes/connection.php');

$output = "";


$limit_per_page = 25;
    $page = "";
    if(isset($_POST["page_no"])){
        $page = $_POST["page_no"];
    }else{
        $page = 1;
    }

    $offset = ($page - 1)*$limit_per_page;

   
    $run = mysqli_query($con,"SELECT * FROM `saar_feedback` LIMIT {$offset},{$limit_per_page}");

$count = mysqli_num_rows($run);

if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
        $output .= '  
                      <tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['feedbackId'].'" ></td>
                        <td>'.$num.'</td>
                        <td id="feedbackIdEdit" hidden>'.$show['feedbackId'].'</td>
                        <td id="feedbackUsernameEdit">'.$show['feedbackUsername'].'</td>
                        <td id="feedbackMobileNumberEdit">'.$show['feedbackMobileNumber'].'</td>
                        <td id="feedbackMobileNumberEdit">'.$show['feedbackEmailId'].'</td>
                        <td id="feedbackDescriptionEdit">'.$show['feedbackDescription'].'</td>
                        <td>'.$show['date'].'</td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_feedback`";
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


//echo '<option value="'.$value.'" '.(($value=='United States')?'selected="selected"':"").'>'.$value.'</option>';                 
                                    //   <td colspan="4"><button class="btn btn-icon btn-danger dlt-btn" data-delId="'.$show['dailyPostId'].'" ><i class="fas fa-trash"></i></button></td>
                   


?>