<?php

namespace Acme\Verificator;

class NegativesTest extends \PHPUnit_Framework_TestCase
{
    public function testVerifyEmptyArray()
    {
        $verificator = new Negatives();

        $this->assertNull(
            $verificator->verify(array())
        );
    }

    public function testVerifyNoNegatives()
    {
        $verificator = new Negatives();

        $this->assertNull(
            $verificator->verify(array(1, 2))
        );
    }

    /**
     */
    public function testFailOnMultipleNegativeNumbers()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'String contains invalid negative numbers: -1, -3.'
        );

        $verificator = new Negatives();
        $verificator->verify(array(-1, 2, -3));
    }
}
