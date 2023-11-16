<?php
include('../../assets/includes/connection.php');
include('delete-function.php');

$onSliderDeltID = $_POST['onSliderDeltID'];

$result = deleteData($con,'saar_appSlider', 'sliderId', $onSliderDeltID, '../../assets/Mobile_slider', 'sliderImage');

if ($result === 1) {
    echo 1; // Success message
} elseif ($result === 0) {
    echo 0; // Error message
} else {
    echo 2; // Record not found message
} 

?>