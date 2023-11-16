<?php
// delete single data
function deleteData($con,$table, $primaryKey, $id, $flodername, $imageKey)
{
    global $con;

    $query = "SELECT * FROM `$table` WHERE `$primaryKey`='$id'";
    $show = mysqli_query($con, $query);

    if (mysqli_num_rows($show) > 0) {
        $row = mysqli_fetch_array($show);

        if ($flodername != "") {
            $pics = $row[$imageKey];
            unlink("$flodername/$pics");
        }

        $deleteQuery = "DELETE FROM `$table` WHERE `$primaryKey`='$id'";
        $run = mysqli_query($con, $deleteQuery);

        if ($run) {
            return 1; // Success
        } else {
            return 0; // Error
        }
    } else {
        return 2; // Record not found
    }
}

// delete multipledata
function multiDeleteData($con,$ids,$table,$primaryKey,$flodername,$imageKey) {
    global $con;

    foreach ($ids as $id) {
        $id = mysqli_real_escape_string($con, $id);
        $show = mysqli_query($con, "SELECT * FROM `$table` WHERE `$primaryKey`='$id'");
        $res = mysqli_query($con, "DELETE FROM `$table` WHERE `$primaryKey`='$id'");
        $row = mysqli_fetch_array($show);
        
        if($flodername != ""){
        $pics = $row[$imageKey];
        unlink("$flodername/$pics");    
        }
    }

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}





?>
