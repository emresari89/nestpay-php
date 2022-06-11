<?php

namespace Emsa\Nestpay\Request;

use Emsa\Common\AbstractRequest;
use Emsa\Common\HttpClient;
use Emsa\Common\ResponseInterface;
use Emsa\Nestpay\Model\Purchase;
use Emsa\Nestpay\Response\PurchaseResponse;
use Emsa\Nestpay\Token;

class PurchaseRequest extends AbstractRequest
{
    public function send(): ResponseInterface
    {
        /** @var Purchase $model */
        $model = $this->getModel();
        /** @var Token $token */
        $token = $this->getToken();

        $body = new \SimpleXMLElement('<?xml version="1.0" encoding="ISO-8859-9"?><CC5Request></CC5Request>');
        $body->addChild('Type', 'Auth');
        $body->addChild('Mode', $model->isTestMode() ? 'T' : 'P');
        $body->addChild('Currency', $model->getCurrency());
        $body->addChild('Name', $token->getUsername());
        $body->addChild('Password', $token->getPassword());
        $body->addChild('ClientId', $token->getClientId());
        $body->addChild('IPAddress', (string)$this->getIpAddress());
        $body->addChild('Total', (string)$model->getAmount());
        $body->addChild('Taksit', (string)$model->getInstallment());
        $body->addChild('Number', $model->getCreditCard()->getNumber());
        $body->addChild('Expires', $model->getCreditCard()->getExpireMonth() . '/' . $model->getCreditCard()->getExpireYear());
        $body->addChild('Cvv2Val', $model->getCreditCard()->getCvv());


        if ($model->isRepeatingPayment()){
            $repeatingPayments = $body->addChild('PbOrder');
            $repeatingPayments->addChild('OrderType', $model->getTotalNumberPayments()->getOrderType());
            $repeatingPayments->addChild('TotalNumberPayments', $model->getTotalNumberPayments()->getTotalNumberPayments());
            $repeatingPayments->addChild('OrderFrequencyCycle', $model->getTotalNumberPayments()->getOrderFrequencyCycle());
            $repeatingPayments->addChild('OrderFrequencyInterval', $model->getTotalNumberPayments()->getOrderFrequencyInterval());

        }

        /** @var HttpClient $httpClient */
        $httpClient = $this->getHttpClient();
        $response = $httpClient->request('POST', $model->getBaseUrl(), [
            'body' => $body->asXML(),
        ]);

        return new PurchaseResponse($model, (array)@simplexml_load_string($response->getBody()->getContents()));
    }
}
