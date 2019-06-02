<?php
include_once 'model/sesiones.php';
?>
    <!DOCTYPE>
    <head>
    <title>fotos</title>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>
    <script src="js/dropzone.js"></script>
    <script src="js/fotos.js"></script>

    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/colorbox.css">


    <?php
    require_once 'includes/templates/header.inc.php'
    ?>


    <section class="contenedor seccion-archivos">
        <form action="funciones/fotos.php"
              class="dropzone contenedor"
              id="my-awesome-dropzone"
              enctype="multipart/form-data" method="POST">
        </form>
        <a class="boton boton-secundario isDisabled" id="enviar-todo">Subir archivos </a>
        <a class="boton boton-secundario isDisabled" id="limpiar-todo">Limpiar formulario </a>
        <form method="post" action="funciones/zips.php">
            <div class="chekboxx">
                <p>Seleccionar/Deseleccionar todos</p>
                <input type="checkbox" id="chequear"/>
            </div>

            <div id="vista">

            </div>
            <input type="hidden" name="accion" value="fotos">
            <button type="submit" class="boton boton-secundario isDisabled" id="descargar-todo" disabled>Descargar
                Seleccionadas
            </button>
            <a class="boton boton-secundario isDisabled" id="limpiar-selec">Eliminar Seleccionadas</a>
        </form>


    </section>
<?php
require_once 'includes/templates/footer.inc.php'
?>