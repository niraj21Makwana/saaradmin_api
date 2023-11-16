<?php
include('../assets/includes/connection.php');
include('kabjaVsimankan-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $kabjaVsPraNumber = isset($_POST['kabjaVsPraNumber']) ? $_POST['kabjaVsPraNumber'] : null;
    $kabjaVsPraNumber = trim($kabjaVsPraNumber);

    $kabjaVSAvedakName = isset($_POST['kabjaVSAvedakName']) ? $_POST['kabjaVSAvedakName'] : null;
    $kabjaVSAvedakName = trim($kabjaVSAvedakName);
    
    $kabjaVSAvedakAddress = isset($_POST['kabjaVSAvedakAddress']) ? $_POST['kabjaVSAvedakAddress'] : null;
    $kabjaVSAvedakAddress = trim($kabjaVSAvedakAddress);
    
    $kabjaVSBSTAddress = isset($_POST['kabjaVSBSTAddress']) ? $_POST['kabjaVSBSTAddress'] : null;
    $kabjaVSBSTAddress = trim($kabjaVSBSTAddress);
    
    $kabjaVSBSNumber = isset($_POST['kabjaVSBSNumber']) ? $_POST['kabjaVSBSNumber'] : null;
    $kabjaVSBSNumber = trim($kabjaVSBSNumber);

    $kabjaVSBSNumberKul = isset($_POST['kabjaVSBSNumberKul']) ? $_POST['kabjaVSBSNumberKul'] : null;
    $kabjaVSBSNumberKul = trim($kabjaVSBSNumberKul);
    
    $kabjaVSRakba = isset($_POST['kabjaVSRakba']) ? $_POST['kabjaVSRakba'] : null;
    $kabjaVSRakba = trim($kabjaVSRakba);

    $kabjaVSTappa = isset($_POST['kabjaVSTappa']) ? $_POST['kabjaVSTappa'] : null;
    $kabjaVSTappa = trim($kabjaVSTappa);
    
    $kabjaVStahsil = isset($_POST['kabjaVStahsil']) ? $_POST['kabjaVStahsil'] : null;
    $kabjaVStahsil = trim($kabjaVStahsil);
    
    $kabjaVSJilla = isset($_POST['kabjaVSJilla']) ? $_POST['kabjaVSJilla'] : null;
    $kabjaVSJilla = trim($kabjaVSJilla);
    
    $kabjaVSCourt = isset($_POST['kabjaVSCourt']) ? $_POST['kabjaVSCourt'] : null;
    $kabjaVSCourt = trim($kabjaVSCourt);
    
    $kabjaVSTotalServeNumberDes = isset($_POST['kabjaVSTotalServeNumberDes']) ? $_POST['kabjaVSTotalServeNumberDes'] : null;
    $kabjaVSTotalServeNumberDes = trim($kabjaVSTotalServeNumberDes);
    
    $kabjaVSPatwariHalkaNumber = isset($_POST['kabjaVSPatwariHalkaNumber']) ? $_POST['kabjaVSPatwariHalkaNumber'] : null;
    $kabjaVSPatwariHalkaNumber = trim($kabjaVSPatwariHalkaNumber);
    
    $kabjaVSRajesvi = isset($_POST['kabjaVSRajesvi']) ? $_POST['kabjaVSRajesvi'] : null;
    $kabjaVSRajesvi = trim($kabjaVSRajesvi);
    
    $kabjaVSAdeshNumber = isset($_POST['kabjaVSAdeshNumber']) ? $_POST['kabjaVSAdeshNumber'] : null;
    $kabjaVSAdeshNumber = trim($kabjaVSAdeshNumber);
    
    $kabjaVSAdeshDate = isset($_POST['kabjaVSAdeshDate']) ? $_POST['kabjaVSAdeshDate'] : null;
    $kabjaVSAdeshDate = trim($kabjaVSAdeshDate);
    
    $kabjaVSId = "saar_".uniqid();
    
    if($userId!="" && $kabjaVSAvedakName!="" && $kabjaVSAvedakAddress!="" && $kabjaVSBSTAddress!="" && $kabjaVSBSNumber!="" && $kabjaVSBSNumberKul!="" && $kabjaVSRakba!="" && $kabjaVStahsil!="" && $kabjaVSJilla!="" && $kabjaVSCourt!="" && $kabjaVSTotalServeNumberDes!="" && $kabjaVSPatwariHalkaNumber!="" && $kabjaVSRajesvi!=""  && $kabjaVSAdeshNumber!=""  && $kabjaVSAdeshDate!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_kabjaVsimankan`(`userId`, `mobileNumber`, `kabjaVSId`,`kabjaVsPraNumber` ,`kabjaVSAvedakName`, `kabjaVSAvedakAddress`, `kabjaVSBSTAddress`, `kabjaVSBSNumber`, `kabjaVSBSNumberKul`, `kabjaVSRakba`,`kabjaVSTappa`,`kabjaVStahsil`, `kabjaVSJilla`, `kabjaVSCourt`, `kabjaVSTotalServeNumberDes`, `kabjaVSPatwariHalkaNumber`, `kabjaVSRajesvi`, `kabjaVSAdeshNumber`, `kabjaVSAdeshDate`) VALUES ('$userId','$mobileNumber','$kabjaVSId','$kabjaVsPraNumber','$kabjaVSAvedakName','$kabjaVSAvedakAddress','$kabjaVSBSTAddress','$kabjaVSBSNumber','$kabjaVSBSNumberKul','$kabjaVSRakba','$kabjaVSTappa','$kabjaVStahsil','$kabjaVSJilla','$kabjaVSCourt','$kabjaVSTotalServeNumberDes','$kabjaVSPatwariHalkaNumber','$kabjaVSRajesvi','$kabjaVSAdeshNumber','$kabjaVSAdeshDate')");
            
            if($insertFormData){
                // if the query is run
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_kabjaVsimankan` WHERE `kabjaVSId`='$kabjaVSId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['kabjaVSId'];
                             generatekabjaVsimankanForm($con,$dataIdWith);
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