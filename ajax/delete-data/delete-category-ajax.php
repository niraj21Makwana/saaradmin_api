<?php
include('../../assets/includes/connection.php');

$category_id = $_POST['category_dlt_id'];
$show = mysqli_query($con,"SELECT * FROM `dy_post_category` WHERE `category_id`='$category_id'");
$run = mysqli_query($con,"DELETE FROM `dy_post_category` WHERE `category_id`='$category_id'");
if($run){
            $row =mysqli_fetch_array($show);
            $pics = $row['category_photo'];
            unlink("../../assets/category_images/$pics");
    echo 1;
}else{
    echo 0;
}






?>