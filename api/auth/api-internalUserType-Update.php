<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;

    $userGovermentId = isset($_POST['userGovermentId']) ? $_POST['userGovermentId'] : null;
    $userGovermentId=trim($userGovermentId);
    
    $userName = isset($_POST['userName']) ? $_POST['userName'] : null;
    $userName=trim($userName);
    
    $userType ='Goverment';
    
    if($userId!=""){
        $checkUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUserId = mysqli_num_rows($checkUserId);
        if($countUserId==1){
            // if user is found
            if($userGovermentId!="" || $userName!=""){
                //if userGovermentId and $userName is not empty
                if($userGovermentId!=""){
                    $checkUserGovermentId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userGovermentId`='$userGovermentId'");
                    $countUserGovermentId = mysqli_num_rows($checkUserGovermentId);
                    
                    if($countUserGovermentId==0){
                        //if
                        $checkGovermentId = mysqli_query($con,"SELECT * FROM `saarPatwari` WHERE `EmployeeCode`='$userGovermentId'");
                        $countGovermentId = mysqli_num_rows($checkGovermentId);
                        if($countGovermentId==1){
                            $updateGUserdata = mysqli_query($con,"UPDATE `saarUsersAuth` SET `userType`='$userType',`userGovermentId`='$userGovermentId' WHERE `userId`='$userId'");            
                            if($updateGUserdata){
                                //query is run
                                $updatedDataReturn =  mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
                                $updatedDataCount = mysqli_num_rows($updatedDataReturn);
                    
                                if($updatedDataCount>0){
                                    // if count > 0
                                    while($getAllData = mysqli_fetch_assoc($updatedDataReturn)){
                                            $responseData[] = $getAllData;
                                    }
                                    $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'Your Goverment Id has been updated Successfully! Now You Are Goverment User','response'=>$responseData);
                                        print_r(json_encode($response));
                                }else{
                                    // if count < 1
                                    $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                                    print_r(json_encode($response));   
                                }
                            }else{
                                // query is not run
                                $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'Goverment user Query is not run'),'response'=>$responseData);
                                print_r(json_encode($response)); 
                            }
                        }else{
                            // goverment user not exits
                            $response = array('status'=>array('code'=>NOT_FOUND,'message'=>'No Goverment User Found'),'msg'=>'No Goverment User Found','response'=>$responseData);
                            print_r(json_encode($response));
                        }
                    }else{
                     // goverment id already exits
                        $response = array('status'=>array('code'=>ALREADY_EXITS,'message'=>'Already Exits'),'msg'=>'This Goverment Id Is Already Used','response'=>$responseData);
                        print_r(json_encode($response));
                    }
                    
                }elseif($userName!=""){
                    $normalUser ="Normal";
                    $govermentId ="";
                    $updateUserdata = mysqli_query($con,"UPDATE `saarUsersAuth` SET `userName`='$userName',`userType`='$normalUser',`userGovermentId`='$govermentId' WHERE `userId`='$userId'");
            
                        if($updateUserdata){
                            // if query run
                            $updatedUDataReturn =  mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
                            $updatedUDataCount = mysqli_num_rows($updatedUDataReturn);
                            if($updatedUDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($updatedUDataReturn)){
                                    $responseData[] = $getAllData;
                                }
                                $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'Your Name has been Updated Successfully! Now You Are Normal User','response'=>$responseData);
                                print_r(json_encode($response));
                            }else{
                                // if count < 1
                                $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                                print_r(json_encode($response));   
                            }
                        }else{
                            // if query is not run 
                            $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'user Query is not run'),'response'=>$responseData);
                            print_r(json_encode($response)); 
                        }
                }
                
            }else{
                 // Empty data error
                $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'Empty data'),'response'=>$responseData);
                print_r(json_encode($response));
            }  
            
        }else{
             //user not found     
            $response = array('status'=>array('code'=>INVALID_TOKEN,'message'=>'User Not Found'),'response'=>$responseData);
            print_r(json_encode($response));    
        }
    }else{
         // Empty data error
        $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'Empty data'),'response'=>$responseData);
        print_r(json_encode($response));
    }
    
mysqli_close($con)

?>