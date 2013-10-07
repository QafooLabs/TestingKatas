<?php

namespace Acme\StringCalculator;

class Parser
{
    public function parse($string)
    {
        list($string, $delimiters) = $this->extractDelimiters($string);

        return preg_split(
            '([' . implode(
                '',
                array_map(
                    'preg_quote',
                    $delimiters
                )
            ) . '])',
            $string
        );
    }

    protected function extractDelimiters($string)
    {
        if (preg_match('(^//(?P<delimiters>[^\n]+))', $string, $matches)) {
            return array(
                substr($string, strlen($matches[0]) + 1),
                (array) $matches['delimiters']
            );
        }

        return array(
            $string,
            array(',', "\n")
        );
    }
}
