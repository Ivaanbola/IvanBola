<?php
include_once 'Bd.php';

class Musica
{
    public function imprimeTabla()
    {

        try {
            $db = new Bd();
            $sql = "SELECT nombre FROM musica WHERE idUsuario=" . $_SESSION['id'];
            $datos = $db->query($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $texto = "";
        while ($musica = $datos->fetch_array(MYSQLI_ASSOC)) {
            $texto .= "<div class='vista-imagen'>
                <a class='iframe cboxElement' href='cancionesSubidas/" . $musica['nombre'] . "'>
                 <audio src='cancionesSubidas/" . $musica['nombre'] . "' alt='musica' preload='auto' controls>
                </a>
                <p>" . $musica['nombre'] . "</p>
                <div class='iconos grid-fuera'>
                    <div>
                        <input type='checkbox' value='" . $musica['nombre'] . "' name='registro[]'>
                    </div>
                    <div>
                        <a href='cancionesSubidas/" . $musica['nombre'] . "' download='" . $musica['nombre'] . "'>
                            <img src='img/iconodesc.svg' class='descarga' id='descargaca'>
                        </a>
                    </div>
                    <div>
                        <a id='basuraca' onclick='eliminar(this)' name='" . $musica['nombre'] . "'>
                          <img src='img/iconotrash.svg' class='descarga' >
                        </a>
                    </div>
                </div>
            </div>";
        }


        return $texto;

    }
}