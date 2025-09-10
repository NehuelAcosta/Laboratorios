<?php

$baseraiz = $_POST["BaseRaiz"];

//Funcion para calcular raiz cuadrada
function CalculadoraRaiz(): float
{ //global: trae variables definidas afuera de la clase
    global $baseraiz;
    // Verificar que el numero no sea negativo
    if ($baseraiz >= 0) {
        $Resltado = sqrt($baseraiz);
        return $Resltado;
    } else {
        echo "<p >ERROR </p>";
        return 0;
    }
}
