<?php
include_once 'Bd.php';

class Fotos
{

    private $nombre;
    private $size;
    private $type;
    private $fecha;
    private $tabla;
    private $archivo;


    public function __construct()
    {
        $this->tabla = "fotos";
        $this->fecha = date('Y-m-d');
    }

    public function creaObj($nombre, $tamaño, $tipo, $tmpname)
    {

        $this->setNombre($nombre);
        $this->setSize($tamaño);
        $this->setType($tipo);
        $this->setArchivo($tmpname);
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public
    function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public
    function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public
    function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public
    function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public
    function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public
    function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }

    /**
     * @return mixed
     */
    public
    function getDirectorio()
    {
        return $this->directorio;
    }


    /**
     * @return mixed
     */
    public
    function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public
    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public
    function subirFoto()
    {

        $directorio = "../fotosSubidas/";  //2
        if (!is_dir($directorio)) {
            if (!mkdir($directorio, 0755, true) && !is_dir($directorio)) {

            }
        }
        $carpetaSalida = $directorio . $this->getNombre();  //5

        if (!move_uploaded_file($this->getArchivo(), $carpetaSalida)) {
            echo "No se ha podido crear";
        }
        try {
            $db = new Bd();
            $sql = "INSERT INTO " . $this->tabla . " (nombre, size, type , fecha) VALUES(?,?,?,?)";
            $datos = Array($this->getNombre(), $this->getSize(), $this->getType(), $this->getFecha());
            $db->queryPrepared($sql, $datos);
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function imprimeTabla()
    {

        try {
            $db = new Bd();
            $sql = "SELECT nombre FROM fotos WHERE idUsuario=" . $_SESSION['id'];
            $datos = $db->query($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $texto = "";
        while ($foto = $datos->fetch_array(MYSQLI_ASSOC)) {
            $texto .= "<div class='vista-imagen'>
                <a class='group1 cboxElement' href='fotosSubidas/" . $foto['nombre'] . "'>
                 <img src='fotosSubidas/" . $foto['nombre'] . "' alt='imagenColorbox'>
                </a>
                <div class='iconos grid-fuera'>
                    <div>
                        <input type='checkbox' value='" . $foto['nombre'] . "' name='registro[]'>
                    </div>
                    <div>
                        <a href='fotosSubidas/" . $foto['nombre'] . "' download='" . $foto['nombre'] . "'>
                            <img src='img/iconodesc.svg' class='descarga' id='descargaca'>
                        </a>
                    </div>
                    <div>
                        <a id='basuraca' onclick='eliminar(this)' name='" . $foto['nombre'] . "'>
                          <img src='img/iconotrash.svg' class='descarga' >
                        </a>
                    </div>
                </div>
            </div>";
        }


        return $texto;

    }


}