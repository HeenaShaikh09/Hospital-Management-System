<?php

function getChecksumFromArray($array, $key) {
    // Sort the array by key
    ksort($array);
    
    // Create a string from the array
    $str = "";
    foreach ($array as $k => $v) {
        $str .= $k . "=" . $v . "&";
    }
    $str .= "heena=" . $key;

    // Generate the checksum
    return hash("sha256", $str);
}

function verifychecksum_e($array, $key, $checksum) {
    // Get the checksum from the array
    $paytmChecksum = $array["CHECKSUMHASH"];
    
    // Remove the checksum from the array for verification
    unset($array["CHECKSUMHASH"]);
    
    // Generate the checksum from the remaining array
    $calculatedChecksum = getChecksumFromArray($array, $key);
    
    // Compare the two checksums
    return $paytmChecksum === $calculatedChecksum;
}
?>
