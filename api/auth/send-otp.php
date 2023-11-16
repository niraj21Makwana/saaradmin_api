<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With'); 
      
        $userMobileNumber = isset($_GET['userMobileNumber']) ? $_GET['userMobileNumber'] : null;
        $appSignature = isset($_GET['appSignature']) ? $_GET['appSignature'] : null;
        $deviceId = isset($_GET['deviceId']) ? $_GET['deviceId'] : null;
        $userMobileNumber = trim($userMobileNumber);
       
if($userMobileNumber!='' && $appSignature!='' && $deviceId!=''){
     
     if($userMobileNumber=='9977219542'){
                  $checkM = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userMobileNumber`='$userMobileNumber'");
                  $c = mysqli_num_rows($checkM);
                   
                    if($c>0){
                            $newToken = bin2hex(random_bytes(32));
                            $logIndDate = date("Y-m-d");
                            
                    $updateToken = mysqli_query($con,"UPDATE ".USERTABLE." SET `token`='$newToken',`otp`='18935' WHERE `userMobileNumber`='$userMobileNumber'");
                    
                     if($updateToken){
                              
                                $getUserDetails = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userMobileNumber`='$userMobileNumber'");
                                $getUser = mysqli_num_rows($getUserDetails);
                                
                                while($row = mysqli_fetch_assoc($getUserDetails)){
                                    $responseData[] = $row;
                                }
                                        $response = array('status'=>array('code'=>SUCCESS,'message'=>'success','otp status'=>'otp has been send'),'response'=>$responseData);
                                        print_r(json_encode($response));
                        }
                    }else{
                        $userId = "saar".time().uniqid();
                        $newToken = bin2hex(random_bytes(32));
                        $logIndDate = date("Y-m-d");
                        
                         $run = mysqli_query($con,"INSERT INTO ".USERTABLE." (`userId`, `userMobileNumber`,`appSignature`, `deviceId`,`token`, `otp`) VALUES ('$userId','$userMobileNumber','$appSignature','$deviceId','$newToken','18935')");
                               
                               if($run){
                                   
                                    
                                    $getUserDetails = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userMobileNumber`='$userMobileNumber'");
                                            $getUser = mysqli_num_rows($getUserDetails);
                                            
                                            while($row = mysqli_fetch_assoc($getUserDetails)){
                                                $responseData[] = $row;
                                            }
                                    $response = array('status'=>array('code'=>SUCCESS,'message'=>'success','otp status'=>'otp has been send'),'response'=>$responseData);
                                                    print_r(json_encode($response));
                               }
                       
                    }
                  
                            
                  
              }else{
                  //if not empty, run query to check user
                $run = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userMobileNumber`='$userMobileNumber'");
                $count = mysqli_num_rows($run);
                if($count==1){
                        //send otp code
                        $newToken = bin2hex(random_bytes(32));
                      
                        $updateToken = mysqli_query($con,"UPDATE ".USERTABLE." SET `token`='$newToken' WHERE `userMobileNumber`='$userMobileNumber'");
                         if($updateToken){
                                $otp =  generateNumericOTP(5);
                                $phone = $userMobileNumber; 
                                $api_key = 'Z7T3pGcXYMua6ORWKvJ9iFoPQ58UwNmEBCH1ktbDhz2x0djIyLgxIie8Y2WqMATjw5kURnVaGlQbyOZ4'; // API Key
                                
                                $req="https://www.fast2sms.com/dev/bulkV2?authorization=Z7T3pGcXYMua6ORWKvJ9iFoPQ58UwNmEBCH1ktbDhz2x0djIyLgxIie8Y2WqMATjw5kURnVaGlQbyOZ4&route=otp&variables_values=".$otp."&flash=0&numbers=".$phone."";
                                
                                $sms = file_get_contents($req);
                                $sms_status = json_decode($sms, true); 
                                
                               
                                $otpsend = mysqli_query($con,"UPDATE ".USERTABLE." SET `otp`='$otp' WHERE `userMobileNumber`='$userMobileNumber'");
                                if($otpsend){
                                       
                                          $getUserDetails = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userMobileNumber`='$userMobileNumber'");
                                          $getUser = mysqli_num_rows($getUserDetails);
                                
                                            while($row = mysqli_fetch_assoc($getUserDetails)){
                                                $responseData[] = $row;
                                            }
                                            
                                        $response = array('status'=>array('code'=>SUCCESS,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
                                        print_r(json_encode($response));
                                    }else{
                                        //update internal query error
                                        $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
                                        print_r(json_encode($response));
                                    }

                         }else{
                              //query error
                            $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
                                print_r(json_encode($response));
                             
                         }
                }else{
                    //register new user and send otp
                    $userId = "saar".time().uniqid();
                    $newToken = bin2hex(random_bytes(32));
                   
                    $insertCustomer = mysqli_query($con,"INSERT INTO ".USERTABLE." (`userId`, `userMobileNumber`,`appSignature`, `deviceId`,`token`, `otp`) VALUES ('$userId','$userMobileNumber','$appSignature','$deviceId','$newToken','$otp')");
                    
            if($insertCustomer){
                //success message
                    $otp = generateNumericOTP(5);
                    $phone = $userMobileNumber;
                    $api_key = 'Z7T3pGcXYMua6ORWKvJ9iFoPQ58UwNmEBCH1ktbDhz2x0djIyLgxIie8Y2WqMATjw5kURnVaGlQbyOZ4'; // API Key
                    
                    $req="https://www.fast2sms.com/dev/bulkV2?authorization=Z7T3pGcXYMua6ORWKvJ9iFoPQ58UwNmEBCH1ktbDhz2x0djIyLgxIie8Y2WqMATjw5kURnVaGlQbyOZ4&route=otp&variables_values=".$otp."&flash=0&numbers=".$phone."";
                    
                    $sms = file_get_contents($req);
                    $sms_status = json_decode($sms, true);    
                                    
                      
                     $otpsend = mysqli_query($con,"UPDATE ".USERTABLE." SET `otp`='$otp' WHERE `userMobileNumber`='$userMobileNumber'");              
                      if($otpsend){
                        
                            $getUserDetails = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `userMobileNumber`='$userMobileNumber'");
                            $getUser = mysqli_num_rows($getUserDetails);
                    
                            while($row = mysqli_fetch_assoc($getUserDetails)){
                                $responseData[] = $row;
                            }

                            $response = array('status'=>array('code'=>SUCCESS,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
                    print_r(json_encode($response));
                        }else{
                            //update internal query error
                            $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
                            print_r(json_encode($response));
                        }
                   
                
            }else{
                //query error
                 $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
                    print_r(json_encode($response));
            }
            
            
         }
    }
          
              
}else{
     $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'success','otp status'=>$sms_status),'response'=>$responseData);
    print_r(json_encode($response));
}
        

mysqli_close($con);

?>