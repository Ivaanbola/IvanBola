<?php
function usuario_autentificado()
{
    if (!revisar_usuario()) {
        header('Location:login.php');
        exit();
    }
}

function revisar_usuario()
{
    if (session_status() !== PHP_SESSION_ACTIVE)
        session_start();
    return ($_SESSION['usuario']);
}


usuario_autentificado();
