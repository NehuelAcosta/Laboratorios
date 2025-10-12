<?php
// La funcion "table($num)" toma un numero cualquiera y lo multiplica por cada numero natural entre 1 y 10
// Luego guarda cada resultado en un array y lo devuelve
function table($num)
{
    $num = (int) $num;
    $result = [];
    for ($i = 1; $i <= 10; $i++) {
        $result[$i] = $num * $i;
    }
    return $result;
}

function combination($n, $k)
{
    // Convirte "$n" y "$k" a su valor numerico
    $n = (int)$n;
    $k = (int)$k;
//Valida: si alguno es negativo mediante un if y si es asi devuelve 0.
    if ($k < 0 || $n < 0) return 0;
    if ($k > $n) return 0;
    if ($k === 0 || $k === $n) return 1;

    // "min($num1, $num2, $num3, ...)" devuelve el valor numerico mas pequeño en un conjunto de numeros dados
    $k = min($k, $n - $k);
    $num = 1;
    $den = 1;
    for ($i = 1; $i <= $k; $i++) {
        $num *= ($n - $k + $i);
        $den *= $i;
    }
    // "intdiv($dividendo, $divisor)" divide dos numeros y devuelve el resultado como un numero entero
    return intdiv($num, $den);
}


// Calcular la probabilidad de sacar el 5 de oro segun las jugadas hechas
function CincoDeOroProbability($plays)
{
    //Si el número total es 0 o si no jugaste devuelve 0%.
    $total = combination(48, 5);
    if ($total == 0 || $plays < 1) {
        return 0.0;
    }
    $prob_win = 1 - pow(1 - 1 / $total, $plays);
    return $prob_win * 100; // porcentaje
}

// Calcular el factorial de un número (n!).
function compute($n)
{
    $n = (int)$n;
    if ($n < 0) return null; //Si el número es negativo devuelve null
    $res = 1;
    //Usa un bucle for para multiplicar desde 2 hasta n.
    for ($i = 2; $i <= $n; $i++) $res *= $i;
    return $res;
}

// Toma el valor de "page" pasada por el metodo GET
// Si "page" no tiene un valor definido, se le asignará el valor de 'table'
// por lo que, por defecto, la página mostrará el formulario de las tablas
/*Si el usuario envía un formulario con POST:
    Se revisa qué página pidió (tablas, probabilidad, factorial).
Dependiendo de eso:
    Tablas  toma el número ingresado y genera la tabla con table($numero).
    Probabilidad toma la cantidad de jugadas y calcula la probabilidad con CincoDeOroProbability.
    Factorial  toma n y calcula con compute($n).*/
$page = $_GET['page'] ?? 'tablas';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = $_POST['page'] ?? $page;
    if ($page === 'tablas') {
        $numero = $_POST['numero'] ?? '';
        $numero = (int)$numero;
        $table = table($numero);
    } elseif ($page === 'probabilidad') {
        $plays = $_POST['plays'] ?? '';
        $plays = (int)$plays;
        $prob_percent = CincoDeOroProbability($plays);
    } elseif ($page === 'factorial') {
        $n = $_POST['n'] ?? '';
        $fact = compute($n);
    }
}