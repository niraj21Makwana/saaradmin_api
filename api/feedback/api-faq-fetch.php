<?php
include('../../assets/includes/connection.php');
header('Content-Type: application/json');
header('Acess-Control-Allow-Orginin: *');
header('Access-control-Allow-Methods : POST');
header('Access-control-Allow-Headers : Access-control-Allow-Headers,Content-Type,Acess-Control-Allow-Orginin,Access-control-Allow-Methods,Authorization, X-Requested-With');

    $firstQuery = mysqli_query($con,"SELECT * FROM `saar_faq` ORDER BY `id` ASC");
    $countFirst = mysqli_num_rows($firstQuery);
          if($firstQuery){
          if($countFirst>0){
                while($getAllData = mysqli_fetch_assoc($firstQuery)){
                    $responseData[] = $getAllData;
                }
                    $response = array('status'=>array('code'=>SUCCESS,'message'=>'success'),'response'=>$responseData);
                    print_r(json_encode($response));
              
          }else{            
              //   DATA_NOT_FOUND
                $response = array('status'=>array('code'=>DATA_NOT_FOUND,'message'=>'success'),'response'=>$responseData);
                print_r(json_encode($response));
          }    
      }else{
        //   INTERNAL_QUERY_ERROR
        $response = array('status'=>array('code'=>INTERNAL_QUERY_ERROR,'message'=>'success'),'response'=>$responseData);
        print_r(json_encode($response));
      }

      
mysqli_close($con)

?>