<?php

namespace App\Models;

class Invoice
{
    public float $amount = 20;

    public function __get(string $name)
    {
        var_dump($name);
    }

    public function __set($name, $value)
    {
        var_dump($name, $value);
    }

    public function __toString()
    {
        // var_dump('__toString');
        return 'Magic function __toString';
    }

    public function __call($name, $arguments)
    {
        var_dump($name, $arguments);
    }
}
