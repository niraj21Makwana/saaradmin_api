<?php
include('../assets/includes/connection.php');
 include('atikraman-govt.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : null;
    
    $atikramanBKKV = isset($_POST['atikramanBKKV']) ? $_POST['atikramanBKKV'] : null;
    $atikramanBKKV = trim($atikramanBKKV);
    
    $atikramanFatherName = isset($_POST['atikramanFatherName']) ? $_POST['atikramanFatherName'] : null;
    $atikramanFatherName = trim($atikramanFatherName);
    
    $atikramanCast = isset($_POST['atikramanCast']) ? $_POST['atikramanCast'] : null;
    $atikramanCast = trim($atikramanCast);
    
    $atikramanAddress = isset($_POST['atikramanAddress']) ? $_POST['atikramanAddress'] : null;
    $atikramanAddress = trim($atikramanAddress);

    $atikramanGBAddress = isset($_POST['atikramanGBAddress']) ? $_POST['atikramanGBAddress'] : null;
    $atikramanGBAddress = trim($atikramanGBAddress);
    
    $atikramanPatwariHalkaNumber = isset($_POST['atikramanPatwariHalkaNumber']) ? $_POST['atikramanPatwariHalkaNumber'] : null;
    $atikramanPatwariHalkaNumber = trim($atikramanPatwariHalkaNumber);
    
    $atikramanTapa = isset($_POST['atikramanTapa']) ? $_POST['atikramanTapa'] : null;
    $atikramanTapa = trim($atikramanTapa);
    
    $atikramanTahsil = isset($_POST['atikramanTahsil']) ? $_POST['atikramanTahsil'] : null;
    $atikramanTahsil = trim($atikramanTahsil);
    
    $atikramanJilla = isset($_POST['atikramanJilla']) ? $_POST['atikramanJilla'] : null;
    $atikramanJilla = trim($atikramanJilla);

    $atikramanCourt = isset($_POST['atikramanCourt']) ? $_POST['atikramanCourt'] : null;
    $atikramanCourt = trim($atikramanCourt);
    
    $atikramanSarveNumber = isset($_POST['atikramanSarveNumber']) ? $_POST['atikramanSarveNumber'] : null;
    $atikramanSarveNumber = trim($atikramanSarveNumber);
    
    $atikramanRakba = isset($_POST['atikramanRakba']) ? $_POST['atikramanRakba'] : null;
    $atikramanRakba = trim($atikramanRakba);
    
    $atikramanNohiyat = isset($_POST['atikramanNohiyat']) ? $_POST['atikramanNohiyat'] : null;
    $atikramanNohiyat = trim($atikramanNohiyat);
    
    $atikramanBKRakba = isset($_POST['atikramanBKRakba']) ? $_POST['atikramanBKRakba'] : null;
    $atikramanBKRakba = trim($atikramanBKRakba);
    
    $atikramanDescription = isset($_POST['atikramanDescription']) ? $_POST['atikramanDescription'] : null;
    $atikramanDescription = trim($atikramanDescription);
    
    $atikramanId = "saar_".uniqid();
    
    if($userId!=""){
        // if data is Present
        $selectUserId = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $countUser = mysqli_num_rows($selectUserId);
        if($countUser>0){
            // if user exits
            if($atikramanBKKV!="" && $atikramanFatherName!="" && $atikramanCast!="" && $atikramanAddress!="" && $atikramanGBAddress!="" && $atikramanTahsil!="" && $atikramanJilla!="" && $atikramanCourt!="" && $atikramanSarveNumber!="" && $atikramanRakba!="" && $atikramanNohiyat!="" && $atikramanBKRakba!="" && $atikramanDescription!=""){
                
            $insertFormData = mysqli_query($con,"INSERT INTO `saar_atikraman`(`userId`, `mobileNumber`, `atikramanId`, `atikramanBKKV`, `atikramanFatherName`, `atikramanCast`, `atikramanAddress`, `atikramanGBAddress`,`atikramanPatwariHalkaNumber` ,`atikramanTapa`,`atikramanTahsil`, `atikramanJilla`, `atikramanCourt`, `atikramanSarveNumber`, `atikramanRakba`, `atikramanNohiyat`, `atikramanBKRakba`, `atikramanDescription`) VALUES ('$userId','$mobileNumber','$atikramanId','$atikramanBKKV','$atikramanFatherName','$atikramanCast','$atikramanAddress','$atikramanGBAddress','$atikramanPatwariHalkaNumber','$atikramanTapa','$atikramanTahsil','$atikramanJilla','$atikramanCourt','$atikramanSarveNumber','$atikramanRakba','$atikramanNohiyat','$atikramanBKRakba','$atikramanDescription')");
            if($insertFormData){
                // if the query is run
                        $fetchDataQuery = mysqli_query($con,"SELECT * FROM `saar_atikraman` WHERE `atikramanId`='$atikramanId'");
                        $fetchDataCount = mysqli_num_rows($fetchDataQuery);
                        if($fetchDataCount>0){
                        // if count > 0
                         while($getAllData = mysqli_fetch_assoc($fetchDataQuery)){
                             $dataIdWith = $getAllData['atikramanId'];
                              generateAtikramanForm($con,$dataIdWith);
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