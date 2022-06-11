<?php

require_once __DIR__.'/../vendor/autoload.php';

$token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01');
$creditCard = new \Emsa\Common\CreditCard('4355084355084358', '26', '12', '000');
$totalNumbersPayment = new \Emsa\Common\TotalNumberPayments(0, '3', 'M', 1);
$purchase = new \Emsa\Nestpay\Model\Purchase();
$purchase->setTestMode(true);
$purchase->setRepeatingPayment(true);
$purchase->setTotalNumberPayments($totalNumbersPayment);
$purchase->setCreditCard($creditCard);
$purchase->setAmount(1);
$purchase->setInstallment(1);
$purchase->setCurrency(\Emsa\Nestpay\Currency::TRY);
$response = (new \Emsa\IsBank($token))->purchase($purchase);
print_r([
    'isSuccessful' => $response->isSuccessful(),
    'message' => $response->getResponseMessage(),
    'code' => $response->getResponseCode(),
    'orderId' => $response->getOrderId(),
]);
