<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div id="modes-div" class="calc-buttons">
            <button id="btn-basic">Basic</button>
            <button id="btn-geo">Geometria</button>
            <button id="btn-baskara">Baskara</button>
        </div>
        <div id="calc-basic">
            <h2>Calculadora Basica</h2>
            <form action="basic.php" method="POST" id='form-basic'>
                <input type="number" name="number1" placeholder="Numero 1">
                <select name="operator" id="basic-operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">x</option>
                    <option value="/">/</option>
                    <option value="^">^</option>
                    <option value="sqrt">raiz cuadrada</option>
                </select>
                <input type="number" name="number2" id="basic-number2-field" placeholder="Numero 2">
                <input type="submit">
            </form>
        </div>
        <div id="calc-geo">
            <div class="geo-buttons">
                <button id="geo-cuadrado">Cuadrado</button>
                <button id="geo-rectangulo">Rectangulo</button>
                <button id="geo-circunferencia">Circulo</button>
                <button id="geo-triangulo">Triangulo</button>
            </div>

            <form id="form-cuadrado" action="geo.php" method="POST">
                <h2>Area de Cuadrado</h2>
                <input type="hidden" name="form_type" value="cuadrado">
                <input type="number" name="number" step="any" placeholder="Numero" min=0>
                <input type="submit">
            </form>

            <form id="form-rectangulo" action="geo.php" method="POST">
                <h2>Area de Rectangulo</h2>
                <input type="hidden" name="form_type" value="rectangulo">
                <input type="number" name="base" step="any" placeholder="Base" min=0>
                <input type="number" name="altura" step="any" placeholder="Altura" min=0>
                <input type="submit">
            </form>

            <form id="form-circunferencia" action="geo.php" method="POST">
                <h2>Area de Circulo</h2>
                <input type="hidden" name="form_type" value="circunferencia">
                <input type="number" name="radio" step="any" placeholder="Radio" min=0>
                <input type="submit">
            </form>

            <form id="form-triangulo" action="geo.php" method="POST">
                <h2>Area de Triangulo</h2>
                <input type="hidden" name="form_type" value="triangulo">
                <input type="number" name="base" step="any" placeholder="Base" min=0>
                <input type="number" name="altura" step="any" placeholder="Altura" min=0>
                <input type="submit">
            </form>
        </div>
        <div id="calc-baskara">
            <h2>Calculadora de Baskara</h2>
            <form action="bhaskara.php" method="POST" id='form-baskara'>
                <input type="number" name="a" step="any" placeholder="A">
                <input type="number" name="b" step="any" placeholder="B">
                <input type="number" name="c" step="any" placeholder="C">
                <input type="submit">
            </form>
        </div>

        <div id='result-div'>
        <p id='result-text'></p>
        </div>
    </main>

    <script src="app.js"></script>
</body>
</html>