<?php 
include('../../assets/includes/connection.php');
if(isset($_POST['planId']) || isset($_POST['planName']) || isset($_POST['planPrice']) || isset($_post['planNoOfForm'])){

   $planId = $_POST['planId'];
   $planName = trim($_POST['planName']);
   $planPrice = trim($_POST['planPrice']);
   $planNoOfForm = trim($_POST['planNoOfForm']);
   
        $run = mysqli_query($con,"UPDATE `saar_plans` SET `planName`='$planName',`planPrice`='$planPrice',`planNoOfForm`='$planNoOfForm' WHERE `planId`='$planId'");
        if($run){
        echo 1;
        }else{
        echo 0;
        }
}
?>
