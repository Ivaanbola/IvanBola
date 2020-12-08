<?php
include_once 'model/sesiones.php';
?>
    <!DOCTYPE>
    <head>
    <title>videos</title>
    <script src="js/dropzone.js"></script>
    <script src="js/videos.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>


    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/dropzone.css">


    <?php
    require_once 'includes/templates/header.inc.php'
    ?>


    <section class="contenedor seccion-archivos">
        <form action="funciones/videos.php"
              class="dropzone contenedor"
              id="my-awesome-dropzone"
              enctype="multipart/form-data" method="POST">
            <div class="fallback">
                <input name="file" type="file"  accept="video/*"  />
            </div>
        </form>
        <a class="boton boton-secundario isDisabled" id="enviar-todo">Subir archivos </a>
        <a class="boton boton-secundario isDisabled" id="limpiar-todo">Limpiar formulario </a>
        <form method="post" action="funciones/zips.php">
            <div class="chekboxx">
                <p>Seleccionar/Deseleccionar todos</p>
                <input type="checkbox" id="chequear"/>
            </div>

            <div id="vista">
                <?php
                include_once 'model/Videos.php';

                $videos = new Videos();
                echo $videos->imprimeTabla();

                ?>
            </div>
            <input type="hidden" name="accion" value="videos">
            <button type="submit" class="boton boton-secundario " id="descargar-todo" >Descargar
                Seleccionadas
            </button>
            <a class="boton boton-secundario " id="limpiar-selec">Eliminar Seleccionadas</a>
        </form>

    </section>


    <script src="js/sweetalert2.all.min.js"></script>

<?php
require_once 'includes/templates/footer.inc.php'
?>