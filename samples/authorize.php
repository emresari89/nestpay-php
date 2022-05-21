<?php

require_once __DIR__.'/../vendor/autoload.php';

$token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01', '123456');
$creditCard = new \Emsa\Common\CreditCard('4355084355084358', '26', '12', '000');
$authorize = new \Emsa\Nestpay\Model\Authorize();
$authorize->setFailureUrl('http://127.0.0.1:8000/failure');
$authorize->setSuccessfulUrl('http://127.0.0.1:8000/successful');
$authorize->setCreditCard($creditCard);
$authorize->setCurrency(\Emsa\Nestpay\Currency::TRY);
$authorize->setAmount(1);
$authorize->generateOrderId();
$authorize->setTestMode(true);
$response = (new \Emsa\AkBank($token))->authorize($authorize);
print_r([
    'isSuccessful' => $response->isSuccessful(),
    'message' => $response->getResponseMessage(),
    'code' => $response->getResponseCode(),
]);
if ($response->isRedirection()) {
    echo $response->getRedirectForm();
}
