<?php

namespace Acme;

class StringCalculator
{
    public function add($string)
    {
        if (empty($string)) {
            return 0;
        }

        $numbers = preg_split(
            '([' . implode(
                '',
                array_map(
                    'preg_quote',
                    $this->getDelimiters($string)
                )
            ) . '])',
            $string
        );

        $this->checkForEmptyStrings($numbers);
        $this->checkForNegativeNumbers($numbers);

        return array_sum($numbers);
    }

    protected function getDelimiters($string)
    {
        if (preg_match('(^//(?P<delimiters>[^\n]+))', $string, $matches)) {
            return (array) $matches['delimiters'];
        }

        return array(',', "\n");
    }

    protected function checkForEmptyStrings(array $numbers)
    {
        if (count($numbers) > count(array_filter($numbers))) {
            throw new \InvalidArgumentException("Empty number found ins tirng.");
        }
    }

    protected function checkForNegativeNumbers(array $numbers)
    {
        $negatives = array_filter(
            $numbers,
            function ($number) {
                return $number < 0;
            }
        );

        if (count($negatives)) {
            throw new \InvalidArgumentException("String contains invaliud negative numbers: " . implode(', ', $negatives) . ".");
        }
    }
}
