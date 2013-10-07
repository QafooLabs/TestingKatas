<?php

namespace Acme;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculateSum()
    {
        $parser = $this->getMock('\\Acme\\StringCalculator\\Parser');
        $parser
            ->expects($this->any())
            ->method('parse')
            ->with("inputstring")
            ->will(
                $this->returnValue(array(1, 2))
            );

        $calculator = new StringCalculator(
            $parser,
            array()
        );

        $this->assertSame(
            3,
            $calculator->add("inputstring")
        );
    }

    public function testCallVerificator()
    {
        $parser = $this->getMock('\\Acme\\StringCalculator\\Parser');
        $parser
            ->expects($this->any())
            ->method('parse')
            ->with("inputstring")
            ->will(
                $this->returnValue(array(1, 2))
            );

        $verificator = $this->getMock('\\Acme\\Verificator');
        $verificator
            ->expects($this->atLeastOnce())
            ->method('verify')
            ->with(array(1, 2));

        $calculator = new StringCalculator(
            $parser,
            array($verificator)
        );

        $calculator->add("inputstring");
    }
}
