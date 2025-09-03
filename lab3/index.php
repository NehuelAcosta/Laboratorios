<?php
class Conversor {
    public static function convertir($numero, $base) {
        $decimal = base_convert($numero, $base, 10);
        return [
            'decimal' => $decimal,
            'binario' => base_convert($decimal, 10, 2),
            'octal' => base_convert($decimal, 10, 8),
            'hexadecimal' => strtoupper(base_convert($decimal, 10, 16))
        ];
    }
}

class Calculadora {
    public static function operar($num1, $base1, $num2, $base2, $operacion) {
        $n1 = base_convert($num1, $base1, 10);
        $n2 = base_convert($num2, $base2, 10);

        switch ($operacion) {
            case 'suma': $resultado = $n1 + $n2; break;
            case 'resta': $resultado = $n1 - $n2; break;
            case 'multiplicacion': $resultado = $n1 * $n2; break;
            case 'division': 
                $resultado = ($n2 != 0) ? ($n1 / $n2) : "Error: division por cero";
                break;
            default: $resultado = 0;
        }

        if (is_numeric($resultado)) {
            return [
                'decimal' => $resultado,
                'binario' => base_convert($resultado, 10, 2),
                'octal' => base_convert($resultado, 10, 8),
                'hexadecimal' => strtoupper(base_convert($resultado, 10, 16))
            ];
        } else {
            return ['decimal' => $resultado];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio III - Conversiones y Calculadora</title>
</head>
<body>
    <h1>Laboratorio III</h1>

    <!--Conversiones -->
    <h2>Conversor de Bases</h2>
    <form method="post">
        <label>Numero: <input type="text" name="numero"></label>
        <label>Base:
            <select name="base">
                <option value="10">Decimal</option>
                <option value="2">Binario</option>
                <option value="8">Octal</option>
                <option value="16">Hexadecimal</option>
            </select>
        </label>
        <button type="submit" name="convertir">Convertir</button>
    </form>

    <?php
    if (isset($_POST['convertir'])) {
        $resultado = Conversor::convertir($_POST['numero'], $_POST['base']);
        echo "<h3>Resultado:</h3>";
        foreach ($resultado as $base => $valor) {
            echo "$base: $valor <br>";
        }
    }
    ?>

    <hr>

    <!--Calculadora -->
    <h2>Calculadora entre Bases</h2>
    <form method="post">
        <label>Numero 1: <input type="text" name="num1"></label>
        <select name="base1">
            <option value="10">Decimal</option>
            <option value="2">Binario</option>
            <option value="8">Octal</option>
            <option value="16">Hexadecimal</option>
        </select>
        <br><br>
        <label>Numero 2: <input type="text" name="num2"></label>
        <select name="base2">
            <option value="10">Decimal</option>
            <option value="2">Binario</option>
            <option value="8">Octal</option>
            <option value="16">Hexadecimal</option>
        </select>
        <br><br>
        <label>Operacion:
            <select name="operacion">
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicacion</option>
                <option value="division">Division</option>
            </select>
        </label>
        <button type="submit" name="calcular">Calcular</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $resultado = Calculadora::operar($_POST['num1'], $_POST['base1'], $_POST['num2'], $_POST['base2'], $_POST['operacion']);
        echo "<h3>Resultado:</h3>";
        foreach ($resultado as $base => $valor) {
            echo "$base: $valor <br>";
        }
    }
    ?>
</body>
</html>