<?php 
    // Importat Conexion a BD
    require __DIR__ . '/../config/database.php';
    $db =  conectarDB();

    // Consultar 
    $query = "SELECT * FROM propiedades LIMIT $limite";
    // Leer resultados
    $resultado = mysqli_query($db, $query);
    



?>



<div class="contenerdor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):  ?>
    <div class="anuncio">
       
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'];?></h3>
            <p><?php echo $propiedad['descripcion'];?></p>
            <p class="precio">$ <?php echo $propiedad['precio'];?></p>
        
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="/build/img/icono_wc.svg" alt="Icono Wc">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
                <li>
                    <img loading="lazy" src="/build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>
            <a class="btn-amarillo-block" href="anuncio.php?id=<?php echo $propiedad['id']; ?>">Ver Propiedad</a>

        </div>
    </div>
    <?php endwhile;  ?>
</div>


<?php 
    // Cerrar la conexion 
    mysqli_close($db);

?>