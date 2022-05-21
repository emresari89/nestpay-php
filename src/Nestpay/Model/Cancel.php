<?php

namespace Emsa\Nestpay\Model;

use Emsa\Common\AbstractModel;
use Emsa\Common\Model\CancelInterface;
use Emsa\Common\Traits\OrderId;

class Cancel extends AbstractModel implements CancelInterface
{
    use OrderId;
}
