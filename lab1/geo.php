<?php
//variables a usar
$Cuadrado = $_POST["Cuadrado"];
$RectanguloB = $_POST["RectanguloAncho"];
$RectanguloA = $_POST["RectanguloLado"];
$Circulo = $_POST["Radio"];
$TrianguloB = $_POST["TrianguloBase"];
$TrianguloH = $_POST["TrianguloAltura"];

//Funcion calcula radio

function CalcularRadio () {
    global $Circulo;

    $pi = 3.1416;
    $Radio = $pi * pow($Circulo, 2);
    echo "El radio de la circunferencia es: $Radio";

}

//funcion calcular cuadrado

function calcuarcuadrado () {

    global $Lado;
    $AreaCuadrado = pow($Lado, 2);
    echo "<p> El area del cuarado tiene un total de: $AreaCuadrado </p>";
}

// Funcion para calcular Rectangulo

function CalcualarRectangulo () {
    global $RectanguloA,$RectanguloB; 
    $AreaRectangulo = $RectanguloA * $RectanguloB;
    echo "<p> El area del rectangulo tieneun area de: $AreaRectangulo </p>";

}

// funcion para calcuar el triangulo

function CalcularTriangulo () {
    global $TrianguloB,$TrianguloH;
    $AreaTriangulo = $TrianguloB * $TrianguloH / 2;
    echo "<p> El area total del tringulo es de: $AreaTriangulo </p>"; 
}

