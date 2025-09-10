<?php
// Include dependencies for result handling and utility functions
include 'result.php';
include 'util.php';

// Main entry point: handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST["form_type"];

    // Validate input data
    $validationResult = isValid($_POST);
    if ($validationResult->isFailure) {
        echo json_encode($validationResult);
        exit(-1);
    }

    // Call the corresponding operation function safely
    if (function_exists($operation)) {
        $operationResult = $operation($_POST);
        echo json_encode($operationResult);
    } else {
        echo json_encode(Result::failure("Operación '$operation' no soportada."));
        exit(-1);
    }
}

/**
 * Validates the form input based on the operation type.
 * @param array $form The form data.
 * @return Result Validation result.
 */
function isValid($form): Result
{
    $operation = $form["form_type"] ?? '';
    switch ($operation) {
        case 'cuadrado':
            if (isEmptyOrWhitespace($form['number'] ?? null)) {
                return Result::failure("Introduce el número para la operación 'cuadrado'.");
            }
            break;
        case 'triangulo':
        case 'rectangulo':
            if (isEmptyOrWhitespace($form['base'] ?? null)) {
                return Result::failure("Introduce la base.");
            }
            if (isEmptyOrWhitespace($form['altura'] ?? null)) {
                return Result::failure("Introduce la altura.");
            }
            break;
        case 'circunferencia':
            if (isEmptyOrWhitespace($form['radio'] ?? null)) {
                return Result::failure("Introduce el radio del círculo.");
            }
            break;
        default:
            return Result::failure("Operación '$operation' inválida.");
    }
    return Result::success();
}

/**
 * Calcula el cuadrado de un número.
 * @param array $form
 * @return Result
 */
function cuadrado($form): Result
{
    $number = (float)($form['number'] ?? 0);
    $result = pow($number, 2);
    return Result::success($result);
}

/**
 * Calcula el área de un rectángulo.
 * @param array $form
 * @return Result
 */
function rectangulo($form): Result
{
    $base = (float)($form['base'] ?? 0);
    $altura = (float)($form['altura'] ?? 0);
    $result = $base * $altura;
    return Result::success($result);
}

/**
 * Calcula la circunferencia de un círculo.
 * @param array $form
 * @return Result
 */
function circunferencia($form): Result
{
    $radio = (float)($form['radio'] ?? 0);
    $result = M_PI * pow($radio,2);
    return Result::success($result);
}

/**
 * Calcula el área de un triángulo.
 * @param array $form
 * @return Result
 */
function triangulo($form): Result
{
    $base = (float)($form['base'] ?? 0);
    $altura = (float)($form['altura'] ?? 0);
    $result = ($base * $altura) / 2;
    return Result::success($result);
}