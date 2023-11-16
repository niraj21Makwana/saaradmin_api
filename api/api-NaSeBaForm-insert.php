<?php
include('../assets/includes/connection.php');
include('naseba-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $nasebaPrakNumber = isset($_POST['nasebaPrakNumber']) ? $_POST['nasebaPrakNumber'] : null;
    $nasebaPrakNumber = trim($nasebaPrakNumber);

    $nasebaAavedakName = isset($_POST['nasebaAavedakName']) ? $_POST['nasebaAavedakName'] : null;
    $nasebaAavedakName = trim($nasebaAavedakName);
    
    $nasebaAavedakAddress = isset($_POST['nasebaAavedakAddress']) ? $_POST['nasebaAavedakAddress'] : null;
    $nasebaAavedakAddress = trim($nasebaAavedakAddress);
    
    $nasebaBEAddress = isset($_POST['nasebaBEAddress']) ? $_POST['nasebaBEAddress'] : null;
    $nasebaBEAddress = trim($nasebaBEAddress);
    
    $nasebaBServeNumber = isset($_POST['nasebaBServeNumber']) ? $_POST['nasebaBServeNumber'] : null;
    $nasebaBServeNumber = trim($nasebaBServeNumber);

    $nasebaKulServeNumber = isset($_POST['nasebaKulServeNumber']) ? $_POST['nasebaKulServeNumber'] : null;
    $nasebaKulServeNumber = trim($nasebaKulServeNumber);
    
    $nasebaRakba = isset($_POST['nasebaRakba']) ? $_POST['nasebaRakba'] : null;
    $nasebaRakba = trim($nasebaRakba);
    
    $nasebaPatwariHalkNum = isset($_POST['nasebaPatwariHalkNum']) ? $_POST['nasebaPatwariHalkNum'] : null;
    $nasebaPatwariHalkNum = trim($nasebaPatwariHalkNum);
    
    $nasebaTappa = isset($_POST['nasebaTappa']) ? $_POST['nasebaTappa'] : null;
    $nasebaTappa = trim($nasebaTappa);

    $nasebaTehsil = isset($_POST['nasebaTehsil']) ? $_POST['nasebaTehsil'] : null;
    $nasebaTehsil = trim($nasebaTehsil);
    
    $nasebaJhila = isset($_POST['nasebaJhila']) ? $_POST['nasebaJhila'] : null;
    $nasebaJhila = trim($nasebaJhila);
    
    $nasebaCourt = isset($_POST['nasebaCourt']) ? $_POST['nasebaCourt'] : null;
    $nasebaCourt = trim($nasebaCourt);
    
    $nasebaId = "saar_".uniqid();
    
    if($userId!="" && $nasebaAavedakName!="" && $nasebaAavedakAddress!="" && $nasebaBEAddress!="" && $nasebaBServeNumber!="" && $nasebaKulServeNumber!="" && $nasebaRakba!="" && $nasebaTehsil!=""  && $nasebaJhila!="" && $nasebaCourt!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_nabalikSeBalik`(`userId`, `mobileNumber`, `nasebaId`,`nasebaPrakNumber` ,`nasebaAavedakName`, `nasebaAavedakAddress`, `nasebaBEAddress`, `nasebaBServeNumber`, `nasebaKulServeNumber`, `nasebaRakba`,`nasebaPatwariHalkNum`,`nasebaTappa`, `nasebaTehsil`, `nasebaJhila`, `nasebaCourt`) VALUES ('$userId','$mobileNumber','$nasebaId','$nasebaPrakNumber','$nasebaAavedakName','$nasebaAavedakAddress','$nasebaBEAddress','$nasebaBServeNumber','$nasebaKulServeNumber','$nasebaRakba','$nasebaPatwariHalkNum','$nasebaTappa','$nasebaTehsil','$nasebaJhila','$nasebaCourt')");
            if($insertFormData){
                // if the query is run
                if($userType=="Normal"){
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_nabalikSeBalik` WHERE `nasebaId`='$nasebaId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['nasebaId'];
                             generateNasebaFormNormal($con,$dataIdWith);
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
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_nabalikSeBalik` WHERE `nasebaId`='$nasebaId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['nasebaId'];
                             generateNasebaForm($con,$dataIdWith);
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