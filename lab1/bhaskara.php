<?php
// Include dependencies
include 'result.php';
include 'util.php';

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Retrieve and sanitize input values
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        // Validate input
        $validationResult = isValid($a, $b, $c);
        if ($validationResult->isFailure) {
            echo json_encode($validationResult);
            exit(-1);
        }

        // Calculate roots using Bhaskara's formula
        $bhaskaraResult = bhaskara((float)$a, (float)$b, (float)$c);
        echo json_encode($bhaskaraResult);
    } catch (Throwable $e) {
        // Handle unexpected errors
        echo json_encode(Result::failure($e->getMessage()));
    }
}

/**
 * Validates the input values for the quadratic equation.
 *
 * @param string $a
 * @param string $b
 * @param string $c
 * @return Result
 */
function isValid(string $a, string $b, string $c) : Result
{
    if (isEmptyOrWhitespace($a)) {
        return Result::failure("Introduce un numero para 'a'.");
    }
    if (isEmptyOrWhitespace($b)) {
        return Result::failure("Introduce un numero para 'b'.");
    }
    if (isEmptyOrWhitespace($c)) {
        return Result::failure("Introduce un numero para 'c'.");
    }
    return Result::success();
}

/**
 * Solves the quadratic equation using Bhaskara's formula.
 *
 * @param float $a
 * @param float $b
 * @param float $c
 * @return Result
 */
function bhaskara(float $a, float $b, float $c): Result
{
    // Calculate discriminant: D = b^2 - 4ac
    $discriminant = pow($b, 2) - 4 * $a * $c;

    // Determine the number of real roots
    if ($discriminant < 0) {
        return Result::failure("No existen raíces reales");
    }

    $roots = [];
    $sqrtDiscriminant = sqrt($discriminant);

    // First root
    $roots[] = (-$b + $sqrtDiscriminant) / (2 * $a);

    // Second root if discriminant > 0
    if ($discriminant > 0) {
        $roots[] = (-$b - $sqrtDiscriminant) / (2 * $a);
    }

    // Format roots for human readability
    $formattedRoots = '';
    foreach ($roots as $index => $root) {
        $formattedRoots .= "x" . ($index + 1) . ": $root\n";
    }

    return Result::success(trim($formattedRoots));
}