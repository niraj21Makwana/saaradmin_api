<?php
include('../../assets/includes/connection.php');

header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $query = mysqli_query($con,"SELECT * FROM ".MOBILESLIDERTABLE." ORDER BY `id` DESC");
    $run = mysqli_num_rows($query);

        if($run>0){
            //if data is present       
         while($rows = mysqli_fetch_assoc($query)){
                $responseData[] = $rows;
            }
          $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'response'=>array('appSliderResponse'=>$responseData));
           print_r(json_encode($response));

        }else{
            //data is not fetch
            $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'success'),'response'=>array('appSliderResponse'=>$responseData));
            print_r(json_encode($response));
        }
?>