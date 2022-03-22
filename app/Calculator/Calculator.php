<?php

namespace App\Calculator;

use App\Interfaces\OperatorInterface;

class Calculator {

  protected $result;
  protected $operation;

  public function __construct(OperatorInterface $operation) {
    $this->operation = $operation;
  }

  public function calculate($first, $second) {
    $this->result = $this->operation->run($first, $second);
    return $this;
  }

  public function getResult() {
    return $this->result;
  }
}