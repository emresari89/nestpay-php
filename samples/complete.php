<?php

require_once __DIR__.'/../vendor/autoload.php';

$token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01', '123456');
$complete = new \Emsa\Nestpay\Model\Complete();
$complete->setTestMode(true);
$complete->setReturnParams([
    'xid' => 'ifmTW9moVmSL1v4v7CtufhWCcAY=',
    'eci' => '05',
    'cavv' => 'AAABBCYHAgAAAAARMAcCAAAAAAA=',
    'md' => '435508:7D4CC6608E4E5BCFD4DCE2C6A4ED113ED7E916D56E54302CD49012778C2652D6:4285:##100100000',
    'oid' => $_POST['OrderId'],
]);
$complete->setCurrency(\Emsa\Nestpay\Currency::TRY);
$complete->setInstallment(1);
$complete->setAmount(1);
$response = (new \Emsa\AkBank($token))->complete($complete);
print_r([
    'isSuccessful' => $response->isSuccessful(),
    'message' => $response->getResponseMessage(),
    'code' => $response->getResponseCode(),
    'orderId' => $response->getOrderId(),
]);
