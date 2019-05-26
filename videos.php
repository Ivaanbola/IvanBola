<!DOCTYPE>
<head>
    <title>videos</title>
    <script src="../../../Users/ivaan/Downloads/IvanBola/js/dropzone.js"></script>
    <script src="../../../Users/ivaan/Downloads/IvanBola/js/videos.js"></script>
    <script src="../../../Users/ivaan/Downloads/IvanBola/js/jquery.js"></script>
    <script src="../../../Users/ivaan/Downloads/IvanBola/js/jquery.colorbox-min.js"></script>
    <script src="../../../Users/ivaan/Downloads/IvanBola/js/fotosvideos.js"></script>


    <link rel="stylesheet" href="../../../Users/ivaan/Downloads/IvanBola/css/colorbox.css">
    <link rel="stylesheet" href="../../../Users/ivaan/Downloads/IvanBola/css/dropzone.css">


    <?php
    require_once 'includes/templates/header.inc.php'
    ?>


    <section class="contenedor seccion-archivos">
        <form action="../../../Users/ivaan/Downloads/IvanBola/funciones/videos.php"
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