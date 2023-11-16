<?php
include('../assets/includes/connection.php');
include('regvinamay-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    // $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $regvinamayParNum = isset($_POST['regvinamayParNum']) ? $_POST['regvinamayParNum'] : null;
    $regvinamayParNum = trim($regvinamayParNum);
    
    $regvinamayAvdeakNameSecP = isset($_POST['regvinamayAvdeakNameSecP']) ? $_POST['regvinamayAvdeakNameSecP'] : null;
    $regvinamayAvdeakNameSecP = trim($regvinamayAvdeakNameSecP);
    
    $regvinamayAvedakAddressSecP = isset($_POST['regvinamayAvedakAddressSecP']) ? $_POST['regvinamayAvedakAddressSecP'] : null;
    $regvinamayAvedakAddressSecP = trim($regvinamayAvedakAddressSecP);
    
    $regvinamayEnAvedakNameFirstP = isset($_POST['regvinamayEnAvedakNameFirstP']) ? $_POST['regvinamayEnAvedakNameFirstP'] : null;
    $regvinamayEnAvedakNameFirstP = trim($regvinamayEnAvedakNameFirstP);

    $regvinamayEnAvedakAddressFirstP = isset($_POST['regvinamayEnAvedakAddressFirstP']) ? $_POST['regvinamayEnAvedakAddressFirstP'] : null;
    $regvinamayEnAvedakAddressFirstP = trim($regvinamayEnAvedakAddressFirstP);
    
    $regvinamayPatraNumber = isset($_POST['regvinamayPatraNumber']) ? $_POST['regvinamayPatraNumber'] : null;
    $regvinamayPatraNumber = trim($regvinamayPatraNumber);
    
    $regvinamayRegistryDate = isset($_POST['regvinamayRegistryDate']) ? $_POST['regvinamayRegistryDate'] : null;
    $regvinamayRegistryDate = trim($regvinamayRegistryDate);

    $regvinamayBServeNumSecP = isset($_POST['regvinamayBServeNumSecP']) ? $_POST['regvinamayBServeNumSecP'] : null;
    $regvinamayBServeNumSecP = trim($regvinamayBServeNumSecP);
    
    $regvinamayKulBServeNumSecP = isset($_POST['regvinamayKulBServeNumSecP']) ? $_POST['regvinamayKulBServeNumSecP'] : null;
    $regvinamayKulBServeNumSecP = trim($regvinamayKulBServeNumSecP);
    
    $regvinamayRakbaSecP = isset($_POST['regvinamayRakbaSecP']) ? $_POST['regvinamayRakbaSecP'] : null;
    $regvinamayRakbaSecP = trim($regvinamayRakbaSecP);
    
    $regvinamayBTAddressSecP = isset($_POST['regvinamayBTAddressSecP']) ? $_POST['regvinamayBTAddressSecP'] : null;
    $regvinamayBTAddressSecP = trim($regvinamayBTAddressSecP);
    
    // ==========
    $regvinamayBServeNumFirstP = isset($_POST['regvinamayBServeNumFirstP']) ? $_POST['regvinamayBServeNumFirstP'] : null;
    $regvinamayBServeNumFirstP = trim($regvinamayBServeNumFirstP);
    
    $regvinamayKulBServeNumFirstP = isset($_POST['regvinamayKulBServeNumFirstP']) ? $_POST['regvinamayKulBServeNumFirstP'] : null;
    $regvinamayKulBServeNumFirstP = trim($regvinamayKulBServeNumFirstP);
    
    $regvinamayRakbaFirstP = isset($_POST['regvinamayRakbaFirstP']) ? $_POST['regvinamayRakbaFirstP'] : null;
    $regvinamayRakbaFirstP = trim($regvinamayRakbaFirstP);
    
    $regvinamayBTAddressFirstP = isset($_POST['regvinamayBTAddressFirstP']) ? $_POST['regvinamayBTAddressFirstP'] : null;
    $regvinamayBTAddressFirstP = trim($regvinamayBTAddressFirstP);
    
    $regvinamayBandhak = isset($_POST['regvinamayBandhak']) ? $_POST['regvinamayBandhak'] : null;
    $regvinamayBandhak = trim($regvinamayBandhak);
    
    $regvinamayPatwariHalkNum = isset($_POST['regvinamayPatwariHalkNum']) ? $_POST['regvinamayPatwariHalkNum'] : null;
    $regvinamayPatwariHalkNum = trim($regvinamayPatwariHalkNum);
    
    $regvinamayTappa = isset($_POST['regvinamayTappa']) ? $_POST['regvinamayTappa'] : null;
    $regvinamayTappa = trim($regvinamayTappa);
    
    $regvinamayTahsil = isset($_POST['regvinamayTahsil']) ? $_POST['regvinamayTahsil'] : null;
    $regvinamayTahsil = trim($regvinamayTahsil);
    
    $regvinamayJilla = isset($_POST['regvinamayJilla']) ? $_POST['regvinamayJilla'] : null;
    $regvinamayJilla = trim($regvinamayJilla);
    
    $regvinamayCourt = isset($_POST['regvinamayCourt']) ? $_POST['regvinamayCourt'] : null;
    $regvinamayCourt = trim($regvinamayCourt);
    
    $regVinamayId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($regvinamayAvdeakNameSecP!="" && $regvinamayAvedakAddressSecP!="" && $regvinamayEnAvedakNameFirstP!="" && $regvinamayEnAvedakAddressFirstP!="" && $regvinamayPatraNumber!="" && $regvinamayRegistryDate!="" && $regvinamayBServeNumSecP!="" && $regvinamayKulBServeNumSecP!="" && $regvinamayRakbaSecP!="" && $regvinamayBTAddressSecP!="" && $regvinamayBServeNumFirstP!="" && $regvinamayKulBServeNumFirstP!="" && $regvinamayRakbaFirstP!=""  && $regvinamayBTAddressFirstP!="" && $regvinamayBandhak!="" && $regvinamayTahsil!="" && $regvinamayJilla!="" && $regvinamayCourt!=""){
                
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_reg_vinamay`(`userId`, `mobileNumber`, `regVinamayId`, `regvinamayParNum`, `regvinamayAvdeakNameSecP`, `regvinamayAvedakAddressSecP`, `regvinamayEnAvedakNameFirstP`, `regvinamayEnAvedakAddressFirstP`, `regvinamayPatraNumber`, `regvinamayRegistryDate`, `regvinamayBServeNumSecP`, `regvinamayKulBServeNumSecP`, `regvinamayRakbaSecP`, `regvinamayBTAddressSecP`, `regvinamayBServeNumFirstP`, `regvinamayKulBServeNumFirstP`, `regvinamayRakbaFirstP`, `regvinamayBTAddressFirstP`, `regvinamayBandhak`,`regvinamayPatwariHalkNum`,`regvinamayTappa`, `regvinamayTahsil`, `regvinamayJilla`, `regvinamayCourt`) VALUES ('$userId','$mobileNumber','$regVinamayId','$regvinamayParNum','$regvinamayAvdeakNameSecP','$regvinamayAvedakAddressSecP','$regvinamayEnAvedakNameFirstP','$regvinamayEnAvedakAddressFirstP','$regvinamayPatraNumber','$regvinamayRegistryDate','$regvinamayBServeNumSecP','$regvinamayKulBServeNumSecP','$regvinamayRakbaSecP','$regvinamayBTAddressSecP','$regvinamayBServeNumFirstP','$regvinamayKulBServeNumFirstP','$regvinamayRakbaFirstP','$regvinamayBTAddressFirstP','$regvinamayBandhak','$regvinamayPatwariHalkNum','$regvinamayTappa','$regvinamayTahsil','$regvinamayJilla','$regvinamayCourt')");
            
            if($insertFormData){
                // if the query is run
                if($userType=="Normal"){
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_reg_vinamay` WHERE `regVinamayId`='$regVinamayId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['regVinamayId'];
                             generateRegvinamayFormNormal($con,$dataIdWith);
                                $responseData[] = $getAllData;
                            }
                            $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'फॉर्म जमा किया जा चूका','m'=>$dataIdWith,'response'=>$responseData);
                            print_r(json_encode($response));
                        }else{
                            // if count < 1
                            $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                            print_r(json_encode($response));   
                        }
                }else{
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_reg_vinamay` WHERE `regVinamayId`='$regVinamayId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['regVinamayId'];
                             generateRegvinamayForm($con,$dataIdWith);
                                $responseData[] = $getAllData;
                            }
                            $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'फॉर्म जमा किया जा चूका','m'=>$dataIdWith,'response'=>$responseData);
                            print_r(json_encode($response));
                        }else{
                            // if count < 1
                            $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                            print_r(json_encode($response));   
                        }
                }
                            
                
            }else{
                // if query is not run
                 $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'Query Error'),'response'=>$responseData);
                print_r(json_encode($response)); 
            }
            
            }else{
                    // Empty data error
                $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'Empty data'),'response'=>$responseData);
                print_r(json_encode($response));
            }
        }else{
            // if user is not exits
            $response = array('status'=>array('code'=>INVALID_TOKEN,'message'=>'USER Not Exits'),'response'=>$responseData);
            print_r(json_encode($response)); 
        }
         
    }else{
         // Empty data error
        $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'Empty data'),'response'=>$responseData);
        print_r(json_encode($response));
    }
    
mysqli_close($con)

?>