<?php
    session_start();
    
    
$host = "localhost";
$username = "u657820254_saarapp";
$password = "Saar@01App";
$dbname = "u657820254_saarapp";


    $con = mysqli_connect($host,$username,$password,$dbname);

    if($con){
        //echo "connection succesfully";
    }else{
        echo "connection failed";
    }
    
    
define('UserAuthTable','saar_adminAuth');

// base url
  define('BASE_URL', '');
  
  
 //response code
        define('SUCCESS', 2000);
     define('INVALID_TOKEN', 4001);
     define('BAD_REQUEST', 4000);
     define('PAYMENT_REQUIRED', 4002);
     define('NETWORK_ERROR', 4003);
     define('NOT_FOUND', 4004);
     define('INVALID_EMAIL_OR_MOBILE', 4005);
     define('PAYMENT_PASSWORD', 4006);
     define('LOGIN_REQUIRED', 4007);
     define('REQUEST_TIME_OUT', 4008);
     define('INVALID_FILE_TYPE', 4015);
     define('INTERNET_REQUIRED', 5011);
     define('EMPTY_DATA', 4010);
     define('INTERNAL_QUERY_ERROR', 4012);
     define('EMPTY_TOKE_OR_CUSTOMERID', 4016);
     define('DATA_NOT_FOUND', 4018); 
     define('ALREADY_EXITS', 4019); 
     define('FUNCTIONERROR', 4020); 
     

//==========================//
  
  //tables name define
  define('MOBILESLIDERTABLE','saar_appSlider'); //mobile slider table name
  define('USERTABLE','saarUsersAuth'); //User table name
  
  
  
include('functions.php');
?>