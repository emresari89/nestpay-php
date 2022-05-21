<?php

namespace Emsa\Nestpay\Model;

use Emsa\Common\AbstractModel;
use Emsa\Common\Model\AuthorizeInterface;
use Emsa\Common\Traits\Amount;
use Emsa\Common\Traits\CreditCard;
use Emsa\Common\Traits\Currency;
use Emsa\Common\Traits\Installment;
use Emsa\Common\Traits\OrderId;
use Emsa\Common\Traits\ReturnUrl;

class Authorize extends AbstractModel implements AuthorizeInterface
{
    use CreditCard;
    use Amount;
    use Installment;
    use ReturnUrl;
    use Currency;
    use OrderId;
}
