<?php 
// ---------------find age by birthdate------------------
function dob($dob){
$birthDate = $dob;
$today = new DateTime();
$birthdate = new DateTime($birthDate);
$age = $today->diff($birthdate)->y;
return $age;
}
// --------------------------------------------------//
// genrate otp -------------------------------------------------------------------------------//
        function generateNumericOTP($n){
            $otp = "1357902468";
            $result = "";
            for ($i = 1; $i <= $n; $i++) {
                $result .= substr($otp, (rand() % (strlen($otp))), 1);
            }
                return $result;
            }
//   ------------------------------------------------------------------------------------------// 
//notification send function

     function sendNotification($conn,$title,$message,$tokens,$action,$image){
         
                     $url = 'https://fcm.googleapis.com/fcm/send';
                    
                    $api_key = 'AAAA7I-_0XM:APA91bFrezX1qlEYDIQxHRohP3vklOR9nFolc0LbXcl8bd77lYjVzWIjXBmqX-pkKdY5Bmybet84mvZ0rZUNhCeykcHz2wCnL-y79WWGwhms3ZyKAomCsZcY68TLIMFW8cvbQjuUFVaB';
                    
                //   $deepLink = "home_screen";
                     $fields = array(
                           'notification' => array(
                              'title' => $title,
                              'body' => $message,
                            'image' => $image,
                            ),
                            'data' => array(
                                'type' => 'sendmsg',
                                'image' => $image,
                            ),
                           "registration_ids" => $tokens //FCM TOKENS
                     );
                     $headers = array(
                        'Content-Type:application/json',
                         'Authorization:key=' . $api_key
                     );
                     $ch = curl_init();
                     curl_setopt($ch, CURLOPT_URL, $url);
                     curl_setopt($ch, CURLOPT_POST, true);
                     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                     $result = curl_exec($ch);
                     curl_close($ch);
                     if ($result === FALSE) {
                        die(curl_error($ch));
                     }else{
                         $getTitle = $title;
                         $getMessage = $message;
                         $getTokens = $tokens;
                         $actions =  $action;
                        //  $notifyId = uniqid();
                         
                        
                //  foreach($tokens as $userKey => $value){
                //     //   $notifyId = uniqid();
                //       $run = mysqli_query($conn,"SELECT * FROM `as_uersAuth` WHERE `fcmToken`='$value'");
                //             $getUserDetails = mysqli_fetch_assoc($run);
                //             $coustomerId =  $getUserDetails['userid'];
                //             $mobileNumber =  $getUserDetails['mobile'];
                //     //  $run = mysqli_query($conn,"INSERT INTO `ms_notification`(`userId`, `mobileNumber`, `notifiationId`, `fcmToken`, `title`, `message`, `action`VALUES ('$coustomerId','$mobileNumber','$notifyId','$value','$getTitle','$getMessage','$actions')");
                //     } 
                //     if($run){
                //           echo '1N';
                //      }else{
                //           echo '0N';
                //      }                               
                return true;
             }
   }
//-----------------end notification send function--------------------------------//


//---------------notification 1000 user one time-----,$imageUrl----------------------------------------//
function sendNotificationsInBatches($con,$title,$desc,$actionType,$imageurl,$userType) {
    $batchSize = 1000;
    // Get the total number of users
    if($userType=="allUser"){
        $queryTotalUsers = mysqli_query($con, "SELECT COUNT(*) AS total_users FROM `saarUsersAuth` WHERE `fcmToken`!=''");
        $rowTotalUsers = mysqli_fetch_assoc($queryTotalUsers);
        $totalUsers = $rowTotalUsers['total_users'];        
    }else{
        $queryTotalUsers = mysqli_query($con, "SELECT COUNT(*) AS total_users FROM `saarUsersAuth` WHERE `fcmToken`!='' AND `userType`='$userType'");
        $rowTotalUsers = mysqli_fetch_assoc($queryTotalUsers);
        $totalUsers = $rowTotalUsers['total_users'];
    }
    

    $notificationTitle = $title;
    $notificationMessage = $desc;
    $notificationimage = $imageurl;
    $notificationDeeplink = $deeplink;
    
    
    
// Removing HTML tags, &nbsp;, and &emsb; from the strings
$notificationTitle = preg_replace('/<[^>]*>|&nbsp;|&emsb;/u', '', $notificationTitle);
$notificationMessage = preg_replace('/<[^>]*>|&nbsp;|&emsb;/u', '', $notificationMessage);


if($userType=="allUser"){
    // Calculate the number of batches required
    $totalBatches = ceil($totalUsers / $batchSize);
    for ($batchNumber = 1; $batchNumber <= $totalBatches; $batchNumber++) {
        // Calculate the offset for the current batch
        $offset = ($batchNumber - 1) * $batchSize;
        
        // Fetch tokens for the current batch
        $queryTokens = mysqli_query($con, "SELECT `fcmToken` FROM `saarUsersAuth` WHERE `fcmToken`!='' LIMIT $batchSize OFFSET $offset");
        $rowsToken = array();

        while ($rowTokens = mysqli_fetch_assoc($queryTokens)) {
            $rowsToken[] = $rowTokens['fcmToken'];
        }

        // Send the notification for the current batch
     $sru = sendNotification($con, $notificationTitle, $notificationMessage,$rowsToken,$actionType,$notificationimage);
    }
}else{
    // Calculate the number of batches required
    $totalBatches = ceil($totalUsers / $batchSize);
    for ($batchNumber = 1; $batchNumber <= $totalBatches; $batchNumber++) {
        // Calculate the offset for the current batch
        $offset = ($batchNumber - 1) * $batchSize;
        
        // Fetch tokens for the current batch
        $queryTokens = mysqli_query($con, "SELECT `fcmToken` FROM `saarUsersAuth` WHERE `fcmToken`!='' AND `userType`='$userType' LIMIT $batchSize OFFSET $offset");
        $rowsToken = array();

        while ($rowTokens = mysqli_fetch_assoc($queryTokens)) {
            $rowsToken[] = $rowTokens['fcmToken'];
        }

        // Send the notification for the current batch
     $sru = sendNotification($con, $notificationTitle, $notificationMessage,$rowsToken,$actionType,$notificationimage);
    }
}
    

}
//--------------------------end notification 1000 meaagse------------------------------//
?>