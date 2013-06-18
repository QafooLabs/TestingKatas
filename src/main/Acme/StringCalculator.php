<?php

namespace Acme;

class StringCalculator
{
    public function add($string)
    {
        if (empty($string)) {
            return 0;
        }

        return array_sum(explode(',', $string));
    }
}
