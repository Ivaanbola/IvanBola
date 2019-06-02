<?php


if ($_POST['accion'] == "fotos") {
    $carpetazip = "img.zip";
}

if (isset($_POST)) {
// Creamos un instancia de la clase ZipArchive
    $zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
    $opened = $zip->open($carpetazip, ZipArchive::CREATE);
    if ($opened !== true) {
        die("No se ha podido crear el zip.");
    }
// Añadimos un archivo en la raid del zip.
    foreach ($_POST['registro'] as $val) {
        $zip->addFile("../fotosSubidas/" . $val, $val);
    }
    //$zip->addFile("../fotosSubidas/descarga (1) - copia.jpg", "imagen.jpg");
    //   $zip->addFile("fotosSubidas/descarga.jpg");
// Una vez añadido los archivos deseados cerramos el zip.
    $zip->close();
// Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
    header("Content-type: application/octet-stream");
    header("Content-disposition: attachment; filename=" . $carpetazip);
// leemos el archivo creada
    readfile($carpetazip);
// Por último eliminamos el archivo temporal creado
    unlink($carpetazip);//Destruye el archivo temporal
}