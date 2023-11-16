<?php
include('../assets/includes/connection.php');
 include('batankan-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $batankanPNumber = isset($_POST['batankanPNumber']) ? $_POST['batankanPNumber'] : null;
    $batankanPNumber = trim($batankanPNumber);
    
    $batankanAvedakName = isset($_POST['batankanAvedakName']) ? $_POST['batankanAvedakName'] : null;
    $batankanAvedakName = trim($batankanAvedakName);
    
    $batankanAvedakAddress = isset($_POST['batankanAvedakAddress']) ? $_POST['batankanAvedakAddress'] : null;
    $batankanAvedakAddress = trim($batankanAvedakAddress);
    
    $batankanAnAvedakName = isset($_POST['batankanAnAvedakName']) ? $_POST['batankanAnAvedakName'] : null;
    $batankanAnAvedakName = trim($batankanAnAvedakName);

    $batankanAnAvedakAddress = isset($_POST['batankanAnAvedakAddress']) ? $_POST['batankanAnAvedakAddress'] : null;
    $batankanAnAvedakAddress = trim($batankanAnAvedakAddress);
    
    $batankanBTKAddress = isset($_POST['batankanBTKAddress']) ? $_POST['batankanBTKAddress'] : null;
    $batankanBTKAddress = trim($batankanBTKAddress);

    $batankanServeNumber = isset($_POST['batankanServeNumber']) ? $_POST['batankanServeNumber'] : null;
    $batankanServeNumber = trim($batankanServeNumber);
    
    $batankanKulServeNumber = isset($_POST['batankanKulServeNumber']) ? $_POST['batankanKulServeNumber'] : null;
    $batankanKulServeNumber = trim($batankanKulServeNumber);
    
    $batankanRakba = isset($_POST['batankanRakba']) ? $_POST['batankanRakba'] : null;
    $batankanRakba = trim($batankanRakba);
    
    $batankanPatwariHalkNum = isset($_POST['batankanPatwariHalkNum']) ? $_POST['batankanPatwariHalkNum'] : null;
    $batankanPatwariHalkNum = trim($batankanPatwariHalkNum);
    
    $batankanTappa = isset($_POST['batankanTappa']) ? $_POST['batankanTappa'] : null;
    $batankanTappa = trim($batankanTappa);
    
    $batankanTahsil = isset($_POST['batankanTahsil']) ? $_POST['batankanTahsil'] : null;
    $batankanTahsil = trim($batankanTahsil);
    
    $batankanJila = isset($_POST['batankanJila']) ? $_POST['batankanJila'] : null;
    $batankanJila = trim($batankanJila);
    
    $batankanCourt = isset($_POST['batankanCourt']) ? $_POST['batankanCourt'] : null;
    $batankanCourt = trim($batankanCourt);
    
    $batankanId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($batankanAvedakName!="" && $batankanAvedakAddress!="" && $batankanBTKAddress!="" && $batankanServeNumber!="" && $batankanKulServeNumber!=""  && $batankanRakba!="" && $batankanTahsil!="" && $batankanJila!="" && $batankanCourt!=""){
                
                if($batankanAnAvedakName==""){
                    $batankanEnAvedakName="मध्य प्रदेश शासन";
                    $insertFormData = mysqli_query($con,"INSERT INTO `saar_batankan`(`userId`, `mobileNumber`, `batankanId`, `batankanPNumber`, `batankanAvedakName`, `batankanAvedakAddress`, `batankanAnAvedakName`, `batankanAnAvedakAddress`, `batankanBTKAddress`, `batankanServeNumber`, `batankanKulServeNumber`, `batankanRakba`,`batankanPatwariHalkNum`,`batankanTappa`,`batankanTahsil`, `batankanJila`, `batankanCourt`) VALUES ('$userId','$mobileNumber','$batankanId','$batankanPNumber','$batankanAvedakName','$batankanAvedakAddress','$batankanEnAvedakName','$batankanAnAvedakAddress','$batankanBTKAddress','$batankanServeNumber','$batankanKulServeNumber','$batankanRakba','$batankanPatwariHalkNum','$batankanTappa','$batankanTahsil','$batankanJila','$batankanCourt')");
                }else{
                    $insertFormData = mysqli_query($con,"INSERT INTO `saar_batankan`(`userId`, `mobileNumber`, `batankanId`, `batankanPNumber`, `batankanAvedakName`, `batankanAvedakAddress`, `batankanAnAvedakName`, `batankanAnAvedakAddress`, `batankanBTKAddress`, `batankanServeNumber`, `batankanKulServeNumber`, `batankanRakba`,`batankanPatwariHalkNum`,`batankanTappa`, `batankanTahsil`, `batankanJila`, `batankanCourt`) VALUES ('$userId','$mobileNumber','$batankanId','$batankanPNumber','$batankanAvedakName','$batankanAvedakAddress','$batankanAnAvedakName','$batankanAnAvedakAddress','$batankanBTKAddress','$batankanServeNumber','$batankanKulServeNumber','$batankanRakba','$batankanPatwariHalkNum','$batankanTappa','$batankanTahsil','$batankanJila','$batankanCourt')");
                }

                if($insertFormData){
                    // if the query is run
                    if($userType=="Normal"){
                             $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_batankan` WHERE `batankanId`='$batankanId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['batankanId'];
                                     generatebatankanFormNormal($con,$dataIdWith);   
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
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_batankan` WHERE `batankanId`='$batankanId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['batankanId'];
                                     generatebatankanForm($con,$dataIdWith);   
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