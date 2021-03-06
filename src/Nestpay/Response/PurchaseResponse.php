<?php

namespace Emsa\Nestpay\Response;

use Emsa\Common\AbstractResponse;

class PurchaseResponse extends AbstractResponse
{
    public function isSuccessful(): bool
    {
        return 'Approved' === $this->getParameters()->get('Response');
    }

    public function getResponseMessage(): string
    {
        if (!$this->isSuccessful()) {
            return $this->getParameters()->get('ErrMsg');
        }

        return $this->getParameters()->get('Response');
    }

    public function getResponseCode(): string
    {
        return $this->getParameters()->get('ProcReturnCode');
    }

    public function getResponseBody(): array
    {
        return $this->getParameters()->all();
    }

    public function isRedirection(): bool
    {
        return false;
    }

    public function getRedirectForm(): ?string
    {
        return null;
    }

    public function getOrderId(): string
    {
        return $this->getParameters()->get('OrderId');
    }
}
