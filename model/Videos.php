<?php
include_once 'Bd.php';

class Videos
{
    public function imprimeTabla()
    {
        try {
            $db = new Bd();
            $sql = "SELECT nombre FROM videos WHERE idUsuario=" . $_SESSION['id'];
            $datos = $db->query($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $texto = "";
        while ($video = $datos->fetch_array(MYSQLI_ASSOC)) {
            $texto .= "<div class='vista-imagen'>
                <a class='iframe cboxElement' href='videosSubidos/" . $video['nombre'] . "'>
                 <video src='videosSubidos/" . $video['nombre'] . "' alt='video'>
                </a>
                <div class='iconos grid-fuera'>
                    <div>
                        <input type='checkbox' value='" . $video['nombre'] . "' name='registro[]'>
                    </div>
                    <div>
                        <a href='videosSubidos/" . $video['nombre'] . "' download='" . $video['nombre'] . "'>
                            <img src='img/iconodesc.svg' class='descarga' id='descargaca'>
                        </a>
                    </div>
                    <div>
                        <a id='basuraca' onclick='eliminar(this)' name='" . $video['nombre'] . "'>
                          <img src='img/iconotrash.svg' class='descarga' >
                        </a>
                    </div>
                </div>
            </div>";
        }
        return $texto;

    }
}