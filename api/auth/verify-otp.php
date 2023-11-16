<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With'); 
      
$token = isset($_GET['token']) ? $_GET['token'] : null;
$userId = isset($_GET['userId']) ? $_GET['userId'] : null;
$otp = isset($_GET['otp']) ? $_GET['otp'] : null;
$fcmToken = isset($_GET['fcmToken']) ? $_GET['fcmToken'] : null;

if($token!='' && $userId!=''){
    
        $match = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `token`='$token' AND `userId`='$userId'");
        $count = mysqli_num_rows($match);
        
        if($count > 0 && $count==1){
            
            if($otp!=''){
                  
            $checkOTP =  mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `otp`='$otp' AND `token`='$token' AND `userId`='$userId'");
            $OTPcount = mysqli_num_rows($checkOTP);
                if($OTPcount>0 && $OTPcount==1){
                    
                     //correct otp redirect to main screen
                     $logIndDate = date("Y-m-d");
                    //update login date 
                     
                      $updateTc = mysqli_query($con,"UPDATE ".USERTABLE." SET `fcmToken`='$fcmToken' WHERE `token`='$token' AND `otp`='$otp'");
                    
                       
                         
                        $getUserDetails = mysqli_query($con,"SELECT * FROM ".USERTABLE." WHERE `token`='$token' AND `userId`='$userId'");
                        $getUser = mysqli_num_rows($getUserDetails);
                        
                      
                    
                        while($row = mysqli_fetch_assoc($getUserDetails)){
                            $responseData[] = $row;
                        }
                        //response
                        $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'response'=>$responseData);
                        print_r(json_encode($response));
                }else{
                    //NOT MATCH
                    $response = array('status'=>array('code'=>WRONG_OTP,'message'=>'success'),'response'=>$responseData);
                    print_r(json_encode($response));
                }
            
            }else{
                //empty otp
                 $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'success'),'response'=>$responseData);
                print_r(json_encode($response));
            }
            
        }else{
            //user not matched
             $response = array('status'=>array('code'=>INVALID_TOKEN,'message'=>'success'),'response'=>$responseData);
             print_r(json_encode($response));
          
        }
    
}else{
    //empty fileds
     $response = array('status'=>array('code'=>EMPTY_TOKE_OR_CUSTOMERID,'message'=>'success'),'response'=>$responseData);
     print_r(json_encode($response));
}


mysqli_close($con);

?>