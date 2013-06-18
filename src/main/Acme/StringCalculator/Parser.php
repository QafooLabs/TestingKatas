<?php

namespace Acme\StringCalculator;

class Parser
{
    public function parse($string)
    {
        return preg_split(
            '([' . implode(
                '',
                array_map(
                    'preg_quote',
                    $this->getDelimiters($string)
                )
            ) . '])',
            $string
        );
    }

    protected function getDelimiters($string)
    {
        if (preg_match('(^//(?P<delimiters>[^\n]+))', $string, $matches)) {
            return (array) $matches['delimiters'];
        }

        return array(',', "\n");
    }
}
