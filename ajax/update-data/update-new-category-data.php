<?php 
include('../../assets/includes/connection.php');
if(isset($_POST['category_type']) || isset($_POST['catid']) || isset($_POST['upload_place']) || isset($_POST['category_name']) || isset($_POST['category_photo'])){

   $catt_id = $_POST['catid'];
   $catgeory_type = $_POST['category_type'];
   $upload_place = $_POST['upload_place'];
   $category_name = trim(ucwords($_POST['category_name']));
   $alt_text = trim(ucfirst($_POST['alt']));
   
   $catimg = $_FILES['category_photo']['name'];

   $category_photo = time().'_'.$_FILES['category_photo']['name'];
   $category_phot_temp = $_FILES['category_photo']['tmp_name'];

   if($catimg!=''){
        $getoldimg = mysqli_query($con,"SELECT * FROM `dy_post_category` WHERE `category_id`='$catt_id'");
        $dltoldimg = mysqli_fetch_array($getoldimg);
        $oldimg = $dltoldimg['category_photo'];
        unlink("../../assets/category_images/$oldimg");
        $run = mysqli_query($con,"UPDATE `dy_post_category` SET `category_type`='$catgeory_type',`upload_place`='$upload_place',`category_name`='$category_name',`category_photo`='$category_photo',`alt_text`='$alt_text' WHERE `category_id`='$catt_id'");
        if($run){
        move_uploaded_file($category_phot_temp,"../../assets/category_images/$category_photo");
        echo 1;
        }else{
        echo 0;
        }
   }else{
        $run = mysqli_query($con,"UPDATE `dy_post_category` SET `category_type`='$catgeory_type',`upload_place`='$upload_place',`category_name`='$category_name',`alt_text`='$alt_text' WHERE `category_id`='$catt_id'");
        if($run){
            echo 1;
        }else{
            echo 0;
        }
   }


  
   
}
?>
