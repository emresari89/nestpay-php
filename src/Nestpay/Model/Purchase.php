<?php

namespace Emsa\Nestpay\Model;

use Emsa\Common\AbstractModel;
use Emsa\Common\Model\PurchaseInterface;
use Emsa\Common\Traits\Amount;
use Emsa\Common\Traits\CreditCard;
use Emsa\Common\Traits\Currency;
use Emsa\Common\Traits\Installment;
use Emsa\Common\Traits\TotalNumberPayments;

class Purchase extends AbstractModel implements PurchaseInterface
{
    use CreditCard;
    use Amount;
    use Installment;
    use TotalNumberPayments;
    use Currency;
}
