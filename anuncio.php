<?php
$id = $_GET['id'];

$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /');
}

// Importat Conexion a BD
require __DIR__ . '/includes/config/database.php';
$db =  conectarDB();

// Consultar 
$query = "SELECT * FROM propiedades WHERE id = $id";

// Leer resultados
$resultado = mysqli_query($db, $query);

if ($resultado->num_rows === 0 ) {
    header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultado);
 

require 'includes/funciones.php'; 
incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'] ?></h1>


        <img class="imagen-prop" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen Propiedad" loading="lazy">
       

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['precio'] ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="/build/img/icono_wc.svg" alt="Icono Wc">
                    <p><?php echo $propiedad['wc'] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                    <img loading="lazy" src="/build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p><?php echo $propiedad['habitaciones'] ?></p>
                </li>
            </ul>

            
            <p>  <?php echo $propiedad['descripcion'] ?> </p>
        </div>
    </main>

<?php
mysqli_close($db);
incluirTemplate('footer');
?>