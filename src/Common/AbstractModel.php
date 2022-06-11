<?php

namespace Emsa\Common;

abstract class AbstractModel implements ModelInterface
{
    protected $testMode = false;

    protected $repeatingPayment = false;

    protected $baseUrl;

    public function setRepeatingPayment(bool $repeatingPayment): ModelInterface
    {
        $this->repeatingPayment = $repeatingPayment;

        return $this;
    }

    public function isRepeatingPayment(): bool
    {
        return $this->repeatingPayment;
    }

    public function setTestMode(bool $testMode): ModelInterface
    {
        $this->testMode = $testMode;

        return $this;
    }

    public function isTestMode(): bool
    {
        return $this->testMode;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): ModelInterface
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }
}
