<?php
include('../assets/includes/connection.php');
include('maritakNamankan-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $maritakPraNumber = isset($_POST['maritakPraNumber']) ? $_POST['maritakPraNumber'] : null;
    $maritakPraNumber = trim($maritakPraNumber);
    
    $maritakAvedakName = isset($_POST['maritakAvedakName']) ? $_POST['maritakAvedakName'] : null;
    $maritakAvedakName = trim($maritakAvedakName);
    
    $maritakAvedakAddress = isset($_POST['maritakAvedakAddress']) ? $_POST['maritakAvedakAddress'] : null;
    $maritakAvedakAddress = trim($maritakAvedakAddress);
    
    $maritakEnavedakName = isset($_POST['maritakEnavedakName']) ? $_POST['maritakEnavedakName'] : null;
    $maritakEnavedakName = trim($maritakEnavedakName);
    
    $maritakEnavedakAddress = isset($_POST['maritakEnavedakAddress']) ? $_POST['maritakEnavedakAddress'] : null;
    $maritakEnavedakAddress = trim($maritakEnavedakAddress);

    $maritakKhateJankari = isset($_POST['maritakKhateJankari']) ? $_POST['maritakKhateJankari'] : null;
    $maritakKhateJankari = trim($maritakKhateJankari);
    
    $maritakKhateAddress = isset($_POST['maritakKhateAddress']) ? $_POST['maritakKhateAddress'] : null;
    $maritakKhateAddress = trim($maritakKhateAddress);
    
    $maritakKaName = isset($_POST['maritakKaName']) ? $_POST['maritakKaName'] : null;
    $maritakKaName = trim($maritakKaName);

    $maritakAddress = isset($_POST['maritakAddress']) ? $_POST['maritakAddress'] : null;
    $maritakAddress = trim($maritakAddress);
    
    $maritakDeathDate = isset($_POST['maritakDeathDate']) ? $_POST['maritakDeathDate'] : null;
    $maritakDeathDate = trim($maritakDeathDate);
    
    $maritakVarisJankari = isset($_POST['maritakVarisJankari']) ? $_POST['maritakVarisJankari'] : null;
    $maritakVarisJankari = trim($maritakVarisJankari);
    
    $maritakVarisAddress = isset($_POST['maritakVarisAddress']) ? $_POST['maritakVarisAddress'] : null;
    $maritakVarisAddress = trim($maritakVarisAddress);
    
    $maritakBServeAddress = isset($_POST['maritakBServeAddress']) ? $_POST['maritakBServeAddress'] : null;
    $maritakBServeAddress = trim($maritakBServeAddress);
    
    $maritakBServeNumber = isset($_POST['maritakBServeNumber']) ? $_POST['maritakBServeNumber'] : null;
    $maritakBServeNumber = trim($maritakBServeNumber);
    
    $maritakBServeKulNumber = isset($_POST['maritakBServeKulNumber']) ? $_POST['maritakBServeKulNumber'] : null;
    $maritakBServeKulNumber = trim($maritakBServeKulNumber);
    
    $maritakRakba = isset($_POST['maritakRakba']) ? $_POST['maritakRakba'] : null;
    $maritakRakba = trim($maritakRakba);
    
    $maritakTappa = isset($_POST['maritakTappa']) ? $_POST['maritakTappa'] : null;
    $maritakTappa = trim($maritakTappa);
    
    $maritakPatwariHalkNum = isset($_POST['maritakPatwariHalkNum']) ? $_POST['maritakPatwariHalkNum'] : null;
    $maritakPatwariHalkNum = trim($maritakPatwariHalkNum);
    
    $maritakTahsil = isset($_POST['maritakTahsil']) ? $_POST['maritakTahsil'] : null;
    $maritakTahsil = trim($maritakTahsil);
    
    $maritakJilla = isset($_POST['maritakJilla']) ? $_POST['maritakJilla'] : null;
    $maritakJilla = trim($maritakJilla);
    
    $maritakCourt = isset($_POST['maritakCourt']) ? $_POST['maritakCourt'] : null;
    $maritakCourt = trim($maritakCourt);
    
    $mritakId = "saar_".uniqid();
    
    if($userId!="" && $maritakAvedakName!="" && $maritakAvedakAddress!="" && $maritakKaName!="" && $maritakAddress!="" && $maritakDeathDate!="" && $maritakVarisJankari!="" && $maritakVarisAddress!="" && $maritakBServeAddress!=""  && $maritakBServeNumber!=""  && $maritakBServeKulNumber!="" && $maritakRakba!="" && $maritakTahsil!=""&& $maritakJilla!=""&& $maritakCourt!="" ){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($maritakEnavedakName==""){
                    $maritakEnAvedakName="मध्य प्रदेश शासन";
                    $insertFormData = mysqli_query($con,"INSERT INTO `saar_mritak_namantran`(`userId`, `mobileNumber`, `mritakId`,`maritakPraNumber` ,`maritakAvedakName`, `maritakAvedakAddress`, `maritakEnavedakName`, `maritakEnavedakAddress`, `maritakKhateJankari`, `maritakKhateAddress`, `maritakKaName`, `maritakAddress`, `maritakDeathDate`, `maritakVarisJankari`, `maritakVarisAddress`, `maritakBServeAddress`, `maritakBServeNumber`, `maritakBServeKulNumber`, `maritakRakba`,`maritakPatwariHalkNum`,`maritakTappa`, `maritakTahsil`, `maritakJilla`, `maritakCourt`) VALUES ('$userId','$mobileNumber','$mritakId','$maritakPraNumber','$maritakAvedakName','$maritakAvedakAddress','$maritakEnAvedakName','$maritakEnavedakAddress','$maritakKhateJankari','$maritakKhateAddress','$maritakKaName','$maritakAddress','$maritakDeathDate','$maritakVarisJankari','$maritakVarisAddress','$maritakBServeAddress','$maritakBServeNumber','$maritakBServeKulNumber','$maritakRakba','$maritakPatwariHalkNum','$maritakTappa','$maritakTahsil','$maritakJilla','$maritakCourt')");
                }else{
                    $insertFormData = mysqli_query($con,"INSERT INTO `saar_mritak_namantran`(`userId`, `mobileNumber`, `mritakId`,`maritakPraNumber` ,`maritakAvedakName`, `maritakAvedakAddress`, `maritakEnavedakName`, `maritakEnavedakAddress`, `maritakKhateJankari`, `maritakKhateAddress`, `maritakKaName`, `maritakAddress`, `maritakDeathDate`, `maritakVarisJankari`, `maritakVarisAddress`, `maritakBServeAddress`, `maritakBServeNumber`, `maritakBServeKulNumber`, `maritakRakba`,`maritakPatwariHalkNum`,`maritakTappa`,`maritakTahsil`, `maritakJilla`, `maritakCourt`) VALUES ('$userId','$mobileNumber','$mritakId','$maritakPraNumber','$maritakAvedakName','$maritakAvedakAddress','$maritakEnavedakName','$maritakEnavedakAddress','$maritakKhateJankari','$maritakKhateAddress','$maritakKaName','$maritakAddress','$maritakDeathDate','$maritakVarisJankari','$maritakVarisAddress','$maritakBServeAddress','$maritakBServeNumber','$maritakBServeKulNumber','$maritakRakba','$maritakPatwariHalkNum','$maritakTappa','$maritakTahsil','$maritakJilla','$maritakCourt')");
                }
            
            if($insertFormData){
                // if the query is run
                if($userType=="Normal"){
                     $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_mritak_namantran` WHERE `mritakId`='$mritakId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['mritakId'];
                             generatemaritakNamankanFormNormal($con,$dataIdWith);
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
                     $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_mritak_namantran` WHERE `mritakId`='$mritakId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['mritakId'];
                             generatemaritakNamankanForm($con,$dataIdWith);
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