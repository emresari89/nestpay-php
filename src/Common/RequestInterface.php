<?php

namespace Emsa\Common;

interface RequestInterface
{
    public function send(): ResponseInterface;
}
