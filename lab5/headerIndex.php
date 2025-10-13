<?php
session_start();

if ( isset($_SESSION['estudiante']) ){
    header('location: agregarNota.php');
}