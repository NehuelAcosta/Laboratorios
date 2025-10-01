<!DOCTYPE html> 
<!-- Declara que este documento es de tipo HTML5 -->

<html lang="en">
<!-- Inicio del documento HTML, configurado con idioma inglés -->

<head>
    <meta charset="UTF-8">
    <!-- Define la codificación de caracteres (UTF-8 admite tildes y símbolos) -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Ajusta el diseño para que sea responsive en móviles -->

    <link rel='stylesheet' href="style.css">
    <!-- Vincula la hoja de estilos externa -->

    <title>Document</title>
    <!-- Título que aparece en la pestaña del navegador -->
</head>

<body>
    <!-- Cuerpo del documento -->

    <main>
        <!-- Contenedor principal de la página -->

        <div id="modes-div" class="calc-buttons">
            <!-- Sección con los botones para elegir el modo de calculadora -->
            <button id="btn-basic">Basic</button>
            <button id="btn-geo">Geometria</button>
            <button id="btn-baskara">Baskara</button>
        </div>

        <div id="calc-basic">
            <!-- Calculadora básica -->
            <h2>Calculadora Basica</h2>
            <form action="basic.php" method="POST" id='form-basic'>
                <!-- Formulario que envía datos a basic.php vía POST -->
                <input type="number" name="number1" placeholder="Numero 1">
                <!-- Primer número -->

                <select name="operator" id="basic-operator">
                    <!-- Selector para elegir la operación -->
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">x</option>
                    <option value="/">/</option>
                    <option value="^">^</option>
                    <option value="sqrt">raiz cuadrada</option>
                </select>

                <input type="number" name="number2" id="basic-number2-field" placeholder="Numero 2">
                <!-- Segundo número (puede ocultarse si se usa sqrt) -->

                <input type="submit">
                <!-- Botón de envío -->
            </form>
        </div>

        <div id="calc-geo">
            <!-- Calculadora de áreas geométricas -->
            <div class="geo-buttons">
                <!-- Botones para elegir la figura -->
                <button id="geo-cuadrado">Cuadrado</button>
                <button id="geo-rectangulo">Rectangulo</button>
                <button id="geo-circunferencia">Circulo</button>
                <button id="geo-triangulo">Triangulo</button>
            </div>

            <!-- Formulario para cuadrado -->
            <form id="form-cuadrado" action="geo.php" method="POST">
                <h2>Area de Cuadrado</h2>
                <input type="hidden" name="form_type" value="cuadrado">
                <!-- Campo oculto que indica el tipo de cálculo -->
                <input type="number" name="number" step="any" placeholder="Numero" min=0>
                <!-- Lado del cuadrado -->
                <input type="submit">
            </form>

            <!-- Formulario para rectángulo -->
            <form id="form-rectangulo" action="geo.php" method="POST">
                <h2>Area de Rectangulo</h2>
                <input type="hidden" name="form_type" value="rectangulo">
                <input type="number" name="base" step="any" placeholder="Base" min=0>
                <input type="number" name="altura" step="any" placeholder="Altura" min=0>
                <input type="submit">
            </form>

            <!-- Formulario para círculo -->
            <form id="form-circunferencia" action="geo.php" method="POST">
                <h2>Area de Circulo</h2>
                <input type="hidden" name="form_type" value="circunferencia">
                <input type="number" name="radio" step="any" placeholder="Radio" min=0>
                <input type="submit">
            </form>

            <!-- Formulario para triángulo -->
            <form id="form-triangulo" action="geo.php" method="POST">
                <h2>Area de Triangulo</h2>
                <input type="hidden" name="form_type" value="triangulo">
                <input type="number" name="base" step="any" placeholder="Base" min=0>
                <input type="number" name="altura" step="any" placeholder="Altura" min=0>
                <input type="submit">
            </form>
        </div>

        <div id="calc-baskara">
            <!-- Calculadora de Bhaskara (ecuación cuadrática) -->
            <h2>Calculadora de Baskara</h2>
            <form action="bhaskara.php" method="POST" id='form-baskara'>
                <!-- Se ingresan los coeficientes de la ecuación ax^2 + bx + c = 0 -->
                <input type="number" name="a" step="any" placeholder="A">
                <input type="number" name="b" step="any" placeholder="B">
                <input type="number" name="c" step="any" placeholder="C">
                <input type="submit">
            </form>
        </div>

        <div id='result-div'>
            <!-- Div para mostrar el resultado -->
            <p id='result-text'></p>
        </div>
    </main>

    <script src="app.js"></script>
    <!-- Enlace al archivo JavaScript que controla la interacción -->
</body>
</html>
