<?php
require 'vendor/autoload.php';
use Twilio\Rest\Client;
use Twilio\Http\CurlClient;

$sid = '';
$token = '';

$curl = new CurlClient([
    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 0,
]);
$client = new Client($sid, $token, null, null, $curl);

try {
    $client->messages->read([], 1);
    echo "SUCCESS_AUTH";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
