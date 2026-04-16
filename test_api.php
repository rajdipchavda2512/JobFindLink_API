<?php
$data = json_encode(['mobile' => '+918758140896', 'purpose' => 'verify']);
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/json\r\nAccept: application/json\r\n",
        'content' => $data,
        'ignore_errors' => true
    ]
];
$context  = stream_context_create($options);
$result = file_get_contents('http://127.0.0.1:8000/api/auth/send-otp', false, $context);
echo $result;
