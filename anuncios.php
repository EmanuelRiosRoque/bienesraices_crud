<?php
require 'includes/funciones.php'; 
incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h2>Casas y Departamentos de Lujo</h2>

        <?php 
            $limite = 6;
            include 'includes/templates/anuncios.php'
        ?>
    </main>

<?php
incluirTemplate('footer');
?>