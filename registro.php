
    <!DOCTYPE>
    <head>
    <title>register</title>
    <link rel="stylesheet" href="css/sweetalert2.min.css">


    <?php
    require_once 'includes/templates/header.inc.php'
    ?>

    <section class="contenedor">
        <h2 class="centrar-texto textsection">Crear una cuenta</h2>
        <div class="grid">
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
            <div class="columnas-6">
                <div class="formulario">
                    <form action="" id="login" method="post">
                        <fieldset>
                            <legend>Iniciar Sesion</legend>
                            <div class="grid">
                                <div class="columnas-6">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                                </div>
                                <div class="columnas-6">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="grid">
                                <div class="columnas-6">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                                </div>
                                <div class="columnas-6">
                                    <label for="email">E-mail:</label>
                                    <input type="text" name="email" id="email" placeholder="E-Mail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <label for="password2">Confirmar contraseña:</label>
                                <input class="form-control" type="password" name="password2" id="password2"
                                       placeholder="Confirmar contraseña">
                                <span id="resultado-password" class="help-block"></span>
                                <span id="errorDiv"></span>
                                <span id="errorDiv2"></span>

                            </div>
                            <div>
                                <input type="submit" value="Registrarte" class="boton boton-primario isDisabled"
                                       id="crear-registro">
                                <div class="login-forget">
                                    <a href="login.php" class="enlace-primario">Iniciar Sesion</a>
                                </div>
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

        </div>
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/login.js"></script>
        <?php
        include_once 'model/Usuario.php';

        if (isset($_POST) && !empty($_POST['usuario'])) {
            $modelo = new Usuario();
            $modelo->crearUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['usuario'], $_POST['email'], $_POST['password']);
            $modelo->crearUsuarioBD();
        }
        ?>
<?php
require_once 'includes/templates/footer.inc.php'
?>