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

    public function creaObj($FILES)
    {

        $this->setNombre($FILES['name']);
        $this->setSize($FILES['size']);
        $this->setType($FILES['type']);
        $this->setArchivo($FILES['tmp_name']);
        $this->subirFoto($FILES['tmp_name'], $FILES['name']);

    }

    /**
     * @return mixed
     */
    public
    function getNombre()
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
    function subirFoto($archivo, $nombre)
    {
     //   echo "AAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHH";
    //    echo $archivo;
     //   echo "AAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHH";
    //    echo $nombre;
    //    echo "AAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHH";


        $directorio = "../fotosSubidas/";

        if (!is_dir($directorio)) {
            if (!mkdir($directorio, 0777, true) && !is_dir($directorio)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $directorio));
            }
        }

        $carpetaSalida = $directorio . $nombre;  //5
        if (!move_uploaded_file($archivo, $carpetaSalida)) {
            echo "<p>No se ha podido crear la carpeta</p>";
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


}