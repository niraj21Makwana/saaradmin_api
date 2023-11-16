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

   
    $run = mysqli_query($con,"SELECT * FROM `saar_plans` LIMIT {$offset},{$limit_per_page}");

//$run = mysqli_query($con,"SELECT * FROM `dy_post_category` ORDER BY `id` DESC");
$count = mysqli_num_rows($run);

 // <td><input type="checkbox" value="'.$show['category_id'].'" name="dltcheckbox"></td>
if($count>0){


   $num = 1;
   while($show = mysqli_fetch_array($run)){
        $output .= '  
                      <tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['planId'].'" ></td>
                        <td>'.$num.'</td>
                        <td id="planIdEdit" hidden>'.$show['planId'].'</td>
                        <td id="planNameEdit">'.$show['planName'].'</td>
                        <td id="planPriceEdit">'.$show['planPrice'].'</td>
                        <td id="planNoOfFormEdit">'.$show['planNoOfForm'].'</td>
                         <td>
                            <select name="status" id="getstatus" data-statusid="'.$show['planId'].'">
                              <option value="">Select status</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Deactive')?'selected="selected"':"").'>Deactive</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Active')?'selected="selected"':"").'>Active</option>
                            </select>
                        </td>
                        <td>'.$show['date'].'</td>
                         <td colspan="4"><button type="button" data-toggle="modal" data-target="#exampleModal0" id="openeditmodal"  data-eid="'.$show['planId'].'" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></button></td>
                        <td colspan="4"><button class="btn btn-icon btn-danger dlt-btn" data-delId="'.$show['planId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM `saar_plans`";
   $records = mysqli_query($con,$sql_table);
   $total_record = mysqli_num_rows($records);
   $total_pages = ceil($total_record/$limit_per_page);
   $output .= '<tr><div >';
   for($i = 1; $i <= $total_pages;$i++){
       $output .= '<td colspan="1"><button style="border:none;background:none;outline:none;" id="pagination"><a id="'.$i.'" class="btn btn-primary text-white">'.$i.'</a></button></td>' ;
       }
       $output .= '</div></tr>';

      
echo $output;

}else{
    echo "No Data....";
}


//echo '<option value="'.$value.'" '.(($value=='United States')?'selected="selected"':"").'>'.$value.'</option>';                 
               
                   


?>