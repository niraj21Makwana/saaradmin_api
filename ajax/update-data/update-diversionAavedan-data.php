<?php 
include('../../assets/includes/connection.php');
if(isset($_POST['bloodDonerId']) ||isset($_POST['donerName']) || isset($_POST['donerMobileNumber']) || isset($_POST['donerWhatsappNumber']) || isset($_POST['donerDateOfBrith']) || isset($_POST['donerBloodGroup'])|| isset($_POST['donerLocality'])|| isset($_POST['donerDiabetes'])|| isset($_POST['donerBloodPressure'])|| isset($_POST['donerAnyOtherHealthIssues']) ){

   $bloodDonerId = $_POST['bloodDonerId'];
   $donerName = trim($_POST['donerName']);
   $donerPrifiex = $_POST['donerPrifiex'];
   $donerMobileNumber = trim($_POST['donerMobileNumber']);
   $donerWhatsappNumber = trim($_POST['donerWhatsappNumber']);
  $donerDateOfBrith = $_POST['donerDateOfBrith'];
   $donerAge = dob($donerDateOfBrith);
   $donerBloodGroup=$_POST['donerBloodGroup'];
   $donerLocality = $_POST['donerLocality'];
   $donerDiabetes = $_POST['donerDiabetes'];
   $donerBloodPressure = $_POST['donerBloodPressure'];
   $donerAnyOtherHealthIssues = $_POST['donerAnyOtherHealthIssues'];
   $donerOtherIssueDesEdit = $_POST['donerOtherIssueDesEdit'];
   
   $donerImage = $_FILES['image']['name'];

   $imagePhoto = time().'_'.$_FILES['image']['name'];
   $imageTemp = $_FILES['image']['tmp_name'];

   if($donerImage!=''){
        $getoldimg = mysqli_query($con,"SELECT * FROM `as_bloodDoner` WHERE `bloodDonerId`='$bloodDonerId'");
        $dltoldimg = mysqli_fetch_array($getoldimg);
        $oldimg = $dltoldimg['donerImage'];
        unlink("../../assets/bloodDoner_images/$oldimg");
        
        $run = mysqli_query($con,"UPDATE `as_bloodDoner` SET `donerImage`='$imagePhoto',`donerPrifiex`='$donerPrifiex',`donerName`='$donerName',`donerMobileNumber`='$donerMobileNumber',`donerWhatsappNumber`='$donerWhatsappNumber',`donerDateOfBrith`='$donerDateOfBrith',`donerAge`='$donerAge',`donerBloodGroup`='$donerBloodGroup',`donerLocality`='$donerLocality',`donerDiabetes`='$donerDiabetes',`donerBloodPressure`='$donerBloodPressure',`donerAnyOtherHealthIssues`='$donerAnyOtherHealthIssues',`donerOtherIssueDes`='$donerOtherIssueDesEdit' WHERE `bloodDonerId`='$bloodDonerId'");
        if($run){
        move_uploaded_file($imageTemp,"../../assets/bloodDoner_images/$imagePhoto");
        echo 1;
        }else{
        echo 0;
        }
   }else{
        $run = mysqli_query($con,"UPDATE `as_bloodDoner` SET `donerPrifiex`='$donerPrifiex',`donerName`='$donerName',`donerMobileNumber`='$donerMobileNumber',`donerWhatsappNumber`='$donerWhatsappNumber',`donerDateOfBrith`='$donerDateOfBrith',`donerAge`='$donerAge',`donerBloodGroup`='$donerBloodGroup',`donerLocality`='$donerLocality',`donerDiabetes`='$donerDiabetes',`donerBloodPressure`='$donerBloodPressure',`donerAnyOtherHealthIssues`='$donerAnyOtherHealthIssues',`donerOtherIssueDes`='$donerOtherIssueDesEdit' WHERE `bloodDonerId`='$bloodDonerId'");
        if($run){
            echo 1;
        }else{
            echo 0;
        };
   }
}
?>
