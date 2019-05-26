<?php
//include_once './model/Fotos.php';
//include_once 'funciones/funciones.php';
//$fotos = new Fotos();
//
//
//if (!empty($_FILES)) {
////    $total_files = count($_FILES);
//    echo "--------------------";
////    echo $total_files;
//    echo "<pre>";
//    echo var_dump($_FILES);
//    echo "</pre>";
////    for ($key = 0; $key < $total_files; $key++) {
////
////
////        $nombre = $_FILES['file']['name'][$key];
////        $tamaño = $_FILES['file']['size'][$key];
////        $tipo = $_FILES['file']['type'][$key];
////        $tmp = $_FILES['file']['tmp_name'][$key];
////        $fotos->creaObj($nombre, $tamaño, $tipo, $tmp);
////        $fotos->subirFoto();
////        print 'File Name: ' . $nombre;
////        print 'File Type: ' . $tamaño;
////        print 'File Size: ' . $tipo;
////        print '-----------------------------';
//
//
////    }
//    //$fotos = new Fotos();
//    //  $fotos->creaObj($_FILES);
//
//
//    if ($_FILES['file']) {
//        $file_ary = reArrayFiles($_FILES['file']);
//
//        foreach ($file_ary as $file) {
//            $nombre = $file['name'];
//            $tamaño = $file['size'];
//            $tipo = $file['type'];
//            $tmp = $file['tmp_name'];
//            $fotos->creaObj($nombre, $tamaño, $tipo, $tmp);
//            $fotos->subirFoto();
//
//
//            print 'File Name: ' . $file['name'];
//            print 'File Type: ' . $file['type'];
//            print 'File Size: ' . $file['size'];
//            print '-----------------------------';
//        }
//    }
//
//}

?>
    <!DOCTYPE>
    <head>
    <title>fotos</title>
    <script src="js/dropzone.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>
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
        <button type="button" class="boton boton-secundario" id="enviar-todo">Subir archivos
        </button>
        <button type="button" class="boton boton-secundario" id="limpiar-todo">Limpiar archivos

        </button>
        <div id="vista">
            <div class="vista-imagen">

            </div>
        </div>
    </section>
<?php
require_once 'includes/templates/footer.inc.php'
?>