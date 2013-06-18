<?php

namespace Acme\Verificator;

use Acme\Verificator;

class Null extends Verificator
{
    public function verify(array $numbers)
    {
        if (count($numbers) > count(array_filter($numbers))) {
            throw new \InvalidArgumentException("Empty number found ins tirng.");
        }
    }
}
