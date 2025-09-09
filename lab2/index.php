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
    $total = combination(48, 5);
    if ($total == 0 || $plays < 1) {
        return 0.0;
    }
    $prob_win = 1 - pow(1 - 1 / $total, $plays);
    return $prob_win * 100; // porcentaje
}

// Calcular el resultado de la exponencial
function compute($n)
{
    $n = (int)$n;
    if ($n < 0) return null;
    $res = 1;
    for ($i = 2; $i <= $n; $i++) $res *= $i;
    return $res;
}

// Toma el valor de "page" pasada por el metodo GET
// Si "page" no tiene un valor definido, se le asignará el valor de 'table'
// por lo que, por defecto, la página mostrará el formulario de las tablas
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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laboratorio II - App</title>
    <style>
        body {
            font-family: Arial,
                sans-serif;
            max-width: 900px;
            margin: 20px auto;
            padding: 0 15px;
        }

        nav a {
            margin-right: 10px;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            background: #eee;
        }

        form {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            padding: 6px 10px;
        }

        .result {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 6px;
        }

        input[type="number"] {
            padding: 6px;
        }

        button {
            padding: 6px 10px;
        }
    </style>
</head>

<body>
    <h1>Laboratorio II</h1>
    <nav>
        <!-- 
        Cuando el usuario hace click en el hyperlink, se envia el nombre de la pagina
        a traves del metodo GET -->
        <a href="?page=tablas">Tablas</a>
        <a href="?page=probabilidad">Probabilidad 5 de ORO</a>
        <a href="?page=factorial">Factorial</a>
    </nav>

    <!-- Si la pagina es "tablas" -->
    <?php if ($page === 'tablas'): ?>
        <h2>Tablas de multiplicar (1 a 10)</h2>
        <!-- Envia un formulario a la misma pagina -->
        <form method="post">
            <input type="hidden" name="page" value="tablas">
            <label for="numero">Numero:</label>
            <input type="number" name="numero" id="numero" required>
            <button type="submit">Mostrar tabla</button>
        </form>

        <!-- Cuando termine de calcular la tabla, esta se mostrara en la pagina -->
        <?php if (isset($table)): ?>
            <div class="result">
                <strong>Tabla del numero <?php echo htmlspecialchars($numero); ?></strong>
                <table>
                    <tr>
                        <th>x</th>
                        <th>resultado</th>
                    </tr>
                    <?php foreach ($table as $mul => $val): ?>
                        <tr>
                            <td><?php echo $numero . " x " . $mul; ?></td>
                            <td><?php echo $val; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>

        <!-- Si la pagina es "probabilidad" -->
    <?php elseif ($page === 'probabilidad'): ?>
        <h2>Probabilidad - 5 de ORO</h2>
        <p>Ingresa la cantidad de veces que jugaste al 5 de Oro:</p>
        <form method="post">
            <input type="hidden" name="page" value="probabilidad">
            <label for="plays">Cantidad de jugadas:</label>
            <input type="number" name="plays" id="plays" min="1" required>
            <button type="submit">Calcular probabilidad</button>
        </form>

        <?php if (isset($prob_percent)): ?>
            <div class="result">
                <p>Con <?php echo htmlspecialchars($plays); ?> jugada(s), la probabilidad de ganar es:</p>
                <strong><?php echo number_format($prob_percent, 8, '.', ''); ?> %</strong>
            </div>
        <?php endif; ?>

        <!-- Si la pagina es "factorial" -->
    <?php elseif ($page === 'factorial'): ?>
        <h2>Factorial (n!)</h2>
        <form method="post">
            <input type="hidden" name="page" value="factorial">
            <label for="n">Numero (entero no negativo):</label>
            <input type="number" name="n" id="n" min="0" required>
            <button type="submit">Calcular factorial</button>
        </form>

        <?php if (isset($fact)): ?>
            <div class="result">
                <p>Factorial de <?php echo htmlspecialchars($n); ?> es:</p>
                <pre><?php echo $fact; ?></pre>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <p>Página no encontrada.</p>
    <?php endif; ?>

</body>

</html>
