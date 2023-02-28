<?php
require '../includes/funciones.php';
incluirTemplate('header');
$auth = Autentificacion();

if (!$auth) {
    header('Location: /');
}

// importar conexion
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades p INNER JOIN vendedores v ON p.vendedores_id = v.idVendedor";

// Consultar  la BD
$resultadoPropiedades = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultadoPropiedades);


// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // Elimina el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes/' . $propiedad['imagen']);

        //Elimina la imagen
        $query = "DELETE FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        if($resultado) {
            header('location: /admin?resultado=3');
        }
    }

}

// Incluye un template

?>

<main class="contenedor seccion">
    <h1>Administrador</h1>
    <?php if( intval($resultado) === 1 ): ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif(intval($resultado) === 2): ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php elseif(intval($resultado) === 3): ?>
        <p class="alerta exito">Anuncio Eliminado Correctamente</p>
    <?php endif; ?>


    <a class="boton btn-verde" href="/admin/propiedades/crear.php">Nueva Propiedad</a>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Vendedor</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar resultados -->
            <?php while($propiedad = mysqli_fetch_assoc($resultadoPropiedades) ): ?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td> <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"> </td>
                <td>$ <?php echo $propiedad['precio'];  ?></td>
                <td><?php echo $propiedad['nombre'] . " " . $propiedad['apellido'];  ?></td>
                <td>
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">


                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
</main>

<?php
    // Cerrar la conexion
    mysqli_close($db);

incluirTemplate('footer');
?>

