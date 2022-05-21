<?php

namespace Emsa;

use Emsa\Common\AbstractGateway;
use Emsa\Common\Model\AuthorizeInterface;
use Emsa\Common\Model\CancelInterface;
use Emsa\Common\Model\CompleteInterface;
use Emsa\Common\Model\PurchaseInterface;
use Emsa\Common\Model\RefundInterface;
use Emsa\Common\ResponseInterface;
use Emsa\Nestpay\Request\AuthorizeRequest;
use Emsa\Nestpay\Request\CancelRequest;
use Emsa\Nestpay\Request\CompleteRequest;
use Emsa\Nestpay\Request\PurchaseRequest;
use Emsa\Nestpay\Request\RefundRequest;

abstract class Nestpay extends AbstractGateway
{
    public function purchase(PurchaseInterface $purchase): ResponseInterface
    {
        return $this->createRequest(PurchaseRequest::class, $purchase);
    }

    public function authorize(AuthorizeInterface $authorize): ResponseInterface
    {
        return $this->createRequest(AuthorizeRequest::class, $authorize);
    }

    public function complete(CompleteInterface $complete): ResponseInterface
    {
        return $this->createRequest(CompleteRequest::class, $complete);
    }

    public function refund(RefundInterface $refund): ResponseInterface
    {
        return $this->createRequest(RefundRequest::class, $refund);
    }

    public function cancel(CancelInterface $cancel): ResponseInterface
    {
        return $this->createRequest(CancelRequest::class, $cancel);
    }
}
