<?php
//guardar los inputs en variables
$coeficiente1 = $_POST["coeficiente1"];
$coeficiente2 = $_POST["coeficiente2"];
$operador = $_POST["Operador"];

//hacer los calculos
switch ($operador) {

    case "+":
        $resultado = $coeficiente1 + $coeficiente2;
        echo "El resultado es:$resulado";
        break;

    case "-":
        $resultado = $coeficiente1 - $coeficiente2;
        echo "El resultado es:$resultado";
        break;

    case "*":
        $resultado = $coeficiente1 * $coeficiente2;
        echo "El resultado es:$resultado";
        break;

    case "/":
        if ($coeficiente2 != 0) {
            $rsultado = $coeficiente1 / $coeficiente2;
            echo "El resultado es:$resultado";
        } else {
            echo "eror";
        }
}
