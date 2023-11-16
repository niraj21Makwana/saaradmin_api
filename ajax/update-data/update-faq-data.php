<?php 
include('../../assets/includes/connection.php');
if(isset($_POST['faqId']) || isset($_POST['faqQuestion']) || isset($_POST['faqAnswer'])){

   $faqId = $_POST['faqId'];
   $faqQuestion = trim($_POST['faqQuestion']);
   $faqAnswer = $_POST['faqAnswer'];
   
        $run = mysqli_query($con,"UPDATE `saar_faq` SET `faqQuestion`='$faqQuestion',`faqAnswer`='$faqAnswer' WHERE `faqId`='$faqId'");
        if($run){
        echo 1;
        }else{
        echo 0;
        }
}
?>
