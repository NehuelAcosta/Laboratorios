<?php
// Incluimos dependencias externas que se asume contienen:
// - result.php: clase/métodos para manejar resultados (éxito/fracaso).
// - util.php: utilidades como isEmptyOrWhitespace().
include 'result.php';
include 'util.php';

// Solo procesamos si la petición recibida es de tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperamos los valores enviados en la petición
    // number1: primer número, number2: segundo número, operator: operador a aplicar
    $number1  = $_REQUEST['number1'];
    $number2  = $_REQUEST['number2'];
    $operator = $_REQUEST['operator'];

    // Validamos los valores recibidos antes de realizar el cálculo
    $validationResult = isValid($number1, $operator, $number2);
    if ($validationResult->isFailure) {
        // Si la validación falla, devolvemos la respuesta como JSON
        // con el mensaje de error y terminamos la ejecución
        echo json_encode($validationResult);
        exit(-1);
    }

    // Si los datos son correctos, realizamos la operación
    // Convertimos number1 y number2 a float para asegurar operaciones numéricas
    $calculationResult = calculate((float)$number1, $operator, (float)$number2);

    // Enviamos el resultado en formato JSON al frontend
    echo json_encode($calculationResult);
}

/**
 * Realiza el cálculo en función del operador recibido.
 *
 * @param float  $number1   Primer operando.
 * @param string $operator  Operador (+, -, *, /, ^, sqrt).
 * @param float  $number2   Segundo operando.
 * @return Result           Objeto Result con éxito o fallo.
 */
function calculate(float $number1, string $operator, float $number2) : Result
{
    switch ($operator) {
        case '+': // Suma
            $result = $number1 + $number2;
            break;
        case '-': // Resta
            $result = $number1 - $number2;
            break;
        case '*': // Multiplicación
            $result = $number1 * $number2;
            break;
        case '/': // División
            $result = $number1 / $number2; // Ya validamos antes que $number2 != 0
            break;
        case '^': // Potencia
            $result = pow($number1, $number2);
            break;
        case 'sqrt': // Raíz cuadrada
            // Aquí solo se usa number1, number2 queda irrelevante
            $result = sqrt($number1);
            break;
        default:
            // Si el operador no es válido, devolvemos un error
            return Result::failure("Invalid operator.");
    }

    // Si todo sale bien, devolvemos el resultado envuelto en un objeto Result
    return Result::success($result);
}

/**
 * Valida los valores recibidos para asegurar que se puede hacer la operación.
 *
 * @param mixed  $number1   Primer operando.
 * @param string $operator  Operador.
 * @param mixed  $number2   Segundo operando.
 * @return Result           Objeto Result con éxito o fallo.
 */
function isValid($number1, $operator, $number2) : Result
{
    // Validamos que el primer número no esté vacío
    if (isEmptyOrWhitespace($number1)) {
        return Result::failure("Ingrese numero 1.");
    }

    // Validamos que el segundo número exista,
    // excepto cuando la operación es raíz cuadrada
    if (isEmptyOrWhitespace($number2) && $operator !== 'sqrt') {
        return Result::failure("Ingrese numero 2.");
    }

    // Validamos que el operador no esté vacío o inválido
    if (isEmptyOrWhitespace($operator)) {
        return Result::failure("Ingrese un operador valido.");
    }

    // Si el operador es división, validamos que el segundo número no sea cero
    if ($operator === '/' && $number2 == 0) {
        return Result::failure("Division entre cero.");
    }

    // Si todas las validaciones pasan, devolvemos éxito
    return Result::success();
}
