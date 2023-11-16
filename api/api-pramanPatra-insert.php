<?php
include('../assets/includes/connection.php');
include('panchnamaPatra-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $prpatraAavedakName = isset($_POST['prpatraAavedakName']) ? $_POST['prpatraAavedakName'] : null;
    $prpatraAavedakName = trim($prpatraAavedakName);
    
    $prpatraAvedakAddress = isset($_POST['prpatraAvedakAddress']) ? $_POST['prpatraAvedakAddress'] : null;
    $prpatraAvedakAddress = trim($prpatraAvedakAddress);
    
    $prpatraBTAddress = isset($_POST['prpatraBTAddress']) ? $_POST['prpatraBTAddress'] : null;
    $prpatraBTAddress = trim($prpatraBTAddress);
    
    $prapatraBServeNum = isset($_POST['prapatraBServeNum']) ? $_POST['prapatraBServeNum'] : null;
    $prapatraBServeNum = trim($prapatraBServeNum);
    
    $prapatraBServeNumKul = isset($_POST['prapatraBServeNumKul']) ? $_POST['prapatraBServeNumKul'] : null;
    $prapatraBServeNumKul = trim($prapatraBServeNumKul);
    
    $prapatraRakba = isset($_POST['prapatraRakba']) ? $_POST['prapatraRakba'] : null;
    $prapatraRakba = trim($prapatraRakba);
    
    $prapatraPatwariHalkNum = isset($_POST['prapatraPatwariHalkNum']) ? $_POST['prapatraPatwariHalkNum'] : null;
    $prapatraPatwariHalkNum = trim($prapatraPatwariHalkNum);
    
    $prapatraTappa = isset($_POST['prapatraTappa']) ? $_POST['prapatraTappa'] : null;
    $prapatraTappa = trim($prapatraTappa);

    $prapatraTehsil = isset($_POST['prapatraTehsil']) ? $_POST['prapatraTehsil'] : null;
    $prapatraTehsil = trim($prapatraTehsil);
    
    $prapatraJilla = isset($_POST['prapatraJilla']) ? $_POST['prapatraJilla'] : null;
    $prapatraJilla = trim($prapatraJilla);
    
    $prapatraLagan = isset($_POST['prapatraLagan']) ? $_POST['prapatraLagan'] : null;
    $prapatraLagan = trim($prapatraLagan);
    
    $prpatraId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($prpatraAavedakName!="" && $prpatraAvedakAddress!="" && $prpatraBTAddress!="" && $prapatraBServeNum!="" && $prapatraRakba!="" && $prapatraTehsil!=""  && $prapatraJilla!=""){
                
                $insertFormData = mysqli_query($con,"INSERT INTO `saar_prman_patra`(`userId`, `mobileNumber`, `prpatraId`, `prpatraAavedakName`, `prpatraAvedakAddress`, `prpatraBTAddress`, `prapatraBServeNum`, `prapatraBServeNumKul`, `prapatraRakba`,`prapatraPatwariHalkNum`,`prapatraTappa`, `prapatraTehsil`, `prapatraJilla`, `prapatraLagan`) VALUES ('$userId','$mobileNumber','$prpatraId','$prpatraAavedakName','$prpatraAvedakAddress','$prpatraBTAddress','$prapatraBServeNum','$prapatraBServeNumKul','$prapatraRakba','$prapatraPatwariHalkNum','$prapatraTappa','$prapatraTehsil','$prapatraJilla','$prapatraLagan')");
                if($insertFormData){
                    // if the query is run
                            $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_prman_patra` WHERE `prpatraId`='$prpatraId'");
                            $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                            if($fetchDataCount>0){
                            // if count > 0
                             while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                                 $dataIdWith = $getAllData['prpatraId'];
                                 $dataLagan = $getAllData['prapatraLagan'];
                                 if($dataLagan==""){
                                     generateBuwaiPrpatraForm($con,$dataIdWith);
                                 }else{
                                    generateLaganPrapatraForm($con,$dataIdWith); 
                                 }
                                    
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