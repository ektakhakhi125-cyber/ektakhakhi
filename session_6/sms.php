<?php

require 'vendor/autoload.php';

use Twilio\Rest\Client;

$accountSid = "YOUR_TWILIO_ACCOUNT_SID";
$authToken = "YOUR_TWILIO_AUTH_TOKEN";

$twilioNumber = "YOUR_TWILIO_PHONE_NUMBER";
$myNumber = "YOUR_MOBILE_NUMBER";

$message = "Welcome! Your registration was successful.";

$client = new Client($accountSid, $authToken);

try {

    $client->messages->create(
        $myNumber,
        [
            "from" => $twilioNumber,
            "body" => $message
        ]
    );

    echo "SMS sent successfully!";

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}

?>