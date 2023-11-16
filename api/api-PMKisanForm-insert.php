<?php
include('../assets/includes/connection.php');
include('PmKissan-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    // $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $PMSamanAvedakName = isset($_POST['PMSamanAvedakName']) ? $_POST['PMSamanAvedakName'] : null;
    $PMSamanAvedakName = trim($PMSamanAvedakName);
    
    $PMSamanAavedakAddress = isset($_POST['PMSamanAavedakAddress']) ? $_POST['PMSamanAavedakAddress'] : null;
    $PMSamanAavedakAddress = trim($PMSamanAavedakAddress);
    
    $PMSamanTehsil = isset($_POST['PMSamanTehsil']) ? $_POST['PMSamanTehsil'] : null;
    $PMSamanTehsil = trim($PMSamanTehsil);
    
    $PMSamanJhila = isset($_POST['PMSamanJhila']) ? $_POST['PMSamanJhila'] : null;
    $PMSamanJhila = trim($PMSamanJhila);

    $PMSamanCourt = isset($_POST['PMSamanCourt']) ? $_POST['PMSamanCourt'] : null;
    $PMSamanCourt = trim($PMSamanCourt);
    
    $PMSamanAadharNumber = isset($_POST['PMSamanAadharNumber']) ? $_POST['PMSamanAadharNumber'] : null;
    $PMSamanAadharNumber = trim($PMSamanAadharNumber);
    
    $PMSamanPmkissanId = isset($_POST['PMSamanPmkissanId']) ? $_POST['PMSamanPmkissanId'] : null;
    $PMSamanPmkissanId = trim($PMSamanPmkissanId);

    $PMSamanbankAccNumber = isset($_POST['PMSamanbankAccNumber']) ? $_POST['PMSamanbankAccNumber'] : null;
    $PMSamanbankAccNumber = trim($PMSamanbankAccNumber);
    
    $PMSamanId = "saar_".uniqid();
    
    if($userId!="" && $PMSamanAvedakName!="" && $PMSamanAavedakAddress!="" && $PMSamanTehsil!="" && $PMSamanJhila!="" && $PMSamanCourt!="" && $PMSamanAadharNumber!="" && $PMSamanPmkissanId!="" && $PMSamanbankAccNumber!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_PMSamanNidhi`(`userId`, `mobileNumber`, `PMSamanId`, `PMSamanAvedakName`, `PMSamanAavedakAddress`, `PMSamanTehsil`, `PMSamanJhila`, `PMSamanCourt`, `PMSamanAadharNumber`, `PMSamanPmkissanId`, `PMSamanbankAccNumber`) VALUES ('$userId','$mobileNumber','$PMSamanId','$PMSamanAvedakName','$PMSamanAavedakAddress','$PMSamanTehsil','$PMSamanJhila','$PMSamanCourt','$PMSamanAadharNumber','$PMSamanPmkissanId','$PMSamanbankAccNumber')");
            if($insertFormData){
                // if the query is run
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_PMSamanNidhi` WHERE `PMSamanId`='$PMSamanId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['PMSamanId'];
                             generatePmKissanForm($con,$dataIdWith);
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