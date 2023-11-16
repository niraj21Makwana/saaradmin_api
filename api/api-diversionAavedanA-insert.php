<?php
include('../assets/includes/connection.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $divAavAvedakName = isset($_POST['divAavAvedakName']) ? $_POST['divAavAvedakName'] : null;
    $divAavAvedakName = trim($divAavAvedakName);
    
    $divAavAvedakAddress = isset($_POST['divAavAvedakAddress']) ? $_POST['divAavAvedakAddress'] : null;
    $divAavAvedakAddress = trim($divAavAvedakAddress);
    
    $divAavBTAddress = isset($_POST['divAavBTAddress']) ? $_POST['divAavBTAddress'] : null;
    $divAavBTAddress = trim($divAavBTAddress);
    
    $divAavTahsil = isset($_POST['divAavTahsil']) ? $_POST['divAavTahsil'] : null;
    $divAavTahsil = trim($divAavTahsil);
    
    $divAavJilla = isset($_POST['divAavJilla']) ? $_POST['divAavJilla'] : null;
    $divAavJilla = trim($divAavJilla);
    
    $divAavServeNumber = isset($_POST['divAavServeNumber']) ? $_POST['divAavServeNumber'] : null;
    $divAavServeNumber = trim($divAavServeNumber);
    
    $divAavRakba = isset($_POST['divAavRakba']) ? $_POST['divAavRakba'] : null;
    $divAavRakba = trim($divAavRakba);

    $divAavKitnaDivVargMeeter = isset($_POST['divAavKitnaDivVargMeeter']) ? $_POST['divAavKitnaDivVargMeeter'] : null;
    $divAavKitnaDivVargMeeter = trim($divAavKitnaDivVargMeeter);
    
    $divAavPrayogan = isset($_POST['divAavPrayogan']) ? $_POST['divAavPrayogan'] : null;
    $divAavPrayogan = trim($divAavPrayogan);
    
    $divAavMobileNumber = isset($_POST['divAavMobileNumber']) ? $_POST['divAavMobileNumber'] : null;
    $divAavMobileNumber = trim($divAavMobileNumber);

    $divAavEmailId = isset($_POST['divAavEmailId']) ? $_POST['divAavEmailId'] : null;
    $divAavEmailId = trim($divAavEmailId);
    
    $divAavAdharCard = isset($_POST['divAavAdharCard']) ? $_POST['divAavAdharCard'] : null;
    $divAavAdharCard = trim($divAavAdharCard);
    
    $diversionAvedanId = "saar_".uniqid();
    $appliedId = "saar_".uniqid();
    $formName = "डायवर्सन आवेदन";
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($divAavAvedakName!="" && $divAavAvedakAddress!="" && $divAavBTAddress!="" && $divAavTahsil!="" && $divAavJilla!="" && $divAavServeNumber!="" && $divAavRakba!=""  && $divAavKitnaDivVargMeeter!="" && $divAavPrayogan!="" && $divAavMobileNumber!="" && $divAavEmailId!="" && $divAavAdharCard!=""){
                
                $insertFormData = mysqli_query($con,"INSERT INTO `saar_diversion_aavedan`(`userId`, `mobileNumber`, `diversionAvedanId`, `divAavAvedakName`, `divAavAvedakAddress`, `divAavBTAddress`, `divAavTahsil`, `divAavJilla`, `divAavServeNumber`, `divAavRakba`, `divAavKitnaDivVargMeeter`, `divAavPrayogan`, `divAavMobileNumber`, `divAavEmailId`, `divAavAdharCard`) VALUES ('$userId','$mobileNumber','$diversionAvedanId','$divAavAvedakName','$divAavAvedakAddress','$divAavBTAddress','$divAavTahsil','$divAavJilla','$divAavServeNumber','$divAavRakba','$divAavKitnaDivVargMeeter','$divAavPrayogan','$divAavMobileNumber','$divAavEmailId','$divAavAdharCard')");
                if($insertFormData){
                    // if the query is run
                    $insertAppliedFormData = mysqli_query($con,"INSERT INTO `saar_appliedForm`(`userId`, `mobileNumber`, `appliedId`, `appliedFormName`, `appliedFormId`) VALUES ('$userId','$mobileNumber','$appliedId','$formName','$diversionAvedanId')");
                    
                            $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_diversion_aavedan` WHERE `diversionAvedanId`='$diversionAvedanId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                    $responseData[] = $getAllData;
                                }
                                $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'फॉर्म जमा किया जा चूका','response'=>$responseData);
                                print_r(json_encode($response));
                            }else{
                                // if count < 1
                                $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                                print_r(json_encode($response));   
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