<?php

namespace Acme;

class Seat
{
    /**
     * @var string
     */
    private $coach;

    /**
     * @var int
     */
    private $seatNumber;

    public function __construct($coach, $seatNumber)
    {
        $this->coach = $coach;
        $this->seatNumber = $seatNumber;
    }
}
