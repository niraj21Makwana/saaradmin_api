<?php 
include('../assets/includes/connection.php');

if(isset($_POST['NameOfPatwari']) || isset($_POST['DateOfBirth']) || isset($_POST['DateOfJoining']) || isset($_POST['EmployeeCode']) || isset($_POST['PostingDistrict'])){

   
   $NameOfPatwari = trim($_POST['NameOfPatwari']);
   $DateOfBirth = trim($_POST['DateOfBirth']);
   $DateOfJoining = trim($_POST['DateOfJoining']);
   $EmployeeCode = trim($_POST['EmployeeCode']);
   $PostingDistrict = trim($_POST['PostingDistrict']);
   
   $chechEmployeecode = mysqli_query($con,"SELECT * FROM `saarPatwari` WHERE `EmployeeCode`='$EmployeeCode'");
   $countEmployee = mysqli_num_rows($chechEmployeecode);
   if($countEmployee==0){
        $run = mysqli_query($con,"INSERT INTO `saarPatwari`(`NameOfPatwari`, `DateOfBirth`, `DateOfJoining`, `EmployeeCode`, `PostingDistrict`) VALUES ('$NameOfPatwari','$DateOfBirth','$DateOfJoining','$EmployeeCode','$PostingDistrict')");
        if($run){  
          echo 1;
       }else{
           echo 0;
       }
   }else{
        echo 0;
   }
}