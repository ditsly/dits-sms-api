<?php




// Step 1: Get the DITS SMS API library from https://github.com/ditsly/dits-sms-api,
// following the instructions to install it with Composer.

require_once 'src/Class_DITS_SMS_API.php';
use DitsSMS\DitsSMSAPI;


// Step 2: set your API_KEY from https://sms.dits.ly/sms-api/info

$api_key = 'YWRtaW46YWRtaW4ucGFzc3dvcmQ=';


// Step 3: Change the from sender below. It can be a valid ID
$from = 'DITS';

// Step 4: the number we are sending to - Any phone number
$destination = '21892XXXXXXX';

$url = 'https://sms.dits.ly/sms/api';

// the sms body
$sms = 'Test Message From DITS SMS';

// unicode sms
$unicode = 0; //For Plain Message
$unicode = 1; //For Unicode Message


// Create SMS Body for request
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'unicode' => $unicode,
);

// Step 6: instantiate a new DITS SMS API request
$client = new DitsSMSAPI();

// Step 7: Send SMS
$response = $client->send_sms($sms_body, $url);

print_r($response);


// Step 8: Get Response
$response=json_decode($response);

// Display a confirmation message on the screen
echo 'Message: '.$response->message;


//Step 9: Get your inbox
$get_inbox=$client->get_inbox($api_key,$url);

//Step 10: Get your account balance

$check_balance=$client->check_balance($api_key,$url);

