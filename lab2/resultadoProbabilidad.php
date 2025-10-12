<div class="result">
                <p>Con <?php echo htmlspecialchars($plays); ?> jugada(s), la probabilidad de ganar es:</p>
                <strong><?php echo number_format($prob_percent, 8, '.', ''); ?> %</strong> 
    <!--Muestra el valor de la probabilidad en porcentaje con 8 decimales, usando punto como separador decimal y sin separador de miles.-->
            </div>