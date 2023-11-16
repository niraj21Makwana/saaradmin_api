<?php 
include('../../assets/includes/connection.php');


if(isset($_POST['userType']) || isset($_POST['notificationTitle']) || isset($_POST['notificationMessage'])){

   $usertype = $_POST['userType'];
   $notificationTitle = $_POST['notificationTitle'];
   $notificationMessage = $_POST['notificationMessage'];

   $notificationTitle = trim($notificationTitle);

   $notificationMessage = trim($notificationMessage);
   
   $image ='https://saars.in/adminsaar/assets/img/saarlogo.png';
    
    $actionType = "Push";
       
    $run = sendNotificationsInBatches($con,$notificationTitle,$notificationMessage,$actionType,$image,$usertype);
    
    if($run){
        echo 0;
    }else{
        echo 1;
    }

}


?>
