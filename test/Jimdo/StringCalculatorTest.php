<?php

namespace Jimdo;

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

    public function testSimpleNumber()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(
            1,
            $calculator->add("1")
        );
    }

    public function testAddTwoNumbers()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(
            6,
            $calculator->add("2,4")
        );
    }

    public function testAddTwoOtherNumbers()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(
            9,
            $calculator->add("5,4")
        );
    }

    public function testAddThreeNumbers()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(
            51,
            $calculator->add("5,4,42")
        );
    }
}
