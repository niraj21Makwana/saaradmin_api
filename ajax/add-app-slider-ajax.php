<?php 
include('../assets/includes/connection.php');
if(isset($_POST['altText']) || isset($_POST['sliderPhotoAdd'])){

   
   $altText = trim(ucfirst($_POST['altText']));
  
   if(is_array($_FILES)){
    
      for($i=0;$i<count($_FILES["sliderPhotoAdd"]["name"]);$i++){
         $sliderId = uniqid();    
          $uploadfile=$_FILES["sliderPhotoAdd"]["tmp_name"][$i];  
          $sliderPhotoAdd = time().'_'.$_FILES['sliderPhotoAdd']['name'][$i];
          $sliderPhotoTempName = $_FILES['sliderPhotoAdd']['tmp_name'][$i];

          if(move_uploaded_file($sliderPhotoTempName ,"../assets/Mobile_slider/$sliderPhotoAdd")){
              $run = mysqli_query($con,"INSERT INTO ".MOBILESLIDERTABLE." (`sliderId`,`alt`,`sliderImage`) VALUES ('$sliderId','$altText','$sliderPhotoAdd')");
            }
      }
     }
     if($run){  
      echo 1;
   }else{
       echo 0;
   } 
}