<?php
include_once '../model/Bd.php';


$directorio = "../cancionesSubidas/";  //2

if (!is_dir($directorio)) {
    if (!mkdir($directorio, 0777, true) && !is_dir($directorio)) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', $directorio));
    }
}

$archivo = $_FILES['file']['tmp_name'];          //3
$carpetaSalida = $directorio . $_FILES['file']['name'];  //5

if (move_uploaded_file($archivo, $carpetaSalida)) {
    $cancion = $_FILES['file']['name'];
    $tamaño = ($_FILES['file']['size'] / 1024);
    $tipo = $_FILES['file']['type'];
} else{
    echo "<p>No se ha podido crear la carpeta</p>";
}

if (!empty($_FILES)) {
    try {
        $db = new Bd();

        $sql = "INSERT INTO musica (nombre, size, type , fecha) VALUES(?,?,?,?)";
        $datos = Array($cancion, $tamaño, $tipo,date('Y-m-d'));
        $stmt = $db->queryPrepared($sql, $datos);

    } catch (Exception $e) {
        echo "Error" . $e->getMessage();
    }

}

?>