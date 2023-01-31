<?php
/**
 * @author Unai Díez Reguera, https://github.com/AlphaUnai
 * @see Model.php
 */
include_once 'Model.php';
/**
   * Clase LoginDB
   * La clase  LoginDB  sirve para que los controladores la usen para acceder a la base de datos
   * hereda de Model.php
   */
class LoginDB extends Model {
    /**
     * Función __construct
     * hereda del constructor de Model
     * Crea un objeto LoginDB
     * @see Model::__construct
     */
    public function __construct(){//constructor
        parent::__construct("login");      
    }
    /**
     * Función newUser
     * Inserta un usuario en la base de datos
     * @param string $user nombre de usuario
     * @param string $pass contraseña
     * @return void
     */
    public function newUser($user,$pass){//nuevo usuario
        $sql="INSERT INTO login VALUES('$user','$pass',0)";
        $this->db->changes($sql);    
    }
    /**
     * Función votado
     * Establece votado del usuario a 1, votado
     * @param string $user nombre de usuario
     * @return void
     */
    public function votado($user){//update del voto
        $sql = "UPDATE login SET votado=1 WHERE user='$user'";
        $this->db->changes($sql);
    }
}
?>