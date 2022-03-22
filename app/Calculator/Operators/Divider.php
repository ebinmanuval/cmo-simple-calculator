<?php

namespace App\Calculator\Operators;

use App\Interfaces\OperatorInterface;

class Divider implements OperatorInterface
{
    public function run($first, $second)
    {
        return $first / $second;
    }
}
