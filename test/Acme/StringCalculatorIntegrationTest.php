<?php

namespace Acme;

/**
 * @group integration
 */
class StringCalculatorIntegrationTest extends \PHPUnit_Framework_TestCase
{
    protected function getStringCalculator()
    {
        return new StringCalculator(
            new StringCalculator\Parser(),
            array(
                new Verificator\Null(),
                new Verificator\Negatives(),
            )
        );
    }

    public function getSumExamples()
    {
        return array(
            array("", 0),
            array("1", 1),
            array("1,2", 3),
            array("1,2,3,4,5", 15),
            array("1\n2,3", 6),
        );
    }

    /**
     * @dataProvider getSumExamples
     */
    public function testCalcualteSum($string, $result)
    {
        $calculator = $this->getStringCalculator();

        $this->assertSame(
            $result,
            $calculator->add($string)
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
