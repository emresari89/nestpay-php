<?php

namespace Emsa\Common;

use Emsa\Common\Model\AuthorizeInterface;
use Emsa\Common\Model\CancelInterface;
use Emsa\Common\Model\CompleteInterface;
use Emsa\Common\Model\PurchaseInterface;
use Emsa\Common\Model\RefundInterface;

interface GatewayInterface
{
    public function createRequest(string $class, ModelInterface $model): ResponseInterface;

    public function authorize(AuthorizeInterface $model): ResponseInterface;

    public function complete(CompleteInterface $model): ResponseInterface;

    public function purchase(PurchaseInterface $model): ResponseInterface;

    public function refund(RefundInterface $model): ResponseInterface;

    public function cancel(CancelInterface $model): ResponseInterface;

    public function initialize(): void;
}
