<?php
header("Content-Type: application/json; charset=UTF-8");

// Recibir datos JSON
$input = file_get_contents("php://input");
$data = json_decode($input, true);

$notas = $data["notas"];

// Hacer cálculos
$suma = 0;
$cantidadNotas = 0;

foreach ($notas as $nota) {
    if (!($nota === 0)) {
        $suma += $nota;
        $cantidadNotas += 1;
    }
}

if ($cantidadNotas === 0) {
    $cantidadNotas = 1;
}

$promedio = round(($suma / $cantidadNotas), 1);

$situacion;

if ($promedio <= 3) {
    $situacion = "Exámen febrero";
} else if ($promedio <= 7) {
    $situacion = "Exámen reglamentado";
} else {
    $situacion = "Exonerado";
}

// Devolver respuesta JSON
echo json_encode(["promedio" => $promedio, "situacion" => $situacion]);
