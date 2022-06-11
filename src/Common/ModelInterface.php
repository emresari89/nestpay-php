<?php

namespace Emsa\Common;

interface ModelInterface
{
    public function setTestMode(bool $testMode): ModelInterface;

    public function isTestMode(): bool;

    public function isRepeatingPayment(): bool;

    public function setBaseUrl(string $baseUrl): ModelInterface;

    public function getBaseUrl(): string;
}
