<?php
include('../../assets/includes/connection.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_GET['userId']) ? $_GET['userId'] : null;
    $userId = trim($userId);
    
    $token = isset($_GET['token']) ? $_GET['token'] : null;
    $token = trim($token);
    
    $mobileNumber = isset($_GET['mobileNumber']) ? $_GET['mobileNumber'] : null;
    $mobileNumber = trim($mobileNumber);

    if($userId!="" && $token!=""){
        $checkUser = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId' AND`token`='$token'");
        $countUser = mysqli_num_rows($checkUser);
        if($countUser>0){
            $fetchData = mysqli_query($con,"SELECT * FROM `saar_appliedForm` WHERE `userId`='$userId' AND `mobileNumber`='$mobileNumber'");
            $fetchCount =  mysqli_num_rows($fetchData);
            if($fetchCount>0){
                while($getAllData = mysqli_fetch_assoc($fetchData)){
                        $responseData[] = $getAllData;
                    }
                $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'count'=>$fetchCount,'response'=>$responseData);
                print_r(json_encode($response));
            }else{
                //if data is not present
                  $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                print_r(json_encode($response));
            }
        }else{
            // if user are not exits
            $response = array('status'=>array('code'=>INVALID_EMAIL_OR_MOBILE,'message'=>'User Are not Exits'),'response'=>$responseData);
            print_r(json_encode($response));
        }
    }else{
        //if userid and token are empty
         $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'Empty data'),'response'=>$responseData);
        print_r(json_encode($response));
    }


mysqli_close($con)
?>