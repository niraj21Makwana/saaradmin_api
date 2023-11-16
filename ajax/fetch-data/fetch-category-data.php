<?php
include('../../assets/includes/connection.php');

$output = "";

$run = mysqli_query($con,"SELECT * FROM `dy_post_category` ORDER BY `id` DESC");
$count = mysqli_num_rows($run);


                        


                           


 // <td><input type="checkbox" value="'.$show['category_id'].'" name="dltcheckbox"></td>
if($count>0){
   $num = 1;
   while($show = mysqli_fetch_array($run)){
        $output .= '  
                      <tr>
                       
                        <td>'.$num.'</td>
                        <td colspan="4">  <button title="Add posts in this category" type="button" data-toggle="modal" data-target="#exampleModal0" id="openaddpostsmodal"  data-eid="'.$show['category_id'].'" class="btn btn-icon btn-success"><i class="fa fa-plus"></i></button> </td> <td colspan="4">  <button type="button" data-eid="'.$show['category_id'].'" class="btn btn-icon btn-primary"><i class="far fa-eye"></i></button> </td>

                        <td id="cat_id" hidden>'.$show['category_id'].'</td>
                        <td><img id="catgeoryimg_url_edit" style="margin:4px;" width="80" height="80" src="'.BASE_URL.'assets/category_images/'.$show['category_photo'].'"></td>
                        <td id="category_name_edit">'.$show['category_name'].'</td>
                        <td id="category_type_edit">'.$show['category_type'].'</td>
                        <td id="upload_place_edit">'.$show['upload_place'].'</td>
                        <td id="alt_text_edit">'.$show['alt_text'].'</td>
                        <td>
                            <select name="status" id="getstatus" data-statusid="'.$show['category_id'].'">
                              <option value="">Select status</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Active')?'selected="selected"':"").'>Active</option>
                              <option value="'.$show['status'].'" '.(($show['status']=='Deactive')?'selected="selected"':"").'>Deactive</option>
                            </select>
                        </td>
                        <td>'.$show['upload_date'].'</td>
                        <td colspan="4"><button type="button" data-toggle="modal" data-target="#exampleModal0" id="openeditmodal"  data-eid="'.$show['category_id'].'" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></button></td> <td colspan="4"> <button class="btn btn-icon btn-danger dlt-btn" data-id="'.$show['category_id'].'" ><i class="fas fa-trash"></i></button></td>
                      </tr>';

                    $num++;
   }

      
echo $output;

}else{
    echo "";
}


//echo '<option value="'.$value.'" '.(($value=='United States')?'selected="selected"':"").'>'.$value.'</option>';                 
               
                   


?>