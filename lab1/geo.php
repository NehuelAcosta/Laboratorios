<?php
// Include dependencies for result handling and utility functions
include 'result.php'; // Incluye la clase Result para manejar resultados de operaciones
include 'util.php';   // Incluye funciones utilitarias, como isEmptyOrWhitespace

// Main entry point: handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si la solicitud es de tipo POST
    $operation = $_POST["form_type"]; // Obtiene el tipo de operación desde el formulario

    // Validate input data
    $validationResult = isValid($_POST); // Llama a la función de validación de datos
    if ($validationResult->isFailure) {  // Si la validación falla
        echo json_encode($validationResult); // Retorna el resultado de validación como JSON
        exit(-1); // Termina la ejecución con código de error
    }

    // Call the corresponding operation function safely
    if (function_exists($operation)) { // Verifica si existe la función correspondiente a la operación
        $operationResult = $operation($_POST); // Llama a la función de operación pasando los datos del formulario
        echo json_encode($operationResult);    // Retorna el resultado como JSON
    } else {
        echo json_encode(Result::failure("Operación '$operation' no soportada.")); // Retorna error si la operación no existe
        exit(-1); // Termina la ejecución con código de error
    }
}

/**
 * Validates the form input based on the operation type.
 * @param array $form The form data.
 * @return Result Validation result.
 */
function isValid($form): Result
{
    $operation = $form["form_type"] ?? ''; // Obtiene el tipo de operación, por defecto cadena vacía
    switch ($operation) { // Evalúa la operación para validar los campos requeridos
        case 'cuadrado':
            if (isEmptyOrWhitespace($form['number'] ?? null)) { // Verifica que el número no esté vacío
                return Result::failure("Introduce el número para la operación 'cuadrado'.");
            }
            break;
        case 'triangulo':
        case 'rectangulo':
            if (isEmptyOrWhitespace($form['base'] ?? null)) { // Verifica que la base no esté vacía
                return Result::failure("Introduce la base.");
            }
            if (isEmptyOrWhitespace($form['altura'] ?? null)) { // Verifica que la altura no esté vacía
                return Result::failure("Introduce la altura.");
            }
            break;
        case 'circunferencia':
            if (isEmptyOrWhitespace($form['radio'] ?? null)) { // Verifica que el radio no esté vacío
                return Result::failure("Introduce el radio del círculo.");
            }
            break;
        default:
            return Result::failure("Operación '$operation' inválida."); // Error si la operación no es reconocida
    }
    return Result::success(); // Retorna éxito si todos los campos requeridos están completos
}

/**
 * Calcula el cuadrado de un número.
 * @param array $form
 * @return Result
 */
function cuadrado($form): Result
{
    $number = (float)($form['number'] ?? 0); // Convierte a float, 0 por defecto si no se proporciona
    $result = pow($number, 2); // Calcula el cuadrado del número
    return Result::success($result); // Retorna el resultado exitoso
}

/**
 * Calcula el área de un rectángulo.
 * @param array $form
 * @return Result
 */
function rectangulo($form): Result
{
    $base = (float)($form['base'] ?? 0);   // Convierte la base a float
    $altura = (float)($form['altura'] ?? 0); // Convierte la altura a float
    $result = $base * $altura; // Calcula el área del rectángulo
    return Result::success($result); // Retorna el resultado exitoso
}

/**
 * Calcula la circunferencia de un círculo.
 * @param array $form
 * @return Result
 */
function circunferencia($form): Result
{
    $radio = (float)($form['radio'] ?? 0); // Convierte el radio a float
    $result = M_PI * pow($radio,2); // Calcula el área de la circunferencia (π * r^2)
    return Result::success($result); // Retorna el resultado exitoso
}

/**
 * Calcula el área de un triángulo.
 * @param array $form
 * @return Result
 */
function triangulo($form): Result
{
    $base = (float)($form['base'] ?? 0);   // Convierte la base a float
    $altura = (float)($form['altura'] ?? 0); // Convierte la altura a float
    $result = ($base * $altura) / 2; // Calcula el área del triángulo
    return Result::success($result); // Retorna el resultado exitoso
}
