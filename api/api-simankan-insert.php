<?php
include('../assets/includes/connection.php');
include('simankan-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $simankanPraNumber = isset($_POST['simankanPraNumber']) ? $_POST['simankanPraNumber'] : null;
    $simankanPraNumber = trim($simankanPraNumber);
    
    $simankanAvedakName = isset($_POST['simankanAvedakName']) ? $_POST['simankanAvedakName'] : null;
    $simankanAvedakName = trim($simankanAvedakName);
    
    $simankanAvedakAddress = isset($_POST['simankanAvedakAddress']) ? $_POST['simankanAvedakAddress'] : null;
    $simankanAvedakAddress = trim($simankanAvedakAddress);
    
    $simankanBSAddress = isset($_POST['simankanBSAddress']) ? $_POST['simankanBSAddress'] : null;
    $simankanBSAddress = trim($simankanBSAddress);
    
    $simankanBServeNumber = isset($_POST['simankanBServeNumber']) ? $_POST['simankanBServeNumber'] : null;
    $simankanBServeNumber = trim($simankanBServeNumber);

    $simankanKulBServeNum = isset($_POST['simankanKulBServeNum']) ? $_POST['simankanKulBServeNum'] : null;
    $simankanKulBServeNum = trim($simankanKulBServeNum);
    
    $simankanRakba = isset($_POST['simankanRakba']) ? $_POST['simankanRakba'] : null;
    $simankanRakba = trim($simankanRakba);
    
    $simankanPatwariHalkNum = isset($_POST['simankanPatwariHalkNum']) ? $_POST['simankanPatwariHalkNum'] : null;
    $simankanPatwariHalkNum = trim($simankanPatwariHalkNum);
    
    $simankanTappa = isset($_POST['simankanTappa']) ? $_POST['simankanTappa'] : null;
    $simankanTappa = trim($simankanTappa);
    
    $simankanTahsil = isset($_POST['simankanTahsil']) ? $_POST['simankanTahsil'] : null;
    $simankanTahsil = trim($simankanTahsil);
    
    $simankanJilla = isset($_POST['simankanJilla']) ? $_POST['simankanJilla'] : null;
    $simankanJilla = trim($simankanJilla);
    
    $simankanCourt = isset($_POST['simankanCourt']) ? $_POST['simankanCourt'] : null;
    $simankanCourt = trim($simankanCourt);
    
    $simankanLSNV = isset($_POST['simankanLSNV']) ? $_POST['simankanLSNV'] : null;
    $simankanLSNV = trim($simankanLSNV);
    
    $simankanPatwariLNum = isset($_POST['simankanPatwariLNum']) ? $_POST['simankanPatwariLNum'] : null;
    $simankanPatwariLNum = trim($simankanPatwariLNum);
    
    $simankanId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($simankanAvedakName!="" && $simankanAvedakAddress!="" && $simankanBSAddress!="" && $simankanBServeNumber!="" && $simankanKulBServeNum!="" && $simankanRakba!="" && $simankanTahsil!="" && $simankanJilla!="" && $simankanCourt!="" && $simankanLSNV!="" && $simankanPatwariLNum!=""){
                
                $insertFormData = mysqli_query($con,"INSERT INTO `saar_simankan`(`userId`, `mobileNumber`, `simankanId`, `simankanPraNumber`, `simankanAvedakName`, `simankanAvedakAddress`, `simankanBSAddress`, `simankanBServeNumber`, `simankanKulBServeNum`, `simankanRakba`,`simankanPatwariHalkNum`,`simankanTappa`,`simankanTahsil`, `simankanJilla`, `simankanCourt`, `simankanLSNV`, `simankanPatwariLNum`) VALUES ('$userId', '$mobileNumber', '$simankanId', '$simankanPraNumber', '$simankanAvedakName', '$simankanAvedakAddress', '$simankanBSAddress', '$simankanBServeNumber', '$simankanKulBServeNum', '$simankanRakba','$simankanPatwariHalkNum','$simankanTappa','$simankanTahsil', '$simankanJilla', '$simankanCourt', '$simankanLSNV', '$simankanPatwariLNum')");
                if($insertFormData){
                    // if the query is run
                            $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_simankan` WHERE `simankanId`='$simankanId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['simankanId'];
                                     generateSimankanForm($con,$dataIdWith);   
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