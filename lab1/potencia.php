<?php 
// variables a usar
$Potenciabase = $_POST ["potenciabase"];
$PotenciaExpo = $_POST ["potenciaexponente"];

// Funcion para calcualr potencias

function CalcularPotencias () {

    global $Potenciabase,$PotenciaExpo;
    $Potenciatotal = pow($Potenciabase, $PotenciaExpo);
    echo "<p> El total de la potencia es:$Potenciatotal";

}

