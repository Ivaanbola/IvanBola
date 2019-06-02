<?php
include_once '../model/Bd.php';

$directorio = "../fotosSubidas/";  //2

if (!is_dir($directorio)) {
    if (!mkdir($directorio, 0777, true) && !is_dir($directorio)) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', $directorio));
    }
}

$archivo = $_FILES['file']['tmp_name'];          //3
$carpetaSalida = $directorio . $_FILES['file']['name'];  //5

if (move_uploaded_file($archivo, $carpetaSalida)) {
    $imagen = $_FILES['file']['name'];
    $tamaño = ($_FILES['file']['size'] / 1024);
    $tipo = $_FILES['file']['type'];
} else {
    echo "<p>No se ha podido crear la carpeta</p>";
}

if (!empty($_FILES)) {
    try {
        $db = new Bd();
        session_start();
        $idUsuario = $_SESSION['id'];

        $sql = "INSERT INTO fotos (nombre, size, type , fecha, idUsuario) VALUES(?,?,?,?,?)";
        $datos = [$imagen, $tamaño, $tipo, date('Y-m-d'), $idUsuario];
        $stmt = $db->queryPrepared($sql, $datos);

    } catch (Exception $e) {
        echo "Error" . $e->getMessage();
    }

    $total = count($_FILES);

    $respuesta = ['respuesta' => 'correcto', 'imagen' => $imagen, 'total' => $total

    ];

    echo json_encode($respuesta);

}

?>