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

    public function testAddMultipleSimpleNumbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(
            15,
            $calculator->add("1,2,3,4,5")
        );
    }

    public function testAddStringIncludingNewlines()
    {
        $calculator = new StringCalculator();

        $this->assertSame(
            6,
            $calculator->add("1\n2,3")
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailOnInvalidLineBreak()
    {
        $calculator = new StringCalculator();
        $calculator->add("1,\n");
    }
}
