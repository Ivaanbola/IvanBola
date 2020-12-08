<?php
include_once '../model/Bd.php';


if ($_POST['accion'] == "fotos") {
    $carpetazip = "img.zip";
}

if ($_POST['accion'] == "fotos") {
// Creamos un instancia de la clase ZipArchive
    $zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
    $opened = $zip->open($carpetazip, ZipArchive::CREATE);
    if ($opened !== true) {
        die("No se ha podido crear el zip.");
    }
    $db = new Bd();
// Añadimos un archivo en la raid del zip.
    foreach ($_POST['registro'] as $val) {
        $zip->addFile("../fotosSubidas/" . $val, $val);
        $sql = "DELETE FROM fotos WHERE nombre='" . $val . "'";
        $db->query($sql);
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
    unlink($carpetazip);//Destruye el archivo tempora
}

if ($_POST['accion'] == "musica") {
    $carpetazip = "audio.zip";
}

if ($_POST['accion'] == "musica") {
    // Creamos un instancia de la clase ZipArchive
    $zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
    $opened = $zip->open($carpetazip, ZipArchive::CREATE);
    if ($opened !== true) {
        die("No se ha podido crear el zip.");
    }
    $db = new Bd();
// Añadimos un archivo en la raid del zip.
    foreach ($_POST['registro'] as $val) {
        $zip->addFile("../cancionesSubidas/" . $val, $val);
        $sql = "DELETE FROM musica WHERE nombre='" . $val . "'";
        $db->query($sql);

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

if ($_POST['accion'] == "videos") {
    $carpetazip = "videos.zip";
}

if ($_POST['accion'] == "videos") {
// Creamos un instancia de la clase ZipArchive
    $zip = new ZipArchive();
// Creamos y abrimos un archivo zip temporal
    $opened = $zip->open($carpetazip, ZipArchive::CREATE);
    if ($opened !== true) {
        die("No se ha podido crear el zip.");
    }
    $db = new Bd();
// Añadimos un archivo en la raid del zip.
    foreach ($_POST['registro'] as $val) {
        $zip->addFile("../videosSubidos/" . $val, $val);
        $sql = "DELETE FROM videos WHERE nombre='" . $val . "'";
        $db->query($sql);

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


if ($_POST['accion'] == 'eliminar') {
    $db = new Bd();

    foreach ($_POST['registro'] as $val) {
        $miarray = explode(',', $val);
    }
    if ($_POST['tabla'] == "musica") {
        $directorio = "../cancionesSubidas/";
    }
    if ($_POST['tabla'] == "videos") {
        $directorio = "../videosSubidos/";
    }
    if ($_POST['tabla'] == "fotos") {
        $directorio = "../fotosSubidas/";
    }
    foreach ($miarray as $val) {
        $miArchivo = $directorio . $val;
        unlink($miArchivo);
        $sql = "DELETE FROM " . $_POST['tabla'] . " WHERE nombre='" . $val . "'";
        $db->query($sql);
    }

}

if ($_POST['accion'] == 'eliminaruno') {
    $db = new Bd();

    $sql = "DELETE FROM " . $_POST['tabla'] . " WHERE nombre='" . $_POST['nombreEliminar'] . "'";
    $db->query($sql);

    if ($_POST['tabla'] == "musica") {
        $directorio = "../cancionesSubidas/";
    }
    if ($_POST['tabla'] == "videos") {
        $directorio = "../videosSubidos/";
    }
    if ($_POST['tabla'] == "fotos") {
        $directorio = "../fotosSubidas/";
    }
    $miArchivo = $directorio . $_POST['nombreEliminar'];
    unlink($miArchivo);
}