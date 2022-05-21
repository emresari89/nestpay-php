<?php

namespace Emsa\Nestpay\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Emsa\Common\HttpClient;
use PHPUnit\Framework\TestCase;

class CompleteTest extends TestCase
{
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

        // authorize
        $token = new \Emsa\Nestpay\Token('100100000', 'AKTESTAPI', 'AKBANK01');
        $complete = new \Emsa\Nestpay\Model\Complete();
        $complete->setTestMode(true);
        $complete->setAmount(1);
        $complete->setInstallment(1);
        $complete->setCurrency(\Emsa\Nestpay\Currency::TRY);
        $complete->setReturnParams([
            'xid' => 'XID',
            'oid' => 'OID',
            'cavv' => 'CAVV',
            'eci' => 'ECI',
            'md' => 'MD',
        ]);
        $response = (new \Emsa\AkBank($token, $client))->complete($complete);
        $this->assertTrue($response->isSuccessful());
    }
}
