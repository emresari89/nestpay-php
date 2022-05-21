<?php

namespace Emsa\Nestpay\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Emsa\Common\HttpClient;
use PHPUnit\Framework\TestCase;

class CancelTest extends TestCase
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
        $cancel = new \Emsa\Nestpay\Model\Cancel();
        $cancel->setTestMode(true);
        $cancel->setOrderId('ORDER123');
        $response = (new \Emsa\AkBank($token, $client))->cancel($cancel);
        $this->assertFalse($response->isSuccessful());
    }

    public function testSuccessful()
    {
        $response = new Response(200, [], '<?xml version="1.0" encoding="UTF-8"?>
            <CC5Response>
               <Response>Approved</Response>
               <ErrMsg />
            </CC5Response>');
        $mock = new MockHandler([
            $response,
        ]);
        $handler = HandlerStack::create($mock);
        $client = new HttpClient(['handler' => $handler]);

        // purchase
        $token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01');
        $cancel = new \Emsa\Nestpay\Model\Cancel();
        $cancel->setTestMode(true);
        $cancel->setOrderId('ORDER123');
        $response = (new \Emsa\AkBank($token, $client))->cancel($cancel);
        $this->assertTrue($response->isSuccessful());
    }
}
