<?php

namespace Acme\Verificator;

class NullTest extends \PHPUnit_Framework_TestCase
{
    public function testVerifyEmptyArray()
    {
        $verificator = new Null();

        $this->assertNull(
            $verificator->verify(array())
        );
    }

    public function testVerifyNoNull()
    {
        $verificator = new Null();

        $this->assertNull(
            $verificator->verify(array(1, 2))
        );
    }

    public function testFailOnNullValue()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Empty number found in string.'
        );

        $verificator = new Null();
        $verificator->verify(array(1, null, 2));
    }

    public function testFailOnNull()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Empty number found in string.'
        );

        $verificator = new Null();
        $verificator->verify(array(1, 0, 2));
    }
}
