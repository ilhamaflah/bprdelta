<?php

require_once "twilio/autoload.php"; 
use Twilio\Rest\Client;

$account_sid = "AC0e083aade3588f21590f2dae2299fc68";
$auth_token = "8e0bc06da1fa824aed4fd9f9536c6075";
$twilio_phone_number = "+12058436288";

$client = new Client($account_sid, $auth_token);

$client->messages->create(
    '+62 851-0512-3459',
    array(
        "from" => $twilio_phone_number,
        "body" => "Sent..."
    )
);

?>