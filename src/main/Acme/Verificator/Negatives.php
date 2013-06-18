<?php

namespace Acme\Verificator;

use Acme\Verificator;

class Negatives extends Verificator
{
    public function verify(array $numbers)
    {
        $negatives = array_filter(
            $numbers,
            function ($number) {
                return $number < 0;
            }
        );

        if (count($negatives)) {
            throw new \InvalidArgumentException("String contains invalid negative numbers: " . implode(', ', $negatives) . ".");
        }
    }
}
