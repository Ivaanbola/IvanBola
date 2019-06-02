<!DOCTYPE>
<head>
    <script src="js/login.js"></script>
    <title>login</title>
    <?php
    require_once 'includes/templates/header.inc.php';
    include_once 'model/Usuario.php';
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
    if (isset($_POST) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
        $usuario = new Usuario();
        $usuario->login($_POST['usuario'], $_POST['password']);
    }
    ?>
    <section class="contenedor">
        <h2 class="centrar-texto textsection">Inicia Sesión en Transfer</h2>
        <div class="grid ">
            <div class="columnas-6">
                <div class="formulario">
                    <form action="#" id="login" method="post">
                        <fieldset>
                            <legend>Iniciar Sesion</legend>
                            <label for="email">Correo electronico o Usuario:</label>
                            <input type="text" id="usuario" placeholder="E-Mail o Usuario">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" id="password" placeholder="Contraseña">
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
                <p>Nulla vehicula finibus magna. Quisque tincidunt velit id
                    lectus facilisis, a hendrerit urna iaculis. Donec posuere felis at
                    lacus interdum, et feugiat tortor scelerisque. Sed finibus auctor
                    sapien in ultricies. Nam rutrum non mauris eget fermentum.</p>
                <p>In cursus, enim quis dictum finibus, nisl enim pulvinar augue,
                    sagittis eleifend nulla nibh ut justo. Duis magna enim, feugiat eget
                    tristique at, pulvinar a diam. Mauris augue velit, iaculis ut nibh
                    non, interdum faucibus libero. Curabitur porttitor placerat elit,
                    non cursus purus. Sed justo ipsum, aliquam eu maximus vel, elementum
                    nec leo. Fusce gravida lacus non lacinia auctor.</p>
            </div>
        </div>
    </section>
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/login.js"></script>
<?php
require_once 'includes/templates/footer.inc.php'
?>