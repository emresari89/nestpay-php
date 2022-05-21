<?php

namespace Emsa\Nestpay\Request;

use Emsa\Common\AbstractRequest;
use Emsa\Common\HttpClient;
use Emsa\Common\ResponseInterface;
use Emsa\Nestpay\Model\Authorize;
use Emsa\Nestpay\Response\AuthorizeResponse;
use Emsa\Nestpay\Token;

class AuthorizeRequest extends AbstractRequest
{
    public function send(): ResponseInterface
    {
        /** @var Authorize $model */
        $model = $this->getModel();
        /** @var Token $token */
        $token = $this->getToken();

        $rnd = microtime();
        $hash = base64_encode(pack('H*', sha1($token->getClientId().''.$model->getAmount().$model->getSuccessfulUrl().$model->getFailureUrl().$rnd.$token->getStoreKey())));

        /** @var HttpClient $httpClient */
        $httpClient = $this->getHttpClient();
        $response = $httpClient->request('POST', $this->getModel()->getBaseUrl(), [
            'form_params' => [
                'rnd' => $rnd,
                'hash' => $hash,
                'storetype' => '3d',
                'lang' => 'tr',
                'oid' => '',
                'OrderId' => $model->getOrderId(),
                'pan' => $model->getCreditCard()->getNumber(),
                'cv2' => $model->getCreditCard()->getCvv(),
                'Ecom_Payment_Card_ExpDate_Year' => $model->getCreditCard()->getExpireYear(),
                'Ecom_Payment_Card_ExpDate_Month' => $model->getCreditCard()->getExpireMonth(),
                'clientid' => $token->getClientId(),
                'amount' => $model->getAmount(),
                'okUrl' => $model->getSuccessfulUrl(),
                'failUrl' => $model->getFailureUrl(),
                'Currency' => $model->getCurrency(),
            ],
        ]);

        return new AuthorizeResponse($model, [
            'content' => $response->getBody()->getContents(),
        ]);
    }
}
