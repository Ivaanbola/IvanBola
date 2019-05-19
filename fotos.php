<?php
include_once './model/Fotos.php';
$fotos = new Fotos();

if (!empty($_FILES)) {

    foreach ($_FILES as $FILE) {
        echo "AAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHH";
        $fotos->creaObj($FILE);
        echo "<pre>";
        echo var_dump($FILE);
        echo "</pre>";
        echo "eeeeeeeeeeeeeeeeeee";
    }
    echo "OOOOOOOOOOOOOOOOOOOO";
}

?>
    <!DOCTYPE>
    <head>
    <title>fotos</title>
    <script src="js/dropzone.js"></script>
    <script src="js/fotos.js"></script>
    <link rel="stylesheet" href="css/dropzone.css">


    <?php
    require_once 'includes/templates/header.inc.php'
    ?>


    <section class="contenedor seccion-archivos">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"
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