<?php

namespace Acme;

class StringCalculator
{
    public function add($string)
    {
        if (empty($string)) {
            return 0;
        }

        $delimiters = array(',', "\n");
        if (preg_match('(^//(?P<delimiters>[^\n]+))', $string, $matches)) {
            $delimiters = (array) $matches['delimiters'];
        }

        $numbers = preg_split('([' . implode('', array_map('preg_quote', $delimiters)) . '])', $string);
        if (count($numbers) > count(array_filter($numbers))) {
            throw new \InvalidArgumentException("Empty number found ins tirng.");
        }

        return array_sum($numbers);
    }
}
