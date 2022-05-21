<?php

namespace Emsa;

use Emsa\Common\BaseUrl;

class AnadoluBank extends Nestpay
{
    public function initialize(): void
    {
        $this->setBaseUrl((new BaseUrl())
            ->setProdUrls('https://anadolusanalpos.est.com.tr/fim/api', 'https://anadolusanalpos.est.com.tr/fim/est3Dgate')
            ->setTestUrls('https://entegrasyon.asseco-see.com.tr/fim/api', 'https://entegrasyon.asseco-see.com.tr/fim/est3Dgate'));
    }
}
