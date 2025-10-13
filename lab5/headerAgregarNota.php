<?php
// La funcion "session_start()" permite almacenar informacion dentro
// de la variable global "$_SESSION", siendo esta un array asociativo
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estudiante = [
        "Nombre" => $_POST["nombre"],
        "Apellido" => $_POST["apellido"],
        "Cedula" => $_POST["cedula"],
        "Localidad" => $_POST["localidad"],
        "Direccion" => $_POST["direccion"],
        "Telefono" => $_POST["telefono"],
        "Email" => $_POST["email"],
    ];

    $_SESSION["estudiante"] = $estudiante;

}

if ( !isset($_SESSION["estudiante"])){
    header("Location: index.php"); // Redireccionar al index
}