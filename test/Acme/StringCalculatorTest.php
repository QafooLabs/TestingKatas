<?php

namespace Acme;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected function getStringCalculator()
    {
        return new StringCalculator(
            array(
                new Verificator\Null(),
                new Verificator\Negatives(),
            )
        );
    }

    public function testEmptyString()
    {
        $calculator = $this->getStringCalculator();

        $this->assertSame(
            0,
            $calculator->add("")
        );
    }

    public function testReturnSingleNumber()
    {
        $calculator = $this->getStringCalculator();

        $this->assertSame(
            1,
            $calculator->add("1")
        );
    }

    public function testAddTwoSimpleNumbers()
    {
        $calculator = $this->getStringCalculator();

        $this->assertSame(
            3,
            $calculator->add("1,2")
        );
    }

    public function testAddMultipleSimpleNumbers()
    {
        $calculator = $this->getStringCalculator();

        $this->assertSame(
            15,
            $calculator->add("1,2,3,4,5")
        );
    }

    public function testAddStringIncludingNewlines()
    {
        $calculator = $this->getStringCalculator();

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
        $calculator = $this->getStringCalculator();
        $calculator->add("1,\n");
    }

    public function testAddNumbersWithChangedDelimiter()
    {
        $calculator = $this->getStringCalculator();
        $this->assertSame(
            3,
            $calculator->add("//;\n1;2")
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailOnNegativeNumber()
    {
        $calculator = $this->getStringCalculator();
        $calculator->add("-1");
    }

    /**
     */
    public function testFailOnMultipleNegativeNumbers()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'String contains invalid negative numbers: -1, -3.'
        );

        $calculator = $this->getStringCalculator();
        $calculator->add("-1,2,-3");
    }
}
