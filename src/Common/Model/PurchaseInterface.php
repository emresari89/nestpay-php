<?php

namespace Emsa\Common\Model;

use Emsa\Common\CreditCard;
use Emsa\Common\ModelInterface;

interface PurchaseInterface extends ModelInterface
{
    public function getAmount(): float;

    public function getInstallment(): int;

    public function getCurrency(): string;

    public function getCreditCard(): CreditCard;
}
