<?php

namespace Acme;

class ReservationRequest
{
    /**
     * @var string
     */
    private $trainId;

    /**
     * @var int
     */
    private $seatCount;

    public function __construct($trainId, $seatCount)
    {
        $this->trainId = $trainId;
        $this->seatCount = $seatCount;
    }
}
