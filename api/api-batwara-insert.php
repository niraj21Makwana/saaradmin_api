<?php
include('../assets/includes/connection.php');
include('batwara-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $batwaraParNumber = isset($_POST['batwaraParNumber']) ? $_POST['batwaraParNumber'] : null;
    $batwaraParNumber = trim($batwaraParNumber);
    
    $batwaraAvedakName = isset($_POST['batwaraAvedakName']) ? $_POST['batwaraAvedakName'] : null;
    $batwaraAvedakName = trim($batwaraAvedakName);
    
    $batwaraAvedakAddress = isset($_POST['batwaraAvedakAddress']) ? $_POST['batwaraAvedakAddress'] : null;
    $batwaraAvedakAddress = trim($batwaraAvedakAddress);
    
    $batwaraEnAvedakName = isset($_POST['batwaraEnAvedakName']) ? $_POST['batwaraEnAvedakName'] : null;
    $batwaraEnAvedakName = trim($batwaraEnAvedakName);

    $batwaraEnAvedakAddress = isset($_POST['batwaraEnAvedakAddress']) ? $_POST['batwaraEnAvedakAddress'] : null;
    $batwaraEnAvedakAddress = trim($batwaraEnAvedakAddress);
    
    $batwaraDhara = isset($_POST['batwaraDhara']) ? $_POST['batwaraDhara'] : null;
    $batwaraDhara = trim($batwaraDhara);
    
    $batwaraBTAddress = isset($_POST['batwaraBTAddress']) ? $_POST['batwaraBTAddress'] : null;
    $batwaraBTAddress = trim($batwaraBTAddress);

    $batwaraServeNumber = isset($_POST['batwaraServeNumber']) ? $_POST['batwaraServeNumber'] : null;
    $batwaraServeNumber = trim($batwaraServeNumber);
    
    $batwaraKulServeNumber = isset($_POST['batwaraKulServeNumber']) ? $_POST['batwaraKulServeNumber'] : null;
    $batwaraKulServeNumber = trim($batwaraKulServeNumber);
    
    $batwaraRakba = isset($_POST['batwaraRakba']) ? $_POST['batwaraRakba'] : null;
    $batwaraRakba = trim($batwaraRakba);
    
    $batwaraPatwariHalkNum = isset($_POST['batwaraPatwariHalkNum']) ? $_POST['batwaraPatwariHalkNum'] : null;
    $batwaraPatwariHalkNum = trim($batwaraPatwariHalkNum);
    
    $batwaraTappa = isset($_POST['batwaraTappa']) ? $_POST['batwaraTappa'] : null;
    $batwaraTappa = trim($batwaraTappa);
    
    $batwaraTahsil = isset($_POST['batwaraTahsil']) ? $_POST['batwaraTahsil'] : null;
    $batwaraTahsil = trim($batwaraTahsil);
    
    $batwaraJilla = isset($_POST['batwaraJilla']) ? $_POST['batwaraJilla'] : null;
    $batwaraJilla = trim($batwaraJilla);
    
    $batwaraCourt = isset($_POST['batwaraCourt']) ? $_POST['batwaraCourt'] : null;
    $batwaraCourt = trim($batwaraCourt);
    
    $batwaraId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($batwaraAvedakName!="" && $batwaraAvedakAddress!="" && $batwaraBTAddress!="" && $batwaraServeNumber!="" && $batwaraKulServeNumber!=""  && $batwaraRakba!="" && $batwaraTahsil!="" && $batwaraJilla!="" && $batwaraCourt!=""){
               
              if($batwaraDhara=="परिवार"){
                    $batwaraDharaI = "178";
                }else if($batwaraDhara=="परिवार के साथ"){
                    $batwaraDharaI = "178 एवं 178(क)";
                }
                
                if($batwaraEnAvedakName=="" || $batwaraDhara==""){
                    $batwaraAvAvedakName="मध्य प्रदेश शासन";
                     $batwaraDharaI = "178";
                     $insertFormData = mysqli_query($con,"INSERT INTO `saar_batwara`(`userId`, `mobileNumber`, `batwaraId`, `batwaraParNumber`, `batwaraAvedakName`, `batwaraAvedakAddress`, `batwaraEnAvedakName`, `batwaraEnAvedakAddress`, `batwaraDhara`, `batwaraBTAddress`, `batwaraServeNumber`, `batwaraKulServeNumber`, `batwaraRakba`, `batwaraKulRakba`,`batwaraPatwariHalkNum`,`batwaraTappa`,`batwaraTahsil`, `batwaraJilla`, `batwaraCourt`) VALUES ('$userId','$mobileNumber','$batwaraId','$batwaraParNumber','$batwaraAvedakName','$batwaraAvedakAddress','$batwaraAvAvedakName','$batwaraEnAvedakAddress','$batwaraDharaI','$batwaraBTAddress','$batwaraServeNumber','$batwaraKulServeNumber','$batwaraRakba','$batwaraKulRakba','$batwaraPatwariHalkNum','$batwaraTappa','$batwaraTahsil','$batwaraJilla','$batwaraCourt')");
                }else{
                     $insertFormData = mysqli_query($con,"INSERT INTO `saar_batwara`(`userId`, `mobileNumber`, `batwaraId`, `batwaraParNumber`, `batwaraAvedakName`, `batwaraAvedakAddress`, `batwaraEnAvedakName`, `batwaraEnAvedakAddress`, `batwaraDhara`,`batwaraBTAddress`, `batwaraServeNumber`, `batwaraKulServeNumber`, `batwaraRakba`, `batwaraKulRakba`,`batwaraPatwariHalkNum`,`batwaraTappa`, `batwaraTahsil`, `batwaraJilla`, `batwaraCourt`) VALUES ('$userId','$mobileNumber','$batwaraId','$batwaraParNumber','$batwaraAvedakName','$batwaraAvedakAddress','$batwaraEnAvedakName','$batwaraEnAvedakAddress','$batwaraDharaI','$batwaraBTAddress','$batwaraServeNumber','$batwaraKulServeNumber','$batwaraRakba','$batwaraKulRakba','$batwaraPatwariHalkNum','$batwaraTappa','$batwaraTahsil','$batwaraJilla','$batwaraCourt')");
                }
                if($insertFormData){
                    // if the query is run
                    if($userType=="Normal"){
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_batwara` WHERE `batwaraId`='$batwaraId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['batwaraId'];
                                  generatebatwaraFormNormal($con,$dataIdWith);   
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
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_batwara` WHERE `batwaraId`='$batwaraId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['batwaraId'];
                                  generatebatwaraForm($con,$dataIdWith);   
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