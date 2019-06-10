<!DOCTYPE>
<head>
    <title>login</title>
    <?php
    require_once 'includes/templates/header.inc.php';
    ?>
    <?php
    if (isset($_GET['cerrar_sesion'])) {
        $cerrar_sesion = $_GET['cerrar_sesion'];
        if ($cerrar_sesion) {
            $_SESSION = array();
            session_destroy();
            header('Location: login.php');
        }
    }

    ?>
    <section class="contenedor section-foto">
        <h2 class="centrar-texto textsection">Inicia Sesión en Transfer</h2>
        <div class="grid ">
            <div class="columnas-6">
                <div class="formulario">
                    <form action="#" id="login" method="post">
                        <fieldset>
                            <legend>Iniciar Sesion</legend>
                            <label for="email">Correo electronico o Usuario:</label>
                            <input type="text" id="usuario" name="usuario" placeholder="E-Mail o Usuario">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" id="password" name="password" placeholder="Contraseña">
                            <div>
                                <input type="submit" value="Entrar" class="boton boton-primario">
                            </div>
                            <div class="login-forget">
                                <a href="registro.php" class="enlace-primario">¿Olvidaste tu contraseña?</a>
                                <a href="registro.php" class="enlace-primario">Registrate</a>
                            </div>
                            <div class="grid-column login-redes">
                                <div class="linea-horizontal"></div>
                                <span class="enlace-primario ">o regístrate con</span>

                                <div class="grid-fuera">
                                    <a href="https://www.google.com" class="enlace-primario" target="blank"><i
                                                class="fab fa-google"></i>Google</a>
                                    <a href="https://www.twitter.com" class="enlace-primario" target="blank"><i
                                                class="fab fa-twitter"></i>Twitter</a>
                                    <a href="https://www.facebook.com" class="enlace-primario" target="blank"><i
                                                class="fab fa-facebook"></i>Facebook</a>
                                </div>
                            </div>

                        </fieldset>

                    </form>
                </div>
            </div>
            <div class="columnas-6">
                <h4>
                    Transfiera archivos entre el ordenador y el dispositivo móvil fácilmente </h4>
                <p>Transfiera fotos,
                    documentos, canciones, etc. entre su ordenador y sus dispositivos, todo sin
                    cables.</p>
                <h4>Controle sus dispositivos en cualquier momento</h4> <p>
                    Transfer le permite tomar el control completo de su dispositivo. El modo de traspaso de archivos
                    llevan su productividad a un nuevo nivel.</p>
            </div>
        </div>
    </section>
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/login.js"></script>
    <?php
    include_once 'model/Usuario.php';
    $usuario = new Usuario();
    if (isset($_POST) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario->login($_POST['usuario'], $_POST['password']);
    }
    ?>
<?php
require_once 'includes/templates/footer.inc.php'
?>