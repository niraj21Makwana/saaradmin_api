<?php 
include('../assets/includes/connection.php');

if(isset($_POST['faqQuestion']) || isset($_POST['faqAnswer'])){

   
   $faqAnswer = trim($_POST['faqAnswer']);
   $faqQuestion = trim($_POST['faqQuestion']);


    $faqId = uniqid();    
    
    $run = mysqli_query($con,"INSERT INTO `saar_faq`(`faqId`, `faqQuestion`, `faqAnswer`) VALUES ('$faqId','$faqQuestion','$faqAnswer')");
   
     if($run){  
      echo 1;
   }else{
       echo 0;
   } 
}