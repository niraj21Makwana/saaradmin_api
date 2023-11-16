<?php
include('../../assets/includes/connection.php');

$output = "";


if(isset($_POST['catid']) && isset($_POST['status'])){
    $catid = $_POST['catid'];
    $status = $_POST['status'];
    $run = mysqli_query($con,"UPDATE `dy_post_category` SET `status`='$status' WHERE `category_id`='$catid'");
   
    if($run){
        echo 1;
    }else{
        echo 0;
    }

}



?>

