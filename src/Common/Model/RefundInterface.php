<?php

namespace Emsa\Common\Model;

use Emsa\Common\ModelInterface;

interface RefundInterface extends ModelInterface
{
    public function getOrderId(): string;
}
