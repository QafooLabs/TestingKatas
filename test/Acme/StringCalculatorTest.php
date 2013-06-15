<?php

namespace Acme;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyString()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(
            0,
            $calculator->add("")
        );
    }
}
