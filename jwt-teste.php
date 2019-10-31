<?php 

//Header

$header = [
    'alg' => 'HS256',
    'typ' => 'JWT'
];

$header_json = json_encode($header);
$header_base64 = base64_encode($header_json);
echo $header_base64;

//Payload

$payload = [
    'first Name' => 'Luiz',
    'Last Name' => 'Diniz',
    'Email' => 'diniz@email.com',
    'exp' => (new \DateTime())->getTimestamp()
];

$payload_json = json_encode($payload);
$payload_base64 = base64_encode($payload_json);
echo $payload_base64;

//Signature

$key = '789456123andre789456231';

$signature = hash_hmac('sha256', $header_base64.$payload_base64, $key, true);