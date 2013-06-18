<?php

namespace Acme;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyString()
    {
        $calculator = new StringCalculator();

        $this->assertSame(
            0,
            $calculator->add("")
        );
    }

    public function testReturnSingleNumber()
    {
        $calculator = new StringCalculator();

        $this->assertSame(
            1,
            $calculator->add("1")
        );
    }

    public function testAddTwoSimpleNumbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(
            3,
            $calculator->add("1,2")
        );
    }
}
