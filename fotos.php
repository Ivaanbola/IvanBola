<?php
include_once 'model/sesiones.php';

//// Creamos un instancia de la clase ZipArchive
//$zip = new ZipArchive();
//// Creamos y abrimos un archivo zip temporal
//$zip->open("img.zip", ZipArchive::CREATE);
//// Añadimos un archivo en la raid del zip.
////$zip->addFile("fotosSubidas/".$_POST['registro']['value'] , $_POST['registro']['value']);
//$zip->addFile("fotosSubidas/descarga (1) - copia.jpg", "imagen.jpg");
//$zip->addFile("fotosSubidas/descarga.jpg");
//// Una vez añadido los archivos deseados cerramos el zip.
//$zip->close();
//// Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
//header("Content-type: application/octet-stream");
//header("Content-disposition: attachment; filename=img.zip");
//// leemos el archivo creado
//readfile('img.zip');
//// Por último eliminamos el archivo temporal creado
//unlink('img.zip');//Destruye el archivo temporal
//
?>
    <!DOCTYPE>
    <head>
    <title>fotos</title>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>
    <script src="js/dropzone.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
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