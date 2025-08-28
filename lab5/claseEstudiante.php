<?php

$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$localidad = $_POST["localidad"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];


$estudiante = [
    "Nombre" => $nombre,
    "Cedula" => $cedula,
    "Localidad" => $localidad,
    "Direccion" => $direccion,
    "Telefono" => $telefono,
    "Email" => $email
];