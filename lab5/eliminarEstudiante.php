<?php
session_start(); // Acceder a la sesión
session_unset(); // Eliminar todos los datos de $_SESSION
session_destroy(); // Eliminar la sesión
header("Location: index.php"); // Redireccionar al index