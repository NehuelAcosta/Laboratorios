<?php
session_start();

class Multiplication {
    public static function table($num, $min = 1, $max = 10) {
        $num = (int)$num;
        $result = [];
        for ($i = $min; $i <= $max; $i++) {
            $result[$i] = $num * $i;
        }
        return $result;
    }
}

class Combinatorics {
    public static function factorial($n) {
        $n = (int)$n;
        if ($n < 2) return 1;
        $res = 1;
        for ($i = 2; $i <= $n; $i++) $res *= $i;
        return $res;
    }
    public static function combination($n, $k) {
        $n = (int)$n;
        $k = (int)$k;
        if ($k < 0 || $n < 0) return 0;
        if ($k > $n) return 0;
        if ($k === 0 || $k === $n) return 1;
        $k = min($k, $n - $k);
        $num = 1;
        $den = 1;
        for ($i = 1; $i <= $k; $i++) {
            $num *= ($n - $k + $i);
            $den *= $i;
        }
        return intdiv($num, $den);
    }
}

class Lottery {
    public static function fiveOfOroProbability() {
        $total = Combinatorics::combination(48, 5);
        if ($total == 0) return ['combination' => 0, 'fraction' => '0', 'one_in' => 0, 'decimal' => 0.0, 'percent' => 0.0];
        $decimal = 1 / $total;
        $percent = $decimal * 100;
        return ['combination' => $total, 'fraction' => "1/$total", 'one_in' => $total, 'decimal' => $decimal, 'percent' => $percent];
    }
}

class FactorialCalc {
    public static function compute($n) {
        $n = (int)$n;
        if ($n < 0) return null;
        $res = 1;
        for ($i = 2; $i <= $n; $i++) $res *= $i;
        return $res;
    }
}

$page = $_GET['page'] ?? 'tablas';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = $_POST['page'] ?? $page;
    if ($page === 'tablas') {
        $numero = $_POST['numero'] ?? '';
        $numero = (int)$numero;
        $table = Multiplication::table($numero);
    } elseif ($page === 'probabilidad') {
        $prob = Lottery::fiveOfOroProbability();
    } elseif ($page === 'factorial') {
        $n = $_POST['n'] ?? '';
        $n = (int)$n;
        $fact = FactorialCalc::compute($n);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laboratorio II - App</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 0 15px; }
        nav a { margin-right: 10px; text-decoration: none; padding: 6px 10px; border-radius: 6px; background: #eee; }
        form { margin-top: 15px; margin-bottom: 15px; }
        table { border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ccc; padding: 6px 10px; }
        .result { background: #f9f9f9; padding: 10px; border-radius: 6px; }
        input[type="number"] { padding: 6px; }
        button { padding: 6px 10px; }
    </style>
</head>
<body>
    <h1>Laboratorio II</h1>
    <nav>
        <a href="?page=tablas">Tablas</a>
        <a href="?page=probabilidad">Probabilidad 5 de ORO</a>
        <a href="?page=factorial">Factorial</a>
    </nav>

    <?php if ($page === 'tablas'): ?>
        <h2>Tablas de multiplicar (1 a 10)</h2>
        <form method="post">
            <input type="hidden" name="page" value="tablas">
            <label for="numero">Numero:</label>
            <input type="number" name="numero" id="numero" required>
            <button type="submit">Mostrar tabla</button>
        </form>

        <?php if (isset($table)): ?>
            <div class="result">
                <strong>Tabla del numero <?php echo htmlspecialchars($numero); ?></strong>
                <table>
                    <tr><th>x</th><th>resultado</th></tr>
                    <?php foreach ($table as $mul => $val): ?>
                        <tr><td><?php echo $mul; ?></td><td><?php echo $val; ?></td></tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>

    <?php elseif ($page === 'probabilidad'): ?>
        <h2>Probabilidad - 5 de ORO</h2>
        <p>Selecciona 5 numeros entre 01 y 48. La probabilidad de acertar los 5 es:</p>
        <form method="post">
            <input type="hidden" name="page" value="probabilidad">
            <button type="submit">Calcular probabilidad</button>
        </form>

        <?php if (isset($prob)): ?>
            <div class="result">
                <p>Combinaciones totales (48 choose 5): <?php echo $prob['combination']; ?></p>
                <p>Probabilidad en fraccion: <?php echo $prob['fraction']; ?></p>
                <p>Probabilidad decimal: <?php echo number_format($prob['decimal'], 12, '.', ''); ?></p>
                <p>Equivale a 1 entre <?php echo number_format($prob['one_in'], 0, '.', '.'); ?></p>
                <p>Porcentaje aproximado: <?php echo number_format($prob['percent'], 8, '.', ''); ?> %</p>
            </div>
        <?php endif; ?>

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