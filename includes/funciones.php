<?php

require 'app.php';
function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/$nombre.php";
}

function Autentificacion() : bool {
    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}