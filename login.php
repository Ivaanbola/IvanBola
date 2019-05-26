<!DOCTYPE>
<head>
    <title>login</title>
    <script src="../../../Users/ivaan/Downloads/IvanBola/js/dropzone.js"></script>
    <script src="js/archivos.js"></script>
    <link rel="stylesheet" href="../../../Users/ivaan/Downloads/IvanBola/css/dropzone.css">


    <?php
    require_once 'includes/templates/header.inc.php'
    ?>



    <section class="contenedor">
        <h2 class="centrar-texto textsection">Inicia Sesión en Transfer</h2>
        <div class="grid ">
            <div class="columnas-6">
                <div class="formulario">
                    <form action="#">
                        <fieldset>
                            <legend>Iniciar Sesion</legend>
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" placeholder="E-Mail">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" id="password" placeholder="Contraseña">
                            <div>
                                <input type="submit" value="Enviar" class="boton boton-primario">
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

<?php
require_once 'includes/templates/footer.inc.php'
?>