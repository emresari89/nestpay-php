<?php

namespace Emsa\Nestpay\Model;

use Emsa\Common\AbstractModel;
use Emsa\Common\Model\RefundInterface;
use Emsa\Common\Traits\Amount;
use Emsa\Common\Traits\OrderId;

class Refund extends AbstractModel implements RefundInterface
{
    use OrderId;
    use Amount;
}
