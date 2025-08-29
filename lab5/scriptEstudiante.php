<?php
// Si no se ha enviado ningun formulario, redirecciona al usuario al index
if (!($_SERVER['REQUEST_METHOD'] === 'POST')){
    header("Location: index.php"); // Redireccionar al index
}

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$localidad = $_POST["localidad"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];

// Guardar datos ingresados dentro de un array asociativo
$estudiante = [
    "Nombre" => "$nombre $apellido",
    "Cedula" => $cedula,
    "Localidad" => $localidad,
    "Direccion" => $direccion,
    "Telefono" => $telefono,
    "Email" => $email,
];

// Guardar la informacion del estudiante en $_SESSION
$_SESSION["estudiante"] = $estudiante;
