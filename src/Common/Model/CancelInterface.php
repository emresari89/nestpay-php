<?php

namespace Emsa\Common\Model;

use Emsa\Common\ModelInterface;

interface CancelInterface extends ModelInterface
{
    public function getOrderId(): string;
}
