<?php

namespace Emsa\Nestpay\Request;

use Emsa\Common\AbstractRequest;
use Emsa\Common\HttpClient;
use Emsa\Common\ResponseInterface;
use Emsa\Nestpay\Model\Cancel;
use Emsa\Nestpay\Response\CancelResponse;
use Emsa\Nestpay\Token;

class CancelRequest extends AbstractRequest
{
    public function send(): ResponseInterface
    {
        /** @var Cancel $model */
        $model = $this->getModel();
        /** @var Token $token */
        $token = $this->getToken();

        $body = new \SimpleXMLElement('<?xml version="1.0" encoding="ISO-8859-9"?><CC5Request></CC5Request>');
        $body->addChild('Type', 'Void');
        $body->addChild('Name', $token->getUsername());
        $body->addChild('Password', $token->getPassword());
        $body->addChild('ClientId', $token->getClientId());
        $body->addChild('OrderId', $model->getOrderId());
        $body->addChild();

        /** @var HttpClient $httpClient */
        $httpClient = $this->getHttpClient();
        $response = $httpClient->request('POST', $model->getBaseUrl(), [
            'body' => $body->asXML(),
        ]);

        return new CancelResponse($model, (array) @simplexml_load_string($response->getBody()->getContents()));
    }
}
