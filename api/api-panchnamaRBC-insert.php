<?php
include('../assets/includes/connection.php');
include('panchnamaRBC-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    // $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $panRBCPraNumber = isset($_POST['panRBCPraNumber']) ? $_POST['panRBCPraNumber'] : null;
    $panRBCPraNumber = trim($panRBCPraNumber);
    
    $panRBCAavedakName = isset($_POST['panRBCAavedakName']) ? $_POST['panRBCAavedakName'] : null;
    $panRBCAavedakName = trim($panRBCAavedakName);
    
    $panRBCAavedakAddress = isset($_POST['panRBCAavedakAddress']) ? $_POST['panRBCAavedakAddress'] : null;
    $panRBCAavedakAddress = trim($panRBCAavedakAddress);
    
    $panRBCGao = isset($_POST['panRBCGao']) ? $_POST['panRBCGao'] : null;
    $panRBCGao = trim($panRBCGao);
    
    $panRBCDate = isset($_POST['panRBCDate']) ? $_POST['panRBCDate'] : null;
    $panRBCDate = trim($panRBCDate);

    $panRBCPatwariHalkNum = isset($_POST['panRBCPatwariHalkNum']) ? $_POST['panRBCPatwariHalkNum'] : null;
    $panRBCPatwariHalkNum = trim($panRBCPatwariHalkNum);

    $panRBCTappa = isset($_POST['panRBCTappa']) ? $_POST['panRBCTappa'] : null;
    $panRBCTappa = trim($panRBCTappa);

    $panRBCTehsil = isset($_POST['panRBCTehsil']) ? $_POST['panRBCTehsil'] : null;
    $panRBCTehsil = trim($panRBCTehsil);
    
    $panRBCJilla = isset($_POST['panRBCJilla']) ? $_POST['panRBCJilla'] : null;
    $panRBCJilla = trim($panRBCJilla);
    
    $panRBCcourt = isset($_POST['panRBCcourt']) ? $_POST['panRBCcourt'] : null;
    $panRBCcourt = trim($panRBCcourt);

    $panRBCWallType = isset($_POST['panRBCWallType']) ? $_POST['panRBCWallType'] : null;
    $panRBCWallType = trim($panRBCWallType);
    
    $panRBCWallTotal = isset($_POST['panRBCWallTotal']) ? $_POST['panRBCWallTotal'] : null;
    $panRBCWallTotal = trim($panRBCWallTotal);
    
    $panRBCWallHeight = isset($_POST['panRBCWallHeight']) ? $_POST['panRBCWallHeight'] : null;
    $panRBCWallHeight = trim($panRBCWallHeight);

    $panRBCWallWidth = isset($_POST['panRBCWallWidth']) ? $_POST['panRBCWallWidth'] : null;
    $panRBCWallWidth = trim($panRBCWallWidth);
    
    $panRBCLoss = isset($_POST['panRBCLoss']) ? $_POST['panRBCLoss'] : null;
    $panRBCLoss = trim($panRBCLoss);
    
    $panRBCIFSC = isset($_POST['panRBCIFSC']) ? $_POST['panRBCIFSC'] : null;
    $panRBCIFSC = trim($panRBCIFSC);
    
    $panRBCAccN = isset($_POST['panRBCAccN']) ? $_POST['panRBCAccN'] : null;
    $panRBCAccN = trim($panRBCAccN);
    
    $panRBCId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($panRBCAavedakName!="" && $panRBCAavedakAddress!="" && $panRBCGao!="" && $panRBCDate!="" && $panRBCTehsil!="" && $panRBCJilla!="" && $panRBCcourt!="" && $panRBCWallType!=""  && $panRBCWallTotal!="" && $panRBCWallHeight!="" && $panRBCWallWidth!="" && $panRBCLoss!=""){
                
                $insertFormData = mysqli_query($con,"INSERT INTO `saar_panchnamaRBC`(`userId`, `mobileNumber`, `panRBCId`,`panRBCPraNumber`,`panRBCAavedakName`, `panRBCAavedakAddress`, `panRBCGao`, `panRBCDate`,`panRBCPatwariHalkNum`,`panRBCTappa`, `panRBCTehsil`, `panRBCJilla`, `panRBCcourt`, `panRBCWallType`, `panRBCWallTotal`, `panRBCWallHeight`, `panRBCWallWidth`, `panRBCLoss`,`panRBCIFSC`,`panRBCAccN`) VALUES ('$userId','$mobileNumber','$panRBCId','$panRBCPraNumber','$panRBCAavedakName','$panRBCAavedakAddress','$panRBCGao','$panRBCDate','$panRBCPatwariHalkNum','$panRBCTappa','$panRBCTehsil','$panRBCJilla','$panRBCcourt','$panRBCWallType','$panRBCWallTotal','$panRBCWallHeight','$panRBCWallWidth','$panRBCLoss','$panRBCIFSC','$panRBCAccN')");
                if($insertFormData){
                    // if the query is run
                            $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_panchnamaRBC` WHERE `panRBCId`='$panRBCId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['panRBCId'];
                                 generatePanchnamaRBCForm($con,$dataIdWith);
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