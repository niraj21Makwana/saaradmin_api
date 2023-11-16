<?php
include('../assets/includes/connection.php');
// error_reporting(0);
if(isset($_FILES)){
    $post_id = uniqid();
    $plan = $_POST['plan'];
    $category_type = $_POST['category_type'];
    $upload_place = $_POST['upload_place'];
    $catid = $_POST['catid'];
    $category_name = $_POST['category_name'];
    $alt = $_POST['alt'];
    $language = $_POST['language'];
    
    for($i=0;$i<count($_FILES["images"]["name"]);$i++)  
    {  
        $uploadfile=$_FILES["images"]["tmp_name"][$i];  
        $folder="../post_images/";  
        $img = time()."_".$_FILES["images"]["name"][$i];
        if(move_uploaded_file($_FILES["images"]["tmp_name"][$i], "$folder".$img)){
          //  $run = mysqli_query($con,"INSERT INTO `multiimg`(`img`,`text`) VALUES ('$img','$text')");
          $query=mysqli_query($con,"INSERT INTO `dy_posts`(`post_id`, `category_id`, `category_type`, `upload_place`, `category_name`, `alt`, `post_language`, `post_image`) VALUES ('$post_id','$catid','$category_type','$upload_place','$category_name','$alt','$language','$img')");

        }  
    }  

            if($query)
                {
                echo 1;
                }
                else{
                echo 0;    
                } 
}
?>

