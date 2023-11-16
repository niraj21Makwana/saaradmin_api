<?php 
include('../assets/includes/connection.php');
if(isset($_POST['category_type']) || isset($_POST['upload_place']) || isset($_POST['category_name']) || isset($_POST['category_photo'])){

   $category_id = uniqid();
   $catgeory_type = $_POST['category_type'];
   $upload_place = $_POST['upload_place'];
   $category_name = trim(ucwords($_POST['category_name']));
   $alt_text = trim(ucfirst($_POST['alt']));
   $category_photo = time().'_'.$_FILES['category_photo']['name'];
   $category_phot_temp = $_FILES['category_photo']['tmp_name'];

   $check_duplicates = mysqli_query($con,"SELECT * FROM `dy_post_category` WHERE `category_type`='$catgeory_type' AND `category_name`='$category_name' AND `upload_place`='$upload_place'");

   $countduplicates = mysqli_num_rows($check_duplicates);
    if($countduplicates<0 || $countduplicates==0){
        $run = mysqli_query($con,"INSERT INTO `dy_post_category`(`category_id`, `category_type`, `upload_place`, `category_name`, `category_photo`, `alt_text`) VALUES ('$category_id','$catgeory_type','$upload_place','$category_name','$category_photo','$alt_text')");
        if($run){
           move_uploaded_file($category_phot_temp,"../assets/category_images/$category_photo");
           echo 1;
        }else{
            echo 0;
        }
    }else{
        echo 2;
    }
}
?>
