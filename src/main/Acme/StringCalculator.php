<?php

namespace Acme;

class StringCalculator
{
    protected $stringParser;

    protected $verificators = array();

    public function __construct(StringCalculator\Parser $stringParser, array $verificators = array())
    {
        $this->stringParser = $stringParser;
        $this->verificators = $verificators;
    }

    public function add($string)
    {
        if (empty($string)) {
            return 0;
        }

        $numbers = $this->stringParser->parse($string);

        foreach ($this->verificators as $verificator) {
            $verificator->verify($numbers);
        }

        return array_sum($numbers);
    }
}
