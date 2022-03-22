<?php

namespace App\Validators;

class CalculatorValidator
{
    public static function validate($form)
    {
        $errors = [];

        if (!isset($form['first_operand']) || !is_numeric($form['first_operand'])) {
            $errors['first_operand'] = 'First operand is required and must be a number';
        }

        if (!isset($form['second_operand']) || !is_numeric($form['second_operand'])) {
            $errors['second_operand'] = 'Second operand is required and must be a number';
        }

        if (!isset($form['operator']) || !in_array($form['operator'], ['+', '-', '*', '/'])) {
            $errors['operator'] = 'Operator is required and must be one of the following: +, -, *, /';
        }

        return $errors;
    }
}
