<?php

namespace Acme;

class StringCalculator
{
    public function add(string $string): int
    {
        $delimiters = [',', "\n"];
        if (preg_match('(\\A//(?P<delimiter>.)$)m', $string, $match)) {
            $delimiters[0] = $match['delimiter'];
        }

        $numbers = array_map(
            'intval',
            preg_split(
                '([' . implode('', array_map('preg_quote', $delimiters)) . '])',
                $string
            )
        );

        $negativeNumbers = array_filter(
            $numbers,
            function (int $number): bool {
                return $number < 0;
            }
        );
        if (count($negativeNumbers)) {
            throw new \DomainException('Negative numbers not allowed: ' . implode(', ', $negativeNumbers));
        }

        return array_sum($numbers);
    }
}
