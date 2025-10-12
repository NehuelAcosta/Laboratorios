<div class="result">
    <strong>Tabla del numero <?php echo htmlspecialchars($numero); ?></strong>
    <div id="result-table">
        <table>
            <tr>
                <th>x</th>
                <th>resultado</th>
            </tr>
            <?php for ($mul = 1; $mul <= 5; $mul++): ?> <!--foreach recorre el array $table, donde $mul es la clave (1 a 10) y $val el resultado de la multiplicación.-->
                <tr>
                    <td><?php echo $numero . " x " . $mul; ?></td>
                    <td><?php echo $table[$mul]; ?></td>
                </tr>
            <?php endfor; ?> <!-- termina el foreach-->
        </table>

        <table>
            <tr>
                <th>x</th>
                <th>resultado</th>
            </tr>
            <?php for ($mul = 5; $mul <= 10; $mul++): ?> <!--foreach recorre el array $table, donde $mul es la clave (1 a 10) y $val el resultado de la multiplicación.-->
                <tr>
                    <td><?php echo $numero . " x " . $mul; ?></td>
                    <td><?php echo $table[$mul]; ?></td>
                </tr>
            <?php endfor; ?> <!-- termina el foreach-->
        </table>
    </div>
</div>