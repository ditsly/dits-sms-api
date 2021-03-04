
# DITS SMS API

DITS SMS API is build for DITS SMS - Bulk SMS Application For Marketing


### Prerequisites

To run DITS SMS API you have to install DITS SMS Application on your server. 
```
php >=5.6
DITS SMS - Bulk SMS Application For Markting
```

### Installing
Via Composer
```
composer require dits/dits-sms-api 
```

And Via Bash

```
git clone https://github.com/dits/dits-sms-api.git
```

## Usage


 ### Step 1:
If install DITS SMS API using Git Clone then load your DITS SMS API Class file and Use namespace. 
```php
require_once 'src/Class_DITS_SMS_API.php';
use DitsSMS\DitsSMSAPI;
```
If install DITS SMS API using Composer then Require/Include autoload.php file in the index.php of your project or whatever file you need to use **DITS SMS API** classes:. 
```php
require 'vendor/autoload.php';
use DitsSMS\DitsSMSAPI;
```
### Step 2:
set your API_KEY from `https://sms.dits.ly/sms-api/info` 
```php
$api_key = 'YWRtaW46YWRtaW4ucGFzc3dvcmQ=';
```
### Step 3:
Change the from Sender ID  below. It can be your valid Sender ID 
```php
$from = 'DITS';
```

### Step 4:
the number we are sending to - Any phone number
```php
$destination = '21892XXXXXXX';
```
For multiple number please use Comma (,) after every single number.
```php
$destination = '21892XXXXXXX,21891XXXXXXX,21892XXXXXXX,21892XXXXXXX';
```
You can insert maximum 100 numbers using comma in single api request.

You have to must include Country code at beginning of the phone number.  

### Step 5:

```php
$url = 'https://sms.dits.ly/sms/api';
```
// SMS Body
```php
$sms = 'Test Message From DITS SMS';
```
// Unicode SMS
```php
$unicode = '1'; //For Unicode message
```
// Voice SMS
```php
$voice = '1'; //For voice message
```

// Schedule SMS
```php
$schedule_date = '02/17/2021 10:20 AM'; //Date like this format: m/d/Y h:i A
```
// Create Plain/text SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms
);
```
// Create Unicode SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'unicode' => $unicode,
);
```

// Create Voice SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'voice' => $voice,
);
```
// Create MMS SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms, //optional
    'mms' => $mms,
    'media_url' => $media_url,
);
```
// Create Schedule SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'schedule' => $schedule_date,
);
```

### Step 6: 
Instantiate a new DITS SMS API request
```php
$client = new DitsSMSAPI();
```

## Send SMS
Finally send your sms through DITS SMS API
```php
$response = $client->send_sms($sms_body, $url);
```

## Get Inbox
Get your all message
```php
$get_inbox=$client->get_inbox($api_key,$url);
```

## Get Balance
Get your account balance
```php
$get_balance=$client->check_balance($api_key,$url);
```
## Response
DITS SMS API return response with `json` format, like:

```json
{"code":"ok","message":"Successfully Send"}
```

## Status Code

| Status | Message |
| --- | --- |
| `ok` | Successfully Send |
| `100` | Bad gateway requested |
| `101` | Wrong action |
| `102` | Authentication failed |
| `103` | Invalid phone number |
| `104` | Phone coverage not active |
| `105` | Insufficient balance |
| `106` | Invalid Sender ID |
| `107` | Invalid SMS Type |
| `108` | SMS Gateway not active |
| `109` | Invalid Schedule Time |
| `110` | Media url required |
| `111` | SMS contain spam word. Wait for approval |

## Authors

* **Dimensions Technology** - *Initial work* - [ditsly](https://github.com/ditsly)
