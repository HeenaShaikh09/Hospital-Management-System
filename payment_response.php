<?php
require 'paytm/checksum.php'; // Include the checksum generation script

$paytmChecksum = $_POST["CHECKSUMHASH"];
$isValidChecksum = verifychecksum_e($_POST, "YOUR_MERCHANT_KEY", $paytmChecksum);

if ($isValidChecksum) {
    // Process the response
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
        // Update your database to reflect successful payment
        $appointmentId = $_POST["ORDER_ID"];
        // Update payment status in the database here
        echo "Payment Successful for Appointment ID: " . $appointmentId;
    } else {
        echo "Payment Failed: " . $_POST["RESPONSETYPE"];
    }
} else {
    echo "Checksum Mismatch";
}
?>
