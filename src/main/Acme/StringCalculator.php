<?php

namespace Acme;

class StringCalculator
{
    protected $verificators = array();

    public function __construct(array $verificators = array())
    {
        $this->verificators = $verificators;
    }

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

        foreach ($this->verificators as $verificator) {
            $verificator->verify($numbers);
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
