<?php

namespace Emsa\Common\Traits;

trait TotalNumberPayments
{
    protected $totalNumberPayments;

    /**
     * @return mixed
     */
    public function getTotalNumberPayments(): \Emsa\Common\TotalNumberPayments
    {
        return $this->totalNumberPayments;
    }

    /**
     * @param mixed $totalNumberPayments
     */
    public function setTotalNumberPayments(\Emsa\Common\TotalNumberPayments $totalNumberPayments): void
    {
        $this->totalNumberPayments = $totalNumberPayments;
    }

}
