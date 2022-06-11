<?php

namespace Emsa\Common\Model;

use Emsa\Common\ModelInterface;

interface QueryInterface extends ModelInterface
{
    public function getOrderId(): string;
}
