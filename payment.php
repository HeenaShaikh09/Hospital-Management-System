<?php
// Paytm Payment Gateway Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointmentId = $_POST['appointment_id'];
    $amount = 5000; // Amount in paise (e.g., 5000 = ₹50.00)

    // Paytm parameters
    $paytmMerchantKey = "YOUR_MERCHANT_KEY"; //  Paytm Merchant Key
    $paytmMerchantId = "YOUR_MERCHANT_ID"; // Paytm Merchant ID
    $paytmWebsite = "YOUR_WEBSITE"; // e.g., "WEBSTAGING" or "PROD"
    
    // Generate checksum
    include("checksum.php"); // Include checksum generation script
    $paytmParams = [
        "MID" => $paytmMerchantId,
        "ORDER_ID" => $appointmentId,
        "CUST_ID" => "CUSTOMER_ID", // Replace with customer ID
        "CHANNEL_ID" => "WAP",
        "TXN_AMOUNT" => $amount / 100, // Convert to rupees
        "INDUSTRY_TYPE_ID" => "Retail",
        "WEBSITE" => $paytmWebsite,
        "CALLBACK_URL" => "http://yourwebsite.com/payment-response.php", // Change to your callback URL
    ];

    $checksum = getChecksumFromArray($paytmParams, $paytmMerchantKey);
    $paytmParams["CHECKSUMHASH"] = $checksum;

    // Prepare the form for Paytm
    echo "<html>
    <body>
    <form method='post' action='https://secure.paytm.in/theia/processTransaction' name='paytmForm'>";
    foreach ($paytmParams as $key => $value) {
        echo "<input type='hidden' name='{$key}' value='{$value}'>";
    }
    echo "<button type='submit'>Pay with Paytm</button>
    </form>
    <script type='text/javascript'>
        document.paytmForm.submit();
    </script>
    </body>
    </html>";
} else {
    // If accessed via GET, show the payment initiation form
    $appointmentId = $_GET['id'];
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pay for Your Appointment</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <h2>Pay for Your Appointment</h2>
        <form action="payment.php" method="POST">
            <input type="hidden" name="appointment_id" value="<?php echo $appointmentId; ?>">
            <button type="submit" class="btn btn-primary">Proceed to Paytm Payment</button>
        </form>
    </div>
    </body>
    </html>

    <?php
}
?>
