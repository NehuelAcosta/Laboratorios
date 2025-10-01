<?php
// Incluimos dependencias externas que se suponen definen la clase Result
// y utilidades como isEmptyOrWhitespace()
include 'result.php';
include 'util.php';

// Este script se ejecuta cuando se recibe una petición POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Recuperamos los valores enviados en la petición POST
        // (los coeficientes de la ecuación cuadrática)
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        // Validamos los valores de entrada (que no estén vacíos o solo espacios)
        $validationResult = isValid($a, $b, $c);
        if ($validationResult->isFailure) {
            // Si hay un error en la validación, devolvemos el resultado en formato JSON
            // y terminamos la ejecución con código de error -1
            echo json_encode($validationResult);
            exit(-1);
        }

        // Si la validación fue exitosa, resolvemos la ecuación usando la fórmula de Bhaskara
        $bhaskaraResult = bhaskara((float)$a, (float)$b, (float)$c);

        // Enviamos la respuesta como JSON al cliente (JavaScript en frontend)
        echo json_encode($bhaskaraResult);
    } catch (Throwable $e) {
        // Capturamos cualquier excepción inesperada y devolvemos un error en JSON
        echo json_encode(Result::failure($e->getMessage()));
    }
}

/**
 * Valida los valores de entrada de la ecuación cuadrática.
 *
 * @param string $a  Coeficiente 'a' recibido como texto
 * @param string $b  Coeficiente 'b' recibido como texto
 * @param string $c  Coeficiente 'c' recibido como texto
 * @return Result    Devuelve un objeto Result indicando éxito o fallo
 */
function isValid(string $a, string $b, string $c) : Result
{
    // Verificamos si 'a' está vacío o solo contiene espacios
    if (isEmptyOrWhitespace($a)) {
        return Result::failure("Introduce un numero para 'a'.");
    }
    // Verificamos si 'b' está vacío o solo contiene espacios
    if (isEmptyOrWhitespace($b)) {
        return Result::failure("Introduce un numero para 'b'.");
    }
    // Verificamos si 'c' está vacío o solo contiene espacios
    if (isEmptyOrWhitespace($c)) {
        return Result::failure("Introduce un numero para 'c'.");
    }
    // Si todo es correcto, devolvemos un resultado exitoso
    return Result::success();
}

/**
 * Resuelve la ecuación cuadrática usando la fórmula general (Bhaskara).
 *
 * Fórmula: x = (-b ± √(b² - 4ac)) / (2a)
 *
 * @param float $a  Coeficiente cuadrático
 * @param float $b  Coeficiente lineal
 * @param float $c  Término independiente
 * @return Result   Devuelve un objeto Result con las raíces o un error
 */
function bhaskara(float $a, float $b, float $c): Result
{
    // Calculamos el discriminante: D = b^2 - 4ac
    $discriminant = pow($b, 2) - 4 * $a * $c;

    // Si el discriminante es negativo, no existen raíces reales
    if ($discriminant < 0) {
        return Result::failure("No existen raíces reales");
    }

    // Creamos un array para almacenar las raíces
    $roots = [];
    $sqrtDiscriminant = sqrt($discriminant);

    // Calculamos la primera raíz (con + en la fórmula)
    $roots[] = (-$b + $sqrtDiscriminant) / (2 * $a);

    // Si el discriminante es mayor que 0, hay dos raíces distintas
    // (si fuera exactamente 0, solo existe una raíz doble)
    if ($discriminant > 0) {
        $roots[] = (-$b - $sqrtDiscriminant) / (2 * $a);
    }

    // Formateamos las raíces en un string legible
    $formattedRoots = '';
    foreach ($roots as $index => $root) {
        $formattedRoots .= "x" . ($index + 1) . ": $root\n";
    }

    // Devolvemos el resultado exitoso con las raíces
    return Result::success(trim($formattedRoots));
}
