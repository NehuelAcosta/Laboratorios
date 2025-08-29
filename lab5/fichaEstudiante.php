<?php
// Traer un dato de $_SESSION
$estudiante = $_SESSION["estudiante"];

// Para cada dato, se mostrará su nombre y valor
foreach ($estudiante as $dato => $valor) {
    if ($valor === ""){
        // Si no se ingresó un dato, se indicará que es desconocido
        $valor = "desconocido";
    }
    
    echo "<p>$dato: $valor</p>";
}
?>
