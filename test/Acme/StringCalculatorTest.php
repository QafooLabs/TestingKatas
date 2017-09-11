<?php

namespace Acme;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function getSimpleTestCases(): array
    {
        return [
            // Step 1
            ['', 0],
            ['1', 1],
            ['1,2', 3],
            // Step 2
            ['1,2,3,4', 10],
            // Step 3
            ["1\n2,3", 6],
            // Step 4
            ["//;\n1;2", 3],
            ["//;\n1;2\n3", 6],
            ["//[\n1[2", 3],
        ];
    }

    /**
     * @dataProvider getSimpleTestCases
     */
    public function testAddSimpleStrings(string $input, int $expectation)
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add($input);

        $this->assertSame($expectation, $result);
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessage Negative numbers not allowed: -23, -42
     */
    public function testFailOnNegativeNumber()
    {
        $stringCalculator = new StringCalculator();

        $result = $stringCalculator->add('1,2,-23,-42');
    }
}
