<?php

namespace Emsa\Nestpay\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Emsa\Common\HttpClient;
use PHPUnit\Framework\TestCase;

class PurchaseTest extends TestCase
{
    public function testFailure()
    {
        $response = new Response(200, [], '<?xml version="1.0" encoding="UTF-8"?>
            <CC5Response>
               <Response>Decline</Response>
               <ErrMsg />
            </CC5Response>');
        $mock = new MockHandler([
            $response,
        ]);
        $handler = HandlerStack::create($mock);
        $client = new HttpClient(['handler' => $handler]);

        // purchase
        $token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01');
        $creditCard = new \Emsa\Common\CreditCard('4355084355084358', '26', '12', '000');
        $purchase = new \Emsa\Nestpay\Model\Purchase();
        $purchase->setTestMode(true);
        $purchase->setCreditCard($creditCard);
        $purchase->setAmount(1);
        $purchase->setInstallment(1);
        $purchase->setCurrency(\Emsa\Nestpay\Currency::TRY);
        $response = (new \Emsa\AkBank($token, $client))->purchase($purchase);
        $this->assertFalse($response->isSuccessful());
    }

    public function testSuccessful()
    {
        $response = new Response(200, [], '<?xml version="1.0" encoding="UTF-8"?>
            <CC5Response>
               <OrderId>ORDER-19151Wi5B10901</OrderId>
               <Response>Approved</Response>
            </CC5Response>');
        $mock = new MockHandler([
            $response,
        ]);
        $handler = HandlerStack::create($mock);
        $client = new HttpClient(['handler' => $handler]);

        // purchase
        $token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01');
        $creditCard = new \Emsa\Common\CreditCard('4355084355084358', '26', '12', '000');
        $purchase = new \Emsa\Nestpay\Model\Purchase();
        $purchase->setTestMode(true);
        $purchase->setCreditCard($creditCard);
        $purchase->setAmount(1);
        $purchase->setInstallment(1);
        $purchase->setCurrency(\Emsa\Nestpay\Currency::TRY);
        $response = (new \Emsa\AkBank($token, $client))->purchase($purchase);
        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('ORDER-19151Wi5B10901', $response->getOrderId());
    }
}
