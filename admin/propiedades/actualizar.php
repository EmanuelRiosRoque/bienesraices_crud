<?php
require '../../includes/funciones.php';
incluirTemplate('header');
$auth = Autentificacion();

if (!$auth) {
    header('Location: /');
}

// Validad que sea un ID valido 
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
// var_dump($id);

if (!$id) {
    header('Location: /admin');
}

// Base de dato 
require '../../includes/config/database.php';
$db = conectarDB();
// var_dump($db);

// Consluta para obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = $id"; 
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);


//Consultar la BD para obtener los vendedores
$consultaVendedoresBD = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consultaVendedoresBD);

// Arrego con Mensajes de ERRORES
// Validacion de formulario
$errores = [];

//Inicializamos variables vacias
$titulo          = $propiedad['titulo'];
$precio          = $propiedad['precio'];
$descripcion     = $propiedad['descripcion'];
$habitaciones    = $propiedad['habitaciones'];
$wc              = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedor_id     = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];



// Ejecurar el codigo despues de que el usuario envie el formulario


//Generando una validasion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //$_SERVER =>  Nos traera informacion mas de lo que pasa en el servidor
    //$_POST =>  Nos traera informacion cuando enviamos una peticion
    //$_FILES =>  Nos permitira ver el contenido de los archivos

    //Ver datos que toma  el POST
    // echo'<pre>';
    // var_dump($_POST);
    // echo'</pre>';

    // exit;
    // echo'<pre>';
    // var_dump($_FILES);
    // echo'</pre>';


    // SANITIZACION CON MYSQLI
    $titulo          = mysqli_real_escape_string( $db, $_POST['titulo'] );
    $precio          = mysqli_real_escape_string( $db, $_POST['precio'] );
    $descripcion     = mysqli_real_escape_string( $db, $_POST['descripcion'] );
    $habitaciones    = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
    $wc              = mysqli_real_escape_string( $db, $_POST['wc'] );
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
    $vendedor_id     = mysqli_real_escape_string( $db, $_POST['vendedor'] );
    $creado          = DATE('Y/m/d');
   

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];
    
    // If's validacion
    /**Al momento de no encontrar el elemento se envia a nuestro arreglo ese mensaje */
    if (!$titulo) {
        $errores[] ="Debes añardir un titulo";
    } 

    if (!$precio) {
        $errores[] ="Debes añardir un precio";
    }

    //Strlen nos ayuda a verificar la cantidad de caracteres 
    if (strlen( $descripcion ) < 15) {
        $errores[] ="La descripcion es obligatoria y debe tener al menos 15 caracteres";
    }

    if (!$habitaciones) {
        $errores[] ="El numero de habitaciones es obligatorio";
    }   

    if (!$wc) {
        $errores[] ="El numero de Baños es obligatorio";
    }   
    
    if (!$estacionamiento) {
        $errores[] ="El numero de lugares de Estacionamientos es obligatorio";
    }   

    if (!$vendedor_id) {
        $errores[] ="Elige un vendedor";
    }  


    // Validar imagen por tamaño 100Kb Maximo
    $capacidad = 1000 * 1000;
        if ($imagen['size'] > $capacidad) {
        $errores[] = "La imagen es muy pesada";
    }


    // Visualizar lista de errores
    // echo'<pre>';
    // var_dump($errores);
    // echo'</pre>';

    //Validadar insersion ¿? ver que no exista ningun error en nuestra variable errores 
    //Si existe un error no se insertara ningun dato a la base de datos 
    // Empty nos ayuda a validad que no exista nada dentro de un arreglo

    if (empty($errores)) {
        /**SUBIDA DE ARVHIVOS*/
        
        //  Crear una carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';
        
        if ($imagen['name']) {
            // echo "Si hay una nueva imagen";
            // Eliminar la imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);
            // Generar un nombre unico 
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            // Subir la imagen a la carpeta 
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }

        
        


                
        // Insertar en base de datos con actualizacion
        $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento,  vendedores_id = $vendedor_id WHERE id = $id";
            
        // Lanzamiento de query en web para pruebas
        // echo $query; 
        // exit;
            
        // Almacenamiento de base de datos
        $resultado = mysqli_query($db, $query);
            
        if ($resultado) {
            // Reedireccionar al usuario para evitar informacion duplicada 
            header('Location: /admin?resultado=2');
            // echo "Se inserto correctamente";
        }
    

    }



}



?> 

<main class="contenedor contenido-centrado seccion"> 
    <h1>Actualizar Propiedad</h1>

    <a class="boton btn-verde" href="/admin/index.php">Volver</a>

    <?php foreach ($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST"  enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            
            <label for="titulo">Titulo:</label>
            <input 
            type="text" 
            id="titulo" 
            placeholder="Titulo Propiedad" 
            name="titulo" 
            value="<?php echo $titulo;?>">

            <label for="precio">Precio:</label>
            <input 
            type="number" 
            id="precio" 
            placeholder="Precio Propiedad" 
            name="precio" 
            value="<?php echo $precio;?>">

            <label for="imagen">Imagen:</label> 
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="/imagenes/<?php echo $imagenPropiedad ?>" alt="" class="imagen-small">

            <label for="descripcion">Descripcion</label>
            <textarea 
            id="descripcion" 
            name="descripcion"> <?php echo $descripcion; ?> </textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input 
            type="number" 
            id="habitaciones" 
            name="habitaciones" 
            placeholder="Ej: 3" 
            min="1" max="9" 
            value="<?php echo $habitaciones;?>">

            <label for="wc">Baños:</label>
            <input 
            type="number" 
            id="wc" 
            name="wc" 
            placeholder="Ej: 2" 
            min="1" max="9" 
            value="<?php echo $wc;?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input 
            type="number" 
            id="estacionamiento" 
            name="estacionamiento" 
            placeholder="Ej: 1" 
            min="1" max="9" 
            value="<?php echo $estacionamiento;?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="">-- Seleccione --</option>

                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ):  ?>

                    <option
                        <?php echo $vendedor_id === $vendedor['idVendedor'] ? 'selected' : '';  ?> 
                        value="<?php echo $vendedor['idVendedor']; ?>" >
                        <?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido'];  ?>
                    </option>
                
                    <?php endwhile; ?>
            </select>
        </fieldset>

        <input class="btn-verde" type="submit" value="Actualizar Propiedad">
    </form>

</main>

<?php
incluirTemplate('footer');
?>