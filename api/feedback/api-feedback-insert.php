<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $feedbackUsername = isset($_POST['feedbackUsername']) ? $_POST['feedbackUsername'] : null;
    $feedbackUsername=trim(ucwords($feedbackUsername));

    $feedbackMobileNumber = isset($_POST['feedbackMobileNumber']) ? $_POST['feedbackMobileNumber'] : null;
    $feedbackMobileNumber=trim($feedbackMobileNumber);
    
     $feedbackEmailId = isset($_POST['feedbackEmailId']) ? $_POST['feedbackEmailId'] : null;
    $feedbackEmailId=trim($feedbackEmailId);
    
    $feedbackDescription = isset($_POST['feedbackDescription']) ? $_POST['feedbackDescription'] : null;
    $feedbackDescription=trim($feedbackDescription);
    
    $feedbackId = "as_".uniqid();
    
    // $imgget =	$_FILES['feedbackImage']['name'];
    // $feedbackImage = time()."_".$imgget;
    // $feedbackImageTemp = $_FILES['feedbackImage']['tmp_name'];
    
    if($feedbackUsername!="" && $feedbackDescription!="" && $feedbackMobileNumber!="" && $feedbackEmailId!=""){
    // if data is Present
            $secandQuery = mysqli_query($con,"INSERT INTO `saar_feedback`(`feedbackId`,  `feedbackUsername`, `feedbackMobileNumber`,`feedbackEmailId`, `feedbackDescription`) VALUES ('$feedbackId','$feedbackUsername','$feedbackMobileNumber','$feedbackEmailId','$feedbackDescription')");
            if($secandQuery){
                // $userFolderPath = '../../assets/feedback_images';
                
                // $feedbackImagePath = $userFolderPath . '/' .$feedbackImage;
                // $upload = move_uploaded_file($feedbackImageTemp,$feedbackImagePath);
                
                $thirdQuery = mysqli_query($con,"SELECT * FROM `saar_feedback` WHERE `feedbackMobileNumber`='$feedbackMobileNumber'");
                $thirdCount = mysqli_num_rows($thirdQuery);
                
                if($thirdCount>0){
                    // if count > 0
                 while($getAllData = mysqli_fetch_assoc($thirdQuery)){
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
                //if query faild
                    $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'Internal Query Error'),'response'=>$responseData);
                    print_r(json_encode($response));
            }
            
    }else{
         // Empty data error
        $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'Empty data'),'response'=>$responseData);
        print_r(json_encode($response));
    }
    
mysqli_close($con)

?>


                   
                    
                    