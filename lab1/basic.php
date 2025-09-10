<?php
// Include dependencies for result handling and utility functions
include 'result.php';
include 'util.php';

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve input values from request
    $number1  = $_REQUEST['number1'];
    $number2  = $_REQUEST['number2'];
    $operator = $_REQUEST['operator'];

    // Validate input values
    $validationResult = isValid($number1, $operator, $number2);
    if ($validationResult->isFailure) {
        echo json_encode($validationResult);
        exit(-1);
    }

    // Perform calculation and return result as JSON
    $calculationResult = calculate((float)$number1, $operator, (float)$number2);
    echo json_encode($calculationResult);
}

/**
 * Performs a calculation based on the operator and operands.
 *
 * @param float $number1   The first operand.
 * @param string $operator The operator (+, -, *, /, ^, sqrt).
 * @param float $number2   The second operand.
 * @return Result          The result object (success or failure).
 */
function calculate(float $number1, string $operator, float $number2) : Result
{
    switch ($operator) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        case '/':
            $result = $number1 / $number2;
            break;
        case '^':
            $result = pow($number1, $number2);
            break;
        case 'sqrt':
            $result = sqrt($number1);
            break;
        default:
            return Result::failure("Invalid operator.");
    }
    return Result::success($result);
}

/**
 * Validates the input values for the calculation.
 *
 * @param mixed $number1   The first operand.
 * @param string $operator The operator.
 * @param mixed $number2   The second operand.
 * @return Result          The result object (success or failure).
 */
function isValid($number1, $operator, $number2) : Result
{
    if (isEmptyOrWhitespace($number1)) {
        return Result::failure("Ingrese numero 1.");
    }

    // Second number is required except for square root
    if (isEmptyOrWhitespace($number2) && $operator !== 'sqrt') {
        return Result::failure("Ingrese numero 2.");
    }

    if (isEmptyOrWhitespace($operator)) {
        return Result::failure("Ingrese un operador valido.");
    }

    if ($operator === '/' && $number2 == 0) {
        return Result::failure("Division entre cero.");
    }

    return Result::success();
}