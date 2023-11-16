<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

$success = '2000';
$notFound = '4001';
$invalidToken = '4003';
$response = "";

$userId = isset($_POST['userId']) ? $_POST['userId'] : null;
//**********************************intialization *********************************/
$userName = isset($_POST['userName']) ? $_POST['userName'] : null;
$userName = trim($userName);

$userMobileNumber = isset($_POST['userMobileNumber']) ? $_POST['userMobileNumber'] : null;
$userMobileNumber = trim($userMobileNumber);

$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : null;
$userEmail = trim($userEmail);

$userAddress = isset($_POST['userAddress']) ? $_POST['userAddress'] : null;
$userAddress = trim($userAddress);


$userImageCh = $_FILES['userImage']['name'];
$userImage = time()."_".$userImageCh;
$userImageTemp = $_FILES['userImage']['tmp_name'];
/*****************************************************************************************/


if($userId!=""){
    //if we found token and userid
    $run = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
    $count = mysqli_num_rows($run);
    if($count>0){
        //if count is one 
        if($userName!="" || $userEmail!="" ||  $userAddress!="" || $userImage!="" || $userMobileNumber!=""){
            
            if($userImageCh==""){
                $updateProfile = mysqli_query($con,"UPDATE `saarUsersAuth` SET `userName`='$userName',`userEmail`='$userEmail',`userMobileNumber`='$userMobileNumber',`userAddress`='$userAddress' WHERE `userId`='$userId'");
                if($updateProfile){
                    //if query is run
                    $userData = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
                    $countSec = mysqli_num_rows($userData);
                    while($getUser = mysqli_fetch_assoc($userData)){
                        $responseData[] = $getUser;
                    }
                   $response = array('status'=>array('code'=>'sucess','message'=>'successfuly'),'msg'=>'आपका डेटा अपडेट हो गया है |','response'=>'200','responseData'=>$responseData); 
                   print_r(json_encode($response));
                }else{
                    //if query is not run
                    $response = array('status'=>array('code'=>'sucess','message'=>'Data is Not Update'),'msg'=>'आपका डेटा अपडेट नहीं हुआ है |','response'=>'200','responseData'=>$responseData); 
                    print_r(json_encode($response));
                }
            }else{
                 //check details not empty
                $getOldData = mysqli_fetch_assoc($run);
                $oldUsersImage = $getOldData['userImage'];
                unlink("../../assets/users_images/$oldUsersImage");
                
                $updateProfile = mysqli_query($con,"UPDATE `saarUsersAuth` SET `userName`='$userName',`userEmail`='$userEmail',`userMobileNumber`='$userMobileNumber',`userAddress`='$userAddress',`userImage`='$userImage' WHERE `userId`='$userId'");
                
                if($updateProfile){
                    //if query is run
                    move_uploaded_file($userImageTemp,"../../assets/users_images/$userImage");
                    
                    $userData = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
                    $countSec = mysqli_num_rows($userData);
                    while($getUser = mysqli_fetch_assoc($userData)){
                        $responseData[] = $getUser;
                    }
                   $response = array('status'=>array('code'=>'sucess','message'=>'successfuly'),'msg'=>'आपका डेटा अपडेट हो गया है |','response'=>'200','responseData'=>$responseData); 
                   print_r(json_encode($response));
                }else{
                    //if query is not run
                    $response = array('status'=>array('code'=>'sucess','message'=>'Data is Not Update'),'msg'=>'आपका डेटा अपडेट नहीं हुआ है |','response'=>'200','responseData'=>$responseData); 
                    print_r(json_encode($response));
                }   
            }

        }else{
            //data is empty
            $response = array('status'=>array('code'=>'sucess','message'=>'सारी जानकारी पूर्ण करे'),'response'=>'200','responseData'=>$responseData); 
            print_r(json_encode($response));
        }

    }else{
        //if count is 0
        $response = array('status'=>array('code'=>'sucess','message'=>'आप की जानकारी उपलब्ध नहीं है'),'response'=>'200','responseData'=>$responseData); 
        print_r(json_encode($response));
    }
}else{
    //if we found null mobile and userid
    $response = array('status'=>array('code'=>'sucess','message'=>'Please enter UserId '),'response'=>'200','responseData'=>$responseData); 
    print_r(json_encode($response));

}

mysqli_close($con);


?>