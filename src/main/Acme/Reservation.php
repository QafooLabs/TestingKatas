<?php

namespace Acme;

class Reservation
{
    /**
     * @var string
     */
    private $trainId;

    /**
     * @var string
     */
    private $bookingId;

    /**
     * @var Acme\Seat[]
     */
    private $seats;

    public function __construct($trainId, $bookingId, array $seats)
    {
        $this->trainId = $trainId;
        $this->bookingId = $bookingId;
        $this->seats = $seats;
    }
}
