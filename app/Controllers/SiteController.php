<?php

namespace App\Controllers;

use App\Calculator\Calculator;
use App\Calculator\Operators\Adder;
use App\Calculator\Operators\Divider;
use App\Calculator\Operators\Multiplier;
use App\Calculator\Operators\Subtractor;
use App\Interfaces\ControllerInterface;
use App\Validators\CalculatorValidator;

class SiteController implements ControllerInterface
{
    private $requestData;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_URI'];
    }

    public function run()
    {
        // get request data
        if (isset($_POST['calculator'])) {
            $this->requestData = [
                'first_operand' => $_POST['calculator']['first_operand'],
                'second_operand' => $_POST['calculator']['second_operand'],
                'operator' => $_POST['calculator']['operator'],
            ];

            $validator = CalculatorValidator::validate($this->requestData);

            if (count($validator) > 0) {
                $this->requestData['errors'] = $validator;
                return;
            }

            $this->requestData['result'] = $this->calculateResult();
        }
        return $this->requestData;
    }

    private function calculateResult()
    {
        switch ($this->requestData['operator']) {
            case '+':
                $calculator = new Calculator(new Adder);
                break;
            case '-':
                $calculator = new Calculator(new Subtractor);
                break;
            case '*':
                $calculator = new Calculator(new Multiplier);
                break;
            case '/':
                $calculator = new Calculator(new Divider);
                break;
            default:
                $calculator = new Calculator(new Adder);
                break;
        }
        return $calculator->calculate(
            $this->requestData['first_operand'],
            $this->requestData['second_operand']
        )->getResult();
    }



    public function render()
    {

        $data =  $this->run();

        require __DIR__ . '/../../views/index.php';
    }
}
