<?php
include('../assets/includes/connection.php');
include('kalamBara-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userType = isset($_POST['userType']) ? $_POST['userType'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $kalamBaraParNumber = isset($_POST['kalamBaraParNumber']) ? $_POST['kalamBaraParNumber'] : null;
    $kalamBaraParNumber = trim($kalamBaraParNumber);

    $kalamBaraAvedakName = isset($_POST['kalamBaraAvedakName']) ? $_POST['kalamBaraAvedakName'] : null;
    $kalamBaraAvedakName = trim($kalamBaraAvedakName);
    
    $kalamBaraAvedakAddress = isset($_POST['kalamBaraAvedakAddress']) ? $_POST['kalamBaraAvedakAddress'] : null;
    $kalamBaraAvedakAddress = trim($kalamBaraAvedakAddress);
    
    $kalamBaraEnAvedakName = isset($_POST['kalamBaraEnAvedakName']) ? $_POST['kalamBaraEnAvedakName'] : null;
    $kalamBaraEnAvedakName = trim($kalamBaraEnAvedakName);
    
    $kalamBaraBTAddress = isset($_POST['kalamBaraBTAddress']) ? $_POST['kalamBaraBTAddress'] : null;
    $kalamBaraBTAddress = trim($kalamBaraBTAddress);

    $kalamBaraBServeNumber = isset($_POST['kalamBaraBServeNumber']) ? $_POST['kalamBaraBServeNumber'] : null;
    $kalamBaraBServeNumber = trim($kalamBaraBServeNumber);
    
    $kalamBaraKulBserveNumber = isset($_POST['kalamBaraKulBserveNumber']) ? $_POST['kalamBaraKulBserveNumber'] : null;
    $kalamBaraKulBserveNumber = trim($kalamBaraKulBserveNumber);
    
    $kalamBaraRakba = isset($_POST['kalamBaraRakba']) ? $_POST['kalamBaraRakba'] : null;
    $kalamBaraRakba = trim($kalamBaraRakba);
    
    $kalamBaraPatwariHalkNum = isset($_POST['kalamBaraPatwariHalkNum']) ? $_POST['kalamBaraPatwariHalkNum'] : null;
    $kalamBaraPatwariHalkNum = trim($kalamBaraPatwariHalkNum);
    
    $kalamBaraTappa = isset($_POST['kalamBaraTappa']) ? $_POST['kalamBaraTappa'] : null;
    $kalamBaraTappa = trim($kalamBaraTappa);
    
    $kalamBaraJilla = isset($_POST['kalamBaraJilla']) ? $_POST['kalamBaraJilla'] : null;
    $kalamBaraJilla = trim($kalamBaraJilla);
    
    $kalamBaraCourt = isset($_POST['kalamBaraCourt']) ? $_POST['kalamBaraCourt'] : null;
    $kalamBaraCourt = trim($kalamBaraCourt);
    
    $kalamBaraTahsil = isset($_POST['kalamBaraTahsil']) ? $_POST['kalamBaraTahsil'] : null;
    $kalamBaraTahsil = trim($kalamBaraTahsil);
    
    $kalamBaraKhasreMPar = isset($_POST['kalamBaraKhasreMPar']) ? $_POST['kalamBaraKhasreMPar'] : null;
    $kalamBaraKhasreMPar = trim($kalamBaraKhasreMPar);
    
    $kalamBaraKitneYearOld = isset($_POST['kalamBaraKitneYearOld']) ? $_POST['kalamBaraKitneYearOld'] : null;
    $kalamBaraKitneYearOld = trim($kalamBaraKitneYearOld);
    
    $kalamBaraId = "saar_".uniqid();
    
    if($userId!="" && $kalamBaraAvedakName!="" && $kalamBaraAvedakAddress!="" && $kalamBaraBTAddress!="" && $kalamBaraBServeNumber!="" && $kalamBaraKulBserveNumber!="" && $kalamBaraRakba!="" && $kalamBaraTahsil!="" && $kalamBaraJilla!="" && $kalamBaraCourt!="" && $kalamBaraKhasreMPar!="" && $kalamBaraKitneYearOld!="" ){
        // if data is Presentsaar_kalamBara
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($kalamBaraEnAvedakName==""){
                $kalamBaraAnAvedakName = "म. प्र. शासन ";
                $insertFormData = mysqli_query($con,"INSERT INTO `saar_kalamBara`(`userId`, `mobileNumber`, `kalamBaraId`,`kalamBaraParNumber` ,`kalamBaraAvedakName`, `kalamBaraAvedakAddress`, `kalamBaraEnAvedakName`, `kalamBaraBTAddress`, `kalamBaraBServeNumber`, `kalamBaraKulBserveNumber`, `kalamBaraRakba`,`kalamBaraPatwariHalkNum`,`kalamBaraTappa`, `kalamBaraTahsil`, `kalamBaraJilla`, `kalamBaraCourt`, `kalamBaraKhasreMPar`, `kalamBaraKitneYearOld`) VALUES ('$userId','$mobileNumber','$kalamBaraId','$kalamBaraParNumber','$kalamBaraAvedakName','$kalamBaraAvedakAddress','$kalamBaraAnAvedakName','$kalamBaraBTAddress','$kalamBaraBServeNumber','$kalamBaraKulBserveNumber','$kalamBaraRakba','$kalamBaraPatwariHalkNum','$kalamBaraTappa','$kalamBaraTahsil','$kalamBaraJilla','$kalamBaraCourt','$kalamBaraKhasreMPar','$kalamBaraKitneYearOld')");
            }else{
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_kalamBara`(`userId`, `mobileNumber`, `kalamBaraId`,`kalamBaraParNumber` ,`kalamBaraAvedakName`, `kalamBaraAvedakAddress`, `kalamBaraEnAvedakName`, `kalamBaraBTAddress`, `kalamBaraBServeNumber`, `kalamBaraKulBserveNumber`, `kalamBaraRakba`,`kalamBaraPatwariHalkNum`,`kalamBaraTappa`, `kalamBaraTahsil`, `kalamBaraJilla`, `kalamBaraCourt`, `kalamBaraKhasreMPar`, `kalamBaraKitneYearOld`) VALUES ('$userId','$mobileNumber','$kalamBaraId','$kalamBaraParNumber','$kalamBaraAvedakName','$kalamBaraAvedakAddress','$kalamBaraEnAvedakName','$kalamBaraBTAddress','$kalamBaraBServeNumber','$kalamBaraKulBserveNumber','$kalamBaraRakba','$kalamBaraPatwariHalkNum','$kalamBaraTappa','$kalamBaraTahsil','$kalamBaraJilla','$kalamBaraCourt','$kalamBaraKhasreMPar','$kalamBaraKitneYearOld')");    
            }
            
         if($insertFormData){
                // if the query is run
                if($userType=="Normal"){
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_kalamBara` WHERE `kalamBaraId`='$kalamBaraId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['kalamBaraId'];
                            generateKalamBaraFormNormal($con,$dataIdWith);
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
                    $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_kalamBara` WHERE `kalamBaraId`='$kalamBaraId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['kalamBaraId'];
                            generateKalamBaraForm($con,$dataIdWith);
                                $responseData[] = $getAllData;
                            }
                            $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'msg'=>'फॉर्म जमा किया जा चूका','response'=>$responseData);
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