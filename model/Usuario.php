<?php
/**
 * Created by PhpStorm.
 * User: ivaan
 * Date: 28/05/2019
 * Time: 21:09
 */

class Usuario
{
    private $usuario;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $password2;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
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
        $this->nombre = $nombre;
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
        $this->apellidos = $apellidos;
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
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword2()
    {
        return $this->password2;
    }

    /**
     * @param mixed $password2
     */
    public function setPassword2($password2)
    {
        $this->password2 = $password2;
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

}