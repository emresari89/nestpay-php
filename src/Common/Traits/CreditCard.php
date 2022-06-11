<?php

namespace Emsa\Common\Traits;

trait CreditCard
{
    protected $creditCard;

    public function getCreditCard(): \Emsa\Common\CreditCard
    {
        return $this->creditCard;
    }

    public function setCreditCard(\Emsa\Common\CreditCard $creditCard): void
    {
        $this->creditCard = $creditCard;
    }
}
