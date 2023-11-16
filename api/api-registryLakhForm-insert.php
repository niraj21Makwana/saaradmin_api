<?php
include('../assets/includes/connection.php');
 include('registry-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $registryParNumber = isset($_POST['registryParNumber']) ? $_POST['registryParNumber'] : null;
    $registryParNumber = trim($registryParNumber);
    
    $registryAvedakName = isset($_POST['registryAvedakName']) ? $_POST['registryAvedakName'] : null;
    $registryAvedakName = trim($registryAvedakName);
    
    $registryAvedakAddress = isset($_POST['registryAvedakAddress']) ? $_POST['registryAvedakAddress'] : null;
    $registryAvedakAddress = trim($registryAvedakAddress);
    
    $registryEnAvedakName = isset($_POST['registryEnAvedakName']) ? $_POST['registryEnAvedakName'] : null;
    $registryEnAvedakName = trim($registryEnAvedakName);

    $registryEnAvedakAddress = isset($_POST['registryEnAvedakAddress']) ? $_POST['registryEnAvedakAddress'] : null;
    $registryEnAvedakAddress = trim($registryEnAvedakAddress);
    
    $registryVikrayNumber = isset($_POST['registryVikrayNumber']) ? $_POST['registryVikrayNumber'] : null;
    $registryVikrayNumber = trim($registryVikrayNumber);
    
    $registryDate = isset($_POST['registryDate']) ? $_POST['registryDate'] : null;
    $registryDate = trim($registryDate);

    $registryBTAddress = isset($_POST['registryBTAddress']) ? $_POST['registryBTAddress'] : null;
    $registryBTAddress = trim($registryBTAddress);
    
    $registryBServeNumber = isset($_POST['registryBServeNumber']) ? $_POST['registryBServeNumber'] : null;
    $registryBServeNumber = trim($registryBServeNumber);
    
    $registryKulBServeNumber = isset($_POST['registryKulBServeNumber']) ? $_POST['registryKulBServeNumber'] : null;
    $registryKulBServeNumber = trim($registryKulBServeNumber);
    
    $registryRakba = isset($_POST['registryRakba']) ? $_POST['registryRakba'] : null;
    $registryRakba = trim($registryRakba);
    
    $registryAvedakType = isset($_POST['registryAvedakType']) ? $_POST['registryAvedakType'] : null;
    $registryAvedakType = trim($registryAvedakType);
    
    $registryEnAvedakType = isset($_POST['registryEnAvedakType']) ? $_POST['registryEnAvedakType'] : null;
    $registryEnAvedakType = trim($registryEnAvedakType);
    
    $registryLakhType = isset($_POST['registryLakhType']) ? $_POST['registryLakhType'] : null;
    $registryLakhType = trim($registryLakhType);
    
    $registryPatwariHalkNum = isset($_POST['registryPatwariHalkNum']) ? $_POST['registryPatwariHalkNum'] : null;
    $registryPatwariHalkNum = trim($registryPatwariHalkNum);
    
    $registryTappa = isset($_POST['registryTappa']) ? $_POST['registryTappa'] : null;
    $registryTappa = trim($registryTappa);
    
    $registryTahsil = isset($_POST['registryTahsil']) ? $_POST['registryTahsil'] : null;
    $registryTahsil = trim($registryTahsil);
    
    $registryJilla = isset($_POST['registryJilla']) ? $_POST['registryJilla'] : null;
    $registryJilla = trim($registryJilla);
    
    $registryCourt = isset($_POST['registryCourt']) ? $_POST['registryCourt'] : null;
    $registryCourt = trim($registryCourt);
    
    $registryBandhak = isset($_POST['registryBandhak']) ? $_POST['registryBandhak'] : null;
    $registryBandhak = trim($registryBandhak);
    
    $registryAadeshType = isset($_POST['registryAadeshType']) ? $_POST['registryAadeshType'] : null;
    $registryAadeshType = trim($registryAadeshType);
    
    $registryId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($registryAvedakName!="" && $registryAvedakAddress!="" && $registryEnAvedakName!="" && $registryEnAvedakAddress!="" && $registryVikrayNumber!="" && $registryDate!="" && $registryBTAddress!="" && $registryBServeNumber!="" && $registryKulBServeNumber!="" && $registryRakba!="" && $registryAvedakType!="" && $registryEnAvedakType!="" && $registryLakhType!="" && $registryTahsil!="" && $registryJilla!="" && $registryCourt!="" && $registryBandhak!="" && $registryAadeshType!=""){
                
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_registry`(`userId`, `mobileNumber`, `registryId`, `registryParNumber`, `registryAvedakName`, `registryAvedakAddress`, `registryEnAvedakName`, `registryEnAvedakAddress`, `registryVikrayNumber`, `registryDate`, `registryBTAddress`, `registryBServeNumber`, `registryKulBServeNumber`, `registryRakba`, `registryAvedakType`, `registryEnAvedakType`, `registryLakhType`,`registryPatwariHalkNum`,`registryTappa`, `registryTahsil`, `registryJilla`, `registryCourt`, `registryBandhak`, `registryAadeshType`) VALUES ('$userId','$mobileNumber','$registryId','$registryParNumber','$registryAvedakName','$registryAvedakAddress','$registryEnAvedakName','$registryEnAvedakAddress','$registryVikrayNumber','$registryDate','$registryBTAddress','$registryBServeNumber','$registryKulBServeNumber','$registryRakba','$registryAvedakType','$registryEnAvedakType','$registryLakhType','$registryPatwariHalkNum','$registryTappa','$registryTahsil','$registryJilla','$registryCourt','$registryBandhak','$registryAadeshType')");
            
            if($insertFormData){
                // if the query is run
                if($userType=="Normal"){
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_registry` WHERE `registryId`='$registryId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['registryId'];
                            generateRegistryFormNormal($con,$dataIdWith);
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
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_registry` WHERE `registryId`='$registryId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['registryId'];
                            generateRegistryForm($con,$dataIdWith);
                                $responseData[] = $getAllData;
                            }
                            $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'फॉर्म जमा किया जा चूका','m'=>$dataIdWith,'response'=>$responseData);
                            print_r(json_encode($response));
                        }else{
                            // if count < 1
                            $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'data not Found'),'response'=>$responseData);
                            print_r(json_encode($response));   
                        }
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