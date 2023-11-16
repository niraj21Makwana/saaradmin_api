<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $userId = isset($_GET['userId']) ? $_GET['userId'] : null;

    if($userId!=""){
        // if data is Present
        $firstQuery = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userId`='$userId'");
        $count = mysqli_num_rows($firstQuery);
        if($count>0){
                 while($getAllData = mysqli_fetch_assoc($firstQuery)){
                        $responseData[] = $getAllData;
                    }
                    $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'response'=>$responseData);
                    print_r(json_encode($response));
        }else{
            $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'NO Data found'),'response'=>$responseData);
            print_r(json_encode($response));
        }
        
    }else{
         // Empty data error
        $response = array('status'=>array('code'=>EMPTY_DATA,'message'=>'please send Category id'),'response'=>$responseData);
        print_r(json_encode($response));
    }


mysqli_close($con)

?>