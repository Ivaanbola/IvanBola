<?php

class Bd
{
    private $server = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $basedatos = "tfgivan";
    private $conexion;
    private $resultado;

    public function __construct()
    {
        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->basedatos);
        //creo que hace lo mismo
        //$this->conexion->select_db($this->basedatos);
        //creo que hace lo mismo
        //$this->conexion->query("SET NAMES 'utf8'");
        $this->conexion->set_charset('utf8');
        if ($this->conexion->connect_error) {
            echo $this->conexion->connect_error;
        }
    }

    public function consultaSimple($consulta)
    {
        $this->resultado = $this->conexion->query($consulta);
        $res = mysqli_fetch_assoc($this->resultado);
        return $res;
    }

    public function query($sql)
    {
        $res = $this->conexion->query($sql);
        return $res;
    }

    private function numeroElementos()
    {
        $num = $this->resultado->num_rows;
        return $num;
    }

    public function numeroElementosConSql($sql)
    {
        $this->resultado = $this->conexion->query($sql);
        $num = $this->numeroElementos();
        return $num;
    }

    public function nombreDB()
    {
        return $this->basedatos;
    }

    public function insertarElemento($tabla, $datos, $foto = 0, $directorio = "")
    {
        $claves = array();
        $valores = array();
        foreach ($datos as $clave => $valor) {
            $claves[] = $clave;
            $valores[] = "'" . $valor . "'";
        }
        if ($foto != 0) {
            $ruta = subirFoto($foto, $directorio);
            $claves[] = "ruta";
            $valores[] = "'" . $ruta . "'";
        }
        $sql = "INSERT " . $tabla . " (" . implode(',', $claves) . ") VALUES  (" . implode(',', $valores) . ")";
        $this->resultado = $this->conexion->query($sql);
        $res = $this->resultado;
        return $res;
    }

    public function queryPrepared($query, $args)
    {
        $stmt = $this->conexion->prepare($query);
        $params = [];
        $types = array_reduce($args, function ($string, &$arg) use (&$params) {
            $params[] = &$arg;
            if (is_float($arg)) $string .= 'd';
            elseif (is_integer($arg)) $string .= 'i';
            elseif (is_string($arg)) $string .= 's';
            else                        $string .= 'b';
            return $string;
        }, '');
        array_unshift($params, $types);
        call_user_func_array([$stmt, 'bind_param'], $params);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close();

        return $result;
    }

    public function queryPreparedID($query, $args)
    {
        $stmt = $this->conexion->prepare($query);
        $params = [];
        $types = array_reduce($args, function ($string, &$arg) use (&$params) {
            $params[] = &$arg;
            if (is_float($arg)) $string .= 'd';
            elseif (is_integer($arg)) $string .= 'i';
            elseif (is_string($arg)) $string .= 's';
            else                        $string .= 'b';
            return $string;
        }, '');
        array_unshift($params, $types);
        call_user_func_array([$stmt, 'bind_param'], $params);
        $stmt->execute();
        $result = $stmt->insert_id;
        $stmt->close();
        return $result;
    }

    public function getConexion()
    {
        return $this->conexion;
    }

}

?>