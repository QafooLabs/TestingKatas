<?php

namespace Acme;

class StringCalculator
{
    public function add($string)
    {
        if (empty($string)) {
            return 0;
        }

        $numbers = preg_split('([,\n])', $string);
        if (count($numbers) > count(array_filter($numbers))) {
            throw new \InvalidArgumentException("Empty number found ins tirng.");
        }

        return array_sum($numbers);
    }
}
