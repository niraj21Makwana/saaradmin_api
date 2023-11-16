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

   
    $run = mysqli_query($con,"SELECT * FROM ".MOBILESLIDERTABLE." LIMIT {$offset},{$limit_per_page}");

//$run = mysqli_query($con,"SELECT * FROM `dy_post_category` ORDER BY `id` DESC");
$count = mysqli_num_rows($run);

 // <td><input type="checkbox" value="'.$show['category_id'].'" name="dltcheckbox"></td>
if($count>0){


   $num = 1;
   while($show = mysqli_fetch_array($run)){
        $output .= '  
                      <tr>
                        <td><input type="checkbox" name="dlt" id="dlt-checkbox" value="'.$show['sliderId'].'" ></td>
                        <td>'.$num.'</td>
                        <td id="sliderIdEdit" hidden>'.$show['sliderId'].'</td>
                        <td><img id="sliderPhotoAddEdit" style="margin:4px;" width="80" height="80" src="'.BASE_URL.'assets/Mobile_slider/'.$show['sliderImage'].'"></td>
                        <td style="color:red"><b>Cooming Soon</b></td>
                        <td id="altTextEdit">'.$show['alt'].'</td>
                        <td>'.$show['date'].'</td>
                        <td colspan="4"><button class="btn btn-icon btn-danger dlt-btn" data-delId="'.$show['sliderId'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

   $output .= "<tr><td></td></tr>";

   $sql_table = "SELECT * FROM ".MOBILESLIDERTABLE."";
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
               
                   


?>