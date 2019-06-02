<?php
include_once 'Bd.php';

class Usuario
{
    private $usuario;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $password2;
    private $opciones;
    private $db;
    private $tabla;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
        $this->opciones = array(
            'cost' => 10
        );
        $this->db = new Bd();
        $this->tabla = "usuarios";
    }

    public function crearUsuario($nombre, $apellidos, $usuario, $email, $password)
    {
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setUsuario($usuario);
        $this->setEmail($email);
        $this->setPassword($password);

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
    public function setNombre($nombre)
    {
        $this->nombre = $this->limpiaString($nombre);
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->limpiaString($apellidos);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $this->limpiaString($usuario);
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT, $this->opciones);

    }


    private function limpiaString($archivo)
    {
        $archivo = str_replace("[áàâãªä@]", "a", $archivo);
        $archivo = str_replace("[ÁÀÂÃÄ]", "A", $archivo);
        $archivo = str_replace("[éèêë]", "e", $archivo);
        $archivo = str_replace("[ÉÈÊË]", "E", $archivo);
        $archivo = str_replace("[íìîï]", "i", $archivo);
        $archivo = str_replace("[ÍÌÎÏ]", "I", $archivo);
        $archivo = str_replace("[óòôõºö]", "o", $archivo);
        $archivo = str_replace("[ÓÒÔÕÖ]", "O", $archivo);
        $archivo = str_replace("[úùûü]", "u", $archivo);
        $archivo = str_replace("[ÚÙÛÜ]", "U", $archivo);
        $archivo = str_replace("[¿?\]", "_", $archivo);
        $archivo = str_replace(" ", "_", $archivo);
        $archivo = str_replace("ñ", "n", $archivo);
        $archivo = str_replace("Ñ", "N", $archivo);
        return $archivo;
    }

    public function crearUsuarioBD()
    {
        $sql = "SELECT usuario FROM " . $this->tabla . " WHERE usuario = '" . $this->getUsuario() . "'OR email='" . $this->getEmail() . "' LIMIT 1";
        $stmt = $this->db->numeroElementosConSql($sql);
        if ($stmt == 0) {
            $sql = "INSERT INTO " . $this->tabla . " (usuario, email, password, nombre, apellidos) VALUES(?,?,?,?,?)";
            $datos = Array($this->getUsuario(), $this->getEmail(), $this->getPassword(), $this->getNombre(), $this->getApellidos());
            $stmt = $this->db->queryPreparedID($sql, $datos);
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION['usuario'] = $this->getUsuario();
            $_SESSION['nombre'] = $this->getNombre();
            $_SESSION['id'] = $stmt;
            if ($stmt == 0) {
                echo "<p>Ha ocurrido un error en la inyeccion</p>";
            } else {
                echo "<script>lanzaAlerta('success','Bienvenido','');
            setTimeout(function() {
               location.href = 'fotos.php'
            },2500);
            </script>";
            }
        } else {
            echo "<script>lanzaAlerta('error','Usuario y/o email','Ya hay un usuario o un email con este nombre');
            setTimeout(function() {
               location.href = 'registro.php'
            },2500);
            </script>";

        }

    }


    public function login($usuario, $password)
    {
        $sql = "SELECT usuario, email, password, nombre, apellidos, id  FROM usuarios WHERE usuario = ? OR email = ?";
        $stmt = $this->db->getConexion()->prepare($sql);
        $stmt->bind_param('ss', $usuario, $usuario);
        $stmt->execute();
        $stmt->bind_result($usuarioUsuario, $emailUsuario, $passwordUsuario, $nombreUsuario, $apellidoUsuario, $idUsuario);
        $stmt->fetch();

        if ($usuarioUsuario) {
            if (password_verify($password, $passwordUsuario)) {
                session_start();
                $_SESSION['nombre'] = $nombreUsuario;
                $_SESSION['usuario'] = $usuarioUsuario;

                echo "<script>lanzaAlerta('success','Bienvenido',`Hola de nuevo ${$nombreUsuario}`);
            setTimeout(function() {
               location.href = 'fotos.php'
            },2500);
            </script>";
            } else {
                echo "<script>lanzaAlerta('error','Usuario y/o contraseña','Usuario y/o contraseña incorrectas');
            setTimeout(function() {
               location.href = 'login.php'
            },2500);
            </script>";

            }
        } else {
            echo "<script>lanzaAlerta('error','Error','Introduzca un email o una contraseña correcta');
            setTimeout(function() {
               location.href = 'login.php'
            },2500);
            </script>";
        }


    }

}