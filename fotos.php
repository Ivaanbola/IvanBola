<!DOCTYPE>
<head>
    <title>fotos</title>
    <script src="js/dropzone.js"></script>
    <script src="js/archivos.js"></script>
    <link rel="stylesheet" href="css/dropzone.css">


    <?php
require_once 'includes/templates/header.inc.php'
?>


    <section class="contenedor seccion-archivos">
        <form action="controlador/fotos.php"
              class="dropzone contenedor"
              id="my-awesome-dropzone"
              enctype="multipart/form-data" method="POST">
        </form>
        <button type="button" class="boton boton-secundario" id="enviar-todo">Subir archivos

        </button>
        <button type="button" class="boton boton-secundario" id="limpiar-todo">Limpiar archivos

        </button>
    </section>

    <div id="vista">

    </div>

<?php
require_once 'includes/templates/footer.inc.php'
?>