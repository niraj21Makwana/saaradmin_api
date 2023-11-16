<?php
include('../../assets/includes/connection.php');
        header('Content-Type: application/json');
        header('Acess-Control-Allow-Orginin: *');
        header('Access-control-Allow-Methods : POST');
        header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With'); 
    

        $userMobileNumber = isset($_GET['userMobileNumber']) ? $_GET['userMobileNumber'] : null;
        $token = isset($_GET['token']) ? $_GET['token'] : null;
        $appSignature = isset($_GET['appSignature']) ? $_GET['appSignature'] : null;
        $userId = isset($_GET['userId']) ? $_GET['userId'] : null;


        //trim details
        $userMobileNumber = trim($userMobileNumber);




if($token!='' && $userId!=''){
    
        $match = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userId`='$userId' AND `token`='$token'");
        $count = mysqli_num_rows($match);
        
        if($count > 0 && $count==1){
            
            if($userMobileNumber!=''){
                  $checkMobile = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userId`='$userId' AND `userMobileNumber`='$userMobileNumber'");
            $countMobile = mysqli_num_rows($match);
            
            
            if($countMobile>0 && $countMobile==1){
                
                 //send otp to mobile number (sms gateway)
            
            //success message
                                $otp = generateNumericOTP(5);
                                $phone = $userMobileNumber; // target number; includes ISD
                                $api_key = 'Z7T3pGcXYMua6ORWKvJ9iFoPQ58UwNmEBCH1ktbDhz2x0djIyLgxIie8Y2WqMATjw5kURnVaGlQbyOZ4'; // API Key
                    
                    $req="https://www.fast2sms.com/dev/bulkV2?authorization=Z7T3pGcXYMua6ORWKvJ9iFoPQ58UwNmEBCH1ktbDhz2x0djIyLgxIie8Y2WqMATjw5kURnVaGlQbyOZ4&route=otp&variables_values=".$otp."&flash=0&numbers=".$phone."";
                            
                                $sms = file_get_contents($req);
                                $sms_status = json_decode($sms, true);
                                
                                
                                $otpsend = mysqli_query($con,"UPDATE ".USERTABLE." SET `otp`='$otp' WHERE `userMobileNumber`='$userMobileNumber' AND `token`='$token'");
                               
                                    if($otpsend){
                                          $getUserDetails = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userId`='$userId' AND `userMobileNumber`='$userMobileNumber'");
                                $getUser = mysqli_num_rows($getUserDetails);
                                
                                while($row = mysqli_fetch_assoc($getUserDetails)){
                                    $responseData[] = $row;
                                }
                                        $response = array('status'=>array('code'=>SUCCESS,'message'=>'success','otpStatus'=>$sms_status),'response'=>$responseData);
                                        print_r(json_encode($response));
                                    }else{
                                        //update internal query error
                                        $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'success','otpStatus'=>$sms_status),'response'=>$responseData);
                                        print_r(json_encode($response));
                                    }
 
                
            }else{
                 $response = array('status'=>array('code'=>INVALID_EMAIL_OR_MOBILE,'message'=>'success','otpStatus'=>$sms_status),'response'=>$responseData);
                                print_r(json_encode($response));
            }
                
            }else{
                 $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'success','otpStatus'=>$sms_status),'response'=>$responseData);
                                print_r(json_encode($response));
            }
            
          
            
        }else{
            //if user not exist
           $response = array('status'=>array('code'=>INVALID_TOKEN,'message'=>'success,invalid Token','otpStatus'=>$sms_status),'response'=>$responseData);
            print_r(json_encode($response));
        }
         
}else{
    //empty fileds
      $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'success,Empty Data','otpStatus'=>$sms_status),'response'=>$responseData);
    print_r(json_encode($response));
}





mysqli_close($con);

?>