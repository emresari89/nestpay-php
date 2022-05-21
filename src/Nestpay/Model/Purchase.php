<?php

namespace Emsa\Nestpay\Model;

use Emsa\Common\AbstractModel;
use Emsa\Common\Model\PurchaseInterface;
use Emsa\Common\Traits\Amount;
use Emsa\Common\Traits\CreditCard;
use Emsa\Common\Traits\Currency;
use Emsa\Common\Traits\Installment;

class Purchase extends AbstractModel implements PurchaseInterface
{
    use CreditCard;
    use Amount;
    use Installment;
    use Currency;
}
