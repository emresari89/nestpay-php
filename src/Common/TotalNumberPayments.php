<?php

namespace Emsa\Common;

class TotalNumberPayments
{
    private $orderType;

    private $totalNumberPayments;

    private $orderFrequencyCycle; //D: Gün W: Hafta M: Ay

    private $orderFrequencyInterval;

    public function __construct(int $orderType,int $totalNumberPayments, string $orderFrequencyCycle, int $orderFrequencyInterval)
    {
        $this->orderType = $orderType;
        $this->totalNumberPayments = $totalNumberPayments;
        $this->orderFrequencyCycle = $orderFrequencyCycle;
        $this->orderFrequencyInterval = $orderFrequencyInterval;
    }

    /**
     * @return int
     */
    public function getOrderType(): int
    {
        return $this->orderType;
    }

    /**
     * @param int $orderType
     */
    public function setOrderType(int $orderType): void
    {
        $this->orderType = $orderType;
    }

    /**
     * @return int
     */
    public function getTotalNumberPayments(): int
    {
        return $this->totalNumberPayments;
    }

    /**
     * @param int $totalNumberPayments
     */
    public function setTotalNumberPayments(int $totalNumberPayments): void
    {
        $this->totalNumberPayments = $totalNumberPayments;
    }

    /**
     * @return string
     */
    public function getOrderFrequencyCycle(): string
    {
        return $this->orderFrequencyCycle;
    }

    /**
     * @param string $orderFrequencyCycle
     */
    public function setOrderFrequencyCycle(string $orderFrequencyCycle): void
    {
        $this->orderFrequencyCycle = $orderFrequencyCycle;
    }

    /**
     * @return int
     */
    public function getOrderFrequencyInterval(): int
    {
        return $this->orderFrequencyInterval;
    }

    /**
     * @param int $orderFrequencyInterval
     */
    public function setOrderFrequencyInterval(int $orderFrequencyInterval): void
    {
        $this->orderFrequencyInterval = $orderFrequencyInterval;
    }

}
