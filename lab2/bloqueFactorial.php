<h2>Factorial (n!)</h2>
<!-- Envia un formulario a la misma pagina -->
<form method="post">
    <!--valida si se envia el formulario-->
    <input type="hidden" name="page" value="factorial">

    <div class="container-userInput">
        <input type="number" name="n" id="n" min="0" placeholder="Número (entero no negativo)" required>
        <button type="submit">Calcular factorial</button>
    </div>
</form>

<?php if (isset($fact)) include_once "resultadofactorial.php"; ?>