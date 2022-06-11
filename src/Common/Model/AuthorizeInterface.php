<?php

namespace Emsa\Common\Model;

use Emsa\Common\CreditCard;
use Emsa\Common\ModelInterface;

interface AuthorizeInterface extends ModelInterface
{
    public function getAmount(): float;

    public function getInstallment(): int;

    public function getCurrency(): string;

    public function getSuccessfulUrl(): string;

    public function getFailureUrl(): string;

    public function getCreditCard(): CreditCard;
}
