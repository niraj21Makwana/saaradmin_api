<?php
include('../assets/includes/connection.php');
include('diversion-maang.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    // $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $diversionPrakranNumber = isset($_POST['diversionPrakranNumber']) ? $_POST['diversionPrakranNumber'] : null;
    $diversionPrakranNumber = trim($diversionPrakranNumber);
    
    $diversionAvedakName = isset($_POST['diversionAvedakName']) ? $_POST['diversionAvedakName'] : null;
    $diversionAvedakName = trim($diversionAvedakName);
    
    $diversionAvedakAddress = isset($_POST['diversionAvedakAddress']) ? $_POST['diversionAvedakAddress'] : null;
    $diversionAvedakAddress = trim($diversionAvedakAddress);
    
    $diversionBSAddress = isset($_POST['diversionBSAddress']) ? $_POST['diversionBSAddress'] : null;
    $diversionBSAddress = trim($diversionBSAddress);

    $diversionServeNumber = isset($_POST['diversionServeNumber']) ? $_POST['diversionServeNumber'] : null;
    $diversionServeNumber = trim($diversionServeNumber);
    
    $diversionRakba = isset($_POST['diversionRakba']) ? $_POST['diversionRakba'] : null;
    $diversionRakba = trim($diversionRakba);
    
    $diversionTappa = isset($_POST['diversionTappa']) ? $_POST['diversionTappa'] : null;
    $diversionTappa = trim($diversionTappa);
    
    $diversionTahsil = isset($_POST['diversionTahsil']) ? $_POST['diversionTahsil'] : null;
    $diversionTahsil = trim($diversionTahsil);

    $diversionDistrict = isset($_POST['diversionDistrict']) ? $_POST['diversionDistrict'] : null;
    $diversionDistrict = trim($diversionDistrict);
    
    $diversionCourt = isset($_POST['diversionCourt']) ? $_POST['diversionCourt'] : null;
    $diversionCourt = trim($diversionCourt);
    
    $diversionMoney = isset($_POST['diversionMoney']) ? $_POST['diversionMoney'] : null;
    $diversionMoney = trim($diversionMoney);
    
    $diversionId = "saar".uniqid();
    
    if($userId!="" && $diversionMoney!="" && $diversionCourt!="" && $diversionDistrict!="" && $diversionTahsil!="" && $diversionRakba!="" && $diversionServeNumber!="" && $diversionBSAddress!="" && $diversionAvedakAddress!="" && $diversionAvedakName!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_diversion_maang`(`userId`,`mobileNumber`,`diversionId`, `diversionPrakranNumber`, `diversionAvedakName`, `diversionAvedakAddress`, `diversionBSAddress`, `diversionServeNumber`, `diversionRakba`,`diversionTappa`,`diversionTahsil`, `diversionDistrict`, `diversionCourt`, `diversionMoney`) VALUES ('$userId','$mobileNumber','$diversionId','$diversionPrakranNumber','$diversionAvedakName','$diversionAvedakAddress','$diversionBSAddress','$diversionServeNumber','$diversionRakba','$diversionTappa','$diversionTahsil','$diversionDistrict','$diversionCourt','$diversionMoney')");
            if($insertFormData){
                // if the query is run
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_diversion_maang` WHERE `diversionId`='$diversionId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['diversionId'];
                             generateDiversionForm($con,$dataIdWith);
                                $responseData[] = $getAllData;
                            }
                            $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'फॉर्म जमा किया जा चूका','m'=>$dataIdWith,'response'=>$responseData);
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