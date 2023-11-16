<?php
include('../assets/includes/connection.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $fasalMpANmae = isset($_POST['fasalMpANmae']) ? $_POST['fasalMpANmae'] : null;
    $fasalMpANmae = trim($fasalMpANmae);
    
    $fasalMpAAddress = isset($_POST['fasalMpAAddress']) ? $_POST['fasalMpAAddress'] : null;
    $fasalMpAAddress = trim($fasalMpAAddress);
    
    $fasalMpWhatsAppNumber = isset($_POST['fasalMpWhatsAppNumber']) ? $_POST['fasalMpWhatsAppNumber'] : null;
    $fasalMpWhatsAppNumber = trim($fasalMpWhatsAppNumber);
    
    $fasalMpEmailId = isset($_POST['fasalMpEmailId']) ? $_POST['fasalMpEmailId'] : null;
    $fasalMpEmailId = trim($fasalMpEmailId);
    
    $fasalMpId = "saar_".uniqid();
    $appliedId = "saar_".uniqid();
    
    $fasalFormName = "फसल मुआवजा पत्रक";
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($fasalMpANmae!="" && $fasalMpAAddress!="" && $fasalMpWhatsAppNumber!="" && $fasalMpEmailId!=""){
                
                $insertFormData = mysqli_query($con,"INSERT INTO `saar_fasalMP`(`userId`, `mobileNumber`, `fasalMpId`, `fasalMpANmae`, `fasalMpAAddress`, `fasalMpWhatsAppNumber`, `fasalMpEmailId`) VALUES ('$userId','$mobileNumber','$fasalMpId','$fasalMpANmae','$fasalMpAAddress','$fasalMpWhatsAppNumber','$fasalMpEmailId')");
                
                if($insertFormData){
                    // if the query is run
                    $insertAppliedFormData = mysqli_query($con,"INSERT INTO `saar_appliedForm`(`userId`, `mobileNumber`, `appliedId`, `appliedFormName`, `appliedFormId`) VALUES ('$userId','$mobileNumber','$appliedId','$fasalFormName','$fasalMpId')");
                    
                            $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_fasalMP` WHERE `fasalMpId`='$fasalMpId'");
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