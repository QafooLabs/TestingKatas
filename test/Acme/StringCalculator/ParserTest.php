<?php

namespace Acme\StringCalculator;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function getStringExamples()
    {
        return array(
            array("", array('')),
            array("1", array(1)),
            array("1,2", array(1, 2)),
            array("1,2,3,4,5", array(1, 2, 3, 4, 5)),
            array("1\n2,3", array(1, 2, 3)),
            array("1,\n", array(1, null, null)),
            array("//;\n1;2", array(1, 2)),
            array("-1,2,-3", array(-1, 2, -3)),
        );
    }

    /**
     * @dataProvider getStringExamples
     */
    public function testParseString($string, $result)
    {
        $parser = new Parser();

        $this->assertEquals(
            $result,
            $parser->parse($string)
        );
    }
}
