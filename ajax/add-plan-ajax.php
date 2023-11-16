<?php 
include('../assets/includes/connection.php');

if(isset($_POST['planPrice']) || isset($_POST['planName']) || isset($_POST['planNoOfForm'])){

   
   $planPrice = trim($_POST['planPrice']);
   $planName = trim($_POST['planName']);
   $planNoOfForm = trim($_POST['planNoOfForm']);

    $planId = uniqid();    
    
    $run = mysqli_query($con,"INSERT INTO `saar_plans`(`planId`, `planName`, `planPrice`, `planNoOfForm`) VALUES ('$planId','$planName','$planPrice','$planNoOfForm')");
   
     if($run){  
      echo 1;
   }else{
       echo 0;
   } 
}