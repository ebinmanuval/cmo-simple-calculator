<?php
namespace App\Calculator\Operators;

use App\Interfaces\OperatorInterface;

class Adder implements OperatorInterface
{
    public function run($first, $second)
    {
        return $first + $second;
    }
}
