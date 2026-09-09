<?php

require 'vendor/autoload.php';

use SendGrid\Mail\Mail;

$email = new Mail();

$email->setFrom("your-sendgrid-email@example.com", "My PHP App");
$email->setSubject("Test Email from PHP");
$email->addTo("yourgmail@gmail.com", "User");

$email->addContent(
    "text/plain",
    "Hello! This is a test email sent using SendGrid and PHP."
);

$sendgrid = new \SendGrid('YOUR_SENDGRID_API_KEY');

try {

    $response = $sendgrid->send($email);

    echo "Email sent successfully!";

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}

?>