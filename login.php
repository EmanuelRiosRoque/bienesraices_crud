<?php
//Conexion a Base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Crear un arreglo de errores
$errores = [];


// Autenticar el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
    
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        // Leer resultado
        $resultado = mysqli_query($db, $query);
        
        // Comprobacion si en DB existe correo
        if ($resultado->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            // Autentificar el usuario
                                  // Password que el usuario escribio / Password que se encuentra en la base de datos
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // El usuario esta autenicado
                session_start();

                // Llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;


                header('Location: /admin');

            } else {
                $errores[] = "El password es incorrecto";
            }

        } else {
            $errores[] = "No existe el usuario";
        }
    }
}



// Incluye el header

require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado"> 
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error ):  ?>
        <div class="alerta error">
            <?php echo $error;  ?>
        </div>
    <?php endforeach;  ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email Y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu Correo">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu Password">
        </fieldset>

        <div class="alinear-derecha">
            <input class="boton btn-verde" type="submit" value="Iniciar Sesion">
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>