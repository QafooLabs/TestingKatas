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

        if (count($numbers) > count(array_filter($numbers))) {
            throw new \InvalidArgumentException("Empty number found ins tirng.");
        }

        return array_sum($numbers);
    }

    protected function getDelimiters($string)
    {
        if (preg_match('(^//(?P<delimiters>[^\n]+))', $string, $matches)) {
            return (array) $matches['delimiters'];
        }

        return array(',', "\n");
    }
}
