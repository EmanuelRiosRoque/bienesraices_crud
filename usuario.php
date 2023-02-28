<?php 
// Importar conexion
require 'includes/config/database.php';
$db = conectarDB();

// Crear un email y un password
$email = "emanuel@correo.com";
$password = "123456";


$passwordHash = password_hash($password, PASSWORD_DEFAULT);



// Query para agrefar al usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";


// Agregarlo a la base de datos
mysqli_query($db, $query);
