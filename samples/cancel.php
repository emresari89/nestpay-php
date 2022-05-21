<?php

require_once __DIR__.'/../vendor/autoload.php';

$token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01');
$gateway = new \Emsa\AkBank($token);
$cancel = new \Emsa\Nestpay\Model\Cancel();
$cancel->setOrderId('ORDER-19149WiYJ13338');
$cancel->setTestMode(true);
$response = (new \Emsa\AkBank($token))->cancel($cancel);
print_r([
    'isSuccessful' => $response->isSuccessful(),
    'message' => $response->getResponseMessage(),
    'code' => $response->getResponseCode(),
]);
