<?php

namespace Emsa\Nestpay\Model;

use Emsa\Common\AbstractModel;
use Emsa\Common\Model\CompleteInterface;
use Emsa\Common\Traits\Amount;
use Emsa\Common\Traits\Currency;
use Emsa\Common\Traits\Installment;
use Symfony\Component\HttpFoundation\ParameterBag;

class Complete extends AbstractModel implements CompleteInterface
{
    use Amount;
    use Installment;
    use Currency;

    /**
     * @var ParameterBag
     */
    protected $returnParams;

    public function __construct()
    {
        $this->returnParams = new ParameterBag();
    }

    public function setReturnParams(array $returnParams): void
    {
        $this->returnParams = new ParameterBag($returnParams);
    }

    public function getReturnParams(): ParameterBag
    {
        return $this->returnParams;
    }
}
